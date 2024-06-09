<?php

namespace App\Controller;

use Amp\Http\Client\HttpException;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Lexik\Bundle\JWTAuthenticationBundle\Services\JWTTokenManagerInterface;
use Lexik\Bundle\JWTAuthenticationBundle\Exception\JWTDecodeFailureException;

class AuthController extends AbstractController
{
    private EntityManagerInterface $entityManager;
    private JWTTokenManagerInterface $jwtManager;

    public function __construct(EntityManagerInterface $entityManager, JWTTokenManagerInterface $jwtManager)
    {
        $this->entityManager = $entityManager;
        $this->jwtManager = $jwtManager;
    }

    #[Route('/check_account/{id}/confirm_account', name: 'confirm_account', methods: ['POST'])]
    public function confirmAccount(string $id, Request $request): JsonResponse
    {
        $user = $this->entityManager->getRepository(User::class)->find($id);
        if (!$user)
            return new JsonResponse(['message' => 'User not found'], JsonResponse::HTTP_NOT_FOUND);

        /* Récupérer le token depuis les cookies
        $token = $request->cookies->get('BEARER');
        if (!$token) {
            throw new AccessDeniedHttpException('No token provided');
        }

        try {
            $jwtData = $this->jwtManager->parse($token);
            dd($jwtData);
        } catch (JWTDecodeFailureException $e) {
            return new JsonResponse(['message' => 'Invalid token'], JsonResponse::HTTP_UNAUTHORIZED);
        } */

        // Récupérer le token depuis le header
        $token = $request->headers->get('Authorization');
        if (!$token)
            throw new AccessDeniedHttpException('No token provided');

        if (strpos($token, 'Bearer ') === 0)
            $token = substr($token, 7);

        try 
        {
            $jwtData = $this->jwtManager->parse($token);
        } 
        catch (JWTDecodeFailureException $e)
        {
            return new JsonResponse(['message' => 'Invalid token'], JsonResponse::HTTP_UNAUTHORIZED);
        }
   

        if ($jwtData['username'] !== $user->getEmail())
            throw new HttpException(JsonResponse::HTTP_UNAUTHORIZED, 'Token does not match user');

        $data = json_decode($request->getContent(), true);
        $code = $data['code'] ?? null;

        if (!$code || $user->getVerificationCode() !== (int)$code)
            return new JsonResponse(['message' => 'Invalid code'], JsonResponse::HTTP_BAD_REQUEST);

        $user->setAccountVerified(true);
        $this->entityManager->flush();

        return new JsonResponse(['message' => 'Account successfully verified']);
    }
}

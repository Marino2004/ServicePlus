<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\CoreExtension;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* emails/registration.html.twig */
class __TwigTemplate_66992e256a70d4d8309b3786d06134b9 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "emails/registration.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "emails/registration.html.twig"));

        // line 2
        yield "Bienvenue sur Service Plus, <b>";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 2, $this->source); })()), "name", [], "any", false, false, false, 2), "html", null, true);
        yield "!</b>

<p>Merci pour votre confiance.</p> 

<p>Veuillez utiliser le code suivant pour vérifier votre compte :</p>
<h4>";
        // line 7
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["verificationCode"]) || array_key_exists("verificationCode", $context) ? $context["verificationCode"] : (function () { throw new RuntimeError('Variable "verificationCode" does not exist.', 7, $this->source); })()), "html", null, true);
        yield "</h4>
";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        return; yield '';
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "emails/registration.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable()
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo()
    {
        return array (  53 => 7,  44 => 2,);
    }

    public function getSourceContext()
    {
        return new Source("{# templates/emails/registration.html.twig #}
Bienvenue sur Service Plus, <b>{{ user.name }}!</b>

<p>Merci pour votre confiance.</p> 

<p>Veuillez utiliser le code suivant pour vérifier votre compte :</p>
<h4>{{ verificationCode }}</h4>
", "emails/registration.html.twig", "/home/ninja/Bureau/INFO/Projets/ServicePlus/ServicePlus/templates/emails/registration.html.twig");
    }
}

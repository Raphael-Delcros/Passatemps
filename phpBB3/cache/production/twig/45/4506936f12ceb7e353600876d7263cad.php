<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* _style_config.html */
class __TwigTemplate_11f60628f529e7ce6afece8aeac2c9f5 extends \Twig\Template
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
        // line 1
        if (twig_get_attribute($this->env, $this->source, ($context["definition"] ?? null), "FALSE", [], "any", false, false, false, 1)) {
            // line 2
            echo "\tVariables below change style behavior.

\tList of variables and values (do not edit!):
\t\tForums list layout:
\t\t\tSTANDARD_FORUMS_LAYOUT = 0\t-> Layout with topics and posts below forum title
\t\t\tSTANDARD_FORUMS_LAYOUT = 1\t-> Default layout with separate columns for topics and posts

\t\tHide forum description:
\t\t\tHIDE_FORUM_DESCRIPTION = 0 -> Always show it
\t\t\tHIDE_FORUM_DESCRIPTION = 1 -> Show it only when hovering forum title

\t\tWrap header / navigation:
\t\t\tWRAP_HEADER = 0 -> Header and navigation will not be included in global wrapper
\t\t\tWRAP_HEADER = 1 -> Both header and navigation will be included in global wrapper
\t\t\tWRAP_HEADER = 2 -> Header will not be included in global wrapper, navigation will be included

\t\tWrap footer:
\t\t\tWRAP_FOOTER = 0 -> Footer will be outside of content wrapper
\t\t\tWRAP_FOOTER = 1 -> Footer will be inside content wrapper

\t\tQuick search position:
\t\t\tSEARCH_IN_NAVBAR = 0 -> Search bar will be displayed in header
\t\t\tSEARCH_IN_NAVBAR = 1 -> Search bar will be displayed in secondary navigation

\t\tForums tab:
\t\t\tFORUMS_TAB_IN_NAVBAR = 0 -> Do not display the 'Forums' tab in the main navigation bar
\t\t\tFORUMS_TAB_IN_NAVBAR = 1 -> Display the 'Forums' tab in the main navigation bar

\t\tRedundant links in secondary navigation:
\t\t\tREDUNDANT_LINKS_SECONDARY_NAV = 0 -> Do not display redundant links (search, new posts, login, register) in secondary navigation
\t\t\tREDUNDANT_LINKS_SECONDARY_NAV = 1 -> Display redundant links (search, new posts, login, register) in secondary navigation

\tEdit variables below:
";
        }
        // line 36
        echo "
";
        // line 37
        $value = 1;
        $context['definition']->set('STANDARD_FORUMS_LAYOUT', $value);
        // line 38
        $value = 0;
        $context['definition']->set('HIDE_FORUM_DESCRIPTION', $value);
        // line 39
        $value = 2;
        $context['definition']->set('WRAP_HEADER', $value);
        // line 40
        $value = 0;
        $context['definition']->set('WRAP_FOOTER', $value);
        // line 41
        $value = 0;
        $context['definition']->set('SEARCH_IN_NAVBAR', $value);
        // line 42
        $value = 1;
        $context['definition']->set('FORUMS_TAB_IN_NAVBAR', $value);
        // line 43
        $value = 1;
        $context['definition']->set('REDUNDANT_LINKS_SECONDARY_NAV', $value);
        // line 44
        echo "
";
        // line 45
        if (twig_get_attribute($this->env, $this->source, ($context["definition"] ?? null), "FALSE", [], "any", false, false, false, 45)) {
            // line 46
            echo "\tDo not edit code below!
";
        }
    }

    public function getTemplateName()
    {
        return "_style_config.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  104 => 46,  102 => 45,  99 => 44,  96 => 43,  93 => 42,  90 => 41,  87 => 40,  84 => 39,  81 => 38,  78 => 37,  75 => 36,  39 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "_style_config.html", "");
    }
}

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

/* acp_scsscompiler_body.html */
class __TwigTemplate_55f9a4e8fabe107f372e34cd290ad78d extends \Twig\Template
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
        $this->loadTemplate("overall_header.html", "acp_scsscompiler_body.html", 1)->display($context);
        // line 2
        echo "
<h1>";
        // line 3
        echo $this->extensions['phpbb\template\twig\extension']->lang("ACP_SCSSCOMPILER_TITLE");
        echo "</h1>

";
        // line 5
        if (($context["S_ERROR"] ?? null)) {
            // line 6
            echo "\t<div class=\"errorbox\">
\t\t<h3>";
            // line 7
            echo $this->extensions['phpbb\template\twig\extension']->lang("WARNING");
            echo "</h3>
\t\t<p>";
            // line 8
            echo ($context["ERROR_MSG"] ?? null);
            echo "</p>
\t</div>
";
        }
        // line 11
        echo "
<form id=\"phpbbservices_scsscompiler_acp\" name=\"phpbbservices_scsscompiler_acp\" method=\"post\" action=\"";
        // line 12
        echo ($context["U_ACTION"] ?? null);
        echo "\">
\t<p>";
        // line 13
        echo $this->extensions['phpbb\template\twig\extension']->lang("ACP_SCSSCOMPILER_EXPLAIN");
        echo "</p>

\t<fieldset class=\"quick\">
\t\t<p class=\"small\"><a href=\"#\" onclick=\"marklist('phpbbservices_scsscompiler_acp', 's-', true);\">";
        // line 16
        echo $this->extensions['phpbb\template\twig\extension']->lang("MARK_ALL");
        echo "</a> &bull; <a href=\"#\" onclick=\"marklist('phpbbservices_scsscompiler_acp', 's-', false);\">";
        echo $this->extensions['phpbb\template\twig\extension']->lang("UNMARK_ALL");
        echo "</a></p>
\t</fieldset>
\t<fieldset>
\t\t<table>
\t\t\t<tr>
\t\t\t\t<th>";
        // line 21
        echo $this->extensions['phpbb\template\twig\extension']->lang("ACP_SCSSCOMPILER_STYLE_INFO");
        echo "</th>
\t\t\t\t<th class=\"center\">";
        // line 22
        echo $this->extensions['phpbb\template\twig\extension']->lang("ACP_SCSSCOMPILER_OVERRIDE");
        echo "</th>
\t\t\t\t<th>";
        // line 23
        echo $this->extensions['phpbb\template\twig\extension']->lang("ACP_SCSSCOMPILER_SCSS_FILE");
        echo "</th>
\t\t\t\t<th>";
        // line 24
        echo $this->extensions['phpbb\template\twig\extension']->lang("ACP_SCSSCOMPILER_CSS_FILE");
        echo "</th>
\t\t\t\t<th>";
        // line 25
        echo $this->extensions['phpbb\template\twig\extension']->lang("ACP_SCSSCOMPILER_LAST_MODIFIED");
        echo "</th>
\t\t\t\t<th class=\"center\">";
        // line 26
        echo $this->extensions['phpbb\template\twig\extension']->lang("ACP_SCSSCOMPILER_RECOMPILE_STYLE");
        echo "</th>
\t\t\t</tr>
\t\t\t";
        // line 28
        if (($context["styles"] ?? null)) {
            // line 29
            echo "\t\t\t";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["styles"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["style"]) {
                // line 30
                echo "\t\t\t<tr class=\"";
                if ((twig_get_attribute($this->env, $this->source, $context["style"], "S_ROW_COUNT", [], "any", false, false, false, 30) % 2 == 0)) {
                    echo "row1";
                } else {
                    echo "row2";
                }
                if (twig_get_attribute($this->env, $this->source, $context["style"], "S_ACP_SCSSCOMPILER_INACTIVE", [], "any", false, false, false, 30)) {
                    echo " row-inactive";
                }
                echo "\">
\t\t\t\t<td>";
                // line 31
                if (twig_get_attribute($this->env, $this->source, $context["style"], "S_ACP_SCSSCOMPILER_RECOMPILE", [], "any", false, false, false, 31)) {
                    echo "<span style=\"font-weight: bold;\">";
                }
                echo twig_get_attribute($this->env, $this->source, $context["style"], "ACP_SCSSCOMPILER_NAME", [], "any", false, false, false, 31);
                if (twig_get_attribute($this->env, $this->source, $context["style"], "S_ACP_SCSSCOMPILER_RECOMPILE", [], "any", false, false, false, 31)) {
                    echo "</span>";
                }
                echo "</td>
\t\t\t\t<td class=\"center\">";
                // line 32
                echo twig_get_attribute($this->env, $this->source, $context["style"], "ACP_SCSSCOMPILER_YES_NO", [], "any", false, false, false, 32);
                echo "</td>
\t\t\t\t<td><select id=\"scss-";
                // line 33
                echo twig_get_attribute($this->env, $this->source, $context["style"], "ACP_SCSSCOMPILER_ID", [], "any", false, false, false, 33);
                echo "\" name=\"scss-";
                echo twig_get_attribute($this->env, $this->source, $context["style"], "ACP_SCSSCOMPILER_ID", [], "any", false, false, false, 33);
                echo "\">";
                echo twig_get_attribute($this->env, $this->source, $context["style"], "ACP_SCSSCOMPILER_SCSS_SELECT", [], "any", false, false, false, 33);
                echo "</select></td>
\t\t\t\t<td><select id=\"css-";
                // line 34
                echo twig_get_attribute($this->env, $this->source, $context["style"], "ACP_SCSSCOMPILER_ID", [], "any", false, false, false, 34);
                echo "\" name=\"css-";
                echo twig_get_attribute($this->env, $this->source, $context["style"], "ACP_SCSSCOMPILER_ID", [], "any", false, false, false, 34);
                echo "\">";
                echo twig_get_attribute($this->env, $this->source, $context["style"], "ACP_SCSSCOMPILER_CSS_SELECT", [], "any", false, false, false, 34);
                echo "</select></td>
\t\t\t\t<td>";
                // line 35
                echo twig_get_attribute($this->env, $this->source, $context["style"], "ACP_SCSSCOMPILER_CSS_TIME", [], "any", false, false, false, 35);
                echo "</td>
\t\t\t\t<td class=\"center\"><input type=\"checkbox\" name=\"s-";
                // line 36
                echo twig_get_attribute($this->env, $this->source, $context["style"], "ACP_SCSSCOMPILER_ID", [], "any", false, false, false, 36);
                echo "\"></td>
\t\t\t</tr>
\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['style'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 39
            echo "\t\t\t";
        } else {
            // line 40
            echo "\t\t\t<tr>
\t\t\t\t<td colspan=\"6\" class=\"center\">";
            // line 41
            echo $this->extensions['phpbb\template\twig\extension']->lang("ACP_SCSSCOMPILER_NO_SCSS_STYLES");
            echo "</td>
\t\t\t</tr>
\t\t\t";
        }
        // line 44
        echo "\t\t</table>
\t</fieldset>
\t<fieldset class=\"quick\">
\t\t<p class=\"small\"><a href=\"#\" onclick=\"marklist('phpbbservices_scsscompiler_acp', 's-', true);\">";
        // line 47
        echo $this->extensions['phpbb\template\twig\extension']->lang("MARK_ALL");
        echo "</a> &bull; <a href=\"#\" onclick=\"marklist('phpbbservices_scsscompiler_acp', 's-', false);\">";
        echo $this->extensions['phpbb\template\twig\extension']->lang("UNMARK_ALL");
        echo "</a></p>
\t</fieldset>
\t<fieldset class=\"submit-buttons\">
\t\t<input class=\"button1\" type=\"submit\" id=\"submit\" name=\"submit\" value=\"";
        // line 50
        echo $this->extensions['phpbb\template\twig\extension']->lang("ACP_SCSSCOMPILER_RECOMPILE_CHECKED");
        echo "\" />&nbsp;
\t\t";
        // line 51
        echo ($context["S_FORM_TOKEN"] ?? null);
        echo "
\t</fieldset>

</form>

";
        // line 56
        $this->loadTemplate("overall_footer.html", "acp_scsscompiler_body.html", 56)->display($context);
    }

    public function getTemplateName()
    {
        return "acp_scsscompiler_body.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  209 => 56,  201 => 51,  197 => 50,  189 => 47,  184 => 44,  178 => 41,  175 => 40,  172 => 39,  163 => 36,  159 => 35,  151 => 34,  143 => 33,  139 => 32,  129 => 31,  117 => 30,  112 => 29,  110 => 28,  105 => 26,  101 => 25,  97 => 24,  93 => 23,  89 => 22,  85 => 21,  75 => 16,  69 => 13,  65 => 12,  62 => 11,  56 => 8,  52 => 7,  49 => 6,  47 => 5,  42 => 3,  39 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "acp_scsscompiler_body.html", "");
    }
}

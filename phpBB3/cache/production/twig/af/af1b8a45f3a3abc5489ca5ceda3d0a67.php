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

/* index_body.html */
class __TwigTemplate_d00a585da5ff4643679e378b17190f8c extends \Twig\Template
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
        ob_start();
        // line 2
        echo "\t";
        if (($context["U_MARK_FORUMS"] ?? null)) {
            // line 3
            echo "\t\t<li class=\"small-icon icon-mark\"><a href=\"";
            echo ($context["U_MARK_FORUMS"] ?? null);
            echo "\" accesskey=\"m\" data-ajax=\"mark_forums_read\">";
            echo $this->extensions['phpbb\template\twig\extension']->lang("MARK_FORUMS_READ");
            echo "</a></li>
\t\t";
            // line 4
            $value = 1;
            $context['definition']->set('NAVLINKS_SHOW_DEFAULT', $value);
            // line 5
            echo "\t";
        }
        $value = ('' === $value = ob_get_clean()) ? '' : new \Twig\Markup($value, $this->env->getCharset());
        $context['definition']->set('NAVLINKS', $value);
        // line 7
        $location = "overall_header.html";
        $namespace = false;
        if (strpos($location, '@') === 0) {
            $namespace = substr($location, 1, strpos($location, '/') - 1);
            $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
            $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
        }
        $this->loadTemplate("overall_header.html", "index_body.html", 7)->display($context);
        if ($namespace) {
            $this->env->setNamespaceLookUpOrder($previous_look_up_order);
        }
        // line 8
        echo "
";
        // line 9
        // line 10
        // line 11
        echo "
";
        // line 12
        $location = "forumlist_body.html";
        $namespace = false;
        if (strpos($location, '@') === 0) {
            $namespace = substr($location, 1, strpos($location, '/') - 1);
            $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
            $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
        }
        $this->loadTemplate("forumlist_body.html", "index_body.html", 12)->display($context);
        if ($namespace) {
            $this->env->setNamespaceLookUpOrder($previous_look_up_order);
        }
        // line 13
        echo "
";
        // line 14
        // line 15
        echo "
";
        // line 16
        if (( !($context["S_USER_LOGGED_IN"] ?? null) &&  !($context["S_IS_BOT"] ?? null))) {
            // line 17
            echo "\t<form method=\"post\" action=\"";
            echo ($context["S_LOGIN_ACTION"] ?? null);
            echo "\" class=\"headerspace\">
\t<h3><a href=\"";
            // line 18
            echo ($context["U_LOGIN_LOGOUT"] ?? null);
            echo "\">";
            echo $this->extensions['phpbb\template\twig\extension']->lang("LOGIN_LOGOUT");
            echo "</a>";
            if (($context["S_REGISTER_ENABLED"] ?? null)) {
                echo "&nbsp; &bull; &nbsp;<a href=\"";
                echo ($context["U_REGISTER"] ?? null);
                echo "\">";
                echo $this->extensions['phpbb\template\twig\extension']->lang("REGISTER");
                echo "</a>";
            }
            echo "</h3>
\t\t<fieldset class=\"quick-login\">
\t\t\t<label for=\"username\"><span>";
            // line 20
            echo ($this->extensions['phpbb\template\twig\extension']->lang("USERNAME") . $this->extensions['phpbb\template\twig\extension']->lang("COLON"));
            echo "</span> <input type=\"text\" tabindex=\"1\" name=\"username\" id=\"username\" size=\"10\" class=\"inputbox\" title=\"";
            echo $this->extensions['phpbb\template\twig\extension']->lang("USERNAME");
            echo "\" autocomplete=\"username\" /></label>
\t\t\t<label for=\"password\"><span>";
            // line 21
            echo ($this->extensions['phpbb\template\twig\extension']->lang("PASSWORD") . $this->extensions['phpbb\template\twig\extension']->lang("COLON"));
            echo "</span> <input type=\"password\" tabindex=\"2\" name=\"password\" id=\"password\" size=\"10\" class=\"inputbox\" title=\"";
            echo $this->extensions['phpbb\template\twig\extension']->lang("PASSWORD");
            echo "\" autocomplete=\"current-password\" /></label>
\t\t\t";
            // line 22
            if (($context["U_SEND_PASSWORD"] ?? null)) {
                // line 23
                echo "\t\t\t\t<a href=\"";
                echo ($context["U_SEND_PASSWORD"] ?? null);
                echo "\">";
                echo $this->extensions['phpbb\template\twig\extension']->lang("FORGOT_PASS");
                echo "</a>
\t\t\t";
            }
            // line 25
            echo "\t\t\t";
            if (($context["S_AUTOLOGIN_ENABLED"] ?? null)) {
                // line 26
                echo "\t\t\t\t<span class=\"responsive-hide\">|</span> <label for=\"autologin\">";
                echo $this->extensions['phpbb\template\twig\extension']->lang("LOG_ME_IN");
                echo " <input type=\"checkbox\" tabindex=\"4\" name=\"autologin\" id=\"autologin\" /></label>
\t\t\t";
            }
            // line 28
            echo "\t\t\t<input type=\"submit\" tabindex=\"5\" name=\"login\" value=\"";
            echo $this->extensions['phpbb\template\twig\extension']->lang("LOGIN");
            echo "\" class=\"button2\" />
\t\t\t";
            // line 29
            echo ($context["S_LOGIN_REDIRECT"] ?? null);
            echo "
\t\t\t";
            // line 30
            echo ($context["S_FORM_TOKEN_LOGIN"] ?? null);
            echo "
\t\t</fieldset>
\t</form>
";
        }
        // line 34
        echo "
";
        // line 35
        // line 36
        echo "
";
        // line 37
        if (($context["S_DISPLAY_ONLINE_LIST"] ?? null)) {
            // line 38
            echo "\t<div class=\"stat-block online-list\">
\t\t";
            // line 39
            if (($context["U_VIEWONLINE"] ?? null)) {
                echo "<h3><a href=\"";
                echo ($context["U_VIEWONLINE"] ?? null);
                echo "\">";
                echo $this->extensions['phpbb\template\twig\extension']->lang("WHO_IS_ONLINE");
                echo "</a></h3>";
            } else {
                echo "<h3>";
                echo $this->extensions['phpbb\template\twig\extension']->lang("WHO_IS_ONLINE");
                echo "</h3>";
            }
            // line 40
            echo "\t\t<p>
\t\t\t";
            // line 41
            // line 42
            echo "\t\t\t";
            echo ($context["TOTAL_USERS_ONLINE"] ?? null);
            echo " (";
            echo $this->extensions['phpbb\template\twig\extension']->lang("ONLINE_EXPLAIN");
            echo ")<br />";
            echo ($context["RECORD_USERS"] ?? null);
            echo "<br />
\t\t\t";
            // line 43
            if (($context["U_VIEWONLINE"] ?? null)) {
                // line 44
                echo "\t\t\t\t<br />";
                echo ($context["LOGGED_IN_USER_LIST"] ?? null);
                echo "
\t\t\t\t";
                // line 45
                if (($context["LEGEND"] ?? null)) {
                    echo "<br /><em>";
                    echo ($this->extensions['phpbb\template\twig\extension']->lang("LEGEND") . $this->extensions['phpbb\template\twig\extension']->lang("COLON"));
                    echo " ";
                    echo ($context["LEGEND"] ?? null);
                    echo "</em>";
                }
                // line 46
                echo "\t\t\t";
            }
            // line 47
            echo "\t\t\t";
            // line 48
            echo "\t\t</p>
\t</div>
";
        }
        // line 51
        echo "
";
        // line 52
        // line 53
        echo "
";
        // line 54
        if (($context["S_DISPLAY_BIRTHDAY_LIST"] ?? null)) {
            // line 55
            echo "\t<div class=\"stat-block birthday-list\">
\t\t<h3>";
            // line 56
            echo $this->extensions['phpbb\template\twig\extension']->lang("BIRTHDAYS");
            echo "</h3>
\t\t<p>
\t\t\t";
            // line 58
            // line 59
            echo "\t\t\t";
            if (twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["loops"] ?? null), "birthdays", [], "any", false, false, false, 59))) {
                echo ($this->extensions['phpbb\template\twig\extension']->lang("CONGRATULATIONS") . $this->extensions['phpbb\template\twig\extension']->lang("COLON"));
                echo " <strong>";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["loops"] ?? null), "birthdays", [], "any", false, false, false, 59));
                foreach ($context['_seq'] as $context["_key"] => $context["birthdays"]) {
                    echo twig_get_attribute($this->env, $this->source, $context["birthdays"], "USERNAME", [], "any", false, false, false, 59);
                    if ((twig_get_attribute($this->env, $this->source, $context["birthdays"], "AGE", [], "any", false, false, false, 59) !== "")) {
                        echo " (";
                        echo twig_get_attribute($this->env, $this->source, $context["birthdays"], "AGE", [], "any", false, false, false, 59);
                        echo ")";
                    }
                    if ( !twig_get_attribute($this->env, $this->source, $context["birthdays"], "S_LAST_ROW", [], "any", false, false, false, 59)) {
                        echo ", ";
                    }
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['birthdays'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                echo "</strong>";
            } else {
                echo $this->extensions['phpbb\template\twig\extension']->lang("NO_BIRTHDAYS");
            }
            // line 60
            echo "\t\t\t";
            // line 61
            echo "\t\t</p>
\t</div>
";
        }
        // line 64
        echo "
";
        // line 65
        if (($context["NEWEST_USER"] ?? null)) {
            // line 66
            echo "\t<div class=\"stat-block statistics\">
\t\t<h3>";
            // line 67
            echo $this->extensions['phpbb\template\twig\extension']->lang("STATISTICS");
            echo "</h3>
\t\t<p>
\t\t\t";
            // line 69
            // line 70
            echo "\t\t\t";
            echo ($context["TOTAL_POSTS"] ?? null);
            echo " &bull; ";
            echo ($context["TOTAL_TOPICS"] ?? null);
            echo " &bull; ";
            echo ($context["TOTAL_USERS"] ?? null);
            echo " &bull; ";
            echo ($context["NEWEST_USER"] ?? null);
            echo "
\t\t\t";
            // line 71
            // line 72
            echo "\t\t</p>
\t</div>
";
        }
        // line 75
        echo "
";
        // line 76
        // line 77
        echo "
";
        // line 78
        $location = "overall_footer.html";
        $namespace = false;
        if (strpos($location, '@') === 0) {
            $namespace = substr($location, 1, strpos($location, '/') - 1);
            $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
            $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
        }
        $this->loadTemplate("overall_footer.html", "index_body.html", 78)->display($context);
        if ($namespace) {
            $this->env->setNamespaceLookUpOrder($previous_look_up_order);
        }
    }

    public function getTemplateName()
    {
        return "index_body.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  315 => 78,  312 => 77,  311 => 76,  308 => 75,  303 => 72,  302 => 71,  291 => 70,  290 => 69,  285 => 67,  282 => 66,  280 => 65,  277 => 64,  272 => 61,  270 => 60,  245 => 59,  244 => 58,  239 => 56,  236 => 55,  234 => 54,  231 => 53,  230 => 52,  227 => 51,  222 => 48,  220 => 47,  217 => 46,  209 => 45,  204 => 44,  202 => 43,  193 => 42,  192 => 41,  189 => 40,  177 => 39,  174 => 38,  172 => 37,  169 => 36,  168 => 35,  165 => 34,  158 => 30,  154 => 29,  149 => 28,  143 => 26,  140 => 25,  132 => 23,  130 => 22,  124 => 21,  118 => 20,  103 => 18,  98 => 17,  96 => 16,  93 => 15,  92 => 14,  89 => 13,  77 => 12,  74 => 11,  73 => 10,  72 => 9,  69 => 8,  57 => 7,  52 => 5,  49 => 4,  42 => 3,  39 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "index_body.html", "");
    }
}

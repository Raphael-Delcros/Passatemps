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

/* navbar_header.html */
class __TwigTemplate_094bbe6a50dab37986d2565b44b18fd2 extends \Twig\Template
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
        ob_start(function () { return ''; });
        // line 2
        echo "\t";
        // line 3
        echo "
\t";
        // line 4
        if (($context["S_DISPLAY_SEARCH"] ?? null)) {
            // line 5
            echo "\t\t<li class=\"separator\"></li>
\t\t";
            // line 6
            if (($context["S_REGISTERED_USER"] ?? null)) {
                // line 7
                echo "\t\t\t<li>
\t\t\t\t<a href=\"";
                // line 8
                echo ($context["U_SEARCH_SELF"] ?? null);
                echo "\" role=\"menuitem\">
\t\t\t\t\t<i class=\"icon fa-file-o fa-fw icon-gray\" aria-hidden=\"true\"></i><span>";
                // line 9
                echo $this->extensions['phpbb\template\twig\extension']->lang("SEARCH_SELF");
                echo "</span>
\t\t\t\t</a>
\t\t\t</li>
\t\t";
            }
            // line 13
            echo "\t\t";
            if (($context["S_USER_LOGGED_IN"] ?? null)) {
                // line 14
                echo "\t\t\t<li>
\t\t\t\t<a href=\"";
                // line 15
                echo ($context["U_SEARCH_NEW"] ?? null);
                echo "\" role=\"menuitem\">
\t\t\t\t\t<i class=\"icon fa-file-o fa-fw icon-red\" aria-hidden=\"true\"></i><span>";
                // line 16
                echo $this->extensions['phpbb\template\twig\extension']->lang("SEARCH_NEW");
                echo "</span>
\t\t\t\t</a>
\t\t\t</li>
\t\t";
            }
            // line 20
            echo "\t\t";
            if (($context["S_LOAD_UNREADS"] ?? null)) {
                // line 21
                echo "\t\t\t<li>
\t\t\t\t<a href=\"";
                // line 22
                echo ($context["U_SEARCH_UNREAD"] ?? null);
                echo "\" role=\"menuitem\">
\t\t\t\t\t<i class=\"icon fa-file-o fa-fw icon-red\" aria-hidden=\"true\"></i><span>";
                // line 23
                echo $this->extensions['phpbb\template\twig\extension']->lang("SEARCH_UNREAD");
                echo "</span>
\t\t\t\t</a>
\t\t\t</li>
\t\t";
            }
            // line 27
            echo "\t\t\t<li>
\t\t\t\t<a href=\"";
            // line 28
            echo ($context["U_SEARCH_UNANSWERED"] ?? null);
            echo "\" role=\"menuitem\">
\t\t\t\t\t<i class=\"icon fa-file-o fa-fw icon-gray\" aria-hidden=\"true\"></i><span>";
            // line 29
            echo $this->extensions['phpbb\template\twig\extension']->lang("SEARCH_UNANSWERED");
            echo "</span>
\t\t\t\t</a>
\t\t\t</li>
\t\t\t<li>
\t\t\t\t<a href=\"";
            // line 33
            echo ($context["U_SEARCH_ACTIVE_TOPICS"] ?? null);
            echo "\" role=\"menuitem\">
\t\t\t\t\t<i class=\"icon fa-file-o fa-fw icon-blue\" aria-hidden=\"true\"></i><span>";
            // line 34
            echo $this->extensions['phpbb\template\twig\extension']->lang("SEARCH_ACTIVE_TOPICS");
            echo "</span>
\t\t\t\t</a>
\t\t\t</li>
\t\t\t<li class=\"separator\"></li>
\t\t\t<li>
\t\t\t\t<a href=\"";
            // line 39
            echo ($context["U_SEARCH"] ?? null);
            echo "\" role=\"menuitem\">
\t\t\t\t\t<i class=\"icon fa-search fa-fw\" aria-hidden=\"true\"></i><span>";
            // line 40
            echo $this->extensions['phpbb\template\twig\extension']->lang("SEARCH");
            echo "</span>
\t\t\t\t</a>
\t\t\t</li>
\t";
        }
        $context["quick_links_first_block"] = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 45
        echo "
";
        // line 46
        ob_start(function () { return ''; });
        // line 47
        echo "\t";
        $context["quick_links_last_block"] = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 49
        echo "
";
        // line 50
        ob_start(function () { return ''; });
        echo twig_trim_filter(($context["quick_links_first_block"] ?? null));
        echo twig_trim_filter(($context["quick_links_last_block"] ?? null));
        $context["quick_links_all"] = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 51
        echo "
<div class=\"navbar tabbed not-static\" role=\"navigation\">
\t<div class=\"inner page-width\">
\t\t<div class=\"nav-tabs\" data-current-page=\"";
        // line 54
        if (twig_get_attribute($this->env, $this->source, ($context["definition"] ?? null), "NAV_SECTION", [], "any", false, false, false, 54)) {
            echo twig_get_attribute($this->env, $this->source, ($context["definition"] ?? null), "NAV_SECTION", [], "any", false, false, false, 54);
        } else {
            echo ($context["SCRIPT_NAME"] ?? null);
        }
        echo "\">
\t\t\t<ul class=\"leftside\">
\t\t\t\t<li id=\"quick-links\" class=\"quick-links tab responsive-menu dropdown-container";
        // line 56
        if ((($context["quick_links_all"] ?? null) == "")) {
            echo " empty";
        }
        echo "\">
\t\t\t\t\t<a href=\"#\" class=\"nav-link dropdown-trigger\">";
        // line 57
        echo $this->extensions['phpbb\template\twig\extension']->lang("QUICK_LINKS");
        echo "</a>
\t\t\t\t\t<div class=\"dropdown\">
\t\t\t\t\t\t<div class=\"pointer\"><div class=\"pointer-inner\"></div></div>
\t\t\t\t\t\t<ul class=\"dropdown-contents\" role=\"menu\">
\t\t\t\t\t\t\t";
        // line 61
        echo ($context["quick_links_first_block"] ?? null);
        echo "
\t\t\t\t\t\t\t";
        // line 62
        if (twig_trim_filter(($context["quick_links_last_block"] ?? null))) {
            // line 63
            echo "\t\t\t\t\t\t\t\t<li class=\"separator\"></li>
\t\t\t\t\t\t\t\t";
            // line 64
            echo ($context["quick_links_last_block"] ?? null);
            echo "
\t\t\t\t\t\t\t";
        }
        // line 66
        echo "\t\t\t\t\t\t</ul>
\t\t\t\t\t</div>
\t\t\t\t</li>
\t\t\t\t";
        // line 69
        // line 70
        echo "\t\t\t\t";
        if (($context["U_SITE_HOME"] ?? null)) {
            // line 71
            echo "\t\t\t\t\t<li class=\"tab home\" data-responsive-class=\"small-icon icon-home\">
\t\t\t\t\t\t<a class=\"nav-link\" href=\"";
            // line 72
            echo ($context["U_SITE_HOME"] ?? null);
            echo "\" data-navbar-reference=\"home\">";
            echo $this->extensions['phpbb\template\twig\extension']->lang("SITE_HOME");
            echo "</a>
\t\t\t\t\t</li>
\t\t\t\t";
        }
        // line 75
        echo "\t\t\t\t";
        if ((twig_get_attribute($this->env, $this->source, ($context["definition"] ?? null), "FORUMS_TAB_IN_NAVBAR", [], "any", false, false, false, 75) == 1)) {
            // line 76
            echo "\t\t\t\t<li class=\"tab forums selected\" data-responsive-class=\"small-icon icon-forums\">
\t\t\t\t\t<a class=\"nav-link\" href=\"";
            // line 77
            echo ($context["U_INDEX"] ?? null);
            echo "\">";
            echo $this->extensions['phpbb\template\twig\extension']->lang("FORUMS");
            echo "</a>
\t\t\t\t</li>
\t\t\t\t";
        }
        // line 80
        echo "\t\t\t\t";
        if (( !($context["S_IS_BOT"] ?? null) && (($context["S_DISPLAY_MEMBERLIST"] ?? null) || ($context["U_TEAM"] ?? null)))) {
            // line 81
            echo "\t\t\t\t\t<li class=\"tab members dropdown-container\" data-select-match=\"member\" data-responsive-class=\"small-icon icon-members\">
\t\t\t\t\t\t<a class=\"nav-link dropdown-trigger\" href=\"";
            // line 82
            echo ($context["U_MEMBERLIST"] ?? null);
            echo "\">";
            echo $this->extensions['phpbb\template\twig\extension']->lang("MEMBERLIST");
            echo "</a>
\t\t\t\t\t\t<div class=\"dropdown\">
\t\t\t\t\t\t\t<div class=\"pointer\"><div class=\"pointer-inner\"></div></div>
\t\t\t\t\t\t\t<ul class=\"dropdown-contents\" role=\"menu\">
\t\t\t\t\t\t\t\t";
            // line 86
            if (($context["S_DISPLAY_MEMBERLIST"] ?? null)) {
                // line 87
                echo "\t\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t\t<a href=\"";
                // line 88
                echo ($context["U_MEMBERLIST"] ?? null);
                echo "\" role=\"menuitem\">
\t\t\t\t\t\t\t\t\t\t\t<i class=\"icon fa-group fa-fw\" aria-hidden=\"true\"></i><span>";
                // line 89
                echo $this->extensions['phpbb\template\twig\extension']->lang("MEMBERLIST");
                echo "</span>
\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t";
            }
            // line 93
            echo "\t\t\t\t\t\t\t\t";
            if (($context["U_TEAM"] ?? null)) {
                // line 94
                echo "\t\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t\t<a href=\"";
                // line 95
                echo ($context["U_TEAM"] ?? null);
                echo "\" role=\"menuitem\">
\t\t\t\t\t\t\t\t\t\t\t<i class=\"icon fa-shield fa-fw\" aria-hidden=\"true\"></i><span>";
                // line 96
                echo $this->extensions['phpbb\template\twig\extension']->lang("THE_TEAM");
                echo "</span>
\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t";
            }
            // line 100
            echo "\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t</div>
\t\t\t\t\t</li>
\t\t\t\t";
        }
        // line 104
        echo "\t\t\t\t";
        // line 105
        echo "\t\t\t</ul>
\t\t\t<ul class=\"rightside\" role=\"menu\">
\t\t\t\t";
        // line 107
        // line 108
        echo "\t\t\t\t<li class=\"tab faq\" data-select-match=\"faq\" data-responsive-class=\"small-icon icon-faq\">
\t\t\t\t\t<a class=\"nav-link\" href=\"";
        // line 109
        echo ($context["U_FAQ"] ?? null);
        echo "\" rel=\"help\" title=\"";
        echo $this->extensions['phpbb\template\twig\extension']->lang("FAQ_EXPLAIN");
        echo "\" role=\"menuitem\">
\t\t\t\t\t\t<i class=\"icon fa-question-circle fa-fw\" aria-hidden=\"true\"></i><span>";
        // line 110
        echo $this->extensions['phpbb\template\twig\extension']->lang("FAQ");
        echo "</span>
\t\t\t\t\t</a>
\t\t\t\t</li>
\t\t\t\t";
        // line 113
        // line 114
        echo "\t\t\t\t";
        if (($context["U_ACP"] ?? null)) {
            // line 115
            echo "\t\t\t\t\t<li class=\"tab acp\" data-last-responsive=\"true\">
\t\t\t\t\t\t<a class=\"nav-link\" href=\"";
            // line 116
            echo ($context["U_ACP"] ?? null);
            echo "\" title=\"";
            echo $this->extensions['phpbb\template\twig\extension']->lang("ACP");
            echo "\" role=\"menuitem\">
\t\t\t\t\t\t\t<i class=\"icon fa-cogs fa-fw\" aria-hidden=\"true\"></i><span>";
            // line 117
            echo $this->extensions['phpbb\template\twig\extension']->lang("ACP_SHORT");
            echo "</span>
\t\t\t\t\t\t</a>
\t\t\t\t\t</li>
\t\t\t\t";
        }
        // line 121
        echo "\t\t\t\t";
        if (($context["U_MCP"] ?? null)) {
            // line 122
            echo "\t\t\t\t\t<li class=\"tab mcp\" data-last-responsive=\"true\" data-select-match=\"mcp\">
\t\t\t\t\t\t<a class=\"nav-link\" href=\"";
            // line 123
            echo ($context["U_MCP"] ?? null);
            echo "\" title=\"";
            echo $this->extensions['phpbb\template\twig\extension']->lang("MCP");
            echo "\" role=\"menuitem\">
\t\t\t\t\t\t\t<i class=\"icon fa-gavel fa-fw\" aria-hidden=\"true\"></i><span>";
            // line 124
            echo $this->extensions['phpbb\template\twig\extension']->lang("MCP_SHORT");
            echo "</span>
\t\t\t\t\t\t</a>
\t\t\t\t\t</li>
\t\t\t\t";
        }
        // line 128
        echo "\t\t\t\t";
        if (($context["S_REGISTERED_USER"] ?? null)) {
            // line 129
            echo "\t\t\t\t\t";
            // line 130
            echo "\t\t\t\t\t<li id=\"username_logged_in\" class=\"tab account dropdown-container\" data-skip-responsive=\"true\" data-select-match=\"ucp\">
\t\t\t\t\t\t";
            // line 131
            echo "\t\t\t\t\t\t<a href=\"";
            echo ($context["U_PROFILE"] ?? null);
            echo "\" class=\"nav-link dropdown-trigger\">";
            echo ($context["CURRENT_USERNAME_SIMPLE"] ?? null);
            echo "</a>
\t\t\t\t\t\t<div class=\"dropdown\">
\t\t\t\t\t\t\t<div class=\"pointer\"><div class=\"pointer-inner\"></div></div>
\t\t\t\t\t\t\t<ul class=\"dropdown-contents\" role=\"menu\">
\t\t\t\t\t\t\t\t";
            // line 135
            if (($context["U_RESTORE_PERMISSIONS"] ?? null)) {
                // line 136
                echo "\t\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t\t<a href=\"";
                // line 137
                echo ($context["U_RESTORE_PERMISSIONS"] ?? null);
                echo "\">
\t\t\t\t\t\t\t\t\t\t\t<i class=\"icon fa-refresh fa-fw\" aria-hidden=\"true\"></i><span>";
                // line 138
                echo $this->extensions['phpbb\template\twig\extension']->lang("RESTORE_PERMISSIONS");
                echo "</span>
\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t";
            }
            // line 142
            echo "
\t\t\t\t\t\t\t\t";
            // line 143
            // line 144
            echo "
\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t<a href=\"";
            // line 146
            echo ($context["U_PROFILE"] ?? null);
            echo "\" title=\"";
            echo $this->extensions['phpbb\template\twig\extension']->lang("PROFILE");
            echo "\" role=\"menuitem\">
\t\t\t\t\t\t\t\t\t\t<i class=\"icon fa-sliders fa-fw\" aria-hidden=\"true\"></i><span>";
            // line 147
            echo $this->extensions['phpbb\template\twig\extension']->lang("PROFILE");
            echo "</span>
\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t";
            // line 150
            if (($context["U_USER_PROFILE"] ?? null)) {
                // line 151
                echo "\t\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t\t<a href=\"";
                // line 152
                echo ($context["U_USER_PROFILE"] ?? null);
                echo "\" title=\"";
                echo $this->extensions['phpbb\template\twig\extension']->lang("READ_PROFILE");
                echo "\" role=\"menuitem\">
\t\t\t\t\t\t\t\t\t\t\t<i class=\"icon fa-user fa-fw\" aria-hidden=\"true\"></i><span>";
                // line 153
                echo $this->extensions['phpbb\template\twig\extension']->lang("READ_PROFILE");
                echo "</span>
\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t";
            }
            // line 157
            echo "
\t\t\t\t\t\t\t\t";
            // line 158
            // line 159
            echo "
\t\t\t\t\t\t\t\t<li class=\"separator\"></li>
\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t<a href=\"";
            // line 162
            echo ($context["U_LOGIN_LOGOUT"] ?? null);
            echo "\" title=\"";
            echo $this->extensions['phpbb\template\twig\extension']->lang("LOGIN_LOGOUT");
            echo "\" accesskey=\"x\" role=\"menuitem\">
\t\t\t\t\t\t\t\t\t\t<i class=\"icon fa-power-off fa-fw\" aria-hidden=\"true\"></i><span>";
            // line 163
            echo $this->extensions['phpbb\template\twig\extension']->lang("LOGIN_LOGOUT");
            echo "</span>
\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t</li>

\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t";
            // line 169
            // line 170
            echo "\t\t\t\t\t</li>
\t\t\t\t\t";
            // line 171
            if (($context["S_DISPLAY_PM"] ?? null)) {
                // line 172
                echo "\t\t\t\t\t\t<li class=\"tab pm";
                if ((($context["PRIVATE_MESSAGE_COUNT"] ?? null) > 0)) {
                    echo " non-zero";
                }
                echo "\" data-skip-responsive=\"true\" data-select-match=\"pm\">
\t\t\t\t\t\t\t<a class=\"nav-link\" href=\"";
                // line 173
                echo ($context["U_PRIVATEMSGS"] ?? null);
                echo "\" role=\"menuitem\">
\t\t\t\t\t\t\t\t<i class=\"icon fa-inbox fa-fw\" aria-hidden=\"true\"></i><span>";
                // line 174
                echo $this->extensions['phpbb\template\twig\extension']->lang("PRIVATE_MESSAGES");
                echo "</span>
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t<strong>
\t\t\t\t\t\t\t\t<span class=\"counter\">";
                // line 177
                echo ($context["PRIVATE_MESSAGE_COUNT"] ?? null);
                echo "</span>
\t\t\t\t\t\t\t\t<span class=\"arrow\"></span>
\t\t\t\t\t\t\t</strong>
\t\t\t\t\t\t</li>
\t\t\t\t\t";
            }
            // line 182
            echo "\t\t\t\t\t";
            if (($context["S_NOTIFICATIONS_DISPLAY"] ?? null)) {
                // line 183
                echo "\t\t\t\t\t\t<li class=\"tab notifications dropdown-container";
                if ((($context["NOTIFICATIONS_COUNT"] ?? null) > 0)) {
                    echo " non-zero";
                }
                echo "\" data-skip-responsive=\"true\" data-select-match=\"notifications\">
\t\t\t\t\t\t\t<a href=\"";
                // line 184
                echo ($context["U_VIEW_ALL_NOTIFICATIONS"] ?? null);
                echo "\" id=\"notification_list_button\" class=\"nav-link dropdown-trigger\">
\t\t\t\t\t\t\t\t<i class=\"icon fa-bell fa-fw\" aria-hidden=\"true\"></i><span>";
                // line 185
                echo $this->extensions['phpbb\template\twig\extension']->lang("NOTIFICATIONS");
                echo "</span>
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t<strong>
\t\t\t\t\t\t\t\t<span class=\"counter\">";
                // line 188
                echo ($context["NOTIFICATIONS_COUNT"] ?? null);
                echo "</span>
\t\t\t\t\t\t\t\t<span class=\"arrow\"></span>
\t\t\t\t\t\t\t</strong>
\t\t\t\t\t\t\t";
                // line 191
                $location = "notification_dropdown.html";
                $namespace = false;
                if (strpos($location, '@') === 0) {
                    $namespace = substr($location, 1, strpos($location, '/') - 1);
                    $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
                    $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
                }
                $this->loadTemplate("notification_dropdown.html", "navbar_header.html", 191)->display($context);
                if ($namespace) {
                    $this->env->setNamespaceLookUpOrder($previous_look_up_order);
                }
                // line 192
                echo "\t\t\t\t\t\t</li>
\t\t\t\t\t";
            }
            // line 194
            echo "\t\t\t\t\t";
            // line 195
            echo "\t\t\t\t";
        }
        // line 196
        echo "\t\t\t\t";
        if (($context["S_REGISTERED_USER"] ?? null)) {
            // line 197
            echo "\t\t\t\t\t<li class=\"tab logout\"  data-skip-responsive=\"true\"><a class=\"nav-link\" href=\"";
            echo ($context["U_LOGIN_LOGOUT"] ?? null);
            echo "\" title=\"";
            echo $this->extensions['phpbb\template\twig\extension']->lang("LOGIN_LOGOUT");
            echo "\" accesskey=\"x\" role=\"menuitem\">";
            echo $this->extensions['phpbb\template\twig\extension']->lang("LOGIN_LOGOUT");
            echo "</a></li>
\t\t\t\t";
        } elseif ( !        // line 198
($context["S_IS_BOT"] ?? null)) {
            // line 199
            echo "\t\t\t\t\t<li class=\"tab login\"  data-skip-responsive=\"true\" data-select-match=\"login\"><a class=\"nav-link\" href=\"";
            echo ($context["U_LOGIN_LOGOUT"] ?? null);
            echo "\" title=\"";
            echo $this->extensions['phpbb\template\twig\extension']->lang("LOGIN_LOGOUT");
            echo "\" accesskey=\"x\" role=\"menuitem\">";
            echo $this->extensions['phpbb\template\twig\extension']->lang("LOGIN_LOGOUT");
            echo "</a></li>
\t\t\t\t\t";
            // line 200
            if (($context["S_REGISTER_ENABLED"] ?? null)) {
                // line 201
                echo "\t\t\t\t\t\t<li class=\"tab register\" data-skip-responsive=\"true\" data-select-match=\"register\"><a class=\"nav-link\" href=\"";
                echo ($context["U_REGISTER"] ?? null);
                echo "\" role=\"menuitem\">";
                echo $this->extensions['phpbb\template\twig\extension']->lang("REGISTER");
                echo "</a></li>
\t\t\t\t\t";
            }
            // line 203
            echo "\t\t\t\t\t";
            // line 204
            echo "\t\t\t\t";
        }
        // line 205
        echo "\t\t\t</ul>
\t\t</div>
\t</div>
</div>

<div class=\"navbar secondary";
        // line 210
        if (((twig_get_attribute($this->env, $this->source, ($context["definition"] ?? null), "SEARCH_IN_NAVBAR", [], "any", false, false, false, 210) == 1) && twig_get_attribute($this->env, $this->source, ($context["definition"] ?? null), "SEARCH_BOX", [], "any", false, false, false, 210))) {
            echo " with-search";
        }
        echo "\">
\t<ul role=\"menubar\">
\t\t";
        // line 212
        ob_start(function () { return ''; });
        // line 213
        echo "\t\t";
        // line 214
        echo "\t\t";
        if (twig_trim_filter(twig_get_attribute($this->env, $this->source, ($context["definition"] ?? null), "NAVLINKS", [], "any", false, false, false, 214))) {
            // line 215
            echo "\t\t\t";
            echo twig_get_attribute($this->env, $this->source, ($context["definition"] ?? null), "NAVLINKS", [], "any", false, false, false, 215);
            echo "
\t\t";
        }
        // line 217
        echo "\t\t";
        if (( !twig_trim_filter(twig_get_attribute($this->env, $this->source, ($context["definition"] ?? null), "NAVLINKS", [], "any", false, false, false, 217)) || (twig_get_attribute($this->env, $this->source, ($context["definition"] ?? null), "NAVLINKS_SHOW_DEFAULT", [], "any", false, false, false, 217) == 1))) {
            // line 218
            echo "\t\t\t";
            if ((($context["U_WATCH_FORUM_LINK"] ?? null) &&  !($context["S_IS_BOT"] ?? null))) {
                // line 219
                echo "\t\t\t<li data-last-responsive=\"true\">
\t\t\t\t<a href=\"";
                // line 220
                echo ($context["U_WATCH_FORUM_LINK"] ?? null);
                echo "\" title=\"";
                echo ($context["S_WATCH_FORUM_TITLE"] ?? null);
                echo "\" data-ajax=\"toggle_link\" data-toggle-class=\"icon ";
                if (($context["S_WATCHING_FORUM"] ?? null)) {
                    echo "fa-check-square-o";
                } else {
                    echo "fa-square-o";
                }
                echo " fa-fw\" data-toggle-text=\"";
                echo ($context["S_WATCH_FORUM_TOGGLE"] ?? null);
                echo "\" data-toggle-url=\"";
                echo ($context["U_WATCH_FORUM_TOGGLE"] ?? null);
                echo "\">
\t\t\t\t\t<i class=\"icon ";
                // line 221
                if (($context["S_WATCHING_FORUM"] ?? null)) {
                    echo "fa-square-o";
                } else {
                    echo "fa-check-square-o";
                }
                echo " fa-fw\" aria-hidden=\"true\"></i><span>";
                echo ($context["S_WATCH_FORUM_TITLE"] ?? null);
                echo "</span>
\t\t\t\t</a>
\t\t\t</li>
\t\t\t";
            }
            // line 225
            echo "\t\t";
        }
        // line 226
        echo "\t\t";
        // line 227
        echo "\t\t";
        $context["secondary_links"] = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 228
        echo "\t\t";
        if (twig_trim_filter(($context["secondary_links"] ?? null))) {
            // line 229
            echo "\t\t\t";
            echo ($context["secondary_links"] ?? null);
            echo "
\t\t\t";
            // line 230
            if ((twig_get_attribute($this->env, $this->source, ($context["definition"] ?? null), "NAVLINKS_SHOW_DEFAULT", [], "any", false, false, false, 230) && ($context["S_DISPLAY_SEARCH"] ?? null))) {
                // line 231
                echo "\t\t\t\t";
                if ((twig_get_attribute($this->env, $this->source, ($context["definition"] ?? null), "REDUNDANT_LINKS_SECONDARY_NAV", [], "any", false, false, false, 231) == 1)) {
                    // line 232
                    echo "\t\t\t\t\t<li class=\"small-icon icon-search";
                    if (((twig_get_attribute($this->env, $this->source, ($context["definition"] ?? null), "SEARCH_IN_NAVBAR", [], "any", false, false, false, 232) == 1) && twig_get_attribute($this->env, $this->source, ($context["definition"] ?? null), "SEARCH_BOX", [], "any", false, false, false, 232))) {
                        echo " responsive-hide";
                    }
                    echo "\"><a href=\"";
                    echo ($context["U_SEARCH"] ?? null);
                    echo "\">";
                    echo $this->extensions['phpbb\template\twig\extension']->lang("SEARCH");
                    echo "</a></li>
\t\t\t\t\t";
                    // line 233
                    if (($context["S_USER_LOGGED_IN"] ?? null)) {
                        // line 234
                        echo "\t\t\t\t\t\t<li class=\"small-icon icon-new-posts\"><a href=\"";
                        echo ($context["U_SEARCH_NEW"] ?? null);
                        echo "\" role=\"menuitem\">";
                        echo $this->extensions['phpbb\template\twig\extension']->lang("SEARCH_NEW");
                        echo "</a></li>
\t\t\t\t\t";
                    }
                    // line 236
                    echo "\t\t\t\t";
                }
                // line 237
                echo "\t\t\t";
            }
            // line 238
            echo "\t\t";
        } else {
            // line 239
            echo "\t\t\t";
            if (($context["S_DISPLAY_SEARCH"] ?? null)) {
                // line 240
                echo "\t\t\t\t";
                if ((twig_get_attribute($this->env, $this->source, ($context["definition"] ?? null), "REDUNDANT_LINKS_SECONDARY_NAV", [], "any", false, false, false, 240) == 1)) {
                    // line 241
                    echo "\t\t\t\t\t<li class=\"small-icon icon-search";
                    if (((twig_get_attribute($this->env, $this->source, ($context["definition"] ?? null), "SEARCH_IN_NAVBAR", [], "any", false, false, false, 241) == 1) && twig_get_attribute($this->env, $this->source, ($context["definition"] ?? null), "SEARCH_BOX", [], "any", false, false, false, 241))) {
                        echo " responsive-hide";
                    }
                    echo "\"><a href=\"";
                    echo ($context["U_SEARCH"] ?? null);
                    echo "\">";
                    echo $this->extensions['phpbb\template\twig\extension']->lang("SEARCH");
                    echo "</a></li>
\t\t\t\t\t";
                    // line 242
                    if (($context["S_USER_LOGGED_IN"] ?? null)) {
                        // line 243
                        echo "\t\t\t\t\t\t<li class=\"small-icon icon-new-posts\"><a href=\"";
                        echo ($context["U_SEARCH_NEW"] ?? null);
                        echo "\" role=\"menuitem\">";
                        echo $this->extensions['phpbb\template\twig\extension']->lang("SEARCH_NEW");
                        echo "</a></li>
\t\t\t\t\t";
                    }
                    // line 245
                    echo "\t\t\t\t";
                }
                // line 246
                echo "\t\t\t";
            }
            // line 247
            echo "\t\t\t";
            if ((twig_get_attribute($this->env, $this->source, ($context["definition"] ?? null), "REDUNDANT_LINKS_SECONDARY_NAV", [], "any", false, false, false, 247) == 1)) {
                // line 248
                echo "\t\t\t";
                if ( !($context["S_REGISTERED_USER"] ?? null)) {
                    // line 249
                    echo "\t\t\t\t<li class=\"small-icon icon-login\"><a href=\"";
                    echo ($context["U_LOGIN_LOGOUT"] ?? null);
                    echo "\" title=\"";
                    echo $this->extensions['phpbb\template\twig\extension']->lang("LOGIN_LOGOUT");
                    echo "\">";
                    echo $this->extensions['phpbb\template\twig\extension']->lang("LOGIN_LOGOUT");
                    echo "</a></li>
\t\t\t\t";
                    // line 250
                    if (($context["S_REGISTER_ENABLED"] ?? null)) {
                        // line 251
                        echo "\t\t\t\t\t<li class=\"small-icon icon-register\"><a href=\"";
                        echo ($context["U_REGISTER"] ?? null);
                        echo "\">";
                        echo $this->extensions['phpbb\template\twig\extension']->lang("REGISTER");
                        echo "</a></li>
\t\t\t\t";
                    }
                    // line 253
                    echo "\t\t\t";
                } elseif ( !($context["S_DISPLAY_SEARCH"] ?? null)) {
                    // line 254
                    echo "\t\t\t\t<li><a href=\"";
                    echo ($context["U_PROFILE"] ?? null);
                    echo "\" class=\"small-icon icon-profile\">";
                    echo ($context["CURRENT_USERNAME_SIMPLE"] ?? null);
                    echo "</a></li>
\t\t\t";
                }
                // line 256
                echo "\t\t\t";
            }
            // line 257
            echo "\t\t";
        }
        // line 258
        echo "
\t\t";
        // line 259
        if (((twig_get_attribute($this->env, $this->source, ($context["definition"] ?? null), "SEARCH_IN_NAVBAR", [], "any", false, false, false, 259) == 1) && twig_get_attribute($this->env, $this->source, ($context["definition"] ?? null), "SEARCH_BOX", [], "any", false, false, false, 259))) {
            // line 260
            echo "\t\t\t<li class=\"search-box not-responsive\">";
            echo twig_get_attribute($this->env, $this->source, ($context["definition"] ?? null), "SEARCH_BOX", [], "any", false, false, false, 260);
            echo "</li>
\t\t";
        }
        // line 262
        echo "\t</ul>
</div>

";
        // line 265
        ob_start();
        // line 266
        echo "<div class=\"navbar\">
\t<ul id=\"nav-breadcrumbs\" class=\"nav-breadcrumbs linklist navlinks\" role=\"menubar\">
\t\t";
        // line 268
        $context["MICRODATA"] = "itemtype=\"https://schema.org/ListItem\" itemprop=\"itemListElement\" itemscope";
        // line 269
        echo "\t\t";
        $context["navlink_position"] = 1;
        // line 270
        echo "
\t\t";
        // line 271
        // line 272
        echo "
\t\t<li class=\"breadcrumbs\" itemscope itemtype=\"https://schema.org/BreadcrumbList\">

\t\t\t";
        // line 275
        if (($context["U_SITE_HOME"] ?? null)) {
            // line 276
            echo "\t\t\t\t<span class=\"crumb\" ";
            echo ($context["MICRODATA"] ?? null);
            echo "><a itemprop=\"item\" href=\"";
            echo ($context["U_SITE_HOME"] ?? null);
            echo "\" data-navbar-reference=\"home\"><i class=\"icon fa-home fa-fw\" aria-hidden=\"true\"></i><span itemprop=\"name\">";
            echo ($context["L_SITE_HOME"] ?? null);
            echo "</span></a><meta itemprop=\"position\" content=\"";
            echo ($context["navlink_position"] ?? null);
            $context["navlink_position"] = (($context["navlink_position"] ?? null) + 1);
            echo "\" /></span>
\t\t\t";
        }
        // line 278
        echo "
\t\t\t";
        // line 279
        // line 280
        echo "\t\t\t\t<span class=\"crumb\" ";
        echo ($context["MICRODATA"] ?? null);
        echo "><a itemprop=\"item\" href=\"";
        echo ($context["U_INDEX"] ?? null);
        echo "\" accesskey=\"h\" data-navbar-reference=\"index\">";
        if ( !($context["U_SITE_HOME"] ?? null)) {
            echo "<i class=\"icon fa-home fa-fw\"></i>";
        }
        echo "<span itemprop=\"name\">";
        echo ($context["L_INDEX"] ?? null);
        echo "</span></a><meta itemprop=\"position\" content=\"";
        echo ($context["navlink_position"] ?? null);
        $context["navlink_position"] = (($context["navlink_position"] ?? null) + 1);
        echo "\" /></span>

\t\t\t";
        // line 282
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["navlinks"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["navlink"]) {
            // line 283
            echo "\t\t\t\t";
            $context["NAVLINK_NAME"] = ((twig_get_attribute($this->env, $this->source, $context["navlink"], "BREADCRUMB_NAME", [], "any", true, true, false, 283)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, $context["navlink"], "BREADCRUMB_NAME", [], "any", false, false, false, 283), twig_get_attribute($this->env, $this->source, $context["navlink"], "FORUM_NAME", [], "any", false, false, false, 283))) : (twig_get_attribute($this->env, $this->source, $context["navlink"], "FORUM_NAME", [], "any", false, false, false, 283)));
            // line 284
            echo "\t\t\t\t";
            $context["NAVLINK_LINK"] = ((twig_get_attribute($this->env, $this->source, $context["navlink"], "U_BREADCRUMB", [], "any", true, true, false, 284)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, $context["navlink"], "U_BREADCRUMB", [], "any", false, false, false, 284), twig_get_attribute($this->env, $this->source, $context["navlink"], "U_VIEW_FORUM", [], "any", false, false, false, 284))) : (twig_get_attribute($this->env, $this->source, $context["navlink"], "U_VIEW_FORUM", [], "any", false, false, false, 284)));
            // line 285
            echo "
\t\t\t\t";
            // line 286
            // line 287
            echo "\t\t\t\t<span class=\"crumb\" ";
            echo ($context["MICRODATA"] ?? null);
            if (twig_get_attribute($this->env, $this->source, $context["navlink"], "MICRODATA", [], "any", false, false, false, 287)) {
                echo " ";
                echo twig_get_attribute($this->env, $this->source, $context["navlink"], "MICRODATA", [], "any", false, false, false, 287);
            }
            echo "><a itemprop=\"item\" href=\"";
            echo ($context["NAVLINK_LINK"] ?? null);
            echo "\"><span itemprop=\"name\">";
            echo ($context["NAVLINK_NAME"] ?? null);
            echo "</span></a><meta itemprop=\"position\" content=\"";
            echo ($context["navlink_position"] ?? null);
            $context["navlink_position"] = (($context["navlink_position"] ?? null) + 1);
            echo "\" /></span>
\t\t\t\t";
            // line 288
            // line 289
            echo "\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['navlink'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 290
        echo "
\t\t\t";
        // line 291
        // line 292
        echo "\t\t</li>

\t\t";
        // line 294
        // line 295
        echo "
\t\t";
        // line 296
        if ((($context["S_DISPLAY_SEARCH"] ?? null) &&  !($context["S_IN_SEARCH"] ?? null))) {
            // line 297
            echo "\t\t\t<li class=\"rightside responsive-search\">
\t\t\t\t<a href=\"";
            // line 298
            echo ($context["U_SEARCH"] ?? null);
            echo "\" title=\"";
            echo $this->extensions['phpbb\template\twig\extension']->lang("SEARCH_ADV_EXPLAIN");
            echo "\" role=\"menuitem\">
\t\t\t\t\t<i class=\"icon fa-search fa-fw\" aria-hidden=\"true\"></i><span class=\"sr-only\">";
            // line 299
            echo $this->extensions['phpbb\template\twig\extension']->lang("SEARCH");
            echo "</span>
\t\t\t\t</a>
\t\t\t</li>
\t\t";
        }
        // line 303
        echo "\t\t<li class=\"rightside dropdown-container icon-only\">
\t\t\t<a href=\"#\" class=\"dropdown-trigger time\" title=\"";
        // line 304
        echo ($context["CURRENT_TIME"] ?? null);
        echo "\"><i class=\"fa fa-clock-o\"></i></a>
\t\t\t<div class=\"dropdown\">
\t\t\t\t<div class=\"pointer\"><div class=\"pointer-inner\"></div></div>
\t\t\t\t<ul class=\"dropdown-contents\">
\t\t\t\t\t<li>";
        // line 308
        echo ($context["CURRENT_TIME"] ?? null);
        echo "</li>
\t\t\t\t\t<li>";
        // line 309
        echo ($context["S_TIMEZONE"] ?? null);
        echo "</li>
\t\t\t\t</ul>
\t\t\t</div>
\t\t</li>
\t</ul>
</div>
";
        $value = ('' === $value = ob_get_clean()) ? '' : new \Twig\Markup($value, $this->env->getCharset());
        $context['definition']->set('BREADCRUMBS', $value);
        // line 316
        if ((twig_get_attribute($this->env, $this->source, ($context["definition"] ?? null), "WRAP_HEADER", [], "any", false, false, false, 316) != 0)) {
            // line 317
            echo "\t";
            echo twig_get_attribute($this->env, $this->source, ($context["definition"] ?? null), "BREADCRUMBS", [], "any", false, false, false, 317);
            echo "
\t";
            // line 318
            $value = "";
            $context['definition']->set('BREADCRUMBS', $value);
        }
    }

    public function getTemplateName()
    {
        return "navbar_header.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  917 => 318,  912 => 317,  910 => 316,  899 => 309,  895 => 308,  888 => 304,  885 => 303,  878 => 299,  872 => 298,  869 => 297,  867 => 296,  864 => 295,  863 => 294,  859 => 292,  858 => 291,  855 => 290,  849 => 289,  848 => 288,  832 => 287,  831 => 286,  828 => 285,  825 => 284,  822 => 283,  818 => 282,  801 => 280,  800 => 279,  797 => 278,  784 => 276,  782 => 275,  777 => 272,  776 => 271,  773 => 270,  770 => 269,  768 => 268,  764 => 266,  762 => 265,  757 => 262,  751 => 260,  749 => 259,  746 => 258,  743 => 257,  740 => 256,  732 => 254,  729 => 253,  721 => 251,  719 => 250,  710 => 249,  707 => 248,  704 => 247,  701 => 246,  698 => 245,  690 => 243,  688 => 242,  677 => 241,  674 => 240,  671 => 239,  668 => 238,  665 => 237,  662 => 236,  654 => 234,  652 => 233,  641 => 232,  638 => 231,  636 => 230,  631 => 229,  628 => 228,  625 => 227,  623 => 226,  620 => 225,  607 => 221,  591 => 220,  588 => 219,  585 => 218,  582 => 217,  576 => 215,  573 => 214,  571 => 213,  569 => 212,  562 => 210,  555 => 205,  552 => 204,  550 => 203,  542 => 201,  540 => 200,  531 => 199,  529 => 198,  520 => 197,  517 => 196,  514 => 195,  512 => 194,  508 => 192,  496 => 191,  490 => 188,  484 => 185,  480 => 184,  473 => 183,  470 => 182,  462 => 177,  456 => 174,  452 => 173,  445 => 172,  443 => 171,  440 => 170,  439 => 169,  430 => 163,  424 => 162,  419 => 159,  418 => 158,  415 => 157,  408 => 153,  402 => 152,  399 => 151,  397 => 150,  391 => 147,  385 => 146,  381 => 144,  380 => 143,  377 => 142,  370 => 138,  366 => 137,  363 => 136,  361 => 135,  351 => 131,  348 => 130,  346 => 129,  343 => 128,  336 => 124,  330 => 123,  327 => 122,  324 => 121,  317 => 117,  311 => 116,  308 => 115,  305 => 114,  304 => 113,  298 => 110,  292 => 109,  289 => 108,  288 => 107,  284 => 105,  282 => 104,  276 => 100,  269 => 96,  265 => 95,  262 => 94,  259 => 93,  252 => 89,  248 => 88,  245 => 87,  243 => 86,  234 => 82,  231 => 81,  228 => 80,  220 => 77,  217 => 76,  214 => 75,  206 => 72,  203 => 71,  200 => 70,  199 => 69,  194 => 66,  189 => 64,  186 => 63,  184 => 62,  180 => 61,  173 => 57,  167 => 56,  158 => 54,  153 => 51,  148 => 50,  145 => 49,  142 => 47,  140 => 46,  137 => 45,  129 => 40,  125 => 39,  117 => 34,  113 => 33,  106 => 29,  102 => 28,  99 => 27,  92 => 23,  88 => 22,  85 => 21,  82 => 20,  75 => 16,  71 => 15,  68 => 14,  65 => 13,  58 => 9,  54 => 8,  51 => 7,  49 => 6,  46 => 5,  44 => 4,  41 => 3,  39 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "navbar_header.html", "");
    }
}

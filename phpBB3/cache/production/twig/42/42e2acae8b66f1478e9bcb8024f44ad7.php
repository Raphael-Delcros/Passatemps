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

/* viewforum_body.html */
class __TwigTemplate_ab6eadabb1abe8fddc28658b723985aa extends \Twig\Template
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
        if ((($context["S_HAS_SUBFORUM"] ?? null) && ($context["U_MARK_FORUMS"] ?? null))) {
            // line 3
            echo "\t\t<li class=\"small-icon icon-mark\"><a href=\"";
            echo ($context["U_MARK_FORUMS"] ?? null);
            echo "\" data-ajax=\"mark_forums_read\">";
            echo $this->extensions['phpbb\template\twig\extension']->lang("MARK_SUBFORUMS_READ");
            echo "</a></li>
\t";
        }
        // line 5
        echo "\t";
        if ((( !($context["S_IS_BOT"] ?? null) && ($context["U_MARK_TOPICS"] ?? null)) && twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["loops"] ?? null), "topicrow", [], "any", false, false, false, 5)))) {
            // line 6
            echo "\t\t<li class=\"small-icon icon-mark\"><a href=\"";
            echo ($context["U_MARK_TOPICS"] ?? null);
            echo "\" accesskey=\"m\" data-ajax=\"mark_topics_read\">";
            echo $this->extensions['phpbb\template\twig\extension']->lang("MARK_TOPICS_READ");
            echo "</a></li>
\t";
        }
        // line 8
        $value = 1;
        $context['definition']->set('NAVLINKS_SHOW_DEFAULT', $value);
        $value = ('' === $value = ob_get_clean()) ? '' : new \Twig\Markup($value, $this->env->getCharset());
        $context['definition']->set('NAVLINKS', $value);
        // line 10
        $location = "overall_header.html";
        $namespace = false;
        if (strpos($location, '@') === 0) {
            $namespace = substr($location, 1, strpos($location, '/') - 1);
            $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
            $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
        }
        $this->loadTemplate("overall_header.html", "viewforum_body.html", 10)->display($context);
        if ($namespace) {
            $this->env->setNamespaceLookUpOrder($previous_look_up_order);
        }
        // line 11
        // line 12
        echo "<h2 class=\"forum-title\">";
        echo "<a href=\"";
        echo ($context["U_VIEW_FORUM"] ?? null);
        echo "\">";
        echo ($context["FORUM_NAME"] ?? null);
        echo "</a>";
        echo "</h2>
";
        // line 13
        // line 14
        if (((($context["FORUM_DESC"] ?? null) || ($context["MODERATORS"] ?? null)) || ($context["U_MCP"] ?? null))) {
            // line 15
            echo "<div>
\t<!-- NOTE: remove the style=\"display: none\" when you want to have the forum description on the forum body -->
\t";
            // line 17
            if (($context["FORUM_DESC"] ?? null)) {
                echo "<div style=\"display: none !important;\">";
                echo ($context["FORUM_DESC"] ?? null);
                echo "<br /></div>";
            }
            // line 18
            echo "\t";
            if (($context["MODERATORS"] ?? null)) {
                echo "<p><strong>";
                if (($context["S_SINGLE_MODERATOR"] ?? null)) {
                    echo $this->extensions['phpbb\template\twig\extension']->lang("MODERATOR");
                } else {
                    echo $this->extensions['phpbb\template\twig\extension']->lang("MODERATORS");
                }
                echo $this->extensions['phpbb\template\twig\extension']->lang("COLON");
                echo "</strong> ";
                echo ($context["MODERATORS"] ?? null);
                echo "</p>";
            }
            // line 19
            echo "</div>
";
        }
        // line 21
        echo "
";
        // line 22
        if (($context["S_FORUM_RULES"] ?? null)) {
            // line 23
            echo "\t<div class=\"rules";
            if (($context["U_FORUM_RULES"] ?? null)) {
                echo " rules-link";
            }
            echo "\">
\t\t<div class=\"inner\">

\t\t";
            // line 26
            if (($context["U_FORUM_RULES"] ?? null)) {
                // line 27
                echo "\t\t\t<a href=\"";
                echo ($context["U_FORUM_RULES"] ?? null);
                echo "\">";
                echo $this->extensions['phpbb\template\twig\extension']->lang("FORUM_RULES");
                echo "</a>
\t\t";
            } else {
                // line 29
                echo "\t\t\t<strong>";
                echo $this->extensions['phpbb\template\twig\extension']->lang("FORUM_RULES");
                echo "</strong><br />
\t\t\t";
                // line 30
                echo ($context["FORUM_RULES"] ?? null);
                echo "
\t\t";
            }
            // line 32
            echo "
\t\t</div>
\t</div>
";
        }
        // line 36
        echo "
";
        // line 37
        if (($context["S_HAS_SUBFORUM"] ?? null)) {
            // line 38
            echo "\t";
            $location = "forumlist_body.html";
            $namespace = false;
            if (strpos($location, '@') === 0) {
                $namespace = substr($location, 1, strpos($location, '/') - 1);
                $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
                $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
            }
            $this->loadTemplate("forumlist_body.html", "viewforum_body.html", 38)->display($context);
            if ($namespace) {
                $this->env->setNamespaceLookUpOrder($previous_look_up_order);
            }
        }
        // line 40
        echo "
";
        // line 41
        if ((((($context["S_DISPLAY_POST_INFO"] ?? null) || twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["loops"] ?? null), "pagination", [], "any", false, false, false, 41))) || ($context["TOTAL_POSTS"] ?? null)) || ($context["TOTAL_TOPICS"] ?? null))) {
            // line 42
            echo "\t<div class=\"action-bar bar-top\">

\t";
            // line 44
            if (( !($context["S_IS_BOT"] ?? null) && ($context["S_DISPLAY_POST_INFO"] ?? null))) {
                // line 45
                echo "\t\t\t";
                // line 46
                echo "
\t\t<a href=\"";
                // line 47
                echo ($context["U_POST_NEW_TOPIC"] ?? null);
                echo "\" class=\"button\" title=\"";
                if (($context["S_IS_LOCKED"] ?? null)) {
                    echo $this->extensions['phpbb\template\twig\extension']->lang("FORUM_LOCKED");
                } else {
                    echo $this->extensions['phpbb\template\twig\extension']->lang("POST_TOPIC");
                }
                echo "\">
\t\t\t";
                // line 48
                if (($context["S_IS_LOCKED"] ?? null)) {
                    // line 49
                    echo "\t\t\t\t<span>";
                    echo $this->extensions['phpbb\template\twig\extension']->lang("BUTTON_FORUM_LOCKED");
                    echo "</span> <i class=\"icon fa-lock fa-fw\" aria-hidden=\"true\"></i>
\t\t\t";
                } else {
                    // line 51
                    echo "\t\t\t\t<span>";
                    echo $this->extensions['phpbb\template\twig\extension']->lang("BUTTON_NEW_TOPIC");
                    echo "</span> <i class=\"icon fa-pencil fa-fw\" aria-hidden=\"true\"></i>
\t\t\t";
                }
                // line 53
                echo "\t\t</a>
\t\t\t";
                // line 54
                // line 55
                echo "\t";
            }
            // line 56
            echo "
\t";
            // line 57
            if (($context["S_DISPLAY_SEARCHBOX"] ?? null)) {
                // line 58
                echo "\t\t<div class=\"search-box\" role=\"search\">
\t\t\t<form method=\"get\" id=\"forum-search\" action=\"";
                // line 59
                echo ($context["S_SEARCHBOX_ACTION"] ?? null);
                echo "\">
\t\t\t<fieldset>
\t\t\t\t<input class=\"inputbox search tiny\" type=\"search\" name=\"keywords\" id=\"search_keywords\" size=\"20\" placeholder=\"";
                // line 61
                echo $this->extensions['phpbb\template\twig\extension']->lang("SEARCH_FORUM");
                echo "\" />
\t\t\t\t<button class=\"button button-search\" type=\"submit\" title=\"";
                // line 62
                echo $this->extensions['phpbb\template\twig\extension']->lang("SEARCH");
                echo "\">
\t\t\t\t\t<i class=\"icon fa-search fa-fw\" aria-hidden=\"true\"></i><span class=\"sr-only\">";
                // line 63
                echo $this->extensions['phpbb\template\twig\extension']->lang("SEARCH");
                echo "</span>
\t\t\t\t</button>
\t\t\t\t<a href=\"";
                // line 65
                echo ($context["U_SEARCH_FORUM"] ?? null);
                echo "\" class=\"button button-search-end\" title=\"";
                echo $this->extensions['phpbb\template\twig\extension']->lang("SEARCH_ADV");
                echo "\">
\t\t\t\t\t<i class=\"icon fa-cog fa-fw\" aria-hidden=\"true\"></i><span class=\"sr-only\">";
                // line 66
                echo $this->extensions['phpbb\template\twig\extension']->lang("SEARCH_ADV");
                echo "</span>
\t\t\t\t</a>
\t\t\t\t";
                // line 68
                echo ($context["S_SEARCH_LOCAL_HIDDEN_FIELDS"] ?? null);
                echo "
\t\t\t</fieldset>
\t\t\t</form>
\t\t</div>
\t";
            }
            // line 73
            echo "
\t<div class=\"pagination\">
\t\t";
            // line 75
            if ((( !($context["S_IS_BOT"] ?? null) && ($context["U_MARK_TOPICS"] ?? null)) && twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["loops"] ?? null), "topicrow", [], "any", false, false, false, 75)))) {
                echo "<a href=\"";
                echo ($context["U_MARK_TOPICS"] ?? null);
                echo "\" class=\"mark\" accesskey=\"m\" data-ajax=\"mark_topics_read\">";
                echo $this->extensions['phpbb\template\twig\extension']->lang("MARK_TOPICS_READ");
                echo "</a> &bull; ";
            }
            // line 76
            echo "\t\t";
            echo ($context["TOTAL_TOPICS"] ?? null);
            echo "
\t\t";
            // line 77
            if (twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["loops"] ?? null), "pagination", [], "any", false, false, false, 77))) {
                // line 78
                echo "\t\t\t";
                $location = "pagination.html";
                $namespace = false;
                if (strpos($location, '@') === 0) {
                    $namespace = substr($location, 1, strpos($location, '/') - 1);
                    $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
                    $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
                }
                $this->loadTemplate("pagination.html", "viewforum_body.html", 78)->display($context);
                if ($namespace) {
                    $this->env->setNamespaceLookUpOrder($previous_look_up_order);
                }
                // line 79
                echo "\t\t";
            } else {
                // line 80
                echo "\t\t\t&bull; ";
                echo ($context["PAGE_NUMBER"] ?? null);
                echo "
\t\t";
            }
            // line 82
            echo "\t</div>

\t</div>
";
        }
        // line 86
        echo "
";
        // line 87
        if (($context["S_NO_READ_ACCESS"] ?? null)) {
            // line 88
            echo "
\t<div class=\"panel\">
\t\t<div class=\"inner\">
\t\t<strong>";
            // line 91
            echo $this->extensions['phpbb\template\twig\extension']->lang("NO_READ_ACCESS");
            echo "</strong>
\t\t</div>
\t</div>

\t";
            // line 95
            if (( !($context["S_USER_LOGGED_IN"] ?? null) &&  !($context["S_IS_BOT"] ?? null))) {
                // line 96
                echo "
\t\t<form action=\"";
                // line 97
                echo ($context["S_LOGIN_ACTION"] ?? null);
                echo "\" method=\"post\">

\t\t<div class=\"panel\">
\t\t\t<div class=\"inner\">

\t\t\t<div class=\"content\">
\t\t\t\t<h3><a href=\"";
                // line 103
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

\t\t\t\t<fieldset class=\"fields1\">
\t\t\t\t<dl>
\t\t\t\t\t<dt><label for=\"username\">";
                // line 107
                echo ($this->extensions['phpbb\template\twig\extension']->lang("USERNAME") . $this->extensions['phpbb\template\twig\extension']->lang("COLON"));
                echo "</label></dt>
\t\t\t\t\t<dd><input type=\"text\" tabindex=\"1\" name=\"username\" id=\"username\" size=\"25\" value=\"";
                // line 108
                echo ($context["USERNAME"] ?? null);
                echo "\" class=\"inputbox autowidth\" autocomplete=\"username\" /></dd>
\t\t\t\t</dl>
\t\t\t\t<dl>
\t\t\t\t\t<dt><label for=\"password\">";
                // line 111
                echo ($this->extensions['phpbb\template\twig\extension']->lang("PASSWORD") . $this->extensions['phpbb\template\twig\extension']->lang("COLON"));
                echo "</label></dt>
\t\t\t\t\t<dd><input type=\"password\" tabindex=\"2\" id=\"password\" name=\"password\" size=\"25\" class=\"inputbox autowidth\" autocomplete=\"current-password\" /></dd>
\t\t\t\t\t";
                // line 113
                if (($context["S_AUTOLOGIN_ENABLED"] ?? null)) {
                    echo "<dd><label for=\"autologin\"><input type=\"checkbox\" name=\"autologin\" id=\"autologin\" tabindex=\"3\" /> ";
                    echo $this->extensions['phpbb\template\twig\extension']->lang("LOG_ME_IN");
                    echo "</label></dd>";
                }
                // line 114
                echo "\t\t\t\t\t<dd><label for=\"viewonline\"><input type=\"checkbox\" name=\"viewonline\" id=\"viewonline\" tabindex=\"4\" /> ";
                echo $this->extensions['phpbb\template\twig\extension']->lang("HIDE_ME");
                echo "</label></dd>
\t\t\t\t</dl>
\t\t\t\t<dl>
\t\t\t\t\t<dt>&nbsp;</dt>
\t\t\t\t\t<dd><input type=\"submit\" name=\"login\" tabindex=\"5\" value=\"";
                // line 118
                echo $this->extensions['phpbb\template\twig\extension']->lang("LOGIN");
                echo "\" class=\"button1\" /></dd>
\t\t\t\t</dl>
\t\t\t\t";
                // line 120
                echo ($context["S_LOGIN_REDIRECT"] ?? null);
                echo "
\t\t\t\t";
                // line 121
                echo ($context["S_FORM_TOKEN_LOGIN"] ?? null);
                echo "
\t\t\t\t</fieldset>
\t\t\t</div>

\t\t\t</div>
\t\t</div>

\t\t</form>

\t";
            }
            // line 131
            echo "
";
        }
        // line 133
        echo "
";
        // line 134
        // line 135
        echo "
";
        // line 136
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["loops"] ?? null), "topicrow", [], "any", false, false, false, 136));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["topicrow"]) {
            // line 137
            echo "
\t";
            // line 138
            if (( !twig_get_attribute($this->env, $this->source, $context["topicrow"], "S_TOPIC_TYPE_SWITCH", [], "any", false, false, false, 138) &&  !twig_get_attribute($this->env, $this->source, $context["topicrow"], "S_FIRST_ROW", [], "any", false, false, false, 138))) {
                // line 139
                echo "\t\t</ul>
\t\t</div>
\t</div>
\t";
            }
            // line 143
            echo "
\t";
            // line 144
            if ((twig_get_attribute($this->env, $this->source, $context["topicrow"], "S_FIRST_ROW", [], "any", false, false, false, 144) ||  !twig_get_attribute($this->env, $this->source, $context["topicrow"], "S_TOPIC_TYPE_SWITCH", [], "any", false, false, false, 144))) {
                // line 145
                echo "\t\t<div class=\"forumbg";
                if ((twig_get_attribute($this->env, $this->source, $context["topicrow"], "S_TOPIC_TYPE_SWITCH", [], "any", false, false, false, 145) && (twig_get_attribute($this->env, $this->source, $context["topicrow"], "S_POST_ANNOUNCE", [], "any", false, false, false, 145) || twig_get_attribute($this->env, $this->source, $context["topicrow"], "S_POST_GLOBAL", [], "any", false, false, false, 145)))) {
                    echo " announcement";
                }
                echo "\">
\t\t<div class=\"inner\">
\t\t<ul class=\"topiclist\">
\t\t\t<li class=\"header\">
\t\t\t\t<dl class=\"row-item\">
\t\t\t\t\t<dt";
                // line 150
                if (($context["S_DISPLAY_ACTIVE"] ?? null)) {
                    echo " id=\"active_topics\"";
                }
                echo "><div class=\"list-inner\">";
                if (($context["S_DISPLAY_ACTIVE"] ?? null)) {
                    echo $this->extensions['phpbb\template\twig\extension']->lang("ACTIVE_TOPICS");
                } elseif ((twig_get_attribute($this->env, $this->source, $context["topicrow"], "S_TOPIC_TYPE_SWITCH", [], "any", false, false, false, 150) && (twig_get_attribute($this->env, $this->source, $context["topicrow"], "S_POST_ANNOUNCE", [], "any", false, false, false, 150) || twig_get_attribute($this->env, $this->source, $context["topicrow"], "S_POST_GLOBAL", [], "any", false, false, false, 150)))) {
                    echo $this->extensions['phpbb\template\twig\extension']->lang("ANNOUNCEMENTS");
                } else {
                    echo $this->extensions['phpbb\template\twig\extension']->lang("TOPICS");
                }
                echo "</div></dt>
\t\t\t\t\t<dd class=\"posts\">";
                // line 151
                echo $this->extensions['phpbb\template\twig\extension']->lang("REPLIES");
                echo "</dd>
\t\t\t\t\t<dd class=\"views\">";
                // line 152
                echo $this->extensions['phpbb\template\twig\extension']->lang("VIEWS");
                echo "</dd>
\t\t\t\t\t<dd class=\"lastpost\"><span>";
                // line 153
                echo $this->extensions['phpbb\template\twig\extension']->lang("LAST_POST");
                echo "</span></dd>
\t\t\t\t</dl>
\t\t\t</li>
\t\t</ul>
\t\t<ul class=\"topiclist topics\">
\t";
            }
            // line 159
            echo "
\t\t";
            // line 160
            // line 161
            echo "\t\t<li class=\"row";
            if ((twig_get_attribute($this->env, $this->source, $context["topicrow"], "S_ROW_COUNT", [], "any", false, false, false, 161) % 2 == 0)) {
                echo " bg1";
            } else {
                echo " bg2";
            }
            if (twig_get_attribute($this->env, $this->source, $context["topicrow"], "S_POST_GLOBAL", [], "any", false, false, false, 161)) {
                echo " global-announce";
            }
            if (twig_get_attribute($this->env, $this->source, $context["topicrow"], "S_POST_ANNOUNCE", [], "any", false, false, false, 161)) {
                echo " announce";
            }
            if (twig_get_attribute($this->env, $this->source, $context["topicrow"], "S_POST_STICKY", [], "any", false, false, false, 161)) {
                echo " sticky";
            }
            if (twig_get_attribute($this->env, $this->source, $context["topicrow"], "S_TOPIC_REPORTED", [], "any", false, false, false, 161)) {
                echo " reported";
            }
            echo "\">
\t\t\t";
            // line 162
            // line 163
            echo "\t\t\t<dl class=\"row-item ";
            echo twig_get_attribute($this->env, $this->source, $context["topicrow"], "TOPIC_IMG_STYLE", [], "any", false, false, false, 163);
            echo "\">
\t\t\t\t<dt";
            // line 164
            if ((twig_get_attribute($this->env, $this->source, $context["topicrow"], "TOPIC_ICON_IMG", [], "any", false, false, false, 164) && ($context["S_TOPIC_ICONS"] ?? null))) {
                echo " style=\"background-image: url('";
                echo ($context["T_ICONS_PATH"] ?? null);
                echo twig_get_attribute($this->env, $this->source, $context["topicrow"], "TOPIC_ICON_IMG", [], "any", false, false, false, 164);
                echo "'); background-repeat: no-repeat;\"";
            }
            echo " title=\"";
            echo twig_get_attribute($this->env, $this->source, $context["topicrow"], "TOPIC_FOLDER_IMG_ALT", [], "any", false, false, false, 164);
            echo "\">
\t\t\t\t\t";
            // line 165
            if ((twig_get_attribute($this->env, $this->source, $context["topicrow"], "S_UNREAD_TOPIC", [], "any", false, false, false, 165) &&  !($context["S_IS_BOT"] ?? null))) {
                echo "<a href=\"";
                echo twig_get_attribute($this->env, $this->source, $context["topicrow"], "U_NEWEST_POST", [], "any", false, false, false, 165);
                echo "\" class=\"row-item-link\"></a>";
            }
            // line 166
            echo "\t\t\t\t\t<div class=\"list-inner\">
\t\t\t\t\t\t";
            // line 167
            // line 168
            echo "\t\t\t\t\t\t";
            if ((twig_get_attribute($this->env, $this->source, $context["topicrow"], "S_UNREAD_TOPIC", [], "any", false, false, false, 168) &&  !($context["S_IS_BOT"] ?? null))) {
                // line 169
                echo "\t\t\t\t\t\t\t<a class=\"unread\" href=\"";
                echo twig_get_attribute($this->env, $this->source, $context["topicrow"], "U_NEWEST_POST", [], "any", false, false, false, 169);
                echo "\">
\t\t\t\t\t\t\t\t<i class=\"icon fa-file fa-fw icon-red icon-md\" aria-hidden=\"true\"></i><span class=\"sr-only\">";
                // line 170
                echo ($context["NEW_POST"] ?? null);
                echo "</span>
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t";
            }
            // line 173
            echo "\t\t\t\t\t\t";
            if (twig_get_attribute($this->env, $this->source, $context["topicrow"], "U_VIEW_TOPIC", [], "any", false, false, false, 173)) {
                echo "<a href=\"";
                echo twig_get_attribute($this->env, $this->source, $context["topicrow"], "U_VIEW_TOPIC", [], "any", false, false, false, 173);
                echo "\" class=\"topictitle\">";
                echo twig_get_attribute($this->env, $this->source, $context["topicrow"], "TOPIC_TITLE", [], "any", false, false, false, 173);
                echo "</a>";
            } else {
                echo twig_get_attribute($this->env, $this->source, $context["topicrow"], "TOPIC_TITLE", [], "any", false, false, false, 173);
            }
            // line 174
            echo "\t\t\t\t\t\t";
            if ((twig_get_attribute($this->env, $this->source, $context["topicrow"], "S_TOPIC_UNAPPROVED", [], "any", false, false, false, 174) || twig_get_attribute($this->env, $this->source, $context["topicrow"], "S_POSTS_UNAPPROVED", [], "any", false, false, false, 174))) {
                // line 175
                echo "\t\t\t\t\t\t\t<a href=\"";
                echo twig_get_attribute($this->env, $this->source, $context["topicrow"], "U_MCP_QUEUE", [], "any", false, false, false, 175);
                echo "\" title=\"";
                if (twig_get_attribute($this->env, $this->source, $context["topicrow"], "S_TOPIC_UNAPPROVED", [], "any", false, false, false, 175)) {
                    echo $this->extensions['phpbb\template\twig\extension']->lang("TOPIC_UNAPPROVED");
                } else {
                    echo $this->extensions['phpbb\template\twig\extension']->lang("POSTS_UNAPPROVED");
                }
                echo "\">
\t\t\t\t\t\t\t\t<i class=\"icon fa-question fa-fw icon-blue\" aria-hidden=\"true\"></i><span class=\"sr-only\">";
                // line 176
                if (twig_get_attribute($this->env, $this->source, $context["topicrow"], "S_TOPIC_UNAPPROVED", [], "any", false, false, false, 176)) {
                    echo $this->extensions['phpbb\template\twig\extension']->lang("TOPIC_UNAPPROVED");
                } else {
                    echo $this->extensions['phpbb\template\twig\extension']->lang("POSTS_UNAPPROVED");
                }
                echo "</span>
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t";
            }
            // line 179
            echo "\t\t\t\t\t\t";
            if (twig_get_attribute($this->env, $this->source, $context["topicrow"], "S_TOPIC_DELETED", [], "any", false, false, false, 179)) {
                // line 180
                echo "\t\t\t\t\t\t\t<a href=\"";
                echo twig_get_attribute($this->env, $this->source, $context["topicrow"], "U_MCP_QUEUE", [], "any", false, false, false, 180);
                echo "\" title=\"";
                echo $this->extensions['phpbb\template\twig\extension']->lang("TOPIC_DELETED");
                echo "\">
\t\t\t\t\t\t\t\t<i class=\"icon fa-recycle fa-fw icon-green\" aria-hidden=\"true\"></i><span class=\"sr-only\">";
                // line 181
                echo $this->extensions['phpbb\template\twig\extension']->lang("TOPIC_DELETED");
                echo "</span>
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t";
            }
            // line 184
            echo "\t\t\t\t\t\t";
            if (twig_get_attribute($this->env, $this->source, $context["topicrow"], "S_TOPIC_REPORTED", [], "any", false, false, false, 184)) {
                // line 185
                echo "\t\t\t\t\t\t\t<a href=\"";
                echo twig_get_attribute($this->env, $this->source, $context["topicrow"], "U_MCP_REPORT", [], "any", false, false, false, 185);
                echo "\" title=\"";
                echo $this->extensions['phpbb\template\twig\extension']->lang("TOPIC_REPORTED");
                echo "\">
\t\t\t\t\t\t\t\t<i class=\"icon fa-exclamation fa-fw icon-red\" aria-hidden=\"true\"></i><span class=\"sr-only\">";
                // line 186
                echo $this->extensions['phpbb\template\twig\extension']->lang("TOPIC_REPORTED");
                echo "</span>
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t";
            }
            // line 189
            echo "\t\t\t\t\t\t<br />
\t\t\t\t\t\t";
            // line 190
            // line 191
            echo "\t\t\t\t\t\t";
            if (twig_get_attribute($this->env, $this->source, $context["topicrow"], "S_POST_STICKY", [], "any", false, false, false, 191)) {
                echo "<i class=\"topic-status sticky fa fa-thumb-tack\"></i>";
            }
            // line 192
            echo "
\t\t\t\t\t\t";
            // line 193
            if ( !($context["S_IS_BOT"] ?? null)) {
                // line 194
                echo "\t\t\t\t\t\t<div class=\"responsive-show\" style=\"display: none;\">
\t\t\t\t\t\t\t";
                // line 195
                echo $this->extensions['phpbb\template\twig\extension']->lang("LAST_POST");
                echo " ";
                echo $this->extensions['phpbb\template\twig\extension']->lang("POST_BY_AUTHOR");
                echo " ";
                echo twig_get_attribute($this->env, $this->source, $context["topicrow"], "LAST_POST_AUTHOR_FULL", [], "any", false, false, false, 195);
                echo " &laquo; <a href=\"";
                echo twig_get_attribute($this->env, $this->source, $context["topicrow"], "U_LAST_POST", [], "any", false, false, false, 195);
                echo "\" title=\"";
                echo $this->extensions['phpbb\template\twig\extension']->lang("GOTO_LAST_POST");
                echo "\"><time datetime=\"";
                echo twig_get_attribute($this->env, $this->source, $context["topicrow"], "LAST_POST_TIME_RFC3339", [], "any", false, false, false, 195);
                echo "\">";
                echo twig_get_attribute($this->env, $this->source, $context["topicrow"], "LAST_POST_TIME", [], "any", false, false, false, 195);
                echo "</time></a>
\t\t\t\t\t\t\t";
                // line 196
                if ((twig_get_attribute($this->env, $this->source, $context["topicrow"], "S_POST_GLOBAL", [], "any", false, false, false, 196) && (($context["FORUM_ID"] ?? null) != twig_get_attribute($this->env, $this->source, $context["topicrow"], "FORUM_ID", [], "any", false, false, false, 196)))) {
                    echo "<br />";
                    echo $this->extensions['phpbb\template\twig\extension']->lang("POSTED");
                    echo " ";
                    echo $this->extensions['phpbb\template\twig\extension']->lang("IN");
                    echo " <a href=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["topicrow"], "U_VIEW_FORUM", [], "any", false, false, false, 196);
                    echo "\">";
                    echo twig_get_attribute($this->env, $this->source, $context["topicrow"], "FORUM_NAME", [], "any", false, false, false, 196);
                    echo "</a>";
                }
                // line 197
                echo "\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t";
                // line 198
                if (twig_get_attribute($this->env, $this->source, $context["topicrow"], "REPLIES", [], "any", false, false, false, 198)) {
                    // line 199
                    echo "\t\t\t\t\t\t\t<span class=\"responsive-show left-box\" style=\"display: none;\">";
                    echo ($this->extensions['phpbb\template\twig\extension']->lang("REPLIES") . $this->extensions['phpbb\template\twig\extension']->lang("COLON"));
                    echo " <strong>";
                    echo twig_get_attribute($this->env, $this->source, $context["topicrow"], "REPLIES", [], "any", false, false, false, 199);
                    echo "</strong></span>
\t\t\t\t\t\t\t";
                }
                // line 201
                echo "\t\t\t\t\t\t";
            }
            // line 202
            echo "
\t\t\t\t\t\t<div class=\"topic-poster responsive-hide left-box\">
\t\t\t\t\t\t\t";
            // line 204
            if (twig_get_attribute($this->env, $this->source, $context["topicrow"], "S_HAS_POLL", [], "any", false, false, false, 204)) {
                echo "<i class=\"icon fa-bar-chart fa-fw\" aria-hidden=\"true\"></i>";
            }
            // line 205
            echo "\t\t\t\t\t\t\t";
            if (twig_get_attribute($this->env, $this->source, $context["topicrow"], "ATTACH_ICON_IMG", [], "any", false, false, false, 205)) {
                echo "<i class=\"icon fa-paperclip fa-fw\" aria-hidden=\"true\"></i>";
            }
            // line 206
            echo "\t\t\t\t\t\t\t";
            // line 207
            echo "\t\t\t\t\t\t\t";
            echo $this->extensions['phpbb\template\twig\extension']->lang("POST_BY_AUTHOR");
            echo " ";
            echo twig_get_attribute($this->env, $this->source, $context["topicrow"], "TOPIC_AUTHOR_FULL", [], "any", false, false, false, 207);
            echo " &raquo; <time datetime=\"";
            echo twig_get_attribute($this->env, $this->source, $context["topicrow"], "FIRST_POST_TIME_RFC3339", [], "any", false, false, false, 207);
            echo "\">";
            echo twig_get_attribute($this->env, $this->source, $context["topicrow"], "FIRST_POST_TIME", [], "any", false, false, false, 207);
            echo "</time>
\t\t\t\t\t\t\t";
            // line 208
            // line 209
            echo "\t\t\t\t\t\t\t";
            if ((twig_get_attribute($this->env, $this->source, $context["topicrow"], "S_POST_GLOBAL", [], "any", false, false, false, 209) && (($context["FORUM_ID"] ?? null) != twig_get_attribute($this->env, $this->source, $context["topicrow"], "FORUM_ID", [], "any", false, false, false, 209)))) {
                echo " &raquo; ";
                echo $this->extensions['phpbb\template\twig\extension']->lang("IN");
                echo " <a href=\"";
                echo twig_get_attribute($this->env, $this->source, $context["topicrow"], "U_VIEW_FORUM", [], "any", false, false, false, 209);
                echo "\">";
                echo twig_get_attribute($this->env, $this->source, $context["topicrow"], "FORUM_NAME", [], "any", false, false, false, 209);
                echo "</a>";
            }
            // line 210
            echo "\t\t\t\t\t\t</div>

\t\t\t\t\t\t";
            // line 212
            if (twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, $context["topicrow"], "pagination", [], "any", false, false, false, 212))) {
                // line 213
                echo "\t\t\t\t\t\t<div class=\"pagination\">
\t\t\t\t\t\t\t<span><i class=\"icon fa-clone fa-fw\" aria-hidden=\"true\"></i></span>
\t\t\t\t\t\t\t<ul>
\t\t\t\t\t\t\t";
                // line 216
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["topicrow"], "pagination", [], "any", false, false, false, 216));
                foreach ($context['_seq'] as $context["_key"] => $context["pagination"]) {
                    // line 217
                    echo "\t\t\t\t\t\t\t\t";
                    if (twig_get_attribute($this->env, $this->source, $context["pagination"], "S_IS_PREV", [], "any", false, false, false, 217)) {
                        // line 218
                        echo "\t\t\t\t\t\t\t\t";
                    } elseif (twig_get_attribute($this->env, $this->source, $context["pagination"], "S_IS_CURRENT", [], "any", false, false, false, 218)) {
                        echo "<li class=\"active\"><span>";
                        echo twig_get_attribute($this->env, $this->source, $context["pagination"], "PAGE_NUMBER", [], "any", false, false, false, 218);
                        echo "</span></li>
\t\t\t\t\t\t\t\t";
                    } elseif (twig_get_attribute($this->env, $this->source,                     // line 219
$context["pagination"], "S_IS_ELLIPSIS", [], "any", false, false, false, 219)) {
                        echo "<li class=\"ellipsis\"><span>";
                        echo $this->extensions['phpbb\template\twig\extension']->lang("ELLIPSIS");
                        echo "</span></li>
\t\t\t\t\t\t\t\t";
                    } elseif (twig_get_attribute($this->env, $this->source,                     // line 220
$context["pagination"], "S_IS_NEXT", [], "any", false, false, false, 220)) {
                        // line 221
                        echo "\t\t\t\t\t\t\t\t";
                    } else {
                        echo "<li><a class=\"button\" href=\"";
                        echo twig_get_attribute($this->env, $this->source, $context["pagination"], "PAGE_URL", [], "any", false, false, false, 221);
                        echo "\">";
                        echo twig_get_attribute($this->env, $this->source, $context["pagination"], "PAGE_NUMBER", [], "any", false, false, false, 221);
                        echo "</a></li>
\t\t\t\t\t\t\t\t";
                    }
                    // line 223
                    echo "\t\t\t\t\t\t\t";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['pagination'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 224
                echo "\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t";
            }
            // line 227
            echo "
\t\t\t\t\t\t";
            // line 228
            // line 229
            echo "\t\t\t\t\t</div>
\t\t\t\t</dt>
\t\t\t\t<dd class=\"posts\">";
            // line 231
            echo twig_get_attribute($this->env, $this->source, $context["topicrow"], "REPLIES", [], "any", false, false, false, 231);
            echo " <dfn>";
            echo $this->extensions['phpbb\template\twig\extension']->lang("REPLIES");
            echo "</dfn></dd>
\t\t\t\t<dd class=\"views\">";
            // line 232
            echo twig_get_attribute($this->env, $this->source, $context["topicrow"], "VIEWS", [], "any", false, false, false, 232);
            echo " <dfn>";
            echo $this->extensions['phpbb\template\twig\extension']->lang("VIEWS");
            echo "</dfn></dd>
\t\t\t\t<dd class=\"lastpost\">
\t\t\t\t\t<span><dfn>";
            // line 234
            echo $this->extensions['phpbb\template\twig\extension']->lang("LAST_POST");
            echo " </dfn>";
            echo $this->extensions['phpbb\template\twig\extension']->lang("POST_BY_AUTHOR");
            echo " ";
            echo twig_get_attribute($this->env, $this->source, $context["topicrow"], "LAST_POST_AUTHOR_FULL", [], "any", false, false, false, 234);
            // line 235
            echo "\t\t\t\t\t\t";
            if (( !($context["S_IS_BOT"] ?? null) && twig_get_attribute($this->env, $this->source, $context["topicrow"], "U_LAST_POST", [], "any", false, false, false, 235))) {
                // line 236
                echo "\t\t\t\t\t\t\t<a href=\"";
                echo twig_get_attribute($this->env, $this->source, $context["topicrow"], "U_LAST_POST", [], "any", false, false, false, 236);
                echo "\" title=\"";
                echo $this->extensions['phpbb\template\twig\extension']->lang("GOTO_LAST_POST");
                echo "\">
\t\t\t\t\t\t\t\t<i class=\"icon fa-external-link-square fa-fw icon-lightgray icon-md\" aria-hidden=\"true\"></i><span class=\"sr-only\">";
                // line 237
                echo ($context["VIEW_LATEST_POST"] ?? null);
                echo "</span>
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t";
            }
            // line 240
            echo "\t\t\t\t\t\t<br /><time datetime=\"";
            echo twig_get_attribute($this->env, $this->source, $context["topicrow"], "LAST_POST_TIME_RFC3339", [], "any", false, false, false, 240);
            echo "\">";
            echo twig_get_attribute($this->env, $this->source, $context["topicrow"], "LAST_POST_TIME", [], "any", false, false, false, 240);
            echo "</time>
\t\t\t\t\t</span>
\t\t\t\t</dd>
\t\t\t</dl>
\t\t\t";
            // line 244
            // line 245
            echo "\t\t</li>
\t\t";
            // line 246
            // line 247
            echo "
\t";
            // line 248
            if (twig_get_attribute($this->env, $this->source, $context["topicrow"], "S_LAST_ROW", [], "any", false, false, false, 248)) {
                // line 249
                echo "\t\t\t</ul>
\t\t</div>
\t</div>
\t";
            }
            // line 253
            echo "
";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 255
            echo "\t";
            if (($context["S_IS_POSTABLE"] ?? null)) {
                // line 256
                echo "\t<div class=\"panel\">
\t\t<div class=\"inner\">
\t\t<strong>";
                // line 258
                echo $this->extensions['phpbb\template\twig\extension']->lang(((($context["S_SORT_DAYS"] ?? null)) ? ("NO_TOPICS_TIME_FRAME") : ("NO_TOPICS")));
                echo "</strong>
\t\t</div>
\t</div>
\t";
            } elseif ( !            // line 261
($context["S_HAS_SUBFORUM"] ?? null)) {
                // line 262
                echo "\t<div class=\"panel\">
\t\t<div class=\"inner\">
\t\t\t<strong>";
                // line 264
                echo $this->extensions['phpbb\template\twig\extension']->lang("NO_FORUMS_IN_CATEGORY");
                echo "</strong>
\t\t</div>
\t</div>
\t";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['topicrow'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 269
        echo "
";
        // line 270
        if ((twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["loops"] ?? null), "topicrow", [], "any", false, false, false, 270)) &&  !($context["S_DISPLAY_ACTIVE"] ?? null))) {
            // line 271
            echo "\t<div class=\"action-bar bar-bottom\">
\t\t";
            // line 272
            if (( !($context["S_IS_BOT"] ?? null) && ($context["S_DISPLAY_POST_INFO"] ?? null))) {
                // line 273
                echo "\t\t\t";
                // line 274
                echo "
\t\t\t<a href=\"";
                // line 275
                echo ($context["U_POST_NEW_TOPIC"] ?? null);
                echo "\" class=\"button\" title=\"";
                if (($context["S_IS_LOCKED"] ?? null)) {
                    echo $this->extensions['phpbb\template\twig\extension']->lang("FORUM_LOCKED");
                } else {
                    echo $this->extensions['phpbb\template\twig\extension']->lang("POST_TOPIC");
                }
                echo "\">
\t\t\t";
                // line 276
                if (($context["S_IS_LOCKED"] ?? null)) {
                    // line 277
                    echo "\t\t\t\t<span>";
                    echo $this->extensions['phpbb\template\twig\extension']->lang("BUTTON_FORUM_LOCKED");
                    echo "</span> <i class=\"icon fa-lock fa-fw\" aria-hidden=\"true\"></i>
\t\t\t";
                } else {
                    // line 279
                    echo "\t\t\t\t<span>";
                    echo $this->extensions['phpbb\template\twig\extension']->lang("BUTTON_NEW_TOPIC");
                    echo "</span> <i class=\"icon fa-pencil fa-fw\" aria-hidden=\"true\"></i>
\t\t\t";
                }
                // line 281
                echo "\t\t\t</a>

\t\t\t";
                // line 283
                // line 284
                echo "\t\t";
            }
            // line 285
            echo "
\t\t";
            // line 286
            if ((($context["S_SELECT_SORT_DAYS"] ?? null) &&  !($context["S_IS_BOT"] ?? null))) {
                // line 287
                echo "\t\t\t<form method=\"post\" action=\"";
                echo ($context["S_FORUM_ACTION"] ?? null);
                echo "\">
\t\t\t";
                // line 288
                $location = "display_options.html";
                $namespace = false;
                if (strpos($location, '@') === 0) {
                    $namespace = substr($location, 1, strpos($location, '/') - 1);
                    $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
                    $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
                }
                $this->loadTemplate("display_options.html", "viewforum_body.html", 288)->display($context);
                if ($namespace) {
                    $this->env->setNamespaceLookUpOrder($previous_look_up_order);
                }
                // line 289
                echo "\t\t\t</form>
\t\t";
            }
            // line 291
            echo "
\t\t<div class=\"pagination\">
\t\t\t";
            // line 293
            if ((( !($context["S_IS_BOT"] ?? null) && ($context["U_MARK_TOPICS"] ?? null)) && twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["loops"] ?? null), "topicrow", [], "any", false, false, false, 293)))) {
                echo "<a href=\"";
                echo ($context["U_MARK_TOPICS"] ?? null);
                echo "\" data-ajax=\"mark_topics_read\">";
                echo $this->extensions['phpbb\template\twig\extension']->lang("MARK_TOPICS_READ");
                echo "</a> &bull; ";
            }
            // line 294
            echo "\t\t\t";
            echo ($context["TOTAL_TOPICS"] ?? null);
            echo "
\t\t\t";
            // line 295
            if (twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["loops"] ?? null), "pagination", [], "any", false, false, false, 295))) {
                // line 296
                echo "\t\t\t\t";
                $location = "pagination.html";
                $namespace = false;
                if (strpos($location, '@') === 0) {
                    $namespace = substr($location, 1, strpos($location, '/') - 1);
                    $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
                    $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
                }
                $this->loadTemplate("pagination.html", "viewforum_body.html", 296)->display($context);
                if ($namespace) {
                    $this->env->setNamespaceLookUpOrder($previous_look_up_order);
                }
                // line 297
                echo "\t\t\t";
            } else {
                // line 298
                echo "\t\t\t\t &bull; ";
                echo ($context["PAGE_NUMBER"] ?? null);
                echo "
\t\t\t";
            }
            // line 300
            echo "\t\t</div>
\t</div>
";
        }
        // line 303
        echo "
";
        // line 304
        $location = "jumpbox.html";
        $namespace = false;
        if (strpos($location, '@') === 0) {
            $namespace = substr($location, 1, strpos($location, '/') - 1);
            $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
            $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
        }
        $this->loadTemplate("jumpbox.html", "viewforum_body.html", 304)->display($context);
        if ($namespace) {
            $this->env->setNamespaceLookUpOrder($previous_look_up_order);
        }
        // line 305
        echo "
";
        // line 306
        // line 307
        echo "
";
        // line 308
        if ((($context["S_DISPLAY_ONLINE_LIST"] ?? null) && ($context["U_VIEWONLINE"] ?? null))) {
            // line 309
            echo "\t<div class=\"stat-block online-list\">
\t\t<h3><a href=\"";
            // line 310
            echo ($context["U_VIEWONLINE"] ?? null);
            echo "\">";
            echo $this->extensions['phpbb\template\twig\extension']->lang("WHO_IS_ONLINE");
            echo "</a></h3>
\t\t<p>";
            // line 311
            echo ($context["LOGGED_IN_USER_LIST"] ?? null);
            echo "</p>
\t</div>
";
        }
        // line 314
        echo "
";
        // line 315
        if ((($context["S_IS_POSTABLE"] ?? null) && twig_length_filter($this->env, ($context["rules"] ?? null)))) {
            // line 316
            echo "\t<div class=\"stat-block permissions\">
\t\t<h3>";
            // line 317
            echo $this->extensions['phpbb\template\twig\extension']->lang("FORUM_PERMISSIONS");
            echo "</h3>
\t\t<p>";
            // line 318
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["loops"] ?? null), "rules", [], "any", false, false, false, 318));
            foreach ($context['_seq'] as $context["_key"] => $context["rules"]) {
                echo twig_get_attribute($this->env, $this->source, $context["rules"], "RULE", [], "any", false, false, false, 318);
                echo "<br />";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['rules'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            echo "</p>
\t</div>
";
        }
        // line 321
        echo "
";
        // line 322
        $location = "overall_footer.html";
        $namespace = false;
        if (strpos($location, '@') === 0) {
            $namespace = substr($location, 1, strpos($location, '/') - 1);
            $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
            $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
        }
        $this->loadTemplate("overall_footer.html", "viewforum_body.html", 322)->display($context);
        if ($namespace) {
            $this->env->setNamespaceLookUpOrder($previous_look_up_order);
        }
    }

    public function getTemplateName()
    {
        return "viewforum_body.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  1068 => 322,  1065 => 321,  1051 => 318,  1047 => 317,  1044 => 316,  1042 => 315,  1039 => 314,  1033 => 311,  1027 => 310,  1024 => 309,  1022 => 308,  1019 => 307,  1018 => 306,  1015 => 305,  1003 => 304,  1000 => 303,  995 => 300,  989 => 298,  986 => 297,  973 => 296,  971 => 295,  966 => 294,  958 => 293,  954 => 291,  950 => 289,  938 => 288,  933 => 287,  931 => 286,  928 => 285,  925 => 284,  924 => 283,  920 => 281,  914 => 279,  908 => 277,  906 => 276,  896 => 275,  893 => 274,  891 => 273,  889 => 272,  886 => 271,  884 => 270,  881 => 269,  870 => 264,  866 => 262,  864 => 261,  858 => 258,  854 => 256,  851 => 255,  845 => 253,  839 => 249,  837 => 248,  834 => 247,  833 => 246,  830 => 245,  829 => 244,  819 => 240,  813 => 237,  806 => 236,  803 => 235,  797 => 234,  790 => 232,  784 => 231,  780 => 229,  779 => 228,  776 => 227,  771 => 224,  765 => 223,  755 => 221,  753 => 220,  747 => 219,  740 => 218,  737 => 217,  733 => 216,  728 => 213,  726 => 212,  722 => 210,  711 => 209,  710 => 208,  699 => 207,  697 => 206,  692 => 205,  688 => 204,  684 => 202,  681 => 201,  673 => 199,  671 => 198,  668 => 197,  656 => 196,  640 => 195,  637 => 194,  635 => 193,  632 => 192,  627 => 191,  626 => 190,  623 => 189,  617 => 186,  610 => 185,  607 => 184,  601 => 181,  594 => 180,  591 => 179,  581 => 176,  570 => 175,  567 => 174,  556 => 173,  550 => 170,  545 => 169,  542 => 168,  541 => 167,  538 => 166,  532 => 165,  521 => 164,  516 => 163,  515 => 162,  494 => 161,  493 => 160,  490 => 159,  481 => 153,  477 => 152,  473 => 151,  459 => 150,  448 => 145,  446 => 144,  443 => 143,  437 => 139,  435 => 138,  432 => 137,  427 => 136,  424 => 135,  423 => 134,  420 => 133,  416 => 131,  403 => 121,  399 => 120,  394 => 118,  386 => 114,  380 => 113,  375 => 111,  369 => 108,  365 => 107,  348 => 103,  339 => 97,  336 => 96,  334 => 95,  327 => 91,  322 => 88,  320 => 87,  317 => 86,  311 => 82,  305 => 80,  302 => 79,  289 => 78,  287 => 77,  282 => 76,  274 => 75,  270 => 73,  262 => 68,  257 => 66,  251 => 65,  246 => 63,  242 => 62,  238 => 61,  233 => 59,  230 => 58,  228 => 57,  225 => 56,  222 => 55,  221 => 54,  218 => 53,  212 => 51,  206 => 49,  204 => 48,  194 => 47,  191 => 46,  189 => 45,  187 => 44,  183 => 42,  181 => 41,  178 => 40,  164 => 38,  162 => 37,  159 => 36,  153 => 32,  148 => 30,  143 => 29,  135 => 27,  133 => 26,  124 => 23,  122 => 22,  119 => 21,  115 => 19,  101 => 18,  95 => 17,  91 => 15,  89 => 14,  88 => 13,  79 => 12,  78 => 11,  66 => 10,  61 => 8,  53 => 6,  50 => 5,  42 => 3,  39 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "viewforum_body.html", "");
    }
}

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

/* memberlist_body.html */
class __TwigTemplate_63b1169347422c1b40c00fa412a6f1e9 extends \Twig\Template
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
        if (($context["S_IN_SEARCH_POPUP"] ?? null)) {
            // line 2
            echo "\t";
            $location = "simple_header.html";
            $namespace = false;
            if (strpos($location, '@') === 0) {
                $namespace = substr($location, 1, strpos($location, '/') - 1);
                $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
                $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
            }
            $this->loadTemplate("simple_header.html", "memberlist_body.html", 2)->display($context);
            if ($namespace) {
                $this->env->setNamespaceLookUpOrder($previous_look_up_order);
            }
            // line 3
            echo "\t";
            $location = "memberlist_search.html";
            $namespace = false;
            if (strpos($location, '@') === 0) {
                $namespace = substr($location, 1, strpos($location, '/') - 1);
                $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
                $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
            }
            $this->loadTemplate("memberlist_search.html", "memberlist_body.html", 3)->display($context);
            if ($namespace) {
                $this->env->setNamespaceLookUpOrder($previous_look_up_order);
            }
            // line 4
            echo "\t<form method=\"post\" id=\"results\" action=\"";
            echo ($context["S_MODE_ACTION"] ?? null);
            echo "\" onsubmit=\"insert_marked_users('#results', this.user); return false;\" data-form-name=\"";
            echo ($context["S_FORM_NAME"] ?? null);
            echo "\" data-field-name=\"";
            echo ($context["S_FIELD_NAME"] ?? null);
            echo "\">

";
        } else {
            // line 7
            echo "\t";
            ob_start();
            // line 8
            echo "\t\t";
            if ((($context["U_FIND_MEMBER"] ?? null) &&  !($context["S_SEARCH_USER"] ?? null))) {
                // line 9
                echo "\t\t\t<li class=\"small-icon icon-search\"><a href=\"";
                echo ($context["U_FIND_MEMBER"] ?? null);
                echo "\" data-alt-text=\"";
                echo twig_escape_filter($this->env, $this->extensions['phpbb\template\twig\extension']->lang("HIDE_MEMBER_SEARCH"), "js");
                echo "\">";
                echo $this->extensions['phpbb\template\twig\extension']->lang("FIND_USERNAME");
                echo "</a></li>
\t\t";
            } elseif (((            // line 10
($context["S_SEARCH_USER"] ?? null) && ($context["U_HIDE_FIND_MEMBER"] ?? null)) &&  !($context["S_IN_SEARCH_POPUP"] ?? null))) {
                // line 11
                echo "\t\t\t<li class=\"small-icon icon-search\"><a href=\"";
                echo ($context["U_HIDE_FIND_MEMBER"] ?? null);
                echo "\" data-alt-text=\"";
                echo twig_escape_filter($this->env, $this->extensions['phpbb\template\twig\extension']->lang("FIND_USERNAME"), "js");
                echo "\">";
                echo $this->extensions['phpbb\template\twig\extension']->lang("HIDE_MEMBER_SEARCH");
                echo "</a></li>
\t\t";
            }
            // line 13
            echo "\t\t";
            if (($context["U_TEAM"] ?? null)) {
                echo "<li class=\"small-icon icon-team\"><a href=\"";
                echo ($context["U_TEAM"] ?? null);
                echo "\" role=\"menuitem\">";
                echo $this->extensions['phpbb\template\twig\extension']->lang("THE_TEAM");
                echo "</a></li>";
            }
            // line 14
            echo "\t";
            $value = ('' === $value = ob_get_clean()) ? '' : new \Twig\Markup($value, $this->env->getCharset());
            $context['definition']->set('NAVLINKS', $value);
            // line 15
            echo "\t";
            $location = "overall_header.html";
            $namespace = false;
            if (strpos($location, '@') === 0) {
                $namespace = substr($location, 1, strpos($location, '/') - 1);
                $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
                $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
            }
            $this->loadTemplate("overall_header.html", "memberlist_body.html", 15)->display($context);
            if ($namespace) {
                $this->env->setNamespaceLookUpOrder($previous_look_up_order);
            }
            // line 16
            echo "\t<div class=\"panel\" id=\"memberlist_search\"";
            if ( !($context["S_SEARCH_USER"] ?? null)) {
                echo " style=\"display: none;\"";
            }
            echo ">
\t";
            // line 17
            $location = "memberlist_search.html";
            $namespace = false;
            if (strpos($location, '@') === 0) {
                $namespace = substr($location, 1, strpos($location, '/') - 1);
                $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
                $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
            }
            $this->loadTemplate("memberlist_search.html", "memberlist_body.html", 17)->display($context);
            if ($namespace) {
                $this->env->setNamespaceLookUpOrder($previous_look_up_order);
            }
            // line 18
            echo "\t</div>
\t<form method=\"post\" action=\"";
            // line 19
            echo ($context["S_MODE_ACTION"] ?? null);
            echo "\">

";
        }
        // line 22
        echo "
";
        // line 23
        // line 24
        echo "
\t";
        // line 25
        if (($context["S_SHOW_GROUP"] ?? null)) {
            // line 26
            echo "\t\t";
            // line 27
            echo "\t\t<h2 class=\"group-title\"";
            if (($context["GROUP_COLOR"] ?? null)) {
                echo " style=\"color:#";
                echo ($context["GROUP_COLOR"] ?? null);
                echo ";\"";
            }
            echo ">";
            echo ($context["GROUP_NAME"] ?? null);
            echo "</h2>
\t\t";
            // line 28
            // line 29
            echo "\t\t";
            if (($context["U_MANAGE"] ?? null)) {
                // line 30
                echo "\t\t\t<p class=\"right responsive-center manage rightside\"><a href=\"";
                echo ($context["U_MANAGE"] ?? null);
                echo "\">";
                echo $this->extensions['phpbb\template\twig\extension']->lang("MANAGE_GROUP");
                echo "</a></p>
\t\t";
            }
            // line 32
            echo "\t\t<div class=\"group-description\">";
            echo ($context["GROUP_DESC"] ?? null);
            echo " ";
            echo ($context["GROUP_TYPE"] ?? null);
            echo "</div>

\t\t";
            // line 34
            // line 35
            echo "
\t\t<p>
\t\t\t";
            // line 37
            if (($context["AVATAR_IMG"] ?? null)) {
                echo ($context["AVATAR_IMG"] ?? null);
            }
            // line 38
            echo "\t\t\t";
            // line 39
            echo "\t\t\t";
            if (($context["RANK_IMG"] ?? null)) {
                echo ($context["RANK_IMG"] ?? null);
            }
            // line 40
            echo "\t\t\t";
            if (($context["GROUP_RANK"] ?? null)) {
                // line 41
                echo "\t\t\t\t";
                if ( !($context["RANK_IMG"] ?? null)) {
                    // line 42
                    echo "\t\t\t\t\t";
                    echo ($this->extensions['phpbb\template\twig\extension']->lang("GROUP_RANK") . $this->extensions['phpbb\template\twig\extension']->lang("COLON"));
                    echo "
\t\t\t\t";
                }
                // line 44
                echo "\t\t\t\t";
                echo ($context["GROUP_RANK"] ?? null);
                echo "
\t\t\t";
            }
            // line 46
            echo "\t\t\t";
            // line 47
            echo "\t\t</p>
\t";
        } else {
            // line 49
            echo "\t\t";
            // line 50
            echo "\t\t<h2 class=\"solo\">";
            echo ($context["PAGE_TITLE"] ?? null);
            if (($context["SEARCH_WORDS"] ?? null)) {
                echo $this->extensions['phpbb\template\twig\extension']->lang("COLON");
                echo " <a href=\"";
                echo ($context["U_SEARCH_WORDS"] ?? null);
                echo "\">";
                echo ($context["SEARCH_WORDS"] ?? null);
                echo "</a>";
            }
            echo "</h2>

\t\t<div class=\"action-bar bar-top\">
\t\t\t<div class=\"member-search panel\">
\t\t\t\t";
            // line 54
            if ((($context["U_FIND_MEMBER"] ?? null) &&  !($context["S_SEARCH_USER"] ?? null))) {
                echo "<a href=\"";
                echo ($context["U_FIND_MEMBER"] ?? null);
                echo "\" id=\"member_search\" data-alt-text=\"";
                echo $this->extensions['phpbb\template\twig\extension']->lang("HIDE_MEMBER_SEARCH");
                echo "\">";
                echo $this->extensions['phpbb\template\twig\extension']->lang("FIND_USERNAME");
                echo "</a> &bull; ";
            } elseif (((($context["S_SEARCH_USER"] ?? null) && ($context["U_HIDE_FIND_MEMBER"] ?? null)) &&  !($context["S_IN_SEARCH_POPUP"] ?? null))) {
                echo "<a href=\"";
                echo ($context["U_HIDE_FIND_MEMBER"] ?? null);
                echo "\" id=\"member_search\" data-alt-text=\"";
                echo $this->extensions['phpbb\template\twig\extension']->lang("FIND_USERNAME");
                echo "\">";
                echo $this->extensions['phpbb\template\twig\extension']->lang("HIDE_MEMBER_SEARCH");
                echo "</a> &bull; ";
            }
            // line 55
            echo "\t\t\t\t<strong>
\t\t\t\t";
            // line 56
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["loops"] ?? null), "first_char", [], "any", false, false, false, 56));
            foreach ($context['_seq'] as $context["_key"] => $context["first_char"]) {
                // line 57
                echo "\t\t\t\t\t<a href=\"";
                echo twig_get_attribute($this->env, $this->source, $context["first_char"], "U_SORT", [], "any", false, false, false, 57);
                echo "\">";
                echo twig_get_attribute($this->env, $this->source, $context["first_char"], "DESC", [], "any", false, false, false, 57);
                echo "</a>&nbsp;
\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['first_char'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 59
            echo "\t\t\t\t</strong>
\t\t\t</div>

\t\t\t<div class=\"pagination\">
\t\t\t\t";
            // line 63
            echo ($context["TOTAL_USERS"] ?? null);
            echo "
\t\t\t\t";
            // line 64
            if (twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["loops"] ?? null), "pagination", [], "any", false, false, false, 64))) {
                // line 65
                echo "\t\t\t\t\t";
                $location = "pagination.html";
                $namespace = false;
                if (strpos($location, '@') === 0) {
                    $namespace = substr($location, 1, strpos($location, '/') - 1);
                    $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
                    $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
                }
                $this->loadTemplate("pagination.html", "memberlist_body.html", 65)->display($context);
                if ($namespace) {
                    $this->env->setNamespaceLookUpOrder($previous_look_up_order);
                }
                // line 66
                echo "\t\t\t\t";
            } else {
                // line 67
                echo "\t\t\t\t\t &bull; ";
                echo ($context["PAGE_NUMBER"] ?? null);
                echo "
\t\t\t\t";
            }
            // line 69
            echo "\t\t\t</div>
\t\t</div>
\t";
        }
        // line 72
        echo "
\t";
        // line 73
        if (((($context["S_LEADERS_SET"] ?? null) ||  !($context["S_SHOW_GROUP"] ?? null)) ||  !twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["loops"] ?? null), "memberrow", [], "any", false, false, false, 73)))) {
            // line 74
            echo "\t<div class=\"forumbg forumbg-table\">
\t\t<div class=\"inner\">

\t\t<table class=\"table1 memberlist\" id=\"memberlist\">
\t\t<thead>
\t\t<tr>
\t\t\t<th class=\"name\" data-dfn=\"";
            // line 80
            echo $this->extensions['phpbb\template\twig\extension']->lang("RANK");
            echo $this->extensions['phpbb\template\twig\extension']->lang("COMMA_SEPARATOR");
            if ((($context["S_SHOW_GROUP"] ?? null) && twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["loops"] ?? null), "memberrow", [], "any", false, false, false, 80)))) {
                echo $this->extensions['phpbb\template\twig\extension']->lang("GROUP_LEADER");
            } else {
                echo $this->extensions['phpbb\template\twig\extension']->lang("USERNAME");
            }
            echo "\"><span class=\"rank-img\"><a href=\"";
            echo ($context["U_SORT_RANK"] ?? null);
            echo "\">";
            echo $this->extensions['phpbb\template\twig\extension']->lang("RANK");
            echo "</a></span><a href=\"";
            echo ($context["U_SORT_USERNAME"] ?? null);
            echo "\">";
            if ((($context["S_SHOW_GROUP"] ?? null) && twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["loops"] ?? null), "memberrow", [], "any", false, false, false, 80)))) {
                echo $this->extensions['phpbb\template\twig\extension']->lang("GROUP_LEADER");
            } else {
                echo $this->extensions['phpbb\template\twig\extension']->lang("USERNAME");
            }
            echo "</a></th>
\t\t\t<th class=\"posts\"><a href=\"";
            // line 81
            echo ($context["U_SORT_POSTS"] ?? null);
            echo "#memberlist\">";
            echo $this->extensions['phpbb\template\twig\extension']->lang("POSTS");
            echo "</a></th>
\t\t\t<th class=\"info\">";
            // line 82
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["loops"] ?? null), "custom_fields", [], "any", false, false, false, 82));
            foreach ($context['_seq'] as $context["_key"] => $context["custom_fields"]) {
                if ( !twig_get_attribute($this->env, $this->source, $context["custom_fields"], "S_FIRST_ROW", [], "any", false, false, false, 82)) {
                    echo $this->extensions['phpbb\template\twig\extension']->lang("COMMA_SEPARATOR");
                    echo " ";
                }
                echo twig_get_attribute($this->env, $this->source, $context["custom_fields"], "PROFILE_FIELD_NAME", [], "any", false, false, false, 82);
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['custom_fields'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            echo "</th>
\t\t\t<th class=\"joined\"><a href=\"";
            // line 83
            echo ($context["U_SORT_JOINED"] ?? null);
            echo "#memberlist\">";
            echo $this->extensions['phpbb\template\twig\extension']->lang("JOINED");
            echo "</a></th>
\t\t\t";
            // line 84
            if (($context["U_SORT_ACTIVE"] ?? null)) {
                echo "<th class=\"active\"><a href=\"";
                echo ($context["U_SORT_ACTIVE"] ?? null);
                echo "#memberlist\">";
                echo $this->extensions['phpbb\template\twig\extension']->lang("LAST_ACTIVE");
                echo "</a></th>";
            }
            // line 85
            echo "\t\t\t";
            // line 86
            echo "\t\t</tr>
\t\t</thead>
\t\t<tbody>
\t";
        }
        // line 90
        echo "\t\t";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["loops"] ?? null), "memberrow", [], "any", false, false, false, 90));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["memberrow"]) {
            // line 91
            echo "\t\t\t";
            if (($context["S_SHOW_GROUP"] ?? null)) {
                // line 92
                echo "\t\t\t\t";
                if (( !twig_get_attribute($this->env, $this->source, $context["memberrow"], "S_GROUP_LEADER", [], "any", false, false, false, 92) &&  !twig_get_attribute($this->env, $this->source, ($context["definition"] ?? null), "S_MEMBER_HEADER", [], "any", false, false, false, 92))) {
                    // line 93
                    echo "\t\t\t\t";
                    if ((($context["S_LEADERS_SET"] ?? null) && twig_get_attribute($this->env, $this->source, $context["memberrow"], "S_FIRST_ROW", [], "any", false, false, false, 93))) {
                        // line 94
                        echo "\t\t\t\t<tr class=\"bg1\">
\t\t\t\t\t<td colspan=\"";
                        // line 95
                        if (($context["U_SORT_ACTIVE"] ?? null)) {
                            echo "5";
                        } else {
                            echo "4";
                        }
                        echo "\">&nbsp;</td>
\t\t\t\t</tr>
\t\t\t\t";
                    }
                    // line 98
                    if (($context["S_LEADERS_SET"] ?? null)) {
                        // line 99
                        echo "\t\t</tbody>
\t\t</table>

\t</div>
</div>
";
                    }
                    // line 105
                    echo "<div class=\"forumbg forumbg-table\">
\t<div class=\"inner\">

\t<table class=\"table1\">
\t<thead>
\t<tr>
\t";
                    // line 111
                    if ( !($context["S_LEADERS_SET"] ?? null)) {
                        // line 112
                        echo "\t\t<th class=\"name\" data-dfn=\"";
                        echo $this->extensions['phpbb\template\twig\extension']->lang("RANK");
                        echo $this->extensions['phpbb\template\twig\extension']->lang("COMMA_SEPARATOR");
                        echo $this->extensions['phpbb\template\twig\extension']->lang("USERNAME");
                        echo "\"><span class=\"rank-img\"><a href=\"";
                        echo ($context["U_SORT_RANK"] ?? null);
                        echo "\">";
                        echo $this->extensions['phpbb\template\twig\extension']->lang("RANK");
                        echo "</a></span><a href=\"";
                        echo ($context["U_SORT_USERNAME"] ?? null);
                        echo "\">";
                        if (($context["S_SHOW_GROUP"] ?? null)) {
                            echo $this->extensions['phpbb\template\twig\extension']->lang("GROUP_MEMBERS");
                        } else {
                            echo $this->extensions['phpbb\template\twig\extension']->lang("USERNAME");
                        }
                        echo "</a></th>
\t\t\t<th class=\"posts\"><a href=\"";
                        // line 113
                        echo ($context["U_SORT_POSTS"] ?? null);
                        echo "#memberlist\">";
                        echo $this->extensions['phpbb\template\twig\extension']->lang("POSTS");
                        echo "</a></th>
\t\t\t<th class=\"info\">";
                        // line 114
                        $context['_parent'] = $context;
                        $context['_seq'] = twig_ensure_traversable(($context["custom_fields"] ?? null));
                        $context['loop'] = [
                          'parent' => $context['_parent'],
                          'index0' => 0,
                          'index'  => 1,
                          'first'  => true,
                        ];
                        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
                            $length = count($context['_seq']);
                            $context['loop']['revindex0'] = $length - 1;
                            $context['loop']['revindex'] = $length;
                            $context['loop']['length'] = $length;
                            $context['loop']['last'] = 1 === $length;
                        }
                        foreach ($context['_seq'] as $context["_key"] => $context["field"]) {
                            if ( !twig_get_attribute($this->env, $this->source, $context["loop"], "first", [], "any", false, false, false, 114)) {
                                echo $this->extensions['phpbb\template\twig\extension']->lang("COMMA_SEPARATOR");
                                echo " ";
                            }
                            echo twig_get_attribute($this->env, $this->source, $context["field"], "PROFILE_FIELD_NAME", [], "any", false, false, false, 114);
                            ++$context['loop']['index0'];
                            ++$context['loop']['index'];
                            $context['loop']['first'] = false;
                            if (isset($context['loop']['length'])) {
                                --$context['loop']['revindex0'];
                                --$context['loop']['revindex'];
                                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                            }
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['field'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        echo "</th>
\t\t\t<th class=\"joined\"><a href=\"";
                        // line 115
                        echo ($context["U_SORT_JOINED"] ?? null);
                        echo "#memberlist\">";
                        echo $this->extensions['phpbb\template\twig\extension']->lang("JOINED");
                        echo "</a></th>
\t\t\t";
                        // line 116
                        if (($context["U_SORT_ACTIVE"] ?? null)) {
                            echo "<th class=\"active\"><a href=\"";
                            echo ($context["U_SORT_ACTIVE"] ?? null);
                            echo "#memberlist\">";
                            echo $this->extensions['phpbb\template\twig\extension']->lang("LAST_ACTIVE");
                            echo "</a></th>";
                        }
                        // line 117
                        echo "\t\t\t";
                        // line 118
                        echo "\t";
                    } elseif (($context["S_SHOW_GROUP"] ?? null)) {
                        // line 119
                        echo "\t\t<th class=\"name\">";
                        echo $this->extensions['phpbb\template\twig\extension']->lang("GROUP_MEMBERS");
                        echo "</th>
\t\t<th class=\"posts\">";
                        // line 120
                        echo $this->extensions['phpbb\template\twig\extension']->lang("POSTS");
                        echo "</th>
\t\t<th class=\"info\">";
                        // line 121
                        $context['_parent'] = $context;
                        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["memberrow"], "custom_fields", [], "any", false, false, false, 121));
                        foreach ($context['_seq'] as $context["_key"] => $context["custom_fields"]) {
                            if ( !twig_get_attribute($this->env, $this->source, $context["custom_fields"], "S_FIRST_ROW", [], "any", false, false, false, 121)) {
                                echo $this->extensions['phpbb\template\twig\extension']->lang("COMMA_SEPARATOR");
                                echo " ";
                            }
                            echo twig_get_attribute($this->env, $this->source, $context["custom_fields"], "PROFILE_FIELD_NAME", [], "any", false, false, false, 121);
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['custom_fields'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        echo "</th>
\t\t<th class=\"joined\">";
                        // line 122
                        echo $this->extensions['phpbb\template\twig\extension']->lang("JOINED");
                        echo "</th>
\t\t";
                        // line 123
                        if (($context["U_SORT_ACTIVE"] ?? null)) {
                            echo "<th class=\"active\">";
                            echo $this->extensions['phpbb\template\twig\extension']->lang("LAST_ACTIVE");
                            echo "</th>";
                        }
                        // line 124
                        echo "\t\t";
                        // line 125
                        echo "\t";
                    }
                    // line 126
                    echo "\t</tr>
\t</thead>
\t<tbody>
\t\t\t\t\t";
                    // line 129
                    $value = 1;
                    $context['definition']->set('S_MEMBER_HEADER', $value);
                    // line 130
                    echo "\t\t\t\t";
                }
                // line 131
                echo "\t\t\t";
            }
            // line 132
            echo "
\t<tr class=\"";
            // line 133
            if ((twig_get_attribute($this->env, $this->source, $context["memberrow"], "S_ROW_COUNT", [], "any", false, false, false, 133) % 2 == 0)) {
                echo "bg1";
            } else {
                echo "bg2";
            }
            if (twig_get_attribute($this->env, $this->source, $context["memberrow"], "S_INACTIVE", [], "any", false, false, false, 133)) {
                echo " inactive";
            }
            echo "\">
\t\t<td><span class=\"rank-img\">";
            // line 134
            if (twig_get_attribute($this->env, $this->source, $context["memberrow"], "RANK_IMG", [], "any", false, false, false, 134)) {
                echo twig_get_attribute($this->env, $this->source, $context["memberrow"], "RANK_IMG", [], "any", false, false, false, 134);
            } else {
                echo twig_get_attribute($this->env, $this->source, $context["memberrow"], "RANK_TITLE", [], "any", false, false, false, 134);
            }
            echo "</span>";
            if ((($context["S_IN_SEARCH_POPUP"] ?? null) &&  !($context["S_SELECT_SINGLE"] ?? null))) {
                echo "<input type=\"checkbox\" name=\"user\" value=\"";
                echo twig_get_attribute($this->env, $this->source, $context["memberrow"], "USERNAME", [], "any", false, false, false, 134);
                echo "\" /> ";
            }
            echo twig_get_attribute($this->env, $this->source, $context["memberrow"], "USERNAME_FULL", [], "any", false, false, false, 134);
            if (twig_get_attribute($this->env, $this->source, $context["memberrow"], "S_INACTIVE", [], "any", false, false, false, 134)) {
                echo " (";
                echo $this->extensions['phpbb\template\twig\extension']->lang("INACTIVE");
                echo ")";
            }
            if (($context["S_IN_SEARCH_POPUP"] ?? null)) {
                echo "<br />[&nbsp;<a href=\"#\" onclick=\"insert_single_user('#results', '";
                echo twig_get_attribute($this->env, $this->source, $context["memberrow"], "A_USERNAME", [], "any", false, false, false, 134);
                echo "'); return false;\">";
                echo $this->extensions['phpbb\template\twig\extension']->lang("SELECT");
                echo "</a>&nbsp;]";
            }
            echo "</td>
\t\t<td class=\"posts\">";
            // line 135
            if ((twig_get_attribute($this->env, $this->source, $context["memberrow"], "POSTS", [], "any", false, false, false, 135) && ($context["S_DISPLAY_SEARCH"] ?? null))) {
                echo "<a href=\"";
                echo twig_get_attribute($this->env, $this->source, $context["memberrow"], "U_SEARCH_USER", [], "any", false, false, false, 135);
                echo "\" title=\"";
                echo $this->extensions['phpbb\template\twig\extension']->lang("SEARCH_USER_POSTS");
                echo "\">";
                echo twig_get_attribute($this->env, $this->source, $context["memberrow"], "POSTS", [], "any", false, false, false, 135);
                echo "</a>";
            } else {
                echo twig_get_attribute($this->env, $this->source, $context["memberrow"], "POSTS", [], "any", false, false, false, 135);
            }
            echo "</td>
\t\t<td class=\"info\">";
            // line 137
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["memberrow"], "custom_fields", [], "any", false, false, false, 137));
            $context['_iterated'] = false;
            foreach ($context['_seq'] as $context["_key"] => $context["field"]) {
                // line 138
                echo "<div>";
                if (twig_get_attribute($this->env, $this->source, $context["field"], "S_PROFILE_CONTACT", [], "any", false, false, false, 138)) {
                    echo "<a href=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["field"], "PROFILE_FIELD_CONTACT", [], "any", false, false, false, 138);
                    echo "\">";
                }
                echo twig_get_attribute($this->env, $this->source, $context["field"], "PROFILE_FIELD_VALUE", [], "any", false, false, false, 138);
                if (twig_get_attribute($this->env, $this->source, $context["field"], "S_PROFILE_CONTACT", [], "any", false, false, false, 138)) {
                    echo "</a>";
                }
                echo "</div>";
                $context['_iterated'] = true;
            }
            if (!$context['_iterated']) {
                // line 140
                echo "&nbsp;";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['field'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 142
            echo "</td>
\t\t<td>";
            // line 143
            echo twig_get_attribute($this->env, $this->source, $context["memberrow"], "JOINED", [], "any", false, false, false, 143);
            echo "</td>
\t\t";
            // line 144
            if (($context["S_VIEWONLINE"] ?? null)) {
                echo "<td>";
                echo twig_get_attribute($this->env, $this->source, $context["memberrow"], "LAST_ACTIVE", [], "any", false, false, false, 144);
                echo "&nbsp;</td>";
            }
            // line 145
            echo "\t\t";
            // line 146
            echo "\t</tr>
\t\t";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 148
            echo "\t<tr class=\"bg1\">
\t\t<td colspan=\"";
            // line 149
            if (($context["S_VIEWONLINE"] ?? null)) {
                echo "5";
            } else {
                echo "4";
            }
            echo "\">";
            echo $this->extensions['phpbb\template\twig\extension']->lang("NO_MEMBERS");
            echo "</td>
\t</tr>
\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['memberrow'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 152
        echo "\t</tbody>
\t</table>

\t</div>
</div>

";
        // line 158
        if ((($context["S_IN_SEARCH_POPUP"] ?? null) &&  !($context["S_SELECT_SINGLE"] ?? null))) {
            // line 159
            echo "<fieldset class=\"display-actions\">
\t<input type=\"submit\" name=\"submit\" value=\"";
            // line 160
            echo $this->extensions['phpbb\template\twig\extension']->lang("SELECT_MARKED");
            echo "\" class=\"button2\" />
\t<div><a href=\"#\" onclick=\"marklist('results', 'user', true); return false;\">";
            // line 161
            echo $this->extensions['phpbb\template\twig\extension']->lang("MARK_ALL");
            echo "</a> &bull; <a href=\"#\" onclick=\"marklist('results', 'user', false); return false;\">";
            echo $this->extensions['phpbb\template\twig\extension']->lang("UNMARK_ALL");
            echo "</a></div>
</fieldset>
";
        }
        // line 164
        echo "
";
        // line 165
        if (($context["S_IN_SEARCH_POPUP"] ?? null)) {
            // line 166
            echo "</form>
<form method=\"post\" id=\"sort-results\" action=\"";
            // line 167
            echo ($context["S_MODE_ACTION"] ?? null);
            echo "\">
";
        }
        // line 169
        echo "
";
        // line 170
        if ((($context["S_IN_SEARCH_POPUP"] ?? null) &&  !($context["S_SEARCH_USER"] ?? null))) {
            // line 171
            echo "<fieldset class=\"display-options\">
\t<label for=\"sk\">";
            // line 172
            echo ($this->extensions['phpbb\template\twig\extension']->lang("SELECT_SORT_METHOD") . $this->extensions['phpbb\template\twig\extension']->lang("COLON"));
            echo " <select name=\"sk\" id=\"sk\">";
            echo ($context["S_MODE_SELECT"] ?? null);
            echo "</select></label>
\t<label for=\"sd\">";
            // line 173
            echo $this->extensions['phpbb\template\twig\extension']->lang("ORDER");
            echo " <select name=\"sd\" id=\"sd\">";
            echo ($context["S_ORDER_SELECT"] ?? null);
            echo "</select></label>
\t<input type=\"submit\" name=\"sort\" value=\"";
            // line 174
            echo $this->extensions['phpbb\template\twig\extension']->lang("SUBMIT");
            echo "\" class=\"button2\" />
</fieldset>
";
        }
        // line 177
        echo "
</form>

<div class=\"action-bar bar-bottom\">
\t<div class=\"pagination\">
\t\t";
        // line 182
        echo ($context["TOTAL_USERS"] ?? null);
        echo "
\t\t";
        // line 183
        if (twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["loops"] ?? null), "pagination", [], "any", false, false, false, 183))) {
            // line 184
            echo "\t\t\t";
            $location = "pagination.html";
            $namespace = false;
            if (strpos($location, '@') === 0) {
                $namespace = substr($location, 1, strpos($location, '/') - 1);
                $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
                $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
            }
            $this->loadTemplate("pagination.html", "memberlist_body.html", 184)->display($context);
            if ($namespace) {
                $this->env->setNamespaceLookUpOrder($previous_look_up_order);
            }
            // line 185
            echo "\t\t";
        } else {
            // line 186
            echo "\t\t\t &bull; ";
            echo ($context["PAGE_NUMBER"] ?? null);
            echo "
\t\t";
        }
        // line 188
        echo "\t</div>
</div>

";
        // line 191
        // line 192
        echo "
";
        // line 193
        if (($context["S_IN_SEARCH_POPUP"] ?? null)) {
            // line 194
            echo "\t";
            $location = "simple_footer.html";
            $namespace = false;
            if (strpos($location, '@') === 0) {
                $namespace = substr($location, 1, strpos($location, '/') - 1);
                $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
                $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
            }
            $this->loadTemplate("simple_footer.html", "memberlist_body.html", 194)->display($context);
            if ($namespace) {
                $this->env->setNamespaceLookUpOrder($previous_look_up_order);
            }
        } else {
            // line 196
            echo "\t";
            $location = "jumpbox.html";
            $namespace = false;
            if (strpos($location, '@') === 0) {
                $namespace = substr($location, 1, strpos($location, '/') - 1);
                $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
                $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
            }
            $this->loadTemplate("jumpbox.html", "memberlist_body.html", 196)->display($context);
            if ($namespace) {
                $this->env->setNamespaceLookUpOrder($previous_look_up_order);
            }
            // line 197
            echo "\t";
            $location = "overall_footer.html";
            $namespace = false;
            if (strpos($location, '@') === 0) {
                $namespace = substr($location, 1, strpos($location, '/') - 1);
                $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
                $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
            }
            $this->loadTemplate("overall_footer.html", "memberlist_body.html", 197)->display($context);
            if ($namespace) {
                $this->env->setNamespaceLookUpOrder($previous_look_up_order);
            }
        }
    }

    public function getTemplateName()
    {
        return "memberlist_body.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  848 => 197,  835 => 196,  821 => 194,  819 => 193,  816 => 192,  815 => 191,  810 => 188,  804 => 186,  801 => 185,  788 => 184,  786 => 183,  782 => 182,  775 => 177,  769 => 174,  763 => 173,  757 => 172,  754 => 171,  752 => 170,  749 => 169,  744 => 167,  741 => 166,  739 => 165,  736 => 164,  728 => 161,  724 => 160,  721 => 159,  719 => 158,  711 => 152,  696 => 149,  693 => 148,  687 => 146,  685 => 145,  679 => 144,  675 => 143,  672 => 142,  666 => 140,  651 => 138,  646 => 137,  632 => 135,  605 => 134,  594 => 133,  591 => 132,  588 => 131,  585 => 130,  582 => 129,  577 => 126,  574 => 125,  572 => 124,  566 => 123,  562 => 122,  547 => 121,  543 => 120,  538 => 119,  535 => 118,  533 => 117,  525 => 116,  519 => 115,  483 => 114,  477 => 113,  458 => 112,  456 => 111,  448 => 105,  440 => 99,  438 => 98,  428 => 95,  425 => 94,  422 => 93,  419 => 92,  416 => 91,  410 => 90,  404 => 86,  402 => 85,  394 => 84,  388 => 83,  373 => 82,  367 => 81,  345 => 80,  337 => 74,  335 => 73,  332 => 72,  327 => 69,  321 => 67,  318 => 66,  305 => 65,  303 => 64,  299 => 63,  293 => 59,  282 => 57,  278 => 56,  275 => 55,  257 => 54,  241 => 50,  239 => 49,  235 => 47,  233 => 46,  227 => 44,  221 => 42,  218 => 41,  215 => 40,  210 => 39,  208 => 38,  204 => 37,  200 => 35,  199 => 34,  191 => 32,  183 => 30,  180 => 29,  179 => 28,  168 => 27,  166 => 26,  164 => 25,  161 => 24,  160 => 23,  157 => 22,  151 => 19,  148 => 18,  136 => 17,  129 => 16,  116 => 15,  112 => 14,  103 => 13,  93 => 11,  91 => 10,  82 => 9,  79 => 8,  76 => 7,  65 => 4,  52 => 3,  39 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "memberlist_body.html", "");
    }
}

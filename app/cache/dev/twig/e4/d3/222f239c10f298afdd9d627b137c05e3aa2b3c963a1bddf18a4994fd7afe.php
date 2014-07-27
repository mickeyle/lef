<?php

/* NelmioApiDocBundle:Components:version.html.twig */
class __TwigTemplate_e4d3222f239c10f298afdd9d627b137c05e3aa2b3c963a1bddf18a4994fd7afe extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        if ((twig_test_empty((isset($context["sinceVersion"]) ? $context["sinceVersion"] : $this->getContext($context, "sinceVersion"))) && twig_test_empty((isset($context["untilVersion"]) ? $context["untilVersion"] : $this->getContext($context, "untilVersion"))))) {
            // line 2
            echo "*
";
        } else {
            // line 4
            echo "    ";
            if ((!twig_test_empty((isset($context["sinceVersion"]) ? $context["sinceVersion"] : $this->getContext($context, "sinceVersion"))))) {
                echo "&gt;=";
                echo twig_escape_filter($this->env, (isset($context["sinceVersion"]) ? $context["sinceVersion"] : $this->getContext($context, "sinceVersion")), "html", null, true);
            }
            // line 5
            echo "    ";
            if ((!twig_test_empty((isset($context["untilVersion"]) ? $context["untilVersion"] : $this->getContext($context, "untilVersion"))))) {
                // line 6
                echo "        ";
                if ((!twig_test_empty((isset($context["sinceVersion"]) ? $context["sinceVersion"] : $this->getContext($context, "sinceVersion"))))) {
                    echo ",";
                }
                echo "&lt;=";
                echo twig_escape_filter($this->env, (isset($context["untilVersion"]) ? $context["untilVersion"] : $this->getContext($context, "untilVersion")), "html", null, true);
                echo "
    ";
            }
        }
    }

    public function getTemplateName()
    {
        return "NelmioApiDocBundle:Components:version.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  34 => 6,  25 => 4,  21 => 2,  741 => 323,  737 => 321,  673 => 259,  662 => 253,  660 => 252,  652 => 246,  648 => 244,  642 => 243,  618 => 240,  607 => 232,  592 => 231,  589 => 230,  585 => 229,  582 => 228,  579 => 227,  576 => 226,  557 => 223,  552 => 221,  549 => 220,  545 => 219,  542 => 218,  539 => 217,  536 => 216,  517 => 213,  512 => 211,  509 => 210,  502 => 208,  500 => 207,  487 => 204,  477 => 202,  475 => 201,  472 => 200,  470 => 199,  465 => 196,  460 => 194,  457 => 193,  455 => 192,  452 => 191,  447 => 188,  438 => 184,  429 => 182,  425 => 181,  417 => 178,  414 => 177,  410 => 176,  399 => 167,  397 => 166,  394 => 165,  389 => 162,  380 => 159,  376 => 158,  372 => 157,  368 => 156,  365 => 155,  361 => 154,  348 => 143,  346 => 142,  343 => 141,  338 => 138,  332 => 137,  326 => 134,  322 => 133,  318 => 132,  314 => 131,  310 => 130,  307 => 129,  304 => 128,  300 => 127,  286 => 115,  284 => 114,  281 => 113,  276 => 110,  267 => 106,  258 => 103,  254 => 102,  251 => 101,  247 => 100,  241 => 97,  238 => 96,  234 => 95,  223 => 86,  221 => 85,  218 => 84,  213 => 81,  200 => 77,  196 => 76,  192 => 75,  189 => 74,  185 => 73,  172 => 62,  170 => 61,  167 => 60,  160 => 58,  157 => 57,  152 => 55,  144 => 52,  132 => 45,  130 => 44,  115 => 38,  109 => 36,  100 => 32,  86 => 29,  84 => 28,  76 => 24,  74 => 23,  72 => 22,  68 => 20,  62 => 18,  59 => 17,  50 => 13,  44 => 9,  42 => 8,  36 => 5,  26 => 2,  19 => 1,  721 => 49,  714 => 574,  711 => 573,  707 => 571,  702 => 569,  697 => 568,  680 => 554,  675 => 553,  669 => 551,  667 => 256,  511 => 396,  505 => 209,  499 => 392,  497 => 391,  396 => 293,  384 => 284,  204 => 78,  202 => 105,  147 => 53,  142 => 51,  140 => 49,  136 => 47,  133 => 46,  129 => 44,  125 => 42,  121 => 40,  118 => 39,  114 => 37,  111 => 36,  107 => 35,  105 => 33,  102 => 32,  89 => 30,  81 => 27,  77 => 25,  70 => 24,  64 => 23,  60 => 21,  58 => 20,  53 => 14,  47 => 17,  39 => 12,  33 => 9,  20 => 1,  163 => 34,  158 => 31,  155 => 56,  137 => 25,  123 => 24,  120 => 41,  103 => 33,  97 => 18,  91 => 30,  85 => 29,  83 => 13,  79 => 26,  61 => 10,  55 => 15,  52 => 6,  49 => 5,  31 => 5,  28 => 7,);
    }
}

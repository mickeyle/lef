<?php

/* NelmioApiDocBundle::layout.html.twig */
class __TwigTemplate_12c1cc75e09fd1d6ce331dc7dd5e271411a0346700a6ef497ec706480bb6d111 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">
<html>
    <head>
        <meta charset=\"utf-8\" />
        <!-- Always force latest IE rendering engine (even in intranet) and Chrome Frame -->
        <meta content=\"IE=edge,chrome=1\" http-equiv=\"X-UA-Compatible\" />
        <title>";
        // line 7
        echo twig_escape_filter($this->env, (isset($context["apiName"]) ? $context["apiName"] : $this->getContext($context, "apiName")), "html", null, true);
        echo "</title>
        <style type=\"text/css\">
            ";
        // line 9
        echo (isset($context["css"]) ? $context["css"] : $this->getContext($context, "css"));
        echo "
        </style>
        <script type=\"text/javascript\">
            ";
        // line 12
        echo (isset($context["js"]) ? $context["js"] : $this->getContext($context, "js"));
        echo "
        </script>
    </head>
    <body>
        <div id=\"header\">
            <a href=\"";
        // line 17
        echo $this->env->getExtension('routing')->getPath("nelmio_api_doc_index");
        echo "\"><h1>";
        echo twig_escape_filter($this->env, (isset($context["apiName"]) ? $context["apiName"] : $this->getContext($context, "apiName")), "html", null, true);
        echo "</h1></a>
            ";
        // line 18
        if ((isset($context["enableSandbox"]) ? $context["enableSandbox"] : $this->getContext($context, "enableSandbox"))) {
            // line 19
            echo "                <div id=\"sandbox_configuration\">
                    ";
            // line 20
            if ((twig_length_filter($this->env, (isset($context["bodyFormats"]) ? $context["bodyFormats"] : $this->getContext($context, "bodyFormats"))) > 0)) {
                // line 21
                echo "                    body format:
                    <select id=\"body_format\">
                        ";
                // line 23
                if (twig_in_filter("form", (isset($context["bodyFormats"]) ? $context["bodyFormats"] : $this->getContext($context, "bodyFormats")))) {
                    echo "<option value=\"form\"";
                    echo ((((isset($context["defaultBodyFormat"]) ? $context["defaultBodyFormat"] : $this->getContext($context, "defaultBodyFormat")) == "form")) ? (" selected") : (""));
                    echo ">Form Data</option>";
                }
                // line 24
                echo "                        ";
                if (twig_in_filter("json", (isset($context["bodyFormats"]) ? $context["bodyFormats"] : $this->getContext($context, "bodyFormats")))) {
                    echo "<option value=\"json\"";
                    echo ((((isset($context["defaultBodyFormat"]) ? $context["defaultBodyFormat"] : $this->getContext($context, "defaultBodyFormat")) == "json")) ? (" selected") : (""));
                    echo ">JSON</option>";
                }
                // line 25
                echo "                    </select>
                    ";
            }
            // line 27
            echo "                    request format:
                    <select id=\"request_format\">
                    ";
            // line 29
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["requestFormats"]) ? $context["requestFormats"] : $this->getContext($context, "requestFormats")));
            foreach ($context['_seq'] as $context["format"] => $context["header"]) {
                // line 30
                echo "                        <option value=\"";
                echo twig_escape_filter($this->env, (isset($context["header"]) ? $context["header"] : $this->getContext($context, "header")), "html", null, true);
                echo "\"";
                echo ((((isset($context["defaultRequestFormat"]) ? $context["defaultRequestFormat"] : $this->getContext($context, "defaultRequestFormat")) == (isset($context["format"]) ? $context["format"] : $this->getContext($context, "format")))) ? (" selected") : (""));
                echo ">";
                echo twig_escape_filter($this->env, (isset($context["format"]) ? $context["format"] : $this->getContext($context, "format")), "html", null, true);
                echo "</option>
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['format'], $context['header'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 32
            echo "                    </select>
                    ";
            // line 33
            if (((isset($context["authentication"]) ? $context["authentication"] : $this->getContext($context, "authentication")) && twig_in_filter($this->getAttribute((isset($context["authentication"]) ? $context["authentication"] : $this->getContext($context, "authentication")), "delivery"), array(0 => "query", 1 => "http_basic", 2 => "header")))) {
                // line 34
                echo "                        api key: <input type=\"text\" id=\"api_key\" value=\"\"/>
                    ";
            }
            // line 36
            echo "                    ";
            if (((isset($context["authentication"]) ? $context["authentication"] : $this->getContext($context, "authentication")) && twig_in_filter($this->getAttribute((isset($context["authentication"]) ? $context["authentication"] : $this->getContext($context, "authentication")), "delivery"), array(0 => "http_basic")))) {
                // line 37
                echo "                        api pass: <input type=\"text\" id=\"api_pass\" value=\"\"/>
                    ";
            }
            // line 39
            echo "                    ";
            if (((isset($context["authentication"]) ? $context["authentication"] : $this->getContext($context, "authentication")) && $this->getAttribute((isset($context["authentication"]) ? $context["authentication"] : $this->getContext($context, "authentication")), "custom_endpoint"))) {
                // line 40
                echo "                        api endpoint: <input type=\"text\" id=\"api_endpoint\" value=\"\"/>
                    ";
            }
            // line 42
            echo "                </div>
            ";
        }
        // line 44
        echo "            <br style=\"clear: both;\" />
        </div>
        ";
        // line 46
        $template = $this->env->resolveTemplate((isset($context["motdTemplate"]) ? $context["motdTemplate"] : $this->getContext($context, "motdTemplate")));
        $template->display($context);
        // line 47
        echo "        <div class=\"container\" id=\"resources_container\">
            <ul id=\"resources\">
                ";
        // line 49
        $this->displayBlock('content', $context, $blocks);
        // line 50
        echo "            </ul>
        </div>
        <p id=\"colophon\">
            Documentation auto-generated on ";
        // line 53
        echo twig_escape_filter($this->env, (isset($context["date"]) ? $context["date"] : $this->getContext($context, "date")), "html", null, true);
        echo "
        </p>
        <script type=\"text/javascript\">

            var getHash = function() {
              return window.location.hash || '';
            };

            var setHash = function(hash) {
                window.location.hash = hash;
            };

            var clearHash = function() {
                var scrollTop, scrollLeft;

                if(typeof history === 'object' && typeof history.pushState === 'function') {
                    history.replaceState('', document.title, window.location.pathname + window.location.search);
                } else {
                    scrollTop = document.body.scrollTop;
                    scrollLeft = document.body.scrollLeft;

                    setHash('');

                    document.body.scrollTop = scrollTop;
                    document.body.scrollLeft = scrollLeft;
                }
            };

            \$(window).load(function() {
                var id = getHash().substr(1).replace( /([:\\.\\[\\]\\{\\}])/g, \"\\\\\$1\");
                var elem = \$('#' + id);
                if (elem.length) {
                    setTimeout(function() {
                        \$('body,html').scrollTop(elem.position().top);
                    });
                    elem.find('.toggler').click();
                }
            });

            \$('.toggler').click(function(event) {
                var contentContainer = \$(this).next();

                if(contentContainer.is(':visible')) {
                    clearHash();
                } else {
                    setHash(\$(this).attr('href'));
                }

                contentContainer.slideToggle('fast');
                return false;
            });

            ";
        // line 105
        if ((isset($context["enableSandbox"]) ? $context["enableSandbox"] : $this->getContext($context, "enableSandbox"))) {
            // line 106
            echo "            var setParameterType = function (\$context,setType) {
                // no 2nd argument, use default from parameters
                if (typeof setType == \"undefined\") {
                    setType = \$context.parent().attr(\"data-dataType\");
                    \$context.val(setType);
                }

                \$context.parent().find('.value').remove();
                var placeholder = \"\";
                if (\$context.parent().attr(\"data-dataType\") != \"\" && typeof \$context.parent().attr(\"data-dataType\") != \"undefined\") {
                    placeholder += \"[\" + \$context.parent().attr(\"data-dataType\") + \"] \";
                }
                if (\$context.parent().attr(\"data-format\") != \"\" && typeof \$context.parent().attr(\"data-format\") != \"undefined\") {
                    placeholder += \$context.parent().attr(\"data-dataType\");
                }
                if (\$context.parent().attr(\"data-description\") != \"\" && typeof \$context.parent().attr(\"data-description\") != \"undefined\") {
                    placeholder += \$context.parent().attr(\"data-description\");
                } else {
                    placeholder += \"Value\";
                }

                switch(setType) {
                    case \"boolean\":
                        \$('<select class=\"value\"><option value=\"\"></option><option value=\"1\">True</option><option value=\"0\">False</option></select>').insertAfter(\$context);
                        break;
                    case \"file\":
                        \$('<input type=\"file\" class=\"value\" placeholder=\"'+ placeholder +'\">').insertAfter(\$context);
                        break;
                    default:
                        \$('<input type=\"text\" class=\"value\" placeholder=\"'+ placeholder +'\">').insertAfter(\$context);
                }
            };

                var toggleButtonText = function (\$btn) {
                    if (\$btn.text() === 'Default') {
                        \$btn.text('Raw');
                    } else {
                        \$btn.text('Default');
                    }
                };

                var renderRawBody = function (\$container) {
                    var rawData, \$btn;

                    rawData = \$container.data('raw-response');
                    \$btn = \$container.parents('.pane').find('.to-raw');

                    \$container.addClass('prettyprinted');
                    \$container.html(\$('<div/>').text(rawData).html());

                    \$btn.removeClass('to-raw');
                    \$btn.addClass('to-prettify');

                    toggleButtonText(\$btn);
                };

                var renderPrettifiedBody = function (\$container) {
                    var rawData, \$btn;

                    rawData = \$container.data('raw-response');
                    \$btn = \$container.parents('.pane').find('.to-prettify');

                    \$container.removeClass('prettyprinted');
                    \$container.html(prettifyResponse(rawData));
                    prettyPrint && prettyPrint();

                    \$btn.removeClass('to-prettify');
                    \$btn.addClass('to-raw');

                    toggleButtonText(\$btn);
                };

                var unflattenDict = function (body) {
                    var found = true;
                    while(found) {
                        found = false;

                        for (var key in body) {
                            var okey;
                            var value = body[key];
                            var dictMatch = key.match(/^(.+)\\[([^\\]]+)\\]\$/);

                            if(dictMatch) {
                                found = true;
                                okey = dictMatch[1];
                                var subkey = dictMatch[2];
                                body[okey] = body[okey] || {};
                                body[okey][subkey] = value;
                                delete body[key];
                            } else {
                                body[key] = value;
                            }
                        }
                    }
                    return body;
                }

                \$('.tabs li').click(function() {
                    var contentGroup = \$(this).parents('.content');

                    \$('.pane.selected', contentGroup).removeClass('selected');
                    \$('.pane.' + \$(this).data('pane'), contentGroup).addClass('selected');

                    \$('li', \$(this).parent()).removeClass('selected');
                    \$(this).addClass('selected');
                });

                var prettifyResponse = function(text) {
                    try {
                        var data = typeof text === 'string' ? JSON.parse(text) : text;
                        text = JSON.stringify(data, undefined, '  ');
                    } catch (err) {
                    }

                    // HTML encode the result
                    return \$('<div>').text(text).html();
                };

                var displayFinalUrl = function(xhr, method, url, container) {
                    container.text(method + ' ' + url);
                };

                var displayProfilerUrl = function(xhr, link, container) {
                    var profilerUrl = xhr.getResponseHeader('X-Debug-Token-Link');
                    if (profilerUrl) {
                        link.attr('href', profilerUrl);
                        container.show();
                    } else {
                        link.attr('href', '');
                        container.hide();
                    }
                }

                var displayResponseData = function(xhr, container) {
                    var data = xhr.responseText;

                    container.data('raw-response', data);

                    renderPrettifiedBody(container);

                    container.parents('.pane').find('.to-prettify').text('Raw');
                    container.parents('.pane').find('.to-raw').text('Raw');
                };

                var displayResponseHeaders = function(xhr, container) {
                    var text = xhr.status + ' ' + xhr.statusText + \"\\n\\n\";
                    text += xhr.getAllResponseHeaders();

                    container.text(text);
                };

                var displayResponse = function(xhr, method, url, result_container) {
                    displayFinalUrl(xhr, method, url, \$('.url', result_container));
                    displayProfilerUrl(xhr, \$('.profiler-link', result_container), \$('.profiler', result_container));
                    displayResponseData(xhr, \$('.response', result_container));
                    displayResponseHeaders(xhr, \$('.headers', result_container));

                    result_container.show();
                };

                \$('.pane.sandbox form').submit(function() {
                    var url = \$(this).attr('action'),
                        method = \$(this).attr('method'),
                        self = this,
                        params = {},
                        formData = new FormData(),
                        doubledParams = {},
                        headers = {},
                        content = \$(this).find('textarea.content').val(),
                        result_container = \$('.result', \$(this).parent());

                    if (method === 'ANY') {
                        method = 'POST';
                    } else if (method.indexOf('|') !== -1) {
                        method = method.split('|').sort().pop();
                    }

                    // set requestFormat
                    var requestFormatMethod = '";
            // line 284
            echo twig_escape_filter($this->env, (isset($context["requestFormatMethod"]) ? $context["requestFormatMethod"] : $this->getContext($context, "requestFormatMethod")), "html", null, true);
            echo "';
                    if (requestFormatMethod == 'format_param') {
                        params['_format'] = \$('#request_format option:selected').text();
                        formData.append('_format',\$('#request_format option:selected').text());
                    } else if (requestFormatMethod == 'accept_header') {
                        headers['Accept'] = \$('#request_format').val();
                    }

                    // set default bodyFormat
                    var bodyFormat = \$('#body_format').val() || '";
            // line 293
            echo twig_escape_filter($this->env, (isset($context["defaultBodyFormat"]) ? $context["defaultBodyFormat"] : $this->getContext($context, "defaultBodyFormat")), "html", null, true);
            echo "';

                    if(!('Content-type' in headers)) {
                        if (bodyFormat == 'form') {
                            headers['Content-type'] = 'application/x-www-form-urlencoded';
                        } else {
                            headers['Content-type'] = 'application/json';
                        }
                    }

                    var hasFileTypes = false;
                    \$('.parameters .tuple_type', \$(this)).each(function() {
                        if (\$(this).val() == 'file') {
                            hasFileTypes = true;
                        }
                    });

                    if (hasFileTypes && method != 'POST') {
                        alert(\"Sorry, you can only submit files via POST.\");
                        return false;
                    }

                    if (hasFileTypes) {
                        // retrieve all the parameters to send for file upload
                        \$('.parameters .tuple', \$(this)).each(function() {
                            var key, value;

                            key = \$('.key', \$(this)).val();
                            if (\$('.value', \$(this)).attr('type') === 'file' ) {
                                value = \$('.value', \$(this)).prop('files')[0];
                            } else {
                                value = \$('.value', \$(this)).val();
                            }

                            if (value) {
                                formData.append(key,value);
                            }
                        });
                    }


                    // retrieve all the parameters to send
                    \$('.parameters .tuple', \$(this)).each(function() {
                        var key, value;

                        key = \$('.key', \$(this)).val();
                        value = \$('.value', \$(this)).val();

                        if (value) {
                            // temporary save all additional/doubled parameters
                            if (key in params) {
                                doubledParams[key] = value;
                            } else {
                                params[key] = value;
                            }
                        }
                    });





                    // retrieve the additional headers to send
                    \$('.headers .tuple', \$(this)).each(function() {
                        var key, value;

                        key = \$('.key', \$(this)).val();
                        value = \$('.value', \$(this)).val();

                        if (value) {
                            headers[key] = value;
                        }

                    });

                    // fix parameters in URL
                    for (var key in \$.extend({}, params)) {
                        if (url.indexOf('{' + key + '}') !== -1) {
                            url = url.replace('{' + key + '}', params[key]);
                            delete params[key];
                        }
                    };

                    // merge additional params back to real params object
                    if (!\$.isEmptyObject(doubledParams)) {
                        \$.extend(params, doubledParams);
                    }

                    // disable all the fiels and buttons
                    \$('input, button', \$(this)).attr('disabled', 'disabled');

                    // append the query authentication
                    if (authentication_delivery == 'query') {
                        url += url.indexOf('?') > 0 ? '&' : '?';
                        url += api_key_parameter + '=' + \$('#api_key').val();
                    }

                    // prepare the api enpoint
                    ";
            // line 391
            if (((((isset($context["endpoint"]) ? $context["endpoint"] : $this->getContext($context, "endpoint")) == "") && (!(null === $this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request")))) && $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request"), "host"))) {
                // line 392
                echo "var endpoint = '";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request"), "getBaseUrl", array(), "method"), "html", null, true);
                echo "';
                    ";
            } else {
                // line 394
                echo "var endpoint = '";
                echo twig_escape_filter($this->env, (isset($context["endpoint"]) ? $context["endpoint"] : $this->getContext($context, "endpoint")), "html", null, true);
                echo "';
                    ";
            }
            // line 396
            echo "if (\$('#api_endpoint') && \$('#api_endpoint').val() != null) {
                        endpoint = \$('#api_endpoint').val();
                    }

                    // Workaround for Firefox bug and a thereby resulting nginx incompatibility
                    if (method == \"LINK\") {
                        method = \"POST\";
                        params._method = \"LINK\";
                    }

                    // prepare final parameters
                    var body = {};
                    if(bodyFormat == 'json' && method != 'GET') {
                        body = unflattenDict(params);
                        body = JSON.stringify(body);
                    } else {
                        body = params;
                    }
                    var data = content.length ? content : body;
                    var ajaxOptions = {
                        url: endpoint + url,
                        type: method,
                        data: data,
                        headers: headers,
                        crossDomain: true,
                        beforeSend: function (xhr) {
                            if (authentication_delivery == 'http_basic') {
                                xhr.setRequestHeader('Authorization', 'Basic ' + btoa(\$('#api_key').val() + ':' + \$('#api_pass').val()));
                            }else if(authentication_delivery == 'header') {
                                xhr.setRequestHeader(api_key_parameter, \$('#api_key').val());
                            }
                        },
                        complete: function(xhr) {
                            displayResponse(xhr, method, url, result_container);

                            // and enable them back
                            \$('input:not(.content-type), button', \$(self)).removeAttr('disabled');
                        }
                    };

                    // overrides body format to send data properly
                    if (hasFileTypes) {
                        ajaxOptions.data = formData;
                        ajaxOptions.processData = false;
                        ajaxOptions.contentType = false;
                        delete(ajaxOptions.headers);
                    }

                    // and trigger the API call
                    \$.ajax(ajaxOptions);

                    return false;
                });

                \$('.operations').on('click', '.operation > .heading', function(e) {
                    if (history.pushState) {
                        history.pushState(null, null, \$(this).data('href'));
                        e.preventDefault();
                    }
                });

                \$('.pane.sandbox').on('click', '.to-raw', function(e) {
                    renderRawBody(\$(this).parents('.pane').find('.response'));

                    e.preventDefault();
                });

                \$('.pane.sandbox').on('click', '.to-prettify', function(e) {
                    renderPrettifiedBody(\$(this).parents('.pane').find('.response'));

                    e.preventDefault();
                });

                \$('.pane.sandbox').on('click', '.to-expand, .to-shrink', function(e) {
                    var \$headers = \$(this).parents('.result').find('.headers');
                    var \$label = \$(this).parents('.result').find('a.to-expand');

                    if (\$headers.hasClass('to-expand')) {
                        \$headers.removeClass('to-expand');
                        \$headers.addClass('to-shrink');
                        \$label.text('Shrink');
                    } else {
                        \$headers.removeClass('to-shrink');
                        \$headers.addClass('to-expand');
                        \$label.text('Expand');
                    }

                    e.preventDefault();
                });


                // sets the correct parameter type on load
                \$('.pane.sandbox .tuple_type').each(function() {
                    setParameterType(\$(this));
                });


                // handles parameter type change
                \$('.pane.sandbox').on('change', '.tuple_type', function() {
                    setParameterType(\$(this),\$(this).val());
                });



                \$('.pane.sandbox').on('click', '.add_parameter', function() {
                    var html = \$(this).parents('.pane').find('.parameters_tuple_template').html();

                    \$(this).before(html);

                    return false;
                });

                \$('.pane.sandbox').on('click', '.add_header', function() {
                    var html = \$(this).parents('.pane').find('.headers_tuple_template').html();

                    \$(this).before(html);

                    return false;
                });

                \$('.pane.sandbox').on('click', '.remove', function() {
                    \$(this).parent().remove();
                });

                \$('.pane.sandbox').on('click', '.set-content-type', function(e) {
                    var html;
                    var \$element;
                    var \$headers = \$(this).parents('form').find('.headers');
                    var content_type = \$(this).prev('input.value').val();

                    e.preventDefault();

                    if (content_type.length === 0) {
                        return;
                    }

                    \$headers.find('input.key').each(function() {
                        if (\$.trim(\$(this).val().toLowerCase()) === 'content-type') {
                            \$element = \$(this).parents('p');
                            return false;
                        }
                    });

                    if (typeof \$element === 'undefined') {
                        html = \$(this).parents('.pane').find('.tuple_template').html();

                        \$element = \$headers.find('legend').after(html).next('p');
                    }

                    \$element.find('input.key').val('Content-Type');
                    \$element.find('input.value').val(content_type);

                });

                ";
            // line 550
            if (((isset($context["authentication"]) ? $context["authentication"] : $this->getContext($context, "authentication")) && ($this->getAttribute((isset($context["authentication"]) ? $context["authentication"] : $this->getContext($context, "authentication")), "delivery") == "http_basic"))) {
                // line 551
                echo "                var authentication_delivery = '";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["authentication"]) ? $context["authentication"] : $this->getContext($context, "authentication")), "delivery"), "html", null, true);
                echo "';
                ";
            } elseif (((isset($context["authentication"]) ? $context["authentication"] : $this->getContext($context, "authentication")) && ($this->getAttribute((isset($context["authentication"]) ? $context["authentication"] : $this->getContext($context, "authentication")), "delivery") == "query"))) {
                // line 553
                echo "                var authentication_delivery = '";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["authentication"]) ? $context["authentication"] : $this->getContext($context, "authentication")), "delivery"), "html", null, true);
                echo "';
                var api_key_parameter = '";
                // line 554
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["authentication"]) ? $context["authentication"] : $this->getContext($context, "authentication")), "name"), "html", null, true);
                echo "';
                var search = window.location.search;
                var api_key_start = search.indexOf(api_key_parameter) + api_key_parameter.length + 1;

                if (api_key_start > 0 ) {
                    var api_key_end = search.indexOf('&', api_key_start);

                    var api_key = -1 == api_key_end
                        ? search.substr(api_key_start)
                        : search.substring(api_key_start, api_key_end);

                    \$('#api_key').val(api_key);
                }
                ";
            } elseif (((isset($context["authentication"]) ? $context["authentication"] : $this->getContext($context, "authentication")) && ($this->getAttribute((isset($context["authentication"]) ? $context["authentication"] : $this->getContext($context, "authentication")), "delivery") == "header"))) {
                // line 568
                echo "                var authentication_delivery = '";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["authentication"]) ? $context["authentication"] : $this->getContext($context, "authentication")), "delivery"), "html", null, true);
                echo "';
                var api_key_parameter = '";
                // line 569
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["authentication"]) ? $context["authentication"] : $this->getContext($context, "authentication")), "name"), "html", null, true);
                echo "';
                ";
            } else {
                // line 571
                echo "                var authentication_delivery = false;
                ";
            }
            // line 573
            echo "            ";
        }
        // line 574
        echo "        </script>
    </body>
</html>
";
    }

    // line 49
    public function block_content($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "NelmioApiDocBundle::layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  721 => 49,  714 => 574,  711 => 573,  707 => 571,  702 => 569,  697 => 568,  680 => 554,  675 => 553,  669 => 551,  667 => 550,  511 => 396,  505 => 394,  499 => 392,  497 => 391,  396 => 293,  384 => 284,  204 => 106,  202 => 105,  147 => 53,  142 => 50,  140 => 49,  136 => 47,  133 => 46,  129 => 44,  125 => 42,  121 => 40,  118 => 39,  114 => 37,  111 => 36,  107 => 34,  105 => 33,  102 => 32,  89 => 30,  81 => 27,  77 => 25,  70 => 24,  64 => 23,  60 => 21,  58 => 20,  53 => 18,  47 => 17,  39 => 12,  33 => 9,  20 => 1,  163 => 34,  158 => 31,  155 => 30,  137 => 25,  123 => 24,  120 => 23,  103 => 22,  97 => 18,  91 => 16,  85 => 29,  83 => 13,  79 => 11,  61 => 10,  55 => 19,  52 => 6,  49 => 5,  31 => 4,  28 => 7,);
    }
}

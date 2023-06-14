@extends('layouts.master')

@section('bundle')

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <script async="" src="{{ asset('assets/js/app.js')}}" charset="UTF-8" crossorigin="*"></script>
        <script type="text/javascript" async="" src="{{ asset('assets/js/bat.js')}}"></script>
        <script type="text/javascript" async="" src="{{ asset('assets/js/analytics.js')}}"></script>
        <script type="text/javascript" async="" src="{{ asset('assets/js/js.js')}}"></script>
        <script type="text/javascript" async="" src="{{ asset('assets/js/analytics.js')}}"></script>
        <script async="" src="{{ asset('assets/js/default.js')}}" charset="UTF-8" crossorigin="*"></script>
        <script async="" src="{{ asset('assets/js/gtm.js')}}"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            window.dataLayer.push({ stVar1: 3 }, { stVar3: 1 });
        </script>
        <link rel="dns-prefetch" href="https://www.google-analytics.com/" />
        <link rel="dns-prefetch" href="https://www.googletagmanager.com/" />
        <link rel="dns-prefetch" href="https://bat.bing.com/" />
        <link rel="dns-prefetch" href="https://embed.tawk.to/" />
        <script>
            (function (w, d, s, l, i) {
                w[l] = w[l] || [];
                w[l].push({ "gtm.start": new Date().getTime(), event: "gtm.js" });
                var f = d.getElementsByTagName(s)[0],
                    j = d.createElement(s),
                    dl = l != "dataLayer" ? "&l=" + l : "";
                j.async = true;
                j.src = "https://www.googletagmanager.com/gtm.js?id=" + i + dl;
                f.parentNode.insertBefore(j, f);
            })(window, document, "script", "dataLayer", "GTM-NS2X6F");
        </script>
        <link rel="alternate" type="application/rss+xml" title="WebsitePolicies.com Feed" href="blog/feed" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Bundle and Save!</title>
        <meta name="description" content="Create privacy policy, terms and conditions, refund policy and more for your website all in one place. Protect yourself and help your users feel secure." />
        <script src="{{ asset('assets/js/1611587689.js')}}"></script>
        <meta property="og:image" content="uploads/p/h/7/g/1y9eg2ur9hegs3x1s2nd.png" />
        <meta property="og:type" content="article" />
        <meta property="og:title" content="Bundle and Save!" />
        <meta property="og:description" content="Create privacy policy, terms and conditions, refund policy and more for your website all in one place. Protect yourself and help your users feel secure." />
        <meta property="og:url" content="bundle" />
        <meta name="twitter:image" content="uploads/p/h/7/g/1y9eg2ur9hegs3x1s2nd.png" />
        <meta name="twitter:card" content="summary" />
        <meta name="twitter:title" content="Bundle and Save!" />
        <meta name="twitter:description" content="Create privacy policy, terms and conditions, refund policy and more for your website all in one place. Protect yourself and help your users feel secure." />
        <meta name="twitter:url" content="bundle" />
        <link href="{{ asset ('assets/css/new.css')}}" rel="stylesheet" type="text/css" />
        <script src="{{ asset('assets/js/tawk.js')}}"></script>
    </head>
    <body class="guest create policies_bundle index">
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NS2X6F" height="0" width="0" style="display: none; visibility: hidden;"></iframe></noscript>
      

        <div class="section sub-hero">
            <div class="container">
                <div class="row">
                    <div class="col-ms-12">
                        <h1>Complete legal compliance and protection</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="plugin-policies wizard bundle" id="policies-bundle">
            <div class="section shade1 payments text-center">
                <div class="container">
                    <div class="row">
                        <div class="col-ms-12">
                            <h3>Save <span style="color: #2bc166;">over 50%</span> by purchasing multiple premium policies at the same time</h3>
                        </div>
                    </div>
                </div>
            </div>

            <div class="section order" id="order">
                <div class="container">
                    <div class="row">
                        <div class="col-ms-12">
                            <div class="row">
                                <div class="col-ms-12 col-md-5 col-md-push-7 col-xl-4 col-xl-push-8">
                                    <h3>What you get</h3>
                                    <div class="row">
                                        <ul class="list-icons tick col-ms-12 col-sm-6 col-md-12">
                                            <li>Comprehensive clauses for extended protection</li>
                                            <li>Option to create your own custom clauses</li>
                                            <li>Policies suitable for commercial use</li>
                                            <li>Fill in the questionnaires at any time</li>
                                        </ul>
                                        <ul class="list-icons tick col-ms-12 col-sm-6 col-md-12">
                                            <li>Free lifetime updates and automatic notifications</li>
                                            <li>One time payment and instant download</li>
                                            <li>Lifetime access to all your policies</li>
                                            <li><a data-role="modal" data-src="#refund-modal" onclick="return false" href="bundle#">100% money back guarantee</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-ms-12 col-md-7 col-md-pull-5 col-xl-8 col-xl-pull-4 text-left">
                                    <h3>Order Now</h3>

                                    <form id="payment_form" action="bundle" method="post">
                                        <input type="hidden" name="csrf_token" value="a732294e16954ec95c32a88135b956ae" />
                                        <fieldset>
                                            <div class="control policies" id="control_edit_bundle_policy">
                                                <div class="field">
                                                    <div class="checkbox">
                                                        <div class="item">
                                                            <input class="checkbox" id="input_edit_bundle_policies_aup" type="checkbox" name="policies[]" value="aup" />
                                                            <label for="input_edit_bundle_policies_aup">
                                                                Premium acceptable use policy
                                                                <a
                                                                    class="question-help"
                                                                    data-role="modal"
                                                                    data-type="html"
                                                                    data-src="An acceptable use policy is a set of rules that define what may or may not be done with the assets and data within your website, network, or service. It&#39;s meant to protect you and your company against abuse and overuse of the resources."
                                                                    onclick="return false"
                                                                    href="bundle#"
                                                                >
                                                                    &nbsp;
                                                                </a>
                                                            </label>
                                                        </div>
                                                        <div class="item">
                                                            <input class="checkbox" id="input_edit_bundle_policies_cookie" type="checkbox" name="policies[]" value="cookie" />
                                                            <label for="input_edit_bundle_policies_cookie">
                                                                Premium cookie policy
                                                                <a
                                                                    class="question-help"
                                                                    data-role="modal"
                                                                    data-type="html"
                                                                    data-src="A cookie policy outlines the types of cookies and other tracking technologies used on your website, what they do, and how they are used. You are required by the EU law to have a cookie policy and notify visitors that your site uses them."
                                                                    onclick="return false"
                                                                    href="bundle#"
                                                                >
                                                                    &nbsp;
                                                                </a>
                                                            </label>
                                                        </div>
                                                        <div class="item">
                                                            <input class="checkbox" id="input_edit_bundle_policies_disclaimer" type="checkbox" name="policies[]" value="disclaimer" />
                                                            <label for="input_edit_bundle_policies_disclaimer">
                                                                Premium disclaimer
                                                                <a
                                                                    class="question-help"
                                                                    data-role="modal"
                                                                    data-type="html"
                                                                    data-src="A disclaimer is often described as a common method used by website owners in order to limit their liability on their website. The main purpose of a disclaimer is to make sure the information on your website will not be improperly relied upon."
                                                                    onclick="return false"
                                                                    href="bundle#"
                                                                >
                                                                    &nbsp;
                                                                </a>
                                                            </label>
                                                        </div>
                                                        <div class="item">
                                                            <input class="checkbox" id="input_edit_bundle_policies_dmca" type="checkbox" name="policies[]" value="dmca" />
                                                            <label for="input_edit_bundle_policies_dmca">
                                                                Premium DMCA policy
                                                                <a
                                                                    class="question-help"
                                                                    data-role="modal"
                                                                    data-type="html"
                                                                    data-src="A DMCA policy protects your business from copyright infringements and potentially expensive lawsuits. It addresses the rights and obligations of copyrighted material owners who believe their rights have been infringed."
                                                                    onclick="return false"
                                                                    href="bundle#"
                                                                >
                                                                    &nbsp;
                                                                </a>
                                                            </label>
                                                        </div>
                                                        <div class="item">
                                                            <input class="checkbox" id="input_edit_bundle_policies_privacy" type="checkbox" name="policies[]" value="privacy" />
                                                            <label for="input_edit_bundle_policies_privacy">
                                                                Premium privacy policy
                                                                <a
                                                                    class="question-help"
                                                                    data-role="modal"
                                                                    data-type="html"
                                                                    data-src="A privacy policy is a document that discloses some or all of the ways your website or product gathers, uses, discloses, and manages a customer or client&#39;s data. It fulfills a legal requirement to protect a customer or client&#39;s privacy."
                                                                    onclick="return false"
                                                                    href="bundle#"
                                                                >
                                                                    &nbsp;
                                                                </a>
                                                            </label>
                                                        </div>
                                                        <div class="item">
                                                            <input class="checkbox" id="input_edit_bundle_policies_refund" type="checkbox" name="policies[]" value="refund" />
                                                            <label for="input_edit_bundle_policies_refund">
                                                                Premium refund policy
                                                                <a
                                                                    class="question-help"
                                                                    data-role="modal"
                                                                    data-type="html"
                                                                    data-src="A good refund policy can help protect your company and win your customers&#39; trust. Refund policy outlines the requirements and steps your customers need to take in order to return or exchange purchased product and receive a refund."
                                                                    onclick="return false"
                                                                    href="bundle#"
                                                                >
                                                                    &nbsp;
                                                                </a>
                                                            </label>
                                                        </div>
                                                        <div class="item">
                                                            <input class="checkbox" id="input_edit_bundle_policies_tos" type="checkbox" name="policies[]" value="tos" />
                                                            <label for="input_edit_bundle_policies_tos">
                                                                Premium terms and conditions
                                                                <a
                                                                    class="question-help"
                                                                    data-role="modal"
                                                                    data-type="html"
                                                                    data-src="Terms and conditions (also known as terms of use and terms of service) are a set of guidelines and rules which one must agree to abide by in order to use your website or product. Terms and conditions are legally binding for both parties."
                                                                    onclick="return false"
                                                                    href="bundle#"
                                                                >
                                                                    &nbsp;
                                                                </a>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="control" id="control_edit_bundle_price">
                                                <label for="input_edit_bundle_price">
                                                    <b>Total cost</b>
                                                </label>

                                                <div class="field">
                                                    <span class="price">
                                                        <span class="amount"></span>
                                                        (<span class="discount"></span>one time payment, no recurring fees)
                                                        <span class="discount-extra"></span>
                                                    </span>
                                                    <span class="none">
                                                        * Select at least 2 policies above
                                                    </span>
                                                </div>
                                            </div>

                                            <div class="control hidden" id="control_edit_bundle_your_first_name_h">
                                                <label for="input_edit_bundle_your_first_name_h"> First name </label>

                                                <div class="field">
                                                    <input class="text input-md" id="input_edit_bundle_your_first_name_h" maxlength="255" type="text" name="your_first_name_h" value="" />
                                                </div>
                                            </div>

                                            <div class="control" id="control_edit_bundle_email">
                                                <label for="input_edit_bundle_email"> Your email address </label>

                                                <div class="field">
                                                    <input class="text email input-md" id="input_edit_bundle_email" maxlength="255" type="text" name="email" value="" />

                                                    <span class="help">You will receive login details to this email address to access your policies</span>
                                                </div>
                                            </div>

                                            <div class="control" id="control_edit_bundle_terms">
                                                <div class="field">
                                                    <div class="checkbox inline">
                                                        <input class="checkbox" id="input_edit_bundle_terms" type="checkbox" name="terms" value="1" />
                                                        <label for="input_edit_bundle_terms"> I have read and agree to the <a target="_blank" href="legal">terms of service</a>. </label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="control actions">
                                                <input class="button submit next" type="submit" name="submit" value="Proceed to payment" />
                                            </div>
                                        </fieldset>

                                        <input type="hidden" name="do_bundle" value="1" />
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="refund-modal" class="refund-modal" style="display: none;">
                <h3>100% Money Back Guarantee</h3>
                <p>
                    We're so convinced you'll absolutely love our easy to use service, that we're willing to offer you an unconditional and risk-free 7-day money back guarantee. If at any time within 7 days of making the purchase you are
                    unhappy, simply let us know and we'll refund your money.
                </p>
                <ul class="buttons">
                    <li><a onclick="$.fancybox.close(); return false;" class="button" href="bundle#">Close</a></li>
                </ul>
            </div>
        </div>

        <script>
            function loadBundle() {
                $(".plugin-policies.bundle div.policies input.checkbox").click(function (e) {
                    var $fullprices = { 
                    "1": "<?php $price = DB::table('price')->where('id', '1')->first(); echo $price->price; ?>",
                    "2": "<?php $price = DB::table('price')->where('id', '3')->first(); echo $price->price; ?>",
                    "3": "<?php $price = DB::table('price')->where('id', '4')->first(); echo $price->price; ?>",
                    "4": "<?php $price = DB::table('price')->where('id', '5')->first(); echo $price->price; ?>",
                    "5": "<?php $price = DB::table('price')->where('id', '6')->first(); echo $price->price; ?>",
                    "6": "<?php $price = DB::table('price')->where('id', '7')->first(); echo $price->price; ?>",
                    "7": "<?php $price = DB::table('price')->where('id', '8')->first(); echo $price->price; ?>" };

                    var $prices = { 
                    "1": "<?php $price = DB::table('price')->where('id', '1')->first(); echo $price->deal_price; ?>",
                    "2": "<?php $price = DB::table('price')->where('id', '3')->first(); echo $price->deal_price; ?>",
                    "3": "<?php $price = DB::table('price')->where('id', '4')->first(); echo $price->deal_price; ?>",
                    "4": "<?php $price = DB::table('price')->where('id', '5')->first(); echo $price->deal_price; ?>",
                    "5": "<?php $price = DB::table('price')->where('id', '6')->first(); echo $price->deal_price; ?>",
                    "6": "<?php $price = DB::table('price')->where('id', '7')->first(); echo $price->deal_price; ?>",
                    "7": "<?php $price = DB::table('price')->where('id', '8')->first(); echo $price->deal_price; ?>" };

                    var $discounts = { "1": "0", "2": "25", "3": "30", "4": "35", "5": "40", "6": "45", "7": "50" };

                    if ($(".plugin-policies.bundle div.policies input.checkbox:checked").length > 1) {
                        $("#control_edit_bundle_price div.field span.price span.amount").html(
                            '<strike style="color:#CD0004">$' +
                                $fullprices[$(".plugin-policies.bundle div.policies input.checkbox:checked").length] +
                                "</strike> <strong>$" +
                                $prices[$(".plugin-policies.bundle div.policies input.checkbox:checked").length] +
                                "</strong>"
                        );
                        $("#control_edit_bundle_price div.field span.price span.discount").html("over " + $discounts[$(".plugin-policies.bundle div.policies input.checkbox:checked").length] + "% off, ");
                        $("#control_edit_bundle_price div.field span.price").show();
                        $("#control_edit_bundle_price div.field span.none").hide();
                    } else if ($(".plugin-policies.bundle div.policies input.checkbox:checked").length == 1) {
                        $("#control_edit_bundle_price div.field span.price span.amount").html("$" + $prices[1]);
                        $("#control_edit_bundle_price div.field span.price span.discount").html("");
                        $("#control_edit_bundle_price div.field span.price").show();
                        $("#control_edit_bundle_price div.field span.none").hide();
                        $("#control_edit_bundle_price div.field span.discount-extra").html("");
                    } else {
                        $("#control_edit_bundle_price div.field span.none").show();
                        $("#control_edit_bundle_price div.field span.price").hide();
                    }

                    return true;
                });
            }
            $(function () {
                loadBundle();
            });
        </script>

    
        <script>
            var Tawk_API = Tawk_API || {};
            var Tawk_LoadStart = new Date();
            (function () {
                var s1 = document.createElement("script"),
                    s0 = document.getElementsByTagName("script")[0];
                s1.async = true;
                s1.src = "https://embed.tawk.to/5ca3de986bba46052800f023/default";
                s1.charset = "UTF-8";
                s1.setAttribute("crossorigin", "*");
                s0.parentNode.insertBefore(s1, s0);
            })();
        </script>

       
    </body>
</html>

@endsection
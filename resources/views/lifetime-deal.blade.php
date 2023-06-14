@extends('layouts.master')

@section('lifetime-deal')

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <script async="" src="{{ asset ('assets/js/app.js')}}" charset="UTF-8" crossorigin="*"></script>
        <script type="text/javascript" async="" src="{{ asset ('assets/js/bat.js')}}"></script>
        <script type="text/javascript" async="" src="{{ asset ('assets/js/analytics.js')}}"></script>
        <script id="ti-js" async="" src="{{ asset ('assets/js/a7296.js')}}"></script>
        <script async="" src="{{ asset ('assets/js/default.js')}}" charset="UTF-8" crossorigin="*"></script>
        <script async="" src="{{ asset ('assets/js/gtm.js')}}"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            window.dataLayer.push({ stVar3: 3 });
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
        <link rel="alternate" type="application/rss+xml" title="Feed" href="blog/feed" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Lifetime Deal for Agencies [Limited Time Offer]</title>
        <meta name="description" content="Take advantage of this special offer available only for a limited time. Protect yourself and help your users feel secure." />
        <script src="{{ asset ('assets/js/1615565436.js')}}"></script>
        <style>
            @media print {
                #ghostery-tracker-tally {
                    display: none !important;
                }
            }
        </style>
        <meta property="og:image" content="uploads/p/h/7/g/1y9eg2ur9hegs3x1s2nd.png" />
        <meta property="og:type" content="article" />
        <meta property="og:title" content="Lifetime Deal for Agencies [Limited Time Offer]" />
        <meta property="og:description" content="Take advantage of this special offer available only for a limited time. Protect yourself and help your users feel secure." />
        <meta property="og:url" content="promo/uzngpma2" />
        <meta name="twitter:image" content="uploads/p/h/7/g/1y9eg2ur9hegs3x1s2nd.png" />
        <meta name="twitter:card" content="summary" />
        <meta name="twitter:title" content="Lifetime Deal for Agencies [Limited Time Offer]" />
        <meta name="twitter:description" content="Take advantage of this special offer available only for a limited time. Protect yourself and help your users feel secure." />
        <meta name="twitter:url" content="promo/uzngpma2" />
        <meta name="robots" content="noindex,follow" />
        <script id="ti-js-init" async="" src="{{ asset ('assets/js/tc-app-v383.js')}}"></script>
        <link href="{{ asset ('assets/css/new.css')}}" rel="stylesheet" type="text/css" />
        <script src="{{ asset('assets/js/tawk.js')}}"></script>
    </head>
    <body class="guest promo policies_promo index">
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NS2X6F" height="0" width="0" style="display: none; visibility: hidden;"></iframe></noscript>
       

        <div class="section hero promo compact">
            <div class="container">
                <div class="row">
                    <div class="col-ms-12">
                        <div class="text text-center">
                            <h1 class="text-center"><span class="em">EXCLUSIVE LIFETIME DEAL FOR AGENCIES</span></h1>
                            <p class="text-center">Boost your profits in minutes and with no extra work by upselling your clients attorney-drafted legal policies.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="section checklist shade1">
            <div class="container">
                <div class="row">
                    <div class="col-ms-12 text-left">
                        <div class="row">
                            <div class="hidden-ms visible-md col-md-1 col-xl-2">&nbsp;</div>
                            <ul class="list-icons tick col-ms-12 col-md-6 col-xl-5">
                                <li>Create <strong>unlimited premium policies</strong> for yourself &amp; your clients</li>
                                <li>Comprehensive questionnaires the best for legal coverage</li>
                                <li>Policies are tailored specifically to your requirements</li>
                                <li>Option to create your own custom clauses</li>
                            </ul>
                            <ul class="list-icons tick col-ms-12 col-md-5 col-xl-5">
                                <li>One time payment, no recurring fees ever</li>
                                <li>Fill in the questionnaires at any time</li>
                                <li>Automatic notifications on updates</li>
                                <li>100% money back guarantee</li>
                            </ul>
                        </div>
                        <div id="refund-modal" class="refund-modal" style="display: none;">
                            <h3>100% Money Back Guarantee</h3>
                            <p>
                                We're so convinced you'll absolutely love our easy to use service, that we're willing to offer you an unconditional and risk-free 7-day money back guarantee. If at any time within 7 days of making the
                                purchase you are unhappy, simply let us know and we'll refund your money.
                            </p>
                            <ul class="buttons">
                                <li><a onclick="$.fancybox.close(); return false;" class="button" href="promo/uzngpma2#">Close</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php $price = DB::table('price')->where('id', 2)->first(); ?>
        <div class="section start text-center no-bottom-padding" id="order">
            <div class="container">
                <div class="row">
                    <div class="col-ms-12">
                        <h2 class="margin-bottom-large">
                            <span class="uppercase">Get it now for only <strike style="color: #cd0004;">$<?php echo $price->price; ?></strike> $<?php echo $price->deal_price; ?></span> / one time
                        </h2>

                        <form id="payment_form" action="payment" method="post">
                            @csrf
                            <input type="hidden" name="csrf_token" value="b4d03507ac1f85fd649dd3530d0f1a34" />
                            <fieldset>
                                <div class="control hidden" id="control_edit_promo_your_first_name_h">
                                    <label for="input_edit_promo_your_first_name_h">
                                        What is your first name?
                                    </label>

                                    <div class="field">
                                        <input class="text input-md" id="input_edit_promo_your_first_name_h" maxlength="255" type="text" name="your_first_name_h" value="" />
                                    </div>
                                </div>

                                <div class="control" id="control_edit_promo_email">
                                    <label for="input_edit_promo_email">
                                        What is your email address?
                                    </label>

                                    <div class="field">
                                        <input class="text email input-md" id="input_edit_promo_email" maxlength="255" type="text" name="email" value="" />

                                        <span class="help">We will send instructions to this email address on how to access and create your policies</span>
                                    </div>
                                </div>

                                <div class="control actions">
                                    <input class="button submit cta" style="float: none;" type="submit" name="submit" value="Yes, I want this deal" />
                                </div>
                            </fieldset>

                            <input type="hidden" name="do_promo" value="1" />
                        </form>

                        <p><b>Warning:</b> This deal will close soon and without notice. Secure it now before it's gone.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="section testimonials text-center">
            <div class="container">
                <h2 class="text-center margin-bottom-large">What our clients say</h2>
                <div class="row">
    <div class="col-md-1"></div>
                    <div class="col-md-5">
                        <p><img class="fluid wide lazyload loaded" width="682" height="98" src="{{ asset ('assets/images/t01.png')}}" style="max-width: 682px;" alt=""></p>
                        <p><img class="fluid wide lazyload loaded" width="682" height="122" src="{{ asset ('assets/images/t05.png')}}" style="max-width: 682px;" alt=""></p>
                        <p>
                            <img class="fluid wide lazyload" width="682" height="98" data-src="{{ asset ('assets/images/t03.png')}}" src="{{ asset ('assets/images/t03.png')}}" style="max-width: 682px;" alt="">
                        </p>
                        <p>
                            <img class="fluid wide lazyload" width="682" height="122" data-src="{{ asset ('assets/images/t07.png')}}" src="{{ asset ('assets/images/t07.png')}}" style="max-width: 682px;" alt="">
                        </p>
                    </div>
                    <div class="col-md-5">
                        <p><img class="fluid wide lazyload loaded" width="682" height="121" src="{{ asset ('assets/images/t06.png')}}" style="max-width: 682px;" alt=""></p>
                        <p><img class="fluid wide lazyload loaded" width="682" height="97" src="{{ asset ('assets/images/t04.png')}}" style="max-width: 682px;" alt=""></p>
                        <p>
                            <img class="fluid wide lazyload" width="682" height="122" data-src="{{ asset ('assets/images/t08.png')}}" src="{{ asset ('assets/images/t08.png')}}" style="max-width: 682px;" alt="">
                        </p>
                        <p>
                            <img class="fluid wide lazyload" width="682" height="98" data-src="{{ asset ('assets/images/t02.png')}}" src="{{ asset ('assets/images/t02.png')}}" style="max-width: 682px;" alt="">
                        </p>
                    </div>
    <div class="col-md-1"></div>
                </div>
            </div>
        </div>
        <div class="section faq shade1">
            <div class="container">
                <h2 class="text-center margin-bottom-large">Frequently asked questions</h2>
                <div class="row">
                    <div class="col-ms-12 col-md-6">
                        <h5>Is it really one a one time fee?</h5>
                        <p>Yes, we are offering lifetime unlimited premium policies for a one time fee. This is a limited time offer and will close without any notice so get it before it's too late.</p>
                    </div>
                    <div class="col-ms-12 col-md-6">
                        <h5>Will I get free lifetime updates?</h5>
                        <p>Yes, you will continue to receive free updates to your policies when laws and regulations change so you could focus on your business and not the legal stuff.</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-ms-12 col-md-6">
                        <h5>Can I create policies for my clients?</h5>
                        <p>Yes, you may create as many policies as you like for yourself and for your clients. It's a perfect solution for agencies, bloggers, web developers and entrepreneurs.</p>
                    </div>
                    <div class="col-ms-12 col-md-6">
                        <h5>Have more questions?</h5>
                        <p><a href="contact">Get in touch</a> with us and we'll be happy to assist you.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="section start text-center hidden-md">
            <div class="container">
                <div class="row">
                    <div class="col-ms-12">
                        <h2>Secure this deal now before it's gone</h2>
                        <p>This deal will close soon any without notice. We will not be offering it again.</p>
                        <a class="button cta" onclick="scrollToElement(&#39;#order&#39;);$(&#39;#input_edit_promo_email&#39;).focus();return false;" href="promo/uzngpma2#order">Get started</a>
                    </div>
                </div>
            </div>
        </div>

       
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
        <script type="text/javascript">
            var _tip = _tip || [];
            (function (d, s, id) {
                var js,
                    tjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) {
                    return;
                }
                js = d.createElement(s);
                js.id = id;
                js.async = true;
                js.src = d.location.protocol + "//app.truconversion.com/ti-js/13976/a7296.js";
                tjs.parentNode.insertBefore(js, tjs);
            })(document, "script", "ti-js");
        </script>

        
    </body>
</html>
@endsection
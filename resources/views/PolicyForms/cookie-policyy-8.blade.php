@extends('layouts.master')

@section('cookie-policyy-8')

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <script async="" src="{{asset ('assets/js/app.js')}}" charset="UTF-8" crossorigin="*"></script>
         <script async="" src="{{asset ('assets/js/default.js')}}"  charset="UTF-8" crossorigin="*"></script>
         <script async="" src="{{asset ('assets/js/gtm.js')}}"></script>
           
        <script>
            window.dataLayer = window.dataLayer || [];
            window.dataLayer.push({ stVar3: 3 }, { event: "policiesWizard", eventCategory: "cookie policy wizard", eventAction: "next step", eventLabel: "step 07 - contacts" });
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
        <title>Create Cookie Policy [Changes and updates]</title>
        <meta name="description" content="Create a cookie policy tailored specifically for your website and business in minutes with our easy to use wizard to comply with GDPR and EU cookie law." />
        <link href="./Create Cookie Policy [Changes and updates]8_files/1611587689" rel="stylesheet" type="text/css" />
         <script src="{{asset ('assets/js/1611587689.js')}}"></script>
        <script src="{{asset ('assets/js/cookie.min.js')}}"></script>
        <style>
            @media print {
                #ghostery-tracker-tally {
                    display: none !important;
                }
            }
        </style>
        <meta property="og:image" content="uploads/p/h/7/g/1y9eg2ur9hegs3x1s2nd.png" />
        <meta name="twitter:image" content="uploads/p/h/7/g/1y9eg2ur9hegs3x1s2nd.png" />
        <link href="{{ asset ('assets/css/new.css')}}" rel="stylesheet" type="text/css" />
        <script src="{{ asset('assets/js/tawk.js')}}"></script>
        
    </head>
    <body class="guest create policies_wizard_cookie index">
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NS2X6F" height="0" width="0" style="display: none; visibility: hidden;"></iframe></noscript>
        <div class="section sub-hero">
            <div class="container">
                <div class="row">
                    <div class="col-ms-12">
                        <h1>Changes and updates</h1>
                    </div>
                </div>
            </div>
        </div>

        <div id="container">
            <div class="container">
                <div class="row">
                    <div id="content" class="col-ms-12">
                        <div class="plugin-policies wizard cookies step8 step_updates">
                            <div class="row">
                                <div class="col-ms-12">
                                    <div class="progress green stripes">
                                        <div class="bar" style="width: 87.5%;">
                                            <div class="position">87%</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <form action="{{url('/cookie-policyy-9')}}" method="post">
                                @csrf
                                <input type="hidden" name="csrf_token" value="2d386224a2f0a048d9ac443ea79dd00f" />
                                <fieldset>
                                    <div class="control" id="control_edit_wizard_notify">
                                        <label for="input_edit_wizard_notify"> How will you notify users of this policy updates? </label>

                                        <div class="field">
                                            <div class="radio">
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_notify_page" type="radio" name="notify" value="page" />
                                                    <label for="input_edit_wizard_notify_page"> Update the modification date at the bottom of the cookie policy page. </label>
                                                </div>
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_notify_site" type="radio" name="notify" value="site" /> <label for="input_edit_wizard_notify_site"> Post a notification on the website. </label>
                                                </div>
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_notify_email" type="radio" name="notify" value="email" /> <label for="input_edit_wizard_notify_email"> Notify users via email. </label>
                                                </div>
                                            </div>
                                        </div>
                                         @error('notify')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="control actions">
                                        <input class="button submit next" type="submit" name="submit" value="Next" /> <a class="back" href="cookie-policyy-7">Back</a>
                                    </div>
                                </fieldset>

                                <input type="hidden" name="do_wizard" value="1" />
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            var policyWizardStep = 8,
                policyWizardStepKey = "updates",
                policyPremium = 0,
                policyPremiumPaid = 0,
                policyWizardPlatforms = ["website"];
            var policyWizardMobile = 0;
        </script>
</body>
</html>

@endsection
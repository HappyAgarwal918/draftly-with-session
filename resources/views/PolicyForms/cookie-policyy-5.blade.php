@extends('layouts.master')

@section('cookie-policyy-5')

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <script async="" src="{{asset ('assets/js/app.js')}}" charset="UTF-8" crossorigin="*"></script>
        <script async="" src="{{asset ('assets/js/default.js')}}" charset="UTF-8" crossorigin="*"></script>
        <script async="" src="{{asset ('assets/js/gtm.js')}}"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            window.dataLayer.push({ stVar3: 4 }, { event: "policiesWizard", eventCategory: "cookie policy wizard", eventAction: "next step", eventLabel: "step 04 - types" });
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
        <title>Create Cookie Policy [Limitations and restrictions]</title>
        <meta name="description" content="Create a cookie policy tailored specifically for your website and business in minutes with our easy to use wizard to comply with GDPR and EU cookie law." />
        <script src="{{asset ('assets/js/1611587689.js')}}"></script>
        <style>
            @media print {
                #ghostery-tracker-tally {
                    display: none !important;
                }
            }
        </style>
        <script src="{{asset ('assets/js/cookie.min.js')}}"></script>
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
                        <h1>Limitations and restrictions</h1>
                    </div>
                </div>
            </div>
        </div>

        <div id="container">
            <div class="container">
                <div class="row">
                    <div id="content" class="col-ms-12">
                        <div class="plugin-policies wizard cookies step5 step_limits">
                            <div class="row">
                                <div class="col-ms-12">
                                    <div class="progress green stripes">
                                        <div class="bar" style="width: 50%;">
                                            <div class="position">50%</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <form action="{{url('/cookie-policyy-6')}}" method="post">
                            	  @csrf
                                <input type="hidden" name="csrf_token" value="32c534653f1b213bcc0adac9b5762c48" />
                                <fieldset>
                                    <div class="control" id="control_edit_wizard_cookies_disable">
                                        <label for="input_edit_wizard_advise"> Can users disable cookies and still use your website without any restrictions? </label>

                                        <div class="field">
                                            <div class="radio">
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_cookies_disable_1" type="radio" name="cookies_disable" value="1" />
                                                    <label for="input_edit_wizard_cookies_disable_1"> Yes, my website will work fine even if cookies are disabled. </label>
                                                </div>
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_cookies_disable_0" type="radio" name="cookies_disable" value="0" />
                                                    <label for="input_edit_wizard_cookies_disable_0"> No, certain features and functionality may not be available without cookies. </label>
                                                </div>
                                            </div>
                                        </div>
                                         @error('cookies_disable')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="control actions">
                                        <input class="button submit next" type="submit" name="submit" value="Next" /> <a class="back" href="cookie-policyy-4">Back</a>
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
            var policyWizardStep = 5,
                policyWizardStepKey = "limits",
                policyPremium = 1,
                policyPremiumPaid = 0,
                policyWizardPlatforms = ["website"];
            var policyWizardMobile = 0;
        </script>
    </body>
</html>

@endsection
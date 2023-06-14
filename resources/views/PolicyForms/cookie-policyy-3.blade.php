@extends('layouts.master')

@section('cookie-policyy-3')


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <script async="" src="{{asset ('assets/js/app.js')}}" charset="UTF-8" crossorigin="*"></script>
        <script async="" src="{{asset ('assets/js/default.js')}}" charset="UTF-8" crossorigin="*"></script>
        <script async="" src="{{asset ('assets/js/gtm.js')}}"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            window.dataLayer.push({ stVar3: 3 }, { event: "policiesWizard", eventCategory: "cookie policy wizard", eventAction: "next step", eventLabel: "step 02 - operator" });
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
        <title>Create Cookie Policy [Privacy policy]</title>
        <meta name="description" content="Create a cookie policy tailored specifically for your website and business in minutes with our easy to use wizard to comply with GDPR and EU cookie law." />
        <script src="{{asset ('assets/js/1611587689.js')}}"></script>
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
                        <h1>Privacy policy</h1>
                    </div>
                </div>
            </div>
        </div>

        <div id="container">
            <div class="container">
                <div class="row">
                    <div id="content" class="col-ms-12">
                        <div class="plugin-policies wizard cookies step3 step_privacy">
                            <div class="row">
                                <div class="col-ms-12">
                                    <div class="progress green stripes">
                                        <div class="bar" style="width: 25%;">
                                            <div class="position">25%</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <form action="{{url('/cookie-policyy-4')}}" method="post">
                            	@csrf
                                <input type="hidden" name="csrf_token" value="b269a9348ffea42c06b7ecd4023a3b9d" />
                                <fieldset>
                                    <div class="control" id="control_edit_wizard_privacy_policy">
                                        <label for="input_edit_wizard_privacy_policy"> Do you have a privacy policy on your website? </label>

                                        <div class="field">
                                            <div class="radio">
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_privacy_policy_1" type="radio" name="privacy_policy" value="1" />
                                                    <label for="input_edit_wizard_privacy_policy_1"> Yes, I already have a valid privacy policy on my website. </label>
                                                </div>
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_privacy_policy_0" type="radio" name="privacy_policy" value="0" />
                                                    <label for="input_edit_wizard_privacy_policy_0"> No, I don't have a privacy policy yet. </label>
                                                </div>
                                            </div>
                                        </div>
                                        @error('privacy_policy')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="control hidden" id="control_edit_wizard_privacy_policy_url">
                                        <label for="input_edit_wizard_privacy_policy_url"> What is the location of your privacy policy? </label>

                                        <div class="field">
                                            <input class="text col-ms-12 col-md-6" id="input_edit_wizard_privacy_policy_url" maxlength="128" type="text" name="privacy_policy_url" value="" />

                                            <span class="help">e.g. https://www.website.com/privacy/</span>
                                        </div>
                                    </div>

                                    <div class="control hidden" id="control_edit_wizard_privacy_policy_note">
                                        <div class="alert warning">
                                            Don't have a privacy policy? <a target="_blank" href="privacy-policy-generator">Create one now</a> to ensure compliance with the privacy laws.
                                        </div>
                                    </div>

                                    <div class="control actions">
                                        <input class="button submit next" type="submit" name="submit" value="Next" /> <a class="cookie-policyy-2" href="cookie-policyy-2">Back</a>
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
            var policyWizardStep = 3,
                policyWizardStepKey = "privacy",
                policyPremium = 0,
                policyPremiumPaid = 0,
                policyWizardPlatforms = ["website"];
            var policyWizardMobile = 0;
        </script>
        <div style="width: 0px; height: 0px; display: none; visibility: hidden;" id="batBeacon7791732669">
            <img style="width: 0px; height: 0px; display: none; visibility: hidden;" id="batBeacon937820638484" width="0" height="0" alt="" src="./Create Cookie Policy [Privacy policy]3_files/0" />
        </div>
        <div id="tooltip-container"><span class="tooltip-text"></span><span class="arrow"></span></div>
    </body>
</html>


@endsection
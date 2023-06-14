@extends('layouts.master')

@section('privacy-policy-4')

<!DOCTYPE html>
<html lang="en">
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <script async="" src="{{ asset ('assets/js/app.js')}}" charset="UTF-8" crossorigin="*"></script>
    <script async="" src="{{ asset ('assets/js/default.js')}}" charset="UTF-8" crossorigin="*"></script>
    <script async="" src="{{ asset ('assets/js/gtm.js')}}"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        window.dataLayer.push({ stVar3: 3 }, { event: "policiesWizard", eventCategory: "privacy policy wizard", eventAction: "next step", eventLabel: "step 03 - users" });
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
    <link rel="alternate" type="application/rss+xml" title="Feed" href="feed" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Create Privacy Policy [User interaction]</title>
    <meta name="description" content="Create professional privacy policy tailored specifically for your website and business in minutes with our easy to use online wizard." />
    <script src="{{ asset ('assets/js/1611587689.js')}}"></script>
    <style>
        @media print {
            #ghostery-tracker-tally {
                display: none !important;
            }
        }
    </style>
    <script src="{{ asset ('assets/js/privacy.min.js')}}"></script>
    <meta property="og:image" content="uploads/p/h/7/g/1y9eg2ur9hegs3x1s2nd.png" />
    <meta name="twitter:image" content="uploads/p/h/7/g/1y9eg2ur9hegs3x1s2nd.png" />
    <link href="{{ asset ('assets/css/new.css')}}" rel="stylesheet" type="text/css" />
    <script src="{{ asset('assets/js/tawk.js')}}"></script>
    </head>
    <body class="guest create policies_wizard_privacy index">
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NS2X6F" height="0" width="0" style="display: none; visibility: hidden;"></iframe></noscript>
        <div class="section sub-hero">
            <div class="container">
                <div class="row">
                    <div class="col-ms-12">
                        <h1>User interaction</h1>
                    </div>
                </div>
            </div>
        </div>

        <div id="container">
            <div class="container">
                <div class="row">
                    <div id="content" class="col-ms-12">
                        <div class="plugin-policies wizard privacy step4 step_interaction">
                            <div class="row">
                                <div class="col-ms-12">
                                    <div class="progress green stripes">
                                        <div class="bar" style="width: 23.076923076923%;">
                                            <div class="position">23%</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <form action="{{url('/privacy-policy-5')}}" method="post">
                                @csrf
                                <input type="hidden" name="csrf_token" value="2d386224a2f0a048d9ac443ea79dd00f" />
                                <fieldset>
                                    <div class="control" id="control_edit_wizard_interact">
                                        <label for="input_edit_wizard_interact"> Can users interact with each other in your mobile app? </label>

                                        <div class="field">
                                            <div class="radio">
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_interact_1" type="radio" name="interact" value="1" />
                                                    <label for="input_edit_wizard_interact_1"> Yes, users can interact with each other (via comments, messages, etc). </label>
                                                </div>
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_interact_0" type="radio" name="interact" value="0" />
                                                    <label for="input_edit_wizard_interact_0"> No, users cannot interact with each other. </label>
                                                </div>
                                            </div>
                                        </div>
                                        @error('interact')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="control hidden" id="control_edit_wizard_info_visible">
                                        <label for="input_edit_wizard_info_visible"> When users interact, can they see other users' personally identifiable information (names, nicknames, photographs, etc)? </label>

                                        <div class="field">
                                            <div class="radio">
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_info_visible_1" type="radio" name="info_visible" value="1" />
                                                    <label for="input_edit_wizard_info_visible_1"> Yes, personally identifiable information may be displayed. </label>
                                                </div>
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_info_visible_0" type="radio" name="info_visible" value="0" />
                                                    <label for="input_edit_wizard_info_visible_0"> No, users remain completely anonymous. </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="control actions">
                                        <input class="button submit next" type="submit" name="submit" value="Next" /> <a class="back" href="privacy-policy-3">Back</a>
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
            var policyWizardStep = 4,
                policyWizardStepKey = "interaction",
                policyPremium = 0,
                policyPremiumPaid = 0,
                policyWizardPlatforms = ["mobile"];
            var policyWizardMobile = 1;
        </script> 
    </body>
</html>


@endsection
@extends('layouts.master')

@section('terms-and-conditions-4')

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <script async="" src="{{ asset ('assets/js/app.js')}}" charset="UTF-8" crossorigin="*"></script>
        <script async="" src="{{ asset ('assets/js/default.js')}}" charset="UTF-8" crossorigin="*"></script>
        <script async="" src="{{ asset ('assets/js/gtm.js')}}"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            window.dataLayer.push({ stVar3: 1 }, { event: "policiesWizard", eventCategory: "terms and conditions wizard", eventAction: "next step", eventLabel: "step 03 - users" });
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
        <title>Create Terms and Conditions [Target audience]</title>
        <meta name="description" content="Create professional terms and conditions agreement tailored specifically for your website and business in minutes with our easy to use online wizard." />
        <script src="{{ asset ('assets/js/1611587689.js')}}"></script>
        <style>
            @media print {
                #ghostery-tracker-tally {
                    display: none !important;
                }
            }
        </style>
        <script src="{{ asset ('assets/js/tos.min.js')}}"></script>
        <meta property="og:image" content="uploads/p/h/7/g/1y9eg2ur9hegs3x1s2nd.png" />
        <meta name="twitter:image" content="uploads/p/h/7/g/1y9eg2ur9hegs3x1s2nd.png" />
        <link href="{{ asset ('assets/css/new.css')}}" rel="stylesheet" type="text/css" />
        <script src="{{ asset('assets/js/tawk.js')}}"></script>
    </head>
    
    <body class="guest create policies_wizard_tos index">
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NS2X6F" height="0" width="0" style="display: none; visibility: hidden;"></iframe></noscript>
        <div class="section sub-hero">
            <div class="container">
                <div class="row">
                    <div class="col-ms-12">
                        <h1>Target audience</h1>
                    </div>
                </div>
            </div>
        </div>

        <div id="container">
            <div class="container">
                <div class="row">
                    <div id="content" class="col-ms-12">
                        <div class="plugin-policies wizard tos step4 step_audience">
                            <div class="row">
                                <div class="col-ms-12">
                                    <div class="progress green stripes">
                                        <div class="bar" style="width: 30%;">
                                            <div class="position">30%</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <form action="{{url('/terms-and-conditions-5')}}" method="post">
                                @csrf
                                <input type="hidden" name="csrf_token" value="c25077aa4a946cd8673eb455e99992cc" />
                                <fieldset>
                                    <div class="control" id="control_edit_wizard_age">
                                        <label for="input_edit_wizard_age"> Do you have an age requirement for your users? </label>

                                        <div class="field">
                                            <div class="radio">
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_age_age_18" type="radio" name="age" value="age_18" />
                                                    <label for="input_edit_wizard_age_age_18"> Yes, users and visitors must be at least 18 years old. </label>
                                                </div>
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_age_age_16" type="radio" name="age" value="age_16" />
                                                    <label for="input_edit_wizard_age_age_16"> Yes, users and visitors must be at least 16 years old. </label>
                                                </div>
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_age_age_13" type="radio" name="age" value="age_13" />
                                                    <label for="input_edit_wizard_age_age_13"> Yes, users and visitors must be at least 13 years old. </label>
                                                </div>
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_age_age_0" type="radio" name="age" value="age_0" /> <label for="input_edit_wizard_age_age_0"> No, there's no age requirement. </label>
                                                </div>
                                            </div>
                                        </div>
                                        @error('age')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="control" id="control_edit_wizard_adult_content">
                                        <label for="input_edit_wizard_adult_content"> Do you have or allow content meant only for adult audience on your website? </label>

                                        <div class="field">
                                            <div class="radio">
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_adult_content_1" type="radio" name="adult" value="1" />
                                                    <label for="input_edit_wizard_adult_content_1"> Yes, adult content may be present. </label>
                                                </div>
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_adult_content_0" type="radio" name="adult" value="0" />
                                                    <label for="input_edit_wizard_adult_content_0"> No, adult content is not allowed. </label>
                                                </div>
                                            </div>
                                        </div>
                                        @error('adult')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="control hidden" id="control_edit_wizard_adult_content_warn">
                                        <label for="input_edit_wizard_adult_content_warn"> Do you warn users about adult content? </label>

                                        <div class="field">
                                            <div class="radio">
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_adult_content_warn_1" type="radio" name="adult_content_warn" value="1" />
                                                    <label for="input_edit_wizard_adult_content_warn_1"> Yes, a warning is shown before any adult content is displayed. </label>
                                                </div>
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_adult_content_warn_0" type="radio" name="adult_content_warn" value="0" />
                                                    <label for="input_edit_wizard_adult_content_warn_0"> No, adult content can be displayed without warning. </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="control actions">
                                        <input class="button submit next" type="submit" name="submit" value="Next" /> <a class="back" href="terms-and-conditions-3">Back</a>
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
                policyWizardStepKey = "audience",
                policyPremium = 0,
                policyPremiumPaid = 0,
                policyWizardPlatforms = ["website"];
            var policyWizardMobile = 0;
        </script>
    </body>
</html>

@endsection
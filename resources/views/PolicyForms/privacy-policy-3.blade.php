@extends('layouts.master')

@section('privacy-policy-3')

<!DOCTYPE html>
<html lang="en">
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <script async="" src="{{ asset ('assets/js/app.js')}}" charset="UTF-8" crossorigin="*"></script>
    <script async="" src="{{ asset ('assets/js/default.js')}}" charset="UTF-8" crossorigin="*"></script>
    <script async="" src="{{ asset ('assets/js/gtm.js')}}"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        window.dataLayer.push({ stVar3: 3 }, { event: "policiesWizard", eventCategory: "privacy policy wizard", eventAction: "next step", eventLabel: "step 02 - operator" });
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
    <link rel="alternate" type="application/rss+xml" title="WebsitePolicies.com Feed" href="feed" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Create Privacy Policy [User accounts]</title>
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
                        <h1>User accounts</h1>
                    </div>
                </div>
            </div>
        </div>

        <div id="container">
            <div class="container">
                <div class="row">
                    <div id="content" class="col-ms-12">
                        <div class="plugin-policies wizard privacy step3 step_users">
                            <div class="row">
                                <div class="col-ms-12">
                                    <div class="progress green stripes">
                                        <div class="bar" style="width: 15.384615384615%;">
                                            <div class="position">15%</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <form action="{{url('/privacy-policy-4')}}" method="post">
                                @csrf
                                <input type="hidden" name="csrf_token" value="2d386224a2f0a048d9ac443ea79dd00f" />
                                <fieldset>
                                    <div class="control" id="control_edit_wizard_register">
                                        <label for="input_edit_wizard_register"> Can users sign up and create an account in your mobile app? </label>

                                        <div class="field">
                                            <div class="radio">
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_register_1" type="radio" name="register" value="1" /> <label for="input_edit_wizard_register_1"> Yes, users can sign up for an account. </label>
                                                </div>
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_register_0" type="radio" name="register" value="0" />
                                                    <label for="input_edit_wizard_register_0"> No, users can't sign up or create an account. </label>
                                                </div>
                                            </div>
                                        </div>
                                        @error('register')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="control hidden" id="control_edit_wizard_register_social">
                                        <label for="input_edit_wizard_register_social"> Can users sign up using social media or other third party accounts (Facebook, Google, Twitter, etc)? </label>

                                        <div class="field">
                                            <div class="radio">
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_register_social_1" type="radio" name="register_social" value="1" />
                                                    <label for="input_edit_wizard_register_social_1">
                                                        Yes, users can sign up using third party accounts.
                                                        <a
                                                            class="premium-help gtm-cta"
                                                            data-event-label="premium question"
                                                            data-role="modal"
                                                            data-src="#premium-modal"
                                                            onclick="return false"
                                                            href="privacy-policy-4#"
                                                        >
                                                            Premium
                                                        </a>
                                                    </label>
                                                </div>
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_register_social_0" type="radio" name="register_social" value="0" />
                                                    <label for="input_edit_wizard_register_social_0"> No, users can't sign up using third party accounts. </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="control hidden" id="control_edit_wizard_info_access">
                                        <label for="input_edit_wizard_info_access"> Can users view and change their personal information? </label>

                                        <div class="field">
                                            <div class="radio">
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_info_access_1" type="radio" name="info_access" value="1" />
                                                    <label for="input_edit_wizard_info_access_1"> Yes, users have full access to their personal information. </label>
                                                </div>
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_info_access_0" type="radio" name="info_access" value="0" />
                                                    <label for="input_edit_wizard_info_access_0"> No, users don't have access to their information. </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="control hidden" id="control_edit_wizard_info_delete">
                                        <label for="input_edit_wizard_info_delete"> Can users delete their accounts in your mobile app? </label>

                                        <div class="field">
                                            <div class="radio">
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_info_delete_1" type="radio" name="info_delete" value="1" />
                                                    <label for="input_edit_wizard_info_delete_1"> Yes, users can delete their accounts at any time. </label>
                                                </div>
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_info_delete_0" type="radio" name="info_delete" value="0" />
                                                    <label for="input_edit_wizard_info_delete_0"> No, user accounts cannot be deleted. </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="control hidden" id="control_edit_wizard_info_delete_method">
                                        <label for="input_edit_wizard_info_delete_method"> How can users delete their accounts? </label>

                                        <div class="field">
                                            <div class="checkbox">
                                                <div class="item">
                                                    <input class="checkbox" id="input_edit_wizard_info_delete_method_self" type="checkbox" name="info_delete_method[]" value="self" />
                                                    <label for="input_edit_wizard_info_delete_method_self"> They can log into their account settings page to delete it. </label>
                                                </div>
                                                <div class="item">
                                                    <input class="checkbox" id="input_edit_wizard_info_delete_method_contact" type="checkbox" name="info_delete_method[]" value="contact" />
                                                    <label for="input_edit_wizard_info_delete_method_contact"> They can contact us using the provided contact information. </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="control actions">
                                        <input class="button submit next" type="submit" name="submit" value="Next" /> <a class="back" href="privacy-policy-2">Back</a>
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
                policyWizardStepKey = "users",
                policyPremium = 0,
                policyPremiumPaid = 0,
                policyWizardPlatforms = ["mobile"];
            var policyWizardMobile = 1;
        </script>
    </body>
</html>


@endsection
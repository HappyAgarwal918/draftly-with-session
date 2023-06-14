@extends('layouts.master')

@section('privacy-policy-9')

<!DOCTYPE html>
<html lang="en">
    <head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<script async="" src="{{ asset ('assets/js/app.js')}}" charset="UTF-8" crossorigin="*"></script>
<script async="" src="{{ asset ('assets/js/default.js')}}" charset="UTF-8" crossorigin="*"></script>
<script async="" src="{{ asset ('assets/js/gtm.js')}}"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    window.dataLayer.push({ stVar3: 3 }, { event: "policiesWizard", eventCategory: "privacy policy wizard", eventAction: "next step", eventLabel: "step 08 - marketing" });
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
<title>Create Privacy Policy [Collection of information]</title>
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
                        <h1>Collection of information</h1>
                    </div>
                </div>
            </div>
        </div>

        <div id="container">
            <div class="container">
                <div class="row">
                    <div id="content" class="col-ms-12">
                        <div class="plugin-policies wizard privacy step9 step_infocollect">
                            <div class="row">
                                <div class="col-ms-12">
                                    <div class="progress green stripes">
                                        <div class="bar" style="width: 61.538461538462%;">
                                            <div class="position">61%</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <form action="{{url('/privacy-policy-10')}}" method="post">
                                @csrf
                                <input type="hidden" name="csrf_token" value="2d386224a2f0a048d9ac443ea79dd00f" />
                                <fieldset>
                                    <div class="control" id="control_edit_wizard_info">
                                        <label for="input_edit_wizard_info"> What kind of information do you collect from your users? </label>

                                        <div class="field">
                                            <div class="checkbox">
                                                <div class="item">
                                                    <input class="checkbox" id="input_edit_wizard_info_personal" type="checkbox" name="info[]" value="personal" />
                                                    <label for="input_edit_wizard_info_personal"> Personal details (such as name, country of residence, etc). </label>
                                                </div>
                                                <div class="item">
                                                    <input class="checkbox" id="input_edit_wizard_info_contact" type="checkbox" name="info[]" value="contact" />
                                                    <label for="input_edit_wizard_info_contact"> Contact information (such as email address, address, etc). </label>
                                                </div>
                                                <div class="item">
                                                    <input class="checkbox" id="input_edit_wizard_info_account" type="checkbox" name="info[]" value="account" />
                                                    <label for="input_edit_wizard_info_account"> Account details (such as user name, unique user ID, password, etc). </label>
                                                </div>
                                                <div class="item">
                                                    <input class="checkbox" id="input_edit_wizard_info_identity" type="checkbox" name="info[]" value="identity" />
                                                    <label for="input_edit_wizard_info_identity">
                                                        Proof of identity (such as photocopy of a government ID).
                                                        <a
                                                            class="premium-help gtm-cta"
                                                            data-event-label="premium question"
                                                            data-role="modal"
                                                            data-src="#premium-modal"
                                                            onclick="return false"
                                                            href="privacy-policy-9#"
                                                        >
                                                            Premium
                                                        </a>
                                                    </label>
                                                </div>
                                                <div class="item">
                                                    <input class="checkbox" id="input_edit_wizard_info_payment" type="checkbox" name="info[]" value="payment" />
                                                    <label for="input_edit_wizard_info_payment">
                                                        Payment information (such as credit card details, bank details, etc).
                                                        <a
                                                            class="premium-help gtm-cta"
                                                            data-event-label="premium question"
                                                            data-role="modal"
                                                            data-src="#premium-modal"
                                                            onclick="return false"
                                                            href="privacy-policy-9#"
                                                        >
                                                            Premium
                                                        </a>
                                                    </label>
                                                </div>
                                                <div class="item">
                                                    <input class="checkbox" id="input_edit_wizard_info_people" type="checkbox" name="info[]" value="people" />
                                                    <label for="input_edit_wizard_info_people"> Information about other individuals (such as your family members, friends, etc). </label>
                                                </div>
                                                <div class="item">
                                                    <input class="checkbox" id="input_edit_wizard_info_other" type="checkbox" name="info[]" value="other" />
                                                    <label for="input_edit_wizard_info_other"> Any other materials you willingly submit to us (such as articles, images, feedback, etc). </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="control" id="control_edit_wizard_geo">
                                        <label for="input_edit_wizard_geo"> Will you be requesting access to the geolocation of your users? </label>

                                        <div class="field">
                                            <div class="radio">
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_geo_1" type="radio" name="geo" value="1" /> <label for="input_edit_wizard_geo_1"> Yes, we may request access to geolocation. </label>
                                                </div>
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_geo_0" type="radio" name="geo" value="0" /> <label for="input_edit_wizard_geo_0"> No, we won't be requesting access to geolocation. </label>
                                                </div>
                                            </div>
                                        </div>
                                        @error('geo')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="control" id="control_edit_wizard_features">
                                        <label for="input_edit_wizard_features"> Will you be requesting access to various features on the mobile device (such as contacts, calendar, gallery, etc)? </label>

                                        <div class="field">
                                            <div class="radio">
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_features_1" type="radio" name="features" value="1" />
                                                    <label for="input_edit_wizard_features_1"> Yes, we may request access to certain features. </label>
                                                </div>
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_features_0" type="radio" name="features" value="0" />
                                                    <label for="input_edit_wizard_features_0"> No, we won't be requesting access to any features. </label>
                                                </div>
                                            </div>
                                        </div>
                                        @error('features')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="control" id="control_edit_wizard_derivative">
                                        <label for="input_edit_wizard_derivative"> Do you collect any derivative data from your users (ip address, browser name, device name, etc)? </label>

                                        <div class="field">
                                            <div class="radio">
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_derivative_1" type="radio" name="derivative" value="1" />
                                                    <label for="input_edit_wizard_derivative_1"> Yes, we may collect derivative data of our users. </label>
                                                </div>
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_derivative_0" type="radio" name="derivative" value="0" />
                                                    <label for="input_edit_wizard_derivative_0"> No, we don't collect any derivative data. </label>
                                                </div>
                                            </div>
                                        </div>
                                        @error('derivative')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="control" id="control_edit_wizard_third_party">
                                        <label for="input_edit_wizard_third_party"> Do you collect users' personal information from third party sources (partnerships, social networks, etc)? </label>

                                        <div class="field">
                                            <div class="radio">
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_third_party_1" type="radio" name="third_party" value="1" />
                                                    <label for="input_edit_wizard_third_party_1"> Yes, we may collect personal information from third parties. </label>
                                                </div>
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_third_party_0" type="radio" name="third_party" value="0" />
                                                    <label for="input_edit_wizard_third_party_0"> No, we don't collect any personal information from third parties. </label>
                                                </div>
                                            </div>
                                        </div>
                                        @error('third_party')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="control actions">
                                        <input class="button submit next" type="submit" name="submit" value="Next" /> <a class="back" href="privacy-policy-8">Back</a>
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
            var policyWizardStep = 9,
                policyWizardStepKey = "infocollect",
                policyPremium = 0,
                policyPremiumPaid = 0,
                policyWizardPlatforms = ["mobile"];
            var policyWizardMobile = 1;
        </script>
    </body>
</html>
@endsection
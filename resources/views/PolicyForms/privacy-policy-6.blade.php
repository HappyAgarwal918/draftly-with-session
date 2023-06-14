@extends('layouts.master')

@section('privacy-policy-6')

<!DOCTYPE html>
<html lang="en">
    <head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<script async="" src="{{ asset ('assets/js/app.js')}}" charset="UTF-8" crossorigin="*"></script>
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
<title>Create Privacy Policy [Target audience]</title>
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
                        <h1>Target audience</h1>
                    </div>
                </div>
            </div>
        </div>

        <div id="container">
            <div class="container">
                <div class="row">
                    <div id="content" class="col-ms-12">
                        <div class="plugin-policies wizard privacy step6 step_audience">
                            <div class="row">
                                <div class="col-ms-12">
                                    <div class="progress green stripes">
                                        <div class="bar" style="width: 38.461538461538%;">
                                            <div class="position">38%</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <form action="{{url('/privacy-policy-7')}}" method="post">
                                @csrf
                                <input type="hidden" name="csrf_token" value="2d386224a2f0a048d9ac443ea79dd00f" />
                                <fieldset>
                                    <div class="control" id="control_edit_wizard_california">
                                        <label for="input_edit_wizard_california"> Does your target audience or users include people in California, USA? </label>

                                        <div class="field">
                                            <div class="radio">
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_california_1" type="radio" name="california" value="1" />
                                                    <label for="input_edit_wizard_california_1"> Yes, our target audience or users may include people in California (required for the CCPA compliance). </label>
                                                </div>
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_california_0" type="radio" name="california" value="0" />
                                                    <label for="input_edit_wizard_california_0"> No, we don't target anyone in California. </label>
                                                </div>
                                            </div>
                                        </div>
                                        @error('california')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="control" id="control_edit_wizard_europe">
                                        <label for="input_edit_wizard_europe"> Does your target audience or users include people in the European Union? </label>

                                        <div class="field">
                                            <div class="radio">
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_europe_1" type="radio" name="europe" value="1" />
                                                    <label for="input_edit_wizard_europe_1"> Yes, our target audience or users may include people in the European Union (required for the GDPR compliance). </label>
                                                </div>
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_europe_0" type="radio" name="europe" value="0" />
                                                    <label for="input_edit_wizard_europe_0"> No, we don't target anyone in the European Union. </label>
                                                </div>
                                            </div>
                                        </div>
                                        @error('europe')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="control" id="control_edit_wizard_teens">
                                        <label for="input_edit_wizard_teens"> Does your target audience or users include people under the age of 18? </label>

                                        <div class="field">
                                            <div class="radio">
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_teens_1" type="radio" name="teens" value="1" />
                                                    <label for="input_edit_wizard_teens_1">
                                                        Yes, our target audience or users may include people under 18.
                                                        <a
                                                            class="premium-help gtm-cta"
                                                            data-event-label="premium question"
                                                            data-role="modal"
                                                            data-src="#premium-modal"
                                                            onclick="return false"
                                                            href="privacy-policy-7#"
                                                        >
                                                            Premium
                                                        </a>
                                                    </label>
                                                </div>
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_teens_0" type="radio" name="teens" value="0" /> <label for="input_edit_wizard_teens_0"> No, we don't target people under 18. </label>
                                                </div>
                                            </div>
                                        </div>
                                        @error('teens')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="control hidden" id="control_edit_wizard_children">
                                        <label for="input_edit_wizard_children"> Does your target audience or users include children under the age of 13? </label>

                                        <div class="field">
                                            <div class="radio">
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_children_1" type="radio" name="children" value="1" />
                                                    <label for="input_edit_wizard_children_1"> Yes, our target audience or users may include children. </label>
                                                </div>
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_children_0" type="radio" name="children" value="0" /> <label for="input_edit_wizard_children_0"> No, we don't target children under 13. </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="control hidden" id="control_edit_wizard_children_info">
                                        <label for="input_edit_wizard_children_info"> Do you collect information from anyone under the age of 13? </label>

                                        <div class="field">
                                            <div class="radio">
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_children_info_1" type="radio" name="children_info" value="1" />
                                                    <label for="input_edit_wizard_children_info_1"> Yes, we may collect certain information. </label>
                                                </div>
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_children_info_0" type="radio" name="children_info" value="0" />
                                                    <label for="input_edit_wizard_children_info_0"> No, we don't collect anything from children under 13. </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="control hidden" id="control_edit_wizard_children_info_misc">
                                        <label for="input_edit_wizard_children_info_misc"> Do any of the following items apply? </label>

                                        <div class="field">
                                            <div class="checkbox">
                                                <div class="item">
                                                    <input class="checkbox" id="input_edit_wizard_children_info_misc_minimal" type="checkbox" name="children_info_misc[]" value="minimal" />
                                                    <label for="input_edit_wizard_children_info_misc_minimal"> We don't require a child to disclose more information than is necessary to use the mobile app. </label>
                                                </div>
                                                <div class="item">
                                                    <input class="checkbox" id="input_edit_wizard_children_info_misc_manage" type="checkbox" name="children_info_misc[]" value="manage" />
                                                    <label for="input_edit_wizard_children_info_misc_manage">
                                                        Parents can review their child's information, delete it, and refuse to allow any further collection or use of such information.
                                                    </label>
                                                </div>
                                                <div class="item">
                                                    <input class="checkbox" id="input_edit_wizard_children_info_misc_consent" type="checkbox" name="children_info_misc[]" value="consent" />
                                                    <label for="input_edit_wizard_children_info_misc_consent"> Parents have an easy method for giving consent. </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="control actions">
                                        <input class="button submit next" type="submit" name="submit" value="Next" /> <a class="back" href="privacy-policy-5">Back</a>
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
            var policyWizardStep = 6,
                policyWizardStepKey = "audience",
                policyPremium = 0,
                policyPremiumPaid = 0,
                policyWizardPlatforms = ["mobile"];
            var policyWizardMobile = 1;
        </script>
    </body>
</html>
@endsection
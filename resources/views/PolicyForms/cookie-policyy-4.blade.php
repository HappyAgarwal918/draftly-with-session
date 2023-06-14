@extends('layouts.master')

@section('cookie-policyy-4')


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <script async="" src="{{asset ('assets/js/app.js')}}"charset="UTF-8" crossorigin="*"></script>
        <script async="" src="{{asset ('assets/js/default.js')}}"  charset="UTF-8" crossorigin="*"></script>
        <script async="" src="{{asset ('assets/js/gtm.js')}}"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            window.dataLayer.push({ stVar3: 4 }, { event: "policiesWizard", eventCategory: "cookie policy wizard", eventAction: "next step", eventLabel: "step 03 - privacy" });
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
        <title>Create Cookie Policy [Cookie types]</title>
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
                        <h1>Cookie types</h1>
                    </div>
                </div>
            </div>
        </div>

        <div id="container">
            <div class="container">
                <div class="row">
                    <div id="content" class="col-ms-12">
                        <div class="plugin-policies wizard cookies step4 step_types">
                            <div class="row">
                                <div class="col-ms-12">
                                    <div class="progress green stripes">
                                        <div class="bar" style="width: 37.5%;">
                                            <div class="position">37%</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <form action="{{url('/cookie-policyy-5')}}" method="post">
                            	@csrf
                                <input type="hidden" name="csrf_token" value="a70ee894e04fa0861a868fd51e0a31b6" />
                                <fieldset>
                                    <div class="control" id="control_edit_wizard_cookies_essential">
                                        <label for="input_edit_wizard_cookies_essential">
                                            Do you use essential cookies on your website?
                                            <a
                                                class="question-help"
                                                data-role="modal"
                                                data-type="html"
                                                data-src="Essential cookies are used by websites to perform their basic functions, for example, enabling access to secure areas of the website."
                                                onclick="return false"
                                                href=#"
                                            >
                                                &nbsp;
                                            </a>
                                        </label>

                                        <div class="field">
                                            <div class="radio">
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_cookies_essential_1" type="radio" name="essential" value="1" />
                                                    <label for="input_edit_wizard_cookies_essential_1"> Yes, essential cookies are used on my website. </label>
                                                </div>
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_cookies_essential_0" type="radio" name="essential" value="0" />
                                                    <label for="input_edit_wizard_cookies_essential_0"> No, my website does not use essential cookies. </label>
                                                </div>
                                            </div>
                                        </div>
                                        @error('essential')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="control" id="control_edit_wizard_cookies_functionality">
                                        <label for="input_edit_wizard_cookies_functionality">
                                            Do you use functionality cookies on your website?
                                            <a
                                                class="question-help"
                                                data-role="modal"
                                                data-type="html"
                                                data-src="Functionality cookies provide visitors with a more personalized experience, for example, remembering a user&#39;s name, selected language, shopping cart items, etc."
                                                onclick="return false"
                                                href="#"
                                            >
                                                &nbsp;
                                            </a>
                                        </label>

                                        <div class="field">
                                            <div class="radio">
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_cookies_functionality_1" type="radio" name="functionality" value="1" />
                                                    <label for="input_edit_wizard_cookies_functionality_1"> Yes, functionality cookies are used on my website. </label>
                                                </div>
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_cookies_functionality_0" type="radio" name="functionality" value="0" />
                                                    <label for="input_edit_wizard_cookies_functionality_0"> No, my website does not use functionality cookies. </label>
                                                </div>
                                            </div>
                                        </div>
                                        @error('functionality')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="control" id="control_edit_wizard_cookies_third_party">
                                        <label for="input_edit_wizard_cookies_third_party">
                                            Do you use third party cookies on your website?
                                            <a
                                                class="question-help"
                                                data-role="modal"
                                                data-type="html"
                                                data-src="Third party cookies are set by the third party services you may use on your website, for example, Google Analytics, Facebook Pixel, etc."
                                                onclick="return false"
                                                href="#"
                                            >
                                                &nbsp;
                                            </a>
                                        </label>

                                        <div class="field">
                                            <div class="radio">
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_cookies_third_party_1" type="radio" name="third_party" value="1" />
                                                    <label for="input_edit_wizard_cookies_third_party_1"> Yes, third party cookies are used on my website. </label>
                                                </div>
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_cookies_third_party_0" type="radio" name="third_party" value="0" />
                                                    <label for="input_edit_wizard_cookies_third_party_0"> No, my website does not use third party cookies. </label>
                                                </div>
                                            </div>
                                        </div>
                                        @error('third_party')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="control hidden" id="control_edit_wizard_cookies_ads" style="display: block;">
                                        <label for="input_edit_wizard_cookies_ads">
                                            Do you use advertising cookies on your website?
                                            <a
                                                class="question-help"
                                                data-role="modal"
                                                data-type="html"
                                                data-src="These cookies are used to display relevant advertising to users by third party services, for example, Google AdSense, Amazon Associates, etc."
                                                onclick="return false"
                                                href="create/cookie-policy/YTEv8kTF/4?policy=premium#"
                                            >
                                                &nbsp;
                                            </a>
                                        </label>

                                        <div class="field">
                                            <div class="radio">
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_cookies_ads_1" type="radio" name="ads" value="1" />
                                                    <label for="input_edit_wizard_cookies_ads_1"> Yes, advertising cookies are used on my website. </label>
                                                </div>
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_cookies_ads_0" type="radio" name="ads" value="0" />
                                                    <label for="input_edit_wizard_cookies_ads_0"> No, my website does not use advertising cookies. </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="control hidden" id="control_edit_wizard_cookies_ads_personal_info" style="display: none;">
                                        <label for="input_edit_wizard_cookies_ads_personal_info"> Do you share your users' personally identifiable information with the advertisers through cookies? </label>

                                        <div class="field">
                                            <div class="radio">
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_cookies_ads_personal_info_1" type="radio" name="cookies_ads_personal_info" value="1" />
                                                    <label for="input_edit_wizard_cookies_ads_personal_info_1"> Yes, advertisers may obtain some personally identifiable information through cookies. </label>
                                                </div>
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_cookies_ads_personal_info_0" type="radio" name="cookies_ads_personal_info" value="0" />
                                                    <label for="input_edit_wizard_cookies_ads_personal_info_0"> No, adverisers do not have any access to users' personally identifiable information through cookies. </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="control hidden" id="control_edit_wizard_cookies_analytical" style="display: block;">
                                        <label for="input_edit_wizard_cookies_analytical">
                                            Do you use analytical cookies on your website?
                                            <a
                                                class="question-help"
                                                data-role="modal"
                                                data-type="html"
                                                data-src="Analytical cookies collect information on how users interact with the website, for example, what pages are visited most, duration of the visit, and other analytical data."
                                                onclick="return false"
                                                href="create/cookie-policy/YTEv8kTF/4?policy=premium#"
                                            >
                                                &nbsp;
                                            </a>
                                        </label>

                                        <div class="field">
                                            <div class="radio">
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_cookies_analytical_1" type="radio" name="cookies_analytical" value="1" />
                                                    <label for="input_edit_wizard_cookies_analytical_1"> Yes, analytical cookies are used on my website. </label>
                                                </div>
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_cookies_analytical_0" type="radio" name="cookies_analytical" value="0" />
                                                    <label for="input_edit_wizard_cookies_analytical_0"> No, my website does not use analytical cookies. </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="control hidden" id="control_edit_wizard_cookies_social" style="display: block;">
                                        <label for="input_edit_wizard_cookies_social">
                                            Do you use social media cookies on your website?
                                            <a
                                                class="question-help"
                                                data-role="modal"
                                                data-type="html"
                                                data-src="Social media cookies are set by social media services (such as Facebook or Twitter) if you display their share, like, etc. buttons on your website or if you use their tracking features."
                                                onclick="return false"
                                                href="create/cookie-policy/YTEv8kTF/4?policy=premium#"
                                            >
                                                &nbsp;
                                            </a>
                                        </label>

                                        <div class="field">
                                            <div class="radio">
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_cookies_social_1" type="radio" name="cookies_social" value="1" />
                                                    <label for="input_edit_wizard_cookies_social_1"> Yes, social media cookies are used on my website. </label>
                                                </div>
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_cookies_social_0" type="radio" name="cookies_social" value="0" />
                                                    <label for="input_edit_wizard_cookies_social_0"> No, my website does not use social media cookies. </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="control actions">
                                        <input class="button submit next" type="submit" name="submit" value="Next" /> <a class="back" href="cookie-policyy-3">Back</a>
                                    </div>
                                </fieldset>

                                <input type="hidden" name="do_wizard" value="1" />
                            </form>                             
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <script>
            var policyWizardStep = 4,
                policyWizardStepKey = "types",
                policyPremium = 1,
                policyPremiumPaid = 0,
                policyWizardPlatforms = ["website"];
            var policyWizardMobile = 0;
        </script>    
</body>
</html>


@endsection
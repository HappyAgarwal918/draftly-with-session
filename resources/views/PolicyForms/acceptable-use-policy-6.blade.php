@extends('layouts.master')

@section('acceptable-use-policy-6')


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <script type="text/javascript" async="" src="{{ asset('assets/js/bat.js')}}"></script>
        <script async="" src="{{ asset('assets/js/app.js')}}" charset="UTF-8" crossorigin="*"></script>
        <script async="" src="{{ asset('assets/js/default.js')}}" charset="UTF-8" crossorigin="*"></script>
        <script type="text/javascript" async="" src="{{ asset('assets/js/analytics.js')}}"></script>
        <script type="text/javascript" async="" src="{{ asset('assets/js/js.js')}}"></script>
        <script type="text/javascript" async="" src="{{ asset('assets/js/analytics.js')}}"></script>
        <script async="" src="{{ asset('assets/js/gtm.js')}}"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            window.dataLayer.push({ stVar1: 4 }, { stVar3: 4 }, { event: "policiesWizard", eventCategory: "acceptable use policy wizard", eventAction: "next step", eventLabel: "step 05 - products" });
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
        <title>Create Acceptable Use Policy [File uploads]</title>
        <meta name="description" content="Create professional an acceptable use policy tailored specifically for your website and business in minutes with our easy to use online wizard." />
        <script src="{{ asset('assets/js/1611587689.js')}}"></script>
        <script src="{{ asset('assets/js/aup.min.js')}}"></script>
        <meta property="og:image" content="uploads/p/h/7/g/1y9eg2ur9hegs3x1s2nd.png" />
        <meta name="twitter:image" content="uploads/p/h/7/g/1y9eg2ur9hegs3x1s2nd.png" />
        <link href="{{ asset ('assets/css/new.css')}}" rel="stylesheet" type="text/css" />
        <script src="{{ asset('assets/js/tawk.js')}}"></script>
    </head>
    <body class="guest create policies_wizard_aup index">
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NS2X6F" height="0" width="0" style="display: none; visibility: hidden;"></iframe></noscript>
        <div class="section sub-hero">
            <div class="container">
                <div class="row">
                    <div class="col-ms-12">
                        <h1>File uploads</h1>
                    </div>
                </div>
            </div>
        </div>

        <div id="container">
            <div class="container">
                <div class="row">
                    <div id="content" class="col-ms-12">
                        <div class="plugin-policies wizard aup step6 step_files">
                            <div class="row">
                                <div class="col-ms-12">
                                    <div class="progress green stripes">
                                        <div class="bar" style="width: 45.454545454545%;">
                                            <div class="position">45%</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <form action="{{url('/acceptable-use-policy-7?form-id='.$id)}}" method="post">
                                @csrf
                                <input type="hidden" name="csrf_token" value="41ae6a3e19e805208bd9b9c81333ec20" />
                                <fieldset>
                                    <div class="control" id="control_edit_wizard_upload">
                                        <label for="input_edit_wizard_upload"> Can users upload their own files in your mobile app? </label>

                                        <div class="field">
                                            <div class="radio">
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_upload_1" type="radio" name="upload" value="1" /> <label for="input_edit_wizard_upload_1"> Yes, users can upload their own files. </label>
                                                </div>
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_upload_0" type="radio" name="upload" value="0" /> <label for="input_edit_wizard_upload_0"> No, users can't upload any files. </label>
                                                </div>
                                            </div>
                                        </div>
                                        @error('upload')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="control hidden" id="control_edit_wizard_execute">
                                        <label for="input_edit_wizard_execute"> Can users execute or run files they uploaded? </label>

                                        <div class="field">
                                            <div class="radio">
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_execute_1" type="radio" name="execute" value="1" />
                                                    <label for="input_edit_wizard_execute_1">
                                                        Yes, uploaded files may contain executable scripts or software (common for hosting services).
                                                        <a
                                                            class="premium-help gtm-cta"
                                                            data-event-label="premium question"
                                                            data-role="modal"
                                                            data-src="#premium-modal"
                                                            onclick="return false"
                                                            href="acceptable-use-policy#"
                                                        >
                                                            Premium
                                                        </a>
                                                    </label>
                                                </div>
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_execute_0" type="radio" name="execute" value="0" />
                                                    <label for="input_edit_wizard_execute_0"> No, users can upload only static files (such as text, images, videos, etc). </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="control" id="control_edit_wizard_install">
                                        <label for="input_edit_wizard_install"> Can users install or integrate third party apps or software in your mobile app? </label>

                                        <div class="field">
                                            <div class="radio">
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_install_1" type="radio" name="install" value="1" />
                                                    <label for="input_edit_wizard_install_1">
                                                        Yes, users may install or integrate third party software or apps (common for hosting services).
                                                        <a
                                                            class="premium-help gtm-cta"
                                                            data-event-label="premium question"
                                                            data-role="modal"
                                                            data-src="#premium-modal"
                                                            onclick="return false"
                                                            href="acceptable-use-policy#"
                                                        >
                                                            Premium
                                                        </a>
                                                    </label>
                                                </div>
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_install_0" type="radio" name="install" value="0" />
                                                    <label for="input_edit_wizard_install_0"> No, users may not install or integrate third party software or apps. </label>
                                                </div>
                                            </div>
                                        </div>
                                        @error('install')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="control actions">
                                        <input class="button submit next" type="submit" name="submit" value="Next" /> <a class="back" href="acceptable-use-policy-5">Back</a>
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
                policyWizardStepKey = "files",
                policyPremium = 0,
                policyPremiumPaid = 0,
                policyWizardPlatforms = ["mobile"];
            var policyWizardMobile = 1;
        </script>

    </body>
</html>
@endsection
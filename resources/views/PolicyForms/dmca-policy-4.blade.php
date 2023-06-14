@extends('layouts.master')

@section('dmca-policy-4')


<!DOCTYPE html>

<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
         <script async="" src="{{asset ('assets/js/app.js')}}" charset="UTF-8" crossorigin="*"></script>
         <script async="" src="{{asset ('assets/js/default.js')}}"  charset="UTF-8" crossorigin="*"></script>
         <script async="" src="{{asset ('assets/js/gtm.js')}}"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            window.dataLayer.push({ stVar3: 4 }, { event: "policiesWizard", eventCategory: "DMCA policy wizard", eventAction: "next step", eventLabel: "step 03 - content" });
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
        <link rel="alternate" type="application/rss+xml" title="Feed" href="/blog/feed" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Create Digital Millennium Copyright Act Policy [Copyright infringement reporting]</title>
        <meta name="description" content="Create a professional digital millennium copyright act policy tailored specifically for your website in minutes with our easy to use online wizard." />
        <script src="{{asset ('assets/js/1611587689.js')}}"></script>
        <script src="{{asset ('assets/js/dmca.min.js')}}"></script>
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
    <body class="guest create policies_wizard_dmca index">
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NS2X6F" height="0" width="0" style="display: none; visibility: hidden;"></iframe></noscript>
        <div class="section sub-hero">
            <div class="container">
                <div class="row">
                    <div class="col-ms-12">
                        <h1>Copyright infringement reporting</h1>
                    </div>
                </div>
            </div>
        </div>

        <div id="container">
            <div class="container">
                <div class="row">
                    <div id="content" class="col-ms-12">
                        <div class="plugin-policies wizard dmca step4 step_notices">
                            <div class="row">
                                <div class="col-ms-12">
                                    <div class="progress green stripes">
                                        <div class="bar" style="width: 42.857142857143%;">
                                            <div class="position">42%</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <form action="{{url('/dmca-policy-5')}}" method="post">
                                @csrf
                                <input type="hidden" name="csrf_token" value="6071931df85446bcd56d68fcf74f050c" />
                                <fieldset>
                                    <div class="control" id="control_edit_wizard_formatting">
                                        <label for="input_edit_wizard_formatting"> Will you accept copyright infringement reports only if they comply with the DMCA requirements? </label>

                                        <div class="field">
                                            <div class="radio">
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_formatting_1" type="radio" name="formatting" value="1" />
                                                    <label for="input_edit_wizard_formatting_1"> Yes, only DMCA-compliant reports will be accepted (recommended). </label>
                                                </div>
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_formatting_0" type="radio" name="formatting" value="0" /> <label for="input_edit_wizard_formatting_0"> No, we’ll accept all reports. </label>
                                                </div>
                                            </div>
                                        </div>
                                        @error('formatting')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="control hidden" id="control_edit_wizard_instructions" style="display: block;">
                                        <label for="input_edit_wizard_instructions"> Do you want this policy to include instructions on how to report copyright infringement correctly? </label>

                                        <div class="field">
                                            <div class="radio">
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_instructions_1" type="radio" name="instructions" value="1" />
                                                    <label for="input_edit_wizard_instructions_1">
                                                        Yes, include step by step DMCA-compliant instructions.
                                                        <a
                                                            class="premium-help gtm-cta"
                                                            data-event-label="premium question"
                                                            data-role="modal"
                                                            data-src="#premium-modal"
                                                            onclick="return false"
                                                            href="dmca-policy/4ADkFodV/4?policy=basic#"
                                                        >
                                                            Premium
                                                        </a>
                                                    </label>
                                                </div>
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_instructions_0" type="radio" name="instructions" value="0" />
                                                    <label for="input_edit_wizard_instructions_0"> No, users can submit reports without following any instructions. </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="control" id="control_edit_wizard_court">
                                        <label for="input_edit_wizard_court"> Will you require a court order to disable or remove reported content? </label>

                                        <div class="field">
                                            <div class="radio">
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_court_1" type="radio" name="court" value="1" />
                                                    <label for="input_edit_wizard_court_1"> Yes, we require a court order before we disable or remove reported content. </label>
                                                </div>
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_court_0" type="radio" name="court" value="0" />
                                                    <label for="input_edit_wizard_court_0"> No, we don't need a court order to act on copyright infringement reports. </label>
                                                </div>
                                            </div>
                                        </div>
                                        @error('court')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="control actions">
                                        <input class="button submit next" type="submit" name="submit" value="Next" /> <a class="back" href="dmca-policy-3">Back</a>
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
                policyWizardStepKey = "notices",
                policyPremium = 0,
                policyPremiumPaid = 0,
                policyWizardPlatforms = ["mobile"];
            var policyWizardMobile = 1;
        </script>   
    </body>
</html>

@endsection
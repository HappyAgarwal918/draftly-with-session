@extends('layouts.master')

@section('disclaimer-3')

<!DOCTYPE html>

<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <script async="" src="{{asset ('assets/js/app.js')}}" charset="UTF-8" crossorigin="*"></script>
         <script async="" src="{{asset ('assets/js/default.js')}}"  charset="UTF-8" crossorigin="*"></script>
         <script async="" src="{{asset ('assets/js/gtm.js')}}"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            window.dataLayer.push({ stVar3: 3 }, { event: "policiesWizard", eventCategory: "disclaimer wizard", eventAction: "next step", eventLabel: "step 02 - operator" });
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
        <link rel="alternate" type="application/rss+xml" title=" Feed" href="blog/feed" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Create Disclaimer [Content and information]</title>
        <meta name="description" content="Create professional disclaimer tailored specifically for your blog or website in minutes with our easy to use online wizard to avoid potential liability." />
              <script src="{{asset ('assets/js/1611587689.js')}}"></script>
              <script src="{{asset ('assets/js/disclaimer.min.js')}}"></script>
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
        <body class="guest create policies_wizard_disclaimer index">
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NS2X6F" height="0" width="0" style="display: none; visibility: hidden;"></iframe></noscript>
             <div class="section sub-hero">
            <div class="container">
                <div class="row">
                    <div class="col-ms-12">
                        <h1>Content and information</h1>
                    </div>
                </div>
            </div>
        </div>

        <div id="container">
            <div class="container">
                <div class="row">
                    <div id="content" class="col-ms-12">
                        <div class="plugin-policies wizard disclaimer step3 step_content">
                            <div class="row">
                                <div class="col-ms-12">
                                    <div class="progress green stripes">
                                        <div class="bar" style="width: 18.181818181818%;">
                                            <div class="position">18%</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <form action="{{url('/disclaimer-4')}}" method="post">
                                @csrf
                                <input type="hidden" name="csrf_token" value="2d386224a2f0a048d9ac443ea79dd00f" />
                                <fieldset>
                                    <div class="control" id="control_edit_wizard_writer">
                                        <label for="input_edit_wizard_writer"> Who creates the content available in your mobile app? </label>

                                        <div class="field">
                                            <div class="radio">
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_writer_personal" type="radio" name="writer" value="personal" />
                                                    <label for="input_edit_wizard_writer_personal"> Content is created and edited by myself. </label>
                                                </div>
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_writer_collab" type="radio" name="writer" value="collab" />
                                                    <label for="input_edit_wizard_writer_collab"> Content is created in collaboration with other people. </label>
                                                </div>
                                            </div>
                                        </div>
                                         @error('writer')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="control" id="control_edit_wizard_original">
                                        <label for="input_edit_wizard_original"> Is the content available in your mobile app original? </label>

                                        <div class="field">
                                            <div class="radio">
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_original_1" type="radio" name="original" value="1" />
                                                    <label for="input_edit_wizard_original_1"> Yes, all content is original and not published anywhere else. </label>
                                                </div>
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_original_0" type="radio" name="original" value="0" />
                                                    <label for="input_edit_wizard_original_0"> No, some or all of the content is copied from elsewhere. </label>
                                                </div>
                                            </div>
                                        </div>
                                         @error('original')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="control" id="control_edit_wizard_disclaimer_specialty">
                                        <label for="input_edit_wizard_specialty">
                                            Does the content in your mobile app reference or contain any of the following topics in a regulated field?
                                            <a
                                                class="premium-help gtm-cta"
                                                data-event-label="premium question"
                                                data-role="modal"
                                                data-src="#premium-modal"
                                                onclick="return false"
                                                href="disclaimer/oDgzJL7g/3?policy=basic#"
                                            >
                                                Premium
                                            </a>
                                        </label>

                                        <div class="field">
                                            <div class="checkbox">
                                                <div class="item">
                                                    <input class="checkbox" id="input_edit_wizard_specialty_fitness" type="checkbox" name="specialty[]" value="fitness" /> <label for="input_edit_wizard_specialty_fitness"> Fitness </label>
                                                </div>
                                                <div class="item">
                                                    <input class="checkbox" id="input_edit_wizard_specialty_financial" type="checkbox" name="specialty[]" value="financial" />
                                                    <label for="input_edit_wizard_specialty_financial"> Financial </label>
                                                </div>
                                                <div class="item">
                                                    <input class="checkbox" id="input_edit_wizard_specialty_investments" type="checkbox" name="specialty[]" value="investments" />
                                                    <label for="input_edit_wizard_specialty_investments"> Investments </label>
                                                </div>
                                                <div class="item">
                                                    <input class="checkbox" id="input_edit_wizard_specialty_medical" type="checkbox" name="specialty[]" value="medical" />
                                                    <label for="input_edit_wizard_specialty_medical"> Medical or health </label>
                                                </div>
                                                <div class="item">
                                                    <input class="checkbox" id="input_edit_wizard_specialty_legal" type="checkbox" name="specialty[]" value="legal" /> <label for="input_edit_wizard_specialty_legal"> Legal </label>
                                                </div>
                                            </div>
                                        </div>
                                         @error('specialty')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="control actions">
                                        <input class="button submit next" type="submit" name="submit" value="Next" /> <a class="back" href="disclaimer-2">Back</a>
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
            var policyWizardStep = 3,
                policyWizardStepKey = "content",
                policyPremium = 0,
                policyPremiumPaid = 0,
                policyWizardPlatforms = ["mobile"];
            var policyWizardMobile = 1;
        </script>
    </body>
</html>


@endsection
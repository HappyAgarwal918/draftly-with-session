@extends('layouts.master')

@section('disclaimer-4')

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <script async="" src="{{asset ('assets/js/app.js')}}" charset="UTF-8" crossorigin="*"></script>
        <script async="" src="{{asset ('assets/js/default.js')}}" charset="UTF-8" crossorigin="*"></script>
        <script async="" src="{{asset ('assets/js/gtm.js')}}"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            window.dataLayer.push({ stVar3: 3 }, { event: "policiesWizard", eventCategory: "disclaimer wizard", eventAction: "next step", eventLabel: "step 03 - content" });
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
        <title>Create Disclaimer [Content reproduction and sharing]</title>
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
                        <h1>Content reproduction and sharing</h1>
                    </div>
                </div>
            </div>
        </div>

        <div id="container">
            <div class="container">
                <div class="row">
                    <div id="content" class="col-ms-12">
                        <div class="plugin-policies wizard disclaimer step4 step_copy">
                            <div class="row">
                                <div class="col-ms-12">
                                    <div class="progress green stripes">
                                        <div class="bar" style="width: 27.272727272727%;">
                                            <div class="position">27%</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <form action="{{url('/disclaimer-5')}}" method="post">
                                 @csrf
                                <input type="hidden" name="csrf_token" value="2d386224a2f0a048d9ac443ea79dd00f" />
                                <fieldset>
                                    <div class="control" id="control_edit_wizard_copy">
                                        <label for="input_edit_wizard_copy"> Can users copy and distribute content and information available in your mobile app? </label>

                                        <div class="field">
                                            <div class="radio">
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_copy_yes" type="radio" name="copy" value="yes" />
                                                    <label for="input_edit_wizard_copy_yes"> Yes, content can be copied and distributed freely. </label>
                                                </div>
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_copy_personal" type="radio" name="copy" value="personal" />
                                                    <label for="input_edit_wizard_copy_personal"> Yes, content can be copied for personal use only. </label>
                                                </div>
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_copy_no" type="radio" name="copy" value="no" />
                                                    <label for="input_edit_wizard_copy_no"> No, content cannot be copied or distributed without permission. </label>
                                                </div>
                                            </div>
                                        </div>
                                         @error('copy')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="control" id="control_edit_wizard_share">
                                        <label for="input_edit_wizard_share"> Can people share content and information available in your mobile app on social media platforms? </label>

                                        <div class="field">
                                            <div class="radio">
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_share_1" type="radio" name="share" value="1" />
                                                    <label for="input_edit_wizard_share_1"> Yes, content can be shared on social media platforms. </label>
                                                </div>
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_share_0" type="radio" name="share" value="0" /> <label for="input_edit_wizard_share_0"> No, content cannot be shared on social media. </label>
                                                </div>
                                            </div>
                                        </div>
                                         @error('share')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="control actions">
                                        <input class="button submit next" type="submit" name="submit" value="Next" /> <a class="back" href="disclaimer-3">Back</a>
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
                policyWizardStepKey = "copy",
                policyPremium = 0,
                policyPremiumPaid = 0,
                policyWizardPlatforms = ["mobile"];
            var policyWizardMobile = 1;
        </script>
    </body>
</html>


@endsection
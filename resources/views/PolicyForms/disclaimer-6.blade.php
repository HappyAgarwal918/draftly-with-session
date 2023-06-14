@extends('layouts.master')

@section('disclaimer-6')

<!DOCTYPE html>

<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <script async="" src="{{asset ('assets/js/app.js')}}" charset="UTF-8" crossorigin="*"></script>
         <script async="" src="{{asset ('assets/js/default.js')}}"  charset="UTF-8" crossorigin="*"></script>
         <script async="" src="{{asset ('assets/js/gtm.js')}}"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            window.dataLayer.push({ stVar3: 3 }, { event: "policiesWizard", eventCategory: "disclaimer wizard", eventAction: "next step", eventLabel: "step 05 - sponsorship" });
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
        <link rel="alternate" type="application/rss+xml" title=" Feed" href="/blog/feed" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Create Disclaimer [User contributions]</title>
        <meta name="description" content="Create professional disclaimer tailored specifically for your blog or website in minutes with our easy to use online wizard to avoid potential liability." />
        <script src="{{asset ('assets/js/1611587689.js')}}"></script>
        <style>
            @media print {
                #ghostery-tracker-tally {
                    display: none !important;
                }
            }
        </style>
        <script src="{{asset ('assets/js/disclaimer.min.js')}}"></script>
        <meta property="og:image" content="/uploads/p/h/7/g/1y9eg2ur9hegs3x1s2nd.png" />
        <meta name="twitter:image" content="/uploads/p/h/7/g/1y9eg2ur9hegs3x1s2nd.png" />
        <link href="{{ asset ('assets/css/new.css')}}" rel="stylesheet" type="text/css" />
        <script src="{{ asset('assets/js/tawk.js')}}"></script>
    </head>
    
    <body class="guest create policies_wizard_disclaimer index">
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NS2X6F" height="0" width="0" style="display: none; visibility: hidden;"></iframe></noscript>
        <div class="section sub-hero">
            <div class="container">
                <div class="row">
                    <div class="col-ms-12">
                        <h1>User contributions</h1>
                    </div>
                </div>
            </div>
        </div>

        <div id="container">
            <div class="container">
                <div class="row">
                    <div id="content" class="col-ms-12">
                        <div class="plugin-policies wizard disclaimer step6 step_postings">
                            <div class="row">
                                <div class="col-ms-12">
                                    <div class="progress green stripes">
                                        <div class="bar" style="width: 45.454545454545%;">
                                            <div class="position">45%</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <form action="{{url('/disclaimer-7')}}" method="post">
                                @csrf
                                <input type="hidden" name="csrf_token" value="2d386224a2f0a048d9ac443ea79dd00f" />
                                <fieldset>
                                    <div class="control" id="control_edit_wizard_publish">
                                        <label for="input_edit_wizard_publish"> Can users publish anything in your mobile app (comments, images, videos, etc)? </label>

                                        <div class="field">
                                            <div class="radio">
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_publish_1" type="radio" name="publish" value="1" />
                                                    <label for="input_edit_wizard_publish_1"> Yes, users can submit and publish their own content. </label>
                                                </div>
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_publish_0" type="radio" name="publish" value="0" /> <label for="input_edit_wizard_publish_0"> No, users can't publish anything. </label>
                                                </div>
                                            </div>
                                        </div>
                                         @error('publish')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="control hidden" id="control_edit_wizard_monitor">
                                        <label for="input_edit_wizard_monitor"> Do you monitor and review user submitted content? </label>

                                        <div class="field">
                                            <div class="radio">
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_monitor_1" type="radio" name="monitor" value="1" />
                                                    <label for="input_edit_wizard_monitor_1"> Yes, all or some of the submitted content is reviewed before being made public. </label>
                                                </div>
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_monitor_0" type="radio" name="monitor" value="0" />
                                                    <label for="input_edit_wizard_monitor_0"> No, submitted content becomes public immediately. </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="control hidden" id="control_edit_wizard_reuse">
                                        <label for="input_edit_wizard_reuse"> Do you reserve the right to reuse or copy submitted content? </label>

                                        <div class="field">
                                            <div class="radio">
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_reuse_1" type="radio" name="reuse" value="1" />
                                                    <label for="input_edit_wizard_reuse_1"> Yes, content can be reused for various purposes (for example, included in the newsletter). </label>
                                                </div>
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_reuse_0" type="radio" name="reuse" value="0" /> <label for="input_edit_wizard_reuse_0"> No, content will not be reused or copied. </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="control hidden" id="control_edit_wizard_terminate">
                                        <label for="input_edit_wizard_terminate"> Do you reserve the right to modify or remove user submitted content? </label>

                                        <div class="field">
                                            <div class="radio">
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_terminate_1" type="radio" name="terminate" value="1" />
                                                    <label for="input_edit_wizard_terminate_1"> Yes, content can be modified or removed if it's found abusive or violates the terms. </label>
                                                </div>
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_terminate_0" type="radio" name="terminate" value="0" />
                                                    <label for="input_edit_wizard_terminate_0"> No, content will never get modified or removed. </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="control actions">
                                        <input class="button submit next" type="submit" name="submit" value="Next" /> <a class="back" href="disclaimer-5">Back</a>
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
            var policyWizardStep = 6,
                policyWizardStepKey = "postings",
                policyPremium = 0,
                policyPremiumPaid = 0,
                policyWizardPlatforms = ["mobile"];
            var policyWizardMobile = 1;
        </script>
</body>
</html>


@endsection
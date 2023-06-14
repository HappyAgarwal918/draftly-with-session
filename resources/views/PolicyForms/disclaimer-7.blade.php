@extends('layouts.master')

@section('disclaimer-7')

<!DOCTYPE html>

<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <script async="" src="{{asset ('assets/js/app.js')}}" charset="UTF-8" crossorigin="*"></script>
         <script async="" src="{{asset ('assets/js/default.js')}}"  charset="UTF-8" crossorigin="*"></script>
         <script async="" src="{{asset ('assets/js/gtm.js')}}"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            window.dataLayer.push({ stVar3: 3 }, { event: "policiesWizard", eventCategory: "disclaimer wizard", eventAction: "next step", eventLabel: "step 06 - postings" });
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
        <title>Create Disclaimer [Reviews and testimonials]</title>
        <meta name="description" content="Create professional disclaimer tailored specifically for your blog or website in minutes with our easy to use online wizard to avoid potential liability." />
        <script src="{{asset ('assets/js/1611587689.js')}}"></script>
        <style type="text/css">
            @media print {
                #ghostery-tracker-tally {
                    display: none !important;
                }
            }
        </style>
        <script src="{{asset ('assets/js/disclaimer.min.js')}}"></script>
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
                        <h1>Reviews and testimonials</h1>
                    </div>
                </div>
            </div>
        </div>

        <div id="container">
            <div class="container">
                <div class="row">
                    <div id="content" class="col-ms-12">
                        <div class="plugin-policies wizard disclaimer step7 step_praise">
                            <div class="row">
                                <div class="col-ms-12">
                                    <div class="progress green stripes">
                                        <div class="bar" style="width: 54.545454545455%;">
                                            <div class="position">54%</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <form action="{{url('/disclaimer-8')}}" method="post">
                                @csrf
                                <input type="hidden" name="csrf_token" value="2d386224a2f0a048d9ac443ea79dd00f" />
                                <fieldset>
                                    <div class="control" id="control_edit_wizard_testimonials">
                                        <label for="input_edit_wizard_testimonials"> Do you display reviews or testimonials about you, your products or services in your mobile app? </label>

                                        <div class="field">
                                            <div class="radio">
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_testimonials_1" type="radio" name="testimonials" value="1" />
                                                    <label for="input_edit_wizard_testimonials_1"> Yes, we collect and may display reviews or testimonials. </label>
                                                </div>
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_testimonials_0" type="radio" name="testimonials" value="0" />
                                                    <label for="input_edit_wizard_testimonials_0"> No, we don't collect or display reviews or testimonials. </label>
                                                </div>
                                            </div>
                                        </div>
                                         @error('testimonials')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="control hidden" id="control_edit_wizard_modify">
                                        <label for="input_edit_wizard_modify"> Do testimonials appear without any modifications from you (except for grammar or length)? </label>

                                        <div class="field">
                                            <div class="radio">
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_modify_1" type="radio" name="modify" value="1" />
                                                    <label for="input_edit_wizard_modify_1"> Yes, testimonials are displayed "as is" and are not modified by us. </label>
                                                </div>
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_modify_0" type="radio" name="modify" value="0" />
                                                    <label for="input_edit_wizard_modify_0"> No, we may modify testimonials before displaying them. </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="control hidden" id="control_edit_wizard_compensate">
                                        <label for="input_edit_wizard_compensate"> Are reviewers affiliated with you or get rewarded for their testimonials (get paid, receive free products, etc)? </label>

                                        <div class="field">
                                            <div class="radio">
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_compensate_1" type="radio" name="compensate" value="1" />
                                                    <label for="input_edit_wizard_compensate_1"> Yes, reviewers may be affiliated with us or may get rewarded for their testimonials. </label>
                                                </div>
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_compensate_0" type="radio" name="compensate" value="0" />
                                                    <label for="input_edit_wizard_compensate_0"> No, we have no affiliation and do not reward anyone for their testimonials. </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="control actions">
                                        <input class="button submit next" type="submit" name="submit" value="Next" /> <a class="back" href="disclaimer-6">Back</a>
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
            var policyWizardStep = 7,
                policyWizardStepKey = "praise",
                policyPremium = 0,
                policyPremiumPaid = 0,
                policyWizardPlatforms = ["mobile"];
            var policyWizardMobile = 1;
        </script>
    </body>
</html>


@endsection
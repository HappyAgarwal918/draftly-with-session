@extends('layouts.master')

@section('disclaimer-8')

<!DOCTYPE html>

<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
         <script async="" src="{{asset ('assets/js/app.js')}}" charset="UTF-8" crossorigin="*"></script>
         <script async="" src="{{asset ('assets/js/default.js')}}"  charset="UTF-8" crossorigin="*"></script>
         <script async="" src="{{asset ('assets/js/gtm.js')}}"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            window.dataLayer.push({ stVar3: 3 }, { event: "policiesWizard", eventCategory: "disclaimer wizard", eventAction: "next step", eventLabel: "step 07 - praise" });
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
        <link rel="alternate" type="application/rss+xml" title="" href="/blog/feed" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Create Disclaimer [Advertising and marketing]</title>
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
                        <h1>Advertising and marketing</h1>
                    </div>
                </div>
            </div>
        </div>

        <div id="container">
            <div class="container">
                <div class="row">
                    <div id="content" class="col-ms-12">
                        <div class="plugin-policies wizard disclaimer step8 step_marketing">
                            <div class="row">
                                <div class="col-ms-12">
                                    <div class="progress green stripes">
                                        <div class="bar" style="width: 63.636363636364%;">
                                            <div class="position">63%</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <form action="{{url('/disclaimer-9')}}" method="post">
                                @csrf
                                <input type="hidden" name="csrf_token" value="2d386224a2f0a048d9ac443ea79dd00f" />
                                <fieldset>
                                    <div class="control" id="control_edit_wizard_affiliate_links">
                                        <label for="input_edit_wizard_affiliate_links"> Do you have affiliate links in your mobile app? </label>

                                        <div class="field">
                                            <div class="radio">
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_affiliate_links_1" type="radio" name="affiliate_links" value="1" />
                                                    <label for="input_edit_wizard_affiliate_links_1"> Yes, there may be affiliate links. </label>
                                                </div>
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_affiliate_links_0" type="radio" name="affiliate_links" value="0" />
                                                    <label for="input_edit_wizard_affiliate_links_0"> No, there are no affiliate links. </label>
                                                </div>
                                            </div>
                                        </div>
                                         @error('affiliate_links')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="control hidden" id="control_edit_wizard_affiliate_links_amazon">
                                        <label for="input_edit_wizard_affiliate_links_amazon"> Are you a part of Amazon's Associates program? </label>

                                        <div class="field">
                                            <div class="radio">
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_affiliate_links_amazon_1" type="radio" name="affiliate_links_amazon" value="1" />
                                                    <label for="input_edit_wizard_affiliate_links_amazon_1">
                                                        Yes, I have an account with Amazon's Associates program.
                                                        <a
                                                            class="premium-help gtm-cta"
                                                            data-event-label="premium question"
                                                            data-role="modal"
                                                            data-src="#premium-modal"
                                                            onclick="return false"
                                                            href="create/disclaimer/oDgzJL7g/8?policy=basic#"
                                                        >
                                                            Premium
                                                        </a>
                                                    </label>
                                                </div>
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_affiliate_links_amazon_0" type="radio" name="affiliate_links_amazon" value="0" />
                                                    <label for="input_edit_wizard_affiliate_links_amazon_0"> No, I'm not affiliated with Amazon's Associates program. </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="control" id="control_edit_wizard_ads">
                                        <label for="input_edit_wizard_ads"> Do you have any ads in your mobile app? </label>

                                        <div class="field">
                                            <div class="radio">
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_ads_1" type="radio" name="ads" value="1" />
                                                    <label for="input_edit_wizard_ads_1">
                                                        Yes, there may be ads.
                                                        <a
                                                            class="premium-help gtm-cta"
                                                            data-event-label="premium question"
                                                            data-role="modal"
                                                            data-src="#premium-modal"
                                                            onclick="return false"
                                                            href="/create/disclaimer/oDgzJL7g/8?policy=basic#"
                                                        >
                                                            Premium
                                                        </a>
                                                    </label>
                                                </div>
                                                <div class="item"><input class="radio" id="input_edit_wizard_ads_0" type="radio" name="ads" value="0" /> <label for="input_edit_wizard_ads_0"> No, there are no ads. </label></div>
                                            </div>
                                        </div>
                                        @error('ads')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="control actions">
                                        <input class="button submit next" type="submit" name="submit" value="Next" /> <a class="back" href="disclaimer-7">Back</a>
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
            var policyWizardStep = 8,
                policyWizardStepKey = "marketing",
                policyPremium = 0,
                policyPremiumPaid = 0,
                policyWizardPlatforms = ["mobile"];
            var policyWizardMobile = 1;
        </script>
    </body>
</html>


@endsection
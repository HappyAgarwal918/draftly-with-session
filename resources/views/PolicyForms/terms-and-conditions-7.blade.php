@extends('layouts.master')

@section('terms-and-conditions-7')

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <script async="" src="{{ asset ('assets/js/app.js')}}" charset="UTF-8" crossorigin="*"></script>
        <script async="" src="{{ asset ('assets/js/default.js')}}" charset="UTF-8" crossorigin="*"></script>
        <script async="" src="{{ asset ('assets/js/gtm.js')}}"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            window.dataLayer.push({ stVar3: 1 }, { event: "policiesWizard", eventCategory: "terms and conditions wizard", eventAction: "next step", eventLabel: "step 06 - products" });
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
        <title>Create Terms and Conditions [Advertising and marketing]</title>
        <meta name="description" content="Create professional terms and conditions agreement tailored specifically for your website and business in minutes with our easy to use online wizard." />
        <script src="{{ asset ('assets/js/1611587689.js')}}"></script>
        <style>
            @media print {
                #ghostery-tracker-tally {
                    display: none !important;
                }
            }
        </style>
        <script src="{{ asset ('assets/js/tos.min.js')}}"></script>
        <meta property="og:image" content="uploads/p/h/7/g/1y9eg2ur9hegs3x1s2nd.png" />
        <meta name="twitter:image" content="uploads/p/h/7/g/1y9eg2ur9hegs3x1s2nd.png" />
        <link href="{{ asset ('assets/css/new.css')}}" rel="stylesheet" type="text/css" />
        <script src="{{ asset('assets/js/tawk.js')}}"></script>
    </head>
    
    <body class="guest create policies_wizard_tos index">
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
                        <div class="plugin-policies wizard tos step7 step_marketing">
                            <div class="row">
                                <div class="col-ms-12">
                                    <div class="progress green stripes">
                                        <div class="bar" style="width: 60%;">
                                            <div class="position">60%</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <form action="{{url('/terms-and-conditions-8')}}" method="post">
                                @csrf
                                <input type="hidden" name="csrf_token" value="c25077aa4a946cd8673eb455e99992cc" />
                                <fieldset>
                                    <div class="control" id="control_edit_wizard_affiliate_links">
                                        <label for="input_edit_wizard_affiliate_links"> Do you have affiliate links on your website? </label>

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

                                    <div class="control" id="control_edit_wizard_ads">
                                        <label for="input_edit_wizard_ads"> Do you display ads on your website (Google AdSense/AdMob, BuySellAds, etc)? </label>

                                        <div class="field">
                                            <div class="radio">
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_ads_1" type="radio" name="ads" value="1" />
                                                    <label for="input_edit_wizard_ads_1">
                                                        Yes, there may be ads displayed.
                                                        <a
                                                            class="premium-help gtm-cta"
                                                            data-event-label="premium question"
                                                            data-role="modal"
                                                            data-src="#premium-modal"
                                                            onclick="return false"
                                                            href="terms-and-conditions-8#"
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

                                    <div class="control" id="control_edit_wizard_newsletters">
                                        <label for="input_edit_wizard_newsletters"> Do you send email newsletters to your users? </label>

                                        <div class="field">
                                            <div class="radio">
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_newsletters_1" type="radio" name="newsletters" value="1" />
                                                    <label for="input_edit_wizard_newsletters_1"> Yes, users can opt to receive email newsletters from us. </label>
                                                </div>
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_newsletters_0" type="radio" name="newsletters" value="0" />
                                                    <label for="input_edit_wizard_newsletters_0"> No, we don't send any newsletters. </label>
                                                </div>
                                            </div>
                                        </div>
                                        @error('newsletters')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="control actions">
                                        <input class="button submit next" type="submit" name="submit" value="Next" /> <a class="back" href="terms-and-conditions-6">Back</a>
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
            var policyWizardStep = 7,
                policyWizardStepKey = "marketing",
                policyPremium = 0,
                policyPremiumPaid = 0,
                policyWizardPlatforms = ["website"];
            var policyWizardMobile = 0;
        </script>
    </body>
</html>

@endsection
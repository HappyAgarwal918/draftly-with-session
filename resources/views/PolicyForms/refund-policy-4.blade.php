@extends('layouts.master')

@section('refund-policy-4')

<!DOCTYPE html>
<html lang="en">
    <head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<script async="" src="{{ asset ('assets/js/app.js')}}" charset="UTF-8" crossorigin="*"></script>
<script async="" src="{{ asset ('assets/js/default.js')}}" charset="UTF-8" crossorigin="*"></script>
<script async="" src="{{ asset ('assets/js/gtm.js')}}"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    window.dataLayer.push({ stVar3: 1 }, { event: "policiesWizard", eventCategory: "refund policy wizard", eventAction: "next step", eventLabel: "step 03 - products" });
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
<title>Create Return and Refund Policy [Trial options]</title>
<meta name="description" content="Create professional return and refund policy tailored specifically for your website and business in minutes with our easy to use online wizard." />
<script src="{{ asset ('assets/js/1611587689.js')}}"></script>
<style>
    @media print {
        #ghostery-tracker-tally {
            display: none !important;
        }
    }
</style>
<script src="{{ asset ('assets/js/refund.min.js')}}"></script>
<meta property="og:image" content="uploads/p/h/7/g/1y9eg2ur9hegs3x1s2nd.png" />
<meta name="twitter:image" content="uploads/p/h/7/g/1y9eg2ur9hegs3x1s2nd.png" />
        <link href="{{ asset ('assets/css/new.css')}}" rel="stylesheet" type="text/css" />
        <script src="{{ asset('assets/js/tawk.js')}}"></script>
    </head>
    <body class="guest create policies_wizard_refund index">
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NS2X6F" height="0" width="0" style="display: none; visibility: hidden;"></iframe></noscript>
        <div class="section sub-hero">
            <div class="container">
                <div class="row">
                    <div class="col-ms-12">
                        <h1>Trial options</h1>
                    </div>
                </div>
            </div>
        </div>

        <div id="container">
            <div class="container">
                <div class="row">
                    <div id="content" class="col-ms-12">
                        <div class="plugin-policies wizard refund step4 step_onlinetrials">
                            <div class="row">
                                <div class="col-ms-12">
                                    <div class="progress green stripes">
                                        <div class="bar" style="width: 42.857142857143%;">
                                            <div class="position">42%</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <form action="{{url('/refund-policy-5')}}" method="post">
                                @csrf
                                <input type="hidden" name="csrf_token" value="c25077aa4a946cd8673eb455e99992cc" />
                                <fieldset>
                                    <div class="control" id="control_edit_wizard_trials">
                                        <label for="input_edit_wizard_trials"> Do you offer free trials for your online membership or services? </label>

                                        <div class="field">
                                            <div class="radio">
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_trials_1" type="radio" name="trials" value="1" />
                                                    <label for="input_edit_wizard_trials_1"> Yes, we offer free trials so customers can try the service before buying. </label>
                                                </div>
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_trials_0" type="radio" name="trials" value="0" /> <label for="input_edit_wizard_trials_0"> No, services are not available for trial. </label>
                                                </div>
                                            </div>
                                        </div>
                                        @error('trials')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="control hidden" id="control_edit_wizard_trials_days">
                                        <label for="input_edit_wizard_trials_days"> How many days do trial accounts expire after? </label>

                                        <div class="field">
                                            <select class="select" id="input_edit_wizard_trials_days" name="trials_days">
                                                <option value="" selected="selected">Select</option>
                                                <option value="1">1 day</option>
                                                <option value="3">3 days</option>
                                                <option value="7">7 days</option>
                                                <option value="14">14 days</option>
                                                <option value="30">30 days</option>
                                                <option value="60">60 days</option>
                                                <option value="90">90 days</option>
                                                <option value="180">180 days</option>
                                                <option value="365">365 days</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="control hidden" id="control_edit_wizard_trials_functional">
                                        <label for="input_edit_wizard_trials_functional"> Are trial accounts fully functional? </label>

                                        <div class="field">
                                            <div class="radio">
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_trials_functional_1" type="radio" name="trials_functional" value="1" />
                                                    <label for="input_edit_wizard_trials_functional_1"> Yes, trial accounts are without any limitations. </label>
                                                </div>
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_trials_functional_0" type="radio" name="trials_functional" value="0" />
                                                    <label for="input_edit_wizard_trials_functional_0"> No, trial accounts have some limitations. </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="control actions">
                                        <input class="button submit next" type="submit" name="submit" value="Next" /> <a class="back" href="refund-policy-3">Back</a>
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
                policyWizardStepKey = "onlinetrials",
                policyPremium = 0,
                policyPremiumPaid = 0,
                policyWizardPlatforms = ["website"];
            var policyWizardMobile = 0;
        </script>
    </body>
</html>
@endsection
@extends('layouts.master')

@section('refund-policy-5')

<!DOCTYPE html>
<html lang="en">
    <head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<script async="" src="{{ asset ('assets/js/app.js')}}" charset="UTF-8" crossorigin="*"></script>
<script async="" src="{{ asset ('assets/js/default.js')}}" charset="UTF-8" crossorigin="*"></script>
<script async="" src="{{ asset ('assets/js/gtm.js')}}"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    window.dataLayer.push({ stVar3: 1 }, { event: "policiesWizard", eventCategory: "refund policy wizard", eventAction: "next step", eventLabel: "step 04 - onlinetrials" });
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
<title>Create Return and Refund Policy [Refund terms]</title>
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
                        <h1>Refund terms</h1>
                    </div>
                </div>
            </div>
        </div>

        <div id="container">
            <div class="container">
                <div class="row">
                    <div id="content" class="col-ms-12">
                        <div class="plugin-policies wizard refund step5 step_onlinerefunds">
                            <div class="row">
                                <div class="col-ms-12">
                                    <div class="progress green stripes">
                                        <div class="bar" style="width: 57.142857142857%;">
                                            <div class="position">57%</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <form action="{{url('/refund-policy-6')}}" method="post">
                                @csrf
                                <input type="hidden" name="csrf_token" value="c25077aa4a946cd8673eb455e99992cc" />
                                <fieldset>
                                    <div class="control" id="control_edit_wizard_accept">
                                        <label for="input_edit_wizard_accept"> Do you offer refunds? </label>

                                        <div class="field">
                                            <div class="radio">
                                                <div class="item"><input class="radio" id="input_edit_wizard_accept_1" type="radio" name="accept" value="1" /> <label for="input_edit_wizard_accept_1"> Yes, we offer refunds. </label></div>
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_accept_0" type="radio" name="accept" value="0" />
                                                    <label for="input_edit_wizard_accept_0"> No, we don't issue any refunds, all purchases are final. </label>
                                                </div>
                                            </div>
                                        </div>
                                        @error('accept')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="control hidden" id="control_edit_wizard_days">
                                        <label for="input_edit_wizard_days"> How many days do customers have to ask for a refund? </label>

                                        <div class="field">
                                            <select class="select" id="input_edit_wizard_days" name="days">
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

                                    <div class="control hidden" id="control_edit_wizard_money_back">
                                        <label for="input_edit_wizard_money_back"> Do you offer money back guarantee? </label>

                                        <div class="field">
                                            <div class="radio">
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_money_back_1" type="radio" name="money_back" value="1" />
                                                    <label for="input_edit_wizard_money_back_1"> Yes, we have a "no questions asked" money back guarantee. </label>
                                                </div>
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_money_back_0" type="radio" name="money_back" value="0" />
                                                    <label for="input_edit_wizard_money_back_0">
                                                        No, certain conditions must be met.
                                                        <a
                                                            class="premium-help gtm-cta"
                                                            data-event-label="premium question"
                                                            data-role="modal"
                                                            data-src="#premium-modal"
                                                            onclick="return false"
                                                            href="refund-policy-6#"
                                                        >
                                                            Premium
                                                        </a>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="control hidden" id="control_edit_wizard_conditions">
                                        <label for="input_edit_wizard_conditions"> What conditions must be met to qualify for a refund? </label>

                                        <div class="field">
                                            <div class="checkbox">
                                                <div class="item">
                                                    <input class="checkbox" id="input_edit_wizard_conditions_account" type="checkbox" name="conditions[]" value="account" />
                                                    <label for="input_edit_wizard_conditions_account"> Customer's account must be in good standing </label>
                                                </div>
                                                <div class="item">
                                                    <input class="checkbox" id="input_edit_wizard_conditions_unused_online" type="checkbox" name="conditions[]" value="unused_online" />
                                                    <label for="input_edit_wizard_conditions_unused_online"> Service must not be used </label>
                                                </div>
                                                <div class="item">
                                                    <input class="checkbox" id="input_edit_wizard_conditions_corrupt" type="checkbox" name="conditions[]" value="corrupt" />
                                                    <label for="input_edit_wizard_conditions_corrupt"> Service malfunctions or doesn't work as described </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="control hidden" id="control_edit_wizard_refuse">
                                        <label for="input_edit_wizard_refuse"> Do you reserve the right not to issue a refund if the above conditions are not met? </label>

                                        <div class="field">
                                            <div class="radio">
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_refuse_1" type="radio" name="refuse" value="1" />
                                                    <label for="input_edit_wizard_refuse_1"> Yes, we may decline a refund if the above conditions are not met. </label>
                                                </div>
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_refuse_0" type="radio" name="refuse" value="0" /> <label for="input_edit_wizard_refuse_0"> No, we will issue a refund regardless. </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="control hidden" id="control_edit_wizard_prorate">
                                        <label for="input_edit_wizard_prorate"> Do you issue prorated refunds? </label>

                                        <div class="field">
                                            <div class="radio">
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_prorate_1" type="radio" name="prorate" value="1" />
                                                    <label for="input_edit_wizard_prorate_1"> Yes, we refund only for the unused portion of the service. </label>
                                                </div>
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_prorate_0" type="radio" name="prorate" value="0" />
                                                    <label for="input_edit_wizard_prorate_0"> No, the amount paid is refunded in full regardless of usage. </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="control actions">
                                        <input class="button submit next" type="submit" name="submit" value="Next" /> <a class="back" href="refund-policy-4">Back</a>
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
            var policyWizardStep = 5,
                policyWizardStepKey = "onlinerefunds",
                policyPremium = 0,
                policyPremiumPaid = 0,
                policyWizardPlatforms = ["website"];
            var policyWizardMobile = 0;
        </script>
    </body>
</html>
@endsection
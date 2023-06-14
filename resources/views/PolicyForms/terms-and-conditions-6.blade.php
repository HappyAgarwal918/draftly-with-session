@extends('layouts.master')

@section('terms-and-conditions-6')

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <script async="" src="{{ asset ('assets/js/app.js')}}" charset="UTF-8" crossorigin="*"></script>
        <script async="" src="{{ asset ('assets/js/default.js')}}" charset="UTF-8" crossorigin="*"></script>
        <script async="" src="{{ asset ('assets/js/gtm.js')}}"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            window.dataLayer.push({ stVar3: 1 }, { event: "policiesWizard", eventCategory: "terms and conditions wizard", eventAction: "next step", eventLabel: "step 05 - postings" });
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
        <title>Create Terms and Conditions [Products and services]</title>
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
                        <h1>Products and services</h1>
                    </div>
                </div>
            </div>
        </div>

        <div id="container">
            <div class="container">
                <div class="row">
                    <div id="content" class="col-ms-12">
                        <div class="plugin-policies wizard tos step6 step_products">
                            <div class="row">
                                <div class="col-ms-12">
                                    <div class="progress green stripes">
                                        <div class="bar" style="width: 50%;">
                                            <div class="position">50%</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <form action="{{url('/terms-and-conditions-7')}}" method="post">
                                @csrf
                                <input type="hidden" name="csrf_token" value="c25077aa4a946cd8673eb455e99992cc" />
                                <fieldset>
                                    <div class="control" id="control_edit_wizard_sell">
                                        <label for="input_edit_wizard_sell"> Do you currently sell or plan on selling products or services on your website? </label>

                                        <div class="field">
                                            <div class="radio">
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_sell_1" type="radio" name="sell" value="1" />
                                                    <label for="input_edit_wizard_sell_1">
                                                        Yes, we sell products or services or plan to sell in the future.
                                                        <a
                                                            class="premium-help gtm-cta"
                                                            data-event-label="premium question"
                                                            data-role="modal"
                                                            data-src="#premium-modal"
                                                            onclick="return false"
                                                            href="terms-and-conditions-7#"
                                                        >
                                                            Premium
                                                        </a>
                                                    </label>
                                                </div>
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_sell_0" type="radio" name="sell" value="0" /> <label for="input_edit_wizard_sell_0"> No, we do not and will not sell anything. </label>
                                                </div>
                                            </div>
                                        </div>
                                        @error('sell')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="control hidden" id="control_edit_wizard_remote">
                                        <label for="input_edit_wizard_remote"> Do you offer third party products or services? </label>

                                        <div class="field">
                                            <div class="radio">
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_remote_1" type="radio" name="remote" value="1" />
                                                    <label for="input_edit_wizard_remote_1"> Yes, we offer products or services provided by third party companies. </label>
                                                </div>
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_remote_0" type="radio" name="remote" value="0" />
                                                    <label for="input_edit_wizard_remote_0"> No, all products and services are provided by us. </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="control hidden" id="control_edit_wizard_types">
                                        <label for="input_edit_wizard_types"> What types of products or services do you offer? </label>

                                        <div class="field">
                                            <div class="checkbox">
                                                <div class="item">
                                                    <input class="checkbox" id="input_edit_wizard_types_tangible" type="checkbox" name="types[]" value="tangible" />
                                                    <label for="input_edit_wizard_types_tangible"> Tangible products (items that you ship to customers) </label>
                                                </div>
                                                <div class="item">
                                                    <input class="checkbox" id="input_edit_wizard_types_digital" type="checkbox" name="types[]" value="digital" />
                                                    <label for="input_edit_wizard_types_digital"> Digital products (item customers download) </label>
                                                </div>
                                                <div class="item">
                                                    <input class="checkbox" id="input_edit_wizard_types_online" type="checkbox" name="types[]" value="online" />
                                                    <label for="input_edit_wizard_types_online"> Online services (non-downloadable services) </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="control hidden" id="control_edit_wizard_trials">
                                        <label for="input_edit_wizard_trials"> Do you offer free product or service trials? </label>

                                        <div class="field">
                                            <div class="radio">
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_trials_1" type="radio" name="trials" value="1" />
                                                    <label for="input_edit_wizard_trials_1"> Yes, we offer free trials so customers can try the products and services first. </label>
                                                </div>
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_trials_0" type="radio" name="trials" value="0" />
                                                    <label for="input_edit_wizard_trials_0"> No, products and services are not available for trial. </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="control hidden" id="control_edit_wizard_recurring">
                                        <label for="input_edit_wizard_recurring"> Do you offer recurring subscriptions? </label>

                                        <div class="field">
                                            <div class="radio">
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_recurring_1" type="radio" name="recurring" value="1" />
                                                    <label for="input_edit_wizard_recurring_1"> Yes, users can sign up for recurring services or membership. </label>
                                                </div>
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_recurring_0" type="radio" name="recurring" value="0" />
                                                    <label for="input_edit_wizard_recurring_0"> No, we don't offer recurring services. </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="control hidden" id="control_edit_wizard_auto_renewal">
                                        <label for="input_edit_wizard_auto_renewal"> Do your offer auto renewal for subscription payments? </label>

                                        <div class="field">
                                            <div class="radio">
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_auto_renewal_1" type="radio" name="auto_renewal" value="1" />
                                                    <label for="input_edit_wizard_auto_renewal_1"> Yes, users can sign up for automatic payments for subscribed services. </label>
                                                </div>
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_auto_renewal_0" type="radio" name="auto_renewal" value="0" />
                                                    <label for="input_edit_wizard_auto_renewal_0"> No, users have to enter payment information each time they want to make a payment. </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="control hidden" id="control_edit_wizard_uptime_guarantee">
                                        <label for="input_edit_wizard_uptime_guarantee"> Do you provide uptime guarantee? </label>

                                        <div class="field">
                                            <div class="radio">
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_uptime_guarantee_1" type="radio" name="uptime_guarantee" value="1" />
                                                    <label for="input_edit_wizard_uptime_guarantee_1"> Yes, we guarantee the availability of the website. </label>
                                                </div>
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_uptime_guarantee_0" type="radio" name="uptime_guarantee" value="0" />
                                                    <label for="input_edit_wizard_uptime_guarantee_0"> No, we don't offer such guarantee. </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="control hidden" id="control_edit_wizard_downtime_compensation">
                                        <label for="input_edit_wizard_downtime_compensation"> Do you offer compensation for the time the service is unavailable? </label>

                                        <div class="field">
                                            <div class="radio">
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_downtime_compensation_1" type="radio" name="downtime_compensation" value="1" />
                                                    <label for="input_edit_wizard_downtime_compensation_1"> Yes, we may offer free credits or free service to clients based on the downtime duration. </label>
                                                </div>
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_downtime_compensation_0" type="radio" name="downtime_compensation" value="0" />
                                                    <label for="input_edit_wizard_downtime_compensation_0"> No, we don't offer compensation. </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="control hidden" id="control_edit_wizard_payments_method">
                                        <label for="input_edit_wizard_payments_method"> How do your users pay you? </label>

                                        <div class="field">
                                            <div class="checkbox">
                                                <div class="item">
                                                    <input class="checkbox" id="input_edit_wizard_payments_method_remote" type="checkbox" name="payments_method[]" value="remote" />
                                                    <label for="input_edit_wizard_payments_method_remote"> Users can pay via remote third party services (such as PayPal, Stripe, etc). </label>
                                                </div>
                                                <div class="item">
                                                    <input class="checkbox" id="input_edit_wizard_payments_method_local" type="checkbox" name="payments_method[]" value="local" />
                                                    <label for="input_edit_wizard_payments_method_local"> Users can pay directly on the website. </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="control hidden" id="control_edit_wizard_payments_security">
                                        <label for="input_edit_wizard_payments_security"> Do you have security measures in place to protect payment information? </label>

                                        <div class="field">
                                            <div class="radio">
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_payments_security_1" type="radio" name="payments_security" value="1" />
                                                    <label for="input_edit_wizard_payments_security_1"> Yes, we’ve taken all the necessary measures to keep sensitive payment information secure. </label>
                                                </div>
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_payments_security_0" type="radio" name="payments_security" value="0" />
                                                    <label for="input_edit_wizard_payments_security_0"> No, some of the sensitive payment information may not be processed or stored securely (not recommended). </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="control hidden" id="control_edit_wizard_guarantees">
                                        <label for="input_edit_wizard_guarantees"> Do you guarantee the following? </label>

                                        <div class="field">
                                            <div class="checkbox">
                                                <div class="item">
                                                    <input class="checkbox" id="input_edit_wizard_guarantees_availability" type="checkbox" name="guarantees[]" value="availability" />
                                                    <label for="input_edit_wizard_guarantees_availability"> Product availability </label>
                                                </div>
                                                <div class="item">
                                                    <input class="checkbox" id="input_edit_wizard_guarantees_description" type="checkbox" name="guarantees[]" value="description" />
                                                    <label for="input_edit_wizard_guarantees_description"> Accuracy of product descriptions </label>
                                                </div>
                                                <div class="item">
                                                    <input class="checkbox" id="input_edit_wizard_guarantees_price" type="checkbox" name="guarantees[]" value="price" />
                                                    <label for="input_edit_wizard_guarantees_price"> Accuracy of product prices </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="control hidden" id="control_edit_wizard_rights">
                                        <label for="input_edit_wizard_rights"> Do you reserve the right to do the following? </label>

                                        <div class="field">
                                            <div class="checkbox">
                                                <div class="item">
                                                    <input class="checkbox" id="input_edit_wizard_rights_change" type="checkbox" name="rights[]" value="change" />
                                                    <label for="input_edit_wizard_rights_change"> Change products or services at any time </label>
                                                </div>
                                                <div class="item">
                                                    <input class="checkbox" id="input_edit_wizard_rights_prices" type="checkbox" name="rights[]" value="prices" />
                                                    <label for="input_edit_wizard_rights_prices"> Change prices at any time </label>
                                                </div>
                                                <div class="item">
                                                    <input class="checkbox" id="input_edit_wizard_rights_cancel" type="checkbox" name="rights[]" value="cancel" />
                                                    <label for="input_edit_wizard_rights_cancel"> Refuse or cancel orders </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="control actions">
                                        <input class="button submit next" type="submit" name="submit" value="Next" /> <a class="back" href="terms-and-conditions-5">Back</a>
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
                policyWizardStepKey = "products",
                policyPremium = 0,
                policyPremiumPaid = 0,
                policyWizardPlatforms = ["website"];
            var policyWizardMobile = 0;
        </script>
    </body>
</html>


@endsection
@extends('layouts.master')

@section('privacy-policy-7')

<!DOCTYPE html>
<html lang="en">
    <head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<script async="" src="{{ asset ('assets/js/app.js')}}" charset="UTF-8" crossorigin="*"></script>
<script async="" src="{{ asset ('assets/js/default.js')}}" charset="UTF-8" crossorigin="*"></script>
<script async="" src="{{ asset ('assets/js/gtm.js')}}"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    window.dataLayer.push({ stVar3: 3 });
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
<title>Create Privacy Policy [Products and services]</title>
<meta name="description" content="Create professional privacy policy tailored specifically for your website and business in minutes with our easy to use online wizard." />
<script src="{{ asset ('assets/js/1611587689.js')}}"></script>
<style>
    @media print {
        #ghostery-tracker-tally {
            display: none !important;
        }
    }
</style>
<script src="{{ asset ('assets/js/privacy.min.js')}}"></script>
<meta property="og:image" content="uploads/p/h/7/g/1y9eg2ur9hegs3x1s2nd.png" />
<meta name="twitter:image" content="uploads/p/h/7/g/1y9eg2ur9hegs3x1s2nd.png" />
        <link href="{{ asset ('assets/css/new.css')}}" rel="stylesheet" type="text/css" />
        <script src="{{ asset('assets/js/tawk.js')}}"></script>
    </head>
    <body class="guest create policies_wizard_privacy index">
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
                        <div class="plugin-policies wizard privacy step7 step_products">
                            <div class="row">
                                <div class="col-ms-12">
                                    <div class="progress green stripes">
                                        <div class="bar" style="width: 46.153846153846%;">
                                            <div class="position">46%</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <form action="{{url('/privacy-policy-8')}}" method="post">
                                @csrf
                                <input type="hidden" name="csrf_token" value="2d386224a2f0a048d9ac443ea79dd00f" />
                                <fieldset>
                                    <div class="control" id="control_edit_wizard_sell">
                                        <label for="input_edit_wizard_sell"> Do you currently sell or plan on selling products or services in your mobile app? </label>

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
                                                            href="privacy-policy-8#"
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

                                    <div class="control hidden" id="control_edit_wizard_remote_share">
                                        <label for="input_edit_wizard_remote_share"> Do you share user information with these third parties? </label>

                                        <div class="field">
                                            <div class="radio">
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_remote_share_1" type="radio" name="remote_share" value="1" />
                                                    <label for="input_edit_wizard_remote_share_1"> Yes, we may share certain information in order to provide the product or service. </label>
                                                </div>
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_remote_share_0" type="radio" name="remote_share" value="0" />
                                                    <label for="input_edit_wizard_remote_share_0"> No, we don't share anything. </label>
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
                                                    <label for="input_edit_wizard_payments_method_local"> Users can pay directly in the mobile app. </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="control hidden" id="control_edit_wizard_payments_store">
                                        <label for="input_edit_wizard_payments_store"> Do you store any sensitive payment information? </label>

                                        <div class="field">
                                            <div class="radio">
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_payments_store_1" type="radio" name="payments_store" value="1" />
                                                    <label for="input_edit_wizard_payments_store_1"> Yes, we may store payment information for future purchases or recurring billing (such as credit card numbers or tokens). </label>
                                                </div>
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_payments_store_0" type="radio" name="payments_store" value="0" />
                                                    <label for="input_edit_wizard_payments_store_0"> No, we don't store any sensitive payment information. </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="control hidden" id="control_edit_wizard_payments_security">
                                        <label for="input_edit_wizard_payments_security"> Do you have security measures in place to protect sensitive payment information? </label>

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

                                    <div class="control actions">
                                        <input class="button submit next" type="submit" name="submit" value="Next" /> <a class="back" href="privacy-policy-6">Back</a>
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
                policyWizardStepKey = "products",
                policyPremium = 0,
                policyPremiumPaid = 0,
                policyWizardPlatforms = ["mobile"];
            var policyWizardMobile = 1;
        </script>
    </body>
</html>


@endsection
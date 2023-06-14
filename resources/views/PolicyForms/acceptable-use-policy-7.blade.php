@extends('layouts.master')

@section('acceptable-use-policy-7')


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
         <script type="text/javascript" async="" src="{{ asset('assets/js/bat.js')}}"></script>
        <script async="" src="{{ asset('assets/js/app.js')}}" charset="UTF-8" crossorigin="*"></script>
        <script async="" src="{{ asset('assets/js/default.js')}}" charset="UTF-8" crossorigin="*"></script>
        <script type="text/javascript" async="" src="{{ asset('assets/js/analytics.js')}}"></script>
        <script type="text/javascript" async="" src="{{ asset('assets/js/js.js')}}"></script>
        <script type="text/javascript" async="" src="{{ asset('assets/js/analytics.js')}}"></script>
        <script async="" src="{{ asset('assets/js/gtm.js')}}"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            window.dataLayer.push({ stVar1: 4 }, { stVar3: 4 }, { event: "policiesWizard", eventCategory: "acceptable use policy wizard", eventAction: "next step", eventLabel: "step 06 - files" });
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
        <title>Create Acceptable Use Policy [Emails and newsletters]</title>
        <meta name="description" content="Create professional an acceptable use policy tailored specifically for your website and business in minutes with our easy to use online wizard." />
        <script src="{{ asset('assets/js/1611587689.js')}}"></script>
        <script src="{{ asset('assets/js/aup.min.js')}}"></script>
        <meta property="og:image" content="uploads/p/h/7/g/1y9eg2ur9hegs3x1s2nd.png" />
        <meta name="twitter:image" content="uploads/p/h/7/g/1y9eg2ur9hegs3x1s2nd.png" />
        <link href="{{ asset ('assets/css/new.css')}}" rel="stylesheet" type="text/css" />
        <script src="{{ asset('assets/js/tawk.js')}}"></script>
        
    </head>
    <body class="guest create policies_wizard_aup index">
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NS2X6F" height="0" width="0" style="display: none; visibility: hidden;"></iframe></noscript>
        <div class="section sub-hero">
            <div class="container">
                <div class="row">
                    <div class="col-ms-12">
                        <h1>Emails and newsletters</h1>
                    </div>
                </div>
            </div>
        </div>

        <div id="container">
            <div class="container">
                <div class="row">
                    <div id="content" class="col-ms-12">
                        <div class="plugin-policies wizard aup step7 step_emails">
                            <div class="row">
                                <div class="col-ms-12">
                                    <div class="progress green stripes">
                                        <div class="bar" style="width: 54.545454545455%;">
                                            <div class="position">54%</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <form action="{{url('/acceptable-use-policy-8?form-id='.$id)}}" method="post">
                                @csrf
                                <input type="hidden" name="csrf_token" value="41ae6a3e19e805208bd9b9c81333ec20" />
                                <fieldset>
                                    <div class="control" id="control_edit_wizard_send">
                                        <label for="input_edit_wizard_send"> Can your mobile app be used for sending out emails or push notifications? </label>

                                        <div class="field">
                                            <div class="radio">
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_send_1" type="radio" name="send" value="1" /> <label for="input_edit_wizard_send_1"> Yes, users can send emails or push notificatins. </label>
                                                </div>
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_send_0" type="radio" name="send" value="0" />
                                                    <label for="input_edit_wizard_send_0"> No, users can't send any emails or push notifications. </label>
                                                </div>
                                            </div>
                                        </div>
                                        @error('send')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="control hidden" id="control_edit_wizard_bulk">
                                        <label for="input_edit_wizard_bulk"> Do you allow sending messages in bulk (such as newsletters)? </label>

                                        <div class="field">
                                            <div class="radio">
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_bulk_1" type="radio" name="bulk" value="1" />
                                                    <label for="input_edit_wizard_bulk_1">
                                                        Yes, we allow sending messages in bulk.
                                                        <a
                                                            class="premium-help gtm-cta"
                                                            data-event-label="premium question"
                                                            data-role="modal"
                                                            data-src="#premium-modal"
                                                            onclick="return false"
                                                            href="acceptable-use-policy-7#"
                                                        >
                                                            Premium
                                                        </a>
                                                    </label>
                                                </div>
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_bulk_0" type="radio" name="bulk" value="0" /> <label for="input_edit_wizard_bulk_0"> No, bulk messages are not allowed. </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="control hidden" id="control_edit_wizard_purchased">
                                        <label for="input_edit_wizard_purchased"> Do you allow sending messages to purchased email addresses? </label>

                                        <div class="field">
                                            <div class="radio">
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_purchased_1" type="radio" name="purchased" value="1" />
                                                    <label for="input_edit_wizard_purchased_1"> Yes, users can send messages in bulk regardless of how they obtained their email addresses. </label>
                                                </div>
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_purchased_0" type="radio" name="purchased" value="0" />
                                                    <label for="input_edit_wizard_purchased_0"> No, purchased email addresses are not allowed. </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="control hidden" id="control_edit_wizard_suspend">
                                        <label for="input_edit_wizard_suspend"> Will you suspend or terminate user's account if they send unsolicited bulk messages or spam? </label>

                                        <div class="field">
                                            <div class="radio">
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_suspend_1" type="radio" name="suspend" value="1" />
                                                    <label for="input_edit_wizard_suspend_1"> Yes, we will suspend or terminate user's account. </label>
                                                </div>
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_suspend_0" type="radio" name="suspend" value="0" />
                                                    <label for="input_edit_wizard_suspend_0"> No, we won't suspend or terminate user's account. </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="control actions">
                                        <input class="button submit next" type="submit" name="submit" value="Next" /> <a class="back" href="acceptable-use-policy-6">Back</a>
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
            var Tawk_API = Tawk_API || {};
            var Tawk_LoadStart = new Date();
            (function () {
                var s1 = document.createElement("script"),
                    s0 = document.getElementsByTagName("script")[0];
                s1.async = true;
                s1.src = "https://embed.tawk.to/5ca3de986bba46052800f023/default";
                s1.charset = "UTF-8";
                s1.setAttribute("crossorigin", "*");
                s0.parentNode.insertBefore(s1, s0);
            })();
        </script>
        <script>
            var policyWizardStep = 7,
                policyWizardStepKey = "emails",
                policyPremium = 0,
                policyPremiumPaid = 0,
                policyWizardPlatforms = ["mobile"];
            var policyWizardMobile = 1;
        </script>
        
    </body>
</html>
@endsection
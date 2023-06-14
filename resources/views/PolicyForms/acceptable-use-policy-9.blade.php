@extends('layouts.master')

@section('acceptable-use-policy-9')


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
            window.dataLayer.push({ stVar1: 4 }, { stVar3: 4 }, { event: "policiesWizard", eventCategory: "acceptable use policy wizard", eventAction: "next step", eventLabel: "step 08 - copyrights" });
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
        <title>Create Acceptable Use Policy [Policy enforcement]</title>
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
                        <h1>Policy enforcement</h1>
                    </div>
                </div>
            </div>
        </div>

        <div id="container">
            <div class="container">
                <div class="row">
                    <div id="content" class="col-ms-12">
                        <div class="plugin-policies wizard aup step9 step_enforce">
                            <div class="row">
                                <div class="col-ms-12">
                                    <div class="progress green stripes">
                                        <div class="bar" style="width: 72.727272727273%;">
                                            <div class="position">72%</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <form action="{{url('/acceptable-use-policy-10?form-id='.$id)}}" method="post">
                                @csrf
                                <input type="hidden" name="csrf_token" value="d97a3b952f3296277b92b3941aa18e69" />
                                <fieldset>
                                    <div class="control" id="control_edit_wizard_suspend">
                                        <label for="input_edit_wizard_suspend"> Will you suspend or terminate user's account if they’re found in violation of this policy? </label>

                                        <div class="field">
                                            <div class="radio">
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_suspend_1" type="radio" name="suspendd" value="1" />
                                                    <label for="input_edit_wizard_suspend_1"> Yes, we will suspend or terminate user's account if they violated this policy. </label>
                                                </div>
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_suspend_0" type="radio" name="suspendd" value="0" />
                                                    <label for="input_edit_wizard_suspend_0"> No, we won't suspend or terminate user's account. </label>
                                                </div>
                                            </div>
                                        </div>
                                        @error('suspendd')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="control hidden" id="control_edit_wizard_backup">
                                        <label for="input_edit_wizard_backup"> Will you provide a backup of user’s content if they have been suspended or terminated? </label>

                                        <div class="field">
                                            <div class="radio">
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_backup_1" type="radio" name="backup" value="1" />
                                                    <label for="input_edit_wizard_backup_1"> Yes, we may provide a backup of user's data if requested. </label>
                                                </div>
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_backup_0" type="radio" name="backup" value="0" /> <label for="input_edit_wizard_backup_0"> No, we won't provide any backups. </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="control hidden" id="control_edit_wizard_backup_fee">
                                        <label for="input_edit_wizard_backup_fee"> Will you charge a fee for providing a backup of user’s content? </label>

                                        <div class="field">
                                            <div class="radio">
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_backup_fee_1" type="radio" name="backup_fee" value="1" />
                                                    <label for="input_edit_wizard_backup_fee_1">
                                                        Yes, we may impose a penalty fee before we provide a backup of user's content.
                                                        <a
                                                            class="premium-help gtm-cta"
                                                            data-event-label="premium question"
                                                            data-role="modal"
                                                            data-src="#premium-modal"
                                                            onclick="return false"
                                                            href="acceptable-use-policy#"
                                                        >
                                                            Premium
                                                        </a>
                                                    </label>
                                                </div>
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_backup_fee_0" type="radio" name="backup_fee" value="0" />
                                                    <label for="input_edit_wizard_backup_fee_0"> No, we'll provide a backup free of charge. </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="control hidden" id="control_edit_wizard_action">
                                        <label for="input_edit_wizard_action"> Do you reserve the right to take additional actions with respect to policy enforcement? </label>

                                        <div class="field">
                                            <div class="radio">
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_action_1" type="radio" name="actions" value="1" />
                                                    <label for="input_edit_wizard_action_1">
                                                        Yes, we may take additional actions such as recovering the costs and expenses caused by the offending user.
                                                        <a
                                                            class="premium-help gtm-cta"
                                                            data-event-label="premium question"
                                                            data-role="modal"
                                                            data-src="#premium-modal"
                                                            onclick="return false"
                                                            href="acceptable-use-policy#"
                                                        >
                                                            Premium
                                                        </a>
                                                    </label>
                                                </div>
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_action_0" type="radio" name="actions" value="0" />
                                                    <label for="input_edit_wizard_action_0"> No, we won't be taking any additional actions. </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="control actions">
                                        <input class="button submit next" type="submit" name="submit" value="Next" /> <a class="back" href="acceptable-use-policy-8">Back</a>
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
            var policyWizardStep = 9,
                policyWizardStepKey = "enforce",
                policyPremium = 0,
                policyPremiumPaid = 0,
                policyWizardPlatforms = ["mobile"];
            var policyWizardMobile = 1;
        </script>
       
    </body>
</html>
@endsection
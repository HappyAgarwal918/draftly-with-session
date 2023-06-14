@extends('layouts.master')

@section('acceptable-use-policy-10')


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
            window.dataLayer.push({ stVar1: 4 }, { stVar3: 4 }, { event: "policiesWizard", eventCategory: "acceptable use policy wizard", eventAction: "next step", eventLabel: "step 09 - enforce" });
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
        <title>Create Acceptable Use Policy [Contact information]</title>
        <meta name="description" content="Create professional an acceptable use policy tailored specifically for your website and business in minutes with our easy to use online wizard." />
        <script src="{{ asset('assets/js/1611587689.js')}}"></script>
        <script src="{{ asset('assets/js/aup.min.js')}}"></script>
        <meta property="og:image" content="uploads/p/h/7/g/1y9eg2ur9hegs3x1s2nd.png" />
        <meta name="twitter:image" content="uploads/p/h/7/g/1y9eg2ur9hegs3x1s2nd.png" />
        <link href="{{ asset ('assets/css/new.css')}}" rel="stylesheet" type="text/css" />
    </head>
    <body class="guest create policies_wizard_aup index">
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NS2X6F" height="0" width="0" style="display: none; visibility: hidden;"></iframe></noscript>
        <div class="section sub-hero">
            <div class="container">
                <div class="row">
                    <div class="col-ms-12">
                        <h1>Contact information</h1>
                    </div>
                </div>
            </div>
        </div>

        <div id="container">
            <div class="container">
                <div class="row">
                    <div id="content" class="col-ms-12">
                        <div class="plugin-policies wizard aup step10 step_contacts">
                            <div class="row">
                                <div class="col-ms-12">
                                    <div class="progress green stripes">
                                        <div class="bar" style="width: 81.818181818182%;">
                                            <div class="position">81%</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <form action="{{url('/acceptable-use-policy-11?form-id='.$id)}}" method="post">
                                @csrf
                                <input type="hidden" name="csrf_token" value="d97a3b952f3296277b92b3941aa18e69" />
                                <fieldset>
                                    <div class="control" id="control_edit_wizard_contacts">
                                        <label for="input_edit_wizard_contact"> How can users contact you regarding this policy? </label>

                                        <div class="field">
                                            <div class="checkbox">                                               
                                                <div class="item">
                                                    <input class="checkbox" id="input_edit_wizard_contacts_form" type="checkbox" name="contacts[]" value="form" /> <label for="input_edit_wizard_contacts_form"> Contact form </label>
                                                </div>
                                                <div class="item">
                                                    <input class="checkbox" id="input_edit_wizard_contacts_email" type="checkbox" name="contacts[]" value="email" /> <label for="input_edit_wizard_contacts_email"> Email address </label>
                                                </div>
                                                <div class="item">
                                                    <input class="checkbox" id="input_edit_wizard_contacts_address" type="checkbox" name="contacts[]" value="address" />
                                                    <label for="input_edit_wizard_contacts_address"> Business address </label>
                                                </div>

                                            </div>
                                        </div>
                                        @error('contacts')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="control hidden" id="control_edit_wizard_contact_form" style="display: none;">
                                        <label for="input_edit_wizard_contact_form"> What is the URL of your contact form? </label>

                                        <div class="field">
                                            <input class="text col-ms-12 col-md-6" id="input_edit_wizard_contact_form" maxlength="255" type="text" name="contact_form" value="" />

                                            <span class="help">e.g. https://www.website.com/contact/</span>
                                        </div>
                                    </div>

                                    <div class="control hidden" id="control_edit_wizard_contact_email" style="display: none;">
                                        <label for="input_edit_wizard_contact_form"> What is your email address? </label>

                                        <div class="field">
                                            <input class="text col-ms-12 col-md-6" id="input_edit_wizard_contact_email" maxlength="128" type="text" name="contact_email" value="" />

                                            <span class="help">abuse@website.com</span>
                                        </div>
                                    </div>

                                    <div class="control hidden" id="control_edit_wizard_contact_address" style="display: none;">
                                        <label for="input_edit_wizard_contact_form"> What is your business address? </label>

                                        <div class="field">
                                            <input class="text col-ms-12 col-md-6" id="input_edit_wizard_contact_address" maxlength="255" type="text" name="contact_address" value="" />

                                            <span class="help">e.g. 23 First St, New York, NY, 10010, USA</span>
                                        </div>
                                    </div>

                                    <div class="control actions">
                                        <input class="button submit next" type="submit" name="submit" value="Next" /> <a class="back" href="acceptable-use-policy-9">Back</a>
                                    </div>
                                </fieldset>

                                <input type="hidden" name="do_wizard" value="1" />
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<script src="{{ asset('assets/js/aup.min.js')}}"></script>
        <script>
            var policyWizardStep = 10,
                policyWizardStepKey = "contacts",
                policyPremium = 0,
                policyPremiumPaid = 0,
                policyWizardPlatforms = ["mobile"];
            var policyWizardMobile = 1;
        </script>
        
    </body>
</html>
@endsection
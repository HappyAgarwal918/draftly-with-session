@extends('layouts.master')

@section('dmca-policy-6')


<!DOCTYPE html>

<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
         <script async="" src="{{asset ('assets/js/app.js')}}" charset="UTF-8" crossorigin="*"></script>
         <script async="" src="{{asset ('assets/js/default.js')}}"  charset="UTF-8" crossorigin="*"></script>
         <script async="" src="{{asset ('assets/js/gtm.js')}}"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            window.dataLayer.push({ stVar3: 4 }, { event: "policiesWizard", eventCategory: "DMCA policy wizard", eventAction: "next step", eventLabel: "step 05 - prevent" });
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
        <title>Create Digital Millennium Copyright Act Policy [Contact information]</title>
        <meta name="description" content="Create a professional digital millennium copyright act policy tailored specifically for your website in minutes with our easy to use online wizard." />
         <script src="{{asset ('assets/js/1611587689.js')}}"></script>
        <script src="{{ asset ('assets/js/dmca.min.js')}}"></script>
        <style>
            @media print {
                #ghostery-tracker-tally {
                    display: none !important;
                }
            }
        </style>
        
        <meta property="og:image" content="uploads/p/h/7/g/1y9eg2ur9hegs3x1s2nd.png" />
        <meta name="twitter:image" content="uploads/p/h/7/g/1y9eg2ur9hegs3x1s2nd.png" />
        <link href="{{ asset ('assets/css/new.css')}}" rel="stylesheet" type="text/css" />
        <script src="{{ asset('assets/js/tawk.js')}}"></script>
    </head>
        <body class="guest create policies_wizard_dmca index">
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
                        <div class="plugin-policies wizard dmca step6 step_contacts">
                            <div class="row">
                                <div class="col-ms-12">
                                    <div class="progress green stripes">
                                        <div class="bar" style="width: 71.428571428571%;">
                                            <div class="position">71%</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <form action="{{url('/dmca-policy-7')}}" method="post">
                                @csrf
                                <input type="hidden" name="csrf_token" value="6071931df85446bcd56d68fcf74f050c" />
                                <fieldset>
                                    <div class="control" id="control_edit_wizard_contacts">
                                        <label for="input_edit_wizard_contact"> Where can users send their copyright infringement reports? </label>

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

                                    <div class="control hidden" id="control_edit_wizard_contact_form" style="display: block;">
                                        <label for="input_edit_wizard_contact_form"> What is the URL of your contact form? </label>

                                        <div class="field">
                                            <input class="text col-ms-12 col-md-6" id="input_edit_wizard_contact_form" maxlength="255" type="text" name="contact_form" value="" />

                                            <span class="help">e.g. https://www.website.com/contact/</span>
                                        </div>
                                    </div>

                                    <div class="control hidden" id="control_edit_wizard_contact_email" style="display: block;">
                                        <label for="input_edit_wizard_contact_form"> What is your email address? </label>

                                        <div class="field">
                                            <input class="text col-ms-12 col-md-6" id="input_edit_wizard_contact_email" maxlength="128" type="text" name="contact_email" value="" />

                                            <span class="help">legal@website.com</span>
                                        </div>
                                    </div>

                                    <div class="control hidden" id="control_edit_wizard_contact_address" style="display: block;">
                                        <label for="input_edit_wizard_contact_form"> What is your business address? </label>

                                        <div class="field">
                                            <input class="text col-ms-12 col-md-6" id="input_edit_wizard_contact_address" maxlength="255" type="text" name="contact_address" value="" />

                                            <span class="help">e.g. 23 First St, New York, NY, 10010, USA</span>
                                        </div>
                                    </div>

                                    <div class="control actions">
                                        <input class="button submit next" type="submit" name="submit" value="Next" /> <a class="back" href="dmca-policy-5">Back</a>
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
                policyWizardStepKey = "contacts",
                policyPremium = 0,
                policyPremiumPaid = 0,
                policyWizardPlatforms = ["mobile"];
            var policyWizardMobile = 1;
        </script>
    </body>
</html>
@endsection
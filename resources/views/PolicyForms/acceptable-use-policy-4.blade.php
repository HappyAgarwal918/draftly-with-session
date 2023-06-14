@extends('layouts.master')

@section('acceptable-use-policy-4')


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <script type="text/javascript" async="" src="{{ asset('assets/js/bat.js')}}"></script>
        <script type="text/javascript" async="" src="{{ asset('assets/js/analytics.js')}}"></script>
        <script async="" src="{{ asset('assets/js/app.js')}}" charset="UTF-8" crossorigin="*"></script>
        <script async="" src="{{ asset('assets/js/default.js')}}" charset="UTF-8" crossorigin="*"></script>
        <script type="text/javascript" async="" src="{{ asset('assets/js/js.js')}}"></script>
        <script type="text/javascript" async="" src="{{ asset('assets/js/analytics.js')}}"></script>
        <script async="" src="{{ asset('assets/js/gtm.js')}}"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            window.dataLayer.push({ stVar1: 4 }, { stVar3: 4 }, { event: "policiesWizard", eventCategory: "acceptable use policy wizard", eventAction: "next step", eventLabel: "step 03 - users" });
        </script>
        <link rel="dns-prefetch" href="https://www.google-analytics.com/" />
        <link rel="dns-prefetch" href="https://www.googletagmanager.com/" />
        <link rel="dns-prefetch" href="https://bat.bing.com/" />
        <link rel="dns-prefetch" href="https://embed.tawk.to/" />
        <script>
            (function (w, d, s, l, i) {
                w[l] = w[l] || [];
                w[l].push({ "gtm.start": new Date().getTime(), event: "{{ asset('assets/js/gtm.js')}}" });
                var f = d.getElementsByTagName(s)[0],
                    j = d.createElement(s),
                    dl = l != "dataLayer" ? "&l=" + l : "";
                j.async = true;
                j.src = "https://www.googletagmanager.com/gtm.js?id=" + i + dl;
                f.parentNode.insertBefore(j, f);
            })(window, document, "script", "dataLayer", "GTM-NS2X6F");
        </script>
        <link rel="alternate" type="application/rss+xml" title="Feed" href="feed" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Create Acceptable Use Policy [User contributions]</title>
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
                        <h1>User contributions</h1>
                    </div>
                </div>
            </div>
        </div>

        <div id="container">
            <div class="container">
                <div class="row">
                    <div id="content" class="col-ms-12">
                        <div class="plugin-policies wizard aup step4 step_postings">
                            <div class="row">
                                <div class="col-ms-12">
                                    <div class="progress green stripes">
                                        <div class="bar" style="width: 27.272727272727%;">
                                            <div class="position">27%</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <form action="{{url('/acceptable-use-policy-5?form-id='.$id)}}" method="post">
                            	@csrf
                                <input type="hidden" name="csrf_token" value="41ae6a3e19e805208bd9b9c81333ec20" />
                                <fieldset>
                                    <div class="control" id="control_edit_wizard_publish">
                                        <label for="input_edit_wizard_publish"> Can users publish anything in your mobile app (comments, images, videos, etc)? </label>

                                        <div class="field">
                                            <div class="radio">
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_publish_1" type="radio" name="publish" value="1" />
                                                    <label for="input_edit_wizard_publish_1"> Yes, users can submit and publish their own content. </label>
                                                </div>
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_publish_0" type="radio" name="publish" value="0" /> <label for="input_edit_wizard_publish_0"> No, users can't publish anything. </label>
                                                </div>
                                            </div>
                                        </div>
                                        @error('publish')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="control hidden" id="control_edit_wizard_objectionable">
                                        <label for="input_edit_wizard_objectionable"> Do you allow objectionable content in your mobile app? </label>

                                        <div class="field">
                                            <div class="radio">
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_objectionable_1" type="radio" name="objectionable" value="1" />
                                                    <label for="input_edit_wizard_objectionable_1"> Yes, we may allow objectionable content depending on its nature. </label>
                                                </div>
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_objectionable_0" type="radio" name="objectionable" value="0" />
                                                    <label for="input_edit_wizard_objectionable_0"> No, objectionable content is not allowed. </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="control hidden" id="control_edit_wizard_remove">
                                        <label for="input_edit_wizard_remove"> Will you be willing to edit or remove objectionable content if it’s reported? </label>

                                        <div class="field">
                                            <div class="radio">
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_remove_1" type="radio" name="remove" value="1" />
                                                    <label for="input_edit_wizard_remove_1"> Yes, we may remove objectionable content depending on its nature. </label>
                                                </div>
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_remove_0" type="radio" name="remove" value="0" />
                                                    <label for="input_edit_wizard_remove_0"> No, we're not in a position to determine whether certain content is objectionable. </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="control hidden" id="control_edit_wizard_adult">
                                        <label for="input_edit_wizard_adult"> Do you have or allow content meant only for adult audience in your mobile app? </label>

                                        <div class="field">
                                            <div class="radio">
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_adult_1" type="radio" name="adult" value="1" /> <label for="input_edit_wizard_adult_1"> Yes, adult content may be present. </label>
                                                </div>
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_adult_0" type="radio" name="adult" value="0" /> <label for="input_edit_wizard_adult_0"> No, adult content is not allowed. </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="control actions">
                                        <input class="button submit next" type="submit" name="submit" value="Next" /> <a class="back" href="acceptable-use-policy-3">Back</a>
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
                policyWizardStepKey = "postings",
                policyPremium = 0,
                policyPremiumPaid = 0,
                policyWizardPlatforms = ["mobile"];
            var policyWizardMobile = 1;
        </script>
        
    </body>
</html>
@endsection
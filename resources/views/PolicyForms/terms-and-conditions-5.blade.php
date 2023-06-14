@extends('layouts.master')

@section('terms-and-conditions-5')

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <script async="" src="{{ asset ('assets/js/app.js')}}" charset="UTF-8" crossorigin="*"></script>
        <script async="" src="{{ asset ('assets/js/default.js')}}" charset="UTF-8" crossorigin="*"></script>
        <script async="" src="{{ asset ('assets/js/gtm.js')}}"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            window.dataLayer.push({ stVar3: 1 }, { event: "policiesWizard", eventCategory: "terms and conditions wizard", eventAction: "next step", eventLabel: "step 04 - audience" });
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
        <title>Create Terms and Conditions [User contributions]</title>
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
                        <h1>User contributions</h1>
                    </div>
                </div>
            </div>
        </div>

        <div id="container">
            <div class="container">
                <div class="row">
                    <div id="content" class="col-ms-12">
                        <div class="plugin-policies wizard tos step5 step_postings">
                            <div class="row">
                                <div class="col-ms-12">
                                    <div class="progress green stripes">
                                        <div class="bar" style="width: 40%;">
                                            <div class="position">40%</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <form action="{{url('/terms-and-conditions-6')}}" method="post">
                                @csrf
                                <input type="hidden" name="csrf_token" value="c25077aa4a946cd8673eb455e99992cc" />
                                <fieldset>
                                    <div class="control" id="control_edit_wizard_publish">
                                        <label for="input_edit_wizard_publish"> Can users publish anything on your website (comments, images, videos, etc)? </label>

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

                                    <div class="control hidden" id="control_edit_wizard_monitor">
                                        <label for="input_edit_wizard_monitor"> Do you monitor and review user submitted content? </label>

                                        <div class="field">
                                            <div class="radio">
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_monitor_1" type="radio" name="monitor_a" value="1" />
                                                    <label for="input_edit_wizard_monitor_1"> Yes, all or some of the submitted content is reviewed before being made public. </label>
                                                </div>
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_monitor_0" type="radio" name="monitor_a" value="0" />
                                                    <label for="input_edit_wizard_monitor_0"> No, submitted content becomes public immediately. </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="control hidden" id="control_edit_wizard_marketing">
                                        <label for="input_edit_wizard_marketing"> Do you reserve the right to use submitted content for commercial, marketing or any similar purposes? </label>

                                        <div class="field">
                                            <div class="radio">
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_marketing_1" type="radio" name="marketing" value="1" />
                                                    <label for="input_edit_wizard_marketing_1"> Yes, content can be used for commercial or marketing purposes. </label>
                                                </div>
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_marketing_0" type="radio" name="marketing" value="0" />
                                                    <label for="input_edit_wizard_marketing_0"> No, content will not be used for any of these purposes. </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="control hidden" id="control_edit_wizard_terminate">
                                        <label for="input_edit_wizard_terminate"> Do you reserve the right to modify or remove user submitted content? </label>

                                        <div class="field">
                                            <div class="radio">
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_terminate_1" type="radio" name="terminate_a" value="1" />
                                                    <label for="input_edit_wizard_terminate_1"> Yes, content can be modified or removed if it's found abusive or violates the terms. </label>
                                                </div>
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_terminate_0" type="radio" name="terminate_a" value="0" />
                                                    <label for="input_edit_wizard_terminate_0"> No, content will never get modified or removed. </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="control hidden" id="control_edit_wizard_backup">
                                        <label for="input_edit_wizard_backup"> Do you backup user submitted content? </label>

                                        <div class="field">
                                            <div class="radio">
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_backup_1" type="radio" name="backup" value="1" />
                                                    <label for="input_edit_wizard_backup_1"> Yes, all data is backed up on a regular basis to prevent loss. </label>
                                                </div>
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_backup_0" type="radio" name="backup" value="0" /> <label for="input_edit_wizard_backup_0"> No, we don't backup anything. </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="control hidden" id="control_edit_wizard_backup_guarantee">
                                        <label for="input_edit_wizard_backup_guarantee"> Do you guarantee data safety to your users? </label>

                                        <div class="field">
                                            <div class="radio">
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_backup_guarantee_1" type="radio" name="backup_guarantee" value="1" />
                                                    <label for="input_edit_wizard_backup_guarantee_1"> Yes, we restore backups automatically in the event of the hardware failure. </label>
                                                </div>
                                                <div class="item">
                                                    <input class="radio" id="input_edit_wizard_backup_guarantee_0" type="radio" name="backup_guarantee" value="0" />
                                                    <label for="input_edit_wizard_backup_guarantee_0"> No, users must make their own backups to ensure data safety. </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="control actions">
                                        <input class="button submit next" type="submit" name="submit" value="Next" /> <a class="back" href="terms-and-conditions-4">Back</a>
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
                policyWizardStepKey = "postings",
                policyPremium = 0,
                policyPremiumPaid = 0,
                policyWizardPlatforms = ["website"];
            var policyWizardMobile = 0;
        </script>
    </body>
</html>

@endsection
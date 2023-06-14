@extends('layouts.master')

@section('terms-and-conditions-8')

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <script async="" src="{{ asset ('assets/js/app.js')}}" charset="UTF-8" crossorigin="*"></script>
        <script async="" src="{{ asset ('assets/js/default.js')}}" charset="UTF-8" crossorigin="*"></script>
        <script async="" src="{{ asset ('assets/js/gtm.js')}}"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            window.dataLayer.push({ stVar3: 1 }, { event: "policiesWizard", eventCategory: "terms and conditions wizard", eventAction: "next step", eventLabel: "step 07 - marketing" });
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
        <title>Create Terms and Conditions [Additional clauses]</title>
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
        

       @if (count($errors) > 0)
         <div class = "alert alert-danger">
            <ul>
               @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
               @endforeach
            </ul>
         </div>
      @endif

      


        <div class="section sub-hero">
            <div class="container">
                <div class="row">
                    <div class="col-ms-12">
                        <h1>Additional clauses</h1>
                    </div>
                </div>
            </div>
        </div>

        <div id="container">
            <div class="container">
                <div class="row">
                    <div id="content" class="col-ms-12">
                        <div class="plugin-policies wizard tos step8 step_clauses">
                            <div class="row">
                                <div class="col-ms-12">
                                    <div class="progress green stripes">
                                        <div class="bar" style="width: 70%;">
                                            <div class="position">70%</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <form action="{{url('/terms-and-conditions-9')}}" method="post">
                                @csrf
                                <input type="hidden" name="csrf_token" value="c25077aa4a946cd8673eb455e99992cc" />
                                <fieldset>
                                    <div class="control" id="control_edit_wizard_misc_clauses">
                                        <label for="input_edit_wizard_misc_clauses"> What additional clauses would you like to include? </label>

                                        <div class="field">
                                            <div class="checkbox">
                                                <div class="item">
                                                    <input class="checkbox" id="input_edit_wizard_misc_clauses_assignment" type="checkbox" name="misc_clauses[]" value="assignment" />
                                                    <label for="input_edit_wizard_misc_clauses_assignment">
                                                        Assignment
                                                        <a
                                                            class="question-help"
                                                            data-role="modal"
                                                            data-type="html"
                                                            data-src="Assignment clause sets forth whether or not the other party will be allowed to transfer their rights or obligations under a contract to someone else."
                                                            onclick="return false"
                                                            href="terms-and-conditions-9#"
                                                        >
                                                            &nbsp;
                                                        </a>
                                                        <a
                                                            class="premium-help gtm-cta"
                                                            data-event-label="premium question"
                                                            data-role="modal"
                                                            data-src="#premium-modal"
                                                            onclick="return false"
                                                            href="terms-and-conditions-9#"
                                                        >
                                                            Premium
                                                        </a>
                                                    </label>
                                                </div>
                                                <div class="item">
                                                    <input class="checkbox" id="input_edit_wizard_misc_clauses_warranty" type="checkbox" name="misc_clauses[]" value="warranty" />
                                                    <label for="input_edit_wizard_misc_clauses_warranty">
                                                        Disclaimer of warranty
                                                        <a
                                                            class="question-help"
                                                            data-role="modal"
                                                            data-type="html"
                                                            data-src='Disclaimer of warranty states that you limit certain types of warranties and the services, products or content are offered on a "as is" basis.'
                                                            onclick="return false"
                                                            href="terms-and-conditions-9#"
                                                        >
                                                            &nbsp;
                                                        </a>
                                                        <a
                                                            class="premium-help gtm-cta"
                                                            data-event-label="premium question"
                                                            data-role="modal"
                                                            data-src="#premium-modal"
                                                            onclick="return false"
                                                            href="terms-and-conditions-9#"
                                                        >
                                                            Premium
                                                        </a>
                                                    </label>
                                                </div>
                                                <div class="item">
                                                    <input class="checkbox" id="input_edit_wizard_misc_clauses_dispute" type="checkbox" name="misc_clauses[]" value="dispute" />
                                                    <label for="input_edit_wizard_misc_clauses_dispute">
                                                        Dispute resolution
                                                        <a
                                                            class="question-help"
                                                            data-role="modal"
                                                            data-type="html"
                                                            data-src="Dispute resolution clause sets out the mechanism for resolution of disputes between you and the other party."
                                                            onclick="return false"
                                                            href="terms-and-conditions-9#"
                                                        >
                                                            &nbsp;
                                                        </a>
                                                    </label>
                                                </div>
                                                <div class="item">
                                                    <input class="checkbox" id="input_edit_wizard_misc_clauses_indemnification" type="checkbox" name="misc_clauses[]" value="indemnification" />
                                                    <label for="input_edit_wizard_misc_clauses_indemnification">
                                                        Indemnification
                                                        <a
                                                            class="question-help"
                                                            data-role="modal"
                                                            data-type="html"
                                                            data-src="Indemnification clause states that the other party will have to cover your losses if they do something that causes you harm or decide to sue you."
                                                            onclick="return false"
                                                            href="terms-and-conditions-9#"
                                                        >
                                                            &nbsp;
                                                        </a>
                                                    </label>
                                                </div>
                                                <div class="item">
                                                    <input class="checkbox" id="input_edit_wizard_misc_clauses_ip" type="checkbox" name="misc_clauses[]" value="ip" />
                                                    <label for="input_edit_wizard_misc_clauses_ip">
                                                        Intellectual property rights
                                                        <a
                                                            class="question-help"
                                                            data-role="modal"
                                                            data-type="html"
                                                            data-src="Intellectual property clause states that all services, products and content made available to the other party are owned by you and cannot be copied, transferred, etc. without your direct consent."
                                                            onclick="return false"
                                                            href="terms-and-conditions-9#"
                                                        >
                                                            &nbsp;
                                                        </a>
                                                    </label>
                                                </div>
                                                <div class="item">
                                                    <input class="checkbox" id="input_edit_wizard_misc_clauses_liability" type="checkbox" name="misc_clauses[]" value="liability" />
                                                    <label for="input_edit_wizard_misc_clauses_liability">
                                                        Limitation of liability
                                                        <a
                                                            class="question-help"
                                                            data-role="modal"
                                                            data-type="html"
                                                            data-src="Limitation of liability clause helps you reduce or eliminate the potential for direct, consequential, incidental and indirect damages should there be a breach of contract by either you or the other party."
                                                            onclick="return false"
                                                            href="terms-and-conditions-9#"
                                                        >
                                                            &nbsp;
                                                        </a>
                                                    </label>
                                                </div>
                                                <div class="item">
                                                    <input class="checkbox" id="input_edit_wizard_misc_clauses_prohibit" type="checkbox" name="misc_clauses[]" value="prohibit" />
                                                    <label for="input_edit_wizard_misc_clauses_prohibit">
                                                        Prohibited uses
                                                        <a
                                                            class="question-help"
                                                            data-role="modal"
                                                            data-type="html"
                                                            data-src="Prohibited uses clause includes some of the common prohibited uses of your services, products or content, such as for unlawful purposes, infringing on someone else&#39;s rights, distributing viruses, etc."
                                                            onclick="return false"
                                                            href="terms-and-conditions-9#"
                                                        >
                                                            &nbsp;
                                                        </a>
                                                    </label>
                                                </div>
                                                <div class="item">
                                                    <input class="checkbox" id="input_edit_wizard_misc_clauses_severability" type="checkbox" name="misc_clauses[]" value="severability" />
                                                    <label for="input_edit_wizard_misc_clauses_severability">
                                                        Severability
                                                        <a
                                                            class="question-help"
                                                            data-role="modal"
                                                            data-type="html"
                                                            data-src="Severability clause states that if parts of the contract are held to be illegal or otherwise unenforceable (for example due to the other party&#39;s local laws), the remainder of the contract should still apply."
                                                            onclick="return false"
                                                            href="terms-and-conditions-9#"
                                                        >
                                                            &nbsp;
                                                        </a>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="control actions">
                                        <input class="button submit next" type="submit" name="submit" value="Next" /> <a class="back" href="terms-and-conditions-7">Back</a>
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
            var policyWizardStep = 8,
                policyWizardStepKey = "clauses",
                policyPremium = 0,
                policyPremiumPaid = 0,
                policyWizardPlatforms = ["website"];
            var policyWizardMobile = 0;
        </script>
    </body>
</html>

@endsection
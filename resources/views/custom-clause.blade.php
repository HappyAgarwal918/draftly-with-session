@extends('layouts.master')

@section('custom-clause')

<!DOCTYPE html>
<html lang="en">
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <script async="" src="{{ asset ('assets/js/app.js')}}" charset="UTF-8" crossorigin="*"></script>
    <script type="text/javascript" async="" src="{{ asset ('assets/js/bat.js')}}"></script>
    <script type="text/javascript" async="" src="{{ asset ('assets/js/analytics.js')}}"></script>
    <script type="text/javascript" async="" src="{{ asset ('assets/js/analytics.js')}}"></script>
    <script async="" src="{{ asset ('assets/js/default.js')}}" charset="UTF-8" crossorigin="*"></script>
    <script async="" src="{{ asset ('assets/js/gtm.js')}}"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            window.dataLayer.push({ stVar3: 1 }, { isLoggedIn: "true" });
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
        <link rel="alternate" type="application/rss+xml" title="Feed" href="/blog/feed" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Premium cookie policy additional clauses - majcohealth.com</title>
        <meta name="description" content="" />
        <link href="{{ asset ('assets/css/1615565436.css')}}" rel="stylesheet" type="text/css" />
        <script src="{{ asset ('assets/js/1615565436')}}"></script>
        <style>
            @media print {
                #ghostery-tracker-tally {
                    display: none !important;
                }
            }
        </style>
        <meta property="og:image" content="/uploads/p/h/7/g/1y9eg2ur9hegs3x1s2nd.png" />
        <meta name="twitter:image" content="/uploads/p/h/7/g/1y9eg2ur9hegs3x1s2nd.png" />
        <link href="{{ asset ('assets/css/new.css')}}" rel="stylesheet" type="text/css" />
        <script src="{{ asset('assets/js/tawk.js')}}"></script>
        <style type="text/css">
            @media (min-width: 768px){
                nav#site-nav ul#main-menu {
                    margin-top: 0px;
                }
            }
        </style>
    </head>
    <body class="session policies clauses">
        <?php $id = $_GET['form-id'];?>

        <div class="section sub-hero">
            <div class="container">
                <div class="row">
                    <div class="col-ms-12">
                        <h1>Cookie policy</h1>
                    </div>
                </div>
            </div>
        </div>

    <div id="container">
        <div class="container">
            <div class="row">
                <div id="content" class="col-ms-12">
                    <div class="plugin-policies clauses-manage">
                        <h2>Create custom clauses</h2>
                        <p>
                            Is your policy missing something? Do you have special requirements or something else you would like to add? Use the form below to add custom clauses to your policy.
                        </p>

                        <form id="add_custom_clause" action="custom-clause-home?form-id=<?php echo $id ?>" method="POST">
                            @csrf
                            <input type="hidden" name="csrf_token" value="" />
                            <fieldset>
                                <div class="control" id="input_edit_clause_title">
                                    <label for="input_edit_clause_title"> Title </label>

                                    <div class="field">
                                        <input class="text col-ms-12 col-md-6" id="input_edit_clause_title" maxlength="255" type="text" name="title" value="" />

                                        <span class="help"></span>
                                    </div>
                                </div>

                                <div class="control" id="input_edit_clause_text">
                                    <label for="input_edit_clause_text"> Clause </label>

                                    <div class="field">
                                        <textarea class="textarea input-height-md" data-images-embed-disable="0" data-images-upload-disable="0" id="input_edit_clause_text" name="text" cols="60" rows="10"></textarea>
                                    </div>
                                </div>
                                <div class="field" style="display: none;">
                                        <input class="text col-ms-12 col-md-6" maxlength="255" type="text" name="unique_id" value="<?php echo $id; ?>" />
                                </div>
                                <div class="control actions">
                                    <input class="button submit" type="submit" name="submit" value="Save" /><!--  <a class="cancel" href="">Back to policy</a> -->
                                    <a class="button" href="custom-clause-home?form-id=<?php echo $id ?>">View Clause</a>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
@endsection

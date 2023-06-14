@extends('layouts.master')

@section('resend')


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <script type="text/javascript" async="" src="{{ asset('assets/js/bat.js')}}"></script>
        <script type="text/javascript" async="" src="{{ asset('assets/js/analytics.js')}}"></script>
        <script type="text/javascript" async="" src="{{ asset('assets/js/js.js')}}"></script>
        <script type="text/javascript" async="" src="{{ asset('assets/js/analytics.js')}}"></script>
        <script async="" src="{{ asset('assets/js/app.js')}}" charset="UTF-8" crossorigin="*"></script>
        <script async="" src="{{ asset('assets/js/default.js')}}" charset="UTF-8" crossorigin="*"></script>
        <script async="" src="{{ asset('assets/js/gtm.js')}}"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            window.dataLayer.push({ stVar1: 4 }, { stVar3: 4 });
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
        <link rel="alternate" type="application/rss+xml" title="WebsitePolicies.com Feed" href="feed" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Resend activation email</title>
        <meta name="description" content="" />
        <script src="{{ asset('assets/js/1611587689.js')}}"></script>
        <meta property="og:image" content="uploads/p/h/7/g/1y9eg2ur9hegs3x1s2nd.png" />
        <meta name="twitter:image" content="uploads/p/h/7/g/1y9eg2ur9hegs3x1s2nd.png" />
        <meta name="robots" content="noindex,follow" />
        <link href="{{ asset ('assets/css/new.css')}}" rel="stylesheet" type="text/css" />
        <script src="{{ asset('assets/js/tawk.js')}}"></script>
    </head>
    <body class="guest users users_login resend">
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NS2X6F" height="0" width="0" style="display: none; visibility: hidden;"></iframe></noscript>


        <div class="section sub-hero">
            <div class="container">
                <div class="row">
                    <div class="col-ms-12">
                        <h1>Resend activation email</h1>
                    </div>
                </div>
            </div>
        </div>

        <div id="container">
            <div class="container">
                <div class="row">
                    <div id="content" class="col-ms-12">
                        <div class="plugin-users signup-sendhash">
                            <form action="resend" method="post">
                                <input type="hidden" name="csrf_token" value="305d9a803adda0ac0a9bb3b4c171bd5f" />
                                <fieldset class="grid">
                                    <div class="control" id="input_row_user_sendhash_email">
                                        <label for="input_edit_user_sendhash_email"> Email <span class="required">*</span> </label>

                                        <div class="field">
                                            <input class="text input-md" id="input_edit_user_sendhash_email" maxlength="255" type="text" name="email" value="" />
                                        </div>
                                    </div>

                                    <div class="control actions"><input class="button submit" type="submit" name="submit" value="Continue" /> <a class="cancel" href="login">Cancel</a></div>
                                </fieldset>

                                <input type="hidden" name="do_send_hash" value="1" />
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
@endsection
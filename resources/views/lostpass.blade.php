@extends('layouts.master')

@section('lostpass')


<!DOCTYPE html>
<!-- saved from url=(0052)lostpass -->
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <script type="text/javascript" async="" src="{{ asset('assets/js/bat.js')}}"></script>
        <script type="text/javascript" async="" src="{{ asset('assets/js/analytics.js')}}"></script>
        <script async="" src="{{ asset('assets/js/app.js')}}" charset="UTF-8" crossorigin="*"></script>
        <script type="text/javascript" async="" src="{{ asset('assets/js/js.js')}}"></script>
        <script type="text/javascript" async="" src="{{ asset('assets/js/analytics.js')}}"></script>
        <script async="" src="{{ asset('assets/js/default.js')}}" charset="UTF-8" crossorigin="*"></script>
        <script async="" src="{{ asset('assets/js/gtm.js')}}"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            window.dataLayer.push({ stVar1: 3 }, { stVar3: 1 });
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
        <link rel="alternate" type="application/rss+xml" title="WebsitePolicies.com Feed" href="blog/feed" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Lost password</title>
        <meta name="description" content="" />
        <script src="{{ asset('assets/js/1611587689.js')}}"></script>
        <meta property="og:image" content="uploads/p/h/7/g/1y9eg2ur9hegs3x1s2nd.png" />
        <meta name="twitter:image" content="uploads/p/h/7/g/1y9eg2ur9hegs3x1s2nd.png" />
        <meta name="robots" content="noindex,follow" />
        <style type="text/css">
            @keyframes tawkMaxOpen {
                0% {
                    opacity: 0;
                    transform: translate(0, 30px);
                }
                to {
                    opacity: 1;
                    transform: translate(0, 0px);
                }
            }
            @-moz-keyframes tawkMaxOpen {
                0% {
                    opacity: 0;
                    transform: translate(0, 30px);
                }
                to {
                    opacity: 1;
                    transform: translate(0, 0px);
                }
            }
            @-webkit-keyframes tawkMaxOpen {
                0% {
                    opacity: 0;
                    transform: translate(0, 30px);
                }
                to {
                    opacity: 1;
                    transform: translate(0, 0px);
                }
            }
            #mPNScdn-1612182950540 {
                outline: none !important;
                visibility: visible !important;
                resize: none !important;
                box-shadow: none !important;
                overflow: visible !important;
                background: none !important;
                opacity: 1 !important;
                filter: alpha(opacity=100) !important;
                -ms-filter: progid:DXImageTransform.Microsoft.Alpha(Opacity1) !important;
                -moz-opacity: 1 !important;
                -khtml-opacity: 1 !important;
                top: auto !important;
                right: 10px !important;
                bottom: 0px !important;
                left: auto !important;
                position: fixed !important;
                border: 0 !important;
                min-height: 0 !important;
                min-width: 0 !important;
                max-height: none !important;
                max-width: none !important;
                padding: 0 !important;
                margin: 0 !important;
                -moz-transition-property: none !important;
                -webkit-transition-property: none !important;
                -o-transition-property: none !important;
                transition-property: none !important;
                transform: none !important;
                -webkit-transform: none !important;
                -ms-transform: none !important;
                width: auto !important;
                height: auto !important;
                display: none !important;
                z-index: 2000000000 !important;
                background-color: transparent !important;
                cursor: auto !important;
                float: none !important;
                border-radius: unset !important;
                pointer-events: auto !important;
            }
            #Dy9HYaD-1612182950541.open {
                animation: tawkMaxOpen 0.25s ease !important;
            }
        </style>
    </head>
    <body class="guest users users_login lostpass">
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NS2X6F" height="0" width="0" style="display: none; visibility: hidden;"></iframe></noscript>
      

        <div class="section sub-hero">
            <div class="container">
                <div class="row">
                    <div class="col-ms-12">
                        <h1>Lost password</h1>
                    </div>
                </div>
            </div>
        </div>

        <div id="container">
            <div class="container">
                <div class="row">
                    <div id="content" class="col-ms-12">
                        <div class="plugin-users login-lostpass">
                            <form action="lostpass" method="post">
                                <input type="hidden" name="csrf_token" value="a732294e16954ec95c32a88135b956ae" />
                                <fieldset class="grid">
                                    <div class="control" id="input_row_user_lostpass_email">
                                        <label for="input_edit_user_lostpass_email"> Email <span class="required">*</span> </label>

                                        <div class="field">
                                            <input class="text input-md" id="input_edit_user_lostpass_email" maxlength="255" type="text" name="email" value="" />
                                        </div>
                                    </div>

                                    <div class="control actions"><input class="button submit" type="submit" name="submit" value="Continue" /> <a class="cancel" href="login">Cancel</a></div>
                                </fieldset>

                                <input type="hidden" name="do_lost_pass" value="1" />
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

       
    </body>
</html>
@endsection
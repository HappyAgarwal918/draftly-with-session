<!DOCTYPE html>
<html lang="en" class="cb-customize-desktop chrome">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <script async="" src="{{ asset('assets/js/gtm.js')}}"></script>
        <link href="{{ asset('assets/css/1615565436.css')}}" rel="stylesheet" type="text/css" />
        <script src="{{ asset('assets/js/1615565436.js')}}"></script>
        <script defer="" src="{{ asset('assets/js/cookieconsent.min.js')}}"></script>
        <script defer="" src="{{ asset('assets/js/clipboard.min.js')}}"></script>
        <script defer="" src="{{ asset('assets/js/spectrum.min.js')}}"></script>
        <script defer="" src="{{ asset('assets/js/cookiesconsent.min.js')}}"></script>
        <link href="{{ asset('assets/css/spectrum.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/cookieconsent.min.css')}}" rel="stylesheet" type="text/css" />
        <script src="{{ asset('assets/js/embed.js')}}" id="app-convertbox-script" async="" data-uuid="1d8ce409-0f9c-438e-9982-7a7af22a83ed"></script>
        <script src="{{ asset('assets/js/polyfill.min.js')}}"></script>
        <script src="{{ asset('assets/js/embed-core.js')}}"></script>
        <link href="{{ asset('assets/css/bars-preview.css')}}" rel="stylesheet" />
        <script>
            window.dataLayer = window.dataLayer || [];
            window.dataLayer.push({ stVar3: 3 });
        </script>
        <link rel="dns-prefetch" href="https://www.google-analytics.com/" />
        <link rel="dns-prefetch" href="https://www.googletagmanager.com/" />
        <link rel="dns-prefetch" href="https://bat.bing.com/" />
        <link rel="dns-prefetch" href="https://cdn.gumlet.com/" />
        <link rel="dns-prefetch" href="https://websitepolicies.gumlet.io/" />
        <link rel="dns-prefetch" href="https://app.convertbox.com/" />
        <link rel="dns-prefetch" href="https://cdn.convertbox.com/" />
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
        <meta name="description" content="Create a cookie consent banner to handle GDPR and EU cookie legislation using our lightweight and customizable JavaScript plug-in." />
        <meta property="og:image" content="/uploads/p/h/7/g/1y9eg2ur9hegs3x1s2nd.png" />
        <meta name="twitter:image" content="/uploads/p/h/7/g/1y9eg2ur9hegs3x1s2nd.png" />
        <link href="{{ asset ('assets/css/new.css')}}" rel="stylesheet" type="text/css" />
    </head>
    <body class="guest create policies_wizard_cookieconsent index">
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NS2X6F" height="0" width="0" style="display: none; visibility: hidden;"></iframe></noscript>

        <header id="header">
            <?php $logo = DB::table('logo')->where('id', 1)->first(); ?>
            <div class="container">
                <div class="row">
                    <div class="col-ms-12">
                        <a class="logo" href="/">
                            <img
                                width="216"
                                height="40"
                                alt="Draftly.org"
                                class="logo"
                                srcset="<?php echo $logo->featured_image; ?>"
                                src="<?php echo $logo->featured_image; ?>"
                            />
                        </a>
                        <nav id="site-nav">
                            <a class="menu-button main-menu-button collapsed navbar-toggler" data-mobilenav="main-menu"  type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="mobile-icon">Menu</span></a>
                            <ul id="main-menu">
                                <li class="out blog"><a href="blog">Blog</a></li>
                                <li class="out pricing"><a href="pricing">Pricing</a></li>
                                <li class="out policies"><a href="{{url('/home')}}">My policies</a></li>
                                <?php if(isset(auth()->user()->admin) && auth()->user()->admin == 1) { ?>
                                <li class="out policies"><a href="{{url('/admin/Dashboard')}}">Dashboard</a></li>
                                <?php } ?>
                                <li class="out dropdown account" data-dropdown="menu-account" data-dropdown-action="hover">
                                    <a href="#">My account</a>
                                    <ul style="display: none;" data-dropdown-menu="menu-account">
                                        <li class="settings"><a href="settings">Settings</a></li>
                                        <li class="logout"><a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </header>
        

        <div class="section sub-hero">
            <div class="container">
                <div class="row">
                    <div class="col-ms-12">
                        <h1>Create a cookie consent banner</h1>
                    </div>
                </div>
            </div>
        </div>

        <div id="container">
            <div class="container">
                <div class="row">
                    <div id="content" class="col-ms-12">
                        <div class="plugin-policies cookieconsent configure">
                            <p>
                                Comply with GDPR and EU cookie law with our free cookie consent banner plugin. Simply go through the steps below to customize it and copy the code to your site. Click on the "Preview" button at any time to
                                see how it looks.
                            </p>

                            <div class="header">
                                <h2>Configuration wizard</h2>
                                <a class="button preview" onclick="wpccPreviewShow();return false;" href="/create/cookie-consent-banner#">Click to preview</a>
                            </div>

                            <div class="steps">
                                <div class="step step1 position">
                                    <a onclick="toggleStep(1);return false;" class="toggler active" href="/create/cookie-consent-banner#">1. Position</a>
                                    <div class="panel">
                                        <div class="content">
                                            <p>Choose the display style of the cookie consent banner.</p>
                                            <ul class="display">
                                                <li class="display-tooltip active">
                                                    <a onclick="wpccPreviewSetDisplay(&#39;tooltip&#39;);return false;" title="Tooltip" href="/create/cookie-consent-banner#">
                                                        <span class="img"></span><span class="lbl">Tooltip</span>
                                                    </a>
                                                </li>
                                                <li class="display-bar">
                                                    <a onclick="wpccPreviewSetDisplay(&#39;bar&#39;);return false;" title="Bar" href="/create/cookie-consent-banner#">
                                                        <span class="img"></span><span class="lbl">Bar</span>
                                                    </a>
                                                </li>
                                            </ul>
                                            <p>Choose where you would like to display it.</p>
                                            <ul class="choices positions tooltip row">
                                                <li class="col-ms-6 col-sm-3 position-bottom-left active">
                                                    <a onclick="wpccPreviewSetPosition(&#39;bottom-left&#39;);return false;" title="Bottom left" href="/create/cookie-consent-banner#">
                                                        <span>Bottom left</span>
                                                    </a>
                                                </li>
                                                <li class="col-ms-6 col-sm-3 position-bottom-right">
                                                    <a onclick="wpccPreviewSetPosition(&#39;bottom-right&#39;);return false;" title="Bottom right" href="/create/cookie-consent-banner#">
                                                        <span>Bottom right</span>
                                                    </a>
                                                </li>
                                                <li class="col-ms-6 col-sm-3 position-top-left">
                                                    <a onclick="wpccPreviewSetPosition(&#39;top-left&#39;);return false;" title="Top left" href="/create/cookie-consent-banner#"><span>Top left</span></a>
                                                </li>
                                                <li class="col-ms-6 col-sm-3 position-top-right">
                                                <a onclick="wpccPreviewSetPosition(&#39;top-right&#39;);return false;" title="Top right" href="/create/cookie-consent-banner#"><span>Top right</span></a>
                                                </li>
                                            </ul>
                                            <ul class="choices positions bar row" style="display: none;">
                                                <li class="col-ms-6 col-sm-3 position-bottom">
                                                    <a onclick="wpccPreviewSetPosition(&#39;bottom&#39;);return false;" title="Bottom" href="/create/cookie-consent-banner#"><span>Bottom</span></a>
                                                </li>
                                                <li class="col-ms-6 col-sm-3 position-top">
                                                    <a onclick="wpccPreviewSetPosition(&#39;top&#39;);return false;" title="Top" href="/create/cookie-consent-banner#"><span>Top</span></a>
                                                </li>
                                                <li class="col-ms-6 col-sm-3 position-top-push">
                                                    <a onclick="wpccPreviewSetPosition(&#39;top-push&#39;);return false;" title="Pushdown top" href="/create/cookie-consent-banner#">
                                                        <span>Pushdown top</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="step step2 layout">
                                    <a onclick="toggleStep(2);return false;" class="toggler" href="/create/cookie-consent-banner#">2. Layout</a>
                                    <div class="panel" style="display: none;">
                                        <div class="content">
                                            <form action="/create/cookie-consent-banner" method="post">
                                                <input type="hidden" name="csrf_token" value="38de639830875fef870216fb6753377e" />
                                                <fieldset>
                                                    <div class="row">
                                                        <div class="col-ms-6 col-xs-3 col-sm-2 layout-border">
                                                            <div class="control">
                                                                <label for="input_wizard_layout_popup_border">
                                                                    Border
                                                                </label>
                                                                <div class="field">
                                                                    <select class="input-select" id="input_wizard_layout_popup_border" onchange="wpccPreviewSetBorder(this.value)" name="popup_border">
                                                                        <option value="none">None</option>
                                                                        <option value="thin" selected="selected">Thin</option>
                                                                        <option value="normal">Normal</option>
                                                                        <option value="thick">Thick</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-ms-6 col-xs-3 col-sm-2 layout-corners">
                                                            <div class="control">
                                                                <label for="input_wizard_layout_popup_corners">
                                                                    Corners
                                                                </label>
                                                                <div class="field">
                                                                    <select class="input-select" id="input_wizard_layout_popup_corners" onchange="wpccPreviewSetCorners(this.value)" name="popup_corners">
                                                                        <option value="none">None</option>
                                                                        <option value="small" selected="selected">Small</option>
                                                                        <option value="normal">Normal</option>
                                                                        <option value="large">Large</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-ms-6 col-xs-3 col-sm-2 layout-padding">
                                                            <div class="control">
                                                                <label for="input_wizard_layout_popup_padding">
                                                                    Padding
                                                                </label>
                                                                <div class="field">
                                                                    <select class="input-select" id="input_wizard_layout_popup_padding" onchange="wpccPreviewSetPadding(this.value)" name="popup_padding">
                                                                        <option value="none">None</option>
                                                                        <option value="small">Small</option>
                                                                        <option value="normal" selected="selected">Normal</option>
                                                                        <option value="large">Large</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-ms-6 col-xs-3 col-sm-2 layout-margin">
                                                            <div class="control">
                                                                <label for="input_wizard_layout_popup_margin">
                                                                    Margin
                                                                </label>
                                                                <div class="field">
                                                                    <select class="input-select" id="input_wizard_layout_popup_margin" onchange="wpccPreviewSetMargin(this.value)" name="popup_margin">
                                                                        <option value="none">None</option>
                                                                        <option value="small">Small</option>
                                                                        <option value="normal" selected="selected">Normal</option>
                                                                        <option value="large">Large</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-ms-6 col-xs-3 col-sm-2 layout-transparency">
                                                            <div class="control">
                                                                <label for="input_wizard_layout_popup_transparency">
                                                                    Transparency
                                                                </label>
                                                                <div class="field">
                                                                    <select class="input-select" id="input_wizard_layout_popup_transparency" onchange="wpccPreviewSetTransparency(this.value)" name="popup_transparency">
                                                                        <option value="none" selected="selected">None</option>
                                                                        <option value="5">5%</option>
                                                                        <option value="10">10%</option>
                                                                        <option value="15">15%</option>
                                                                        <option value="20">20%</option>
                                                                        <option value="25">25%</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-ms-6 col-xs-3 col-sm-2 layout-fontsize">
                                                            <div class="control">
                                                                <label for="input_wizard_layout_popup_fontsize">
                                                                    Font size
                                                                </label>
                                                                <div class="field">
                                                                    <select class="input-select" id="input_wizard_layout_popup_fontsize" onchange="wpccPreviewSetFontSize(this.value)" name="popup_fontsize">
                                                                        <option value="tiny">Tiny</option>
                                                                        <option value="small">Small</option>
                                                                        <option value="default" selected="selected">Default</option>
                                                                        <option value="large">Large</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="step step3 colors">
                                    <a onclick="toggleStep(3);return false;" class="toggler" href="/create/cookie-consent-banner#">3. Colors</a>
                                    <div class="panel" style="display: none;">
                                        <div class="content">
                                            <p>Choose the color palette or specify your own colors.</p>
                                            <ul class="colors">
                                                <li class="color-0">
                                                    <a onclick="wpccPreviewSetColors(0);return false;" href="/create/cookie-consent-banner#">
                                                        <span style="background: #222222;" class="item">
                                                            <span style="background: #ffffff;" class="lbl"></span><span style="background: #ffffff;" class="lbl"></span><span style="background: #fde296;" class="btn"></span>
                                                        </span>
                                                    </a>
                                                </li>
                                                <li class="color-1">
                                                    <a onclick="wpccPreviewSetColors(1);return false;" href="/create/cookie-consent-banner#">
                                                        <span style="background: #222222;" class="item">
                                                            <span style="background: #ffffff;" class="lbl"></span><span style="background: #ffffff;" class="lbl"></span><span style="background: #b5e1a0;" class="btn"></span>
                                                        </span>
                                                    </a>
                                                </li>
                                                <li class="color-2">
                                                    <a onclick="wpccPreviewSetColors(2);return false;" href="/create/cookie-consent-banner#">
                                                        <span style="background: #222222;" class="item">
                                                            <span style="background: #ffffff;" class="lbl"></span><span style="background: #ffffff;" class="lbl"></span><span style="background: #b4eae4;" class="btn"></span>
                                                        </span>
                                                    </a>
                                                </li>
                                                <li class="color-3">
                                                    <a onclick="wpccPreviewSetColors(3);return false;" href="/create/cookie-consent-banner#">
                                                        <span style="background: #222222;" class="item">
                                                            <span style="background: #ffffff;" class="lbl"></span><span style="background: #ffffff;" class="lbl"></span><span style="background: #b3d0e4;" class="btn"></span>
                                                        </span>
                                                    </a>
                                                </li>
                                                <li class="color-4">
                                                    <a onclick="wpccPreviewSetColors(4);return false;" href="/create/cookie-consent-banner#">
                                                        <span style="background: #222222;" class="item">
                                                            <span style="background: #ffffff;" class="lbl"></span><span style="background: #ffffff;" class="lbl"></span><span style="background: #afb3e4;" class="btn"></span>
                                                        </span>
                                                    </a>
                                                </li>
                                                <li class="color-5">
                                                    <a onclick="wpccPreviewSetColors(5);return false;" href="/create/cookie-consent-banner#">
                                                        <span style="background: #222222;" class="item">
                                                            <span style="background: #ffffff;" class="lbl"></span><span style="background: #ffffff;" class="lbl"></span><span style="background: #d9baea;" class="btn"></span>
                                                        </span>
                                                    </a>
                                                </li>
                                                <li class="color-6">
                                                    <a onclick="wpccPreviewSetColors(6);return false;" href="/create/cookie-consent-banner#">
                                                        <span style="background: #222222;" class="item">
                                                            <span style="background: #ffffff;" class="lbl"></span><span style="background: #ffffff;" class="lbl"></span><span style="background: #e6b3b3;" class="btn"></span>
                                                        </span>
                                                    </a>
                                                </li>
                                                <li class="color-7">
                                                    <a onclick="wpccPreviewSetColors(7);return false;" href="/create/cookie-consent-banner#">
                                                        <span style="background: #222222;" class="item">
                                                            <span style="background: #ffffff;" class="lbl"></span><span style="background: #ffffff;" class="lbl"></span><span style="background: #f9f9f9;" class="btn"></span>
                                                        </span>
                                                    </a>
                                                </li>
                                                <li class="color-8">
                                                    <a onclick="wpccPreviewSetColors(8);return false;" href="/create/cookie-consent-banner#">
                                                        <span style="background: #5c4812;" class="item">
                                                            <span style="background: #ffffff;" class="lbl"></span><span style="background: #ffffff;" class="lbl"></span><span style="background: #fde296;" class="btn"></span>
                                                        </span>
                                                    </a>
                                                </li>
                                                <li class="color-9">
                                                    <a onclick="wpccPreviewSetColors(9);return false;" href="/create/cookie-consent-banner#">
                                                        <span style="background: #2a5b12;" class="item">
                                                            <span style="background: #ffffff;" class="lbl"></span><span style="background: #ffffff;" class="lbl"></span><span style="background: #b5e1a0;" class="btn"></span>
                                                        </span>
                                                    </a>
                                                </li>
                                                <li class="color-10">
                                                    <a onclick="wpccPreviewSetColors(10);return false;" href="/create/cookie-consent-banner#">
                                                        <span style="background: #1b4b45;" class="item">
                                                            <span style="background: #ffffff;" class="lbl"></span><span style="background: #ffffff;" class="lbl"></span><span style="background: #b4eae4;" class="btn"></span>
                                                        </span>
                                                    </a>
                                                </li>
                                                <li class="color-11">
                                                    <a onclick="wpccPreviewSetColors(11);return false;" href="/create/cookie-consent-banner#">
                                                        <span style="background: #1a3242;" class="item">
                                                            <span style="background: #ffffff;" class="lbl"></span><span style="background: #ffffff;" class="lbl"></span><span style="background: #b3d0e4;" class="btn"></span>
                                                        </span>
                                                    </a>
                                                </li>
                                                <li class="color-12">
                                                    <a onclick="wpccPreviewSetColors(12);return false;" href="/create/cookie-consent-banner#">
                                                        <span style="background: #1c1f4b;" class="item">
                                                            <span style="background: #ffffff;" class="lbl"></span><span style="background: #ffffff;" class="lbl"></span><span style="background: #afb3e4;" class="btn"></span>
                                                        </span>
                                                    </a>
                                                </li>
                                                <li class="color-13">
                                                    <a onclick="wpccPreviewSetColors(13);return false;" href="/create/cookie-consent-banner#">
                                                        <span style="background: #351944;" class="item">
                                                            <span style="background: #ffffff;" class="lbl"></span><span style="background: #ffffff;" class="lbl"></span><span style="background: #d9baea;" class="btn"></span>
                                                        </span>
                                                    </a>
                                                </li>
                                                <li class="color-14">
                                                    <a onclick="wpccPreviewSetColors(14);return false;" href="/create/cookie-consent-banner#">
                                                        <span style="background: #491b1b;" class="item">
                                                            <span style="background: #ffffff;" class="lbl"></span><span style="background: #ffffff;" class="lbl"></span><span style="background: #e6b3b3;" class="btn"></span>
                                                        </span>
                                                    </a>
                                                </li>
                                                <li class="color-15">
                                                    <a onclick="wpccPreviewSetColors(15);return false;" href="/create/cookie-consent-banner#">
                                                        <span style="background: #606060;" class="item">
                                                            <span style="background: #ffffff;" class="lbl"></span><span style="background: #ffffff;" class="lbl"></span><span style="background: #f9f9f9;" class="btn"></span>
                                                        </span>
                                                    </a>
                                                </li>
                                                <li class="color-16">
                                                    <a onclick="wpccPreviewSetColors(16);return false;" href="/create/cookie-consent-banner#">
                                                        <span style="background: #fff0ca;" class="item">
                                                            <span style="background: #000000;" class="lbl"></span><span style="background: #000000;" class="lbl"></span><span style="background: #e0bc57;" class="btn"></span>
                                                        </span>
                                                    </a>
                                                </li>
                                                <li class="color-17">
                                                    <a onclick="wpccPreviewSetColors(17);return false;" href="/create/cookie-consent-banner#">
                                                        <span style="background: #e2f7d4;" class="item">
                                                            <span style="background: #000000;" class="lbl"></span><span style="background: #000000;" class="lbl"></span><span style="background: #7fc25e;" class="btn"></span>
                                                        </span>
                                                    </a>
                                                </li>
                                                <li class="color-18">
                                                    <a onclick="wpccPreviewSetColors(18);return false;" href="/create/cookie-consent-banner#">
                                                        <span style="background: #edfdfa;" class="item">
                                                            <span style="background: #000000;" class="lbl"></span><span style="background: #000000;" class="lbl"></span><span style="background: #5ec2b6;" class="btn"></span>
                                                        </span>
                                                    </a>
                                                </li>
                                                <li class="color-19">
                                                    <a onclick="wpccPreviewSetColors(19);return false;" href="/create/cookie-consent-banner#">
                                                        <span style="background: #cff5ff;" class="item">
                                                            <span style="background: #000000;" class="lbl"></span><span style="background: #000000;" class="lbl"></span><span style="background: #5e99c2;" class="btn"></span>
                                                        </span>
                                                    </a>
                                                </li>
                                                <li class="color-20">
                                                    <a onclick="wpccPreviewSetColors(20);return false;" href="/create/cookie-consent-banner#">
                                                        <span style="background: #f0edff;" class="item">
                                                            <span style="background: #000000;" class="lbl"></span><span style="background: #000000;" class="lbl"></span><span style="background: #5e65c2;" class="btn"></span>
                                                        </span>
                                                    </a>
                                                </li>
                                                <li class="color-21">
                                                    <a onclick="wpccPreviewSetColors(21);return false;" href="/create/cookie-consent-banner#">
                                                        <span style="background: #ffe8ff;" class="item">
                                                            <span style="background: #000000;" class="lbl"></span><span style="background: #000000;" class="lbl"></span><span style="background: #9f5ec2;" class="btn"></span>
                                                        </span>
                                                    </a>
                                                </li>
                                                <li class="color-22">
                                                    <a onclick="wpccPreviewSetColors(22);return false;" href="/create/cookie-consent-banner#">
                                                        <span style="background: #ffe4e1;" class="item">
                                                            <span style="background: #000000;" class="lbl"></span><span style="background: #000000;" class="lbl"></span><span style="background: #c25e5e;" class="btn"></span>
                                                        </span>
                                                    </a>
                                                </li>
                                                <li class="color-23 active">
                                                    <a onclick="wpccPreviewSetColors(23);return false;" href="/create/cookie-consent-banner#">
                                                        <span style="background: #f6f6f6;" class="item">
                                                            <span style="background: #000000;" class="lbl"></span><span style="background: #000000;" class="lbl"></span><span style="background: #555555;" class="btn"></span>
                                                        </span>
                                                    </a>
                                                </li>
                                            </ul>
                                            <p><a onclick="$(&#39;#custom-colors-box&#39;).slideFadeToggle(250);return false;" href="/create/cookie-consent-banner#">Customize colors</a></p>
                                            <div id="custom-colors-box" class="custom" style="display: none;">
                                                <div class="row">
                                                    <div class="col-ms-12 col-xs-4 col-lg-3">
                                                        <div class="lbl">
                                                            Popup background
                                                        </div>
                                                        <div class="clr">
                                                            <input class="input-custom-value" id="input_wizard_color_popup_background" type="color" name="popup_background_color" value="#f6f6f6" style="display: none;" />
                                                            <div class="sp-replacer sp-light">
                                                                <div class="sp-preview"><div class="sp-preview-inner" style="background-color: rgb(246, 246, 246);"></div></div>
                                                                <div class="sp-dd">▼</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-ms-12 col-xs-4 col-lg-3">
                                                        <div class="lbl">
                                                            Popup text
                                                        </div>
                                                        <div class="clr">
                                                            <input class="input-custom-value" id="input_wizard_color_popup_text" type="color" name="popup_text_color" value="#000000" style="display: none;" />
                                                            <div class="sp-replacer sp-light">
                                                                <div class="sp-preview"><div class="sp-preview-inner" style="background-color: rgb(0, 0, 0);"></div></div>
                                                                <div class="sp-dd">▼</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-ms-12 col-xs-4 col-lg-3">
                                                        <div class="lbl">
                                                            Popup border
                                                        </div>
                                                        <div class="clr">
                                                            <input class="input-custom-value" id="input_wizard_color_popup_border" type="color" name="popup_border_color" value="#555555" style="display: none;" />
                                                            <div class="sp-replacer sp-light">
                                                                <div class="sp-preview"><div class="sp-preview-inner" style="background-color: rgb(85, 85, 85);"></div></div>
                                                                <div class="sp-dd">▼</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-ms-12 col-xs-4 col-lg-3" id="input_wizard_color_button_background_control">
                                                        <div class="lbl">
                                                            Button background
                                                        </div>
                                                        <div class="clr">
                                                            <input class="input-custom-value" id="input_wizard_color_button_background" type="color" name="button_background_color" value="#555555" style="display: none;" />
                                                            <div class="sp-replacer sp-light">
                                                                <div class="sp-preview"><div class="sp-preview-inner" style="background-color: rgb(85, 85, 85);"></div></div>
                                                                <div class="sp-dd">▼</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-ms-12 col-xs-4 col-lg-3" id="input_wizard_color_button_text_control">
                                                        <div class="lbl">
                                                            Button text
                                                        </div>
                                                        <div class="clr">
                                                            <input class="input-custom-value" id="input_wizard_color_button_text" type="color" name="button_text_color" value="#ffffff" style="display: none;" />
                                                            <div class="sp-replacer sp-light">
                                                                <div class="sp-preview"><div class="sp-preview-inner" style="background-color: rgb(255, 255, 255);"></div></div>
                                                                <div class="sp-dd">▼</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="step step4 link">
                                    <a onclick="toggleStep(4);return false;" class="toggler" href="/create/cookie-consent-banner#">4. Cookie policy</a>
                                    <div class="panel" style="display: none;">
                                        <div class="content">
                                            <form action="/create/cookie-consent-banner" method="post">
                                                <input type="hidden" name="csrf_token" value="38de639830875fef870216fb6753377e" />
                                                <fieldset>
                                                    <div class="control no-margin-bottom" id="cookie-policy-custom-url-box">
                                                        <label for="input_wizard_cookie_policy_url">
                                                            URL to your cookie policy
                                                        </label>
                                                        <div class="field">
                <input id="input_wizard_cookie_policy_url" class="text input-custom-value" placeholder="https://www.yoursite.com/cookie-policy/" type="text" name="cookie_policy_url" value="" />
                <span class="help">Don't have a cookie policy? <a target="_blank" href="/cookie-policy-generator">Create one now</a>, it's free!</span>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="step step5 text">
                                    <a onclick="toggleStep(5);return false;" class="toggler" href="/create/cookie-consent-banner#">5. Custom text</a>
                                    <div class="panel" style="display: none;">
                                        <div class="content">
                                            <p class="no-margin-bottom">Customize the text displayed on the cookie consent banner or use default text.</p>
                                            <form action="/create/cookie-consent-banner" method="post">
                                                <input type="hidden" name="csrf_token" value="38de639830875fef870216fb6753377e" />
                                                <fieldset>
                                                    <div class="control">
                                                        <label for="input_wizard_message_text">
                                                            Main message
                                                        </label>
                                                        <div class="field">
                                                            <textarea
                                                                id="input_wizard_message_text"
                                                                class="textarea input-custom-value"
                                                                name="message_text"
                                                                cols="60"
                                                                rows="10"
                                                                placeholder="This website uses cookies to ensure you get the best experience on our website."
                                                            ></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-ms-12 col-xs-6">
                                                            <div class="control">
                                                                <label for="input_wizard_cookie_policy_text">
                                                                    Policy link text
                                                                </label>
                                                                <div class="field">
                                                                    <input id="input_wizard_cookie_policy_text" class="text input-custom-value" type="text" name="cookie_policy_text" value="" placeholder="Learn more" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-ms-12 col-xs-6">
                                                            <div class="control">
                                                                <label for="input_wizard_dismiss_button_text">
                                                                    Dismiss button text
                                                                </label>
                                                                <div class="field">
                                                                    <input id="input_wizard_dismiss_button_text" class="text input-custom-value" type="text" name="button_text" value="" placeholder="Got it!" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="step step6 code">
                                    <a onclick="toggleStep(6);return false;" class="toggler" href="/create/cookie-consent-banner#">6. Copy the code</a>
                                    <div class="panel" style="display: none;">
                                        <div class="content">
                                            <p>Copy the code below to the header of your website, just above the &lt;/head&gt; tag.</p>
                                            <div class="code">
                                                <pre
                                                    class="scrollable"
                                                ><code id="wpccPreviewCode">&lt;link rel="stylesheet" type="text/css" href="https://cdn.wpcc.io/lib/1.0.2/cookieconsent.min.css"/&gt;&lt;script src="https://cdn.wpcc.io/lib/1.0.2/cookieconsent.min.js" defer&gt;&lt;/script&gt;&lt;script&gt;window.addEventListener("load", function(){window.wpcc.init({"border":"thin","corners":"small","colors":{"popup":{"background":"#f6f6f6","text":"#000000","border":"#555555"},"button":{"background":"#555555","text":"#ffffff"}}})});&lt;/script&gt;</code></pre>
                                            </div>
                                            <div class="btns">
                                                <a class="button preview" onclick="wpccPreviewShow();return false;" href="/create/cookie-consent-banner#">Click to preview</a>
                                                <a id="input_wizard_wpcc_copy_code_button" class="button" onclick="return false;" data-clipboard-target="#wpccPreviewCode" href="/create/cookie-consent-banner#">
                                                    Copy code
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            !(function (e, t) {
                for (var c = t.querySelectorAll('a[href^="#cb"]'), a = 0; a < c.length; a++)
                    c[a].addEventListener("click", function () {
                        this.setAttribute("data-clicked", !0);
                    });
                ((e = t.createElement("script")).src = "https://cdn.convertbox.com/convertbox/js/embed.js"),
                    (e.id = "app-convertbox-script"),
                    (e.async = true),
                    (e.dataset.uuid = "1d8ce409-0f9c-438e-9982-7a7af22a83ed"),
                    document.getElementsByTagName("head")[0].appendChild(e);
            })(window, document);
        </script>
        <script>
            var wpccVersion = "1.0.2";
        </script>
    </body>
</html>
@extends('layouts.footer')
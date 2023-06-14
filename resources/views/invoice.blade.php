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
            window.dataLayer.push(
                { stVar3: 1 },
                { isLoggedIn: "true" },
                { transactionAffiliation: "Policies", transactionTotal: 69.95, transactionProducts: [{ sku: "policy-bundle", name: "7 premium policies bundle", category: "Policies", price: 69.95, quantity: 1 }] }
            );
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
        <title>View invoice</title>
        <meta name="description" content="" />
        <link href="{{ asset ('assets/css/1615565436.css')}}" rel="stylesheet" type="text/css" />
        <script src="{{ asset ('assets/js/1615565436.js')}}"></script>
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
                    margin-top: 26px;
                }
            }
        </style>
    </head>
    <body class="session billing billing_payments invoice">
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
                                <?php if(auth()->user()->admin == 1) { ?>
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
                        <h1>View invoice</h1>
                    </div>
                </div>
            </div>
        </div>

        <div id="container">
            <div class="container">
                <div class="row">
                    <div id="content" class="col-ms-12">
                        <nav class="header-actions">
                            <ul class="buttons page">
                                <li><a class="button" href="settings">Back to invoices</a></li>
                            </ul>
                            <ul class="buttons content">
                                <!-- <li>
                                    <a class="icon-text icon-system-print" target="_blank" href="">Printable version</a>
                                </li> -->
                            </ul>
                        </nav>

                        <div class="plugin-billing invoice-view">
                            <h4>
                                Invoice #W0ZAmhwOwD
                            </h4>

                            <div class="row">
                                <div class="col-ms-12 col-sm-6">
                                    <ul class="list-grid table seller">
                                        <li class="header">
                                            <div class="name">
                                                <span>Seller</span>
                                            </div>
                                        </li>
                                        <li id="row-invoice-seller" class="seller">
                                            WebsitePolicies Inc.<br />
                                            103-2727 Steeles Ave W<br />
                                            Toronto, ON, M3J3G9<br />
                                            Canada
                                        </li>
                                    </ul>
                                </div>

                                <div class="col-ms-12 col-sm-6">
                                    <ul class="list-grid table purchaser">
                                        <li class="header">
                                            <div class="name">
                                                <span>Purchaser</span>
                                            </div>
                                        </li>
                                        <li id="row-invoice-purchaser" class="purchaser">
                                            Johann Pena<br />
                                            1065 SW 8th St, 1060<br />
                                            Miami, Florida, 33130 <br />
                                            United States
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <h4>
                                Product details
                            </h4>

                            <ul class="list-grid table invoice">
                                <li class="header">
                                    <div class="row">
                                        <div class="name col-ms-8 col-sm-4 col-lg-6">
                                            <span>Description</span>
                                        </div>

                                        <div class="status hidden-ms visible-sm col-sm-2">
                                            <span>Status</span>
                                        </div>

                                        <div class="date hidden-ms visible-sm col-sm-3 col-lg-2">
                                            <span>Date</span>
                                        </div>

                                        <div class="amount hidden-ms visible-xs col-xs-4 col-sm-3 col-lg-2">
                                            <span>Amount</span>
                                        </div>
                                    </div>
                                </li>

                                <li id="row-invoice-W0ZAmhwOwD-product" class="product">
                                    <div class="row">
                                        <div class="name col-ms-12 col-xs-8 col-sm-4 col-lg-6">
                                            <span>7 premium policies bundle</span>
                                        </div>

                                        <div class="status col-ms-12 col-xs-4 col-sm-2">
                                            <span class="label paid">Paid</span>
                                        </div>

                                        <div class="date col-ms-12 col-xs-8 col-sm-3 col-lg-2">
                                            <span>Jan 24, 2021</span>
                                        </div>

                                        <div class="amount col-ms-12 col-xs-4 col-sm-3 col-lg-2">
                                            <span> $69.95 </span>
                                        </div>
                                    </div>
                                </li>

                                <li class="total">
                                    <div class="row">
                                        <div class="amount col-ms-12">
                                            Total:
                                            <span>$69.95</span>
                                        </div>
                                    </div>
                                </li>
                            </ul>

                            <h4>
                                Transactions
                            </h4>

                            <ul class="list-grid table transactions">
                                <li class="header">
                                    <div class="row">
                                        <div class="name col-ms-8 col-sm-4 col-lg-6">
                                            <span>Receipt ID</span>
                                        </div>

                                        <div class="method hidden-ms visible-sm col-sm-2 col-lg-2">
                                            <span>Payment method</span>
                                        </div>

                                        <div class="date hidden-ms visible-sm col-sm-3 col-lg-2">
                                            <span>Date</span>
                                        </div>

                                        <div class="amount hidden-ms visible-xs col-xs-4 col-sm-3 col-lg-2">
                                            <span>Amount</span>
                                        </div>
                                    </div>
                                </li>

                                <li id="row-transaction-14978">
                                    <div class="row">
                                        <div class="name col-ms-12 col-xs-8 col-sm-4 col-lg-6">
                                            <span> ch_0IDEAq12uZK6gJ4GhfX3GqjJ </span>
                                        </div>

                                        <div class="method col-ms-12 col-xs-4 col-sm-2 col-lg-2">
                                            <span>Credit card</span>
                                        </div>

                                        <div class="date col-ms-12 col-xs-8 col-sm-3 col-lg-2">
                                            <span>Jan 24, 2021</span>
                                        </div>

                                        <div class="amount col-ms-12 col-xs-4 col-sm-3 col-lg-2">
                                            <span>$69.95</span>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <footer id="footer">
            <div class="container">
                <div class="row">
                    <div class="col-ms-12 col-xs-6 col-sm-6 col-lg-5 generators">
                        <h5>Products</h5>
                        <ul class="row">
                            <li class="col-ms-12 col-sm-6"><a href="/acceptable-use-policy-generator">Acceptable use policy generator</a></li>
                            <li class="col-ms-12 col-sm-6"><a href="/cookie-policy-generator">Cookie policy generator</a></li>
                            <li class="col-ms-12 col-sm-6"><a href="/cookie-consent-banner-generator">Cookie consent banner plugin</a></li>
                            <li class="col-ms-12 col-sm-6"><a href="/disclaimer-generator">Disclaimer generator</a></li>
                            <li class="col-ms-12 col-sm-6"><a href="/dmca-policy-generator">DMCA policy generator</a></li>
                            <li class="col-ms-12 col-sm-6"><a href="/privacy-policy-generator">Privacy policy generator</a></li>
                            <li class="col-ms-12 col-sm-6"><a href="/refund-policy-generator">Refund policy generator</a></li>
                            <li class="col-ms-12 col-sm-6"><a href="/terms-and-conditions-generator">Terms and conditions generator</a></li>
                        </ul>
                    </div>
                    <div class="col-ms-12 col-xs-6 col-sm-2 col-lg-2 company">
                        <h5>Company</h5>
                        <ul>
                            <li><a href="/about">About us</a></li>
                            <li><a href="/contact">Contact us</a></li>
                            <li><a href="/blog">Blog</a></li>
                            <li><a href="/testimonials">Testimonials</a></li>
                        </ul>
                    </div>
                    <div class="clearfix visible-ms hidden-sm"></div>
                    <div class="col-ms-12 col-xs-6 col-sm-2 col-lg-2 resources">
                        <h5>Resources</h5>
                        <ul>
                            <li><a href="/create/bundle">Bundle and save</a></li>
                            <li><a href="/pricing">Pricing</a></li>
                            <li><a href="/affiliates">Affiliates</a></li>
                            <li><a href="/partners">Partners</a></li>
                        </ul>
                    </div>
                    <div class="col-ms-12 col-xs-6 col-sm-2 col-lg-3 social">
                        <h5>Follow us</h5>
                        <ul>
                            <li><a title="Facebook" class="icon-text icon-social-facebook" target="_blank" href="https://www.facebook.com/websitepolicies">Facebook</a></li>
                            <li><a title="Twitter" class="icon-text icon-social-twitter" target="_blank" href="https://twitter.com/websitepolicies">Twitter</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
        <div id="footer-legal">
            <div class="container">
                <div class="row">
                    <div class="brand col-ms-12 col-sm-5">
                        <ul>
                            <li><a href="/">WebsitePolicies</a> © 2021</li>
                        </ul>
                    </div>
                    <div class="legal col-ms-12 col-sm-7">
                        <ul>
                            <li><a href="/legal">Terms and Privacy</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <script async="" src="{{ asset('assets/js/app.js')}}" charset="UTF-8" crossorigin="*"></script>
        <script async="" src="{{ asset('assets/js/default.js')}}" charset="UTF-8" crossorigin="*"></script>
        <script async="" src="{{ asset('assets/js/gtm.js')}}"></script>
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
        <link rel="alternate" type="application/rss+xml" title="Feed" href="blog/feed" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>My policies</title>
        <meta name="description" content="" />
        <link href="{{ asset('assets/css/1611587689.css')}}" rel="stylesheet" type="text/css" />
        <script src="{{ asset('assets/js/1611587689.js')}}"></script>
        <meta property="og:image" content="uploads/p/h/7/g/1y9eg2ur9hegs3x1s2nd.png" />
        <meta name="twitter:image" content="uploads/p/h/7/g/1y9eg2ur9hegs3x1s2nd.png" />
        <link href="{{ asset ('assets/css/new.css')}}" rel="stylesheet" type="text/css" />
        <script src="{{ asset('assets/js/tawk.js')}}"></script>
        <link rel="stylesheet" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <style type="text/css">
            @media (min-width: 768px){
                nav#site-nav ul#main-menu {
                    margin-top: 26px;
                }
            }
            span.activee {
                background: #28b66e;
                color: white;
                padding: 5px;
                font-size: 0.875rem;
                font-weight: bold;
            }
            span.unpaid {
                background: #f0ad4e;
                color: white;
                padding: 5px;   
                font-size: 0.875rem;
                font-weight: bold;
            }
            div#restu_table_wrapper {
                padding-top: 40px;
                padding-bottom: 40px;
            }
            table.dataTable tbody th, table.dataTable tbody td {
                padding: 18px 10px !important;
            }
            label {
                margin-bottom: 38px !important;
            }
            div#restu_table_length {
            display: none !important;
            }
            .topa {
                position: absolute;
                top: 40px;
                z-index: 999999999999 !important;
            }
            @media only screen and (max-width: 600px){
                div#restu_table_wrapper {
                    padding: 60px 10px 10px 10px!important;
                }
                div#restu_table_filter {
                    float: left;
                }
                .topa{
                    top: 14px!important;
                }
            }


            //TO-DO: tidy up style

            .wrapper {
              margin-top: 5vh;
            }

            .dataTables_filter {
              float: right;
            }

            .table-hover > tbody > tr:hover {
                background-color: lighten(cyan, 40%);
            }
            //important if we want to add ellipsis
            //to cells with content longer than width
            .table {
              @media only screen and (min-width: 768px) {
                table-layout: fixed;
                //this declaration overwrites 
                //the default plugin style
                max-width: 100% !important;
              }
            }

            thead {
              background: transparent;
            }

            .table td:nth-child(2) {
              overflow: hidden;
              //white-space: nowrap;
              text-overflow: ellipsis;
            }

            .highlight {
              background: lighten(yellow,30%);
            }

            @media only screen and (max-width: 767px) {
              
              /* Force table to not be like tables anymore */
              table,
              thead,
              tbody,
              th,
              td,
              tr {
                display: block;
              }
              /* Hide table headers (but not display: none;, for accessibility) */
              thead tr,
              tfoot tr {
                position: absolute;
                top: -9999px;
                left: -9999px;
              }
              td {
                /* Behave  like a "row" */
                border: none;
                border-bottom: 1px solid #eee;
                position: relative;
                padding-left: 50% !important;
              }
              td:before {
                /* Now like a table header */
                position: absolute;
                /* Top/left values mimic padding */
                top: 6px;
                left: 6px;
                width: 45%;
                padding-right: 10px;
                white-space: nowrap;
              }
              
              .table td:nth-child(1) {
                  background: #ccc;
                  height: 100%;
                  top: 0;
                  left: 0;
                  font-weight: bold;
              }
              /* Label the data */
              
              .dataTables_length {
                display: none;
              }
            }

            a#manage {
                text-decoration: none;
                color: black;
            }

        </style>
    </head>
    <body class="session policies manage">
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
                        <h1>My policies</h1>
                    </div>
                </div>
            </div>
        </div>

        <?php $users = DB::table('users')
            ->join('policy','users.email','policy.email')
            ->where('users.email', Auth::user()->email )
            ->orderBy('created', 'desc')
            ->get();
        ?>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <a href="create"><button class="topa button">Create new policy</button></a>
                </div>
            </div>
        </div>
<div class="container">
    <div class="table-responsive">
        <table class="table" id="restu_table">
            <thead class="thead">
                <tr>
                    <th class="" scope="col">Name</th>
                    <th class="" scope="col">Type</th>
                    <th class="" scope="col">Status</th>
                    <th class="" scope="col">Date</th>
                </tr>
            </thead>
            <tbody>                                
            <?php if(count($users)){
            foreach($users as $user){ ?>
                <tr>
                    <td> <span><a href="<?php if(auth()->user()->admin == 1){ echo $user -> url; } elseif( $user->payment_status == 'succeeded'){ echo $user -> url; }
                        else { echo $user -> link; } ?>"><?php echo $user -> mobile_name; ?></a></span>
                        <span class="name"><a href="<?php if( $user->payment_status == 'succeeded')
                        { echo $user -> url; }else { echo $user -> link; } ?>"><?php echo $user -> website_url; ?></a></span>
                        <br><span><a id="manage" href="<?php if( $user->payment_status == 'succeeded'){ echo $user -> url; }
                        else { echo $user -> link; } ?>">Manage policy</a></span>
                    </td>
                    <td><a href="<?php if( $user->payment_status == 'succeeded'){ echo $user -> url; }
                                else { echo $user -> link; } ?>"><?php echo $user->policy_name; ?></a>
                        <br><span><?php echo $user->type; ?></span></td>
                    <td><?php if(auth()->user()->admin == 1){ echo '<span class="activee">Active</span>'; } 
                    elseif ($user->payment_status == 'succeeded' || $user->type == 'Basic')
                                { echo '<span class="activee">Active</span>'; }
                            else{ echo '<span class="unpaid">Incomplete</span>'; } ?>
                    </td>
                    <td><?php echo $user->created_at ?></td>
                </tr>
            <?php }} ?>
            </tbody>
        </table>
    </div>
</div>



<footer id="footer">
    <div class="container" bis_skin_checked="1">
        <div class="row" bis_skin_checked="1">
            <div class="col-ms-12 col-xs-6 col-sm-6 col-lg-5 generators" bis_skin_checked="1">
                <h5>Products</h5>
                <ul class="row">
                    <li class="col-ms-12 col-sm-6"><a href="acceptable-use-policy-generator">Acceptable use policy generator</a></li>
                    <li class="col-ms-12 col-sm-6"><a href="cookie-policy-generator">Cookie policy generator</a></li>
                    <li class="col-ms-12 col-sm-6"><a href="cookie-consent-banner-generator">Cookie consent banner plugin</a></li>
                    <li class="col-ms-12 col-sm-6"><a href="disclaimer-generator">Disclaimer generator</a></li>
                    <li class="col-ms-12 col-sm-6"><a href="dmca-policy-generator">DMCA policy generator</a></li>
                    <li class="col-ms-12 col-sm-6"><a href="privacy-policy-generator">Privacy policy generator</a></li>
                    <li class="col-ms-12 col-sm-6"><a href="refund-policy-generator">Refund policy generator</a></li>
                    <li class="col-ms-12 col-sm-6"><a href="terms-and-conditions-generator">Terms and conditions generator</a></li>
                </ul>
            </div>
            <div class="col-ms-12 col-xs-6 col-sm-2 col-lg-2 company" bis_skin_checked="1">
                <h5>Company</h5>
                <ul>
                    <li><a href="about">About us</a></li>
                    <li><a href="contact">Contact us</a></li>
                    <li><a href="blog">Blog</a></li>
                    <li><a href="testimonials">Testimonials</a></li>
                </ul>
            </div>
            <div class="clearfix visible-ms hidden-sm" bis_skin_checked="1"></div>
            <div class="col-ms-12 col-xs-6 col-sm-2 col-lg-2 resources" bis_skin_checked="1">
                <h5>Resources</h5>
                <ul>
                    <li><a href="bundle">Bundle and save</a></li>
                    <li><a href="pricing">Pricing</a></li>
                    <li><a href="affiliates">Affiliates</a></li>
                    <li><a href="partners">Partners</a></li>
                </ul>
            </div>
            <div class="col-ms-12 col-xs-6 col-sm-2 col-lg-3 social" bis_skin_checked="1">
                <h5>Follow us</h5>
                <ul>
                    <li><a title="Facebook" class="icon-text icon-social-facebook" target="_blank" href="https://www.facebook.com/">Facebook</a></li>
                    <li><a title="Twitter" class="icon-text icon-social-twitter" target="_blank" href="https://twitter.com/">Twitter</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<div id="footer-legal" bis_skin_checked="1">
    <div class="container" bis_skin_checked="1">
        <div class="row" bis_skin_checked="1">
            <div class="brand col-ms-12 col-sm-5" bis_skin_checked="1">
                <ul>
                    <li><a href="/">Draftly</a> © 2021</li>
                </ul>
            </div>
            <div class="legal col-ms-12 col-sm-7" bis_skin_checked="1">
                <ul>
                    <li><a href="legal">Terms and Privacy</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<script src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#restu_table').DataTable();
    });
</script>
</body>
</html>



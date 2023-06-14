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
        <link rel="alternate" type="application/rss+xml" title="WebsitePolicies.com Feed" href="blog/feed" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Settings</title>
        <meta name="description" content="" />
        <link href="{{ asset('assets/css/1611587689.css')}}" rel="stylesheet" type="text/css" />
        <script src="{{ asset('assets/js/1611587689.js')}}"></script>
        <meta property="og:image" content="uploads/p/h/7/g/1y9eg2ur9hegs3x1s2nd.png" />
        <meta name="twitter:image" content="uploads/p/h/7/g/1y9eg2ur9hegs3x1s2nd.png" />
        <link href="{{ asset ('assets/css/new.css')}}" rel="stylesheet" type="text/css" />
        <script src="{{ asset('assets/js/tawk.js')}}"></script>
        <link rel="stylesheet" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <style>
            @media print {
                #ghostery-tracker-tally {
                    display: none !important;
                }
            }
            button:focus {
                outline: none;
            }
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
                padding-bottom: 40px;
            }
            table.dataTable tbody th, table.dataTable tbody td {
                padding: 18px 10px !important;
            }
            div#restu_table_length {
            display: none !important;
            }
            div#restu_table_filter {
                display: none;
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
            .tabs {
                margin-bottom: 0px !important; 
            }
        </style>
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    </head>
    <body class="session users users_settings index">
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
                        <h1>Settings</h1>
                    </div>
                </div>
            </div>
        </div>

        <div id="container">
            <div class="container">
                <div class="row">
                    <div id="content" class="col-ms-12">
                         <nav id="tabs" class="tabs">
                                <button class="tablinks" onclick="policy(event, 'text')"><i class="fas fa-cogs"></i>&nbsp; Settings</button>
                                <button class="tablinks" onclick="policy(event, 'html')"><i class="fas fa-file-invoice"></i>&nbsp; Invoices</button>
                        </nav>

                        <div id="text" class="tabcontent">
                            <div class="plugin-users settings-account">
                                <form action="settings" method="post">
                                    <input type="hidden" name="csrf_token" value="d95cdb960603fae8ba226f262f484d04" />
                                    <fieldset class="grid">
                                        <div class="control" id="input_row_user_account_email">
                                            <label for="input_edit_user_account_email"> Email </label>

                                            <div class="field">
                                                <p><?php $users = DB::table('users')->where('users.email', Auth::user()->email )->first(); echo $users -> email; ?></p>

                                                <span class="help"><a href="settings/email">Change email</a> - <a href="settings/password">Change password</a></span>
                                            </div>
                                        </div>
                                    </fieldset>

                                    <input type="hidden" name="do_save_settings" value="1" />
                                </form>
                            </div>
                        </div>

                        <div id="html" class="tabcontent" style="display: none;">
                            <?php $users = DB::table('users')
                                ->join('policy','users.email','policy.email')
                                ->where('users.email', Auth::user()->email )
                                ->orderBy('created', 'desc')
                                ->get();
                            ?>
                            <div class="table-responsive">
                                <table class="table" id="restu_table">
                                    <thead class="thead">
                                        <tr>
                                            <th class="" scope="col">Name</th>
                                            <th class="" scope="col">Status</th>
                                            <th class="" scope="col">Date</th>
                                            <th class="" scope="col">Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>                                
                                    <?php if(count($users)){
                                    foreach($users as $user){ ?>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    <?php }} ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
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
<script>
function policy(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}
</script>
<script src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
     <script>
        $(document).ready(function() {
            $('#restu_table').DataTable();
        });
    </script>
    </body>
</html>

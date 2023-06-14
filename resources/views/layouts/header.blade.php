<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
  <style type="text/css">
      .mobheader{
        display: inline-flex !important;
      }
      @media only screen and (max-width: 767px){
        .mobheader{
            display: contents!important;
        }
        .collapsee:not(.show) {
    display: none!important;
}
.flt{
    float: left !important;
    }
      }
      .collapsee:not(.show) {
    display: block;
}
@media only screen and (min-width: 992px){
.flt{
    float: right ;
    }
}

ul li a:hover{
        color: #fff;
        background: #939393;
    }
    ul li ul.dropdown{
        min-width: 100%; /* Set width of the dropdown */
        background: #f2f2f2;
        display: none;
        position: absolute;
        z-index: 999;
        left: 0;
    }
    ul li:hover ul.dropdown{
        display: block; /* Display the dropdown */
    }
    ul li ul.dropdown li{
        display: block;
    }
  </style>


<header id="header" class="hdd">
    <?php $logo = DB::table('logo')->where('id', 1)->first(); ?>
    <div class="container" bis_skin_checked="1">
        <div class="row" bis_skin_checked="1">
            <div class="col-ms-12" bis_skin_checked="1">
                <a class="logo" href="/">
                    <img
                        width="216"
                        height="40"
                        alt="Draftly.org"
                        class="logo gm-observing gm-observing-cb"
                        srcset="<?php echo $logo->featured_image; ?>"
                        src="<?php echo $logo->featured_image; ?>"
                        loading="lazy" />
                </a>
                @guest
                <nav id="site-nav">
                    <a class="menu-button main-menu-button collapsed navbar-toggler"  type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="mobile-icon">Menu</span></a>
                    <div class="collapsee navbar-collapse pt-3 mt-3 flt " id="navbarSupportedContent" >
                        <ul class="mobheader" style="list-style: none!important;" >
                            <li class="out blog nav-item"><a class="nav-link" href="..\blog">Blog</a></li>
                            <li class="out pricing nav-item"><a class="nav-link" href="..\pricing">Pricing</a></li>
                            <li class="out reviews nav-item"><a class="nav-link" href="..\testimonials">Testimonials</a></li>
                            <li class="out login nav-item"><a class="nav-link" href="login" target="_self">Login</a></li>
                            <li class="out start nav-item"><a class="nav-link" href="..\create">Get started</a></li>
                        </ul>
                    </div>
                </nav>
                @endguest
                @auth
                <nav id="site-nav">
                    <a class="menu-button main-menu-button collapsed navbar-toggler"  type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="mobile-icon">Menu</span></a>
                    <div class="collapsee navbar-collapse pt-3 mt-3 flt " id="navbarSupportedContent" >
                        <ul class="mobheader" id="main-menu">
                            <li class="out blog"><a href="blog">Blog</a></li>
                            <li class="out pricing"><a href="pricing">Pricing</a></li>
                            <li class="out policies"><a href="{{url('/home')}}">My policies</a></li>
                            <?php if(auth()->user()->admin == 1) { ?>
                                <li class="out policies"><a href="{{url('/admin/Dashboard')}}">Dashboard</a></li>
                            <?php } ?>
                            <li class="out dropdown account" data-dropdown="menu-account" data-dropdown-action="hover">
                                <a href="#">My account</a>
                                <ul class="dropdown" data-dropdown-menu="menu-account">
                                    <li class="settings"><a href="settings">Settings</a></li>
                                    <li class="logout"><a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}</li>
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
                @endauth
            </div>
        </div>
    </div>
</header> 
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>

        
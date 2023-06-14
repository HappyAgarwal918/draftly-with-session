<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="">

    <title>Draftly</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="{{ asset ('css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset ('css/responsive.css')}}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/ccef17cc9d.js" crossorigin="anonymous"></script>
</head>



<body>
    <div style="height: 100vh; padding: 25px;" class="container-fluid text-center main_main_section">

        <div style="height: 100%;" class="row content">
            <div class="sidenav">
                <div class="sidebar_fixed">
                    <div class="dashboard_txt2a">
                        <h1><a href="/" style="text-decoration: none;">Draftly</a></h1>
                    </div>
                    <div class="sidebarComponents">
                        <ul class="sidebarList">
                            <li class="sidebar_active">
                                <a href="{{url('/admin/Dashboard')}}">
                                    <h3 class="change_color"><span class="image_dash"></span>&nbsp; Dashboard</h3>
                                </a>
                            </li>
                            <li class="sidebar_active">
                                <a href="{{url('/admin/User')}}">
                                    <h3 class=""><span class="image_dash1"></span>&nbsp; Users</h3>
                                </a>
                            </li>
                            <li class="sidebar_active">
                                <a href="{{url('/admin/Price')}}">
                                    <h3 class=""><span class="image_dash2"></span>&nbsp; Price</h3>
                                </a>
                            </li>
                            <li class="sidebar_active sidebar_active">
                                <a href="{{url('/admin/stripe')}}">
                                    <h3 class=""><span class="image_dash3"></span>&nbsp; Stripe</h3>
                                </a>
                            </li>
                           <li class="sidebar_active">
                                <a href="{{url('/admin/legal')}}">
                                    <h3 class=""><span class="image_dash4"></span>&nbsp; Legal</h3>
                                </a>
                            </li>
                            <li class="sidebar_active">
                                <a href="{{url('/admin/payment')}}">
                                    <h3 class=""><span class="image_dash5"></span>&nbsp; Payment Status</h3>
                                </a>
                            </li>
                            <li class="sidebar_active">
                                <a href="{{url('/admin/Blog')}}">
                                    <h3 class=""><span class="image_dash6"></span>&nbsp; Blogs</h3>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="get_in_touch_section">
                        <img class="mb-1" src="{{ asset ('assets/images/img.svg')}}"><br>
                        <span class="logout"> <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            {{ __('Logout') }} <img src="{{ asset ('assets/images/Login.svg')}}"></a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </span>                        
                    </div>                    
                </div>
            </div>
<div id="mySidenav" class="sidenav2">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
<div class="dashboard_txt2a">
                        <h1><a href="/" style="text-decoration: none;">Draftly</a></h1>
                    </div>
                    
                    <div class="sidebarComponents" >
                        <ul class="sidebarList">
                            <li class="sidebar_active ">
                                <a href="{{url('/admin/Dashboard')}}">
                                    <h3 class="change_color"><span class="image_dash"></span>&nbsp; Dashboard</h3>
                                </a>
                            </li>
                            <li class="sidebar_active">
                                <a href="{{url('/admin/User')}}">
                                    <h3 class=""><span class="image_dash1"></span>&nbsp; Users</h3>
                                </a>
                            </li>
                            <li class="sidebar_active">
                                <a href="{{url('/admin/Price')}}">
                                    <h3 class=""><span class="image_dash2"></span>&nbsp; Price</h3>
                                </a>
                            </li>
                            <li class="sidebar_active activ">
                                <a href="{{url('/admin/stripe')}}">
                                    <h3 class=""><span class="image_dash3"></span>&nbsp; Stripe</h3>
                                </a>
                            </li>
                            <li class="sidebar_active">
                                <a href="{{url('/admin/legal')}}">
                                    <h3 class=""><span class="image_dash4"></span>&nbsp; Legal</h3>
                                </a>
                            </li> 
                            <li class="sidebar_active">
                                <a href="{{url('/admin/payment')}}">
                                    <h3 class=""><span class="image_dash5"></span>&nbsp; Payment Status</h3>
                                </a>
                            </li>
                            <li class="sidebar_active">
                                <a href="{{url('/admin/Blog')}}">
                                    <h3 class=""><span class="image_dash6"></span>&nbsp; Blogs</h3>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="get_in_touch_section">
                        <img class="mb-1 imm" src="{{ asset ('assets/images/img.svg')}}"><br>
                        <span class="logout"> <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            {{ __('Logout') }} <img src="{{ asset ('assets/images/Login.svg')}}"></a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </span>                        
                    </div> 
</div>

            <div class="mainSection">
             <div style="width: 100% !important">
            <button class="collapsenav bttttttn" style="font-size:20px;cursor:pointer;float: right;" onclick="openNav()">&#9776; </button>
        </div>
             
                <!-- Main content -->
                <div class="dashboard_txt1">
                    <h1>Dashboard</h1>
                </div>
                  <?php $id = $_GET['id'];  $key = DB::table('stripe')->where('id', $id)->first(); ?>
                
                <form action="{{url('/Edited')}}">
                    @csrf
                    <label for="old key" style="font-size: 20px; font-weight: bold;"><?php echo $key->key_type; ?></label>
                    <input type="hidden" id="" name="id" value="<?php echo $id ?>" readonly="readonly"><br><br>
                    <label for="old key" style="font-size: 20px">Old Key:</label>
                    <input type="text" id="" name="old_price" value="<?php echo $key->values; ?>" readonly="readonly" ><br><br>
                    <label for="new key" style="font-size: 19px">New Key:</label>
                    <input type="text" id="price" name="values "><br><br>
                    <input class="btn btn-success submit" type="submit" value="Submit">
                </form>                                                   
             
            </div>
        </div>
    </div>
</body>
<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "100%";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
</script>
</html>
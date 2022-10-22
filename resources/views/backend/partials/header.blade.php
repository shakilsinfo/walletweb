<!DOCTYPE html>
<html lang="en">

<head>
    <title>
    
        @if(View::hasSection('title'))
            @yield('title')
        @else
            P2P Wallet
        @endif
    </title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="#" />
    <meta name="keywords" content="Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app" />
    <meta name="author" content="#" />
    <!-- Favicon icon -->

    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet" />
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="{{asset('backend/bower_components/bootstrap/dist/css/bootstrap.min.css')}}" />
    <!-- feather Awesome -->
    <link rel="stylesheet" type="text/css" href="{{asset('backend/icon/feather/css/feather.css')}}" />

    <link rel="stylesheet" type="text/css" href="{{asset('backend/bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('backend/assets/pages/data-table/css/buttons.dataTables.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('backend/bower_components/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('backend/bower_components/select2/dist/css/select2.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('backend/bower_components/bootstrap-multiselect/dist/css/bootstrap-multiselect.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('backend/bower_components/multiselect/css/multi-select.css')}}">

    <!--         <link rel="stylesheet" type="text/css" href="{{ asset('backend/bower_components/spectrum/spectrum.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('backend/bower_components/jquery-minicolors/jquery.minicolors.css') }}" /> -->

    <!-- Style.css -->

    <!-- jquery file upload Frame work -->
    <!-- <link href="{{asset('backend/assets/pages/jquery.filer/css/jquery.filer.css')}}" type="text/css" rel="stylesheet" /> -->
    <link href="{{asset('backend/assets/pages/jquery.filer/css/themes/jquery.filer-dragdropbox-theme.css')}}" type="text/css" rel="stylesheet" />

    <link rel="stylesheet" type="text/css" href="{{asset('backend/assets/icon/font-awesome/css/font-awesome.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('backend/assets/icon/simple-line-icons/css/simple-line-icons.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('backend/assets/icon/icofont/css/icofont.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('backend/assets/icon/themify-icons/themify-icons.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('backend/css/style.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('backend/assets/icon/feather/css/feather.css')}}" />
    <!-- <link rel="stylesheet" type="text/css" href="{{ asset('backend/bower_components/switchery/dist/switchery.min.css') }}"> -->
    <link rel="stylesheet" type="text/css" href="{{asset('backend/assets/css/custom.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('backend/assets/css/sweetalert.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('backend/css/jquery.mCustomScrollbar.css')}}" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/themes/base/jquery-ui.css" type="text/css" media="all" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <!-- Chartlist chart css -->
    <link rel="stylesheet" type="text/css" href="{{asset('backend/css/chartist.css')}}">
    
    <!-- Color Picker css -->

    <!-- Tags css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/bower_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    
    @yield('customHeader')
    @toastr_css
</head>

<body>
    <!-- Pre-loader start -->
    <div class="theme-loader">
        <div class="ball-scale">
            <div class="contain">
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Pre-loader end -->
    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">
            <nav class="navbar header-navbar pcoded-header">
                <div class="navbar-wrapper">
                    <div class="navbar-logo">
                        <a class="mobile-menu" id="mobile-collapse" href="#">
                            <i class="feather icon-menu"></i>
                        </a>
                        <a href="{{ url('/backendPanel/dashboard') }}">
                            Admin Panel
                        </a>
                        <a class="mobile-options">
                            <i class="feather icon-more-horizontal"></i>
                        </a>
                    </div>

                    <div class="navbar-container">
                        <ul class="nav-left">
                            <li class="header-search">
                                <div class="main-search morphsearch-search">
                                    <div class="input-group">
                                        <span class="input-group-addon search-close"><i class="feather icon-x"></i></span>
                                        <input type="text" class="form-control" />
                                        <span class="input-group-addon search-btn"><i class="feather icon-search"></i></span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <a href="#" onclick="javascript:toggleFullScreen()">
                                    <i class="feather icon-maximize full-screen"></i>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav-right">

                            <li class="user-profile header-notification">
                                <div class="dropdown-primary dropdown">
                                    <div class="dropdown-toggle" data-toggle="dropdown">
                                        <img src="{{asset('backend/images/avatar-4.jpg')}}" class="img-radius" alt="User-Profile-Image" />
                                        <span>{{ session()->get('name') }}</span>
                                        <i class="feather icon-chevron-down"></i>
                                    </div>
                                    <ul class="show-notification profile-notification dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                        <li>
                                            <a href="{{ url('user/logout') }}"><i class="feather icon-log-out"></i>Logout </a>


                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <!-- Sidebar chat start -->
            <div id="sidebar" class="users p-chat-user showChat">
                <div class="had-container">
                    <div class="card card_main p-fixed users-main">
                        <div class="user-box">
                            <div class="chat-inner-header">
                                <div class="back_chatBox">
                                    <div class="right-icon-control">
                                        <input type="text" class="form-control search-text" placeholder="Search Friend" id="search-friends" />
                                        <div class="form-icon">
                                            <i class="icofont icofont-search"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="main-friend-list">
                                <div class="media userlist-box" data-id="1" data-status="online" data-username="Josephin Doe" data-toggle="tooltip" data-placement="left" title="Josephin Doe">
                                    <a class="media-left" href="#">
                                        <img class="media-object img-radius img-radius" src="{{asset('backend/images/avatar-3.jpg')}}" alt="Generic placeholder image " />
                                        <div class="live-status bg-success"></div>
                                    </a>
                                    <div class="media-body">
                                        <div class="f-13 chat-header">Josephin Doe</div>
                                    </div>
                                </div>
                                <div class="media userlist-box" data-id="2" data-status="online" data-username="Lary Doe" data-toggle="tooltip" data-placement="left" title="Lary Doe">
                                    <a class="media-left" href="#">
                                        <img class="media-object img-radius" src="{{asset('backend/images/avatar-2.jpg')}}" alt="Generic placeholder image" />
                                        <div class="live-status bg-success"></div>
                                    </a>
                                    <div class="media-body">
                                        <div class="f-13 chat-header">Lary Doe</div>
                                    </div>
                                </div>
                                <div class="media userlist-box" data-id="3" data-status="online" data-username="Alice" data-toggle="tooltip" data-placement="left" title="Alice">
                                    <a class="media-left" href="#">
                                        <img class="media-object img-radius" src="{{asset('backend/images/avatar-4.jpg')}}" alt="Generic placeholder image" />
                                        <div class="live-status bg-success"></div>
                                    </a>
                                    <div class="media-body">
                                        <div class="f-13 chat-header">Alice</div>
                                    </div>
                                </div>
                                <div class="media userlist-box" data-id="4" data-status="online" data-username="Alia" data-toggle="tooltip" data-placement="left" title="Alia">
                                    <a class="media-left" href="#">
                                        <img class="media-object img-radius" src="{{asset('backend/images/avatar-3.jpg')}}" alt="Generic placeholder image" />
                                        <div class="live-status bg-success"></div>
                                    </a>
                                    <div class="media-body">
                                        <div class="f-13 chat-header">Alia</div>
                                    </div>
                                </div>
                                <div class="media userlist-box" data-id="5" data-status="online" data-username="Suzen" data-toggle="tooltip" data-placement="left" title="Suzen">
                                    <a class="media-left" href="#">
                                        <img class="media-object img-radius" src="{{asset('backend/images/avatar-2.jpg')}}" alt="Generic placeholder image" />
                                        <div class="live-status bg-success"></div>
                                    </a>
                                    <div class="media-body">
                                        <div class="f-13 chat-header">Suzen</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sidebar inner chat start-->
            <div class="showChat_inner">
                <div class="media chat-inner-header">
                    <a class="back_chatBox"> <i class="feather icon-chevron-left"></i> Josephin Doe </a>
                </div>
                <div class="media chat-messages">
                    <a class="media-left photo-table" href="#">
                        <img class="media-object img-radius img-radius m-t-5" src="{{asset('backend/images/avatar-3.jpg')}}" alt="Generic placeholder image" />
                    </a>
                    <div class="media-body chat-menu-content">
                        <div class="">
                            <p class="chat-cont">I'm just looking around. Will you tell me something about yourself?</p>
                            <p class="chat-time">8:20 a.m.</p>
                        </div>
                    </div>
                </div>
                <div class="media chat-messages">
                    <div class="media-body chat-menu-reply">
                        <div class="">
                            <p class="chat-cont">I'm just looking around. Will you tell me something about yourself?</p>
                            <p class="chat-time">8:20 a.m.</p>
                        </div>
                    </div>
                    <div class="media-right photo-table">
                        <a href="#">
                            <img class="media-object img-radius img-radius m-t-5" src="{{asset('backend/images/avatar-4.jpg')}}" alt="Generic placeholder image" />
                        </a>
                    </div>
                </div>
                <div class="chat-reply-box p-b-20">
                    <div class="right-icon-control">
                        <input type="text" class="form-control search-text" placeholder="Share Your Thoughts" />
                        <div class="form-icon">
                            <i class="feather icon-navigation"></i>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sidebar inner chat end-->
            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
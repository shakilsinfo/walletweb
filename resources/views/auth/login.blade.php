<!DOCTYPE html>
<html lang="en">

<head>
    <title> P2P Wallet Login </title>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="#">
    <meta name="keywords"
        content="Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
    <meta name="author" content="#">
    <!-- Favicon icon -->
    <link rel="icon" href="{{asset('backend/images/fac.png')}}" type="image/x-icon">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="{{asset('backend/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href="{{asset('backend/icon/themify-icons/themify-icons.css')}}">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="{{asset('backend/icon/icofont/css/icofont.css')}}">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="{{asset('backend/css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('backend/assets/css/sweetalert.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('backend/assets/css/custom.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href='https://fonts.googleapis.com/css?family=Lobster' rel='stylesheet'>
    @toastr_css

    <style type="text/css">
        .text-danger{
            color: #ff0000;
        }
        .text-success{
            color: green;
        }
    </style>
</head>


<body class="fix-menu">
    <!-- Pre-loader start -->
    <div class="theme-loader">
        <div class="ball-scale">
            <div class='contain'>
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

    <section class="login-block">
        <!-- Container-fluid starts -->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <!-- Authentication card start -->
                    <form id="frm_login" class="md-float-material form-material" action="{{url('user/login')}}" method="POST">
                        @csrf
                        <div class="auth-box card" style="border-radius: 25px;">
                            <div class="card-block login_form" >
                                <div class="row m-b-2">
                                    <div class="col-md-12">
                                        <div class="text-center">
                                            <!-- <img src="{{asset('backend/images/logo.png')}}" alt="logo.png" style="height:90px"><br> -->
                                        </div>
                                    </div>
                                </div>
                                <div style="padding: 5px;">Enter your registered Email and Password</div>
                                @if(Session::has('error'))
                                <div class="form-group text-danger">
                                    {{ Session::get('error') }}
                                    @php
                                    Session::forget('error');
                                    @endphp
                                </div>
                                @elseif(Session::has('success'))
                                <div class="form-group text-success">
                                    {{ Session::get('success') }}
                                    @php
                                    Session::forget('success');
                                    @endphp
                                </div>
                                @endif
                                <div class="form-group form-primary" style="padding-top:30px !important;">
                                    <div class="input-group mb-3">
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" 
                                                name="email" value="{{ old('email') }}" required autocomplete="email" autofocus 
                                                placeholder="username@geophonebd.com">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="fa fa-envelope"></span>
                                                </div>
                                            </div>
                                        </div>
                                    
                                    <!-- <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Your Email Address"> -->
                                    @error('email')
                                        <span class="invalid-feedback form-bar" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    
                                </div>
                                <div class="form-group form-primary">

                                    <div class="input-group mb-3">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" 
                                            name="password" required autocomplete="current-password" placeholder="******" >
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fa fa-lock" style="width: 16px;"></span>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password"> -->
                                    @error('password')
                                    <span class="form-bar" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <label id="red_text" class="text-center" style="color: red"></label>
                                <div class="row">
                                    <div class="col-md-12" style="text-align:center;">
                                        <span id="loader" class="spinner-border spinner-border-sm" role="status" aria-hidden="true" style="display:none"></span>
                                        <button id="btn_signin" type="submit" class="btn btn-primary btn-sm login_submit" style=""> <b id="btn_signin_text">Log In</b> </button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </form>
                    <!-- end of form -->
                </div>
                <!-- end of col-sm-12 -->
            </div>
            <!-- end of row -->
        </div>
        <!-- end of container-fluid -->
    </section>
    
    <script type="text/javascript" src="{{asset('backend/bower_components/jquery/dist/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('backend/bower_components/jquery-ui/jquery-ui.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('backend/bower_components/popper.js/dist/umd/popper.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('backend/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="{{asset('backend/bower_components/jquery-slimscroll/jquery.slimscroll.js')}}"></script>
    <!-- modernizr js -->
    <script type="text/javascript" src="{{asset('backend/bower_components/modernizr/modernizr.js')}}"></script>
    <script type="text/javascript" src="{{asset('backend/bower_components/modernizr/feature-detects/css-scrollbars.js')}}"></script>
    <!-- i18next.min.js -->
    <script type="text/javascript" src="{{asset('backend/bower_components/i18next/i18next.min.js')}}"></script>
    <script type="text/javascript"
        src="{{asset('backend/bower_components/i18next-xhr-backend/i18nextXHRBackend.min.js')}}"></script>
    <script type="text/javascript"
        src="{{asset('backend/bower_components/i18next-browser-languagedetector/i18nextBrowserLanguageDetector.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('backend/bower_components/jquery-i18next/jquery-i18next.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('backend/assets/js/sweetalert.js')}}"></script>
    <script type="text/javascript" src="{{asset('backend/js/common-pages.js')}}"></script>
    @toastr_js
    @toastr_render
   
  </body>
</html>
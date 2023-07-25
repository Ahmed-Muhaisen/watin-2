<!DOCTYPE html>
<html lang="en">

<head>

    <title>@yield('title',@config('app.name'))</title>
    <!--

Eatery Cafe Template

http://www.templatemo.com/tm-515-eatery

-->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="stylesheet" href="{{asset('website_assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('website_assets/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('website_assets/css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('website_assets/css/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('website_assets/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('website_assets/css/magnific-popup.css')}}">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{asset('website_assets/css/templatemo-style.css')}}">
    <link rel="stylesheet" href="{{asset('website_assets/css/style.css')}}">
    @yield('style')
</head>

<body>

    <!-- PRE LOADER -->
    <section class="preloader">
        <div class="spinner">

            <span class="spinner-rotate"></span>

        </div>
    </section>


    <!-- MENU -->
    <section style="@yield('style_header')" class="navbar custom-navbar navbar-fixed-top" role="navigation">
        <div class="header">

            <div class="navbar-header" style="    display: flex;
            align-items: center;">
                <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon icon-bar"></span>
                    <span class="icon icon-bar"></span>
                    <span class="icon icon-bar"></span>
                </button>

                @if(Auth::id())

                <li class="nav-item dropdown " style="    margin-right: 30px;
                background: #dbdbdb;
                padding: 0 14px;
                list-style: none;
                font-size: 16px; ">
                    <a class="nav-link dropdown-toggle" style="color: #026b3f; " href="" id="navbar3" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ Auth::user()->name }} <i class="fa fa-angle-down"></i>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbar3">
                        <a class="dropdown-item " style="
                        text-align: center;
                        padding-top: 5px;
                        display: block;" href="{{route('website.my_Cards')}}">
                            سلة المشتريات                        </a>
                        <br style="background: #f13959;
                        display: inline-block;
                        height: 1px;
                        content: '';
                        width: 100%;">
                        <a class="dropdown-item" style="
                        text-align: center;
                        padding: 5px 0;
                        display: block;" href="{{ route('logout') }}" >
                            <i class=" fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Logout
                        </a>
                    </div>
                </li>



                @else
                <button><a href="{{ route('login') }}" class="btn btn-main btn-small m-auto"><i
                            class="fa fa-sign-in-alt mr-2"></i>تسجيل الدخول</a></button>



                @endif





                <!-- lOGO TEXT HERE -->
                <a href="{{route('index')}}" class="navbar-brand">مطاعم <span>.</span> تك</a>
            </div>

        <!-- MENU LINKS -->
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav d-flex flex-row reverse-content">
                <li><a href="{{route('index')}}" class="smoothScroll">الرئيسية</a></li>
                <li><a href="{{ route('website.about') }}" class="smoothScroll">من نحن</a></li>
                <li><a href="{{ route('website.all_restaurants') }}" class="smoothScroll">المطاعم</a></li>
                <li><a href="{{ route('website.best_products') }}" class="smoothScroll">أشهر الوجبات</a></li>
                <li><a href="{{ route('website.contact') }}" class="smoothScroll">تواصل معنا</a></li>
            </ul>



        </div>
    </section>


    @yield('contint')



    <!-- FOOTER -->
    <footer id="footer" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row">

                <div class="col-md-3 col-sm-8">
                    <div class="footer-info">
                        <div class="section-title">
                            <h2 class="wow fadeInUp" data-wow-delay="0.2s">Find us</h2>
                        </div>
                        <address class="wow fadeInUp" data-wow-delay="0.4s">
                            <p>123 nulla a cursus rhoncus,<br> augue sem viverra 10870<br>id ultricies sapien</p>
                        </address>
                    </div>
                </div>

                <div class="col-md-3 col-sm-8">
                    <div class="footer-info">
                        <div class="section-title">
                            <h2 class="wow fadeInUp" data-wow-delay="0.2s">Reservation</h2>
                        </div>
                        <address class="wow fadeInUp" data-wow-delay="0.4s">
                            <p>090-080-0650 | 090-070-0430</p>
                            <p><a href="mailto:info@company.com">info@company.com</a></p>
                            <p>LINE: eatery247 </p>
                        </address>
                    </div>
                </div>

                <div class="col-md-4 col-sm-8">
                    <div class="footer-info footer-open-hour">
                        <div class="section-title">
                            <h2 class="wow fadeInUp" data-wow-delay="0.2s">Open Hours</h2>
                        </div>
                        <div class="wow fadeInUp" data-wow-delay="0.4s">
                            <p>Monday: Closed</p>
                            <div>
                                <strong>Tuesday to Friday</strong>
                                <p>7:00 AM - 9:00 PM</p>
                            </div>
                            <div>
                                <strong>Saturday - Sunday</strong>
                                <p>11:00 AM - 10:00 PM</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-2 col-sm-4">
                    <ul class="wow fadeInUp social-icon" data-wow-delay="0.4s">
                        <li><a href="#" class="fa fa-facebook-square" attr="facebook icon"></a></li>
                        <li><a href="#" class="fa fa-twitter"></a></li>
                        <li><a href="#" class="fa fa-instagram"></a></li>
                        <li><a href="#" class="fa fa-google"></a></li>
                    </ul>

                    <div class="wow fadeInUp copyright-text" data-wow-delay="0.8s">
                        <p><br>Copyright &copy; 2018 <br>Your Company Name

                            <br><br>Design: TemplateMo
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </footer>


    <!-- SCRIPTS -->
    <script src="{{asset('website_assets/js/jquery.js')}}"></script>
    <script src="{{asset('website_assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('website_assets/js/jquery.stellar.min.js')}}"></script>
    <script src="{{asset('website_assets/js/wow.min.js')}}"></script>
    <script src="{{asset('website_assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('website_assets/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('website_assets/js/smoothscroll.js')}}"></script>
    <script src="{{asset('website_assets/js/custom.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    @yield("script")

</body>

</html>

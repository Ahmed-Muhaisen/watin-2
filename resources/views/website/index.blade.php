@extends('website.master')
@section('title', 'Home Page')
@section('contint')


<!-- HOME -->
<section id="home" class="slider" data-stellar-background-ratio="0.5">
    <div class="row">

        <div class="owl-carousel owl-theme">
            <div class="item item-first">
                <div class="caption">
                    <div class="container">
                        <div class="col-md-8 col-sm-12 container_text">
                            <h3>مطاعم تك</h3>
                            <h1>مهمتنا هي تقديم تجربة لا تُنسى</h1>
                            <a href="#team" class="section-btn btn btn-default smoothScroll">رؤية المطاعم</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="item item-second">
                <div class="caption">
                    <div class="container">
                        <div class="col-md-8 col-sm-12 container_text">
                            <h3>فطورك المثالي</h3>
                            <h1>يمكن أن تكون أفضل جودة لتناول الطعام هنا أيضًا!</h1>
                            <a href="#menu" class="section-btn btn btn-default smoothScroll">اكتشف القائمة</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="item item-third">
                <div class="caption">
                    <div class="container">
                        <div class="col-md-8 col-sm-12 container_text">
                            <h3> مطعم جديد في المدينة</h3>
                            <h1>استمتع بقوائمنا المميزة كل يوم أحد وجمعة</h1>
                            <a href="#contact" class="section-btn btn btn-default smoothScroll">حجز</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>


<!-- ABOUT -->
@include('website/about',[$image="website_assets/images/about-image.jpg"])

@include('website/all_restaurants')

<!-- MENU-->
@include('website/best_products')
@include('website/contact')

@endsection


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
     <section id="about" data-stellar-background-ratio="0.5">
          <div class="text-end">
               <div class="row reverse-content" style="text-align:right;  ">

                    <div class="col-md-6 col-sm-12">
                         <div class="about-info">
                              <div class="section-title wow fadeInUp" data-wow-delay="0.2s">
                                   <h4>Read our story</h4>
                                   <h2>أطلب وجبتك المفضلة وإنتا مرتاح كلها تكة زر</h2>
                              </div>

                              <div class="wow fadeInUp" data-wow-delay="0.4s">

                                   <p style="font-size:18px; line-height: 30px; ">يتضمن هذا الموقع العديد من المطاعم المميزة ويمكنك من رؤية وجباتهم وطلب الوجبة التي تشتهيها بضغطت زر كل ما عليك الإشتراك بالموقع ليتسنى لك الإستمتاع بالتجربة معنا
                                    يتضمن هذا الموقع العديد من المطاعم المميزة ويمكنك من رؤية وجباتهم وطلب الوجبة التي تشتهيها بضغطت زر كل ما عليك الإشتراك بالموقع ليتسنى لك الإستمتاع بالتجربة معنا</p>
                              </div>
                         </div>
                    </div>

                    <div class="col-md-6 col-sm-12">
                         <div class="wow fadeInUp about-image" data-wow-delay="0.6s">
                              <img src="{{asset('website_assets/images/about-image.jpg')}}" class="img-responsive" alt="">
                         </div>
                    </div>

               </div>
          </div>
     </section>


     <!-- Restaurants -->
     <section id="team" data-stellar-background-ratio="0.5">
          <div class="container">
               <div class="row">

                    <div class="col-md-12 col-sm-12">
                         <div class="section-title wow fadeInUp" data-wow-delay="0.1s">
                              <h2>المطاعم المتوفرة</h2>
                              <h4>كل المطاعم الموجودة في الموقع</h4>
                         </div>
                    </div>

                    @foreach ($restaurant as $item )
                    <div class="col-md-4 col-sm-4 image-container">
                         <div class="team-thumb wow fadeInUp image-hight" data-wow-delay="0.4s">
                              <img src="{{asset($item->image)}}" style="object-fit: cover; height: 100%;" class="img-responsive" alt="">
                                   <div class="team-hover">
                                        <div class="team-item">
                                             <h4>قم بزيارة صفحتنا</h4>
                                             <ul class="social-icon">

                                                  <li><a href="{{ route('website.restaurant',$item->id)}}" class="fa fa-flickr"></a></li>
                                             </ul>
                                        </div>
                                   </div>
                         </div>
                         <div class="team-info">
                              <h3><a href="{{ route('website.restaurant',$item->id)}}">{{ $item->name }}</a></h3>
                              <p>{{ $item->address }}</p>
                         </div>
                    </div>
                    @endforeach


               </div>
          </div>
     </section>


     <!-- MENU-->
     <section id="menu" data-stellar-background-ratio="0.5">
          <div class="container">
               <div class="row prodect-contiainer">

                    <div class="col-md-12 col-sm-12">
                         <div class="section-title wow fadeInUp" data-wow-delay="0.1s">
                              <h2>أشهر الوجبات الموجودة</h2>
                              <h4>Tea Time &amp; Dining</h4>
                         </div>
                    </div>

                    @foreach ($products as $item)
                    <div class="col-md-4 col-sm-6 image-container2">
                         <!-- MENU THUMB -->
                         <div class="menu-thumb image-hight2">
                            <a href="{{ route('website.product',$item) }}" class="" title="American Breakfast">
                                   <img src="{{asset($item->image)}}" class="img-responsive" alt="" style="object-fit:cover">

                                   <div class="menu-info">
                                        <div class="menu-item">
                                             <h3>{{ $item->name }}</h3>
                                             <p>{{'قسم '.$item->category->name .' / مطعم ' . $item->restaurant->name }} </p>
                                        </div>
                                        <div class="menu-price">
                                             <span>{{$item->price}}<span>شيكل</span></span>
                                        </div>
                                   </div>
                              </a>
                         </div>
                    </div>
                    @endforeach

               </div>
          </div>
     </section>



     <!-- CONTACT -->
     <section id="contact" data-stellar-background-ratio="0.5">
          <div class="container">
               <div class="row">
	<!-- How to change your own map point
            1. Go to Google Maps
            2. Click on your location point
            3. Click "Share" and choose "Embed map" tab
            4. Copy only URL and paste it within the src="" field below
	-->
                    <div class="wow fadeInUp col-md-6 col-sm-12" data-wow-delay="0.4s">
                         <div id="google-map">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3401.0914417586837!2d34.445001270511526!3d31.52164837568305!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14fd7fb84d887323%3A0xe087afcc1e6f2321!2z2YXYt9i52YUg2KjYp9mE2YXZitix2Kc!5e0!3m2!1sen!2sus!4v1689454510986!5m2!1sen!2sus" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                         </div>
                    </div>

                    <div class="col-md-6 col-sm-12">

                         <div class="col-md-12 col-sm-12">
                              <div class="section-title wow fadeInUp" data-wow-delay="0.1s">
                                   <h2>تواصل معنا</h2>
                              </div>
                         </div>

                         <!-- CONTACT FORM -->
                         <form action="{{ route('website.contact') }}" method="post" >
                                @csrf


                              <div class="col-md-6 col-sm-6">
                                   <input type="text" class="form-control" id="cf-name" name="name" placeholder="الإسم كاملا">
                              </div>

                              <div class="col-md-6 col-sm-6">
                                   <input type="email" class="form-control" id="cf-email" name="email" placeholder="الإيميل">
                              </div>

                              <div class="col-md-12 col-sm-12">
                                   <input type="text" class="form-control" id="cf-subject" name="subject" placeholder="الموضوع">

                                   <textarea class="form-control" rows="6" id="cf-message" name="message" placeholder="أخبرنا حول تجربتك"></textarea>

                                   <button type="submit" class="form-control" id="cf-submit" >إرسال</button>
                              </div>
                         </form>
                    </div>

               </div>
          </div>
     </section>

     @endsection

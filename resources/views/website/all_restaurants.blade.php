
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
                    <img src="{{asset($item->image)}}" style="object-fit: cover; height: 100%;" class="img-responsive"
                        alt="">
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

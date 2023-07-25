

<!-- MENU-->
<section id="menu" data-stellar-background-ratio="0.5">
    <div class="container">
        <div class="row prodect-contiainer">

            <div class="col-md-12 col-sm-12">
                <div class="section-title wow fadeInUp" data-wow-delay="0.1s">
                    <h2>
                        @if(isset($title))
                        {{ $title }}
                    @else
                    أشهر الوجبات الموجودة</h2>
                    @endif
                    <h4>Tea Time &amp; Dining</h4>
                </div>
            </div>

            @foreach ($products as $item)
            <div class="col-md-4 col-sm-6 image-container2">
                <!-- MENU THUMB -->
                <div class="menu-thumb image-hight2">

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
                @if(!isset($title))
                        <div class="menu-price addToCard">
                            <form action="{{ route('website.addToCard',$item) }}" method="post">
                                @csrf
                           <button> <span>+ إضافة إلى السلة</span></button>
                        </form>
                        </div>

                @endif
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>


@extends('website.master')
@section('title', $product->name)
@section('contint')
@section('style_header','background:black;color:#fff')
@section('style')

<main class="container" style="direction: rtl; margin-top: 200px; width: 70%; ">

    <!-- Left Column / Headphones Image -->
        <div class="col-md-8 col-sm-12" style="    display: flex;
        flex-direction: row-reverse;" >
             <div class="wow fadeInUp about-image" data-wow-delay="0.6s">
                  <img src="{{asset($product->image)}}" style="     margin: 0 auto;
                  width: 468px;
                  object-fit: cover;
                  height: 362px;" class="img-responsive" alt="">
             </div>
        </div>



    <!-- Right Column -->
    <div class="right-column" style="width: 30%; margin-bottom: 100px; height: 100%; margin-left: 100px;">

        <!-- Product Description -->
        <div class="col-md-12 col-sm-12">
            <div class="section-title wow fadeInUp" data-wow-delay="0.1s">
                <h3 style="font-size: 18px;">{{ $product->restaurant->name }}</h3>
                <h2 style="margin-top: 10px;">{{$product->name }}</h2>

            </div>
        </div>

        <!-- Product Configuration -->
        <div class="product-configuration app" >

            <!-- Product Color -->
            <form action="{{ route('website.order.store',$product) }}" method="post">
                @csrf
                <div class="col-md-12 col-sm-12">
                    <div class="section-title wow fadeInUp" data-wow-delay="0.1s"
                        style="display: flex; justify-content: space-between;">
                        <div class="pay-part">
                            <p>السعر</p>
                            <p>{{$product->price }} شيكل</p>
                        </div>

                        <div class="pay-part">
                            <p>الكمية</p>
                            <input type="number" name="quantity" id="" style="width: 60px; height:30px; padding: 10px; border:1px solid rgb(207, 207, 207)"
                            v-model="quantity">
                        </div>
                        <div class="pay-part">
                            <p>الإجمالي</p>
                            <p v-text="quantity *{{$product->price}}"> شيكل</p>
                        </div>
                    </div>
                </div>
                <!-- Cable Configuration -->
                <button style="width: 100%; height: 58px; background: #8f2933; border: 0; color: #fff; margin-top: 20px;">شراء
                    الوجبة</button>


            </form>

        </div>
    </div>



    </div>
    </div>
</main>

@section('script')
<script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
<script src="{{asset('website_assets/js/app.js')}}"></script>
@endsection

@endsection

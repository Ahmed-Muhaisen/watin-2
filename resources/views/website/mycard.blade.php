<div style="width: 90%; margin:100px auto ; padding-top: 100px;" class="app" @addQuantity="addvaluequantity">

<form action="{{ route('website.payCard') }}" method="post">
    @csrf
<div class="d-flex" style="display: flex; flex-wrap: wrap; ">
    @foreach ($product as $product)
    <!-- Left Column / Headphones Image -->
    <main class="container" style="display: flex; width: 48%; ">
        <div class="col-md-6 col-sm-12">
            <div class="wow fadeInUp about-image" data-wow-delay="0.6s">
                <img src="{{asset($product->image)}}" style="     margin: 0 auto;
                  width: 468px;
                  object-fit: cover;
                  height: 300px;" class="img-responsive" alt="">
            </div>
        </div>



        <!-- Right Column -->
        <div class="right-column" style="width: 50%; margin-bottom: 100px; height: 300px; text-align: right; padding-top: 40px;  border:1px solid rgba(156, 156, 156, 0.534); border-top-right-radius: 10px;
        border-bottom-right-radius: 10px; overflow: hidden;">

            <!-- Product Description -->
            <div class="col-md-12 col-sm-12">
                <div class="section-title wow fadeInUp" data-wow-delay="0.1s">
                    <h3 style="font-size: 18px;">{{ $product->restaurant->name }}</h3>
                    <h2 style="margin-top: 10px;">{{$product->name }}</h2>

                </div>
            </div>
            <input type="hidden" name="product_id[]" value="{{$product->id}}">
            <!-- Product Configuration -->
            <div class="product-configuration">

                <!-- Product Color -->



                <div class="col-md-12 col-sm-12">

                    <div class="menu-price addToCard-x">

                    <button class="delete" @click.prevent="submitForm({{ $product->id }})"> <span>x</span></button>
                    </div>
                    <div class="section-title wow fadeInUp" data-wow-delay="0.1s"
                        style="display: flex; flex-direction: row-reverse; justify-content: space-between;">

                        <div class="pay-part">
                            <p>السعر</p>
                            <p>{{$product->price }} شيكل</p>
                        </div>

                        <div class="pay-part">
                            <p>الكمية</p>
                       <quantity :key="{{ $loop->iteration }}"></quantity>
                        </div>
                        <div class="pay-part">
                            <p>الإجمالي</p>
                            <p v-text="quantity *{{$product->price}}"> شيكل</p>
                        </div>
                    </div>
                </div>
                <!-- Cable Configuration -->
            </div>
        </div>




    </main>
    @endforeach
</div>

    <button style="width: 100%; height: 58px; background: #8f2933; border: 0; color: #fff; display:block; margin: 20px auto;">شراء
        الوجبة</button>


</form>

<form id="delete_form" action="" method="post">
    @csrf
  @method('delete')

</form>

</div>


@section('script')
<script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
<script src="{{asset('website_assets/js/app.js')}}"></script>
@endsection

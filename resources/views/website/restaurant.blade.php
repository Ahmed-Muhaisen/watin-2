
@include('website/about',[$image=$restaurant->image])

<!-- MENU-->
@include('website/best_products' ,[$products=$restaurant->product])
@include('website/contact')


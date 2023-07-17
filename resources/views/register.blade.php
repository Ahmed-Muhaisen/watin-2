

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" >
    <link rel="stylesheet" href="{{asset('assets/css/style.css')  }}">
  </head>
  <body class="p-5">

<div class="text-end mt-5 border p-5 w-50 m-auto ">
    <h1 class="m-5 mt-0 text-center">مستخدم جديد</h1>

    <form action="register-post" method="post" class="">
        @csrf

        <x-input title="الإسم" type="text" name="name" value=""/>
        <div class="my-3 ">


            <x-input title="الإيميل" type="email" name="email" value=""/>

            <x-input title="رقم الهاتف" type="number" name="phone" value=""/>

            <x-input title="عنوان السكن" type="text" name="address" value=""/>
            <x-input title="كلمة المرور" type="password" name="password" value=""/>

            <x-input title="تأكيد كلمة المرور" type="password" name="confirm-password" value=""/>



        <a href="{{ route("login") }}" class="">لدي حساب  بالفعل</a>
        <br>
<button type="submit" class= "m-auto mt-3 p-3 px-5 btn btn-info d-block" >تسجيل</button>
</form>


</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>


</body>
</html>

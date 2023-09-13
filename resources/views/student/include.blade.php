<?php
use App\Models\cart;
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="csrf-token" content="{{ csrf_token() }}">


    <link rel="shortcut icon" href="{{asset('admin/img/favicon.png')}}"type="image/x-icon">
  <!--=============== BOXICONS ===============-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


    <!--=============== SWIPER CSS ===============--> 
    <link rel="stylesheet" href="{{asset('admin/css/swiper-bundle.min.css')}}">


    <!--=============== CSS ===============-->
    <link rel="stylesheet" href="{{asset('admin/css/styles.css')}}">

    <title>Document</title>
</head>
<body>
@php $getcart = cart::products(); @endphp
<header class="header" id="header">
    <nav class="nav container">
        <a href="{{url('watch')}}" class="nav__logo">
            <i class='bx bxs-watch nav__logo-icon'></i> Rolex
        </a>
        <div class="nav__menu" id="nav-menu">
            <ul class="nav__list">
                <li class="nav__item">
                    <a href="#home" class="nav__link active-link">Home</a>
                </li>
                <li class="nav__item">
                    <a href="#featured" class="nav__link">Featured</a>
                </li>
                <li class="nav__item">
                    <a href="#products" class="nav__link">Products</a>
                </li>
                <li class="nav__item">
                    <a href="#new" class="nav__link">New</a>
                </li>
            </ul>
            <div class="nav__close" id="nav-close">
                <i class='bx bx-x' ></i>
            </div>
        </div>
        <div class="nav__btns">
            <!-- Theme change button -->
            <i class='bx bx-moon change-theme' id="theme-button"></i>
            <div class="nav__shop" id="cart-shop">
                <i class='bx bx-shopping-bag' >
                @foreach($getcart as $cartcount)
                <span class="cartCount" data-cart-count="{{$cartcount['prod_qty']}}"></span>
                </i>
                @endforeach
            </div>
            <div class="nav__toggle" id="nav-toggle">
                <i class='bx bx-grid-alt' ></i>
            </div>
        </div>
    </nav>
</header>


<div class="cart" id="cart">
      <a class='bx bx-x cart__close'   id="cart-close"></a>
      <h2 class="cart__title-center">My Cart</h2>
      @php $getcart = cart::products(); @endphp
      @php $total = 0; @endphp
      @foreach($getcart as $prods)
      <div class="cart__container col-mt-5" id="alldel">
        <input type="hidden" value="{{$prods['id']}}" class="proid">
          <article class="cart__card">
              <div class="cart__box">
                  <img src="{{asset('admin/img/'.$prods['product']['image'])}}" alt="" class="cart__img">
              </div>
              <div class="cart__details">
                  <h3 class="cart__title">{{$prods['product']['name']}}</h3>
                  <span class="cart__price prices">{{$prods['product']['price']}}$</span>
                  <div class="cart__amount">
                      <div class="cart__amount-content quantity">
                          <span class="cart__amount-box changqtys  chang" data-cardqty = "{{$prods['prod_qty']}}">
                              <i class='bx bx-minus'></i>
                          </span> 
                          <span class="cart__amount-number qty-input"  value = "{{$prods['prod_qty']}}">{{$prods['prod_qty']}}</span>
                          <span class="cart__amount-box changqty  chang" data-max="1000" data-cardqty = "{{$prods['prod_qty']}}">
                              <i class='bx bx-plus'></i>
                          </span>
                      </div>
                     <i class='bx bx-trash-alt cart__amount-trash' id="delcart" data-cart="{{$prods['id']}}"></i>
              </div>
          </article> 
      </div>
      @php $total += $prods['prod_qty'] * $prods['product']['price']; @endphp
      @endforeach
      <div class="cart__prices">
          <span class="cart__prices-item">total</span>
          <span class="cart__prices-total total">{{$total}}</span>
      </div>
      
  </div>
<!--==================== CART ====================-->
    <script src="{{asset('admin/js/swiper-bundle.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
 <!--=============== MAIN JS ===============-->
    <script src="{{asset('admin/js/jquery-3.6.4.min.js')}}"></script>
    <script src="{{asset('admin/js/watch.js')}}"></script>
</body>
</html>
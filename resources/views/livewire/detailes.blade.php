@include('livewire.wath')
<?php
use App\Models\multiimg;
use App\Models\product;
?>

<!DOCTYPE html>
   <html>
     <head>
       <meta charset="utf-8">
       <meta http-equiv="X-UA-Compatible" content="IE=edge">
       <title>Product Card/Page</title>
       <meta name="viewport" content="width=device-width, initial-scale=1">
       <link rel="stylesheet" href="{{asset('admin/css/detail.css')}}">
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
     </head>
     <body>
    
    <div class = "card-wrapper alldels">
      <div class = "card">
        <!-- card left -->
        <div class = "product-imgs">
          <div class = "img-display">
            <div class = "img-showcase">
              <img src =  "{{asset('admin/img/'.$product['image'])}}" class ='imgs' style="width: 300px" alt = "shoe image">
            </div>
          </div>
          @php
          $multiimgss = multiimg::where('id', $product['id'])->first();
          $multiimg = explode('|',$multiimgss->multiimg);
         @endphp
          <div class = "img-select">
          @foreach($multiimg as  $image)
          <a href="">
            <div class = "img-item"> 
                <img src =  "{{asset('admin/img/'.$image)}}" onclick="slidimg(this.src)" style="display: flex"  alt = "shoe image">
            </div>
            </a>
            @endforeach
          </div>
        </div>
        </div>
         
      
        <!-- card right -->
        <div class = "product-content">
          <h2 class = "product-title">nike shoes</h2>
          <a href = "#" class = "product-link">visit nike store</a>
          <div class = "product-rating">
            <i class = "fas fa-star"></i>
            <i class = "fas fa-star"></i>
            <i class = "fas fa-star"></i>
            <i class = "fas fa-star"></i>
            <i class = "fas fa-star-half-alt"></i>
            <span>4.7(21)</span>
          </div>

          <div class = "product-price">
            <p class = "last-price">Old Price: <span class='price'>{{$product['price']}}</span></p>
            <p class = "new-price">New Price: <span>$249.00 (5%)</span></p>
          </div>
          @if(session('succes'))
       <div class="alert alert-warning alert-dismissible fade show" role="alert">{{session('succes')}}
        </div>
        @endif
          <div class = "product-detail">
            <h2>about this item: </h2>
            <p>{{$product['description']}}</p>
            <ul>
              <li>Color: <span>Black</span></li>
              <li>Available: <span>in stock</span></li>
              <li>Category: <span>Shoes</span></li>
              <li>Shipping Area: <span>All over the world</span></li>
              <li>Shipping Fee: <span>Free</span></li>
            </ul>
          </div>
          <form wire:poll.600s action="{{url('carts/id')}}" method="POST"  enctype="multipart/form-data"> 
              @csrf
          <div class = "purchase-info">
          <input type="hidden" value="{{$product['id']}}" name='prod_id' class='proid'>
            <input type = "number" min = "1" value = "1" name="prod_qty" class="qty-input">
            <button class="button home__button"  type="submit">add to cart</button>
          </div>
          </form>

          <div class = "social-links">
            <p>Share At: </p>
            <a href = "#">
              <i class = "fab fa-facebook-f"></i>
            </a>
            <a href = "#">
              <i class = "fab fa-twitter"></i>
            </a>
            <a href = "#">
              <i class = "fab fa-instagram"></i>
            </a>
            <a href = "#">
              <i class = "fab fa-whatsapp"></i>
            </a>
            <a href = "#">
              <i class = "fab fa-pinterest"></i>
            </a>
          </div>
        </div>
      </div>
    </div>
  </body>
  <script src="{{asset('admin/js/includ.js')}}"></script>
</html>
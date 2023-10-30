<!DOCTYPE html>
<html>

<head>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <!-- Basic -->
  <base href="/public">
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>SHOPPING WITH ME </title>

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Dosis:400,500|Poppins:400,700&display=swap" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="home/css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="home/css/responsive.css" rel="stylesheet" />

  <style style="text/css">
    .product_detail-box .cartbro {
  display: flex;
  justify-content: space-between; 
  align-items: center; 
}

.product_detail-box .cartbro input {
  color: black;
  justify-content: center;
}

.product_detail-box .cartbro input[type="number"] {
  width: 100px; 
  margin: auto;
  margin-right: 10px;
}

.product_detail-box .cartbro input[type="submit"] {
  background-color: #ff47d9; 
  color: white; 
  border: none; 
  padding: 10px 10px; 
  border-radius: 5px; 
  cursor: pointer; 
  transition: background-color 0.3s; 
}
  </style>
</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
    <header class="header_section">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container">
          <a class="navbar-brand" href="index.html"<img src="home/images/logo 1.jpg" alt="" /><span>\        SHOOPINGKU
            </span>
          </a>

          <div class="navbar-collapse" id="">
            <div class="container">
              <div class=" mr-auto flex-column flex-lg-row align-items-center">
                <ul class="navbar-nav justify-content-between ">
                  <div class="d-none d-lg-flex">
                  </div>
                  <div class=" d-none d-lg-flex">
                    <li class="nav-item">
                        @if (Route::has('login'))
                        @auth
                        <x-app-layout>
                        </x-app-layout>
                        @else
                      <a class="nav-link" href="/register">
                        Login/Register
                      </a>
                      @endauth
                      @endif
                    </li>
                    <form class="form-inline my-2 ml-5 mb-3 mb-lg-0">  
                      <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit"></button>
                    </form>
                  </div>
                </ul>
              </div>
            </div>

            <div class="custom_menu-btn">
              <button onclick="openNav()"></button>
            </div>
            <div id="myNav" class="overlay">
              <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
              <div class="overlay-content">
                <a href="/">HOME</a>
                <a href="/product">PRODUCTS</a>
              </div>
            </div>
          </div>
        </nav>
      </div>
    </header>
  </div>
    <!-- end header section -->
    <!-- slider section -->
    
  <!-- end detail section -->

  <!-- products section -->
  <div class="container layout_padding">
    <div class="product_container">
      <a href="">
        <div class="product_box">
          <div class="product_img-box">
            <a href="{{url('/product_details',$product->id)}}">
            <img src="{{ asset('storage/product/' . $product->image) }}" alt="" class="images"/>
            </a>
            <span>
              Sale
            </span>
          </div>
          <div class="product_detail-box">
            @if($product->discount_price!=null)
            <span style="color:red;">
              ${{$product->discount_price}}
            </span>

            <span style="text-decoration:line-through">
              ${{$product->price}}
            </span>
            @else
              <span>
                ${{$product->price}}
              </span>
            @endif
            <p>
              {{$product->title}}
            </p>
            <p>
                Product Details: {{$product->description}}
            </p>
            <p>
              Product Category: {{$product->category}}
            </p>
            <p>
              Available Quantity: {{$product->quantity}}
            </p>
            <form action="{{url('add_cart',$product->id)}}" method="POST">
              @csrf
              <div class="cartbro">
              <input type="number" name="quantity" value="1" min="1" style="color:black;">
              <input type="submit" value="Add to cart">
            </div>
            </form>
            
          </div>
        </div>
      </a>
    </div>
  </div>

  <!-- end products section -->

 

  <!-- info section -->
  <section class="info_section layout_padding">
    <div class="container links_container">
      <div class="row ">
        <div class="col-md-3">
          <h3>
            CUSTOMER SERVICE
          </h3>
          <ul>
            <li>
              <a href="">
                International Help
              </a>
            </li>
            <li>
              <a href="">
                Contact Customer Care
              </a>
            </li>
            <li>
              <a href="">
                Return Policy
              </a>
            </li>
            <li>
              <a href="">
                Privacy Policy
              </a>
            </li>
            <li>
              <a href="">
                Shipping Information
              </a>
            </li>
            <li>
              <a href="">
                Promotion Terms
              </a>
            </li>
          </ul>
        </div>
        <div class="col-md-3">
          <h3>
            LET US HELP YOU
          </h3>
          <ul>
            <li>
              <a href="">
                Your Account
              </a>
            </li>
            <li>
              <a href="">
                Your Orders
              </a>
            </li>
            <li>
              <a href="">
                Shipping Rates & Policies
              </a>
            </li>
            <li>
              <a href="">
                Amazon Prime
              </a>
            </li>
            <li>
              <a href="">
                Returns & Replacements
              </a>
            </li>
            <li>
              <a href="">
                Help
              </a>
            </li>
          </ul>
        </div>
        <div class="col-md-3">
          <h3>
            INFORMATION
          </h3>
          <ul>
            <li>
              <a href="">
                About Us
              </a>
            </li>
            <li>
              <a href="">
                Careers
              </a>
            </li>
            <li>
              <a href="">
                Sell on shop
              </a>
            </li>
            <li>
              <a href="">
                Press & News
              </a>
            </li>
            <li>
              <a href="">
                Competitions
              </a>
            </li>
            <li>
              <a href="">
                Terms & Conditions
              </a>
            </li>
          </ul>
        </div>
        <div class="col-md-3">
          <h3>
            OUR SHOP
          </h3>
          <ul>
            <li>
              <a href="">
                Daily Deals
              </a>
            </li>
            <li>
              <a href="">
                App Only Deals
              </a>
            </li>
            <li>
              <a href="">
                Our Hottest Products
              </a>
            </li>
            <li>
              <a href="">
                Gift Vouchers
              </a>
            </li>
            <li>
              <a href="">
                Trending Product
              </a>
            </li>
            <li>
              <a href="">
                Hot Flash Sale
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="follow_container">
        <div class="row">
          <div class="col-md-9">
            <div class="app_container">
              <h3>
                DOWNLOAD OUR APPS

              </h3>
              <div>
                <img src="home/images/google-play.png" alt="">
                <img src="home/images/apple-store.png" alt="">
              </div>
            </div>
          </div>
          <div class="col-md-3 ">
            <div class="info_social">
              <div>
                <a href="">
                  <img src="home/images/fb.png" alt="">
                </a>
              </div>
              <div>
                <a href="">
                  <img src="home/images/twitter.png" alt="">
                </a>
              </div>
              <div>
                <a href="">
                  <img src="home/images/linkedin.png" alt="">
                </a>
              </div>
              <div>
                <a href="">
                  <img src="home/images/instagram.png" alt="">
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end info section -->

  <!-- footer section -->
  <section class="container-fluid footer_section">
    <p>
      Copyright &copy; 2019 All Rights Reserved By
      <a href="https://html.design/">Free Html Templates</a>
    </p>
  </section>
  <!-- footer section -->

  <script type="text/javascript" src="home/js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="home/js/bootstrap.js"></script>

  <script>
    function openNav() {
      document.getElementById("myNav").style.width = "100%";
    }

    function closeNav() {
      document.getElementById("myNav").style.width = "0%";
    }
  </script>
</body>

</html>
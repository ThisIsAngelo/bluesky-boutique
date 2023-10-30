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

  <script src="https://unpkg.com/feather-icons"></script>

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Dosis:400,500|Poppins:400,700&display=swap" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="home/css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="home/css/responsive.css" rel="stylesheet" />

  <style style="text/css">
     table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 80%;
            margin: auto;
        }

        td,
        th {
            border: 1px solid #000000;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
  </style>
</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
    <header class="header_section">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container">
          <a href="/"><i data-feather="arrow-left" style="color:white;"></i></a>
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
  @if (Session::has('payment_success'))
            <div class="alert alert-success text-center">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                <p>Payment successfull</p>
            </div>
        @endif    

        <!-- end slider section -->

        @if (session()->has('message'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                {{ session()->get('message') }}
            </div>
        @endif

        <table>
            <tr>
                <th>Product Title</th>
                <th>Product Quantity</th>
                <th>Price</th>
                <th>Image</th>
                <th>Action</th>
            </tr>

            <?php $totalPrice = 0; ?>

            @foreach ($carts as $cart)
                <tr>
                    <td>{{ $cart->product_title }}</td>
                    <td>{{ $cart->quantity }}</td>
                    <td>{{ $cart->price }}</td>
                    <td>
                        <img src="{{ asset('storage/product/' . $cart->image) }}" width="200" height="200" />
                    </td>
                    <td><a onclick="return confirm('Are you sure this product?')"
                            href="{{ url("/remove_cart/{$cart->id}") }}" class="btn btn-danger">Remove Product</a></td>
                </tr>

                <?php $totalPrice += $cart->price; ?>
            @endforeach


        </table>

        <h4 style="text-align:center; margin:auto; padding-top:20px;">Total Price : {{ number_format($totalPrice) }}</h4>

        <div style="margin:auto; padding: 30px; text-align:center;">
            <h4>Proceed to order</h4>
            <a href="{{ url('/cash_order') }}" class="btn btn-danger">Cash On Delivery</a>
            <a href="{{ url("/stripe/$totalPrice") }}" class="btn btn-danger">Pay using card</a>
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
  <script>
    feather.replace();
  </script>

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
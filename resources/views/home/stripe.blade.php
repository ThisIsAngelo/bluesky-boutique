<!DOCTYPE html>
<html>

<head>
    <base href="/public">
    <title>Laravel 9 - Stripe Payment Gateway Integration Example - ItSolutionStuff.com</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
    <!-- font awesome style -->
    <link href="home/css/font-awesome.min.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="home/css/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="home/css/responsive.css" rel="stylesheet" />
</head>

<body>
    <div class="hero_area" style="font-size: 15px;">
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

        <div class="container"  >


            <h1 style="text-align: center; color:white;">Pay using your card - Total Amount ${{ number_format($totalprice) }}</h1>

            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="panel panel-default credit-card-box">
                        <div class="panel-heading display-table">
                            <h3 class="panel-title">Payment Details</h3>
                        </div>
                        <div class="panel-body">

                            @if (Session::has('payment_success'))
                                <div class="alert alert-success text-center">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                    <p>{{ Session::get('success') }}</p>
                                </div>
                            @endif

                            <form role="form" action="{{ route('stripe.post', $totalprice) }}" method="post"
                                class="require-validation" data-cc-on-file="false"
                                data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" id="payment-form">
                                @csrf

                                <div class='form-row row'>
                                    <div class='col-xs-12 form-group required'>
                                        <label class='control-label'>Name on Card</label> <input class='form-control'
                                            size='4' type='text'>
                                    </div>
                                </div>

                                <div class='form-row row'>
                                    <div class='col-xs-12 form-group card required'>
                                        <label class='control-label'>Card Number</label> <input autocomplete='off'
                                            class='form-control card-number' size='4' type='text'>
                                    </div>
                                </div>

                                <div class='form-row row'>
                                    <div class='col-xs-12 col-md-4 form-group cvc required'>
                                        <label class='control-label'>CVC</label> <input autocomplete='off'
                                            class='form-control card-cvc' placeholder='ex. 311' size='4'
                                            type='text'>
                                    </div>
                                    <div class='col-xs-12 col-md-4 form-group expiration required'>
                                        <label class='control-label'>Expiration Month</label> <input
                                            class='form-control card-expiry-month' placeholder='MM' size='2'
                                            type='text'>
                                    </div>
                                    <div class='col-xs-12 col-md-4 form-group expiration required'>
                                        <label class='control-label'>Expiration Year</label> <input
                                            class='form-control card-expiry-year' placeholder='YYYY' size='4'
                                            type='text'>
                                    </div>
                                </div>

                                <div class='form-row row'>
                                    <div class='col-md-12 error form-group hide'>
                                        <div class='alert-danger alert'>Please correct the errors and try
                                            again.</div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-xs-12">
                                        <button class="btn btn-primary btn-lg btn-block" type="submit">Pay Now
                                        </button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
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

</body>

<script type="text/javascript" src="https://js.stripe.com/v2/"></script>

<script type="text/javascript">
    $(function() {

        /*------------------------------------------
        --------------------------------------------
        Stripe Payment Code
        --------------------------------------------
        --------------------------------------------*/

        var $form = $(".require-validation");

        $('form.require-validation').bind('submit', function(e) {
            var $form = $(".require-validation"),
                inputSelector = ['input[type=email]', 'input[type=password]',
                    'input[type=text]', 'input[type=file]',
                    'textarea'
                ].join(', '),
                $inputs = $form.find('.required').find(inputSelector),
                $errorMessage = $form.find('div.error'),
                valid = true;
            $errorMessage.addClass('hide');

            $('.has-error').removeClass('has-error');
            $inputs.each(function(i, el) {
                var $input = $(el);
                if ($input.val() === '') {
                    $input.parent().addClass('has-error');
                    $errorMessage.removeClass('hide');
                    e.preventDefault();
                }
            });

            if (!$form.data('cc-on-file')) {
                e.preventDefault();
                Stripe.setPublishableKey($form.data('stripe-publishable-key'));
                Stripe.createToken({
                    number: $('.card-number').val(),
                    cvc: $('.card-cvc').val(),
                    exp_month: $('.card-expiry-month').val(),
                    exp_year: $('.card-expiry-year').val()
                }, stripeResponseHandler);
            }

        });

        /*------------------------------------------
        --------------------------------------------
        Stripe Response Handler
        --------------------------------------------
        --------------------------------------------*/
        function stripeResponseHandler(status, response) {
            if (response.error) {
                $('.error')
                    .removeClass('hide')
                    .find('.alert')
                    .text(response.error.message);
            } else {
                /* token contains id, last4, and card type */
                var token = response['id'];

                $form.find('input[type=text]').empty();
                $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                $form.get(0).submit();
            }
        }

    });
</script>
<!-- jQery -->
<script src="home/js/jquery-3.4.1.min.js"></script>
<!-- popper js -->
<script src="home/js/popper.min.js"></script>
<!-- bootstrap js -->
<script src="home/js/bootstrap.js"></script>
<!-- custom js -->
<script src="home/js/custom.js"></script>

</html>
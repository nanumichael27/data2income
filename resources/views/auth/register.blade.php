<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title> Register - Data2Income - Earn juicy income with your Data </title>
  <!-- Favicon -->
  <link rel="shortcut icon" href="{{asset('images/favicon.ico')}}">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
  <!-- Typography CSS -->
  <link rel="stylesheet" href="{{asset('css/typography.css')}}">
  <!-- Style CSS -->
  <link rel="stylesheet" href="{{asset('css/style.css')}}">
  <!-- Responsive CSS -->
  <link rel="stylesheet" href="{{asset('css/responsive.css')}}">
</head>

<body>
  <!-- loading -->
  <div id="loading">
    <div id="loading-center">
      <img src="{{asset('images/loader.gif')}}" alt="loder">
    </div>
  </div>
  <!-- loading End -->

  <div class="login-from header-navbar register-form light-gray-bg position-relative">
    <div class="row no-gutters">
      <div class="col-lg-6 align-items-stretch position-relative white-bg">
        <nav class="navbar navbar-expand-lg navbar-light">

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                <a class="nav-link" href="index.html">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="privacy-policy.html">Privacy</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="terms.html">Terms</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="contact-us.html"> Contacts </a>
              </li>
            </ul>
          </div>
        </nav>
        <div class="login-info">
          <h2 class="iq-fw-8 mb-3">Register</h2>
          <h6>Welcome to <span class="main-color"> Data2Income </span> please Register your account.</h6>
          @if ($errors->any())
          <center>
            @foreach($errors->all() as $error)
            <div class="alert alert-warning">
              <strong>Warning!</strong> {{ $error }}.
            </div>
            @endforeach
          </center>
          @endif
          <form method="POST" action="{{route('register')}}">
            @csrf
            <div class="form-group">
              <input type="text" class="form-control" name="name" placeholder="Username" value="{{old('name')}}">

            </div>
            <div class="form-group">
              <input type="email" class="form-control" name="email" placeholder="Email Address" value="{{old('email')}}">

            </div>

            <div class="form-group">
              <input type="password" class="form-control" name="password" placeholder="Password">
            </div>
            <div class="form-group">
              <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password">
            </div>
            <div class="form-group form-check mb-4">
              <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
              <label class="form-check-label" for="exampleCheck1">By Clicking register, you agree on our <a href="terms.html"> Terms and Condition </a></label>
            </div>
            <button class="slide-button button mr-3" ">
              <div class="second">Register</div>
  </button>
            <a class="slide-button button bt-border" href="{{route('login')}}" style="top: 22px;">
              <div class="first">Login</div>
              <div class="second">Login</div>
            </a>
          </form>
        </div>
        <ul class="social-list">
          <li><a href="#"><i class="fab fa-whatsapp"></i></a></li>
          <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
          <li><a href="#"><i class="fab fa-instagram"></i></a></li>
          <li><a href="#"><i class="fab fa-twitter"></i></a></li>
          <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
        </ul>
      </div>
      <div class="col-lg-6 align-self-center position-relative">
        <div class="login-right-bar h-100 text-center">
          <center>
            <img src="{{asset('images/login/register.png')}}" class="img-fluid" alt="">
          </center>
        </div>

      </div>
    </div>
    <img src="{{asset('images/login/2.png')}}" class="img-fluid login-footer-one" alt="">
    <img src="{{asset('images/login/3.png')}}" class="img-fluid login-footer-two" alt="">
    <img src="{{asset('images/login/1.png')}}" class="img-fluid login-footer-three" alt="">
    <!-- back-to-top -->
    <div id="back-to-top">
      <a class="top" id="top" href="#top"><i class="ion-ios-arrow-thin-up"></i></a>
    </div>
    <!-- back-to-top End -->
  </div>

  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="{{asset('js/jquery-min.js')}}"></script>
  <!-- popper  -->
  <script src="{{asset('js/popper.min.js')}}"></script>
  <!--  bootstrap -->
  <script src="{{asset('js/bootstrap.min.js')}}"></script>
  <!-- Modernizr JavaScript -->
  <script src="{{asset('js/modernizr.js')}}"></script>
  <!-- Appear JavaScript -->
  <script src="{{asset('js/appear.min.js')}}"></script>
  <!-- Megamenu  -->
  <script src="{{asset('js/mega_menu.min.js')}}"></script>
  <!-- Timeline JavaScript -->
  <script src="{{asset('js/timeline.js')}}"></script>
  <!-- Wow -->
  <script src="{{asset('js/wow.min.js')}}"></script>
  <!-- scrollme -->
  <script src="{{asset('js/jquery.scrollme.min.js')}}"></script>
  <!-- countdown JavaScript -->
  <script src="{{asset('js/countdown.js')}}"></script>
  <!-- waypoints JavaScript -->
  <script src="{{asset('js/waypoints.min.js')}}"></script>
  <!-- Counterup JavaScript -->
  <script src="{{asset('js/jquery.counterup.min.js')}}"></script>
  <!-- Owl Carousel JavaScript -->
  <script src="{{asset('js/owl.carousel.min.js')}}"></script>
  <!-- Magnific Popup JavaScript -->
  <script src="{{asset('js/jquery.magnific-popup.min.js')}}"></script>
  <!-- Isotope JavaScript -->
  <script src="{{asset('js/isotope.pkgd.min.js')}}"></script>
  <!-- Progressbar JavaScript -->
  <script src="{{asset('js/circle-progress.min.js')}}"></script>
  <!-- Canvas JavaScript -->
  <script src="{{asset('js/canvasjs.min.js')}}"></script>
  <!-- Retina JavaScript -->
  <script src="{{asset('js/retina.min.js')}}"></script>
  <!-- Custom JavaScript -->
  <script src="{{asset('js/custom.js')}}"></script>
</body>

</html>
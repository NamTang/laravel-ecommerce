<!DOCTYPE htmlw>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="{{asset('/electro/css/bootstrap.min.css')}}" />

    <!-- Slick -->
    <link type="text/css" rel="stylesheet" href="{{asset('/electro/css/slick.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('/electro/css/slick-theme.css')}}" />

    <!-- nouislider -->
    <link type="text/css" rel="stylesheet" href="{{asset('/electro/css/nouislider.min.css')}}" />

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="{{asset('/electro/css/font-awesome.min.css')}}">

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="{{asset('/electro/css/style.css')}}" />

    <style media="screen">
        .page-link {
          z-index: 99999;
        }
    </style>
</head>


<body>
    @include("include.user_nav")

    @yield("content")


    <!-- FOOTER -->
    <footer id="footer">
        <!-- top footer -->
        <div class="section">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    <div class="col-md-3 col-xs-6">
                        <div class="footer">
                            <h3 class="footer-title">About Us</h3>
                            <p>Thảnh thơi mua sắm trực tuyến tại Electro với hàng ngàn sản phẩm từ đồ điện tử, thời trang. đồ gia dụng cho đến thực phẩm với giá ưu đãi, nhiều khuyến mãi đến giật mình với Electro.</p>
                            <ul class="footer-links">
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 col-xs-6">
                        <div class="footer">
                            <h3 class="footer-title">Contact</h3>
                            <ul class="footer-links">
                                <li><a href="#"><i class="fa fa-phone"></i>0367679832</a></li>
                                <li><a href="#"><i class="fa fa-envelope-o"></i>namkty96@gmail.com</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /top footer -->

        <!-- bottom footer -->
        <div id="bottom-footer" class="section">
            <div class="container">
                <!-- row -->
                <div class="row">
                    <div class="col-md-12 text-center">
                        <ul class="footer-payments">
                            <li><a href="#"><i class="fa fa-cc-visa"></i></a></li>
                            <li><a href="#"><i class="fa fa-credit-card"></i></a></li>
                            <li><a href="#"><i class="fa fa-cc-paypal"></i></a></li>
                            <li><a href="#"><i class="fa fa-cc-mastercard"></i></a></li>
                            <li><a href="#"><i class="fa fa-cc-discover"></i></a></li>
                            <li><a href="#"><i class="fa fa-cc-amex"></i></a></li>
                        </ul>
                        <span class="copyright">
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;<script>
                                document.write(new Date().getFullYear());
                            </script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </span>
                    </div>
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /bottom footer -->
    </footer>
    <!-- /FOOTER -->

    <!-- Template JS File -->
    <script src="{{asset('/electro/js/jquery.min.js')}}"></script>
    <script src="{{asset('/electro/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('/electro/js/slick.min.js')}}"></script>
    <script src="{{asset('/electro/js/nouislider.min.js')}}"></script>
    <script src="{{asset('/electro/js/jquery.zoom.min.js')}}"></script>
    <script src="{{asset('/electro/js/main.js')}}"></script>
    <!-- Page Specific JS File -->
</body>

</html>

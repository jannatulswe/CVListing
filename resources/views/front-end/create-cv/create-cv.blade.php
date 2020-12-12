
<!DOCTYPE html>
<html lang="en">
<head>
    <title>CV</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="{{asset('/front-end/login')}}/{{asset('/front-end/login')}}/images/icons/favicon.ico"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('/front-end/login')}}/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('/front-end/login')}}/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('/front-end/login')}}/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('/front-end/login')}}/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('/front-end/login')}}/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('/front-end/login')}}/vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('/front-end/login')}}/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('/front-end/login')}}/vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('/front-end/login')}}/css/util.css">
    <link rel="stylesheet" type="text/css" href="{{asset('/front-end/login')}}/css/main.css">
    <!--===============================================================================================-->
</head>
<body>

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="login100-form-title" style="background-image: url({{asset('/front-end/login')}}/images/bg-01.jpg);">
					<span class="login100-form-title-1">
						Create CV
					</span>
            </div>

            <form class="login100-form validate-form" action="{{route('user.saveCvDetails')}}" method="post" novalidate>
                @csrf
                <div class="form-row">
                    <div class="col-md-6 ">
                        <label for="validationCustom01">First name</label>
                        <input type="text" class="form-control" name="first_name" id="validationCustom01" value="" required>

                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="validationCustom02">Last name</label>
                        <input type="text" class="form-control" name="last_name" id="validationCustom02" value="" required>
                    </div>
                </div>
                    <div class="form-row">
                        <div class="col-md-6 ">
                            <label for="validationCustom01">Father name</label>
                            <input type="text" class="form-control" name="father_name" id="validationCustom01" value="" required>

                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="validationCustom02">Mother name</label>
                            <input type="text" class="form-control" name="mother_name" id="validationCustom02" value="" required>
                        </div>
                    </div>

                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label for="validationCustom03">Email</label>
                                <input type="email" class="form-control" name="email" id="validationCustom03" required>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="validationCustom04">Gender</label>
                                <select class="custom-select" name="gender" id="validationCustom04" required>
                                    <option value="1" selected>Male</option>
                                    <option value="2">Female</option>
                                    <option value="3">Common</option>
                                </select>
                            </div>
                        </div>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="validationCustom03">Address</label>
                        <textarea class="form-control" name="address" id="validationCustom03" required></textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="validationCustom02">Contact</label>
                        <input type="text" class="form-control" name="contact" id="validationCustom02" value="" required>
                    </div>
                </div>

                <button class="btn btn-primary" type="submit">Submit form</button>
            </form>

        </div>
    </div>
</div>

<!--===============================================================================================-->
<script src="{{asset('/front-end/login')}}/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="{{asset('/front-end/login')}}/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
<script src="{{asset('/front-end/login')}}/vendor/bootstrap/js/popper.js"></script>
<script src="{{asset('/front-end/login')}}/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="{{asset('/front-end/login')}}/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="{{asset('/front-end/login')}}/vendor/daterangepicker/moment.min.js"></script>
<script src="{{asset('/front-end/login')}}/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
<script src="{{asset('/front-end/login')}}/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
<script src="{{asset('/front-end/login')}}/js/main.js"></script>

</body>
</html>

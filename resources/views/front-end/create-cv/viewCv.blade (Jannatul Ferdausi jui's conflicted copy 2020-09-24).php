
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
						 CV Of {{ \Illuminate\Support\Facades\Auth::user()->name }}
					</span>
            </div>

            <form class="login100-form validate-form" method="post" novalidate style="padding: 100px;">
                @csrf
                <div class="form-row">
                    <div class="col-md-6 ">
                        <label for="validationCustom01">First name</label>
                        <input readonly type="text" class="form-control" name="first_name" id="validationCustom01" value="{{ $cv->first_name }}" required>

                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="validationCustom02">Last name</label>
                        <input readonly type="text" class="form-control" name="last_name" id="validationCustom02" value="{{ $cv->last_name }}" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6 ">
                        <label for="validationCustom01">Father name</label>
                        <input readonly type="text" class="form-control" name="father_name" id="validationCustom01" value="{{ $cv->father_name }}" required>

                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="validationCustom02">Mother name</label>
                        <input readonly type="text" class="form-control" name="mother_name" id="validationCustom02" value="{{ $cv->mother_name }}" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="validationCustom03">Email</label>
                        <input readonly type="email" class="form-control" name="email" id="validationCustom03" value="{{ $cv->email }}" required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="validationCustom04">Gender</label>
                        <select class="custom-select" name="gender" id="validationCustom04" required>
                            <option value="1" >Male</option>
                            <option value="2">Female</option>
                            <option value="3">Common</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="validationCustom03">Address</label>
                        <textarea readonly class="form-control" name="address" id="validationCustom03" value="{{ $cv->address }}" required></textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="validationCustom02">Contact</label>
                        <input readonly type="text" class="form-control" name="contact" id="validationCustom02" value="{{ $cv->contact }}" required>
                    </div>
                </div>


                <div class="card" style="width: 100%;">
                    <div class="card-header bg-success text-white font-weight-bold">Experiences</div>
                    <ul class="list-group list-group-flush">
                        @foreach($experiences as $ex)
                            <li class="list-group-item">{{ $ex->position.' -> '.$ex->org_name.' -> '.$ex->year_of_experience }} </li>
                        @endforeach

                        <li class="list-group-item">
                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target=".bd-example-modal-sm">Add Experience</button>
                        </li>
                    </ul>
                </div>

                <div class="card" style="width: 100%;">
                    <div class="card-header bg-success text-white font-weight-bold">Educations</div>
                    <ul class="list-group list-group-flush">
                        @foreach($education as $edu)
                            <li class="list-group-item">{{ $edu->title.' -> '.$edu->academic_year.' -> '.$ex->result }} </li>
                        @endforeach

                        <li class="list-group-item">
                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target=".bd-example-modal-sm">Add Educations</button>
                        </li>
                    </ul>
                </div>

                <div class="card" style="width: 100%;">
                    <div class="card-header bg-success text-white font-weight-bold">Skills</div>
                    <ul class="list-group list-group-flush">
                        @foreach($skills as $skill)
                            <li class="list-group-item">{{ $skill->title }} </li>
                        @endforeach

                        <li class="list-group-item">
                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target=".bd-example-modal-sm">Add Skills</button>
                        </li>
                    </ul>
                </div>
            </form>


            <div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" data-toggle="modal1" data-target=".bd-example-modal-sm">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <form class="login100-form validate-form" action="{{route('cv.add.experience')}}" method="post" novalidate>
                            @csrf
                            <div class="form-row">
                                <div class="col-md-6 ">
                                    <label for="validationCustom01">Position</label>
                                    <input type="text" class="form-control" name="position" id="validationCustom01" value="" required>

                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="validationCustom02">Organization Name</label>
                                    <input type="text" class="form-control" name="org_name" id="validationCustom02" value="" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6 ">
                                    <label for="validationCustom01">Year of Experience</label>
                                    <input type="text" class="form-control" name="year_of_experience" id="validationCustom01" value="" required>

                                </div>
{{--                                <div class="col-md-6 mb-3">--}}
{{--                                    <label for="validationCustom02">Mother name</label>--}}
{{--                                    <input type="text" class="form-control" name="mother_name" id="validationCustom02" value="" required>--}}
{{--                                </div>--}}
                            </div>
                            <button type="submit" class="btn btn-primary">Add</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <form class="login100-form validate-form" action="{{route('cv.add.education')}}" method="post" novalidate>
                            @csrf
                            <div class="form-row">
                                <div class="col-md-6 ">
                                    <label for="validationCustom01">Academic Title</label>
                                    <input type="text" class="form-control" name="title" id="validationCustom01" value="" required>

                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="validationCustom02">Academic Year</label>
                                    <input type="text" class="form-control" name="academic_year" id="validationCustom02" value="" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6 ">
                                    <label for="validationCustom01">Academic Result</label>
                                    <input type="text" class="form-control" name="result" id="validationCustom01" value="" required>

                                </div>
{{--                                <div class="col-md-6 mb-3">--}}
{{--                                    <label for="validationCustom02">Mother name</label>--}}
{{--                                    <input type="text" class="form-control" name="mother_name" id="validationCustom02" value="" required>--}}
{{--                                </div>--}}
                            </div>
                            <button type="submit" class="btn btn-primary">Add</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <form class="login100-form validate-form" action="{{route('cv.add.skills')}}" method="post" novalidate>
                            @csrf
                            <div class="form-row">
                                <div class="col-md-6 ">
                                    <label for="validationCustom01">Skills Title</label>
                                    <input type="text" class="form-control" name="title" id="validationCustom01" value="" required>

                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Add</button>
                        </form>
                    </div>
                </div>
            </div>

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

@extends('admin.master' )

@section('body')

    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                @if(Session::get('message'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>{{Session::get('message')}}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>CV List</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Data Tables</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Sl No</th>
                                    <th>id</th>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Contact</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach($managecv as $cv)
                                    <?php
                                        $manage_cv_id = $cv->id;
                                    ?>
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$cv->id}}</td>
                                        <td>{{$cv->first_name.' '.$cv->last_name}}</td>
                                        <td>{{$cv->address}}</td>
                                        <td>{{$cv->contact}}</td>
                                        <td>
                                            <a href="#viewModal{{$cv->id}}" class="btn btn-success" data-toggle="modal" data-target="#viewModal{{$cv->id}}" >
                                                <span><i class="fa fa-arrows"></i> </span> </a>
                                        </td>
                                    </tr>
                                    <div class="modal fade bd-example-modal-lg" id="viewModal{{$cv->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="card" style="width: 100%; padding: 20px; border: 1px solid green">
                                                    <div class="card-header font-weight-bold bg-transparent">
                                                        CV Information
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <ul class="list-group list-group-flush font-weight-bold">
                                                                <li class="list-group-item">First Name:</li>
                                                                <li class="list-group-item">Last Name</li>
                                                                <li class="list-group-item">Father Name</li>
                                                                <li class="list-group-item">Mother Name</li>
                                                                <li class="list-group-item">Email</li>
                                                                <li class="list-group-item">Gender </li>
                                                                <li class="list-group-item">Address </li>
                                                                <li class="list-group-item">Contact </li>
                                                            </ul>
                                                        </div>
                                                        <div class="col-6">
                                                            <ul class="list-group list-group-flush">
                                                                <li class="list-group-item">{{ $cv->first_name }}</li>
                                                                <li class="list-group-item">{{ $cv->last_name }}</li>
                                                                <li class="list-group-item">{{ $cv->father_name }}</li>
                                                                <li class="list-group-item">{{ $cv->mother_name }}</li>
                                                                <li class="list-group-item">{{ $cv->email }}</li>
                                                                <li class="list-group-item">{{ $cv->gender }}</li>
                                                                <li class="list-group-item">{{ $cv->address }}</li>
                                                                <li class="list-group-item">{{ $cv->contact }}</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="card row">
                                                        <div class="card-header bg-dark text-white">
                                                            Skill
                                                        </div>
                                                        <div class="card-body">
                                                                @foreach(\App\Skill::where('cv_id', '=', $cv->id)->get() as $key => $skill)
                                                                     <span class="badge badge-warning p-2">{{ $skill->title }}</span>
                                                                @endforeach
                                                        </div>

                                                    </div>
                                                    <div class="card row">
                                                        <div class="card-header bg-dark text-white">
                                                            Experience
                                                        </div>
                                                        <div class="card-body">
                                                            @foreach(\App\Experience::where('cv_id', '=', $cv->id)->get() as $key => $experience)
                                                                <span class="badge badge-warning p-2">{{ $experience->position }}</span>
                                                                <span class="badge badge-warning p-2">{{ $experience->org_name }}</span>
                                                                <span class="badge badge-warning p-2">{{ $experience->	year_of_experience }}</span>
                                                            @endforeach
                                                        </div>

                                                    </div>
                                                    <div class="card row">
                                                        <div class="card-header bg-dark text-white">
                                                            Education
                                                        </div>
                                                        <div class="card-body">
                                                            @foreach(\App\Education::where('cv_id', '=', $cv->id)->get() as $key => $education)
                                                                <span class="badge badge-warning p-2">{{ $education->title }}</span>
                                                                <span class="badge badge-warning p-2">{{ $education->academic_year }}</span>
                                                                <span class="badge badge-warning p-2">{{ $education->result }}</span>
                                                            @endforeach
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

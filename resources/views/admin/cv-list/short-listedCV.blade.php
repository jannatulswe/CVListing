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
                        <h1>Short Listed CV List</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            {{ request()->path() }}
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
                                    <th>Name</th>
                                    <th>email</th>
                                    <th>Contact</th>
                                    <th>CV Evaluation Rating</th>
                                    <th>Job Title + Organization</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
{{--                                {{ \App\JobCV::where('job_id', '=', 1)->get() }}--}}
                                @foreach($job_cv_list as $key => $job_cv)
                                    <?php
                                    $cv = \App\CreateCV::find($job_cv->cv_id );

                                    ?>
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{$cv->first_name.' '.$cv->last_name}}</td>
                                        <td>{{$cv->email}}</td>
                                        <td>{{$cv->contact}}</td>
                                        <td>{{ $job_cv->cv_weight}}</td>
                                        <?php
                                        $job = \App\Jobdetails::find($job_cv->job_id);
                                        ?>
                                        <td>{{ $job->job_title.' ( '.$job->company_name.' ) ' }}</td>
                                    </tr>

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


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
                        <h1>Jobs Criteria</h1>
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
                        <div class="card-header">
                            <span class="h4">Jobs Criteria List</span>
                            <button class="btn btn-primary float-right" data-toggle="modal" data-target="#staticBackdrop">
                                <i class="fa fa-plus-square"></i>

                            </button>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Sl No</th>
                                    <th>Job Name</th>
                                    <th>Criteria Name</th>
                                    <th>Evaluation Point</th>
                                    <th>Criteria Type</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                @php($i=1)
                                @if($jobs_criteria != null)
                                @foreach($jobs_criteria as $jobscriteria)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{ \App\Jobdetails::find($jobscriteria->job_detail_id)->job_title }}</td>
                                        <td>{{\App\Criteria::find($jobscriteria->criteria_id)->criteria_name}}</td>
                                        <td>{{$jobscriteria->evaluation_point}}</td>
                                        <td>{{$jobscriteria->criteria_type}}</td>

                                    </tr>
{{--                                    @include('admin.jobs-criteria.edit-jobs-criteria')--}}
                                @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    @include('admin.Jobs-criteria.add-Jobs-criteria')
@endsection


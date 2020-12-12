@extends('admin.master' )

@section('body')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                @if(Session::get('message'));
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>{{Session::get('message')}}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Job Details</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            {{ request()->path()  }}
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
                            <span class="h4">Job Details List</span>
                            <button class="btn btn-primary float-right" data-toggle="modal" data-target="#staticBackdrop">
                                <i class="fa fa-plus-square"></i>

                            </button>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Job Title</th>
                                    <th>Company Name</th>
                                    <th>Vacancy</th>
                                    <th>Job Responsibilities</th>
                                    <th>Employment Status</th>
                                    <th>Job Location</th>
                                    <th>Salary</th>
                                    <th>Category Name</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php($i=1)
                                @foreach($jobdetails as $jobdetails)
                                <tr>
                                   <td>{{$i++}}</td>
                                   <td>{{$jobdetails->job_title}}</td>
                                   <td>{{$jobdetails->company_name}}</td>
                                   <td>{{$jobdetails->vacancy}}</td>
                                   <td>{{$jobdetails->job_responsibilities}}</td>
                                   <td>{{$jobdetails->employee_status}}</td>
                                   <td>{{$jobdetails->job_location}}</td>
                                   <td>{{$jobdetails->salary}}</td>
                                    <td>{{ \App\Category::find($jobdetails->category_id)->cat_name }}</td>

                                    <td>{{$jobdetails->is_active == 1 ? 'Active':'DeActive'}}</td>

                                   <td>
                                        @if($jobdetails->is_active == 1)
                                            <a href="{{route('admin.unpub-jobDetails',['id'=>$jobdetails->id])}}" class="btn m-2 btn-primary">
                                                <span><i class="fa fa-arrow-up"></i> </span>
                                            </a>
                                        @else
                                            <a href="{{route('admin.pub-jobDetails',['id'=>$jobdetails->id])}}" class="btn m-2 btn-warning">
                                                <span><i class="fa fa-arrow-down"></i> </span>
                                            </a>
                                        @endif
                                        <a href="#editModal{{$jobdetails->id}}" class="btn m-2 btn-success" data-toggle="modal" >
                                            <span><i class="fa fa-edit"></i> </span>
                                        </a>
                                         <a href="#viewModal{{$jobdetails->id}}" class="btn m-2 btn-success" data-toggle="modal" >
                                            <span><i class="fa fa-search-plus"></i> </span>
                                         </a>
                                        <a href="{{route('admin.delete-jobDetails',['id'=>$jobdetails->id])}}" class="btn m-2 btn-danger">
                                            <span><i class="fa fa-trash"></i> </span>
                                        </a>
                                   </td>

                                </tr>
                                @include('admin.jobdetails.edit-jobDetails')
                                @include('admin.jobdetails.view-jobdetails')
                                 @endforeach
                                </tbody>
                                <tfoot>

                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    @include('admin.jobdetails.add-jobDetails')
@endsection


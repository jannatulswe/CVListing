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
                        <h1>Categories</h1>
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
                        <div class="card-header">
                            <span class="h4">Category List</span>
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
                                    <th>Category Name</th>
                                    <th>Category Description</th>
{{--                                    <th>Status</th>--}}
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                @php($i=1)
                                @foreach($categories as $category)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$category->cat_name}}</td>
                                        <td>{{$category->cat_desc}}</td>
{{--                                        <td>{{$category->status==1 ? 'published':'unpublished'}}</td>--}}

                                    <td>
                                        @if($category->status==1)
                                            <a href="{{route('admin.unpub-category',['id'=>$category->id])}}" class="btn btn-primary">
                                                <span><i class="fa fa-arrow-up"></i> </span>
                                            </a>
                                        @else
                                            <a href="{{route('admin.pub-category',['id'=>$category->id])}}" class="btn btn-warning">
                                                <span><i class="fa fa-arrow-down"></i> </span>
                                            </a>
                                        @endif
                                        <a href="#editModal{{$category->id}}" class="btn btn-success" data-toggle="modal" >
                                            <span><i class="fa fa-edit"></i> </span>
                                        </a>
                                        <a href="{{route('admin.delete-category',['id'=>$category->id])}}" class="btn btn-danger">
                                            <span><i class="fa fa-trash"></i> </span>
                                        </a>
                                    </td>
                                </tr>
                                @include('admin.category.edit-category')
                                @endforeach

                                </tbody>

                            </table>
                        </div>
                </div>
                </div>
            </div>
        </section>
    </div>
    @include('admin.category.add-category')
@endsection

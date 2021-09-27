@extends('admin.layouts.app')
@section('title')
    Admin | Blog
@endsection('title')
@section('content')
<div class="page-breadcrumb">
    @include('admin.layouts.error')
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h4 class="page-title">Blog</h4>
                    </div>
                    <div class="col-7 align-self-center">
                        <div class="d-flex align-items-center justify-content-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="{{route('admin.home')}}">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Blog</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Title</th>
                                            <th scope="col">Image</th>
                                            <th scope="col">Description</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($blog as $va)
                                            <tr>
                                                <td>{{$va->id}}</td>
                                                <td>{{$va->title}}</td>
                                                <td>{{$va->image}}</td>
                                                <td>{{$va->description}}</td>
                                                <td>
                                                    <a href="{{route('admin.editblog',['id' => $va->id])}}"> 
                                                        <i class="mdi mdi-account-edit"></i>
                                                        <span class="hide-menu">Edit</span>                    </a>|
                                                    <a href="{{route('admin.destroyblog',['id' => $va->id])}}">    <i class="mdi mdi-delete"></i>
                                                        <span class="hide-menu">Delete</span> 
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            {{ $blog->links() }}
                        </div>
                        <a href="{{route('admin.createblog')}}"><button type="button" class="btn btn-success">Add Blog</button></a>
                    </div>
                </div>

            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center">
                All Rights Reserved by Nice admin. Designed and Developed by
                <a href="https://wrappixel.com">WrapPixel</a>.
            </footer>
@endsection('content')
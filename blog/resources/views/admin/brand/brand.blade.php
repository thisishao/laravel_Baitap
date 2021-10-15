@extends('admin.layouts.app')
@section('title')
    Admin | Category
@endsection('title')
@section('content')
<div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h4 class="page-title">Brand</h4>
                    </div>
                    <div class="col-7 align-self-center">
                        <div class="d-flex align-items-center justify-content-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="{{route('admin.home')}}">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Brand</li>
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
                                            <th scope="col">Name</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($brand as $data)
                                            <tr>
                                                <td>{{$data->id}}</td>
                                                <td>{{$data->name}}</td>
                                                <td>
                                                    <a href="{{route('admin.destroybrand',['id' => $data->id])}}"> 
                                                        <i class="mdi mdi-delete"></i>
                                                        <span class="hide-menu">Delete</span>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <a href="{{route('admin.createbrand')}}"><button type="button" class="btn btn-success">Add Brand</button></a>
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
@extends('layouts.app')

@section('content')

    <div class="page-inner">
        <div class="page-title">
            <h3>Gallery</h3>
            <div class="page-breadcrumb">
                <ol class="breadcrumb">
                    <li><a href="{{url('home')}}">Home</a></li>

                    <li class="active">Gallery</li>
                </ol>
            </div>
        </div>
        <div id="main-wrapper">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-white">
                        <div class="panel-heading clearfix">
                            <h4 class="panel-title">Gallery</h4>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table id="example" class="display table" style="width: 100%; cellspacing: 0;">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Promo Code</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($gallerys as $gallery)
                                        <tr>
                                            <td>{{$gallery->gid}}</td>
                                            <td>{{$gallery->name}}</td>
                                            <td><a type="submit" name="action" class="btn btn-danger" href="{{url('delete-gallery/' . $gallery->gid) }}">Delete</a></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div><!-- Row -->
        </div><!-- Main Wrapper -->
        <div class="page-footer">
            <p class="no-s">2019 &copy; Play.</p>
        </div>
    </div><!-- Page Inner -->
@endsection
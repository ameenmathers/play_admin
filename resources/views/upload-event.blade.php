@extends('layouts.app')

@section('content')



    <div class="page-inner">
        <div class="page-title">
            <h3>Events</h3>
            <div class="page-breadcrumb">
                <ol class="breadcrumb">
                    <li><a href="{{url('home')}}">Home</a></li>

                    <li class="active">Upload Event</li>
                </ol>
            </div>
        </div>
        @include('notification')
        <div id="main-wrapper">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-white">
                        <div class="panel-heading clearfix">
                            <h4 class="panel-title">Events</h4><br>
                            @include('notification')
                        </div>
                        <div class="panel-body">
                            <form method="post" enctype="multipart/form-data" action="{{url('upload-event')}}">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control" placeholder="Name">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="location" class="form-control" placeholder="location">
                                </div>
                                <div class="form-group">
                                    <label>Date</label>
                                    <input type="date" name="date" class="form-control" placeholder="">
                                </div>




                                <h3>Select Event Mode</h3>
                                <ul class="nav nav-tabs">
                                    <li class="active"><a data-toggle="tab" href="#home">Paid Event</a></li>
                                    <li><a data-toggle="tab" href="#menu1">RSVP Event</a></li>
                                </ul>

                                <div class="tab-content">
                                    <div id="home" class="tab-pane fade in active">
                                        <div class="form-group">
                                            <label for="paymenurl">Payment Url</label>
                                            <input type="text" name="paymenturl" class="form-control" placeholder="">
                                        </div>
                                    </div>
                                    <div id="menu1" class="tab-pane fade">
                                        <div class="form-group">
                                            <label>RSVP Url</label>
                                            <input type="text" name="rsvpurl" class="form-control" placeholder="">
                                        </div>
                                    </div>
                                </div>


                                <div class="file-field">
                                    <div class="btn btn-primary btn-sm float-left">
                                        <span>Choose Image</span>
                                        <input type="file" name="image">
                                    </div>

                                </div><br>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea2">Event Description</label>
                                    <textarea class="form-control rounded-0" name="desc" id="exampleFormControlTextarea2" rows="3"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Upload</button>
                            </form>
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

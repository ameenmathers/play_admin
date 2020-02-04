@extends('layouts.app')

@section('content')
    <div class="page-inner">
        <div class="page-title">
            <h3>Dashboard</h3>
            <div class="page-breadcrumb">
                <ol class="breadcrumb">
                    <li><a href="{{url('home')}}">Home</a></li>
                    <li class="active">Dashboard</li>
                </ol>
            </div>
        </div>
        <div id="main-wrapper">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel info-box panel-white">
                        <div class="panel-body">
                            <div class="info-box-stats">
                                <p class="counter"> {{count($users)}}</p>
                                <span class="info-box-title">Registered Users</span>
                            </div>
                            <div class="info-box-icon">
                                <i class="icon-users"></i>
                            </div>
                            <div class="info-box-progress">
                                <div class="progress progress-xs progress-squared bs-n">
                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel info-box panel-white">
                        <div class="panel-body">
                            <div class="info-box-stats">
                                <p class="counter"> {{count($events)}}</p>
                                <span class="info-box-title">Events</span>
                            </div>
                            <div class="info-box-icon">
                                <i class="icon-calendar"></i>
                            </div>
                            <div class="info-box-progress">
                                <div class="progress progress-xs progress-squared bs-n">
                                    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel info-box panel-white">
                        <div class="panel-body">
                            <div class="info-box-stats">
                                <p><span class="counter">{{count($privileges)}}</span></p>
                                <span class="info-box-title">Privileges</span>
                            </div>
                            <div class="info-box-icon">
                                <i class="icon-present"></i>
                            </div>
                            <div class="info-box-progress">
                                <div class="progress progress-xs progress-squared bs-n">
                                    <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel info-box panel-white">
                        <div class="panel-body">
                            <div class="info-box-stats">
                                <p class="counter">{{count($foundations)}}</p>
                                <span class="info-box-title">Foundations</span>
                            </div>
                            <div class="info-box-icon">
                                <i class="icon-globe"></i>
                            </div>
                            <div class="info-box-progress">
                                <div class="progress progress-xs progress-squared bs-n">
                                    <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- Row -->
            <div class="row">
                <div class="col-lg-9 col-md-12">
                    <div class="panel panel-white">
                        <div class="row">
                            <div class="col-sm-8">
                                <div class="visitors-chart">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">Visitors</h4>
                                    </div>
                                    <div class="panel-body">
                                        <div id="flotchart1"></div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-white" style="height: 100%;">
                        <div class="panel-heading">
                            <h4 class="panel-title">Server Load</h4>
                            <div class="panel-control">
                                <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Expand/Collapse" class="panel-collapse"><i class="icon-arrow-down"></i></a>
                                <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Reload" class="panel-reload"><i class="icon-reload"></i></a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="server-load">
                                <div class="server-stat">
                                    <span>Total Usage</span>
                                    <p>67GB</p>
                                </div>
                                <div class="server-stat">
                                    <span>Total Space</span>
                                    <p>320GB</p>
                                </div>
                                <div class="server-stat">
                                    <span>CPU</span>
                                    <p>57%</p>
                                </div>
                            </div>
                            <div id="flotchart2"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-6">
                    <div class="panel panel-white">
                        <div class="panel-heading">
                            <h4 class="panel-title">Weather</h4>
                            <div class="panel-control">
                                <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Reload" class="panel-reload"><i class="icon-reload"></i></a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="weather-widget">
                                <div class="row">
                                    <a class="weatherwidget-io" href="https://forecast7.com/en/9d088d68/nigeria/" data-label_1="ABUJA" data-label_2="WEATHER" data-theme="original" >ABUJA WEATHER</a>
                                    <script>
                                        !function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src='https://weatherwidget.io/js/widget.min.js';fjs.parentNode.insertBefore(js,fjs);}}(document,'script','weatherwidget-io-js');
                                    </script>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">

                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel twitter-box">
                        <div class="panel-body">
                            <div class="live-tile" data-mode="flip" data-speed="750" data-delay="3000">
                                <span class="tile-title pull-right">New Tweets</span>
                                <i class="fa fa-twitter"></i>
                                <div><h2 class="no-m">It’s kind of fun to do the impossible...</h2><span class="tile-date">10 April, 2015</span></div>
                                <div><h2 class="no-m">Sometimes by losing a battle you find a new way to win the war...</h2><span class="tile-date">6 April, 2015</span></div>
                            </div>
                        </div>
                    </div>
                    <div class="panel facebook-box">
                        <div class="panel-body">
                            <div class="live-tile" data-mode="carousel" data-direction="horizontal" data-speed="750" data-delay="4500">
                                <span class="tile-title pull-right">Facebook Feed</span>
                                <i class="fa fa-facebook"></i>
                                <div><h2 class="no-m">If you're going through hell, keep going...</h2><span class="tile-date">23 March, 2015</span></div>
                                <div><h2 class="no-m">To improve is to change; to be perfect is to change often...</h2><span class="tile-date">15 March, 2015</span></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12">

                </div>
            </div>
        </div><!-- Main Wrapper -->
        <div class="page-footer">
            <p class="no-s">2019 &copy; Play</p>
        </div>
    </div><!-- Page Inner -->
@endsection

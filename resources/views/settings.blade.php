@extends('layouts.app')

@section('content')



    <div class="page-inner">
        <div class="page-title">
            <h3>Settings</h3>
            <div class="page-breadcrumb">
                <ol class="breadcrumb">
                    <li><a href="{{url('home')}}">Home</a></li>

                    <li class="active"> Settings</li>
                </ol>
            </div>
        </div>


    <section class="container-fluid" id="main-wrapper">
         <div class="row">
             <div class="col-md-6">
                 <div class="panel panel-white">
                     <form>
                         <div class="row panel-body">
                             <div class="form-group">
                                 <label for="name">Name </label>
                                 <input class="form-control" id="name" placeholder="{{Auth::user()->name}}" type="text" disabled>

                             </div>

                             <div class="form-group">
                                 <label for="email">E-mail </label>
                                 <input class="form-control" id="email" placeholder="{{Auth::user()->email}}" type="email" disabled>

                             </div>

                             <div class="form-group">
                                 <label for="phone">Phone </label>
                                 <input class="form-control" id="phone" placeholder="{{Auth::user()->phone}}" type="text" disabled>

                             </div>




                         </div>


                     </form>
                 </div>
             </div>
         </div>


    </section>



    <section class="container">
        @include('notification')
        <div class="col-md-12"><br>

            <h3 class="title text-center">Account Change</h3>
            <form method="post" action="{{url('post-settings')}}">
                {{ csrf_field() }}


                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control {{ $errors->has('name') ? ' has-error' : '' }}" value="{{Auth::user()->name}}"  name="name" required>

                        @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>


                <div class="form-group row">
                    <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone Number') }}</label>

                    <div class="col-md-6">
                        <input id="phone" type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" value="{{Auth::user()->phone}}" name="phone" required>

                        @if ($errors->has('phone'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button name="submit" class="waves-effect waves-light btn">Change</button>
                        <button class="waves-effect waves-light btn" type="reset" value="reset">Reset</button>
                    </div>
                </div>





            </form>


        </div>


    </section>
    <br><br><br>

@endsection
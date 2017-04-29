@extends('layouts.app2')
@section('content')
<br>
<div class="row div-padding">
        @if (count($errors) > 0)
                  <div class="alert alert-danger col-sm-4 col-sm-offset-4">
                    <ul>
                      @foreach($errors->all() as $error)
                      <button type="button" class="close" data-dismiss="alert">&times;</button>
                         <li>{{$error}}</li>
                       @endforeach
                     </ul>  
                  </div>
        @endif
        <div class="col-md-4 col-md-offset-4">
            <div class="panel">
                <div class="col-sm-12" align="center">
                    <img class="img-responsive" src="{{asset('img/main.png')}}" alt="Logo" style="height: 100px">
                </div><!-- /.login-logo -->
                <div class="panel-body">
                    <form role="form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} has-feedback">
                           <div class="col-md-12">
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus placeholder="Email...">
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}has-feedback">
                            <div class="col-md-12">
                                <input type="password" class="form-control" name="password" required placeholder="Contraseña...">
                                 @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Recordar
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group text-right">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-block btn-success" style="color:black" id="myButton" data-loading-text="Loading..." autocomplete="off">
                                    Login
                                </button>
                            </div>
                            @if($user == 0 && !Auth::check())
                            <div class="col-md-12">
                                <a href="{{ route('register') }}" class="btn btn-block btn-primary" style="color:black">
                                    Registrate
                                </a>
                            </div>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> 

@endsection

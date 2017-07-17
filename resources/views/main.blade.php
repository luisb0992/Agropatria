@extends('layouts.app2')
@section('content')
<div class="login row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
            <!-- @if (count($errors) > 0)
              <div class="alert alert-danger">
                <ul>
                  @foreach($errors->all() as $error)
                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                     <li>{{$error}}</li>
                   @endforeach
                 </ul>  
              </div>
            @endif -->
            <div class="col-sm-9 col-sm-offset-1">
                <div class="panel panel-success">
                    <div class="panel-default" align="center">
                        <img class="img-responsive" src="{{asset('img/main.png')}}" alt="Logo" style="height: 150px">
                    </div><!-- /.login-logo -->
                    <div class="panel-body">
                        <form role="form" method="POST" action="{{ route('login') }}">
                            {{ csrf_field() }}
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} has-feedback">
                               <div class="col-md-12">
                                    <label for="">E-mail</label>
                                    <input type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus placeholder="Email..." autocomplete="on" id="email">
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                    <br>
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}has-feedback">
                                <div class="col-md-12">
                                    <label for="">Clave</label> 
                                    <input type="password" class="form-control" name="password" required placeholder="Contraseña..." id="password">
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
                                @if($user == 0 && !Auth::check())
                                <div class="col-md-6 pull-left">
                                    <a href="{{ route('register') }}" class="btn btn-block btn-primary">
                                        Registro para primer uso
                                    </a>
                                </div>
                                @endif
                                <div class="col-md-6 pull-right">
                                    <button type="submit" class="btn btn-success btn-login">
                                        Login
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-4"></div>
</div>
@endsection

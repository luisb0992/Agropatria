@extends('layouts.app2')
@section('content')
<br>
<div class="div-padding">
    <div class="row">
        <div class="col-md-8 col-xs-12 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading">Registro</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}
                        
                        <div class="form-group">
                             <div class="col-md-6 col-xs-12">
                                <input id="name" type="text" class="form-control" 
                                name="cedula" placeholder="Cedula" required autofocus>
                            </div>
                            <div class="{{ $errors->has('name') ? ' has-error' : '' }}">
                                 <div class="col-md-6 col-xs-12">
                                    <input id="name" type="text" class="form-control" 
                                    name="name" value="{{ old('name') }}" 
                                    placeholder="Nombre" required>

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                             <div class="col-md-6">
                                <input id="name" type="text" class="form-control" 
                                name="ape" placeholder="apellido" required>
                            </div>
                            <div class="col-md-6">
                                <input id="name" type="date" class="form-control" 
                                name="fechanac" placeholder="Formato D/M/A" required>
                            </div>
                         </div>
                        
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                             <div class="col-md-6">
                                <input id="email" type="email" class="form-control" 
                                name="email" value="{{ old('email') }}" 
                                required placeholder="Email...">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <textarea name="direccion" class="form-control" placeholder="Direccion"></textarea>
                            </div>
                        </div>
                        
                         <div class="form-group">
                            <div class="{{ $errors->has('password') ? ' has-error' : '' }}">
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" required placeholder="Contraseña...">

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                             <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="Confirmar Contraseña...">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6">
                                 <select name="perfil_id" class="form-control" required>
                                    <option value="">Perfil...</option>
                                    <option value="1">Administrador</option>
                                 </select>
                            </div>
                            <div class="col-md-6">
                                 <select name="status" class="form-control" required>
                                    <option value="">status...</option>
                                    <option value="1">Activo</option>
                                 </select>
                            </div>
                         </div>
                        
                        <div class="form-group">
                            <div class="col-md-6"></div>
                            <div class="col-md-6 col-xs-12">
                                <button type="submit" class="btn btn-block btn-success" style="color:black">
                                    Registro
                                </button>
                            </div>
                        </div>


                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

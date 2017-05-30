@extends('layouts.app2')
@section('content')
<br>
<div class="div-padding">
    <div class="row">
        <div class="col-md-10 col-xs-12 col-md-offset-1">
            <div class="panel panel-primary">
                <div class="panel-heading"><h4>Registro Unico (para primer uso)</h4> </div>
                <div class="panel-body" style="padding: 2em;">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}
                        
                       <div class="form-group">
                            {!! Form::text('cedula',null, ['class' => 'form-control', 'placeholder' => 'Cedula...ejemplo: 12345678']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::text('name',null, ['class' => 'form-control', 'placeholder' => 'Nombre...']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::text('ape',null, ['class' => 'form-control', 'placeholder' => 'Apellido...']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::email('email',null, ['class' => 'form-control', 'placeholder' => 'Correo electronico...']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::textarea('direccion',null, ['class' => 'form-control', 'placeholder' => 'Direccion...']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::text('fechanac',null, ['class' => 'form-control', 'placeholder' => 'Fecha de nacimiento...formato: aa/mm/dd', 'id' => 'datepicker']) !!}
                        </div>
                        <div class="form-group">
                            <select name="perfil_id" class="form-control">
                                <option value="">Perfil del usuario...</option>
                                <option value="1">Administrador</option>
                            </select>
                        </div>    
                        <br>
                        <div class="form-group">
                            <select name="status" class="form-control">
                                <option value="">Status...</option>
                                <option value="1">Activo</option>
                            </select>    
                        </div>
                        <div class="form-group">
                            {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Contraseña...']) !!}
                        </div>
                        <div class="form-group">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="Confirmar Contraseña...">
                        </div>      
                        <div class="form-group text-right">
                            <a href="{{ url('/') }}" class="btn btn-link text-primary">Volver al inicio</a>
                            <input type="submit" value="Registro" class="btn btn-success" style="color:black">
                        </div>


                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

           
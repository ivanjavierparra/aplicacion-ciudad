@extends('layouts.base')

@section('content')
    <div id="formulario-evento">
    {{ Form::model($evento, ['action' => 'EventoController@store']) }}
        <div class="form-group">
        {{ Form::label('categoria', 'Categoría') }}
        {{ Form::text('categoria', $categoria->nombre, ['readonly','class' => 'form-control']) }}
        </div>
        <div class="form-group">
        {{ Form::label('descripcion', 'Descripción') }}
        {{ Form::textarea('descripcion', '', ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
        {{ Form::label('fecha_ocurrencia', 'Fecha de Ocurrencia') }}
        {{ Form::date('fecha_ocurrencia', '', ['class' => 'form-control']) }}
        </div>
        <button class="btn btn-success" type="submit">Subir un Evento!</button>
    {{ Form::close() }}
    </div>
@endsection

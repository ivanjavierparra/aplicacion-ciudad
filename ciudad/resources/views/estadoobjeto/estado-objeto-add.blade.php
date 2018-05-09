@extends('layouts.base')

@section('content')
    <div id="formulario-estado-objeto">
    {{ Form::model($estado_objeto, ['action' => 'EstadoObjetoController@store']) }}
        <div class="form-group">
        {{ Form::label('categoria', 'Categoría') }}
        {{ Form::text('categoria', $categoria->nombre, ['readonly','class' => 'form-control']) }}
        </div>
        <div class="form-group">
        {{ Form::label('descripcion', 'Descripción') }}
        {{ Form::textarea('descripcion', '', ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
        {{ Form::label('denunciante', 'Denunciante') }}
        {{ Form::text('denunciante', '', ['class' => 'form-control']) }}
        </div>
        <button class="btn btn-success" type="submit">Subir un Estado de un Objeto!</button>
    {{ Form::close() }}
    </div>
@endsection
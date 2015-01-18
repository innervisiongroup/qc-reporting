@extends('layout')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h2>Edit this Fonctionnality</h2>
        </div>
    </div>
    <div class="row">
        {{ Form::model($feature, ['route'=>['admin.feature.update', $feature->id], 'method'=>'PUT']) }}        
            <div class="col-md-3">
                {{ Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Feature\'s name']) }}
            </div>
            <div class="col-md-3">
                {{ Form::submit('Save', ['class'=>'btn btn-primary']) }}
            </div>
        {{ Form::close() }}
    </div>
@stop
@extends('layout')

@section('content')
    <div class="row">
        {{ Form::model($project, ['route'=>['admin.project.update', $project->id], 'method'=>'PUT']) }}        
            <div class="col-md-3">
                {{ Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Project\'s name']) }}
            </div>
            <div class="col-md-3">
                {{ Form::text('url', null, ['class'=>'form-control', 'placeholder'=>'URL']) }}
            </div>
            <div class="col-md-2">
                <div class="checkbox">
                    <label>
                        {{ Form::checkbox('is_mobile', true) }} Mobile App
                    </label>
                </div>
            </div>
            <div class="col-md-3">
                {{ Form::submit('Save Project', ['class'=>'btn btn-primary']) }}
            </div>
        {{ Form::close() }}
    </div>
@stop
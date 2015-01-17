@extends('layout')

@section('content')
    <div class="row">
        {{ Form::open(['route'=>'admin.project.store']) }}        
            <div class="col-md-3">
                {{ Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Project\'s name']) }}
            </div>
            <div class="col-md-3">
                {{ Form::text('url', null, ['class'=>'form-control', 'placeholder'=>'URL']) }}
            </div>
            <div class="col-md-3">
                {{ Form::submit('Add New Project', ['class'=>'btn btn-primary']) }}
            </div>
        {{ Form::close() }}
    </div>
    <div class="row">
        <div class="col-md-12">
            <h2>Projects</h2>
            @if (count($projects))
                @foreach ($projects as $project)
                    <h3>
                        {{ link_to_route('admin.project.show', $project->name, $project->id) }}
                    </h3>
                @endforeach
            @else
                No projects at the moment.
            @endif
        </div>
    </div>
@stop
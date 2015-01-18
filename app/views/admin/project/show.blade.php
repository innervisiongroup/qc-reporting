@extends('layout')

@section('styles')
    <style>
        a.link{
            color: #000;
        }
    </style>
@stop

@section('content')
    <div class="page-header">
        <h1>
            {{ $project->name }}
        </h1>
    </div>
    <div class="row">
        <div class="col-md-6">
            <h2>Fonctionnalities</h2>
            <div class="row">
                {{ Form::open(['route'=>'admin.feature.store']) }}        
                    <div class="col-md-9">
                        {{ Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Add a fonctionnality to test', 'autofocus']) }}
                    </div>
                    <div class="col-md-3">
                        {{ Form::submit('Add', ['class'=>'btn btn-primary']) }}
                    </div>
                    {{ Form::hidden('project_id', $project->id) }}
                {{ Form::close() }}
            </div>
            <div class="row">
                <div class="col-md-12">
                    @if (count($project->features))
                        <ul>
                            @foreach ($project->features as $feature)
                                <li>{{ link_to_route('admin.feature.edit', $feature->name, $feature->id, ['class' => 'link']) }}</li>
                            @endforeach
                        </ul>
                    @else
                        No fonctionnalities at the moment for this project.
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <h2>Versions</h2>
            <div class="row">
                {{ Form::open(['route'=>'admin.version.store']) }}        
                    <div class="col-md-9">
                        {{ Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Add a version number']) }}
                    </div>
                    <div class="col-md-3">
                        {{ Form::submit('Add', ['class'=>'btn btn-primary']) }}
                    </div>
                    {{ Form::hidden('project_id', $project->id) }}
                {{ Form::close() }}
            </div>
            <div class="row">
                <div class="col-md-12">
                    @if (count($project->versions))
                        <ul>
                            @foreach ($project->versions as $version)
                                <li>{{ $version->name }}</li>
                            @endforeach
                        </ul>
                    @else
                        This project has no specific version.
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <h2>Reports</h2>
            @if (count($project->reports))
                <ul>
                    @foreach ($project->reports as $report)
                        <li>{{ $report->created_at }}</li>
                    @endforeach
                </ul>
            @else
                There's no report yet.
            @endif
        </div>
    </div>
@stop
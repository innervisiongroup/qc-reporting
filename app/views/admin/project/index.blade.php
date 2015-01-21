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
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>URL</th>
                            <th>Enabled</th>
                            <th>Number of Reports</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($projects as $project)
                            <tr>
                                <th>
                                    {{ link_to_route('admin.project.show', $project->name, $project->id) }}
                                </th>
                                <th>
                                    {{ link_to($project->url, $project->url) }}
                                </th>
                                <th>
                                    @if ($project->trashed())
                                        {{ link_to_route('admin.project.enable', 'Enable', $project->id, ['class'=>'btn btn-danger btn-xs']) }}
                                    @else
                                        {{ Form::open(['route' => ['admin.project.destroy', $project->id], 'method' => 'delete']) }}
                                            <button type="submit" class="btn btn-success btn-xs">Disable</button>
                                        {{ Form::close() }}
                                    @endif
                                </th>
                                <th>
                                    {{ $project->reports->count() }}
                                </th>
                                <th>
                                    <a href="{{ URL::route('admin.project.show', $project->id) }}" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i></a>
                                </th>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                No projects at the moment.
            @endif
        </div>
    </div>
@stop
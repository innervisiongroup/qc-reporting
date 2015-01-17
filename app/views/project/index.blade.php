@extends('layout')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h2>Projects</h2>
            @if (count($projects))
                <ul>
                    @foreach ($projects as $project)
                        <li>
                            <h1>
                                {{ link_to_route('project.show', $project->name, $project->id) }}
                            </h1>
                        </li>
                    @endforeach
                </ul>
            @else
                No projects at the moment.
            @endif
        </div>
    </div>
@stop
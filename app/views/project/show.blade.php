@extends('layout')

@section('styles')
    <link rel="stylesheet" href="/css/checkbox.css">
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            {{ Form::open(['route'=>'report.store']) }}
                {{ Form::hidden('project_id', $project->id) }}
                <div class="row">
                    <div class="col-md-5">
                        <h2 class="pull-left">
                            {{ $project->name }}
                            <small>Create New QT Report</small>
                        </h2>
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-5">
                                {{ Form::label('os', 'Operating System') }}
                            </div>
                            <div class="col-md-7">
                                {{ Form::select('os', ['Mac OS'=>'Mac OS', 'Windows 7'=>'Windows 7', 'Windows 8'=>'Windows 8', 'Ubuntu'=>'Ubuntu', 'Debian'=>'Debian'], null, ['class'=>'form-control']) }}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <h2>
                            <small class="pull-right">Date : {{ date('d F Y') }}</small>
                        </h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        @if (count($project->features))
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Fonctionnality to Test</th>
                                        @foreach (Platform::all() as $platform)
                                            <th>{{ $platform->name }}</th>
                                        @endforeach
                                    </tr>
                                </thead>
                                @foreach ($project->features as $feature)
                                    <tr>
                                        <th scope="row">{{ $feature->name }}</th>
                                        @foreach (Platform::all() as $platform)
                                            <td>
                                                {{ Form::checkbox($feature->id.'[]', $platform->id, false, ['id'=>$feature->id.$platform->id]) }}
                                                <label for="{{$feature->id.$platform->id}}" class="check-box"></label>
                                            </td>
                                        @endforeach
                                    </tr>
                                @endforeach
                            </table>
                        @else
                            No fonctionnalities at the moment for this project.
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2 col-md-offset-5">
                        {{ Form::submit('Send Report', ['class'=>'btn btn-danger btn-block']) }}
                    </div>
                </div>
            {{ Form::close() }}
        </div>
    </div>
@stop
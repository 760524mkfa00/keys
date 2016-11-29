@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Keys</div>

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                                @include('./_partials/error')
                                @include('./_partials/message')
                            </div>
                        </div>

                        <table class="table table-bordered">
                            <thead>
                            <th>Type</th>
                            <th>Code</th>
                            <th>Description</th>
                            <th>Edit</th>
                            </thead>
                            <tbody>
                            @foreach($data as $key)
                                <tr>
                                    <td>{{ $key->type }}</td>
                                    <td>{{ $key->code }}</td>
                                    <td>{{ $key->description }}</td>
                                    <td><a href="{{ url('key/edit', [$key->id]) }}">Edit</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        <a class="btn btn-default" href="{{ route('key.create') }}">Add Key</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
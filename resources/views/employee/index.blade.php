@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Emploees</div>

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                                @include('./_partials/error')
                                @include('./_partials/message')
                            </div>
                        </div>

                        <table class="table table-bordered">
                            <thead>
                                <th>Comapny</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Notes</th>
                                <th>Keys</th>
                                <th>Edit</th>
                            </thead>
                            <tbody>
                                @foreach($data as $employee)
                                    <tr>
                                        <td>{{ $employee->company_name }}</td>
                                        <td>{{ $employee->first_name }}</td>
                                        <td>{{ $employee->last_name }}</td>
                                        <td>{{ $employee->notes }}</td>
                                        <td>5</td>
                                        <td><a href="{{ url('employee/edit', [$employee->id]) }}">Edit</a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <a class="btn btn-default" href="{{ route('employee.create') }}">Add Employee</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
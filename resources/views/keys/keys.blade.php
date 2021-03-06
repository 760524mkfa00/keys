<div class="col-md-7">
    <div class="panel panel-default">
        <div class="panel-heading">Assigned Keys</div>

        <div class="panel-body">

            <table class="table table-bordered">
                <thead>
                <th>Type</th>
                <th>Code</th>
                <th>Description</th>
                <th>Date Out</th>
                <th>Edit</th>
                </thead>
                <tbody>
                @foreach($employee->keys as $key)
                    <tr>
                        <td>{{ $key->type }}</td>
                        <td>{{ $key->code }}</td>
                        <td>{{ $key->description }}</td>
                        <td>{{ $key->pivot->date_out }}</td>
                        <td><a href="{{ url('employee/detach/key', [$employee, $key]) }}">Return Key</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <a class="btn btn-default" data-toggle="modal" data-target="#attachModal" href="#" data-info="{{ $employee }}">Add Key</a>
            <a class="btn btn-default" href="{{ route('employee') }}">Back</a>
        </div>
    </div>
</div>
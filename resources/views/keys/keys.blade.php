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
                <th>Expected Return</th>
                <th>Edit</th>
                </thead>
                <tbody>
                @foreach($employee->keys as $key)
                    <tr>
                        <td>{{ $key->type }}</td>
                        <td>{{ $key->code }}</td>
                        <td>{{ $key->description }}</td>
                        <td>{{ $key->pivot->date_out }}</td>
                        <td>{{ $key->pivot->expected_return_date }}</td>
                        <td><a href="{{ url('employee/detach/key', [$employee, $key]) }}">Return Key</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
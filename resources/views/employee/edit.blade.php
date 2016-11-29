@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div class="panel panel-default">
                    <div class="panel-heading">Employees</div>

                    <div class="panel-body">

                        <div class="row">
                            <div class="col-md-12">
                                @include('./_partials/error')
                                @include('./_partials/message')
                            </div>
                        </div>
                        <div class="col-md-12">
                            <form action="{{ route('employee.update',$employee->id) }}" method="post" class="form-horizontal">
                                <input type="hidden" name="_method" value="PATCH">
                                <input type="hidden" name="id" id="id" value="{{ $employee->id }}">
                                @include('./employee/_partials/form')
                                <div class="row">
                                    <button class="btn btn-default" type="submit">Update Employee</button>
                                    <a class="btn btn-default" href="{{ route('employee') }}">Back</a>
                                    <a class="btn btn-default" data-toggle="modal" data-target="#attachModal" href="#" data-info="{{ $employee }}">Add Key</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            @include('./keys/keys')

        </div>
    </div>

    @include('./employee/_partials/modal')


@endsection

@section('footer')

    <script>

        $(document).ready(function() {

            $('#attachModal').on('shown.bs.modal', function (event) {
                var button = $(event.relatedTarget); // Button that triggered the modal

            });



            $(".key-attach").click(function() {

                keyData={};

                keyData.employee_id = $('#id').attr('value');
                keyData.key_id = $('.modal-body #key_id').val();
                keyData.expected_return_date = $('.modal-body #expected_return_date').val();
                keyData._token = $('meta[name="csrf-token"]').attr('content');


                    $.ajax({
                        dataType: 'json',
                        url: "/employee/attach/key/" + keyData.employee_id,
                        type: "POST",
                        data: keyData,
                        success: function (response) {
                            window.location.reload();
                        },
                        error: function (data) {

                            var errors = data.responseJSON;

                            var errorsHtml = '<ul>';

                            $.each( errors, function( key, value ) {
                                errorsHtml += '<li>' + value[0] + '</li>'; //showing only the first error.
                            });
                            errorsHtml += '</ul>';

                            console.log(errorsHtml);

                            $( '.ajax-info-message' ).html( errorsHtml );

                            $(".ajax-info-message").fadeIn("slow");

                        }
                    });
            });


        });
    </script>
@endsection
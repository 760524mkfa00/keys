<div class="modal fade" id="attachModal" tabindex="-1" role="dialog" aria-labelledby="attachModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="attachModalLabel">Add Key</h4>
            </div>
            <div class="modal-body">

                {{ Form::open(array('url' => '/employee/attach/key')) }}

                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                                @include('./_partials/ajaxMessage')
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="id">Code: </label>
                                {{ Form::select('keys', $keys, null, ['class' => 'form-control', 'id' => 'key_id']) }}
                        </div>
                        <div class="form-group">
                            <label for="expected_return_date">Expected Return Date: </label>
                            <input type="date" class="form-control" id="expected_return_date" name="expected_return_date" placeholder="Expected Return Date...">
                        </div>
                    </div>
                </div>

                {{ Form::close() }}

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger key-attach">Add Key</button>
            </div>
        </div>
    </div>
</div>
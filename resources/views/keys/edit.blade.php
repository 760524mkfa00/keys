@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">Keys</div>

                    <div class="panel-body">

                        <div class="row">
                            <div class="col-md-12">
                                @include('./_partials/error')
                                @include('./_partials/message')
                            </div>
                        </div>

                        <div class="col-md-12">
                            <form action="{{ route('key.update',$key->id) }}" method="post" class="form-horizontal">
                                <input type="hidden" name="_method" value="PATCH">
                                @include('./keys/_partials/form')
                                <div class="row">
                                    <button class="btn btn-default" type="submit">Update Key</button>
                                    <a class="btn btn-default" href="{{ route('key') }}">Back</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
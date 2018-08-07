@extends('layouts.app')
@section('content')
<div id='app'>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Upload your favorite image!</div>
                    <div class="panel-body">
                        <file-upload></file-upload>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('js/bootstrap.js') }}"></script>
@endsection



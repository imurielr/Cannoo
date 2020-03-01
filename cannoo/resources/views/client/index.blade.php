@extends('layouts.master')

@section('content')
<div class="container">
    <div class="col-md-12">
        <div class="row justify-content-center">
            <a class="btn btn-info" href="{{ route('client.create') }}">
                @lang('messages.newClient')
            </a>
            <a class="btn btn-info" href="{{ route('client.show') }}">
                @lang('messages.showClients')
            </a>
        </div>
    </div>
</div>
@endsection

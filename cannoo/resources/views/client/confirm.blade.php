@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class=card>
            @lang('messages.clientCreated')
        </div>
        <a class="btn btn-info" href="{{ route('client.show') }}">@lang('messages.accept')</a>
    </div>
</div>
@endsection

@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> @lang('messages.welcome') </div>

                <div class="card-body">
                    @lang('messages.welcome_sub') 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

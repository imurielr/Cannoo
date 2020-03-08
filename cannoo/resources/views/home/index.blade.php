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
            <br>
            <div class="card">
                <div class="card-header"> @lang('messages.welcome_animal') </div>
                <div class="card-body">
                    <a class="btn btn-info" href="{{ route('animal.show') }}">@lang('messages.adoptNow')</a>
                </div>
            </div>
            <br>
            <div class="card">
                <div class="card-header"> @lang('messages.welcome_product') </div>
                <div class="card-body">
                    <a class="btn btn-info" href="{{ route('product.show') }}">@lang('messages.buyNow')</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

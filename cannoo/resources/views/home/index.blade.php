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
                    <a href="{{ route('animal.show') }}">
                        <button type="button" class="btn btn-info">@lang('messages.adoptNow')</button>
                    </a>
                </div>
               
            </div>
            <br>
            <div class="card">
                <div class="card-header"> @lang('messages.welcome_product') </div>
                <div class="card-body">
                    <a href="{{ route('product.show') }}">
                    <button href ="{{ route('product.show') }}"type="button" class="btn btn-info">@lang('messages.buyNow')</button>
                    </a> 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

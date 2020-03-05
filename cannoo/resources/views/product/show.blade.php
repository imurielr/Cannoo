@extends('layouts.master')

@section("title", $data["title"])

@section('content')
<div class="container">
    <div class="col-md-12">
        <ul id="errors">
            <div class="card">
                @include('util.message')
                <div class="card-header">@lang('messages.products')</div>
                <div class="card-body">
                
                    <ul id="errors">
                        @foreach($data["products"] as $index => $product)
                        <div class="row">
                            <div class="col">
                                <a style="color:black;" href="{{ route('product.showProduct', $product -> id)  }}">
                                    <li> 
                                        <b>Id: </b> {{ $product->getId() }} <br/>
                                        <b>@lang('messages.product'): </b> {{ $product->getType() }}
                                    </li>
                                </a>
                                <br/>
                            </div>
                            <div class="col text-right">
                                <a class="btn btn-info" href="#">@lang('messages.addToOrder')</a>
                            </div>
                        </div>
                        @endforeach
                    </ul>
                </div>
            </div>
            <br/>
        </ul>
    </div>
</div>
@endsection
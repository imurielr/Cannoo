@extends('layouts.master')

@section("title", $data["title"])

@section('content')
<link rel="stylesheet" href="{{ URL::asset('css/customStyles.css') }}">
<div class="container">
    <div class="row justify-content-center">
    @foreach($data["products"] as $index => $product)
        <div class="col-md-4" style="padding-top=5px; ">
            <div class="card" style="min-width: 350px; min-height: 350px;">
                <div class="card-header">{{ $product->getType() }}</div>
                <div class="card-body"> 
                    <a href="{{ route('product.showProduct', $product -> id) }}">
                        <img width="100%" height="100%" src="{{ URL::to('/') }}/storage/uploads/{{$product->getId()}}.png">
                    </a>    
                    <br/><br/>
                        <a class="btn btn-info float-right" href="{{ route('item.create', $product->getId()) }}">@lang('messages.addToOrder')</a>
                </div>
            </div>
            <br />
        </div>   
    @endforeach    
   
    </div>    
</div>
@endsection
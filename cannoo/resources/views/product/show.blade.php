@extends('layouts.master')

@section("title", $data["title"])

@section('content')
<link rel="stylesheet" href="{{ URL::asset('css/customStyles.css') }}">

<div class="container">
    @include('util.message')
    <nav class="breadcrumb" style="background-color: white;">
        <a class="breadcrumb-item" href="{{ route('home.index') }}">@lang('messages.home')</a>
        <span class="breadcrumb-item active">@lang('messages.products')</span>
    </nav>

    <div class="row justify-content-center">
    @foreach($data["products"] as $index => $product)
        <div class="col-md-4" style="padding-top=5px; ">
            <div class="card" style="min-width: 350px; min-height: 350px;">
                <div class="card-header">{{ $product->getType() }}</div>
                <div class="card-body"> 
                    <a href="{{ route('product.showProduct', $product -> id) }}">
                        <img width="100%" height="100%" src="{{ URL::to('/') }}/storage/uploads/product/{{$product->getId()}}.png">
                    </a>    
                    <br/><br/>
                        <b>${{$product->getPrice()}}</b>
                        @if (Auth::user()->role != 'admin')
                            <input class="btn btn-info float-right" type="submit" data-toggle="modal" data-target="#itemModal{{$product->getId()}}" value="@lang('messages.addToOrder')"/> 
                        @endif                       
                        
                </div>
            </div>
            <br />
        </div>   
    <!-- Modal -->
    <div class="modal fade" id="itemModal{{$product->getId()}}" tabindex="-1" role="dialog" aria-labelledby="itemModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="itemModalLabel">@lang('messages.addToOrder'): {{$product->getType()}}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form method="POST" action="{{route('item.create', $product->getId())}}" enctype="multipart/form-data">
                @csrf
                @lang('messages.quantity'): <input type="number" name="quantity" min="1" required value="1"/>
                <input class="btn btn-info float-right" type="submit" value="@lang('messages.addToOrder')" />
            </form>
        </div>
        </div>
    </div>
    </div>
    @endforeach    
   
    </div>    
</div>
@endsection
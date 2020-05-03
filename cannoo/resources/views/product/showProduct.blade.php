@extends('layouts.master')

@section("title", $data["title"])

@section('content')
<div class="container">

    @include('util.message')
    <nav class="breadcrumb" style="background-color: white;">
        <a class="breadcrumb-item" href="{{ route('home.index') }}">@lang('messages.home')</a>
        <a class="breadcrumb-item" href="{{ route('product.show') }}">@lang('messages.products')</a>
        <span class="breadcrumb-item active">@lang('messages.product') {{$data["product"]->getType()}}</span>
    </nav>
    
    <div class="row p-5">
        <div class="col-md-12">
            <ul id="errors">
                <div class="card">
                    <div class="card-header">{{ $data["product"]->getType() }}</div>
                    <div class="card-body">
                        <p>
                            <img align="left" width="30%" height="30%" src="{{ URL::to('/') }}/storage/uploads/product/{{$data['product']->getId()}}.png"><br />
                            <b>@lang('messages.price'): </b> {{ $data["product"]->getPrice() }} <br/>
                            <b>@lang('messages.description'): </b> {{ $data["product"]->getDescription() }}
                        </p>

                        @if (Auth::user()->role == 'admin')

                            <input class="btn btn-danger float-right" type="submit" data-toggle="modal" data-target="#deleteModal" value="@lang('messages.deleteProduct')"/>

                            <form  action="{{ route('product.update', $data['product']->getId()) }}">
                                <input class="btn btn-info float-right" type="submit" value="@lang('messages.changeDescription')" style="margin-right:5px;"/>
                            </form>
                        @else
                            <input class="btn btn-info float-right" type="submit" data-toggle="modal" data-target="#itemModal" value="@lang('messages.addToOrder')"/> 
                            <form method="POST" action="{{ route('product.like',$data['product']->getId()) }}" enctype="multipart/form-data">
                                @csrf
                                <button type="submit" class="btn btn-outline-primary">@lang('messages.like')</button>
                            </form>
                        @endif

                    </div>
                </div>
                <br/>
            </ul>
        </div>
    </div>
</div>
@endsection

<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModalLabel">@lang('messages.deleteProduct')</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        @lang('messages.deleteProductConfirm')
      </div>
      <div class="modal-footer">
        <form method="POST" action="{{ route('product.delete', $data['product']->getId()) }}">
            @csrf
            <input type="button" class="btn btn-secondary" style="margin-right: 5px;" data-dismiss="modal" value="@lang('messages.cancel')"/>
            <input class="btn btn-danger float-right" type="submit" value="@lang('messages.deleteProduct')"/>
        </form> 
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="itemModal" tabindex="-1" role="dialog" aria-labelledby="itemModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="itemModalLabel">@lang('messages.addToOrder'): {{$data['product']->getType()}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{route('item.create', $data['product']->getId())}}" enctype="multipart/form-data">
            @csrf
            @lang('messages.quantity'): <input type="number" name="quantity" min="1" required value="1"/>
            <input class="btn btn-info float-right" type="submit" value="@lang('messages.addToOrder')" />
        </form>
      </div>
    </div>
  </div>
</div>
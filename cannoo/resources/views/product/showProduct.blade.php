@extends('layouts.master')

@section("title", $data["title"])

@section('content')
<div class="container">
    <a class="btn btn-info" href="{{ route('product.show') }}">
        @lang('messages.showProducts')
    </a>
</div>

<div class="container">
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
                            <form method="POST" action="{{ route('product.delete', $data['product'] -> id) }}">
                                @csrf
                                <input class="btn btn-danger float-right" type="submit" value="@lang('messages.deleteProduct')"/>
                            </form>

                            <form  action="{{ route('product.update', $data['product'] -> id) }}">
                                <input class="btn btn-info float-right" type="submit" value="@lang('messages.changeDescription')" style="margin-right:5px;"/>
                            </form>
                        @else
                            <a class="btn btn-info float-right" href="{{ route('item.create', $data['product']->id) }}">@lang('messages.addToOrder')</a>
                            <form method="POST" action="{{ route('product.like',$data['product'] -> id) }}" enctype="multipart/form-data">
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
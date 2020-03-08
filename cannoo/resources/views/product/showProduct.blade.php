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

                        <ul id="errors">
                            <b>@lang('messages.price'): </b> {{ $data["product"]->getPrice() }} <br/>
                            <b>@lang('messages.description'): </b> {{ $data["product"]->getDescription() }}
                        </ul>

                        <form method="POST" action="{{ route('product.delete', $data['product'] -> id) }}">
                            @csrf
                            <input class="btn btn-danger float-right" type="submit" value="@lang('messages.deleteProduct')"/>
                        </form>

                        <form  action="{{ route('product.update', $data['product'] -> id) }}">
                            <input class="btn btn-info float-right" type="submit" value="@lang('messages.changeDescription')" style="margin-right:5px;"/>
                        </form>

                    </div>
                </div>
                <br/>
            </ul>
        </div>
    </div>
</div>
@endsection
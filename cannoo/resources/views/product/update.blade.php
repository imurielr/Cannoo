@extends('layouts.master')

@section("title", $data["title"])

@section('content')
<div class="container">
    <nav class="breadcrumb" style="background-color: white;">
        <a class="breadcrumb-item" href="{{ route('home.index') }}">@lang('messages.home')</a>
        <a class="breadcrumb-item" href="{{ route('product.show') }}">@lang('messages.products')</a>
        <a class="breadcrumb-item" href="{{ route('product.showProduct', $data['product']->getId()) }}">{{$data['product']->getType()}}</a>
        <span class="breadcrumb-item active">@lang('messages.changeDescription')</span>
    </nav>
    <div class="row p-5">
        <div class="col-md-12">
            <ul id="errors">
                <div class="card">
                    <div class="card-header">{{ $data["product"]->getType() }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('product.updateDescription', $data['product'] -> getId()) }}">
                            @csrf
                            <textarea placeholder="@lang('messages.description_form')" name="description" value="{{ old('description') }}" rows="4" cols="50">{{$data['product']->getDescription()}}</textarea>
                            <br>
                            <input class="btn btn-info" type="submit" value="@lang('messages.updateDescription')" />
                        </form>
                    </div>
                </div>
                <br/>
            </ul>
        </div>
    </div>
</div>
@endsection
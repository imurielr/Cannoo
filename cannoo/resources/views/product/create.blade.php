@extends('layouts.master')

@section("title", $data["title"])

@section('content')
<div class="container">

    <nav class="breadcrumb" style="background-color: white;">
        <a class="breadcrumb-item" href="{{ route('home.index') }}">@lang('messages.home')</a>
        <span class="breadcrumb-item active">@lang('messages.createProduct')</span>
    </nav>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @include('util.message')
                <div class="card-header">@lang('messages.createProduct')</div>
                <div class="card-body">
                    @if($errors->any())
                    <ul id="errors">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    @endif

                    <form method="POST" action="{{ route('product.save') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="text" placeholder="@lang('messages.type_form')" name="type" value="{{ old('type') }}" />
                        <br/><br/>
                        <input placeholder="@lang('messages.price_form')" name="price" value="{{ old('price') }}" />
                        <br/><br/>
                        <textarea placeholder="@lang('messages.description_form')" name="description" value="{{ old('description') }}" rows="4" cols="50"></textarea>
                        <br/><br/>
                        <div class="form-group">
                            <label>@lang('messages.image'):</label>
                            <input type="file" name="image" accept="image/png, image/jpeg"/>
                        </div>
                        <input type="submit" value="@lang('messages.send')" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
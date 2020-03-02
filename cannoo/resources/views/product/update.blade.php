@extends('layouts.master')

@section("title", $data["title"])

@section('content')
<div class="container">
    <div class="row p-5">
        <div class="col-md-12">
            <ul id="errors">
                <div class="card">
                    <div class="card-header">{{ $data["product"]->getType() }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('product.updateDescription', $data['product'] -> id) }}">
                            @csrf
                            <input type="text" placeholder="@lang('messages.description_form')" name="description" value="{{ old('description') }}" />
                            <input type="submit" value="@lang('messages.updateDescription')" />
                        </form>
                    </div>
                </div>
                <br/>
            </ul>
        </div>
    </div>
</div>
@endsection
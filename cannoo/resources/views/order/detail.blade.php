@extends('layouts.master')

@section("title", $data["title"])

@section('content')

<div class="container">
    <h3>@lang('messages.orderSummary')</h3>
    @foreach($data["animals"] as $animal)
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">{{ $animal->getType() }}</h5>
            <h6 class="card-subtitle mb-2 text-muted">{{ $animal->getBreed() }}</h6>
            <h6 class="card-subtitle mb-2 text-muted">@lang('messages.birth') {{ ": ".$animal->getBirthDate() }}</h6>
        </div>
    </div>
    @endforeach

    @foreach($data["items"] as $item)
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">{{ $item->getProduct()->getType() }}</h5>
            <h6 class="card-subtitle mb-2 text-muted">@lang('messages.quantity') {{ ':  '.$item->getQuantity() }}</h6>
            <h6 class="card-subtitle mb-2 text-muted">@lang('messages.totalPrice') {{ ':  '.$item->getTotalPrice() }}</h6>
        </div>
    </div>
    @endforeach

    <a href="{{ route('order.show') }}" class="btn btn-info">@lang('messages.accept')</a>
</div>

@endsection
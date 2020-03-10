@extends('layouts.master')

@section("title", $data["title"])

@section('content')

<div class="container">
    <h3>@lang('messages.yourOrders')</h3>
    @foreach($data["orders"] as $order)
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">{{ "\$".$order->getTotalPrice() }}</h5>
            <h6 class="card-subtitle mb-2 text-muted">{{ $order->getDate() }}</h6>
            <a href="{{ route('order.showOrder', $order -> getId()) }}" class="btn btn-info">Detalles</a>
        </div>
    </div>
    @endforeach
    <br>
    <a href="{{ route('home.index') }}" class="btn btn-info">@lang('messages.accept')</a>
</div>

@endsection
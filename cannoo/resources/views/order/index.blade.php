@extends('layouts.master')

@section('content')
<div class="container">
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">@lang('messages.animals')</th>
                <th scope="col"></th>
            </tr>
        </thead> 
        <tbody>
            @foreach($data["animals"] as $animal)
            <tr>
                <td scope="row">{{ $animal -> getType() }}</td>
                <td><a class="btn btn-warning" href="{{ route('order.deleteAnimal', $animal -> id) }}">@lang('messages.delete')</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <a class="btn btn-info" href="{{ route('animal.show') }}">@lang('messages.addAnimals')</a>
</div>

<br>
<br>

<div class="container">
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">@lang('messages.products')</th>
                <th scope="col">@lang('messages.quantity')</th>
                <th scope="col">@lang('messages.price')</th>
            </tr>
        </thead> 
        <tbody>
            @foreach($data["items"] as $item)
            <tr>
                <td scope="row">($item -> product as $product) - {{ $product -> getType() }}</td>
                <td>($item -> product as $product) - {{ $product -> getPrice() }}</td>
                <td>
                <form method="POST" action="{{ route('order.deleteItem', $item -> id) }}">
                    @csrf
                    <input class="btn btn-warning" type="submit" value="@lang('messages.delete')"/>
                </form> 
            </tr>
            @endforeach
        </tbody>
    </table>
    <a class="btn btn-info" href="{{ route('product.show') }}">@lang('messages.addProducts')</a>
</div>

<br>
<br>

<div class="container">
    <select class="form-control">
    <option selected>@lang('messages.paymentMethod')</option>
    <option>Visa</option>
    <option>MasterCard</option>
    </select>
    <br>
    <a class="btn btn-info" href="">@lang('messages.continue')</a>
</div>

@endsection

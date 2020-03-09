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
                <td><a class="btn btn-warning" href="{{ route('animal.desorder', $animal -> getId()) }}">@lang('messages.deletePet')</a></td>
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
                <th scope="col">@lang('messages.unitPrice')</th>
                <th scope="col">@lang('messages.totalPrice')</th>
            </tr>
        </thead> 
        <tbody>
            @foreach($data["items"] as $item)
            <tr>
                <td scope="row">{{ ($item -> getProduct() -> getType()) }}</td>
                <td scope="row">{{ ($item -> getQuantity()) }}</td>
                <td scope="row">{{ ($item -> getProduct() -> getPrice()) }}</td>
                <td scope="row">{{ ($item -> getTotalPrice() ) }}</td>
                <td><a class="btn btn-warning" href="{{ route('item.delete', $item -> getProduct() -> getId()) }}">@lang('messages.deleteProduct')</a></td>
            <tr>
            @endforeach
            <tr>
                <td scope="row"></td>
                <td scope="row"></td>
                <td scope="row"></td>
                <td scope="row">Total a pagar, toca cambiar esto, es donde necesito el código PHP</td>
            <tr>
        </tbody>
    </table>
    <a class="btn btn-info" href="{{ route('product.show') }}">@lang('messages.addProducts')</a>
</div>

<br>
<br>

<form action="{{ route('item.save') }}">
    @csrf
    <div class="container">
        <select class="form-control" name="payment">
            <option selected>@lang('messages.paymentMethod')</option>
            <option value="visa">Visa</option>
            <option value="mastercard">MasterCard</option>
        </select>
        <br>

        <a class="btn btn-info" href="{{ route('item.save') }}">@lang('messages.continue')</a>
        <!-- <input class="btn btn-info" type="submit" value="@lang('messages.continue')"/> -->
        <a class="btn btn-info" href="{{ route('order.flush') }}">@lang('messages.emptyOrder')</a>

    </div>
</form>

@endsection

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
                <td scope="row">{{ ($item -> getProductAux() -> getType()) }}</td>
                <td scope="row">{{ ($item -> getQuantity()) }}</td>
                <td scope="row">{{ ($item -> getProductAux() -> getPrice()) }}</td>
                <td scope="row">{{ ($item -> getTotalPriceAux() ) }}</td>
                <td><a class="btn btn-warning" href="{{ route('item.delete', $item -> getProductAux() -> getId()) }}">@lang('messages.deleteProduct')</a></td>
            <tr>
            @endforeach
            <tr>
                <td scope="row"></td>
                <td scope="row"></td>
                <td scope="row"></td>
                <td scope="row">{{$data['total']}}</td>
            <tr>
        </tbody>
    </table>
    <a class="btn btn-info" href="{{ route('product.show') }}">@lang('messages.addProducts')</a>
</div>

<br>
<br>


    
    <div class="container">
        <form action="{{ route('order.create') }}" method="post">
            @csrf
            <select class="form-control" name="payment">
                <option value="Visa">Visa</option>
                <option value="Mastercard">MasterCard</option>
            </select>
            <br>
            <button type="submit" class="btn btn-info">@lang('messages.continue')</button>
            <a class="btn btn-info" href="{{ route('order.flush') }}">@lang('messages.emptyOrder')</a>
        </form>
    </div>


@endsection

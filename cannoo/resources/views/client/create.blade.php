@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @if($errors->any())
                <ul id="errors">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
        @endif
        <form method="POST" action="{{ route('client.save') }}">
            @csrf
                <input type="text" placeholder="@lang('messages.name_form')" name="name"/>
                <input type="text" placeholder="@lang('messages.phone_form')" name="phone"/>
                <input type="text" placeholder="@lang('messages.address_form')" name="address"/>
                <input type="submit" value="Send" />
        </form>
    </div>
</div>
@endsection

@extends('layouts.master')

@section("title", "Crear certificado")

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @include('util.message')
                <div class="card-header">@lang('messages.createCert')</div>
                <div class="card-body">
                @if($errors->any())
                <ul id="errors">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                @endif

                <form method="POST" action="{{ route('certificate.save') }}">
                    @csrf
                    <input placeholder="@lang('messages.animal_form')" name="animal" value="{{ old('animal') }}" />
                    <input placeholder="@lang('messages.client_form')" name="client" value="{{ old('client') }}" />
                    <input type="date" placeholder="@lang('messages.date_form')" name="date" value="{{ old('date') }}" /> <br/> <br/>
                    <input type="checkbox" name="verified" value="verified">
                    <label for="verified">@lang('messages.verified')</label><br> <br/> 
                    <input type="submit" value="@lang('messages.send')" />
                </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@extends('layouts.master')

@section("title", "Crear certificado")

@section('content')
<div class="container">

    <nav class="breadcrumb" style="background-color: white;">
        <a class="breadcrumb-item" href="{{ route('home.index') }}">@lang('messages.home')</a>
        <span class="breadcrumb-item active">@lang('messages.createCert')</span>
    </nav>

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

                    <label for="animal">@lang('messages.animal'):</label>
                    <select name='animal' id="animal">
                    @foreach($data['animals'] as $index =>$animal)
                        @if(!$animal->getAdopted())
                        <option value="{{$animal->getId()}}">{{ $animal->getId()}}. {{$animal ->getType()}} {{$animal ->getBreed()}}</option>
                        @endif
                    @endforeach
                    </select> 
                    <br/> <br/>
                    <input placeholder="@lang('messages.client_form')" name="client" value="{{ old('client') }}" /> <br/> <br/>
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
@extends('layouts.master')

@section("title", $data["title"])

@section('content')
<div class="container">

    <nav class="breadcrumb" style="background-color: white;">
        <a class="breadcrumb-item" href="{{ route('home.index') }}">@lang('messages.home')</a>
        <span class="breadcrumb-item active">@lang('messages.addPet')</span>
    </nav>

    <div class="row justify-content-center">
        <div class="col-md-8">
        @include('util.message')
            <div class="card">
                <div class="card-header">@lang('messages.addPet')</div>
                <div class="card-body">
                @if($errors->any())
                <ul id="errors">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                @endif

                <form method="POST" action="{{ route('animal.save') }}"enctype="multipart/form-data">
                    @csrf
                    <input type="text" placeholder="@lang('messages.type_form')" name="type" value="{{ old('type') }}" /> <br/> <br/>
                    <input type="text" placeholder="@lang('messages.breed_form')" name="breed" value="{{ old('breed') }}" /> <br/> <br/>
                    <label for="date">@lang('messages.birth'):</label><br/>
                    <input type="date" placeholder="@lang('messages.birth_form')" name="birthDate" value="{{ old('birthDate') }}" /> <br/> <br/>
                    <label >@lang('messages.temp'):</label>
                    <input type="number"  name="min" style="width: 50px"value="{{ old('min') }}" /> 
                    <label >°C - </label>
                    <input type="number"  name="max" style="width: 50px"value="{{ old('max') }}" /> <label >°C</label> <br/> <br/>
                    <input type="checkbox" name="vaccinated" value="vacccinated">
                    <label for="vaccinated"> @lang('messages.vaccinated')</label><br> <br/> 
                    <div class="form-group">
                        <label>@lang('messages.image'):</label>
                        <input type="file" name="image"  accept="image/png, image/jpeg"/>
                    </div>
                    

                    <input type="submit" value="@lang('messages.send')" />
                </form>

                </div>
            </div>
        </div>
    </div>

</div>
@endsection

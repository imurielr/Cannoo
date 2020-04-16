@extends('layouts.master')
@section("title", $data["title"])

@section('content')
<link rel="stylesheet" href="{{ URL::asset('css/customStyles.css') }}">
<div class="container">
    <nav class="breadcrumb" style="background-color: white;">
        <a class="breadcrumb-item" href="{{ route('home.index') }}">@lang('messages.home')</a>
        <span class="breadcrumb-item active">@lang('messages.top5') @lang('messages.animals')</span>
    </nav>

    <div class="row justify-content-center">
    @foreach($data["animals"] as $indexKey => $pet)

        <div class="col-md-4" style="padding-top=5px; "> 
            <div class="card" style="min-width: 350px; min-height: 350px;">
                <div class="card-header">  @lang('messages.score'): {{ $pet->getLikes() }}</div>
                <div class="card-body"> 
                    <a href="{{route('animal.pet', $pet -> id) }}">
                        <img width="100%" height="100%" object-fit= "cover" src="{{ URL::to('/') }}/storage/uploads/animal/{{$pet->getId()}}.png">
                    </a>    
                </div>
            </div>
            <br />
        </div>   
    @endforeach    
   
    </div>    
</div>
@endsection


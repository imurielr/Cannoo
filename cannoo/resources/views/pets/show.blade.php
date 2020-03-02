@extends('layouts.master')

@section("title", $data["title"])

@section('content')
<div class="container">
    <div class="row justify-content-center">
    @foreach($data["pets"] as $indexKey => $pet)
        <div class="col-md-8" style="padding-top=5px;">
            <div class="card">
                <div class="card-header">{{ $pet->getName() }}</div>
                <div class="card-body">
                <a href="{{route('pets.pet', $pet -> id) }}"> @lang('messages.more_pet') {{ $pet->getId() }}</a>
                </div>
            </div>
            <br />
        </div>
        
    @endforeach    
    </div>
</div>
@endsection


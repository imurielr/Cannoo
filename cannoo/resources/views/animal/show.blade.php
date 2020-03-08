@extends('layouts.master')

@section("title", $data["title"])

@section('content')
<div class="container">
    <div class="row justify-content-center">
    @foreach($data["animal"] as $indexKey => $pet)
        <div class="col-md-8" style="padding-top=5px;">
            <div class="card">
                <div class="card-header">{{ $pet->getType() }}</div>
                <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <a href="{{route('animal.showAnimal', $animal -> id) }}"> @lang('messages.more_pet') {{ $pet->getId() }}</a>
                            </div>
                            <div class="col text-right">
                                <a class="btn btn-info" href="#">@lang('messages.addToOrder')</a>
                            </div>
                        </div>
                </div>
            </div>
            <br />
        </div>
        
    @endforeach    
    </div>
</div>
@endsection


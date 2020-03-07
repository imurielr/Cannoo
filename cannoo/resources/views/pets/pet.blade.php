@extends('layouts.master')

@section("title", $data["title"])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8" style="padding-top=5px;">
            <div class="card">
                <div class="card-header">{{ $data["pet"]->getName() }}</div>
                <div class="card-body">
                    <img width="70%" height="70%" src="{{ URL::to('/') }}/images/pets/{{$data['pet']->getId() }}.jpg"><br />
                    <b>Id:</b> {{ $data["pet"]->getId() }}<br />
                    <b>@lang('messages.name'):</b> {{ $data["pet"]->getName() }}<br />
                    <b>@lang('messages.type'):</b> {{ $data["pet"]->getType()}}<br />
                    <b>@lang('messages.breed'):</b> {{ $data["pet"]->getBreed() }}<br />
                    <b>@lang('messages.birth'):</b> {{ $data["pet"]->getDate()}}<br />
                    @if($data["pet"]->getVaccinated()==1)
                    <b>@lang('messages.vaccinated'):</b> @lang('messages.yes')<br />
                    @else
                    <b>@lang('messages.vaccinated'):</b> @lang('messages.no')<br />
                    @endif
                    <form method="POST" action="{{ route('pets.erase', $data['pet'] -> id) }}">
                        @csrf
                        <input class="btn btn-danger float-right" type="submit" value="@lang('messages.deletePet')"/>
                    </form> 
                </div>
            </div>
        </div> 
    </div>
</div>
@endsection
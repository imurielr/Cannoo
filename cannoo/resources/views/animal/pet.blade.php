@extends('layouts.master')

@section("title", $data["title"])

@section('content')
<div class="container">
    <a class="btn btn-info" href="{{ route('animal.show') }}">
        @lang('messages.showPets')
    </a>
</div>

<div class="container">
@if((Auth::user()->role == 'admin') or (!$data["animal"]->getAdopted() and Auth::user()->role == 'client') )
    <div class="row justify-content-center">
        <div class="col-md-8" style="padding-top=5px;">
            <div class="card">
                <div class="card-header">{{ $data["animal"]->getType() }}</div>
                <div class="card-body">
                    <img width="40%" height="40%" src="{{ URL::to('/') }}/storage/uploads/animal/{{$data['animal']->getId() }}.png"><br />
                    <b>Id:</b> {{ $data["animal"]->getId() }}<br />
                    <b>@lang('messages.type'):</b> {{ $data["animal"]->getType()}}<br />
                    <b>@lang('messages.breed'):</b> {{ $data["animal"]->getBreed() }}<br />
                    <b>@lang('messages.birth'):</b> {{ $data["animal"]->getBirthDate()}}<br />
                    @if($data["animal"]->getVaccinated()==1)
                    <b>@lang('messages.vaccinated'):</b> @lang('messages.yes')<br />
                    @else
                    <b>@lang('messages.vaccinated'):</b> @lang('messages.no')<br />
                    @endif

                    @if (Auth::user()->role == 'admin')
                        <form method="POST" action="{{ route('animal.erase', $data['animal'] -> id) }}">
                            @csrf
                            <input class="btn btn-danger float-right" type="submit" value="@lang('messages.deletePet')"/>
                        </form> 
                    @else
                        <a class="btn btn-info float-right" href="{{ route('animal.order', $data['animal'] -> id) }}">@lang('messages.addToOrder')</a>
                        <form method="POST" action="{{ route('animal.like',$data['animal'] -> id) }}" enctype="multipart/form-data">
                            @csrf
                            <button type="submit" class="btn btn-outline-primary">@lang('messages.like')</button>
                        </form>
                    @endif
                </div>
            </div>
        </div> 
    </div>
@else
<div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> @lang('messages.sorry') </div>
                <div class="card-body">
                    @lang('messages.unavailable') 
                </div>
            </div>
        </div>            
</div>
@endif
</div>
@endsection
@extends('layouts.master')

@section("title", $data["title"])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8" style="padding-top=5px;">
            <div class="card">
                <div class="card-header">{{ $data["animal"]->getType() }}</div>
                <div class="card-body">
                    <img width="70%" height="70%" src="{{ URL::to('/') }}/storage/uploads/{{$data['animal']->getImage() }}"><br />
                    <b>Id:</b> {{ $data["animal"]->getId() }}<br />
                    <b>@lang('messages.type'):</b> {{ $data["animal"]->getType()}}<br />
                    <b>@lang('messages.breed'):</b> {{ $data["animal"]->getBreed() }}<br />
                    <b>@lang('messages.birth'):</b> {{ $data["animal"]->getBirthDate()}}<br />
                    @if($data["animal"]->getVaccinated()==1)
                    <b>@lang('messages.vaccinated'):</b> @lang('messages.yes')<br />
                    @else
                    <b>@lang('messages.vaccinated'):</b> @lang('messages.no')<br />
                    @endif
                    <form method="POST" action="{{ route('animal.erase', $data['animal'] -> id) }}">
                        @csrf
                        <input class="btn btn-danger float-right" type="submit" value="@lang('messages.deletePet')"/>
                    </form> 
                </div>
            </div>
        </div> 
    </div>
</div>
@endsection
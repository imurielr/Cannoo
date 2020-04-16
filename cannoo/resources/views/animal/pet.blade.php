@extends('layouts.master')

@section("title", $data["title"])

@section('content')

<div class="container">

    <nav class="breadcrumb" style="background-color: white;">
        <a class="breadcrumb-item" href="{{ route('home.index') }}">@lang('messages.home')</a>
        <a class="breadcrumb-item" href="{{ route('animal.show') }}">@lang('messages.pets')</a>
        <span class="breadcrumb-item active">{{ $data['animal']->getType() }}</span>
    </nav>

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
                        <button class="btn btn-danger float-right" data-toggle="modal" data-target="#deleteModal"/>@lang('messages.deletePet')<button/>
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

<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModalLabel">@lang('messages.deletePet')</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        @lang('messages.deletePetConfirm')
      </div>
      <div class="modal-footer">
        <form method="POST" action="{{ route('animal.erase', $data['animal'] -> id) }}">
            @csrf
            <input type="button" class="btn btn-secondary" style="margin-right: 5px;" data-dismiss="modal" value="@lang('messages.cancel')"/>
            <input class="btn btn-danger float-right" type="submit" value="@lang('messages.deletePet')"/>
        </form> 
      </div>
    </div>
  </div>
</div>
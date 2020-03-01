@extends('layouts.master')

@section("title", $data["title"])

@section('content')
<div class="container">
    @foreach($data["certificates"] as $index => $certificate)
        <div class="col-md-8" style="padding-top=5px;">
            <div class="card">
                <div class="card-header">@lang('messages.cert') #{{ $certificate ->getId()}}</div>
                    <div class="card-body">
                        <b>@lang('messages.owner'):</b> {{ $certificate ->getClient()}}<br />
                        <b>@lang('messages.animal'):</b> {{ $certificate ->getAnimal()}}<br />
                        <b>@lang('messages.date'):</b> {{ $certificate->getDate()}}<br />
                        @if($certificate->getVerified()==1)
                        <b>@lang('messages.verified'):</b> @lang('messages.yes')<br />
                        @else
                        <b>@lang('messages.verified'):</b> @lang('messages.no')<br />
                        @endif 
                        </div>
            </div>
            <br />
        </div>
    @endforeach
</div>
@endsection
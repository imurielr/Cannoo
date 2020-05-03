@extends('layouts.master')

@section("title", $data["title"])

@section('content')
<div class="container">
    <nav class="breadcrumb" style="background-color: white;">
        <a class="breadcrumb-item" href="{{ route('home.index') }}">@lang('messages.home')</a>
        <span class="breadcrumb-item active">@lang('messages.certificates')</span>
    </nav>
    @foreach($data["certificates"] as $index => $certificate)
        @if ((Auth::user()->role == 'admin') or (Auth::user()->name == $certificate->getClient()))
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
                        @if (Auth::user()->role == 'admin')
                            <input class="btn btn-danger" type="submit" data-toggle="modal" data-target="#deleteModal{{$certificate->getId()}}" value="@lang('messages.deleteCertificate')"/>
                        @endif
                    </div>
            </div>
            <br />
        </div>
        @endif
        <!-- Modal -->
        <div class="modal fade" id="deleteModal{{$certificate->getId()}}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="deleteModalLabel">@lang('messages.deleteCertificate') #{{$certificate->getId()}}</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  @lang('messages.deleteCertConfirm')
                </div>
                <div class="modal-footer">
                  <form method=POST action="{{ route('certificate.delete', $certificate->getId()) }}">
                      @csrf
                      <input type="button" class="btn btn-secondary" style="margin-right: 5px;" data-dismiss="modal" value="@lang('messages.cancel')"/>
                      <input class="btn btn-danger float-right" type="submit" value="@lang('messages.deleteCertificate')"/>
                  </form> 
                </div>
              </div>
            </div>
          </div>
    @endforeach
</div>
@endsection
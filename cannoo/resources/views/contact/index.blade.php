@extends('layouts.master')

@section("title", "Crear Producto")

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                @include('util.message')
                <div class="card-header">@lang('messages.leave_message')</div>
                <div class="card-body">
                    @if($errors->any())
                    <ul id="errors">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    @endif

                    <form method="POST" action="{{ route('contact.save') }}" enctype="multipart/form-data">
                        @csrf
                        <label>@lang('messages.from'):  </label>
                        <input type="text" style ="width:300px"placeholder="@lang('messages.origin')" name="client" value="{{ Auth::user()->name }}" />
                        <br/><br/>
                        <input type="text" style ="width:300px"placeholder="@lang('messages.subject')" name="subject" value="{{ old('subject') }}" />
                        <br/><br/>
                        <textarea style ="width:700px" rows="10"placeholder="@lang('messages.write_here')" name="message" value="{{ old('message') }}"></textarea>
                        <br/><br/>
                        <input type="submit" value="@lang('messages.send')" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
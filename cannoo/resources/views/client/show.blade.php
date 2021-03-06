@extends('layouts.master')
@section("title", $data["title"])
@section('content')


<div class="container">

    <nav class="breadcrumb" style="background-color: white;">
        <a class="breadcrumb-item" href="{{ route('home.index') }}">@lang('messages.home')</a>
        <span class="breadcrumb-item active">@lang('messages.clients')</span>
    </nav>

    <div class="row justify-content-center">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">@lang('messages.name')</th>
                    <th scope="col">@lang('messages.actions')</th>
                </tr>
            </thead> 
            <tbody>
                @foreach($clients as $client)
                    <tr>
                        
                        <td scope="row">{{ $client -> id }}</td>
                        <td>{{ $client -> name }}</td>
                        <td><a class="btn btn-info" href="{{ route('client.showClient', $client -> id) }}">@lang('messages.details')</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

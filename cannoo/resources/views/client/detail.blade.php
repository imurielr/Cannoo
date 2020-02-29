@extends('layouts.master')

@section('content')
<div class="container">
    <a class="btn btn-info" href="{{ route('client.show') }}">
        @lang('messages.showClients')
    </a>
</div>


<div class="container">
    <div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">@lang('messages.name')</th>
                    <th scope="col">@lang('messages.phone')</th>
                    <th scope="col">@lang('messages.address')</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td scope="row">{{ $client -> id }}</td>
                    <td>{{ $client -> name }}</td>
                    <td>{{ $client -> phone }}</td>
                    <td>{{ $client -> address }}</td>
                    <td><a class="btn btn-danger" href="{{ route('client.delete', $client -> id) }}">@lang('messages.deleteClient')</a></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
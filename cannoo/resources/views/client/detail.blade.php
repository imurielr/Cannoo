@extends('layouts.master')

@section('content')

<div class="container">

    <nav class="breadcrumb" style="background-color: white;">
        <a class="breadcrumb-item" href="{{ route('home.index') }}">@lang('messages.home')</a>
        <a class="breadcrumb-item" href="{{ route('client.show') }}">@lang('messages.clients')</a>
        <span class="breadcrumb-item active">{{ $client->getName() }}</span>
    </nav>

    <div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">@lang('messages.name')</th>
                    <th scope="col">@lang('messages.email_address')</th>
                    <th scope="col">@lang('messages.address')</th> 
                    <th scope="col">@lang('messages.phone')</th> 
                    <th scope="col">@lang('messages.actions')</th> 
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td scope="row">{{ $client->getId() }}</td>
                    <td>{{ $client->getName() }}</td>
                    <td>{{ $client->getEmail() }}</td>
                    <td>{{ $client->getAddress()}}</td>
                    <td>{{ $client->getPhone()}}</td>  
                    <td>
                        <form method=POST action="{{ route('client.delete', $client->getId()) }}">
                            @csrf
                            <input class="btn btn-danger" type="submit" value="@lang('messages.deleteClient')"/>
                        </form>
                        <form method=POST action="{{ route('client.makeAdmin', $client->getId()) }}"> <br/>
                            @csrf
                            <input class="btn btn-info" type="submit" value="@lang('messages.makeAdmin')"/>
                        </form>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
@extends('layouts.master')

@section('content')
<div class="container">

    <nav class="breadcrumb" style="background-color: white;">
        <a class="breadcrumb-item" href="{{ route('home.index') }}">@lang('messages.home')</a>
        <span class="breadcrumb-item active">@lang('messages.messages')</span>
    </nav>

<div class="container">
    <div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">@lang('messages.name')</th>
                    <th scope="col">@lang('messages.subject')</th> 
                    <th scope="col">@lang('messages.message')</th> 
                    <th scope="col">@lang('messages.actions')</th> 
                </tr>
            </thead>

            <tbody>
                @foreach($data['messages'] as $message)
                <tr>
                    <td scope="row">{{ $message->getId() }}</td>
                    <td>{{ $message->getClient() }}</td>
                    <td>{{ $message->getSubject() }}</td>
                    <td>{{ $message->getMessage()}}</td>
                    <td>
                        <form method=POST action="{{ route('contact.delete', $message->getId()) }}">
                            @csrf
                            <input class="btn btn-danger" type="submit" value="@lang('messages.deleteMessage')"/>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection


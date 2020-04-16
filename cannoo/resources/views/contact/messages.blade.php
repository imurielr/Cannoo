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
                        <input class="btn btn-danger" type="submit" data-toggle="modal" data-target="#deleteModal" value="@lang('messages.deleteMessage')"/>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModalLabel">@lang('messages.deleteMessage')</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        @lang('messages.deleteMsgConfirm')
      </div>
      <div class="modal-footer">
        <form method=POST action="{{ route('contact.delete', $message->getId()) }}">
            @csrf
            <input type="button" class="btn btn-secondary" style="margin-right: 5px;" data-dismiss="modal" value="@lang('messages.cancel')"/>
            <input class="btn btn-danger float-right" type="submit" value="@lang('messages.deleteMessage')"/>
        </form> 
      </div>
    </div>
  </div>
</div>

@extends('layouts.master')

@section('title', $client->getName())

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
                        <input class="btn btn-danger" type="submit" data-toggle="modal" data-target="#deleteModal" value="@lang('messages.deleteClient')"/>
                        <input class="btn btn-info" type="submit" data-toggle="modal" data-target="#adminModal" value="@lang('messages.makeAdmin')"/>
                    </td>
                </tr>
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
        <h5 class="modal-title" id="deleteModalLabel">@lang('messages.deleteClient')</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        @lang('messages.deleteClientConfirm')
      </div>
      <div class="modal-footer">
        <form method=POST action="{{ route('client.delete', $client->getId()) }}">
            @csrf
            <input type="button" class="btn btn-secondary" style="margin-right: 5px;" data-dismiss="modal" value="@lang('messages.cancel')"/>
            <input class="btn btn-danger float-right" type="submit" value="@lang('messages.deleteClient')"/>
        </form> 
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="adminModal" tabindex="-1" role="dialog" aria-labelledby="adminModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="adminModalLabel">@lang('messages.makeAdmin')</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        @lang('messages.makeAdminConfirm')
      </div>
      <div class="modal-footer">
        <form method=POST action="{{ route('client.makeAdmin', $client->getId()) }}"> <br/>
            @csrf
            <input type="button" class="btn btn-secondary" style="margin-right: 5px;" data-dismiss="modal" value="@lang('messages.cancel')"/>
            <input class="btn btn-info float-right" type="submit" value="@lang('messages.makeAdmin')"/>
        </form> 
      </div>
    </div>
  </div>
</div>
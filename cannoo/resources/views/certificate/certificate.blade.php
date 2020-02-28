@extends('layouts.master')

@section("title", $data["title"])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8" style="padding-top=5px;">
            <div class="card">
                <div class="card-header">{{ $data["certificate"]["animal"]->getName() }}</div>
                <div class="card-body">
                    <b>Id:</b> {{ $data["certificate"]["id"] }}<br />
                    <b>Dueño:</b> {{ $data["certificate"]["owner"] ->getName()}}<br />
                    <b>Fecha:</b> {{ $data["certificate"]["date"]}}<br />
                    @if($data["certificate"]["verified"]==1)
                    <b>Verificado:</b> Sí<br />
                    @else
                    <b>Verificado:</b> No<br />
                    @endif 
                </div>
            </div>
        </div> 
    </div>
</div>
@endsection
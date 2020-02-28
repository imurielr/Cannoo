@extends('layouts.master')

@section("title", $data["title"])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8" style="padding-top=5px;">
            <div class="card">
                <div class="card-header">Certificado #{{ $data["certificate"]->getId() }}</div>
                <div class="card-body">
                    <b>Dueño:</b> {{ $data["certificate"] ->getClient()}}<br />
                    <b>Animal:</b> {{ $data["certificate"] ->getAnimal()}}<br />
                    <b>Fecha:</b> {{ $data["certificate"]->getDate()}}<br />
                    <a href="file($data['certificate']->getFile())">Open the pdf!</a>
                </div>
            </div>
        </div> 
    </div>
</div>
@endsection

@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">Info apie Žveją</div>
    <div class="card-body">
        <h5>Žvejys: {{ $member->name }} {{$member->surname}}</h5>
        <h5>Gyvena mieste: {{ $member->live }}</h5>
        <h5>Patirtis metais: {{ $member->experience }}</h5>
        <h5>Registruotas klube metais: {{ $member->registered }}</h5>
        <hr>
        <h5>Leidžiama žvejoti:  {{ $member->reservoir->title }}</h5>
        <table class="table">
        </table>
    </div>
</div>
@endsection
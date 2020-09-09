@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Pakeiskime vandens telkinio info</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('reservoirs.update', $reservoir->id) }}">
                        @csrf @method("PUT")
                        <div class="form-group">
                            <label for="">Pavadinimas</label>
                            <input type="text" name="title" class="form-control" value="{{ $reservoir->title }}">
                        </div>
                        <div class="form-group">
                            <label for="">Plotas</label>
                            <input type="number" name="area" class="form-control" value="{{ $reservoir->area }}">
                        </div>
                        <div class="form-group">
                            <label for="">Aprašas</label>
                            <textarea id="mce" type="text" name="about" rows=10 cols=100 class="form-control">{{ $reservoir->about }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Pakeisti</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
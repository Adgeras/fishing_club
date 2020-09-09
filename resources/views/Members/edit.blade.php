@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Pakeiskime žvejo info</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('members.update', $member->id) }}">
                        @csrf @method("PUT")
                        <div class="form-group">
                            <label>Vardas: </label>
                            <input type="text" name="name" class="form-control" value="{{ $member->name }}">
                        </div>
                        <div class="form-group">
                            <label>Pavardė: </label>
                            <input type="text" name="surname" class="form-control" value="{{ $member->surname }}"> 
                        </div>
                        <div class="form-group">
                            <label>Miestas kuriame gyvena: </label>
                            <input type="text" name="live" class="form-control" value="{{ $member->live }}"> 
                        </div>
                        <div class="form-group">
                            <label>Patirtis metais</label>
                            <input type="number" name="experience" class="form-control" value="{{ $member->experience }}"> 
                        </div>
                        <div class="form-group">
                            <label>Klube registruotas metais: </label>
                            <input type="number" name="registered" class="form-control" value="{{ $member->registered }}"> 
                        </div>
                        <div class="form-group">
                            <label>Vandens telkinys kuriame žvejoja: </label>
                            <select name="menu_id" id="" class="form-control">
                                 <option value="" selected disabled>Pasirinkite telkinį</option>
                                 @foreach ($reservoirs as $reservoir)
                                <option value="{{ $reservoir->id }}" @if($reservoir->id == $member->reservoirs_title) selected="selected" @endif>{{ $reservoir->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Pakeisti</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
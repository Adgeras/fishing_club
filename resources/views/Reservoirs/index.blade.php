@extends('layouts.app')
@section('content')
<div class="card-body">
    @if($errors->any())
    <h4 style="color: red">{{$errors->first()}}</h4>
    @endif
    <table class="table">
        <tr>
            <th>Pavadinimas</th>
            <th>Telkinio plotas</th>
            <th>Aprašymas</th>
            <th>Veiksmai</th>
        </tr>
        @foreach ($reservoirs as $reservoir)
        <tr>
            <td>{{ $reservoir->title }}</td>
            <td>{{ $reservoir->area }}</td>
            <td>{!! $reservoir->about !!}</td>
            <td>
                <form action={{ route('reservoirs.destroy', $reservoir->id) }} method="POST">
                    <a class="btn btn-success" href={{ route('reservoirs.edit', $reservoir->id) }}>Redaguoti</a>
                    @csrf @method('delete')
                    <input type="submit" class="btn btn-danger" value="Trinti"/>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    <div>
        <a href="{{ route('reservoirs.create') }}" class="btn btn-success">Pridėti</a>
    </div>
</div>
@endsection
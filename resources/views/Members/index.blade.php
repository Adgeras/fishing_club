@extends('layouts.app')
@section('content')
<div class="card-body">
    <form action="{{ route('members.index') }}" method="GET">
        <select name="reservoir_id" id="" class="form-control">
            <option value="" selected disabled>Pasirinkite telkinį filtravimui:</option>
            @foreach ($reservoirs as $reservoir)
            <option value="{{ $reservoir->id }}" 
                @if($reservoir->id == app('request')->input('reservoir_id')) 
                    selected="selected" 
                @endif>{{ $reservoir->title }}</option>
            @endforeach
        </select>
        <button type="submit" class="btn btn-primary">Filtruoti</button>
    </form>
</div>
<div class="card-body">
    @if($errors->any())
    <h4 style="color: red">{{$errors->first()}}</h4>
    @endif
    <table class="table">
        <tr>
            <th>Vardas</th>
            <th>Pavardė</th>
            <th>Gyvenamoji vieta</th>
            <th>Patirtis metas</th>
            <th>Registruotas klube metais</th>
            <th>Žvejoja telkinyje</th>
            <th>Veiksmai</th>
        </tr>
        @foreach ($members as $member)
        <tr>
            <td class="text-center">{{ $member->name }}</td>
            <td class="text-center">{{ $member->surname }}</td>
            <td class="text-center">{{ $member->live }}</td>
            <td class="text-center">{{ $member->experience }}</td>
            <td class="text-center">{{ $member->registered }}</td>
            <td class="text-center">{{ $member->reservoir['title'] }}</td>
            <td class="text-center">
                <form action={{ route('members.destroy', $member->id) }} method="POST">
                    <a class="btn btn-success" href={{ route('members.edit', $member->id) }}>Redaguoti</a>
                    <a class="btn btn-primary" href={{ route('members.travel', $member->id) }}>Plačiau</a>
                    @csrf @method('delete')
                    <input type="submit" class="btn btn-danger" value="Trinti"/>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    <div>
        <a href="{{ route('members.create') }}" class="btn btn-success">Pridėti</a>
    </div>
</div>
@endsection
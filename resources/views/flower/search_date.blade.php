@extends('layouts.site')
@section('content')
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
        <tr>
            <th scope="col">№</th>
            <th scope="col">Наименование</th>
            <th scope="col">Страна</th>
            <th scope="col">Цена</th>
        </tr>
        </thead>
        <tbody>
        @forelse  ($dates->sortByDesc('id') as $row)
            <tr>
                <th scope="row">{{$row->id}}</th>
                <td><a href="/flower/show/{{$row->id}}">{{ $row->name }}</a></td>
                <td><p class="card-text">{{$row->country}}</p></td>
                <td><p class="card-text">{{$row->price}}</p></td>
            </tr>
        @empty
            <p>Пока что здесь ничего нет.</p>
        @endforelse
        </tbody>
    </table>

@endsection


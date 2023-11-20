@extends('layouts.site')
@section('content')
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
        <tr>
            <th scope="col">№</th>
            <th scope="col">Поставщики</th>
            <th scope="col">Цветы</th>
            <th scope="col">Действие</th>
        </tr>
        </thead>
        <tbody>
        @forelse  ($provider_has_flowers->sortByDesc('id') as $row)
            <tr>
                <th style="width: 50px" scope="row">{{$row->id}}</th>
                <td style="width: 400px"><p class="card-text">{{ $row->provider }}</p></td>
                <td><p class="card-text">{{$row->flower}}</p></td>
                <td><a class="btn btn-outline-danger" href="/pf/show/{{$row->id}}/del">Удалить</a></td>
            </tr>
        @empty
            <p>Пока что здесь ничего нет.</p>
        @endforelse
        </tbody>
    </table>

@endsection


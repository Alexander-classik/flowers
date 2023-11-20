@extends('layouts.site')
@section('content')
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
        <tr>
            <th scope="col">№</th>
            <th scope="col">Поставщики</th>
            <th scope="col">Продавцы</th>
        </tr>
        </thead>
        <tbody>
        @forelse  ($salesman_has_providers->sortByDesc('id') as $row)
            <tr>
                <th style="width: 50px" scope="row">{{$row->id}}</th>
                <td style="width: 400px"><p class="card-text">{{ $row->provider_id }}</p></td>
                <td><p class="card-text">{{$row->salesman_id}}</p></td>
            </tr>
        @empty
            <p>Пока что здесь ничего нет.</p>
        @endforelse
        </tbody>
    </table>

@endsection



@extends('layouts.site')
@section('content')
    <br>
    <form method="get" action="{{route('search_f')}}">
        <div class="form-row">
            <div class="input-group mb-10">
                <input type="text" class="form-control" id="s" name="s" placeholder="Поиск...">
                <button type="submit" class="btn btn-primary" aria-pressed="false">
                    Искать!
                </button>
            </div>
        </div>
    </form>
    <br>
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
        @forelse  ($flower->sortByDesc('id') as $row)
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

    {{$flower->appends(['s' => request()->s])->links()}}


@endsection

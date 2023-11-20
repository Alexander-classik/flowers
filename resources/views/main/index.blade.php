@extends('layouts.site')
@section('content')
    <br>
    <ul>
        <li>
            <form method="get" action="{{route('search_f')}}">
                <div class="form-row">
                    <div class="input-group mb-10">
                        <input type="text" class="form-control" id="s" name="s" placeholder="Страна">
                        <button type="submit" class="btn btn-primary" aria-pressed="false">
                            Искать!
                        </button>
                    </div>
                </div>
            </form>
        </li>
        <br>
        <li>
            <form method="get" action="{{route('search_date')}}">
                <div class="form-row">
                    <div class="input-group mb-10">
                        <input type="text" class="form-control" id="begin_date" name="begin_date" placeholder="Начало сезона">
                        <input type="text" class="form-control" id="end_date" name="end_date" placeholder="Конец сезона">
                        <button type="submit" class="btn btn-primary" aria-pressed="false">
                            Искать!
                        </button>
                    </div>
                </div>
            </form>
        </li>
    </ul>
    <br>
    <style>
        p {
            margin: 0;
            font-size: 30px;
            text-indent: 3ch;
        }

        p.pilcrow {
            text-indent: 0;
            display: inline;
        }
        p.pilcrow + p.pilcrow::before {
            content: " ¶ ";
        }
        .grad {
            font-family: 'Rubik One', sans-serif;
            font-size: 45px;
            text-transform: uppercase;
            background: linear-gradient(45deg, #0B2349 33%, #0D61BC 66%, #8AA9D6);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            color: #0B2349;
            display: table;
            margin: 20px auto;
        }
    </style>
    <div class="container my-4">
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @forelse  ($flower->sortByDesc('price') as $f)
                <div class="col">
                    <div class="card h-100">
                        <img src="{{asset('storage/' . $f->img) }}" class="card-img-top img-fluid aspect-ratio-square @if($f->imageIsSmaller()) img-cover @endif" alt="">
                        <div class="row row-cols-1">
                            <h class="card-text grad">{{ $f->name }}</h>
                            <p class="card-text">Цвет: {{ $f->color}}</p>
{{--                            <p class="card-text">Начало периода: <br/>{{ $f->begin_date}}</p>--}}
{{--                            <p class="card-text">Завершение периода: <br/>{{ $f->end_date}}</p>--}}
                            <p class="card-text">Страна: {{ $f->country}}</p>
                            <p class="card-text">Цена: {{ $f->price}} руб.</p>
                            <a class="btn btn-outline-info" type="button" href="/flower/show/{{$f->id}}" >Подробнее</a>
                        </div>
                    </div>
                </div>
            @empty
                <p>Пока что здесь ничего нет.</p>
            @endforelse
        </div>
    </div>

@endsection

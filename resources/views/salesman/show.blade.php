@extends('layouts.site')
@section('content')
    <style>
        .header-h1 h1 {
            position: relative;
            padding-bottom: .5rem;
            font-size: 1.5rem;
            text-transform: uppercase;
            text-align: center;
            color: #00838f;
        }
        .header-h1 h1::before {
            content: "";
            position: absolute;
            border-bottom: 2px solid #00838f;
            bottom: .25rem;
            left: 50%;
            width: 30%;
            transform: translateX(-50%);
        }
        .header-h1 h1::after {
            content: "";
            position: absolute;
            border-bottom: 2px solid #00838f;
            bottom: 0;
            left: 50%;
            width: 15%;
            transform: translateX(-50%);
        }
        p {
            margin: 0;
            text-indent: 3ch;
        }

        p.pilcrow {
            text-indent: 0;
            display: inline;
        }
        p.pilcrow + p.pilcrow::before {
            content: " ¶ ";
        }
    </style>
    <body>
    <div class="container py-4">
        <div class="row justify-content-md-center">
            <div class="col-md-8">
                <div class="header-h1">
                    <h1 class="h2">{{$salesman->name}}</h1>
                </div>
                <div class="card-body">
                    <p class="card-text"></p>
                    <p class="card-text">Телефон: {{$salesman->phone}}</p>
                    <p class="card-text">Адрес: {{$salesman->address}}</p>
                    <table class="table table-bordered table-striped">
                        <thead class="table-dark">
                        <tr>
                            <th scope="col">№</th>
                            <th scope="col">Поставщик</th>
                            <th scope="col">Действие</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse  ($salesman->provider_s as $row)
                            <tr>
                                <th style="width: 50px" scope="row">{{$row->id}}</th>
                                <td style="width: 400px"><p class="card-text">{{ $row->name }}</p></td>
                                <td><a class="btn btn-outline-info" href="/provider/show/{{$row->id}}">Просмотр</a>
                                </td>
                            </tr>
                        @empty
                            <p>Пока что здесь ничего нет.</p>
                        @endforelse
                        </tbody>
                    </table>
                    {{--                    <a class="btn btn-outline-danger" href="/sprav/show/{{$sprav->id}}/del">Удалить</a>--}}
                </div>

            </div>
        </div>
    </div>
    </body>

@endsection

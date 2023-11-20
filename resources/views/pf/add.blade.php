@extends('layouts.site')

@section('content')
    <div class="container py-4">
        <div class="row justify-content-md-center">
            <div class="col-md-8 col-md-offset-2">
                <div class="card mb-3">
                    <div class="card-header">Добавить соотношение цветов и поставщиков</div>

                    <div class="card-body">
                        <form method="POST" action="/pf" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <label for="provider_id">Выберите поставщика:</label>
                            <select id="provider-has-flowers-dropdown" class="form-control" name="provider_id">
                                <option value="">-- Поставщики --</option>
                                @foreach ($providers as $provider)
                                    <option value="{{$provider->id}}">
                                        {{$provider->name}}
                                    </option>
                                @endforeach
                            </select>
                            <label for="flower_id">Выберите сраночник:</label>
                            <select id="provider-has-flowers-dropdown" class="form-control" name="flower_id">
                                <option value="">-- Цветы --</option>
                                @foreach ($flowers as $flower)
                                    <option value="{{$flower->id}}">
                                        {{$flower->name}}
                                    </option>
                                @endforeach
                            </select>
                            <div class="form-group mb-3">
                                <button type="submit" class="btn btn-primary">Опубликовать</button>
                            </div>

                            @if (count($errors))
                                <ul class="alert alert-danger">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            @endif
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

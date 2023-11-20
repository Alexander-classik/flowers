@extends('layouts.site')

@section('content')
    <div class="container py-4">
        <div class="row justify-content-md-center">
            <div class="col-md-8 col-md-offset-2">
                <div class="card mb-3">
                    <div class="card-header">Добавить справочный материал</div>

                    <div class="card-body">
                        <form method="POST" action="/provider" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="form-group mb-3">
                                <label for="title">Название:</label>
                                <input type="text" class="form-control" id="name" name="name"
                                       value="{{ old('name') }}" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="title">Телефон:</label>
                                <input type="text" class="form-control" id="phone" name="phone"
                                       value="{{ old('phone') }}" required>
                            </div>
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

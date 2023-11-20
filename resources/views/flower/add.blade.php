@extends('layouts.site')
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" rel="stylesheet" />

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>

@section('content')

    <div class="container py-4">
        <div class="row justify-content-md-center">
            <div class="col-md-8 col-md-offset-2">
                <div class="card mb-3">
                    <div class="card-header">Добавить цветы</div>

                    <div class="card-body">
                        <form method="POST" action="/main" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="form-group mb-3">
                                <label for="title">Название:</label>
                                <input type="text" class="form-control" id="name" name="name"
                                       value="{{ old('name') }}" required>
                            </div>

                            <div class="form-group mb-3">
                            <label for="mark_id">Цвет:</label>
                            <input type="text" class="form-control" id="color" name="color"
                                   value="{{ old('color') }}" required>
                            </div>

                            <div class="form-group mb-3">
                                <label for="mark_id">Начало периода:</label>
                                <input type="date" class="form-control" id="begin_date" name="begin_date"
                                       value="{{ old('begin_date') }}" required>
                            </div>

                            <div class="form-group mb-3">
                                <label for="mark_id">Завершение периода:</label>
                                <input type="date" class="form-control" id="end_date" name="end_date"
                                       value="{{ old('end_date') }}" required>
                            </div>

                            <!-- фото-->
                            <div class="form-group bmd-form-group is-focused file-input">
                                <label for="photo">Выберите фотографию:</label>
                                <input type="file" name="img" id="img" class="form-control-file">
                            </div>

                            <div class="form-group mb-3">
                                <label for="title">Стрна:</label>
                                <input type="text" class="form-control" id="country" name="country"
                                       value="{{ old('country') }}" required>
                            </div>

                            <div class="form-group mb-3">
                                <label for="title">Цена:</label>
                                <input type="text" class="form-control" id="price" name="price"
                                       value="{{ old('price') }}" required>
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

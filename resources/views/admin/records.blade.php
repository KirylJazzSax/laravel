@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Записи пользователя {{ $user->name }}</div>
                    <div class="card-body">
                        @foreach ($records as $record)
                            <div class="d-flex flex-column"></div>
                            <div>Заголовок: {{ $record->title }}</div>
                            <div>Запись: {{ $record->record }}</div>
                            <div><a href="/record/{{ $record->id }}/edit">Редактировать</a></div>
                            <div>
                                <form action="/record/{{ $record->id }}/delete" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <input type="submit" value="Удалить запись" class="btn btn-danger">
                                </form>
                            </div>
                            <hr>
                        @endforeach
                        <div>
                            <a href="/admin/users/{{ $user->id }}/records/create">Создать запись у пользователя</a>
                        </div>
                        <div><a href="/admin/users">Назад к пользователям</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
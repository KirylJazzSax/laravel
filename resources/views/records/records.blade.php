@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Ваши записи
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                    @foreach($records as $record)
                        <div class="d-flex flex-column"></div>
                        <div>Заголовок: {{ $record->title }}</div>
                        <div>Запись: {{ $record->record }}</div>
                        <div><a href="/record/{{ $record->id }}/edit">редактировать?</a></div>
                        <hr>
                    @endforeach
                        <div><a href="/record/create">Создать запись?</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

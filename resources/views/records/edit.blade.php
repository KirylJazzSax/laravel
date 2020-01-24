@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Редактиуем запись</div>

                    <div class="card-body">
                        <form action="/record/{{ $record->id }}" method="POST" class="d-flex flex-column">
                            @csrf
                            @method('PUT')

                            Заголовок <input type="text" name="title" value="{{ $record->title }}">

                            @error('title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                            Запись <input type="text" name="record" value="{{ $record->record }}">
                            @error('record')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                            <input type="submit" class="mt-2">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

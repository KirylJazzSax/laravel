@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Создадим запись</div>

                    <div class="card-body">
                        <form action="{{ '/' . \Illuminate\Support\Facades\Request::path() }}" method="POST" class="d-flex flex-column">
                            @csrf

                            Заголовок <input type="text" name="title">

                            @error('title')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror

                            Запись <input type="text" name="record">
                            @error('record')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <input type="hidden"
                                   name="user_id"
                                   value="{{ $user->id ?? '' }}">
                            <input type="submit" class="mt-2">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Здравствуйте {{ \Illuminate\Support\Facades\Auth::user()->name }}</div>
                    <div class="card-body">
                        @foreach($users as $user)
                            <div class="d-flex flex-column"></div>
                            <div>Имя: {{ $user->name }}</div>
                            <div>Электронный адрес: {{ $user->email }}</div>
                            <div><a href="/admin/users/{{ $user->id }}/records">записи пользователя</a></div>
                            <hr>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

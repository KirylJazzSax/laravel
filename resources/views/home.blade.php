@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Здравствуйте {{ \Illuminate\Support\Facades\Auth::user()->name }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <a href="/records">Посмотреть ваши записи?</a>
                        @if(\Illuminate\Support\Facades\Auth::user()->isAdmin())
                            <div><a href="/admin/users">Посмотреть Админку</a></div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

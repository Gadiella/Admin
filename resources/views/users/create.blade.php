@extends('layout.base')
@section('content')
    <div class="container">
        <a href="{{ route('dashbord') }}">
           Home
        </a>
        <a href="{{ route('logout') }}">
            Se déconnecter
        </a>
        <h1>Créer un utilisateur</h1>
        <form action="{{ route('users.store') }}" method="POST">
            @csrf

            @if ($errors->any())
                <ul class="alert alert-danger">
                    {!! implode('', $errors->all('<p>:message</p>')) !!}
                </ul>
            @endif
            @if ($message = Session::get('error'))
                <div>{{ $message }}</div><br />
            @endif
            @if ($message = Session::get('success'))
                <div>{{ $message }}</div><br />
            @endif

            <div class="form-group">
                <label for="name">Nom</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Créer</button>
        </form>
    </div>
@endsection

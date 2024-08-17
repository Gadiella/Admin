

@extends('layout.base')
@section('content')
<form action="{{ route('otpCpde.process') }}" method="POST">
        @csrf
        <h1>Code de confirmation</h1>
        
        @if ($errors->any())
        <ul class="alert alert-danger">

            {!! implode('', $errors->all('<li>:message</li>')) !!}
        </ul>

        @endif

        @if ($message = Session::get('error')) <div>{{ $message }}</div><br />
        @endif
        <p>Un code de confirmation a été envoyé à votre adresse e-mail. Saisissez-le dans le champs pour continuer. </p>

        <label for="code">Code de confirmation</label><br />
        <input type="hidden" name="email" id="email" value="{{ session()->get('email') }}">
        <input type="text" name="code" id="code" autocomplete="off" placeholder="Saisir le code ici"><br /><br />

        <button type="submit">Soumettre</button>

    </form>
    @endsection
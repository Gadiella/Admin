<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ URL::asset('./assets/bootstrap/css/bootstrap.min.css')}}" />
    <script src="./assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="./assets/bootstrap/js/bootstrap.bundle.js"></script>

    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Authentification</title>
</head>

<body>
    <div class="grid text-center ">

        <div class="row mt-5">
            <div class="col"></div>
            <div class="col card shadow p-3 mb-5 bg-body-tertiary rounded">
                <form action="{{ route('login.process') }}" method="POST">
                    @csrf

                    <h1>Connexion</h1>
                    
                    <br> <br>
                    @if ($errors->any())
                    <ul class="alert alert-danger">
                        {!! implode('', $errors->all('<li>:message</li>')) !!}
                    </ul>

                    @endif

                    @if ($message = Session::get('error'))
                    <div>{{ $message }}</div><br />
                    @endif

                  
                    <label for="email">Email</label><br>
                    <input type="email" name="email" id="email" placeholder="Saisir l'e-mail ici ..."><br><br>

                    <label for="password">Mot de passe</label><br>
                    <input type="password" name="password" id="password" placeholder="Saisir le mot de passe ici ..."><br><br>

               

                    <button class="btn btn-primary" type="submit">Soumettre</button>

                </form>
            </div>
            <div class="col"></div>
        </div>


    </div>

</body>

</html>
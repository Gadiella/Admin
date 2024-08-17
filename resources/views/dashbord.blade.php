<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <table>
        <tbody>
            <tr>
                <td>
                    <h1>Tableau de bord</h1>
                </td>
                <td>
                    <a href="{{ route('logout') }}">
                        Se déconnecter
                    </a>

                    <a href="{{ route('users.create') }}">Créer un utilisateur</a>
                </td>
            </tr>
        </tbody>
    </table>
    <h3>Bienvenue {{Auth::user()->name}}</h3>
</body>

</html>
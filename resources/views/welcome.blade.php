<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Registro de Ponto</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Fonte e estilo básico -->
    <link href="https://fonts.googleapis.com/css?family=Inter:400,600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f0f4f8;
            color: #333;
            margin: 0;
            display: flex;
            height: 100vh;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }

        h1 {
            font-size: 3rem;
            margin-bottom: 1rem;
        }

        .btn-login {
            padding: 12px 24px;
            background-color: #3490dc;
            color: white;
            text-decoration: none;
            border-radius: 6px;
            font-size: 1.2rem;
            transition: background-color 0.3s ease;
        }

        .btn-login:hover {
            background-color: #2779bd;
        }
    </style>
</head>
<body>

    <h1>Registro de Ponto</h1>
    <a href="{{ route('login') }}" class="btn-login">Acessar Sistema</a>

</body>
</html>

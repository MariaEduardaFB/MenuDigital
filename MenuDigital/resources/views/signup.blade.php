<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>Cadastre-se</title>
</head>
<body>
@if($errors->any())
    <div>
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach

        </ul>
    </div>
@endif
    <form action="{{ route('register') }}" method="POST">
        @csrf

        <div>
            <label for="name">Nome: </label>
            <input type="text" name="name" id="name" value="{{ old('name') }}">
        </div>

        <div>
            <label for="email">E-mail:</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}" required>
        </div>

        <div>
            <label for="password">Senha:</label>
            <input type="password" name="password" id="password" required>
        </div>


        <div>
            <button type="submit">Cadastrar</button>
        </div>

    </form>
</body>
</html>

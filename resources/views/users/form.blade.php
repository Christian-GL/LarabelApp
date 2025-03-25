<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ isset($user) ? 'Editar Usuario' : 'Crear Usuario' }}</title>
</head>

<body>
    <h1>{{ isset($user) ? 'Editar Usuario' : 'Crear Usuario' }}</h1>
    <form action="{{ isset($user) ? route('users.update', $user->id) : route('users.store') }}" method="POST">
        @csrf
        @if(isset($user))
            @method('PUT')
        @endif

        <label for="name">Nombre:</label>
        <input type="text" name="name" id="name" required value="{{ isset($user) ? $user->name : '' }}">
        <br>

        <label for="email">Correo Electrónico:</label>
        <input type="email" name="email" id="email" required value="{{ isset($user) ? $user->email : '' }}">
        <br>

        <label for="password">Contraseña:</label>
        <input type="password" name="password" id="password" {{ isset($user) ? '' : 'required' }}>
        <br>

        <label for="password_confirmation">Confirmar Contraseña:</label>
        <input type="password" name="password_confirmation" id="password_confirmation" {{ isset($user) ? '' : 'required' }}>
        <br>

        <button type="submit">{{ isset($user) ? 'Actualizar Usuario' : 'Crear Usuario' }}</button>
    </form>
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</body>

</html>
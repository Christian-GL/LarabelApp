<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Actividades</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #F2F2F2;
        }

        .success-message {
            color: green;
            margin-bottom: 20px;
        }

        .error-message {
            color: red;
            margin-bottom: 20px;
        }

        .activity-count {
            margin-bottom: 20px;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <h1>Listado de Actividades</h1>

    <!-- Mensaje de éxito si existe en la sesión -->
    @if(session('success'))
        <div class="success-message">
            {{ session('success') }}
        </div>
    @endif

    <!-- Mensaje de error si existe en la sesión -->
    @if(session('error'))
        <div class="error-message">
            {{ session('error') }}
        </div>
    @endif

    @if(isset($activity)) <!-- Mostrar la actividad individual -->
        <h2>Actividad: {{ ucfirst($activity->type) }}</h2>
        <p>Usuario ID: {{ $activity->user_id }}</p>
        <p>Fecha y Hora: {{ \Carbon\Carbon::parse($activity->datetime)->format('d-m-Y H:i') }}</p>
        <p>Pagado: {{ $activity->paid ? 'Sí' : 'No' }}</p>
        <p>Satisfacción: {{ $activity->satisfaction ?? 'N/A' }}</p>
        <p>Notas: {{ $activity->notes }}</p>
        <br>
        <a href="{{ route('activities.index') }}">Volver al listado</a>
    @else <!-- Mostrar todas las actividades si no hay una actividad específica -->
        <!-- Tabla para mostrar las actividades -->
        <table>
            <thead>
                <tr>
                    <th>Tipo</th>
                    <th>Usuario ID</th>
                    <th>Fecha y Hora</th>
                    <th>Pagado</th>
                    <th>Satisfacción</th>
                    <th>Notas</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($activities as $activity)
                    <tr>
                        <td>{{ ucfirst($activity->type) }}</td>
                        <td>{{ $activity->user_id }}</td>
                        <td>{{ \Carbon\Carbon::parse($activity->datetime)->format('d-m-Y H:i') }}</td>
                        <td>{{ $activity->paid ? 'Sí' : 'No' }}</td>
                        <td>{{ $activity->satisfaction ?? 'N/A' }}</td>
                        <td>{{ $activity->notes }}</td>
                        <td>
                            <button onclick="location.href='{{ route('activities.show', $activity->id) }}'"
                                style="padding: 5px 10px; background-color: #007BFF; color: white; border: none; border-radius: 5px; cursor: pointer;">
                                Ver
                            </button>
                            <button onclick="location.href='{{ route('activities.edit', $activity->id) }}'"
                                style="padding: 5px 10px; background-color: #28A745; color: white; border: none; border-radius: 5px; cursor: pointer;">
                                Editar
                            </button>
                            <form action="{{ route('activities.destroy', $activity->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    style="padding: 5px 10px; background-color:rgb(238, 17, 17); color: white; border: none; border-radius: 5px; cursor: pointer;">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <!-- Mostrar la cantidad total de actividades -->
        <div class="activity-count">
            <p>Total de actividades: {{ $activities->count() }}</p>
        </div>
    @endif

    <!-- Enlace para crear una nueva actividad -->
    <br>
    <a href="{{ route('activities.create') }}">Crear nueva actividad</a>
</body>

</html>
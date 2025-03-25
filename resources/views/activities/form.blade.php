<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ isset($activity) ? 'Editar Actividad' : 'Crear Actividad' }}</title>
</head>

<body>
    <h1>{{ isset($activity) ? 'Editar Actividad' : 'Crear Actividad' }}</h1>
    <form action="{{ isset($activity) ? route('activities.update', $activity->id) : route('activities.store') }}" method="POST">
        @csrf
        @if(isset($activity))
            @method('PUT')
        @endif
        <label for="type">Tipo:</label>
        <select name="type" id="type" required>
            <option value="surf" {{ isset($activity) && $activity->type === 'surf' ? 'selected' : '' }}>Surf</option>
            <option value="windsurf" {{ isset($activity) && $activity->type === 'windsurf' ? 'selected' : '' }}>Windsurf</option>
            <option value="kayak" {{ isset($activity) && $activity->type === 'kayak' ? 'selected' : '' }}>Kayak</option>
            <option value="atv" {{ isset($activity) && $activity->type === 'atv' ? 'selected' : '' }}>ATV</option>
            <option value="hot air balloon" {{ isset($activity) && $activity->type === 'hot air balloon' ? 'selected' : '' }}>Globo Aerostático</option>
        </select>
        <br>
        <label for="user_id">ID del Usuario:</label>
        <input type="number" name="user_id" id="user_id" required value="{{ isset($activity) ? $activity->user_id : '' }}">
        <br>
        <label for="datetime">Fecha y Hora:</label>
        <input type="datetime-local" name="datetime" id="datetime" required value="{{ isset($activity) ? \Carbon\Carbon::parse($activity->datetime)->format('Y-m-d\TH:i') : '' }}">
        <br>
        <label for="paid">Pagado:</label>
        <input type="checkbox" name="paid" id="paid" {{ isset($activity) && $activity->paid ? 'checked' : '' }}>
        <br>
        <label for="notes">Notas:</label>
        <textarea name="notes" id="notes">{{ isset($activity) ? $activity->notes : '' }}</textarea>
        <br>
        <label for="satisfaction">Satisfacción (0-10):</label>
        <input type="number" name="satisfaction" id="satisfaction" min="0" max="10" step="1" value="{{ isset($activity) ? $activity->satisfaction : '' }}">
        <br>
        <button type="submit">{{ isset($activity) ? 'Actualizar Actividad' : 'Crear Actividad' }}</button>
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

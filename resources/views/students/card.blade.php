<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Личная карточка</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>

    @if($errors->any())
    <div class="alert-danger">
        <strong>Обнаружены ошибки:</strong>
        <ul style="margin-top: 0.5rem; padding-left: 1.25rem;">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    
    <div class="card">
        <h2>Редактирование карточки студента</h2>
        <form method="POST" action="/students/{{ $student['ID'] }}">
            @csrf
            @method('PUT')

            <label>ФИО:
                <input type="text" name="FIO" value="{{ $student['FIO'] }}" required>
            </label>

            <label>Номер студенческого билета:
                <input type="text" value="{{ $student['ID'] }}" disabled>
            </label>

            <label>Группа:
                <select name="GROUP_ID" required>
                    @foreach ($groups as $group)
                        <option value="{{ $group['ID'] }}" {{ $group['ID'] == $student['GROUP_ID'] ? 'selected' : '' }}>
                            {{ $group['GROUP_NAME'] }}
                        </option>
                    @endforeach
                </select>
            </label>

            <label>Курс:
                <input type="number" name="KURS" value="{{ $student['KURS'] }}" required>
            </label>

            <label>Дата рождения:
                <input type="date" name="BIRTH_DATE" value="{{ $student['BIRTH_DATE'] }}">
            </label>

            <label>Адрес:
                <input type="text" name="ADDRESS" value="{{ $student['ADDRESS'] }}">
            </label>

            <button type="submit">Сохранить</button>
        </form>
        <button onclick="window.location.href='/students'" class="change-btn">← Назад</button>
    </div>
</body>
</html>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Добавить студента</title>
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

    <h1>Добавить студента</h1>

    <form action="{{ url('/students') }}" method="POST">
        @csrf

        <label for="FIO">ФИО:</label>
        <input type="text" name="FIO" id="FIO" required>

        <label for="ID">Номер студенческого билета:</label>
        <input type="text" name="ID" id="ID" required>

        <label for="GROUP_ID">Группа:</label>
        <select name="GROUP_ID" id="GROUP_ID" required>
            <option value="">-- выберите группу --</option>
            @foreach ($groups as $group)
                <option value="{{ $group['ID'] }}">{{ $group['GROUP_NAME'] }}</option>
            @endforeach
        </select>


        <label for="KURS">Курс:</label>
        <select name="KURS" id="KURS">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
        </select>

        <label for="STATUS">Статус:</label>
        <input type="text" name="STATUS" id="STATUS">

        <label for="BIRTH_DATE">Дата рождения:</label>
        <input type="date" name="BIRTH_DATE" id="BIRTH_DATE">

        <label for="ADDRESS">Адрес:</label>
        <input type="text" name="ADDRESS" id="ADDRESS">

        <button type="submit">Сохранить</button>
    </form>

    <button onclick="window.location.href='/students'" class="change-btn">← Назад к списку</button>
</body>
</html>

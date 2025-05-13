<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Ведомости</title>
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

    <button onclick="window.location.href='/statements'" class="change-btn">Ведомости</button>
    <button onclick="window.location.href='/students'" class="change-btn">Студенты</button>

    <h1>Список ведомостей</h1>

    <table>
        <thead>
            <tr>
                <th>Дисциплина</th>
                <th>Преподаватель</th>
                <th>Номер ведомости</th>
                <th>Дата контроля</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($statements as $statement)
                <tr>
                    <td>{{ $disciplineMap[$statement['DISCIPLINE_ID']] ?? '—' }}</td>
                    <td>{{ $teacherMap[$statement['TEACHER_ID']] ?? '—' }}</td>
                    <td>
                        <a href="/statements/{{ $statement['ID'] }}">
                            {{ $statement['NUM_VEDOM'] }}
                        </a>
                    </td>
                    <td>{{ $statement['CONTROL_DATE'] }}</td>
                    <td class="actions">
                        <form method="POST" action="/statements/{{ $statement['ID'] }}" onsubmit="return confirm('Удалить ведомость?')">
                            @csrf
                            @method('DELETE')
                            <button class="delete-btn">Удалить</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h2>Добавить новую ведомость</h2>
    <form method="POST" action="/statements">
        @csrf

        <label>Дисциплина:
            <select name="DISCIPLINE_ID" required>
                @foreach ($disciplines as $discipline)
                    <option value="{{ $discipline['ID'] }}">{{ $discipline['DISC_NAME'] }}</option>
                @endforeach
            </select>
        </label>

        <label>Преподаватель:
            <select name="TEACHER_ID" required>
                @foreach ($teachers as $teacher)
                    <option value="{{ $teacher['ID'] }}">{{ $teacher['FIO'] }}</option>
                @endforeach
            </select>
        </label>

        <label>Номер ведомости:
            <input type="text" name="NUM_VEDOM" required>
        </label>

        <label>Дата контроля:
            <input type="date" name="CONTROL_DATE" required>
        </label>

        <button type="submit">Сохранить</button>
    </form>

</body>
</html>
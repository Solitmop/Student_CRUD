<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Оценки в ведомости</title>
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

    <h1>Оценки в ведомости №{{ $statement['NUM_VEDOM'] }}</h1>
    <p>Преподаватель: {{ $teacher }}</p>
    <p>Дисциплина: {{ $discipline }}</p>

    <table>
        <thead>
            <tr>
                <th>ФИО студента</th>
                <th>Оценка</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($marks as $mark)
                <tr>
                    <td>
                        <a href="/students/{{ $mark['STUD_ID'] }}">
                            {{ $students[$mark['STUD_ID']] ?? '—' }}
                        </a>
                    </td>
                    <td>
                        <form method="POST" action="/statements/marks/{{ $mark['ID'] }}" class="inline-form">
                            @csrf
                            @method('PUT')
                            <select name="MARK_ID">
                                @foreach ($markTypes as $markType)
                                    <option value="{{ $markType['ID'] }}" {{ $markType['ID'] == $mark['MARK_ID'] ? 'selected' : '' }}>{{ $markType['MARK_NAME'] }}</option>
                                @endforeach
                            </select>
                            <button>Изменить</button>
                        </form>
                    </td>
                    <td>
                        <form method="POST" action="/statements/marks/{{ $mark['ID'] }}" onsubmit="return confirm('Удалить оценку?')">
                            @csrf
                            @method('DELETE')
                            <button class="delete-btn">Удалить</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h2>Добавить новую оценку</h2>
    <form method="POST" action="/statements/marks">
        @csrf
        <input type="hidden" name="STATEMENT_ID" value="{{ $statement['ID'] }}">

        <label>Студент:
            <select name="STUD_ID" required>
                @foreach ($availableStudents as $student)
                    <option value="{{ $student['ID'] }}">{{ $student['FIO'] }}</option>
                @endforeach
            </select>
        </label>

        <label>Оценка:
            <select name="MARK_ID" required>
                @foreach ($markTypes as $markType)
                    <option value="{{ $markType['ID'] }}">{{ $markType['MARK_NAME'] }}</option>
                @endforeach
            </select>
        </label>

        <button type="submit">Сохранить</button>
    </form>

    <button class="change-btn" onclick="window.location.href='/statements'">← Назад к ведомостям</button>

</body>
</html>

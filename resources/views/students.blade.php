<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Список студентов</title>
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
    <button onclick="window.location.href='/students/create'" class = "change-btn" >Добавить студента</button>
    
    <h1>Список студентов</h1>

    <table>
        <thead>
            <tr>
                <th>ФИО</th>
                <th>Номер студенческого билета</th>
                <th>Группа</th>
                <th>Курс</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
                <tr>
                    <!-- Переход в карточку по нажатию на ФИО или ID -->
                    <td><a href="/students/{{ $student['ID'] }}">{{ $student['FIO'] }}</a></td>
                    <td><a href="/students/{{ $student['ID'] }}">{{ $student['ID'] }}</a></td>
                    <td>{{ $groupMap[$student['GROUP_ID']] ?? '—' }}</td>
                    <td>{{ $student['KURS'] }}</td>
                    <td>
                        <!-- Кнопка удаления студента через POST-форму -->
                        <form action="/students/{{ $student['ID'] }}" method="POST" class="inline" onsubmit="return confirm('Удалить студента?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete-btn">Удалить</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>

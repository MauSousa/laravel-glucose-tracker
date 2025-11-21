<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Your Page Title</title>

    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            padding: 10px;
        }
        th {
            background-color: #454242;
            color: white;
        }
        td {
            text-align: center;
            border-bottom: 1px solid #ddd;
            border-left: 1px solid #ddd;
            border-right: 1px solid #ddd;
        }
        h1 {
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            font-weight: 200;
            text-align: center;
            margin-top: -5px;
        }
    </style>
</head>
<body>
    <h1>Reporte de tomas de glucosa</h1>
    <table>
    <thead>
        <tr>
            <th colspan="2">Dia</th>
            <th colspan="2">Hora</th>
            <th colspan="2">Condicion</th>
            <th colspan="2">Glucosa</th>
            <th colspan="3">Alimentos</th>
        </tr>
    </thead>
    <tbody>
        @forelse($data as $datta)
            <tr>
                <td colspan="2">{{ $datta->day->format('d-m-Y') }}</td>
                <td colspan="2">{{ $datta->time_of_test }}</td>
                <td colspan="2">{{ $datta->condition }}</td>
                <td colspan="2">{{ $datta->glucose }}</td>
                <td colspan="3">{{ $datta->food }}</td>
            </tr>
        @empty
                <td colspan="2"></td>
                <td colspan="2"></td>
                <td colspan="2"></td>
                <td colspan="2"></td>
                <td colspan="3"></td>
        @endforelse
    </tbody>
    </table>
</body>
</html>

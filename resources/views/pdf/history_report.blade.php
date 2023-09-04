<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Report</title>
</head>

<body>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 0.7em;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border-bottom: 2px solid #000000db;
            padding: 8px;
            text-align: center;
        }

        th {
            font-size: 1.2em;
            background-color: #f2f2f2;
        }
    </style>
    @if ($filteredData->count() > 0)
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">N.º</th>
                    @if ($checkValues['student_check'])
                        <th scope="col">NOME DO ESTUDANTE</th>
                    @endif

                    @if ($checkValues['title_check'])
                        <th scope="col">NOME DO LIVRO</th>
                    @endif

                    @if ($checkValues['school_year_check'])
                        <th scope="col">ANO ESCOLAR</th>
                    @endif

                    @if ($checkValues['registration_check'])
                        <th scope="col">MATRÍCULA</th>
                    @endif

                    @if ($checkValues['created_at_check'])
                        <th scope="col">CRIADO EM</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                {{ $count = 1 }}
                @foreach ($filteredData as $history)
                    <tr>
                        <td class="mb-2">{{ $count }} </td>
                        @if ($checkValues['student_check'])
                            <td class="mb-2">{{ $history->student->name }}</td>
                        @endif

                        @if ($checkValues['title_check'])
                            <td class="mb-2">{{ $history->book->title }}</td>
                        @endif

                        @if ($checkValues['school_year_check'])
                            <td class="mb-2">{{ $history->student->school_year }}</td>
                        @endif

                        @if ($checkValues['registration_check'])
                            <td class="mb-2">{{ $history->student->registration}}</td>
                        @endif

                        @if ($checkValues['created_at_check'])
                            <td class="mb-2">{{ $history->created_at->format('d/m/Y H:i:s') }}</td>
                        @endif
                    </tr>
                    {{ $count += 1 }}
                @endforeach
            </tbody>
        </table>
    @else
        <p>Nenhum resultado encontrado.</p>
    @endif
</body>

</html>
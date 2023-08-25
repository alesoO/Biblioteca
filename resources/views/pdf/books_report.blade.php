<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
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
                    @if ($checkValues['title_check'])
                        <th scope="col">TITULO DO LIVRO</th>
                    @endif

                    @if ($checkValues['author_check'])
                        <th scope="col">AUTOR</th>
                    @endif

                    @if ($checkValues['publisher_check'])
                        <th scope="col">EDITORA</th>
                    @endif

                    @if ($checkValues['page_check'])
                        <th scope="col">NUMERO DE PAGINAS</th>
                    @endif

                    @if ($checkValues['created_at_check'])
                        <th scope="col">CRIADO EM</th>
                    @endif

                    @if ($checkValues['updated_at_check'])
                        <th scope="col">EDITADO EM</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                {{ $count = 1 }}
                @foreach ($filteredData as $book)
                    <tr>
                        <td class="mb-2">{{ $count }} </td>
                        @if ($checkValues['title_check'])
                            <td class="mb-2">{{ $book->title }}</td>
                        @endif

                        @if ($checkValues['author_check'])
                            <td class="mb-2">{{ $book->author->name }}</td>
                        @endif

                        @if ($checkValues['publisher_check'])
                            <td class="mb-2">{{ $book->publisher->name }}</td>
                        @endif

                        @if ($checkValues['page_check'])
                            <td class="mb-2">{{ $book->page }}</td>
                        @endif

                        @if ($checkValues['created_at_check'])
                            <td class="mb-2">{{ $book->created_at->format('d/m/Y H:i:s') }}</td>
                        @endif

                        @if ($checkValues['updated_at_check'])
                            <td class="mb-2">{{ $book->updated_at->format('d/m/Y H:i:s') }}</td>
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

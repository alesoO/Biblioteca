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
            font-size: 0.8em;
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
    <table class="table">
        <thead>
            <tr>
                <th scope="col">TITULO DO LIVRO</th>
                <th scope="col">AUTOR</th>
                <th scope="col">EDITORA</th>
                <th scope="col">NUMERO DE PAGINAS</th>
                <th scope="col">CRIADO EM</th>
                <th scope="col">EDITADO EM</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $book)
                <tr>
                    <td class="mb-2">{{ $book->title }}</td>
                    <td class="mb-2">{{ $book->author->name }}</td>
                    <td class="mb-2">{{ $book->publisher->name }}</td>
                    <td class="mb-2">{{ $book->page }}</td>
                    <td class="mb-2">{{ $book->created_at->format('d/m/Y H:i:s') }}</td>
                    <td class="mb-2">{{ $book->updated_at->format('d/m/Y H:i:s') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>


</body>

</html>

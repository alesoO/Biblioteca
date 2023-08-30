@extends('adminlte::page')

@section('title', 'Biblioteca - Livros')

@section('content')
    @auth
        <div class="mask d-flex align-items-center h-100">
            <div class="container">
                <div class="d-flex justify-content-between my-4">
                    <h2 class="">Livros</h2>
                    <button type="button" class="btn btn-secondary btn-sm px-3" data-bs-toggle="modal"
                        data-bs-target="#formNewBook">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-plus-square" viewBox="0 0 16 16">
                            <path
                                d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                            <path
                                d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                        </svg> Add Livro
                    </button>
                    <div class="modal fade" id="formNewBook" role="dialog" data-bs-backdrop="static" data-bs-keyboard="false"
                        tabindex="-1" aria-labelledby="formNewBookLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="card bg-dark text-white m-0">
                                    <button type="button" class="btn btn-dark ms-auto m-3 p-2" data-bs-dismiss="modal"
                                        aria-label="Close"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                                            <path
                                                d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z" />
                                        </svg></button>
                                    <div class="card-body p-4">
                                        <form action="/register_book" method="POST">
                                            @csrf
                                            <div class="mb-md-5 mt-md-4 pb-5">
                                                <h2 class="modal-title">Novo Livro</h2>
                                                <p class="text-white-50 mb-5">Por favor insira os dados do Livro!
                                                </p> <br>

                                                <div class="form-outline form-white mb-4">
                                                    <label class="form-label d-block text-start">Titulo:</label>
                                                    <input type="text" id="title" name="title"
                                                        class="form-control form-control-lg">
                                                </div>

                                                <div class="form-outline form-white mb-4">
                                                    <label class="form-label d-block text-start">Autor:</label>
                                                    <select class="form-select form-control form-control-lg" name="author_id"
                                                        id="author_id">
                                                        <option disabled selected hidden>Escolha...</option>
                                                        @foreach ($authors as $author)
                                                            <option value="{{ $author->id }}">{{ $author->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="form-outline form-white mb-4">
                                                    <label class="form-label d-block text-start">Editora:</label>
                                                    <select class="form-select form-control form-control-lg" name="publisher_id"
                                                        id="publisher_id">
                                                        <option disabled selected hidden>Escolha...</option>
                                                        @foreach ($publishers as $publisher)
                                                            <option value="{{ $publisher->id }}">{{ $publisher->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="form-outline form-white mb-4">
                                                    <label class="form-label d-block text-start">Numero de Paginas:</label>
                                                    <input type="number" id="page" name="page"
                                                        class="form-control form-control-lg" data-mask="0000">
                                                </div>

                                                <div class="modal-footer">
                                                    <button class="btn btn-primary" type="submit">Cadastrar</button>
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Cancelar</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="card shadow-2-strong" style="background-color: #f5f7fa;">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-borderless mb-0">
                                        <thead>
                                            <tr>
                                                <th scope="col">TITULO DO LIVRO</th>
                                                <th scope="col">AUTOR</th>
                                                <th scope="col">EDITORA</th>
                                                <th scope="col">NUMERO DE PAGINAS</th>
                                                <th scope="col">CRIADO EM</th>
                                                <th scope="col">EDITADO EM</th>
                                                <th scope="col">EDITAR</th>
                                                <th scope="col">EXCLUIR</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($books as $book)
                                                <tr>
                                                    <td>{{ $book->title }}</td>
                                                    <td>{{ $book->author->name }}</td>
                                                    <td>{{ $book->publisher->name }}</td>
                                                    <td>{{ $book->page }}</td>
                                                    <td>{{ $book->created_at->format('d/m/Y H:i:s') }}</td>
                                                    <td>{{ $book->updated_at->format('d/m/Y H:i:s') }}</td>
                                                    <td>
                                                        <button type="button" class="btn btn-warning btn-sm px-3"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#formEditBook{{ $book->id }}">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="14"
                                                                height="14" fill="currentColor" class="bi bi-pencil-square"
                                                                viewBox="0 0 16 16">
                                                                <path
                                                                    d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                                <path fill-rule="evenodd"
                                                                    d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                            </svg>
                                                        </button>
                                                        <div class="modal fade" id="formEditBook{{ $book->id }}"
                                                            tabindex="-1" aria-labelledby="formEditBookLabel"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                                <div class="modal-content">
                                                                    <div class="card bg-dark text-white m-0">
                                                                        <button type="button"
                                                                            class="btn btn-dark ms-auto m-3 p-2"
                                                                            data-bs-dismiss="modal" aria-label="Close"><svg
                                                                                xmlns="http://www.w3.org/2000/svg"
                                                                                width="16" height="16"
                                                                                fill="currentColor" class="bi bi-x-lg"
                                                                                viewBox="0 0 16 16">
                                                                                <path
                                                                                    d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z" />
                                                                            </svg></button>
                                                                        <div class="card-body">
                                                                            <form
                                                                                action="{{ route('book.update', ['book' => $book]) }}"
                                                                                method="POST">
                                                                                @csrf
                                                                                <div class="mb-md-5 mt-md-4 pb-5">
                                                                                    <h2 class="modal-title">Novo Livro</h2>
                                                                                    <p class="text-white-50 mb-5">Por favor
                                                                                        insira os dados do Livro!
                                                                                    </p> <br>

                                                                                    <div class="form-outline form-white mb-4">
                                                                                        <label
                                                                                            class="form-label d-block text-start">Titulo:</label>
                                                                                        <input type="text" id="title"
                                                                                            name="title"
                                                                                            class="form-control form-control-lg"
                                                                                            value="{{ $book->title }}">
                                                                                    </div>

                                                                                    <div class="form-outline form-white mb-4">
                                                                                        <label
                                                                                            class="form-label d-block text-start">Autor:</label>
                                                                                        <select
                                                                                            class="form-select form-control form-control-lg"
                                                                                            name="author_id" id="author_id">
                                                                                            <option selected hidden
                                                                                                value=" {{ $book->author_id }}">
                                                                                                {{ $book->author->name }}
                                                                                            </option>
                                                                                            @foreach ($authors as $author)
                                                                                                <option
                                                                                                    value="{{ $author->id }}">
                                                                                                    {{ $author->name }}
                                                                                                </option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                    </div>

                                                                                    <div class="form-outline form-white mb-4">
                                                                                        <label
                                                                                            class="form-label d-block text-start">Editora:</label>
                                                                                        <select
                                                                                            class="form-select form-control form-control-lg"
                                                                                            name="publisher_id"
                                                                                            id="publisher_id">
                                                                                            <option selected hidden
                                                                                                value=" {{ $book->publisher_id }}">
                                                                                                {{ $book->publisher->name }}
                                                                                            </option>
                                                                                            @foreach ($publishers as $publisher)
                                                                                                <option
                                                                                                    value="{{ $publisher->id }}">
                                                                                                    {{ $publisher->name }}
                                                                                                </option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                    </div>

                                                                                    <div class="form-outline form-white mb-4">
                                                                                        <label
                                                                                            class="form-label d-block text-start">Numero
                                                                                            de Paginas:</label>
                                                                                        <input type="number" id="page"
                                                                                            name="page"
                                                                                            class="form-control form-control-lg"
                                                                                            value="{{ $book->page }}"
                                                                                            data-mask="0000">
                                                                                    </div>

                                                                                    <div class="modal-footer">
                                                                                        <button class="btn btn-primary"
                                                                                            type="submit">Cadastrar</button>
                                                                                        <button type="button"
                                                                                            class="btn btn-secondary"
                                                                                            data-bs-dismiss="modal">Cancelar</button>
                                                                                    </div>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <button type="button" class="btn btn-danger btn-sm px-3"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#warning{{ $book->id }}">
                                                            <i class="fas fa-times"></i>
                                                        </button>
                                                        <div class="modal fade" id="warning{{ $book->id }}"
                                                            tabindex="-1" aria-labelledby="warningLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header bg-danger text-white titulos">
                                                                        <h1 class="modal-title fs-5 fw-bold"
                                                                            id="warningLabel">Aviso!
                                                                            -
                                                                            Essa ação não pode ser desfeita!
                                                                        </h1>
                                                                        <button type="button" class="btn-close"
                                                                            data-bs-dismiss="modal"
                                                                            aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        Tem certza que deseja apagar o Livro ?
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-bs-dismiss="modal">Fechar</button>

                                                                        <form
                                                                            action="{{ route('book.destroy', ['book' => $book]) }}"
                                                                            method="POST">
                                                                            @csrf
                                                                            @method('DELETE')
                                                                            <button type="submit"
                                                                                class="btn btn-danger">Sim</button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div class="d-flex justify-content-between align-items-end">
                                        <div class="paginate" style="min-width: 270px">
                                            {{ $books->links() }}
                                        </div>
                                        <a class="btn btn-secondary py-2" href="/book_Report">Gerar Relatorios</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="px-4 py-5 text-center">
            <div class="margin" style="margin-top: 8em;">
                <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor"
                    class="bi bi-book" viewBox="0 0 16 16">
                    <path
                        d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811V2.828zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z" />
                </svg><br><br>
                <h1 class="display-5 fw-bold text-body-emphasis">Desculpe, mas você não tem acesso a esta página !</h1><br>

                <div class="col-lg-6 mx-auto text-justify-center">
                    <p class="lead mb-4">Para que você tenha acesso a essas e outras informações do nosso site, faça seu login
                        na nossa plataforma para que consiga vizualizar esta grande biblioteca!</p>
                </div>
            </div>
        </div>
    @endauth
@stop

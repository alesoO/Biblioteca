@extends('adminlte::page')

@section('title', 'Biblioteca - Relatorio de Livros')

@section('content')

    <div class="mask d-flex align-items-center h-100">
        <div class="container">
            <div class="d-flex justify-content-between my-4">
                <h2 class="">Gerar Relatorios</h2>
            </div>
            <div class="row justify-content-center">
                <form id="formReportBook" action="/generate_Book_PDF" method="POST">
                    <div class="col-12 mb-5 mt-2">
                        <div class="mt-5 accordion accordion-flush card shadow-2-strong shadow bg-body-tertiary rounded"
                            id="formReport">
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#reportBooks" aria-expanded="true" aria-controls="reportBooks">
                                        Pesquisa por Livros
                                    </button>
                                </h2>
                                <div id="reportBooks" class="accordion-collapse collapse" data-bs-parent="#formReport">
                                    <div class="accordion-body">
                                        <div class="container mt-4">
                                            <div class="">
                                                <h4 class="mb-3">Pesquisa Relatorio</h4>
                                                @csrf
                                                <div class="row g-3">
                                                    <div class="col-12">
                                                        <label for="title" class="form-label">Livro</label>
                                                        <select class="form-select form-control select-search"
                                                            name="title" id="title_select">
                                                            <option value="all" selected>Todos...</option>
                                                            @foreach ($books_select as $book)
                                                                <option value="{{ $book->title }}">
                                                                    {{ $book->title }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="col-sm-6">
                                                        <label for="author_id" class="form-label">Autor</label>
                                                        <select class="form-select form-control select-search"
                                                            name="author_id" id="author_id_select">
                                                            <option value="all" selected>Todos...</option>
                                                            @foreach ($authors as $author)
                                                                <option value="{{ $author->id }}">
                                                                    {{ $author->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="col-sm-6">
                                                        <label for="publisher_id" class="form-label">Editora</label>
                                                        <select class="form-select form-control select-search"
                                                            name="publisher_id" id="publisher_id_select">
                                                            <option value="all" selected>Todos...</option>
                                                            @foreach ($publishers as $publisher)
                                                                <option value="{{ $publisher->id }}">
                                                                    {{ $publisher->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="col-4">
                                                        <label for="page" class="form-label">Paginas(Até:)</label>
                                                        <input type="number" class="form-control" value="" name="page"
                                                            id="page" placeholder="Ate: nº paginas" data-mask="0000">
                                                    </div>

                                                    <div class="col-4">
                                                        <label for="created_at_min" class="form-label">Data de
                                                            Cadastro
                                                            (De:)</label>
                                                        <input type="date" name="created_at_min" class="form-control"
                                                            id="created_at_min">
                                                    </div>

                                                    <div class="col-4">
                                                        <label for="created_at_max" class="form-label">Data de
                                                            Cadastro
                                                            (Até:)</label>
                                                        <input type="date" class="form-control" name="created_at_max"
                                                            id="created_at_max">
                                                    </div>
                                                    <div class="col-6">
                                                        <label for="updated_at_min" class="form-label">Data de
                                                            Atualização
                                                            (De:)</label>
                                                        <input type="date" class="form-control" name="updated_at_min"
                                                            id="updated_at_min">
                                                    </div>

                                                    <div class="col-6">
                                                        <label for="updated_at_max" class="form-label">Data de
                                                            Atualização
                                                            (Até:)</label>
                                                        <input type="date" class="form-control" name="updated_at_max"
                                                            id="updated_at_max">
                                                    </div>

                                                    <hr class="mt-5 p-0">

                                                    <h4 class="mb-3">Dados do Relatorio</h4>

                                                    <div class="my-3 justify-content-between align-items-center">
                                                        <div class="d-flex justify-content-center">
                                                            <div class="form-check form-switch form-check-inline">
                                                                <input class="form-check-input mt-1" type="checkbox"
                                                                    role="switch" id="title_check" name="title_check">
                                                                <label class="form-check-label" for="title_check">Titulo dos
                                                                    Livros</label>
                                                            </div>
                                                            <div class="form-check form-switch form-check-inline">
                                                                <input class="form-check-input mt-1" type="checkbox"
                                                                    role="switch" id="author_check" name="author_check">
                                                                <label class="form-check-label"
                                                                    for="author_check">Autores</label>
                                                            </div>
                                                            <div class="form-check form-switch form-check-inline">
                                                                <input class="form-check-input mt-1" type="checkbox"
                                                                    role="switch" id="publisher_check"
                                                                    name="publisher_check">
                                                                <label class="form-check-label"
                                                                    for="publisher_check">Editoras</label>
                                                            </div>
                                                            <div class="form-check form-switch form-check-inline">
                                                                <input class="form-check-input mt-1" type="checkbox"
                                                                    role="switch" id="page_check" name="page_check">
                                                                <label class="form-check-label" for="page_check">Numero de
                                                                    Paginas</label>
                                                            </div>
                                                            <div class="form-check form-switch form-check-inline">
                                                                <input class="form-check-input mt-1" type="checkbox"
                                                                    role="switch" id="created_at_check"
                                                                    name="created_at_check">
                                                                <label class="form-check-label"
                                                                    for="created_at_check">Data de Cadastro
                                                                    do
                                                                    Livro</label>
                                                            </div>
                                                            <div class="form-check form-switch form-check-inline">
                                                                <input class="form-check-input mt-1" type="checkbox"
                                                                    role="switch" id="updated_at_check"
                                                                    name="updated_at_check">
                                                                <label class="form-check-label"
                                                                    for="updated_at_check">Data de edição
                                                                    Cadastro do Livro</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button id="formReportBookButton"
                                                        class="w-75 mx-auto btn btn-primary btn-lg mb-2"
                                                        type="button">Resumo do Relatorio
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card shadow-2-strong" style="background-color: #f5f7fa;">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <div
                                        class="d-flex justify-content-center my-4 border-bottom border-secondary border-opacity-25 w-75 mx-auto">

                                        <h2 class="">Dados dos Relatorio</h2>

                                    </div>
                                    <table id="reportTable" class="table table-borderless mb-0">
                                        <thead>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="d-flex mt-4 mb-4 justify-content-between border-top border-secondary border-opacity-25">
                                    <div id="paginationContainer" class="paginate" style="min-width: 270px">
                                    </div>
                                    <div id="genPDF" class="d-flex align-items-end">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop

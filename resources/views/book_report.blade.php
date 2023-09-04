@extends('adminlte::page')

@section('title', 'Biblioteca - Relatorio de Livros')

@section('content')
    @auth
        <div class="mask d-flex align-items-center h-100">
            <div class="container">
                <div class="d-flex justify-content-between mt-4">
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
                                                                    <option value="{{ $book }}">
                                                                        {{ $book }}</option>
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
                                                                <option value="all" selected>Todas...</option>
                                                                @foreach ($publishers as $publisher)
                                                                    <option value="{{ $publisher->id }}">
                                                                        {{ $publisher->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                        <div class="col-4">
                                                            <label for="pages" class="form-label">Paginas(Até:)</label>
                                                            <input type="number" class="form-control" value=""
                                                                name="pages" id="pages" placeholder="Ate: nº paginas"
                                                                data-mask="0000">
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
                                                        <div class="col-3">
                                                            <button class="btn btn-outline-secondary px-4" id="button_clean"
                                                                type="button"><i class="fas fa-eraser"></i> Limpar</button>
                                                        </div>

                                                        <hr class="mt-5 p-0">

                                                        <h4 class="mb-3">Dados do Relatorio</h4>

                                                        <div class="my-3 justify-content-between align-items-center">
                                                            <div class="d-flex justify-content-center">
                                                                <div class="form-check form-switch form-check-inline">
                                                                    <input class="form-check-input mt-1" type="checkbox"
                                                                        role="switch" id="title_check" name="title_check">
                                                                    <label class="form-check-label" for="title_check">Titulo
                                                                        dos
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
                            <div class="card shadow-2-strong">
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
                                    <div
                                        class="d-flex mt-4 mb-4 justify-content-between border-top border-secondary border-opacity-25">
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

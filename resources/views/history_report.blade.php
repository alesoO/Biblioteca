@extends('adminlte::page')

@section('title', 'Biblioteca - Relatorio de Emprestimos')

@section('content')

<div class="mask d-flex align-items-center h-100">
    <div class="container">
        <div class="d-flex justify-content-between mt-4">
            <h2 class=""><b>Gerar Relatorios</b></h2>
        </div>
        <div class="row justify-content-center">
            <form id="formReportHistory" action="/generate_History_PDF" method="POST">
                <div class="col-12 mb-5 mt-2">
                    <div class="mt-5 accordion accordion-flush card shadow-2-strong shadow bg-body-tertiary rounded" id="formReportHistory">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#reportHistorys" aria-expanded="true" aria-controls="reportBooks">
                                    Pesquisa pelo histórico
                                </button>
                            </h2>
                            <div id="reportHistorys" class="accordion-collapse collapse" data-bs-parent="#formReportHistory">
                                <div class="accordion-body">
                                    <div class="container mt-4">
                                        <div class="">
                                            <h4 class="mb-3">Pesquisa Relatorio</h4>
                                            @csrf
                                            <div class="row g-3">
                                                <div class="col-sm-6">
                                                    <label for="student_id" class="form-label">Aluno</label>
                                                    <select class="form-select form-control select-search" name="student_id" id="student_id_select">
                                                        <option value="all" selected>Todos...</option>
                                                        @foreach ($students as $student)
                                                        <option value="{{ $student->id }}">{{ $student->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="col-sm-6">
                                                    <label for="title" class="form-label">Livro</label>
                                                    <select class="form-select form-control select-search" name="title" id="title_select">
                                                        <option value="all" selected>Todos...</option>
                                                            @foreach ($books as $book)
                                                                <option value="{{ $book }}">
                                                                    {{ $book }}</option>
                                                            @endforeach
                                                    </select>
                                                </div>


                                                <div class="col-sm-6">
                                                    <label for="school_year_id" class="form-label">Turma</label>
                                                    <select class="form-select form-control select-search" name="school_year_id" id="school_year_id_select">
                                                        <option value="all" selected>Todas...</option>
                                                        @foreach ($students as $student)
                                                        <option value="{{ $student->school_year  }}">{{ $student->school_year}}° ano</option> 
                                                        @endforeach
                                                        </option>
                                                    </select>
                                                </div>

                                                <div class="col-sm-6 mb-4">
                                                    <label for="registration_id" class="form-label">Matrícula</label>
                                                    <select class="form-select form-control select-search" name="registration_id" id="registration_id_select">
                                                        <option value="all" selected>Todas...</option>
                                                        @foreach ($students as $student)
                                                        <option value="{{ $student->registration }}">{{ $student->registration}}</option> 
                                                        @endforeach
                                                        </option>
                                                    </select>
                                                </div>

                                                <div class="col-sm-6">
                                                    <label for="created_at_min" class="form-label">Data de Cadastro (De:)</label>
                                                    <input type="date" name="created_at_min" class="form-control" id="created_at_min">
                                                </div>

                                                <div class="col-sm-6">
                                                    <label for="created_at_max" class="form-label">Data de Cadastro (Até:)</label>
                                                    <input type="date" class="form-control" name="created_at_max" id="created_at_max">
                                                </div>


                                                <div class="col-12">
                                                    <button class="btn btn-outline-secondary px-4" id="button_clean" type="button"><i class="fas fa-eraser"></i> Limpar</button>
                                                </div>

                                                <hr class="mt-5 p-0">

                                                <h4 class="mb-3">Dados do Relatorio</h4>

                                                <div class="my-3 justify-content-between align-items-center">
                                                    <div class="d-flex justify-content-center">
                                                        <div class="form-check form-switch form-check-inline">
                                                            <input class="form-check-input mt-1" type="checkbox" role="switch" id="student_check" name="student_check">
                                                            <label class="form-check-label" for="student_check">Nome do estudante</label>
                                                        </div>
                                                        <div class="form-check form-switch form-check-inline">
                                                            <input class="form-check-input mt-1" type="checkbox" role="switch" id="title_check" name="title_check">
                                                            <label class="form-check-label" for="title_check">Titulo dos Livros</label>
                                                        </div>
                                                        <div class="form-check form-switch form-check-inline">
                                                            <input class="form-check-input mt-1" type="checkbox" role="switch" id="school_year_check" name="school_year_check">
                                                            <label class="form-check-label" for="school_year_check">Turmas</label>
                                                        </div>
                                                        <div class="form-check form-switch form-check-inline">
                                                            <input class="form-check-input mt-1" type="checkbox" role="switch" id="registration_check" name="registration_check">
                                                            <label class="form-check-label" for="registration_check">Matrículas</label>
                                                        </div>
                                                        <div class="form-check form-switch form-check-inline">
                                                            <input class="form-check-input mt-1" type="checkbox" role="switch" id="created_at_check" name="created_at_check">
                                                            <label class="form-check-label" for="created_at_check">Data de cadastro</label>
                                                        </div>

                                                    </div>
                                                </div>
                                                <button id="formReportHistoryButton" class="w-75 mx-auto btn btn-primary btn-lg mb-2" type="button">Resumo do Relatorio</button>
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
                                <div class="d-flex justify-content-center my-4 border-bottom border-secondary border-opacity-25 w-75 mx-auto">
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
@extends('adminlte::page')

@section('title', 'Biblioteca - Estudantes')

@section('content')
    <div class="mask d-flex align-items-center h-100">
        <div class="container">
            <div class="d-flex justify-content-between my-4">
                <h2 class="">Estudantes</h2>
                <button type="button" class="btn btn-secondary btn-sm px-3" data-bs-toggle="modal"
                    data-bs-target="#formNewStudent">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-plus-square" viewBox="0 0 16 16">
                        <path
                            d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                        <path
                            d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                    </svg> Add Estudante
                </button>

                <div class="modal fade" id="formNewStudent" data-bs-backdrop="static" data-bs-keyboard="false"
                    tabindex="-1" aria-labelledby="formNewStudentLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="card bg-dark text-white m-0">
                                <button type="button" class="btn btn-dark ms-auto m-3 p-2" data-bs-dismiss="modal"
                                    aria-label="Close"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                                        <path
                                            d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z" />
                                    </svg></button>
                                <div class="card-body p-5 text-center">
                                    <form action="/register_student" method="POST">
                                        @csrf
                                        <div class="mb-md-5 mt-md-4 pb-5">
                                            <h2 class="fw-bold mb-2 text-uppercase">Novo Estudante</h2>
                                            <p class="text-white-50 mb-5">Por favor insira os dados do Estudante!
                                            </p>

                                            <div class="form-outline form-white mb-4">
                                                <label class="form-label d-block text-start">Nome:</label>
                                                <input type="text" id="name" name="name"
                                                    class="form-control form-control-lg">
                                            </div>

                                            <div class="form-outline form-white mb-4">
                                                <label class="form-label d-block text-start">Ano Escolar:</label>
                                                <select class="form-select form-control form-control-lg" name="school_year"
                                                    id="school_year">
                                                    <option disabled selected hidden>Escolha...</option>
                                                    <option value="1">1º</option>
                                                    <option value="2">2º</option>
                                                    <option value="3">3º</option>
                                                    <option value="4">4º</option>
                                                    <option value="5">5º</option>
                                                </select>
                                            </div>

                                            <div class="form-outline form-white mb-4">
                                                <label class="form-label d-block text-start">Matricula:</label>
                                                <input type="number" id="registration" name="registration"
                                                    class="form-control form-control-lg">
                                            </div>

                                            <button class="d-block btn btn-outline-light btn-lg mx-auto mt-4 px-5"
                                                type="submit">Cadastrar</button>
                                            <button type="button"
                                                class="d-block btn btn-outline-light btn-lg mx-auto mt-2 px-5"
                                                data-bs-dismiss="modal">Cancelar</button>

                                            <div class="d-flex justify-content-center text-center mt-4 pt-1">
                                                <a href="" class="text-white"><i
                                                        class="fab fa-facebook-f fa-lg"></i></a>
                                                <a href="" class="text-white"><i
                                                        class="fab fa-twitter fa-lg mx-4 px-2"></i></a>
                                                <a href="" class="text-white"><i class="fab fa-google fa-lg"></i></a>
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
                                            <th scope="col">NOME DO ALUNO</th>
                                            <th scope="col">ANO ESCOLAR</th>
                                            <th scope="col">MATRICULA</th>
                                            <th scope="col">CRIADO EM</th>
                                            <th scope="col">EDITADO EM</th>
                                            <th scope="col">EDITAR</th>
                                            <th scope="col">EXCLUIR</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($students as $student)
                                            <tr>
                                                <td>{{ $student->name }}</td>
                                                <td>{{ $student->school_year }}</td>
                                                <td>{{ $student->registration }}</td>
                                                <td>{{ $student->created_at->format('d/m/Y H:i:s') }}</td>
                                                <td>{{ $student->updated_at->format('d/m/Y H:i:s') }}</td>
                                                <td>
                                                    <button type="button" class="btn btn-warning btn-sm px-3"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#formEditStudent{{ $student->id }}">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="14"
                                                            height="14" fill="currentColor"
                                                            class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                            <path
                                                                d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                            <path fill-rule="evenodd"
                                                                d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                        </svg>
                                                    </button>
                                                    <div class="modal fade" id="formEditStudent{{ $student->id }}"
                                                        tabindex="-1" aria-labelledby="formEditStudentLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="card bg-dark text-white m-0">
                                                                    <button type="button"
                                                                        class="btn btn-dark ms-auto m-3 p-2"
                                                                        data-bs-dismiss="modal" aria-label="Close"><svg
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            width="16" height="16"
                                                                            fill="currentColor" class="bi bi-x-lg"
                                                                            viewBox="0 0 16 16">
                                                                            <path ￼
                                                                                d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z" />
                                                                        </svg></button>
                                                                    <div class="card-body p-5 text-center">
                                                                        <form
                                                                            action=""
                                                                            method="POST">
                                                                            @csrf
                                                                            <div class="mb-md-5 mt-md-4 pb-5">
                                                                                <h2 class="fw-bold mb-2 text-uppercase">
                                                                                    Editar Autor</h2>
                                                                                <p class="text-white-50 mb-5">Por favor
                                                                                    insira os dados do Autor!
                                                                                </p>

                                                                                <div class="form-outline form-white mb-4">
                                                                                    <label
                                                                                        class="form-label d-block text-start">Nome:</label>
                                                                                    <input type="text" id="name"
                                                                                        name="name"
                                                                                        value="{{ $student->name }}"
                                                                                        class="form-control form-control-lg">

                                                                                </div>

                                                                                <button
                                                                                    class="d-block btn btn-outline-light btn-lg mx-auto mt-4 px-5"
                                                                                    type="submit">Editar</button>
                                                                                <button type="button"
                                                                                    class="d-block btn btn-outline-light btn-lg mx-auto mt-2 px-5"
                                                                                    data-bs-dismiss="modal">Cancelar</button>

                                                                                <div
                                                                                    class="d-flex justify-content-center text-center mt-4 pt-1">
                                                                                    <a href=""
                                                                                        class="text-white"><i
                                                                                            class="fab fa-facebook-f fa-lg"></i></a>
                                                                                    <a href=""
                                                                                        class="text-white"><i
                                                                                            class="fab fa-twitter fa-lg mx-4 px-2"></i></a>
                                                                                    <a href=""
                                                                                        class="text-white"><i
                                                                                            class="fab fa-google fa-lg"></i></a>
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div> 
                                                        </div>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-danger btn-sm px-3">
                                                        <i class="fas fa-times"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="paginate">
                                    {{ $students->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
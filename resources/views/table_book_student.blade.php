@extends('adminlte::page')

@section('title', 'Biblioteca - Livros')

@section('content')
@auth

<div class="mask d-flex align-items-center h-100">
    <div class="container">
        <div class="d-flex justify-content-between my-4">
            <h2 class="mt-4">Empréstimos</h2>

            <!-- Empréstimo de Livros -->
            <div class="d-flex justify-content-end mb-2">
                <button type="button" class="btn btn-primary btn-sm px-3 mt-4" data-bs-toggle="modal" data-bs-target="#formNewLoanLabel">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
                        <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                    </svg> Add Empréstimo
                </button>

            </div>

            <div class="modal fade" id="formNewLoanLabel" tabindex="-1" aria-labelledby="formNewLoanLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="card bg-dark text-white m-0">
                            <button type="button" class="btn btn-dark ms-auto m-3 p-2" data-bs-dismiss="modal" aria-label="Close">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                                    <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z" />
                                </svg>
                            </button>
                            <div class="card-body">
                                <div class="mb-md-5 mt-md-1 pb-5">
                                    <h2 class="modal-title mb-4 ms-3">Novo Empréstimo</h2>
                                    <p class="text-white-50 mb-5 ms-3 me-3 text-justify">Por favor, preencha os dados do estudante com atenção para efetuar o empréstimo do livro. Garanta que todas as informações estejam corretas, a fim de evitar quaisquer inconvenientes durante o processo de retirada.</p>

                                    <form action="/register_book_student" method="POST">
                                        @csrf

                                        <div class="row mb-3">
                                            <div class="col">
                                                <div class="form-outline form-white mb-4">
                                                    <label class="form-label d-block text-start">Selecionar Estudante:</label>
                                                    <select class="form-select form-control form-control-lg" name="student_id" id="student_id">
                                                        <option disabled selected hidden>Escolha o estudante...</option>
                                                        @foreach ($students as $student)
                                                        <option value="{{ $student->id }}">{{ $student->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col">
                                                <div class="form-outline form-white mb-4">
                                                    <label class="form-label d-block text-start">Selecionar Livro:</label>
                                                    <select class="form-select form-control form-control-lg" name="book_id" id="book_id">
                                                        <option disabled selected hidden>Escolha o livro...</option>
                                                        @foreach ($books as $book)
                                                        <option value="{{ $book->id }}">{{ $book->title }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row mb-5 mt-4">
                                            <div class="col">
                                                <label for="date_loan"><b>Data de Empréstimo:</b></label>
                                                <input type="date" name="date_loan" id="date_loan" class="form-control" required>
                                            </div>
                                            <div class="col">
                                                <label for="date_loan"><b>Previsão de entrega:</b></label>
                                                <input type="date" name="date_loan" id="date_loan" class="form-control" required>
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button class="btn btn-primary" type="submit">Validar</button>
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Devolução de Livros -->
            <div class="modal fade" id="formNewDelivery" role="dialog" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="formNewDelivery" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="card bg-dark text-white m-0">
                            <button type="button" class="btn btn-dark ms-auto m-3 p-2" data-bs-dismiss="modal" aria-label="Close"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                                    <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z" />
                                </svg></button>
                            <div class="card-body p-4">
                                <form action="/delete_book_student" method="POST">
                                    @csrf
                                    <div class="mb-md-5 mt-md-1 pb-5">
                                        <h2 class="modal-title">Nova Devolução</h2>
                                        <p class="text-white-50 mb-5">Por favor insira os dados do estudante que fará a devolução!</p>

                                        <form action="/register_book_student" method="POST">
                                            @csrf

                                            <div class="form-outline form-white mb-4">
                                                <label class="form-label d-block text-start">Estudante:</label>
                                                <select class="form-select form-control form-control-lg" name="student_id" id="student_id">
                                                    <option disabled selected hidden>Nome do estudante...</option>
                                                    @foreach ($students as $student)
                                                    <option value="{{ $student->id }}">{{ $student->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div cl ass="form-outline form-white mb-4">
                                                <label class="form-label d-block text-start">Livro:</label>
                                                <select class="form-select form-control form-control-lg" name="book_id" id="book_id">
                                                    <option disabled selected hidden>Nome do livro...</option>
                                                    @foreach ($book_students as $book_student)
                                                    <option value="{{ $book_student->book->id }}">{{ $book_student->book->title }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="row mb-5 mt-4">
                                                <div class="col">
                                                    <label for="date_loan"><b>Data de Entrega :</b></label>
                                                    <input type="date" name="date_loan" id="date_loan" class="form-control" required>
                                                </div>
                                            </div>

                                            <div class="modal-footer">
                                                <button class="btn btn-primary" type="submit">Dar baixa</button>
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                            </div>
                                        </form>
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
                <div class="card shadow-2-strong">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-borderless mb-1">
                                <thead>
                                    <tr>
                                        <th scope="col" class="text-center">ALUNOS</th>
                                        <th scope="col" class="text-center">LIVROS EMPRESTADOS</th>
                                        <th scope="col" class="text-center">TURMAS</th>
                                        <th scope="col" class="text-center">MATRÍCULAS</th>
                                        <th scope="col" class="text-center">EMPRÉSTIMO</th>
                                        <th scope="col" class="text-center">EDIÇÃO</th>
                                        <th scope="col" class="d-flex justify-content-center">DEVOLUÇÃO</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($book_students as $book_student)
                                    <tr>
                                        <td>{{ $book_student->student->name }}</td>
                                        <td>{{ $book_student->book->title }}</td>
                                        <td class="text-center">{{ $book_student->student->school_year }}° ano</td>
                                        <td class="text-center">{{ $book_student->student->registration }}</td>
                                        <td class="text-center">{{ $book_student->loan_date }}</td>

                                        <td class="text-center">
                                            <button type="button" class="btn btn-warning btn-sm px-3" data-bs-toggle="modal" data-bs-target="#formEditBookStudent{{ $book_student->id }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                </svg>
                                            </button>
                                            <div class="modal fade" id="formEditBookStudent{{ $book_student->id }}" tabindex="-1" aria-labelledby="formEditBookStudentLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="card bg-dark text-white m-0">
                                                            <button type="button" class="btn btn-dark ms-auto m-3 p-2" data-bs-dismiss="modal" aria-label="Close"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                                                                    <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z" />
                                                                </svg></button>
                                                            <div class="card-body">
                                                                <form action="{{ route('edit_book_student', ['book_student' => $book_student]) }}" method="POST">
                                                                    @csrf
                                                                    <div class="mb-md-5 mt-md-1 pb-5">
                                                                        <h2 class="modal-title">Nova Devolução</h2>
                                                                        <p class="text-white-50 mb-5">Por favor insira os dados do estudante que fará a devolução!</p>
                                                                        <div class="form-outline form-white mb-4">
                                                                            <label class="form-label d-block text-start">Estudante:</label>
                                                                            <select class="form-select form-control form-control-lg" name="student_id" id="student_id">
                                                                                <option disabled selected hidden>Nome do estudante...</option>
                                                                                @foreach ($students as $student)
                                                                                <option value="{{ $student->id }}">{{ $student->name }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>

                                                                        <div cl ass="form-outline form-white mb-4">
                                                                            <label class="form-label d-block text-start">Livro:</label>
                                                                            <select class="form-select form-control form-control-lg" name="book_id" id="book_id">
                                                                                <option disabled selected hidden>Nome do livro...</option>
                                                                                @foreach ($books as $book)
                                                                                <option value="{{ $book->id }}">{{ $book->title }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>

                                                                        <div class="row mb-5 mt-4">
                                                                            <div class="col">
                                                                                <label for="date_loan"><b>Data de Retirada:</b></label>
                                                                                <input type="date" name="date_loan" id="date_loan" class="form-control" required>
                                                                            </div>
                                                                        </div>

                                                                        <div class="modal-footer">
                                                                            <button class="btn btn-primary" type="submit">Cadastrar</button>
                                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="d-flex justify-content-center">
                                            <button type="button" class="btn btn-secondary btn-sm px-3" data-bs-toggle="modal" data-bs-target="#warning{{ $book_student->id }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-seam" viewBox="0 0 16 16">
                                                    <path d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5l2.404.961L10.404 2l-2.218-.887zm3.564 1.426L5.596 5 8 5.961 14.154 3.5l-2.404-.961zm3.25 1.7-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923l6.5 2.6zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464L7.443.184z" />
                                                </svg>
                                            </button>
                                            <div class="modal fade" id="warning{{ $book_student->id }}" tabindex="-1" aria-labelledby="warningLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-success text-white titulos">
                                                            <h1 class="modal-title fs-5 fw-bold" id="warningLabel">Realizar baixa no registro selecionado!</h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Por gentileza, certifique-se de avaliar se o(a) estudante "{{$book_student->student->name}}" fez a devolução do livro em condições satisfatórias e se ele(a) está em conformidade com as diretrizes da biblioteca.
                                                            <br><br>
                                                            dsdsds

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                                            <form action="{{ route('delete_book_student', ['book_student' => $book_student->id]) }}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-success">Sim</button>
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
                            <div class="paginate">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="paginate">
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
        <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-book" viewBox="0 0 16 16">
            <path d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811V2.828zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z" />
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
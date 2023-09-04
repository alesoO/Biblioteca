@extends('adminlte::page')

@section('title', 'Biblioteca - Livros')

@section('content')
@auth

<div class="mask d-flex align-items-center h-100">
    <div class="container">
        <div class="d-flex justify-content-between my-4">
            <h2 class="mt-4">Histórico de empréstimos</h2>
        </div>
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card shadow-2-strong">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-borderless mb-1" id="completedLoanTable">
                                <thead>
                                    <tr>
                                        <th scope="col" class="text-center">ALUNOS</th>
                                        <th scope="col" class="text-center">LIVROS EMPRESTADOS</th>
                                        <th scope="col" class="text-center">TURMAS</th>
                                        <th scope="col" class="text-center">MATRÍCULAS</th>
                                        <th scope="col" class="text-center">EMPRÉSTIMO</th>
                                        <th scope="col" class="text-center">DEVOLUÇÃO</th>
                                        <th scope="col" class="d-flex justify-content-center">ENTREGA</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($history_book_students as $history)
                                    <tr>
                                        <td>{{ $history->student->name }}</td>
                                        <td>{{ $history->book->title }}</td>
                                        <td class="text-center">{{ $history->student->school_year }}° ano</td>
                                        <td class="text-center">{{ $history->student->registration }}</td>
                                        <td class="text-center">{{ $history->loan_date }}</td>
                                        <td class="text-center">{{ $history->delivery_date }}</td>
                                        <td class="text-center">{{ $history->return_date }}</td>
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
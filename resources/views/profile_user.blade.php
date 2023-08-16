@extends('adminlte::page')

@section('title', 'Biblioteca - Estudantes')

@section('content')

<main class="pt-5">
    <div class="container">
        <div class="main-body">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column">

                                <div class="mt-3">
                                    <h4>{{ auth()->user()->name }}</h4>
                                    <p class="text-secondary mb-1">{{ auth()->user()->email }}</p>
                                    <p class="text-muted font-size-sm">
                                        Data de ingressão: {{ auth()->user()->created_at }}</p>
                                    <button type="submit" class="btn btn-danger d-flex align-items-center"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="21" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                            <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                                        </svg> Deletar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="row mb-3">
                            <h3 class="d-flex align-items-center mb-5 mt-2">Informações do perfil</h3>
                                <div class="col-sm-3 d-flex align-items-center">
                                    <h6 class="mb-0">Full Name</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" class="form-control" value="{{ auth()->user()->name }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-3 d-flex align-items-center">
                                    <h6 class="mb-0">Email</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" class="form-control" value="{{ auth()->user()->email }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class=" text-secondary">
                                    <button type="submit" class="btn btn-primary float-end">Salvar mudanças</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="d-flex align-items-center mb-5 mt-2">Alterar senha</h3>
                                    <form action="">
                                        <div class="row mb-3">
                                            <div class="col-sm-3 d-flex align-items-center">
                                                <h6 class="mb-0">Senha Atual</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <input type="text" class="form-control" value="{{ auth()->user()->name }}">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-sm-3 d-flex align-items-center">
                                                <h6 class="mb-0">Nova senha</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <input type="text" class="form-control" value="{{ auth()->user()->name }}">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-sm-3 d-flex align-items-center">
                                                <h6 class="mb-0">Confirmar senha</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <input type="text" class="form-control" value="{{ auth()->user()->name }}">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class=" text-secondary d-flex justify-content-end">
                                                <button type="submit" class="btn btn-primary">Salvar mudanças</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@stop
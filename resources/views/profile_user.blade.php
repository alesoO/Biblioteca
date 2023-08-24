@extends('adminlte::page')

@section('title', 'Biblioteca - Estudantes')

@section('content')
@auth
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
                                    <button type="submit" class="btn btn-danger d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#user"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="21" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                            <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                                        </svg> Deletar
                                    </button>


                                    <div class="modal fade" id="user" tabindex="-1" aria-labelledby="userLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header bg-danger text-white titulos">
                                                    <h1 class="modal-title fs-5 fw-bold" id="userLabel">Aviso!
                                                        -
                                                        Essa ação não pode ser desfeita!
                                                    </h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Tem certza que deseja apagar seu usuário?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>

                                                    <form action="{{route('destroy')}}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Sim</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{route('update')}}" method="POST">
                                <div class="row mb-3">
                                    <h3 class="d-flex align-items-center mb-5 mt-2">Informações do perfil</h3>
                                    @csrf
                                    <div class="col-sm-3 d-flex align-items-center">
                                        <h6 class="mb-0">Full Name</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" value="{{ auth()->user()->name }}" name="name">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-sm-3 d-flex align-items-center">
                                        <h6 class="mb-0">Email</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="email" class="form-control" value="{{ auth()->user()->email }}" name="email">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class=" text-secondary">
                                        <button type="submit" class="btn btn-primary float-end">Salvar mudanças</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="d-flex align-items-center mb-5 mt-2">Alterar a senha</h3>
                                    <form action="{{ route('edit') }}" method="POST">
                                        @csrf
                                        <div class="row mb-3">
                                            <div class="col-sm-3 d-flex align-items-center">
                                                <h6 class="mb-0">Senha atual</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <div class="input-group">
                                                    <input type="password" class="form-control" name="current_password" id="currentAssword" placeholder="Insira sua senha atual">
                                                    <button type="button" class="btn btn-outline-secondary showPasswordBtn" data-target="#currentAssword">
                                                        <i class="fas fa-eye"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-sm-3 d-flex align-items-center">
                                                <h6 class="mb-0">Nova senha</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <div class="input-group">
                                                    <input type="password" class="form-control" name="new_password" id="newPassword" placeholder="Insira sua nova senha">
                                                    <button type="button" class="btn btn-outline-secondary showPasswordBtn" data-target="#newPassword">
                                                        <i class="fas fa-eye"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-sm-3 d-flex align-items-center">
                                                <h6 class="mb-0">Confirmar senha</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <div class="input-group">
                                                    <input type="password" class="form-control" name="new_password_confirmation" id="confirmPasswordConfirmation" placeholder="Confirme a sua senha">
                                                    <button type="button" class="btn btn-outline-secondary showPasswordBtn" data-target="#confirmPasswordConfirmation">
                                                        <i class="fas fa-eye"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="text-secondary d-flex justify-content-end col-sm-9 offset-sm-3">
                                                <button type="submit" class="btn btn-primary">Mudar senha</button>
                                            </div>
                                        </div>
                                    </form>
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
                                <p class="lead mb-4">Para que você tenha acesso a essas e outras informações do nosso site, faça seu login na nossa plataforma para que consiga vizualizar esta grande biblioteca!</p>
                            </div>
                        </div>
                    </div>
</main>

@endauth
@stop
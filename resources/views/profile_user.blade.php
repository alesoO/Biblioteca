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
                                    <h3 class="d-flex align-items-center mb-5 mt-2">Alterar senha</h3>
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

                    <!-- Bootstrap -->
                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

                    <!-- Font Awesome -->
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js" integrity="sha512-0LR9fsES8tUqLDoQlyZZvCmkN92P8SDNbsn3doWeh7kE1RAojYvVEK1Pj6E54Mq9DXDLdc1Fef5hLJoE9NkUdg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            const showPasswordBtns = document.querySelectorAll('.showPasswordBtn');

                            showPasswordBtns.forEach(function(btn) {
                                btn.addEventListener('click', function() {
                                    const targetInputId = btn.getAttribute('data-target');
                                    const senhaInput = document.querySelector(targetInputId);

                                    if (senhaInput.type === 'password') {
                                        senhaInput.type = 'text';
                                        btn.innerHTML = '<i class="fas fa-eye-slash"></i>';
                                    } else {
                                        senhaInput.type = 'password';
                                        btn.innerHTML = '<i class="fas fa-eye"></i>';
                                    }
                                });
                            });
                        });
                    </script>

</main>
@stop
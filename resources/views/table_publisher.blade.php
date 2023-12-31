@extends('adminlte::page')

@section('title', 'Biblioteca - Editores')

@section('content')

    @auth
        <div class="p-3">
            <div class="mask d-flex align-items-center h-100">
                <div class="container">
                    <div class="d-flex justify-content-between my-4">
                        <h2 class=""><b>Editora</b></h2>
                        <button type="button" class="btn btn-primary btn-sm mb-4 py-2" data-bs-toggle="modal"
                            data-bs-target="#formNewPublisher">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-plus-square" viewBox="0 0 16 16">
                                <path
                                    d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                                <path
                                    d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                            </svg> Add Editora
                        </button>
                        <div class="modal fade" id="formNewPublisher" role="dialog" data-bs-backdrop="static"
                            data-bs-keyboard="false" tabindex="-1" aria-labelledby="formNewauthorLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title text-center" id="formNewauthorLabel">
                                            <h3><b>Nova Editora</b></h3>
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form action="publisher.create" method="POST" class="p-4 bg-light" id="add_publisher_form">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="form-outline form-white mb-4">
                                                <label class="form-label">Nome:</label>
                                                <input type="text" id="name" name="name" class="form-control"
                                                    placeholder="Digite o nome da editora">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-primary" type="submit">Cadastrar</button>
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Cancelar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <div class="card shadow-2-strong">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-borderless mb-0">
                                            <thead>
                                                <tr>
                                                    <th scope="col">NOME</th>
                                                    <th scope="col" class="text-center">CRIADO EM</th>
                                                    <th scope="col" class="text-center">EDITADO EM</th>
                                                    <th scope="col" class="text-center">EDITAR</th>
                                                    <th scope="col" class="text-center">EXCLUIR</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($publishers as $publisher)
                                                    <tr>
                                                        <td>{{ $publisher->name }}</td>
                                                        <td class="text-center">
                                                            {{ $publisher->created_at->format('d/m/Y H:i:s') }}</td>
                                                        <td class="text-center">
                                                            {{ $publisher->updated_at->format('d/m/Y H:i:s') }}</td>
                                                        <td class="text-center">
                                                            <button type="button" class="btn btn-warning btn-sm px-3"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#formEditPublisher{{ $publisher->id }}">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="14"
                                                                    height="14" fill="currentColor"
                                                                    class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                                    <path
                                                                        d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                                    <path fill-rule="evenodd"
                                                                        d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                                </svg>
                                                            </button>

                                                            <div class="modal fade" id="formEditPublisher{{ $publisher->id }}"
                                                                role="dialog" data-bs-backdrop="static"
                                                                data-bs-keyboard="false" tabindex="-1"
                                                                aria-labelledby="formNewauthorLabel" aria-hidden="true">
                                                                <div class="modal-dialog modal-dialog-centered">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title text-center"
                                                                                id="formNewauthorLabel">
                                                                                <h3><b>Editar Editora</b></h3>
                                                                            </h5>
                                                                            <button type="button" class="btn-close"
                                                                                data-bs-dismiss="modal"
                                                                                aria-label="Close"></button>
                                                                        </div>
                                                                        <form
                                                                            action="{{ route('publisher.update', ['publisher' => $publisher]) }}"
                                                                            method="POST" class="p-4 bg-light">
                                                                            @csrf
                                                                            <div class="modal-body">
                                                                                <div class="form-outline form-white mb-4">
                                                                                    <label class="form-label">Nome:</label>
                                                                                    <input type="text" id="name"
                                                                                        name="name"
                                                                                        value="{{ $publisher->name }}"
                                                                                        class="form-control"
                                                                                        placeholder="Digite o nome da editora">
                                                                                </div>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button class="btn btn-primary"
                                                                                    type="submit">Cadastrar</button>
                                                                                <button type="button"
                                                                                    class="btn btn-secondary"
                                                                                    data-bs-dismiss="modal">Cancelar</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </td>
                                                        <td class="text-center">
                                                            <button type="button"
                                                                class="btn btn-danger btn-sm px-3 deleteIcon"
                                                                data-publisher-id="{{ $publisher->id }}">
                                                                <i class="fas fa-times"></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <div class="paginate">
                                            {{ $publishers->links() }}
                                        </div>
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

    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.10.25/datatables.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.all.min.js"></script>

    <script>
        $(function() {
            $("#add_publisher_form").submit(function(e) {
                e.preventDefault();
                const fd = new FormData(this);
                $("#add_publisher_btn").text('Adicionando...');
                $.ajax({
                    url: '{{ route('publisher.create') }}',
                    method: 'post',
                    data: fd,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    success: function(response) {
                        if (response.status === 'success') {
                            Swal.fire({
                                title: 'Adicionado!',
                                text: response.message,
                                icon: 'success',
                            }).then((result) => {
                                if (result.isConfirmed) {}
                                location.reload();
                            });
                        }
                        $("#add_publisher_btn").text('Adicionar Editora');
                        $("#add_publisher_form")[0].reset();
                        $("#formNewPublisher").modal('hide');
                    }
                });
            });

        });

        $(document).ready(function() {
            $(document).on('click', '.deleteIcon', function(e) {
                e.preventDefault();
                let id = $(this).attr('data-publisher-id');
                let csrf = '{{ csrf_token() }}';

                Swal.fire({
                    title: 'Você tem certeza?',
                    text: 'Você não será capaz de reverter isso!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sim, deletar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '{{ route('publisher.destroy', ['publisher' => $publisher]) }}',
                            method: 'delete',
                            data: {
                                id: id,
                                _token: csrf
                            },
                            success: function(response) {
                                console.log(response);
                                Swal.fire(
                                    'Deletado!',
                                    'A ficha do seu funcionário foi deletada',
                                    'success'
                                ).then(() => {
                                    location.reload();
                                });
                            }
                        });
                    }
                });
            });
        });
    </script>
@stop

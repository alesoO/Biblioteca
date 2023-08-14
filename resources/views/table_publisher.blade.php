@extends('adminlte::page')

@section('title', 'Biblioteca - Autores')

@section('content')
<div class="mask d-flex align-items-center h-100">
  <div class="container">
    <div class="d-flex justify-content-between my-4">
      <h2 class="">Editoras</h2>
      <button type="button" class="btn btn-secondary btn-sm px-3" data-bs-toggle="modal" data-bs-target="#formNewPublisher">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
          <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
          <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
          <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">

        </svg>
        Adicionar Editora
      </button>
    </div>
    <div class="row justify-content-center">
      <div class="col-12">
        <div class="card shadow-2-strong" style="background-color: #f5f7fa;">
          <div class="card-body">
            <div class="table-responsive">

              <table class="table table-borderless mb-0">
                <thead>
                  <tr>
                    <th scope="col">NOME</th>
                    <th scope="col">CRIADO EM</th>
                    <th scope="col">EDITADO EM</th>
                    <th scope="col">EDITAR</th>
                    <th scope="col">EXCLUIR</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Tiger Nixon</td>
                    <td>2023-08-10 13:38:15</td>
                    <td>2023-08-10 13:38:15</td>
                    <td>
                      <button type="button" class="btn btn-warning btn-sm px-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                          <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                          <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                        </svg>
                      </button>
                    </td>
                    <td>
                      <button type="button" class="btn btn-danger btn-sm px-3">
                        <i class="fas fa-times"></i>
                      </button>
                    </td>
                  </tr>
                </tbody>

                <div class="modal fade" id="formNewPublisher" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="formNewPublisher Label" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="card bg-dark text-white m-0">
                        <button type="button" class="btn-close btn-close-white ms-auto m-3 p-2" data-bs-dismiss="modal" aria-label="Close"></button>
                        <div class="card-body p-5 text-center">
                          <form action="/register_publisher" method="POST">
                            <input type="hidden" name="_token" value="hpIe4JZpxSrgMF6JXdHlweq42JHBsdpdCrD0lWbm">
                            <div class="mb-md-5 mt-md-4 pb-5">
                              <h2 class="fw-bold mb-4 text-uppercase">Novo Editora</h2>
                              <p class="text-white-50 mb-5">Por favor insira os dados do editora!</p><br><br><br>

                              <div class="form-outline form-white mb-4">
                                <label class="form-label d-block text-start">Nome:</label>
                                <input type="text" id="name" name="name" class="form-control form-control-lg" placeholder="Insira o nome da sua editora">
                              </div>

                              <div class="d-flex justify-content-center mt-4" style="margin-left: 155px;">
                                <button class="btn btn-primary mx-2 px-4" type="submit">Cadastrar
                                </button>
                                <button type="button" class="btn btn-primary mx-2 px-4" data-bs-dismiss="modal">Cancelar
                                </button>
                              </div>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

              </table>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@stop
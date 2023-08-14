@extends('adminlte::page')

@section('title', 'Biblioteca - Publicadoras')

@section('content')
<div class="mask d-flex align-items-center h-100">
    <div class="container">
        <div class="d-flex justify-content-between my-4">
            <h2 class="">Publicadoras</h2>

        </div>
        <button type="button" class="btn btn-secondary btn-sm px-3" data-bs-toggle="modal" data-bs-target="#addPublisherModal">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
                <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
            </svg> Adicionar Autor
        </button>
        
        <div class="card-body" id="show_all_employees">
            <h1 class="text-center text-secondary my-5">Procurando...</h1>
        </div>
    </div>
</div>


{{-- add new publisher modal start --}}
<div class="modal fade" id="addPublisherModal" tabindex="-1" aria-labelledby="exampleModalLabel" data-bs-backdrop="static" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Adicionar Editora</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="#" method="POST" id="add_publisher_form" enctype="multipart/form-data">
                @csrf
                <div class="modal-body p-4 bg-light">
                    <div class="row">
                        <div class="col-lg">
                            <label for="name">Nome</label>
                            <input type="text" name="name" class="form-control" placeholder="Insira o nome da empresa" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <button type="submit" id="add_publisher_btn" class="btn btn-primary">Adicionar</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- add new publisher modal end --}}

{{-- edit publisher modal start --}}
<div class="modal fade" id="editPublisherModal" tabindex="-1" aria-labelledby="exampleModalLabel" data-bs-backdrop="static" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar Editora</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="#" method="POST" id="edit_publisher_form" enctype="multipart/form-data">
                @csrf
                <div class="modal-body p-4 bg-light">
                    <div class="row">
                        <div class="col-lg">
                            <label for="name">Nome</label>
                            <input type="text" name="fname" id="fname" class="form-control" placeholder="Insira seu nome" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" id="edit_publisher_btn" class="btn btn-success">Atualizar</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- edit publisher modal end --}}

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/js/bootstrap.bundle.min.js'></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.10.25/datatables.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <script>
    $(function() {

        
      // add new publisher ajax request
      $("#add_publisher_form").submit(function(e) {
        e.preventDefault();
        const fd = new FormData(this);
        $("#add_publisher_btn").text('Adicionando...');
        $.ajax({
          url: '{{ route('store') }}',
          method: 'post',
          data: fd,
          cache: false,
          contentType: false,
          processData: false,
          dataType: 'json',
          success: function(response) {
            if (response.status == 200) {
              Swal.fire(
                'Adicionado!',
                'Editora adicionado com sucesso!',
                'success'
              )
              fetchAllPublisher();
            }
            $("#add_publisher_btn").text('Adicionar Funcionário');
            $("#add_publisher_form")[0].reset();
            $("#addPublisherModal").modal('hide');
          }
        });
      });

      // edit publisher ajax request
      $(document).on('click', '.editIcon', function(e) {
        e.preventDefault();
        let id = $(this).attr('id');
        $.ajax({
          url: '{{ route('edit') }}',
          method: 'get',
          data: {
            id: id,
            _token: '{{ csrf_token() }}'
          },
          success: function(response) {
            $("#name").val(response.name);            
          }
        });
      });

      // update publisher ajax request
      $("#edit__form").submit(function(e) {
        e.preventDefault();
        const fd = new FormData(this);
        $("#edit_publisher_btn").text('Atualizando...');
        $.ajax({
          url: '{{ route('update') }}',
          method: 'post',
          data: fd,
          cache: false,
          contentType: false,
          processData: false,
          dataType: 'json',
          success: function(response) {
            if (response.status == 200) {
              Swal.fire(
                'Atualizado!',
                'Informações atualizadas com sucesso!',
                'success'
              )
              fetchAllCompany();
            }
            $("#edit_publisher_btn").text('Update Employee');
            $("#edit_publisher_form")[0].reset();
            $("#editPublisherModal").modal('hide');
          }
        });
      });

      // delete publisher ajax request
      $(document).on('click', '.deleteIcon', function(e) {
        e.preventDefault();
        let id = $(this).attr('id');
        let csrf = '{{ csrf_token() }}';
        Swal.fire({
          title: 'Você tem certeza??',
          text: "Você não será capaz de reverter isso!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Sim, deletar'
        }).then((result) => {
          if (result.isConfirmed) {
            $.ajax({
              url: '{{ route('delete') }}',
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
                )
                fetchAllPublisher();
              }
            });
          }
        })
      });

      // fetch all publisher ajax request
      fetchAllPublisher();

      function fetchAllPublisher() {
        $.ajax({
          url: '{{ route('fetchAllPublisher') }}',
          method: 'get',
          success: function(response) {
            $("#show_all_publisher").html(response);
            $("table").DataTable({
              order: [0, 'desc']
            });
          }
        });
      }
    });
  </script>


@stop
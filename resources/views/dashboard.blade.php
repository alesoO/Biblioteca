<x-app-layout>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/css/bootstrap.min.css' />
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css' />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.10.25/datatables.min.css" />
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tela Inicial
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                <div class="flex justify-between items-center mb-4">
                        <div class="text-gray-900">
                            Editores
                        </div>
                        <div>
                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" data-bs-toggle="modal" data-bs-target="#addPublishersModal"></i>
                            Adicionar Editora
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="addPublishersModal" tabindex="-1" aria-labelledby="exampleModalLabel" data-bs-backdrop="static" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Adicionar Editora</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="#" method="POST" id="add_ublishers_form" enctype="multipart/form-data">
                    <div class="modal-body p-4 bg-light">
                        <div class="row">
                            <div class="col-lg">
                                <label for="fname">Nome</label>
                                <input type="text" name="fname" class="form-control" placeholder="Insira seu nome" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                        <button type="submit" id="add_publishers_btn" class="btn btn-primary">Adicionar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script>
        $(function() {

        
              // add new publisher ajax request
              $("#add_publishers_form").submit(function(e) {
                e.preventDefault();
                const fd = new FormData(this);
                $("#add_publishers_btn").text('Adding...');
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
                        'Funcionário adicionado com sucesso!',
                        'success'
                      )
                      fetchAllPublishers();
                    }
                    $("#add_publishers_btn").text('Adicionar Funcionário');
                    $("#add_publishers_form")[0].reset();
                    $("#addPublishersModal").modal('hide');
                  }
                });
              });
            });
    </script>

</x-app-layout>
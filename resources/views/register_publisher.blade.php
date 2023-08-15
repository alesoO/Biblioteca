@extends('adminlte::page')

@section('title', 'Biblioteca - Add Editora')

@section('content')

<section class="vh-100 gradient-custom">
    <div class="py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center w-100 h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card bg-dark text-white" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">
                        <form action="/register_author" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Nome:</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Insira o nome da sua editora">
                            </div>
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary mx-2">Cadastrar</button>
                                <a href="/table_publisher" class="d-block p-2 m-2 mx-3 link-light link-offset-2 link-underline-opacity-10 link-underline-opacity-100-hover">
                                    <- Voltar
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



@stop
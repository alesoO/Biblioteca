@extends('adminlte::page')

@section('title', 'Biblioteca - Add Autor')

@section('content')

    <section class=" vh-100 gradient-custom">
        <div class="py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center w-100 h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">
                            <form action="/register_author" method="POST">
                                @csrf
                                <div class="mb-md-5 mt-md-4 pb-5">
                                    <h2 class="fw-bold mb-2 text-uppercase">Novo Autor</h2>
                                    <p class="text-white-50 mb-5">Por favor insira os dados do Autor!</p>

                                    <div class="form-outline form-white mb-4">
                                        <label class="form-label" for="typeEmailX">Nome:</label>
                                        <input type="text" id="name" name="name"
                                            class="form-control form-control-lg" />
                                    </div>

                                    <button class="mt-4 btn btn-outline-light btn-lg px-5" type="submit">Cadastrar</button>

                                    <div class="d-flex justify-content-center text-center mt-4 pt-1">
                                        <a href="" class="text-white"><i class="fab fa-facebook-f fa-lg"></i></a>
                                        <a href="" class="text-white"><i
                                                class="fab fa-twitter fa-lg mx-4 px-2"></i></a>
                                        <a href="" class="text-white"><i class="fab fa-google fa-lg"></i></a>
                                    </div>

                                </div>
                            </form>
                            <a href="/table_author"
                                class="d-block p-2 m-2 mx-3 link-light link-offset-2 link-underline-opacity-10 link-underline-opacity-100-hover">
                                <- Voltar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@stop

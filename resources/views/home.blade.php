@extends('adminlte::page')

@section('title', 'Biblioteca - Home')

@section('content_header')
    <h1 class="m-0 text-dark">Biblioteca</h1>
@stop

@section('content')
    <main>
        <div class="px-4 py-5 text-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-book"
                viewBox="0 0 16 16">
                <path
                    d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811V2.828zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z" />
            </svg>
            <h1 class="display-5 fw-bold text-body-emphasis">Olá - Bem-vindo a Biblioteca</h1>
            <div class="col-lg-6 mx-auto">
                <p class="lead mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum, quam dignissimos,
                    fugiat quos quibusdam unde quidem temporibus nesciunt est cupiditate, voluptatibus amet doloribus
                    adipisci totam officiis qui inventore! Fuga, nemo.</p>
                <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                    <button type="button" class="btn btn-warning btn-lg px-4 gap-3 me-2">Primary button</button>
                    <button type="button" class="btn btn-outline-secondary btn-lg px-4 ms-2">Secondary</button>
                </div>
            </div>
        </div>

        <div class="container col-xxl-8 px-4 py-5" id="Sobre">
            <div class="row flex-lg-row-reverse align-items-center g-5 pt-5">
                <div class="col-10 col-sm-8 col-lg-6">
                    <img src="https://images.pexels.com/photos/1370298/pexels-photo-1370298.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                        class="d-block mx-lg-auto img-fluid rounded-lg"
                        alt="grupo-de-criancas-com-professora-caminhando-no-corredor-da-escola" width="350"
                        height="300" loading="lazy">
                </div>
                <div class="col-lg-6">
                    <h2 class="display-5 title lh-1 mb-3 ">Sobre nós
                    </h2>
                    <p class="lead">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sint ullam praesentium
                        ducimus repellendus in recusandae accusamus vero quae, nam corrupti, consequuntur totam dolore
                        iusto delectus corporis animi, laboriosam eius dolor Lorem ipsum dolor sit amet consectetur
                        adipisicing elit. Nostrum accusantium ipsum earum blanditiis tenetur aliquid velit provident itaque,
                        quisquam, saepe voluptate non voluptatum optio, pariatur ullam laboriosam facilis impedit ex?</p>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                        <button type="button" class="btn btn btn-warning btn-lg px-4 me-md-2">Saiba mais</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="container px-4 py-5" id="Recursos">
            <h2 class=" pb-2 border-bottom">Recursos</h2>
            <div class="row g-5 pt-5 row-cols-1 row-cols-lg-3">
                <div class="feature col">
                    <div class="feature-icon d-inline-flex align-items-center justify-content-center fs-2 mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="46" height="36" fill="currentColor"
                            class="bi bi-book-fill" viewBox="0 0 16 16">
                            <path
                                d="M8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z" />
                        </svg>
                    </div>
                    <h3 class="fs-2 ">Livros de extrema qualidade</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores voluptatem, aliquam soluta
                        error maxime beatae. Sit ut in dicta ipsum odit quibusdam, blanditiis veritatis error
                        distinctio, eos neque, minima veniam.</p>
                </div>
                <div class="feature col">
                    <div class="feature-icon d-inline-flex align-items-center justify-content-center fs-2 mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="46" height="36" fill="currentColor"
                            class="bi bi-card-list" viewBox="0 0 16 16">
                            <path
                                d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z" />
                            <path
                                d="M5 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 5 8zm0-2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm-1-5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zM4 8a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm0 2.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0z" />
                        </svg>
                    </div>
                    <h3 class="fs-2 ">Grande variedade de generos para você</h3>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. In ea libero quisquam facilis cumque
                        voluptatum veniam, nisi provident iste. Libero ipsum tempora esse error beatae quam eos,
                        repellendus assumenda. Tempore.</p>
                </div>
                <div class="feature col">
                    <div class="feature-icon d-inline-flex align-items-center justify-content-center fs-2 mb-3">
                        <div class="feature-icon d-inline-flex align-items-center justify-content-center fs-2 mb-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="46" height="36" fill="currentColor"
                                class="bi bi-chat-dots" viewBox="0 0 16 16">
                                <path
                                    d="M5 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
                                <path
                                    d="m2.165 15.803.02-.004c1.83-.363 2.948-.842 3.468-1.105A9.06 9.06 0 0 0 8 15c4.418 0 8-3.134 8-7s-3.582-7-8-7-8 3.134-8 7c0 1.76.743 3.37 1.97 4.6a10.437 10.437 0 0 1-.524 2.318l-.003.011a10.722 10.722 0 0 1-.244.637c-.079.186.074.394.273.362a21.673 21.673 0 0 0 .693-.125zm.8-3.108a1 1 0 0 0-.287-.801C1.618 10.83 1 9.468 1 8c0-3.192 3.004-6 7-6s7 2.808 7 6c0 3.193-3.004 6-7 6a8.06 8.06 0 0 1-2.088-.272 1 1 0 0 0-.711.074c-.387.196-1.24.57-2.634.893a10.97 10.97 0 0 0 .398-2z" />
                            </svg>
                        </div>
                    </div>
                    <h3 class="fs-2 ">Suporte 24H</h3>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Placeat neque, impedit deserunt nisi
                        maiores deleniti, voluptates ea ipsum doloremque nesciunt, ullam omnis non voluptatum maxime
                        officia rerum quia. Ea, voluptatem!</p>
                </div>
                <div class="feature col">
                    <div class="feature-icon d-inline-flex align-items-center justify-content-center  fs-2 mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="46" height="36" fill="currentColor"
                            class="bi bi-calendar-date" viewBox="0 0 16 16">
                            <path
                                d="M6.445 11.688V6.354h-.633A12.6 12.6 0 0 0 4.5 7.16v.695c.375-.257.969-.62 1.258-.777h.012v4.61h.675zm1.188-1.305c.047.64.594 1.406 1.703 1.406 1.258 0 2-1.066 2-2.871 0-1.934-.781-2.668-1.953-2.668-.926 0-1.797.672-1.797 1.809 0 1.16.824 1.77 1.676 1.77.746 0 1.23-.376 1.383-.79h.027c-.004 1.316-.461 2.164-1.305 2.164-.664 0-1.008-.45-1.05-.82h-.684zm2.953-2.317c0 .696-.559 1.18-1.184 1.18-.601 0-1.144-.383-1.144-1.2 0-.823.582-1.21 1.168-1.21.633 0 1.16.398 1.16 1.23z" />
                            <path
                                d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z" />
                        </svg>
                    </div>
                    <h3 class="fs-2 ">Prazos de aluguel flexiveis</h3>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Rem culpa sint aperiam laudantium
                        minima doloremque commodi asperiores reiciendis deleniti, repellat adipisci nesciunt voluptates.
                        Corporis odio eaque porro aspernatur, quas cum.</p>
                </div>
                <div class="feature col">
                    <div class="feature-icon d-inline-flex align-items-center justify-content-center  fs-2 mb-3">
                        <svg xmlns="" width="46" height="36">
                        </svg>
                    </div>
                    <h3 class="fs-2">E muito mais...</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid nostrum laboriosam nam vel amet
                        asperiores deserunt iure harum aperiam incidunt! Fugit fuga cumque debitis officiis dolores
                        sapiente, ex molestiae impedit!</p>
                </div>
            </div>
        </div>

        <div class="container">
            <h2 class=" pb-2 border-bottom">Administração</h2>
            <div class="mt-4 row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>150</h3>

                            <p>Autores</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="/table_author" class="small-box-footer">Ver Mais... <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>53<sup style="font-size: 20px">%</sup></h3>

                            <p>Bounce Rate</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>44</h3>

                            <p>User Registrations</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>65</h3>

                            <p>Unique Visitors</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
        </div>
    </main>
@stop

<x-layout.main>
    <x-slot:title>
        Welcome
        </x-slot>

        <x-slot:background-color>
            login-background
            </x-slot>



            <div class="container d-flex flex-column justify-content-between vh-100 text-light" id="login-page">
                <nav class="navbar navbar-expand-lg w-100">
                    <div class="d-flex mx-auto">
                        <a class="navbar-brand text-light" href="#">TOEFL Simulation</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                <li class="nav-item">
                                    <a class="nav-link active" href="/">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/about">About</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/donate">Donate</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/exam/welcome">welcome</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>

                <section class="hero">
                    <div class="row align-items-center ">
                        <div class="col-7">
                            <div class="text text-uppercase">
                                Practice Your English For Better Future
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="box rounded d-flex justify-content-center align-items-center">
                                <form action="/register" method="post" class="p-5 rounded-3">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="nama" class="form-label font-secular">Name</label>
                                        <input type="text" class="form-control" id="nama" name="name">
                                    </div>
                                    <button type="submit" class="btn btn-primary rounded-0">Register</button>
                                </form>
                            </div>
                        </div>
                        {{-- <div class="col landing-image">
            <img src="{{ Vite::asset('resources/images/landing.png') }}" class="img-fluid" alt="">
        </div> --}}
                    </div>
                </section>

                <footer class="p-4 text-center">
                    <div class="footer-text">
                        Created By Fiqih Alfito
                    </div>
                </footer>

            </div>



</x-layout.main>

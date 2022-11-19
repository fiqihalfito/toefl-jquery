<x-layout.main>
    <x-slot:title>
        Welcome
        </x-slot>

        <div class="vh-100 d-flex justify-content-center align-items-md-center">
            <div class="card shadow col-8">
                <div class="row g-0">

                    <div class="col-md-8">
                        <div class="card-body p-5">
                            <h3 class="card-title">Welcome to TOEFL, {{ session('name') }}</h3>
                            <p class="card-text">This is lobby page. You may read the rules below first.</p>
                            <h5>Sections</h5>
                            <p class="card-text m-0">there are three sections to complete:</p>

                            <dl class="row">
                                <dt class="col-sm-3">Listening</dt>
                                <dd class="col-sm-9">50 questions</dd>
                                <dt class="col-sm-3">Structure</dt>
                                <dd class="col-sm-9">40 questions</dd>
                                <dt class="col-sm-3">Reading</dt>
                                <dd class="col-sm-9">50 questions</dd>
                            </dl>
                            <h5>Test Time</h5>
                            <p class="card-text">The total test takes about 115 minutes to complete</p>
                            <h5>Device</h5>
                            <p class="card-text">
                                PC / Mobile
                                <br>
                                <small class="text-muted">for better usage, PC is recommended</small>
                            </p>

                            <h5>Start</h5>
                            <p class="card-text">after you press "Start Test" button. the Test will begin</p>

                            {{-- <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> --}}

                        </div>
                        <a href="/exam" class="btn btn-lg btn-danger d-block rounded-0">Start
                            Test</a>
                    </div>

                    <div class="col-md-4 d-none d-md-block">
                        <img src="{{ Vite::asset('resources/images/pencils.jpg') }}" class="img-fluid h-100 rounded-end"
                            alt="...">
                    </div>
                </div>
            </div>
        </div>

</x-layout.main>

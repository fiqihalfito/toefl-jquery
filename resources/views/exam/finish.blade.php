<x-layout.main>
    <x-slot:title>
        Welcome
        </x-slot>

        <div class="vh-100 d-flex justify-content-center align-items-md-center">
            <div class="card shadow col-8">
                <div class="row g-0">

                    <div class="col-md-8">
                        <div class="card-body p-5">
                            <h3 class="card-title">Congratulations</h3>
                            <p class="card-text">Thank You for participating TOEFL simulation.</p>
                            <h4>Your scores</h4>

                            <dl class="row">
                                <dt class="col-sm-3">Listening</dt>
                                <dd class="col-sm-9">{{ $result['converted']['listening'] }}</dd>
                                <dt class="col-sm-3">Structure</dt>
                                <dd class="col-sm-9">{{ $result['converted']['structure'] }}</dd>
                                <dt class="col-sm-3">Reading</dt>
                                <dd class="col-sm-9">{{ $result['converted']['reading'] }}</dd>
                            </dl>

                            <h5>Final score</h5>
                            <p class="card-text">Your final score is : <span
                                    class="h5">{{ $result['final'] }}</span></p>


                            {{-- <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> --}}


                        </div>
                        <a href="/exam/welcome" class="btn btn-success btn-lg m-5">Start
                            Again</a>
                    </div>

                    <div class="col-md-4 d-none d-md-block">
                        <img src="{{ Vite::asset('resources/images/champ.jpg') }}" class="img-fluid h-100 rounded-end"
                            alt="...">
                    </div>
                </div>
            </div>
        </div>

</x-layout.main>

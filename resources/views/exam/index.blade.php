<x-layout.main>
    <x-slot:title>
        TOEFL exam
        </x-slot>

        <div class="container d-flex flex-column py-3 vh-100 ">

            <x-exam.header />

            <div class="row mt-3 h-100">
                <div class="col-12 col-md-5 col-lg-4 mb-3 mb-md-0 ">
                    <x-exam.sidebar :questions="$questions" />
                </div>
                <div class="col-12 col-md-7 col-lg-8 mb-3">
                    <x-exam.content :questions="$questions" />
                </div>
            </div>

        </div>
</x-layout.main>

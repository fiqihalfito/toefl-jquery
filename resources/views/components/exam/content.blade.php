<form action="/exam/finish" method="post" id="examForm">
    @csrf
    @foreach ($questions as $item)
        <div class="question-card card shadow-sm d-none" id="{{ $item['id'] }}">
            <div class="card-header d-flex align-items-center justify-content-between">
                <span class="question-number fs-5 fw-semibold">No. 1</span>
                <span class="fs-5 fw-semibold">{{ strtoupper($item['type']) }}</span>
            </div>
            <div class="card-body p-4 p-md-5 overflow-auto">
                @if ($item['type'] == 'listening')
                    <div class="audio-holder mb-2">
                        <audio class="listening-audio w-100" controls>
                            <source src="" type="audio/mpeg">
                        </audio>
                    </div>
                @endif

                @if ($item['type'] == 'reading')
                    <div class="reading-image p-1 p-md-4">
                        <img src="/api/reading" class="img-fluid" alt="">
                    </div>
                @endif
                <p class="question mb-4">
                    {{-- {{ $item['question'] }} --}}
                    {!! $item['question'] !!}
                </p>
                <section id="answer-section">
                    <input type="hidden" name="answer[{{ $loop->index }}][questionId]" value="{{ $item['id'] }}">
                    @foreach ($item['option'] as $option)
                        <div class="answer-container">
                            <label class="option" for="option-{{ $item['id'] }}-{{ $option['code'] }}">
                                <input type="radio" name="answer[{{ $loop->parent->index }}][answer]"
                                    id="option-{{ $item['id'] }}-{{ $option['code'] }}" value="{{ $option['code'] }}"
                                    data-target="{{ $item['id'] }}" />
                                <div class="answer-statement">
                                    <div class="btn-answer">
                                        {{ $loop->index == 0 ? 'A' : '' }}
                                        {{ $loop->index == 1 ? 'B' : '' }}
                                        {{ $loop->index == 2 ? 'C' : '' }}
                                        {{ $loop->index == 3 ? 'D' : '' }}
                                    </div>
                                    <span class="ms-4">{{ $item['option'][$loop->index]['statement'] }}</span>
                                </div>
                            </label>
                        </div>
                    @endforeach
                </section>
                {{-- <section id="answer-section">
            <div class="answer-container">
                <label class="selection" for="answer">
                    <input type="radio" name="answer[]" id="answer-a[]">
                    <div class="answer-statement">
                        <div class="btn-answer">A</div>
                        <span class="ms-4">{{ $item['selection'][0]['statement'] }}</span>
                    </div>
                </label>
            </div>
            <div class="answer-container">
                <label class="selection" for="answer-b[]">
                    <input type="radio" name="answer[]" id="answer-b[]">
                    <div class="answer-statement">
                        <div class="btn-answer">B</div>
                        <span class="ms-4">{{ $item['selection'][1]['statement'] }}</span>
                    </div>
                </label>
            </div>
            <div class="answer-container">
                <label class="selection" for="answer-c[]">
                    <input type="radio" name="answer[]" id="answer-c[]">
                    <div class="answer-statement">
                        <div class="btn-answer">C</div>
                        <span class="ms-4">{{ $item['selection'][2]['statement'] }}</span>
                    </div>
                </label>
            </div>
            <div class="answer-container">
                <label class="selection" for="answer-d[]">
                    <input type="radio" name="answer[]" id="answer-d[]">
                    <div class="answer-statement">
                        <div class="btn-answer">D</div>
                        <span class="ms-4">{{ $item['selection'][3]['statement'] }}</span>
                    </div>
                </label>
            </div>
        </section> --}}

            </div>
            <div class="card-footer d-flex justify-content-between">

                @if ($loop->first)
                    <span class="invisible">no prev</span>
                @else
                    <div class="btn btn-primary prev-button">Prev</div>
                @endif

                @if ($loop->last)
                    <button type="submit" class="btn btn-success submit-button">Submit</button>
                @else
                    <div class="btn btn-primary next-button">Next</div>
                @endif
            </div>

        </div>
    @endforeach
</form>

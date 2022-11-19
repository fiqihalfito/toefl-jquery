<aside class="bg-white rounded h-100x shadow-sm px-4 py-3 user-select-none">
    <ul class="nav nav-tabs mb-3 " id="exam-sections">
        <li class="nav-item flex-fill" role="presentation">
            <button class="nav-link w-100 active" id="listening-tab" data-bs-toggle="tab"
                data-bs-target="#listening-section" type="button" role="tab">Listening</button>
        </li>
        <li class="nav-item flex-fill" role="presentation">
            <button class="nav-link w-100" id="structure-tab" data-bs-toggle="tab" data-bs-target="#structure-section"
                type="button" role="tab">Structure</button>
        </li>
        <li class="nav-item flex-fill" role="presentation">
            <button class="nav-link w-100" id="reading-tab" data-bs-toggle="tab" data-bs-target="#reading-section"
                type="button" role="tab">Reading</button>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="listening-section" role="tabpanel" tabindex="0">
            <section class="listening-section row row-cols-5 g-2">
                <?php $i = 1; ?>
                @foreach ($questions as $item)
                    @if ($item['type'] == 'listening')
                        <div class="col">
                            {{-- <div class="exam-number-button {{ $loop->first ? 'active' : '' }}"
                                data-question-target="{{ $item['id'] }}" data-question-type="{{ $item['type'] }}">
                                {{ $i++ }}</div> --}}
                            <x-exam.sidebar-comp.number-button :question-type="$item['type']" :target="$item['id']" :number="$i++" />
                        </div>
                    @endif
                @endforeach
            </section>
        </div>
        <div class="tab-pane fade" id="structure-section" role="tabpanel" tabindex="0">
            <section class="structure-section row row-cols-5 g-2">
                <?php $j = 1; ?>
                @foreach ($questions as $item)
                    @if ($item['type'] == 'structure')
                        <div class="col">
                            {{-- <div class="exam-number-button" data-question-target="{{ $item['id'] }}"
                                data-question-type="{{ $item['type'] }}">
                                {{ $j++ }}</div> --}}
                            <x-exam.sidebar-comp.number-button :question-type="$item['type']" :target="$item['id']" :number="$j++" />

                        </div>
                    @endif
                @endforeach
            </section>
        </div>
        <div class="tab-pane fade" id="reading-section" role="tabpanel" tabindex="0">
            <section class="reading-section row row-cols-5 g-2">
                <?php $k = 1; ?>
                @foreach ($questions as $item)
                    @if ($item['type'] == 'reading')
                        <div class="col">
                            {{-- <div class="exam-number-button" data-question-target="{{ $item['id'] }}"
                                data-question-type="{{ $item['type'] }}">
                                {{ $k++ }}</div> --}}
                            <x-exam.sidebar-comp.number-button :question-type="$item['type']" :target="$item['id']" :number="$k++" />

                        </div>
                    @endif
                @endforeach
            </section>
        </div>
    </div>

</aside>

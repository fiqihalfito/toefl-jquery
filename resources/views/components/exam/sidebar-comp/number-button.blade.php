<a href="#{{ $target }}"
    class="exam-number-button {{ $isFirstListeningButton($number, $questionType) ? 'active' : '' }} text-decoration-none"
    data-question-target="{{ $target }}" data-question-type="{{ $questionType }}">
    {{ $number }}
</a>

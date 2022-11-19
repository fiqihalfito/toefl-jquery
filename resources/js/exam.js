import $ from 'jquery';
import { getAudio } from './audiosetting.js';


$(function () {

    const hideAllQuestion = () => {
        $(".question-card").addClass('d-none');
        $('.exam-number-button').removeClass('active');
    }

    const activateQuestion = (element) => {
        $(element).addClass('active');
        $("#" + $(element).data('question-target')).removeClass('d-none');

        // if listening, get audio
        if ($(element).data('question-type') === 'listening') {
            let target = $(element).data('question-target');
            getAudio(target);
        }
    }

    const showTabQuestionSection = (questionType) => {
        $("#" + questionType + "-tab").trigger("click");
    };

    const markAnsweredQuestion = (element) => {
        $(element).on("change", function () {
            let numberButtonTarget = $(element).data('target');
            $(`.exam-number-button[data-question-target='${numberButtonTarget}']`).addClass('answered');
        });
    }

    const nextPrevQuestion = (direction) => {
        $('.exam-number-button').each(function (index, element) {

            if ($(this).hasClass('active')) {
                // get next or prev question index
                let indexResult = direction === 'next' ? (++index) : (--index);
                let newQuestion = $('.exam-number-button').eq(indexResult);

                hideAllQuestion();
                activateQuestion(newQuestion);

                showTabQuestionSection(newQuestion.data('question-type'));

                return false;
            }

        });
    }

    $('.exam-number-button').each(function () {
        // show first question
        if ($(this).hasClass('active')) {
            $("#" + $(this).data('question-target')).removeClass('d-none');

            // get audio
            let target = $(this).data('question-target');
            getAudio(target);
        }

        let number = $(this).text();
        let target = $(this).data('question-target');

        // display correct number in question card
        $(`#${target} .question-number`).text("No. " + number);

        // set active question
        $(this).on('click', function () {
            hideAllQuestion();
            activateQuestion(this);
        });
    });

    $(".next-button").on("click", function () {
        nextPrevQuestion('next');
    });

    $(".prev-button").on("click", function () {
        nextPrevQuestion("prev");
    });

    // mark answered question
    $(".answer-container input").each(function (index, element) {
        markAnsweredQuestion(element);
    });

});
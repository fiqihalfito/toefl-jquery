import $ from 'jquery';

const stopAllAudio = () => {
    $("audio").each(function () {
        this.pause();
        this.currentTime = 0;
    });
}
export const getAudio = (target) => {
    stopAllAudio();

    let audioSource = $("#" + target + " audio source")[0];
    let audioElement = $("#" + target + " audio")[0];

    audioSource.src = "/api/audio/" + target;
    audioElement.load();
}
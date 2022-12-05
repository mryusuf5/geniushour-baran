var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl)
})

const mp3player = document.querySelector("#mp3Player");
const actualMp3 = document.querySelector("#actualMp3");
const playPauseButton = document.querySelector("#playPauseButton");
const songLength = document.querySelector("#songLength");
const volumeSlider = document.querySelector("#volumeSlider");
const songSlider = document.querySelector("#songSlider");
const currentDuration = document.querySelector("#currentDuration");

mp3player.style.visibility = "hidden";
actualMp3.style.visibility = "hidden";



let updateTimer;
let isPlaying;

const loadTrack = (e) => {
    mp3player.style.visibility = "visible";
    clearInterval(updateTimer);
    reset();

    actualMp3.src = `user/songs/song${e}.mp3`;
    actualMp3.load();
    updateTimer  = setInterval(setUpdate,1000);
    playTrack();
    actualMp3.volume = 0.5;
}

const reset = () => {
    currentDuration.textContent = "00:00"
    songLength.textContent = "00:00"
    songSlider.value = 0;
}

const playPauseTrack = () => {
    isPlaying ? pauseTrack() : playTrack();
}

const playTrack = () => {
    actualMp3.play();
    playPauseButton.classList = "fa-solid fa-pause";
    isPlaying = true;
}

const pauseTrack = () => {
    actualMp3.pause();
    playPauseButton.classList = "fa-solid fa-play";
    isPlaying = false;
}

const seekTo = () => {
    actualMp3.currentTime = actualMp3.duration * (songSlider.value / 100);
}

const setVolume = () => {
    actualMp3.volume = volumeSlider.value / 100;
}

const setUpdate = () => {
    let seekPosition = 0;
    if(!isNaN(actualMp3.duration))
    {
        seekPosition = actualMp3.currentTime * (100 / actualMp3.duration);
        songSlider.value = seekPosition;

        let currentMinutes = Math.floor(actualMp3.currentTime / 60);
        let currentSeconds = Math.floor(actualMp3.currentTime - currentMinutes * 60);
        let durationMinutes = Math.floor(actualMp3.duration / 60);
        let durationSeconds = Math.floor(actualMp3.duration - durationMinutes * 60)

        if(currentSeconds < 10){currentSeconds = "0" + currentSeconds;}
        if(durationSeconds < 10){durationSeconds = "0" + durationSeconds;}
        if(currentMinutes < 10){currentMinutes = "0" + currentMinutes;}
        if(durationMinutes < 10){durationMinutes = "0" + durationMinutes;}

        currentDuration.textContent = currentMinutes + ":" + currentSeconds;
        songLength.textContent = durationMinutes + ":" + durationSeconds;
    }
}

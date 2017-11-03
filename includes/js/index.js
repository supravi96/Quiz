let timerStarted = false;
let totalTime = 120;
let timer = document.querySelector('#speedometerTimer');
let speedometerTimer;

function startRound(e) {
    if (!timerStarted) {
        startTimer(totalTime)
        e.textContent = "Stop Round";
        console.log(e.textContent);
    } else {
        clearInterval(speedometerTimer);
        timerStarted = false;
        timer.textContent = totalTime;
        e.textContent = "Start Round";
    }

}

function startTimer(time) {
    timerStarted = true;
    speedometerTimer = setInterval(() => {
        if (time < 1) {
            clearInterval(speedometerTimer);

        }
        timer.textContent = time--;
    }, 1000);
}


let slider = document.querySelector('#myRange');
let sliderValue = document.querySelector('#sliderValue');
sliderValue.textContent = slider.value;
slider.oninput = function() {
    sliderValue.textContent = this.value;
}
let endmusic = document.querySelector('#endmusic');

function playAudio() {
    endmusic.play();

}

function stopAudio() {
    endmusic.pause();
}
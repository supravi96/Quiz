app.controller('round5Ctrl', function($scope, $http) {
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

});
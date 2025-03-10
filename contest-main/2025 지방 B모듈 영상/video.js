const video = document.getElementById("myVideo");
const stopp = document.getElementById('stop');
const goo = document.getElementById('go');

function btnupdate() {
    if(video.paused || video.ended) {
        stopp.style.display = 'none';
        goo.style.display = 'block';
    } else {
        stopp.style.display = 'block';
        goo.style.display = 'none';
    }
}
video.addEventListener('ended', btnupdate)

function autostart() {
    stopp.style.display = 'block';
    goo.style.display = 'none';
}
video.addEventListener('play', autostart)

function playVideo() {
    video.play();
    btnupdate();
}

function pauseVideo() {
    video.pause();
    btnupdate();
}

function stopVideo() {
    video.pause();
    video.currentTime = 0;
    stopp.style.display = 'none';
    goo.style.display = 'block';
}

function skipTime(seconds) {
    video.currentTime += seconds;
}

function changeSpeed(amount) {
    video.playbackRate = Math.max(0.1, video.playbackRate + amount);
    document.getElementById('lookbox').textContent = parseFloat(video.playbackRate.toFixed(2));
    if(video.playbackRate === 0.1) {
        video.playbackRate = 0.1;
    } else {
        document.getElementById('lookbox').textContent = parseFloat(video.playbackRate.toFixed(2));
    }
}

function resetSpeed() {
    video.playbackRate = 1;
    document.getElementById('lookbox').textContent = "1";
}

function toggleControls() {
    video.controls = !video.controls;
}

function toggleLoop() {
    video.loop = !video.loop;
    alert("반복 재생: " + (video.loop ? "켜짐" : "꺼짐"));
}

function toggleAutoplay() {
    video.autoplay = !video.autoplay;
    alert("자동 재생: " + (video.autoplay ? "켜짐" : "꺼짐"));
  }


document.getElementById('left').addEventListener('click', function(){
    document.getElementById('leftbox').style.opacity = '1';
    setTimeout(function(){
        document.getElementById('leftbox').style.opacity = '0';
    },1000)
})
document.getElementById('right').addEventListener('click', function(){
    document.getElementById('rightbox').style.opacity = '1';
    setTimeout(function(){
        document.getElementById('rightbox').style.opacity = '0';
    },1000)
})
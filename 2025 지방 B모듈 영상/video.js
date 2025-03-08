const video = document.getElementById("myVideo");
const stopp = document.getElementById('stop');
const goo = document.getElementById('go');

function btnupdate() {
    if(video.pause) {
        stopp.style.display = 'block';
        goo.style.display = 'none';
    } else {
        stopp.style.display = 'none';
        goo.style.display = 'block';
    }
}

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
    video.currentTime = 0; // 영상 처음으로 이동
}

function skipTime(seconds) {
    video.currentTime += seconds;
}

function changeSpeed(amount) {
    video.playbackRate = Math.max(0.1, video.playbackRate + amount);
    alert(video.playbackRate)
}

function resetSpeed() {
    video.playbackRate = 1;
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
    alert("자동 재생: " + (video.autoplay ? "켜짐 (새로고침 필요)" : "꺼짐"));
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
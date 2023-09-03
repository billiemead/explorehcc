window.onload = () => {
    //write your code here
    function toggleMute() {
        var button = document.getElementById("toptab-link3")
        var video = document.getElementById("elevarVideo")

        if (video.muted) {
            video.muted = false;
        } else {
            video.muted = true;
        }
        button.classList.toggle('muted');
    }

    if (window.matchMedia("(min-width: 1024px)").matches) {
        // create the video element
        var video = document.createElement("video");
        video.setAttribute("data-v-767e84ec", "");
        video.setAttribute("webkit-playsinline", "");
        video.setAttribute("playsinline", "");
        video.setAttribute("poster", "/wp-content/uploads/videos/hero-video-poster-image1920x900.jpg");
        video.setAttribute("muted", "muted");
        video.setAttribute("loop", "loop");
        video.setAttribute("src", "/wp-content/uploads/videos/elevar_da_mountain_animation_1920x900.mp4");
        video.setAttribute("width", "100vw");
        video.setAttribute("height", "100vh");
        video.setAttribute("class", "elevar-animation");
        video.setAttribute("id", "elevarVideo");
        video.setAttribute("autoplay", "autoplay");
        // get the existing video container and append the new video element
        var videoContainer = document.querySelector('.video-wrap');
        videoContainer.appendChild(video);
    }
}
window.onload = () => {

    if (window.matchMedia("(min-width: 1024px)").matches) {
        /* HTML5 element created with JS */
            var video = document.createElement("video");
            video = document.createElement("video");
            video.setAttribute("class", "elevar-animation");
            video.setAttribute("id", "elevarVideo");
            video.setAttribute("width", "100vw");
            video.setAttribute("height", "100vh");
            video.setAttribute("webkit-playsinline", "");
            video.setAttribute("playsinline", "");
            video.setAttribute("muted", "muted");
            // video.setAttribute("loop", "loop");
            // video.setAttribute("autoplay", "autoplay");
            video.setAttribute("data-v-767e84ec", "");
            video.setAttribute("poster", "/wp-content/uploads/videos/hero-video-poster-image1920x900.jpg");
            video.controls = false;
            video.autoplay = true;
            video.loop = true;
            video.muted = true;
            // get the existing video container and append the new video element
            var videoContainer = document.querySelector('.video-wrap');
            videoContainer.appendChild(video);
    }
    var videoElement = document.getElementById("elevarVideo");
    if (videoElement) {
            var source1 = document.createElement("source1");
            source1 = document.createElement("source");
            source1.setAttribute("src", "/wp-content/uploads/videos/elevar_da_mountain_animation_1920x900.webm");
            source1.setAttribute("type", "video/webm");
            var sourceContainer1 = document.querySelector('.elevar-animation');
            sourceContainer1.appendChild(source1);

            var source2 = document.createElement("source2");
            source2 = document.createElement("source");
            source2.setAttribute("src", "/wp-content/uploads/videos/elevar_da_mountain_animation_1920x900.mp4");
            source2.setAttribute("type", "video/mp4");
            var sourceContainer2 = document.querySelector('.elevar-animation');
            sourceContainer2.appendChild(source2);

            var source3 = document.createElement("source1");
            source3 = document.createElement("source");
            source3.setAttribute("src", "/wp-content/uploads/videos/elevar_da_mountain_animation_1920x900.ogv");
            source3.setAttribute("type", "video/ogg");
            var sourceContainer3 = document.querySelector('.elevar-animation');
            sourceContainer3.appendChild(source3);
    }

}
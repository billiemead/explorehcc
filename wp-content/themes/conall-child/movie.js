window.onload = () => {

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

    function Main() {
        if (window.matchMedia("(min-width: 1024px)").matches) {
            /* HTML5 element created with JS */
            this.video = document.createElement("video");
            this.video.setAttribute("class", "elevar-animation");
            this.video.setAttribute("id", "elevarVideo");
            this.video.setAttribute("width", "100vw");
            this.video.setAttribute("height", "100vh");
            this.video.setAttribute("webkit-playsinline", "");
            this.video.setAttribute("playsinline", "");
            this.video.setAttribute("muted", "muted");
            // this.video.setAttribute("loop", "loop");
            // this.video.setAttribute("autoplay", "autoplay");
            this.video.setAttribute("data-v-767e84ec", "");
            this.video.setAttribute("poster", "/wp-content/uploads/videos/hero-video-poster-image1920x900.jpg");
            this.video.controls = false;
            this.video.autoplay = true;
            this.video.loop = true;
            this.video.muted = true;

            this.source1 = document.createElement("source");
            this.source1.setAttribute("src", "/wp-content/uploads/videos/elevar_da_mountain_animation_1920x900.webm");
            this.source1.setAttribute("type", "video/webm");
            this.video.appendChild(this.source1);

            this.source2 = document.createElement("source");
            this.source2.setAttribute("src", "/wp-content/uploads/videos/elevar_da_mountain_animation_1920x900.mp4");
            this.source2.setAttribute("type", "video/mp4");
            this.video.appendChild(this.source2);

            this.source3 = document.createElement("source");
            this.source3.setAttribute("src", "/wp-content/uploads/videos/elevar_da_mountain_animation_1920x900.ogv");
            this.source3.setAttribute("type", "video/ogg");
            this.video.appendChild(this.source3);

            // get the newly created video element and append the source element
            var videoContainer = document.querySelector('.video-wrap');
            videoContainer.appendChild(this.video);
            // document.body.appendChild(this.video);
        }
    }

    var main = new Main();

}
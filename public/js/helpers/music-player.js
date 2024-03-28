// bar music
$(document).ready(function () {
    $(".btn-play").click(function () {
        var url = $(this).data("music-url");
        var id = $(this).data("music-id");
        $("#audio-player").attr("src", url);
        $("#music-player").addClass("show");

        var audio = document.getElementById("audio-player");
        audio.play();
        addView(id);

        // Tampilkan durasi pemutaran
        audio.addEventListener("timeupdate", function () {
            var timeElapsed = document.getElementById("time-elapsed");
            var progressBar = document.getElementById("progress-bar");
            var percentage = (audio.currentTime / audio.duration) * 100;
            progressBar.style.width = percentage + "%";
            timeElapsed.innerText = formatTime(audio.currentTime);
        });

        // Tutup pemutar musik saat audio selesai diputar
        audio.addEventListener("ended", function () {
            $("#music-player").removeClass("show");
        });
    });

    // Tambahkan event listener untuk tombol 'x'
    $("#close-music-btn").click(function () {
        var audio = document.getElementById("audio-player");
        audio.pause(); // Hentikan pemutaran audio
        $("#music-player").removeClass("show"); // Sembunyikan pemutar musik
    });
});

function formatTime(seconds) {
    var minutes = Math.floor(seconds / 60);
    var remainingSeconds = Math.floor(seconds % 60);
    return (
        minutes +
        ":" +
        (remainingSeconds < 10 ? "0" + remainingSeconds : remainingSeconds)
    );
}

function addView(id) {
    // Mendapatkan CSRF token dari meta tag dalam halaman
    var csrfToken = $('meta[name="csrf-token"]').attr("content");
    console.log(id);

    $.ajax({
        url: "/music/" + id + "/view",
        type: "POST",
        data: {
            // Menambahkan CSRF token ke dalam data permintaan
            _token: csrfToken,
        },
        success: function (response) {
            console.log(response);
        },
    });
}

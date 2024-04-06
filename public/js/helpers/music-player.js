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
            var progressBar = document.getElementById("progress-bar");
            var percentage = (audio.currentTime / audio.duration) * 100;
            progressBar.style.width = percentage + "%";
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

    // Tambahkan event listener untuk tombol minimize
    $("#minimize-btn").click(function () {
        $("#music-player").slideUp("slow");
        $("#maximize-btn").slideDown("slow").show(); // Tampilkan tombol maximize
    });

    // Tambahkan event listener untuk tombol maximize
    $("#maximize-btn").click(function () {
        $("#music-player").slideDown("slow");
        $(this).hide(); // Sembunyikan tombol maximize
    });

    $("#button-control-audio").click(function () {
        var audio = document.getElementById("audio-player");
        if (audio.paused) {
            audio.play();
            $(this).html('<i class="mdi mdi-pause"></i>');
        } else {
            audio.pause();
            $(this).html('<i class="mdi mdi-play"></i>');
        }
    });
});

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

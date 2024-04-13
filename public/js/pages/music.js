$(document).ready(function () {
    $("#upload-form").submit(function (event) {
        event.preventDefault(); // Mencegah pengiriman form secara default

        var formData = new FormData($(this)[0]); // Membuat objek FormData dari form
        var $submitButton = $("#upload-button");

        // Mengubah teks tombol dan menampilkan animasi loading
        $submitButton
            .html('<i class="mdi mdi-upload"></i> Uploading...')
            .prop("disabled", true);

        $.ajax({
            url: $(this).attr("action"), // URL endpoint untuk mengirim data form
            type: $(this).attr("method"), // Metode HTTP untuk pengiriman (POST)
            data: formData, // Data yang akan dikirimkan (FormData)
            processData: false, // Pengolahan data tidak diperlukan
            contentType: false, // Konten data tidak didefinisikan
            success: function (response) {
                // Callback ketika permintaan berhasil
                console.log(response);
                // Tambahkan kode untuk menangani respons dari server

                // Mengembalikan teks tombol ke semula setelah proses upload selesai
                $submitButton
                    .html('<i class="mdi mdi-upload"></i> Uploaded')
                    .prop("disabled", false);

                // akan merefresh dalam 2 detik
                setTimeout(function () {
                    window.location.reload();
                }, 2000);
            },
            error: function (xhr, status, error) {
                // Callback ketika terjadi kesalahan
                console.error(xhr.responseText);
                // Tambahkan kode untuk menangani kesalahan

                // Mengembalikan teks tombol ke semula setelah proses upload selesai dengan kesalahan
                $submitButton
                    .html('<i class="mdi mdi-upload"></i> Upload Music')
                    .prop("disabled", false);
            },
        });
    });
});

// update modal
const modal_update = document.querySelector("#update-modal");
modal_update.addEventListener("show.bs.modal", function () {
    const button = event.relatedTarget;

    const id = button.getAttribute("data-bs-id");
    const title = button.getAttribute("data-bs-title");
    const artist = button.getAttribute("data-bs-artist");
    const lyrics = button.getAttribute("data-bs-lyrics"); // Jika diperlukan

    console.log(id, title, artist, lyrics);

    const modal = document.querySelector("#update-modal");
    modal.querySelector("#update-id").value = id;
    modal.querySelector("#update-title").value = title;
    modal.querySelector("#update-artist").value = artist;
    modal.querySelector("#update-lyrics").value = lyrics; // Jika diperlukan
});

// confirm delete
function confirmDelete() {
    return confirm("Apakah Anda yakin ingin menghapus item ini?");
}

function likeClick(btnId) {
    var btn = document.getElementById(btnId);
    var currentCount = parseInt(btn.innerText);

    // Memeriksa apakah kelas text-danger sudah ada
    if (btn.classList.contains("text-danger")) {
        // Jika sudah ada, ganti menjadi text-muted
        btn.classList.remove("text-danger");
        btn.classList.add("text-muted");
        currentCount--;
    } else {
        // Jika belum ada, tambahkan text-danger dan hapus text-muted
        btn.classList.remove("text-muted");
        btn.classList.add("text-danger");
        currentCount++;
    }

    btn.innerHTML = btn.innerHTML.replace(/\d+/, currentCount);
    console.log("like clicked");
}

function clickAuthor() {
    console.log("author clicked");
}

function clickTitle() {
    console.log("title clicked");
}

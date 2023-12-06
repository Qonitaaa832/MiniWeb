function toggleIkon() {
    var iconContainer = document.getElementById("iconContainer");
    if (iconContainer.style.display === "none") {
        iconContainer.style.display = "block";
    } else {
        iconContainer.style.display = "none";
    }
}

// Menambahkan event listener untuk tombol "Tambah"
document.getElementById("tambahButton").addEventListener("click", toggleIkon);


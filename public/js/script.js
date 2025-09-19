// Mendapatkan referensi ke elemen-elemen DOM
const crtform = document.getElementById("crtform");
const addbuttonContainer = document.getElementById("addbuttonContainer");
const addbutton = document.getElementById("addbutton");
const createButton = document.getElementById("crtbutton");
const cancelButton = document.getElementById("cnlbutton");

// Menambahkan event listener ke tombol "Add task"
addbutton.addEventListener("click", function (event) {
  // Mencegah halaman memuat ulang saat link diklik
  event.preventDefault();
  // Menyembunyikan tombol 'Add task'
  addbuttonContainer.classList.add("hidden");
  // Menampilkan form 'Create'
  crtform.classList.remove("hidden");
});

// Menambahkan event listener untuk tombol "Tambah" di dalam form
createButton.addEventListener("click", function (event) {
  // Mencegah form untuk melakukan submit dan memuat ulang halaman
  event.preventDefault();
  // Logika untuk menyimpan data task bisa ditambahkan di sini
  console.log("Tugas baru ditambahkan!");

  // Menyembunyikan form 'Create'
  crtform.classList.add("hidden");
  // Menampilkan kembali tombol 'Add task'
  addbuttonContainer.classList.remove("hidden");
});

// Menambahkan event listener untuk tombol "Batal" di dalam form
cancelButton.addEventListener("click", function (event) {
  // Mencegah form untuk melakukan submit dan memuat ulang halaman
  event.preventDefault();

  // Menyembunyikan form 'Create'
  crtform.classList.add("hidden");
  // Menampilkan kembali tombol 'Add task'
  addbuttonContainer.classList.remove("hidden");
});

/*// DarkMode
const darkToggle = document.querySelector('#dark-toggle');
const html = document.querySelector('html');
const drk = document.querySelector('#drc');
const drf = document.querySelector('#drl');

darkToggle.addEventListener('click', function () {
  if (darkToggle.checked) {
    html.classList.add('dark');
    drk.classList.add('hidden');
    drf.classList.remove('hidden');
  } else {
    html.classList.remove('dark');
    drk.classList.remove('hidden');
    drf.classList.add('hidden');
  }
});*/

function tampilkanOpsi() {
  // Mengambil elemen input
  var inputElement = document.getElementById('form3Example4cd');

  // Mengambil elemen select
  var opsiContainer = document.getElementById('opsiContainer');

  // Mengganti tipe input menjadi hidden
  inputElement.type = 'hidden';

  // Menampilkan opsi container
  opsiContainer.style.display = 'block';
}

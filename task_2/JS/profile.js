const urlParams = new URLSearchParams(window.location.search);
document.getElementById('nama').textContent = urlParams.get('nama') || 'Tidak tersedia';
document.getElementById('email').textContent = urlParams.get('email') || 'Tidak tersedia';
document.getElementById('usia').textContent = urlParams.get('usia') || 'Tidak tersedia';
document.getElementById('pekerjaan').textContent = urlParams.get('pekerjaan') || 'Tidak tersedia';
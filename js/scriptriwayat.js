document.addEventListener('DOMContentLoaded', () => {
    const startBtns = document.querySelectorAll('.btn-order');
    const popupRi = document.querySelector('.popup-riwayat');
    const exitBtn = document.querySelector('.ri-btn');
    const main = document.querySelector('.mainn');

    startBtns.forEach(startBtn => {
        startBtn.addEventListener('click', () => {
            const id = startBtn.getAttribute('data-id');

            fetch(`detail.php?id=${id}`)
                .then(response => response.json())
                .then(data => {
                    if (data.error) {
                        console.error('Error:', data.error);
                        alert(data.error);
                    } else {
                        document.getElementById('info-id').textContent = `Id Transaksi: ${data.id_pesanan}`;
                        document.getElementById('info-name').textContent = `Nama: ${data.name}`;
                        document.getElementById('info-email').textContent = `Email: ${data.email}`;
                        document.getElementById('info-phone').textContent = `No Telepon: ${data.phone_number}`;
                        document.getElementById('info-wisata').textContent = `Nama Wisata: ${data.nama_wisata}`;
                        document.getElementById('info-price').textContent = `Harga Tiket: Rp.${data.harga}`;
                        document.getElementById('info-quantity').textContent = `Jumlah Pembelian: ${data.jumlah} tiket`;
                        document.getElementById('info-total').textContent = `Total Harga: Rp.${data.total}`;
                        document.getElementById('info-payment').textContent = `Metode Pembayaran: ${data.pembayaran}`;
                        document.getElementById('info-date').textContent = `Tanggal Kunjung: ${data.tanggal_kunjung}`;
                        main.classList.add('active');
                        popupRi.classList.add('active');
                    }
                })
                .catch(error => console.error('Error:', error));
        });
    });

    exitBtn.addEventListener('click', () => {
        main.classList.remove('active');
        popupRi.classList.remove('active');
    });
});

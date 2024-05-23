const startBtns = document.querySelectorAll('.start');
const popupInfo = document.querySelector('.popup-login');
const exitBtn = document.querySelector('.exit-btn');
const main = document.querySelector('.mainn');

// Tambahkan event listener ke setiap elemen dengan kelas .start
startBtns.forEach(startBtn => {
    startBtn.onclick = () => {
        main.classList.add('active');
        popupInfo.classList.add('active');
    };
});

exitBtn.onclick = () => {
    main.classList.remove('active');
    popupInfo.classList.remove('active');
};
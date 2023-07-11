import './bootstrap';
// Import file animasi Lottie
// Import file animasi Lottie
import Lottie from 'lottie-web';

// Inisialisasi animasi loading
Lottie.loadAnimation({
    container: document.getElementById('loadingAnimation'),
    renderer: 'svg',
    loop: true,
    autoplay: true,
    path: 'https://assets9.lottiefiles.com/packages/lf20_5ryykfev.json'
});


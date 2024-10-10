import './bootstrap';
import './css/app.css'; // pastikan ini sudah ter-import
import 'animate.css/animate.min.css'; 
import AOS from 'aos';
import 'aos/dist/aos.css';

AOS.init({
    once: true, // Jika ingin animasi hanya berjalan sekali
    duration: 1000, // Durasi animasi (dalam ms)
    delay: 100, // Penundaan animasi (opsional)
});

import './bootstrap';

import AOS from 'aos';
import 'aos/dist/aos.css'; // Увоз AOS стилова

AOS.init({
    // Globalna podešavanja:
    duration: 1000, // Trajanje animacije u milisekundama (1000 = 1 sekunda)
    easing: 'ease-in-out', // Vrsta prelaza/ubrzanja animacije
    once: true, // Da se animacija pokrene samo jednom prilikom skrolovanja
});
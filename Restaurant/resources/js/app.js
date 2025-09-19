import './bootstrap';
import AOS from 'aos';

document.addEventListener('DOMContentLoaded', function() {
    AOS.init({
        duration: 1000, 
        once: true,    
    });
});
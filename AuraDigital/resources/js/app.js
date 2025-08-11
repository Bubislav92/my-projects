import './bootstrap';

import AOS from 'aos';
import 'aos/dist/aos.css'; // Ово је само за случај да CSS није увезен кроз app.css

AOS.init({
  duration: 1200,
  once: true,
});

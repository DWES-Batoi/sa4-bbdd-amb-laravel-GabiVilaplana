import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

window.Echo.channel('futbol-femeni')
    .listen('.PartitActualitzat', (e) => {
        console.log('Cambio en la tabla!', e.delta);
        // Lanzamos un evento global para que la vista de clasificación lo pille
        window.dispatchEvent(new CustomEvent('classificacio-delta', { detail: e.delta }));
    });
    
Alpine.start();

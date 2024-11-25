function updateClock() {
    const now = new Date();
    let hours = now.getHours();
    const minutes = String(now.getMinutes()).padStart(2, '0');
    const seconds = String(now.getSeconds()).padStart(2, '0');
    let ampm = hours >= 12 ? 'PM' : 'AM';  // Determinar AM o PM

    // Convertir horas al formato de 12 horas
    hours = hours % 12;
    hours = hours ? hours : 12;  // Si es 0 (medianoche o mediodía), poner 12

    // Formatear horas a 2 dígitos
    hours = String(hours).padStart(2, '0');

    document.getElementById('hours2').textContent = hours;
    document.getElementById('minutes2').textContent = minutes;
    document.getElementById('seconds2').textContent = seconds;
    document.getElementById('ampm2').textContent = ampm;  // Mostrar AM o PM
}

// Actualiza el reloj cada segundo
setInterval(updateClock, 1000);

// Inicia el reloj inmediatamente
updateClock();
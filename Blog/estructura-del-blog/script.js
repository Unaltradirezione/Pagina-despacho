// Función para mostrar la pestaña activa
function showTab(tabId, event) {
    // Ocultar todas las pestañas
    const contents = document.querySelectorAll('.content');
    contents.forEach(content => content.style.display = 'none');

    // Mostrar la pestaña seleccionada
    document.getElementById(tabId).style.display = 'block';

    // Resaltar la pestaña activa
    const tabs = document.querySelectorAll('.tab');
    tabs.forEach(tab => tab.classList.remove('active'));
    event.currentTarget.classList.add('active');
}

// Función para alternar entre modo claro y oscuro
function toggleDarkMode() {
    document.body.classList.toggle('dark-mode');
    const icon = document.getElementById('darkModeIcon');
    if (document.body.classList.contains('dark-mode')) {
        icon.classList.replace('fa-sun', 'fa-moon'); // Cambia el icono a luna
    } else {
        icon.classList.replace('fa-moon', 'fa-sun'); // Cambia el icono a sol
    }
}


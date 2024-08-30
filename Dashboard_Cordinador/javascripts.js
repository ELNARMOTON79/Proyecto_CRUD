// Script para actualizar la fecha y hora 
    function actualizarFechaHora() {
        const ahora = new Date();

        // Opciones para formatear la fecha en español
        const opcionesFecha = { day: 'numeric', month: 'long' };
        const fechaFormateada = ahora.toLocaleDateString('es-ES', opcionesFecha);

        // Opciones para formatear la hora en formato de 24 horas
        const opcionesHora = { 
            hour: '2-digit', 
            minute: '2-digit', 
            second: '2-digit', 
            hour12: false 
        };
        const horaFormateada = ahora.toLocaleTimeString('es-ES', opcionesHora);

        // Combinar fecha y hora
        const fechaHora = `${fechaFormateada} ${horaFormateada}`;

        // Insertar la fecha y hora en el elemento con id="current-date-time"
        document.getElementById('current-date-time').textContent = fechaHora;
    }

    // Ejecutar la función una vez al cargar la página
    actualizarFechaHora();

    // Actualizar la hora cada segundo
    setInterval(actualizarFechaHora, 1000);



    //Scrip para desplegar la seccion

        document.getElementById("toggleActividades").addEventListener("click", function() {
            var submenu = document.getElementById("submenuActividades");
            submenu.classList.toggle("hidden");
        });
    

    /*
    Scrip para la grafica, se va a cambiar luego cuando 
    tengamos los datos de las personas registradas uotras cosas 
    */

    const labels = ["January", "February", "March", "April", "May", "June"];
    const data = {
        labels: labels,
        datasets: [{
            label: "My First dataset",
            backgroundColor: "hsl(252, 82.9%, 67.8%)",
            borderColor: "hsl(252, 82.9%, 67.8%)",
            data: [0, 10, 5, 2, 20, 30, 45],
        }, ],
    };

    const configLineChart = {
        type: "line",
        data,
        options: {},
    };

    var chartLine = new Chart(
        document.getElementById("chartLine"),
        configLineChart
    );



    const dataRadar = {
        labels: [
        "Reservation 1",
        "Reservation 2",
        "Reservation 3",
        "Reservation 4",
        "Reservation 5",
        "Reservation 6",
        "Reservation 7",
        ],
        datasets: [{
            label: "My First Dataset",
            data: [65, 59, 90, 81, 56, 55, 40],
            fill: true,
            backgroundColor: "rgba(255,105,180)",
            borderColor: "rgb(255,20,147)",
            pointBackgroundColor: "rgb(133, 105, 241)",
            pointBorderColor: "#fff",
            pointHoverBackgroundColor: "#fff",
            pointHoverBorderColor: "rgb(133, 105, 241)",
        },
        {
            label: "My Second Dataset",
            data: [28, 48, 40, 19, 96, 27, 100],
            fill: true,
            backgroundColor: "rgba(255,105,180)",
            borderColor: "rgb(0,191,255)",
            pointBackgroundColor: "rgb(54, 162, 235)",
            pointBorderColor: "#fff",
            pointHoverBackgroundColor: "#fff",
            pointHoverBorderColor: "rgb(54, 162, 235)",
        },
        ],
    };

    const configRadarChart = {
        type: "radar",
        data: dataRadar,
        options: {},
    };

    var chartBar = new Chart(
        document.getElementById("chartRadar"),
        configRadarChart
    );
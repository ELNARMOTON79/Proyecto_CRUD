document.addEventListener("DOMContentLoaded", function () {
  // Toggle Usuarios
  document.getElementById("toggleUsuarios").addEventListener("click", function () {
    var submenu = document.getElementById("submenu");
    var icon = document.getElementById("iconUsuarios");
    submenu.classList.toggle("hidden");
    if (submenu.classList.contains("hidden")) {
      icon.innerHTML = '<i class="fa fa-plus"></i>';
    } else {
      icon.innerHTML = '<i class="fa fa-minus"></i>';
    }
  });

  // Toggle Actividades
  document.getElementById("toggleActividades").addEventListener("click", function () {
    var submenu = document.getElementById("submenuActividades");
    var icon = document.getElementById("iconActividades");
    submenu.classList.toggle("hidden");
    if (submenu.classList.contains("hidden")) {
      icon.innerHTML = '<i class="fa fa-plus"></i>';
    } else {
      icon.innerHTML = '<i class="fa fa-minus"></i>';
    }
  });

  // Toggle Materias
  document.getElementById("toggleMaterias").addEventListener("click", function () {
    var submenu = document.getElementById("submenuMaterias");
    var icon = document.getElementById("iconMaterias");
    submenu.classList.toggle("hidden");
    if (submenu.classList.contains("hidden")) {
      icon.innerHTML = '<i class="fa fa-plus"></i>';
    } else {
      icon.innerHTML = '<i class="fa fa-minus"></i>';
    }
  });

  // Toggle Resources
  document.getElementById("toggleResources").addEventListener("click", function () {
    var submenu = document.getElementById("submenuResources");
    var icon = document.getElementById("iconResources");
    submenu.classList.toggle("hidden");
    if (submenu.classList.contains("hidden")) {
      icon.innerHTML = '<i class="fa fa-plus"></i>';
    } else {
      icon.innerHTML = '<i class="fa fa-minus"></i>';
    }
  });
});

// Configuración original del gráfico de línea
const originalLabels = ["January", "February", "March", "April", "May", "June"];
const originalData = {
  labels: originalLabels,
  datasets: [
    {
      label: "My First dataset",
      backgroundColor: "hsl(252, 82.9%, 67.8%)",
      borderColor: "hsl(252, 82.9%, 67.8%)",
      data: [0, 10, 5, 2, 20, 30, 45],
    },
  ],
};

const originalConfigLineChart = {
  type: "line",
  data: originalData,
  options: {},
};

var originalChartLine = new Chart(
  document.getElementById("chartLine"),
  originalConfigLineChart
);

// Configuración original del gráfico de radar
const originalDataRadar = {
  labels: [
    "Reservation 1",
    "Reservation 2",
    "Reservation 3",
    "Reservation 4",
    "Reservation 5",
    "Reservation 6",
    "Reservation 7",
  ],
  datasets: [
    {
      label: "My First Dataset",
      data: [65, 59, 90, 81, 56, 55, 40],
      fill: true,
      backgroundColor: "rgba(255,105,180,0.5)",
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
      backgroundColor: "rgba(0,191,255,0.5)",
      borderColor: "rgb(0,191,255)",
      pointBackgroundColor: "rgb(54, 162, 235)",
      pointBorderColor: "#fff",
      pointHoverBackgroundColor: "#fff",
      pointHoverBorderColor: "rgb(54, 162, 235)",
    },
  ],
};

const originalConfigRadarChart = {
  type: "radar",
  data: originalDataRadar,
  options: {},
};

var originalChartRadar = new Chart(
  document.getElementById("chartRadar"),
  originalConfigRadarChart
);


    // Configuración del nuevo gráfico de línea (Donaciones en un transcurso de 6 meses)
const newLabels = ["January", "February", "March", "April", "May", "June"];
const newDataLineChart = {
  labels: newLabels,
  datasets: [
    {
      label: "Donaciones en los últimos 6 meses",
      backgroundColor: "hsl(252, 82.9%, 67.8%)",
      borderColor: "hsl(252, 82.9%, 67.8%)",
      data: [15, 25, 35, 45, 30, 60], // Datos de ejemplo
    },
  ],
};

const newConfigLineChart = {
  type: "line",
  data: newDataLineChart,
  options: {
    responsive: true,
    plugins: {
      legend: {
        position: 'top',
      },
      title: {
        display: true,
        text: 'Donaciones en un transcurso de 6 meses'
      }
    }
  },
};

var newChartLine = new Chart(
  document.getElementById("newChartLine"),
  newConfigLineChart
);

// Configuración del gráfico de dona con transacciones relacionadas con dinero
const donutData = {
  labels: [
    "Compras",
    "Ventas",
    "Donaciones",
    "Pagos de servicios",
    "Reembolsos",
    "Intereses ganados",
    "Tarifas de transacción",
  ],
  datasets: [
    {
      label: "Transacciones Monetarias",
      data: [1200, 1500, 800, 1000, 400, 300, 200], // Ejemplos de montos en dinero
      backgroundColor: [
        "rgba(75, 192, 192, 0.5)",
        "rgba(255, 159, 64, 0.5)",
        "rgba(153, 102, 255, 0.5)",
        "rgba(255, 206, 86, 0.5)",
        "rgba(54, 162, 235, 0.5)",
        "rgba(255, 105, 180, 0.5)",
        "rgba(0, 191, 255, 0.5)",
      ],
      borderColor: [
        "rgb(75, 192, 192)",
        "rgb(255, 159, 64)",
        "rgb(153, 102, 255)",
        "rgb(255, 206, 86)",
        "rgb(54, 162, 235)",
        "rgb(255, 105, 180)",
        "rgb(0, 191, 255)",
      ],
      borderWidth: 1,
    },
  ],
};

const donutConfig = {
  type: "doughnut",
  data: donutData,
  options: {
    responsive: true,
    plugins: {
      legend: {
        position: "top",
      },
      tooltip: {
        enabled: true,
      },
    },
  },
};

// Crear el gráfico de dona
var donutChart = new Chart(
  document.getElementById("donutChart"), // El ID del canvas sigue siendo el mismo
  donutConfig
);


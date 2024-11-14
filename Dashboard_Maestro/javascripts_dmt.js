document.addEventListener("DOMContentLoaded", function () {
  // Toggle Usuarios
  document.getElementById("toggleUsuarios").addEventListener("click", function () {
      var submenu = document.getElementById("submenu");
      var icon = document.getElementById("iconUsuarios");
      submenu.classList.toggle("hidden");
      // Cambiar el símbolo según el estado del menú
      if (submenu.classList.contains("hidden")) {
            icon.innerHTML = '<i class="fa fa-minus"></i>';
      } else {
          
      }
  });

  // Toggle Actividades
  document.getElementById("toggleActividades").addEventListener("click", function () {
      var submenu = document.getElementById("submenuActividades");
      var icon = document.getElementById("iconActividades");
      submenu.classList.toggle("hidden");
      // Cambiar el símbolo según el estado del menú
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
      // Cambiar el símbolo según el estado del menú
      if (submenu.classList.contains("hidden")) {
          icon.innerHTML = '<i class="fa fa-plus"></i>';
      } else {
          icon.innerHTML = '<i class="fa fa-minus"></i>';
      }
  });

  // Gráfica de Barras
  const ctxBar = document.getElementById('miGrafica').getContext('2d');
  const miGrafica = new Chart(ctxBar, {
      type: 'bar',
      data: {
          labels: ['1er Año', '2do Año', '3er Año'], // Eje X
          datasets: [{
              label: 'Cantidad',
              data: [35, 15, 25], // Datos para cada categoría
              backgroundColor: [
                  'rgba(75, 192, 192, 0.6)',
                  'rgba(153, 102, 255, 0.6)',
                  'rgba(255, 159, 64, 0.6)'
              ],
              borderColor: [
                  'rgba(75, 192, 192, 1)',
                  'rgba(153, 102, 255, 1)',
                  'rgba(255, 159, 64, 1)'
              ],
              borderWidth: 2
          }]
      },
      options: {
          scales: {
              y: {
                  beginAtZero: true,
                  max: 40, // Máximo valor en Y
                  ticks: {
                      stepSize: 5 // Intervalo en Y
                  }
              }
          },
          responsive: true,
          plugins: {
              legend: {
                  position: 'top',
              },
              title: {
                  display: true,
                  text: 'Distribución de Alumnos por año'
              }
          }
      }
  });
});

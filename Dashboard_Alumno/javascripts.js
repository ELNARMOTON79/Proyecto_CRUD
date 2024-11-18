document.addEventListener("DOMContentLoaded", function () {
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

  document.getElementById("toggleCalificaciones").addEventListener("click", function () {
    var submenu = document.getElementById("submenuCalificaciones");
    var icon = document.getElementById("iconCalificaciones");
    submenu.classList.toggle("hidden");
    // Cambiar el símbolo según el estado del menú
    if (submenu.classList.contains("hidden")) {
      icon.innerHTML = '<i class="fa fa-plus"></i>';
    } else {
      icon.innerHTML = '<i class="fa fa-minus"></i>';
    }
  });
});

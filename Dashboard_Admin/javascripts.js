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

  // Toggle Noticias
  document.getElementById("togglenoticias").addEventListener("click", function () {
    var submenu = document.getElementById("submenunoticias");
    var icon = document.getElementById("iconNoticias"); // Cambiado a iconNoticias
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
    if (submenu.classList.contains("hidden")) {
      icon.innerHTML = '<i class="fa fa-plus"></i>';
    } else {
      icon.innerHTML = '<i class="fa fa-minus"></i>';
    }
  });
});


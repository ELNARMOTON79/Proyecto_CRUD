<div class="flex-auto ml-64">
    <div class="flex flex-col">
        <div class="flex items-center bg-white p-4 space-x-4">
            <!-- Imagen del usuario -->
            <div class="flex-shrink-0 h-16 w-16 relative">
                <img class="h-full w-full rounded-full" src="https://cdn.icon-icons.com/icons2/2104/PNG/512/manager_icon_129392.png" alt="User Avatar">
            </div>
            <!-- Contenedor de bienvenida y correo -->
            <div class="flex flex-col justify-center">
                <!-- Mensaje de bienvenida -->
                <h4 class="text-lg font-bold text-gray-500">
                    Welcome, <?php echo htmlspecialchars($_SESSION['nombre']); ?>
                </h4>
                <!-- Correo del usuario -->
                <div class="text-sm text-gray-500">
                    <?php echo $_SESSION['correo']; ?>
                </div>
            </div>
        </div>
        
        <div class="min-h-screen bg-blue-50">
            <!-- Contenedor para centrar la tarjeta -->
            <div class="mt-8 flex justify-center p-2">
                <!-- Tarjeta de Total Students -->
                <div class="flex items-center bg-white rounded shadow-sm justify-between p-5 w-64">
                    <div class="text-sm text-gray-400">
                        Total Students
                        <div class="text-3xl font-medium text-gray-600 p-1">
                            <?php echo total_estudiantes(); ?>
                        </div>
                    </div>
                    <div class="text-pink-500">
                        <i class="fa-solid fa-user-graduate fa-2x"></i>
                    </div>
                </div>
            </div>

            <!-- Gráfica -->
            <div class="mt-8">
                <div class="max-w-3xl mx-auto bg-white shadow-md rounded-lg p-6">
                    <canvas id="myChart" class="w-full"></canvas>
                </div>
            </div>
            <?php
                $id = $_SESSION['id'];
                $contacto = new Contacto();
                $result = $contacto->total_aprobados($id);

                // Preparar los datos para Chart.js
                $labels = [];
                $data = [];
                
                while($row = $result->fetch_assoc()) {
                    $labels[] = $row['estado'];
                    $data[] = $row['total'];
                }
            ?>
        </div>
    </div>
</div>
<script>
    // Convertir los arrays PHP a JavaScript
    const labels = <?php echo json_encode($labels); ?>;
    const data = <?php echo json_encode($data); ?>;

    // Configurar la gráfica
    const ctx = document.getElementById('myChart');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Cantidad de Estudiantes',
                data: data,
                backgroundColor: [
                    'rgba(38, 166, 91, 0.8)', // Verde para aprobados
                    'rgba(239, 83, 80, 0.8)'  // Rojo pastel para reprobados
                ],
                borderColor: [
                    'rgba(38, 166, 91, 1)',
                    'rgba(239, 83, 80, 1)'
                ],
                borderWidth: 1,
                borderRadius: 10, // Bordes redondeados en las barras
                barPercentage: 0.6 // Ancho de las barras
            }]
        },
        options: {
            responsive: true,
            plugins: {
                title: {
                    display: true,
                    text: 'Distribución de Estudiantes Aprobados y Reprobados',
                    color: '#4b5563', // Texto gris oscuro
                    font: {
                        size: 16,
                        weight: 'bold',
                        family: 'Arial, sans-serif'
                    },
                    padding: {
                        top: 10,
                        bottom: 20
                    }
                },
                legend: {
                    display: true,
                    position: 'bottom',
                    labels: {
                        color: '#4b5563', // Texto gris oscuro
                        font: {
                            size: 12,
                            family: 'Arial, sans-serif'
                        }
                    }
                }
            },
            scales: {
                x: {
                    beginAtZero: true,
                    ticks: {
                        color: '#4b5563', // Texto gris oscuro
                        font: {
                            size: 12
                        }
                    },
                    grid: {
                        display: false // Eliminar líneas del eje X
                    }
                },
                y: {
                    beginAtZero: true,
                    ticks: {
                        color: '#4b5563',
                        font: {
                            size: 12
                        }
                    },
                    grid: {
                        color: 'rgba(200, 200, 200, 0.3)' // Líneas suaves en Y
                    }
                }
            }
        }
    });
</script>
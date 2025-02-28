<?php
require_once '../Conexion/contacto.php'; 

$id = $_SESSION['id'];
$contacto = new Contacto();
$id = $_SESSION['id'];
$result = $contacto->totalusuarios();

$data = 0;
if ($row = $result->fetch_assoc()) {
    $data = $row['total_usuarios']; // Tomar el total directamente
}
?>
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
            <div class="mt-8 grid gap-10 lg:grid-cols-3 sm:grid-cols-2 p-4">
                <!-- El panel inicia aqui -->
                <div class="flex items-center bg-white rounded shadow-sm justify-between p-5">
                    <div class="text-sm text-gray-400">
                        Total number of teachers
                        <div class="text-3xl font-medium text-gray-600 p-1">
                            <?php echo total_maestros(); ?>
                        </div>
                    </div>
                    <div class="text-pink-500">
                        <i class="fa-solid fa-user-tie fa-2x"></i>
                    </div>
                </div>
                <div class="flex items-center bg-white rounded shadow-sm justify-between p-5">
                    <div class="text-sm text-gray-400">
                        Total number of students
                        <div class="text-3xl font-medium text-gray-600 p-1">
                            <?php echo total_estudiantes(); ?>
                        </div>
                    </div>
                    <div class="text-pink-500">
                        <i class="fa-solid fa-user-graduate fa-2x"></i>
                    </div>
                </div>
                <div class="flex items-center bg-white rounded shadow-sm justify-between p-5">
                    <div class="text-sm text-gray-400">
                        Total number of donors
                        <div class="text-3xl font-medium text-gray-600 p-1">
                            <?php echo total_donadores(); ?>
                        </div>
                    </div>
                    <div class="text-pink-500">
                        <i class="fa-solid fa-coins fa-2x"></i>
                    </div>
                </div>
            </div>
            <!-- Otro va a iniciar aqui -->
            <div class="mt-5 grid lg:grid-cols-3 md:grid-cols-3 p-4 gap-3">
                <div class="col-span-2 bg-white p-8 flex-col rounded shadow-sm">
                    <canvas id="myChart" class="w-full"></canvas>
                </div>
                <div class="flex flex-col p-8 bg-white rounded shadow-sm">
                    <div class="flex flex-row text-gray-500">
                        Historial de donaciones
                        <div><i class="fa-solid fa-clock-rotate-left p-1"></i></div>
                    </div>
                    <table class="w-full mt-3 text-left">
                        <thead>
                            <tr>
                                <th class="border-b p-2 text-gray-600">Monto</th>
                                <th class="border-b p-2 text-gray-600">Motivo</th>
                                <th class="border-b p-2 text-gray-600">Fecha</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $donaciones = historial_donaciones(5); 
                            foreach ($donaciones as $donacion): ?>
                                <tr>
                                    <td class="border-b p-2 text-gray-800"><?php echo number_format($donacion['monto'], 2); ?></td>
                                    <td class="border-b p-2 text-gray-800"><?php echo htmlspecialchars($donacion['motivo']); ?></td>
                                    <td class="border-b p-2 text-gray-800"><?php echo htmlspecialchars($donacion['fecha_don']); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    const data = [<?php echo json_encode($data); ?>];

const ctx = document.getElementById('myChart').getContext('2d');
new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Total Users'],
        datasets: [{
            label: 'Users',
            data: data,
            backgroundColor: [
                'rgba(54, 162, 235, 0.8)',
                'rgba(255, 99, 132, 0.8)',
                'rgba(255, 206, 86, 0.8)',
            ],
            borderColor: [
                'rgba(54, 162, 235, 1)',
                'rgba(255, 99, 132, 1)',
                'rgba(255, 206, 86, 1)',
            ],
            borderWidth: 2,
            borderRadius: 10,
            hoverBackgroundColor: 'rgba(75, 192, 192, 0.9)'
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            title: {
                display: true,
                text: 'Total Users',
                color: '#4b5563',
                font: {
                    size: 20,
                    weight: 'bold'
                },
                padding: {
                    top: 10,
                    bottom: 30
                }
            },
            legend: {
                display: true,
                labels: {
                    color: '#374151',
                    font: {
                        size: 14
                    }
                }
            }
        },
        scales: {
            x: {
                grid: {
                    display: false
                },
                ticks: {
                    color: '#4b5563',
                    font: {
                        size: 14
                    }
                }
            },
            y: {
                beginAtZero: true,
                grid: {
                    color: 'rgba(200, 200, 200, 0.2)'
                },
                ticks: {
                    color: '#4b5563',
                    font: {
                        size: 14
                    }
                }
            }
        }
    }
});
</script>
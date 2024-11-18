<?php
require_once '../Conexion/contacto.php'; 

$id = $_SESSION['id'];
$contacto = new Contacto();
$result = $contacto->listaractividadesxalumnos($id);

$data = 0;
if ($row = $result->fetch_assoc()) {
    $data = $row['total_actividades']; // Tomar el total directamente
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
                <!-- Correo dell usuario -->
                <div class="text-sm text-gray-500">
                    <?php echo $_SESSION['correo']; ?>
                </div>
            </div>
        </div>
        <div class="min-h-screen bg-blue-50">
            <!-- Gráfica -->
            <div class="mt-8">
                <div class="max-w-3xl mx-auto bg-white shadow-md rounded-lg p-6">
                    <canvas id="myChart" class="w-full"></canvas>
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
        labels: ['Total Activities'],
        datasets: [{
            label: 'Activities',
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
                text: 'Total Activities',
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
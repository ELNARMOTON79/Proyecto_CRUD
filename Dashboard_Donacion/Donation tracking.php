<?php
require_once("../Conexion/contacto.php");
$obj= new Contacto();
$resultado =$obj->obtenerPorDonaciones();
?> 
<div class="max-w-4xl mx-auto bg-white p-8 rounded-lg shadow-lg">
    <h1 class="text-2xl font-bold mb-6 text-green-600">List donation</h1>
    
    <table class="min-w-full table-auto border-collapse border border-gray-300 rounded-lg overflow-hidden shadow">
        <thead>
            <tr class="bg-green-600 text-white">
                <th class="px-6 py-3 text-left">Amount</th>
                <th class="px-6 py-3 text-left">Reason</th>
                <th class="px-6 py-3 text-left">Donation date</th> 
            </tr>
        </thead>
        <tbody>
            <?php while ($registro = $resultado->fetch_assoc()): ?>
                <tr class="even:bg-gray-100 hover:bg-gray-200">
                    <td class="px-6 py-4"><?php echo htmlspecialchars($registro["monto"]); ?></td>
                    <td class="px-6 py-4"><?php echo htmlspecialchars($registro["motivo"]); ?></td>
                    <td class="px-6 py-4"><?php echo htmlspecialchars($registro["fecha_don"]); ?></td> 
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

</div>

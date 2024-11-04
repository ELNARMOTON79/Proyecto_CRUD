<div class="bg-white p-8 rounded-lg shadow-lg max-w-4xl mx-auto mt-10">
<script src="https://cdn.tiny.cloud/1/x4b91kvixh7fmccnyfjphsxtknbb4avtj26jad4uje896w2w/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>

<!-- Place the following <script> and <textarea> tags your HTML's <body> -->
<script>
  tinymce.init({
    selector: 'textarea',
    plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
    toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
  });
</script>
                <h2 class="text-2xl font-bold mb-6 text-primary">Create New Post</h2>
                <form method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
                    <div class="mb-4">
                        <label for="titulo" class="block text-primary font-bold mb-2">Tittle</label>
                        <input type="text" id="titulo" name="titulo" class="shadow appearance-none border rounded w-full py-2 px-3 text-primary leading-tight focus:outline-none focus:shadow-outline" required>
                    </div>
                    <div class="mb-4">
                        <label for="contenido" class="block text-primary font-bold mb-2">Content</label>
                        <textarea id="contenido" name="contenido" class="shadow appearance-none border rounded w-full py-2 px-3 text-primary leading-tight focus:outline-none focus:shadow-outline h-40"></textarea>
                    </div>
                    <div class="mb-6">
                        <label for="imagen" class="block text-primary font-bold mb-2">Image</label>
                        <input type="file" id="imagen" name="imagen" class="shadow appearance-none border rounded w-full py-2 px-3 text-primary leading-tight focus:outline-none focus:shadow-outline">
                    </div>
                    <div class="flex items-center justify-between">
                        <button type="submit" name="crear_post" class="bg-primary hover:bg-primary-dark text-black font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Create Post
                        </button>
                    </div>
                </form>
            </div>

            <script>
                function validateForm() {
                    // Sincroniza el contenido del editor TinyMCE con el textarea
                    tinymce.get('contenido').save();
                    console.log('Contenido sincronizado:', tinymce.get('contenido').getContent());

                    // Valida que el contenido no esté vacío
                    var contenidoTextarea = document.getElementById('contenido');
                    if (!contenidoTextarea.value.trim()) {
                        alert('El campo de contenido no puede estar vacío.');
                        return false; // Evita que el formulario se envíe
                    }

                    return true; // Permite que el formulario se envíe
                }
            </script>

            <?php
                if(isset($_POST["crear_post"])) {
                    $titulo = $_POST['titulo'];
                    $contenido = $_POST['contenido'];
                    $imagen = $_FILES['imagen']['name'];
                    $date = date("Y-m-d");

                    $ruta = "../SRC/".$imagen;
                    move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta);

                    $contacto = new Contacto();
                    $contacto->crearnews($titulo, $contenido, $imagen, $date);
                    echo "<div id='succeess-message' class='bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mt-4' role='alert'>News created successfully</div>";
                }
            ?>
            <script>
                    // Desaparece el mensaje después de 5 segundos
                    setTimeout(function() {
                        var successMessage = document.getElementById('success-message');
                        if (successMessage) {
                            successMessage.style.display = 'none';
                        }
                    }, 5000);
                </script>
   
    
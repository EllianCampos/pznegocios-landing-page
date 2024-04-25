<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nombre = $_POST["nombre"];
  $correo = $_POST["correo"];
  $telefono = $_POST["telefono"];
  $medioPreferido = $_POST["medioPreferido"];

  $pregunta1 = $_POST["pregunta1"];
  $pregunta2 = $_POST["pregunta2"];
  $pregunta3 = $_POST["pregunta3"];
  $pregunta4 = $_POST["pregunta4"];
  $pregunta5 = $_POST["pregunta5"];
  $pregunta6 = $_POST["pregunta6"];
  $pregunta7 = $_POST["pregunta7"];
  $pregunta8 = $_POST["pregunta8"];
  $pregunta9 = $_POST["pregunta9"];
  $pregunta10 = $_POST["pregunta10"];
  $pregunta11 = $_POST["pregunta11"];

  $info = "
    <b>Nombre:</b> $pregunta1 
    <br><br>  
    <b>Correo:</b> $pregunta2 
    <br><br> 
    <b>Teléfono:</b> $pregunta3 
    <br><br>
    <b>Medio preferido:</b> $pregunta4 
    <hr><br>
    <b>pregunta5:</b> $pregunta5 
    <br><br>
    <b>pregunta6:</b> $pregunta6 
    <br><br>
    <b>pregunta7:</b> $pregunta7 
    <br><br>
    <b>pregunta8:</b> $pregunta8 
    <br><br>
    <b>pregunta9:</b> $pregunta9 
    <br><br>
    <b>pregunta10:</b> $pregunta10 
    <br><br>
    <b>pregunta11:</b> $pregunta11
  ";

  // Enviar correo
  $data = array("content" => $info);
  $jsonData = json_encode($data);

  // Configurar la solicitud POST con los datos JSON
  $options = array(
    'http' => array(
      'header'  => "Content-type: application/json\r\n",
      'method'  => 'POST',
      'content' => $jsonData
    )
  );
  $context  = stream_context_create($options);
  require "config.php";
  $result = file_get_contents($emailsUrl, false, $context);


  // Guardar info en db
  require "db.php";
  $query = $conn->prepare("INSERT INTO Solicitudes (info) VALUES (:info)");
  $query->bindParam(":info", $info);
  $query->execute();

  echo '<script>window.location.href = "gracias.php";</script>';
}

?>

<?php require "partials/header.php" ?>

<div class="container text-center mt-2">
  <a href="./" class="btn btn-primary ">Volver</a>
</div>

<h1 class="text-center mt-4">Formulario de Contacto</h1>

<section class="container my-5">
  <form action="contacto.php" method="POST" id="formContacto">
    <!-- Seccion 1 -->
    <h2>Información del solicitante</h2>
    <div class="mt-3">
      <label for="pregunta1"><span class="fw-bold">Pregunta #1. </span>Nombre Completo</label>
      <input type="text" name="pregunta1" id="pregunta1" class="form-control" required>
    </div>
    <div class="mt-3">
      <label for="pregunta2"><span class="fw-bold">Pregunta #2. </span>Correo electrónico</label>
      <input type="text" name="pregunta2" id="pregunta2" class="form-control" required>
    </div>
    <div class="mt-3">
      <label for="pregunta3"><span class="fw-bold">Pregunta #3. </span>Teléfono</label>
      <input type="text" name="pregunta3" id="pregunta3" class="form-control" required>
    </div>
    <div class="mt-3">
      <label for="pregunta4"><span class="fw-bold">Pregunta #4. </span>Indica por cual medio prefieres que te contactemos</label>
      <textarea name="pregunta4" id="pregunta4" rows="1" class="form-control" placeholder="Ej. Por WhatsApp y correo eletrónico"></textarea>
    </div>

    <!-- Seccion 2 -->
    <h2 class=" text-center mt-5">Acerca de cuál es la necesidad del software</h2>
    <div class="mt-3">
      <label for="pregunta5"><span class="fw-bold">Pregunta #5. </span>¿Cuál es la actividad o actividades que realiza la empresa?</label>
      <textarea name="pregunta5" id="pregunta5" rows="3" class="form-control" placeholder="Ej. Es un minisuper"></textarea>
    </div>
    <div class="mt-3">
      <label for="pregunta6"><span class="fw-bold">Pregunta #6. </span>Si lo cree conveniente indique como se llama la empresa</label>
      <textarea name="pregunta6" id="pregunta6" rows="1" class="form-control" placeholder="Ej. Minisúper San Isidro"></textarea>
    </div>
    <div class="mt-3">
      <label for="pregunta7"><span class="fw-bold">Pregunta #7. </span>¿Cuál es el propósito principal del software? </label>
      <textarea name="pregunta7" id="pregunta7" rows="3" class="form-control" placeholder="Ej. Permitir la facturación de producto y generar reportes de ventas"></textarea>
    </div>
    <div class="mt-3">
      <label for="pregunta8"><span class="fw-bold">Pregunta #8.</span> ¿Por favor indique si hay algún proceso en específico que espera que el software agilice o simplifique? </label>
      <textarea name="pregunta8" id="pregunta8" rows="3" class="form-control" placeholder="Ej. Llevar un control de las ventas y el inventario"></textarea>
    </div>
    <div class="mt-3">
      <label for="pregunta9"><span class="fw-bold">Pregunta #9. </span> Si ya tiene una idea de lo que desea en este espacio puede especificarlo</label>
      <textarea name="pregunta9" id="pregunta9" rows="3" class="form-control" placeholder="Ej. Quiero un sistema de facturación que permita tener varias cajas cobradoras y me permita a mi como dueño acceder a un reporte completo de las ventas"></textarea>
    </div>
    <div class="mt-3">
      <label for="pregunta10"><span class="fw-bold">Pregunta #10. </span>¿El software será utilizado en una computadora en específico o se espera que varios usuarios tengan acceso al mismo?</label>
      <textarea name="pregunta10" id="pregunta10" rows="3" class="form-control" placeholder="Ej. Debe ser accedido por varias personas"></textarea>
    </div>
    <div class="mt-3">
      <label for="pregunta11"><span class="fw-bold">Pregunta #11. </span>¿Hay algo más que quiera que sepamos sobre su proyecto?</label>
      <textarea name="pregunta11" id="pregunta11" rows="3" class="form-control"></textarea>
    </div>

    <!-- Btn Enviar -->
    <div class="mt-5 d-flex justify-content-center ">
      <input type="submit" value="Enviar" class="btn btn-success">
    </div>
  </form>
</section>

<?php require "partials/footer.php" ?>
<?php require "partials/header.php" ?>

<section id="inicio" class="container d-flex align-items-center ">
    <div>
        <p class="display-6 ">Bienvenidos a <span class="fw-bold text-primary ">pznegocios.com</span></p>
        <p>Desarrollo de Software a la medida para tu empresa u empremdimiento</p>
    </div>
</section>

<section id="productos" class="container-fluid bg-light py-5">
    <div class="container">
        <h2 class="text-center my-3">Nuestros Productos</h2>
        <div class="row d-flex justify-content-center ">
            <?php
            $proyectos = json_decode(file_get_contents("proyectos.json"), true);
            foreach ($proyectos as $proyecto) :
            ?>
                <div class="col-12 col-md-6 col-lg-4 mt-2">
                    <div class="border border-2 border-success rounded-3 p-3">
                        <h3 class="text-center"><?= $proyecto["nombre"] ?></h3>
                        <p><?= $proyecto["descripcion"] ?></p>
                        <a href="<?= $proyecto["link"] ?>" target="_blank">
                            <?= $proyecto["link"] != ""
                                ? $proyecto["link"]
                                : "<span class='btn btn-outline-warning'>Próximamente</span>"
                            ?>
                        </a>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</section>

<section id="contacto" class="container py-5">
    <!-- <h2 class="text-center my-3">Contacto</h2>

    <form action="" method="post">
        <div class="row g-0">
            <div class="col-6 form-floating p-1">
                <input type="text" name="nombre" class="form-control">
                <label>Nombre</label>
            </div>
            <div class="col-6 form-floating p-1">
                <input type="text" name="correo" class="form-control">
                <label>Correo eletrónico</label>
            </div>
        </div>
        <div class="col-12 form-floating p-1">
            <input type="text" name="asunto" class="form-control">
            <label>Asunto</label>
        </div>
        <div class="form-floatingx p-1">
            <textarea name="mensaje" rows="5" class="form-control" placeholder="Escribe tu mensaje..."></textarea>
        </div>
        <div class="text-center mt-1">
            <input type="submit" value="Enviar" class="btn btn-success">
        </div>
    </form>

    <span class="text-center text-danger d-block mt-5">O mejor aún</span> -->
    <h2 class="text-center">¿Buscas un producto personalizado?</h2>
    <p class="text-center">Si requieres un software a la medida. No dudes en llenar el formulario de contacto y estaremos encantados de ayudarte.</p>
    <div class="text-center">
        <a href="contacto.php" class="btn btn-info mt-3">Formulario</a>
    </div>
</section>




<?php require "partials/footer.php" ?>
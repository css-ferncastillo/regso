<div class="text-center">
    <h1 class="display-1 text-secondary" > <?php echo $code ?> </h1>
    <p class="lead text-muted mb-5">Pagina no Encontrada</p>
    <p class="text-gray-500 mb-0"><?php echo $mensaje ?></p>
    <hr>
    <pre>
      Ruta del error: <?php trim($ruta, '\n.') ?> <br>
      Error encontrado en <?php echo $file, ' en la linea: ', $line ?>
   </pre>
    <b> <?php echo "PHP ", PHP_VERSION, "(", PHP_OS, ")" ?></b>
    <br>
    <a href="<?php echo APP_URI; ?>">&larr; Volver a inicio</a>
</div>
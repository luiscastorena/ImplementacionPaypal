<?php
include 'global/config.php';
include 'global/conexion.php';
include 'carrito.php';
include 'templates/cabecera.php'
?>



    <div class="container">
        <br>
        <?php if($mensaje!=""){?>
        <div class="alert alert-success">
            <?php
                print ($mensaje);
            ?>
            <a href="VistaCarrito.php" class="badge badge-success"> Ver Carrito</a>
        </div>
        <?php }?>

        <?php
        $sentencia = $pdo->prepare("SELECT * FROM `libros`");
        $sentencia->execute();
        $listaProductos = $sentencia->fetchAll(PDO::FETCH_ASSOC);
        ?>
        <div class="card-deck">
            <?php foreach ($listaProductos as $producto) { ?>

                <div class="col-3">
                    <div class="card">
                        <img title="Descripción" class="EstilosImagen card-img-top" alt="AltImagen" src="<?php echo $producto['Imagen']; ?>" 
                        data-toggle="popover" 
                        data-trigger="hover"
                        height="320px"
                        data-content="<?php echo $producto['Descripción']; ?>">
                        
                    </div>
                    <div class="card-body">
                        <span> <?php echo $producto['Nombre']; ?></span>
                        <br>
                        <h5 class="card-title">$ <?php echo number_format($producto['Precio'],2); ?> MXN</h5>
                        <br>

                    </div>
                    <form action="" method="post" style="text-align: center;">
                        <input type="hidden" name="id" id="id" value="<?php echo $producto['ID'];?>" > 
                        <input type="hidden" name="nombre" id="nombre" value="<?php echo $producto['Nombre'];?>">
                        <input type="hidden" name="precio" id="precio" value="<?php echo $producto['Precio']; ?>">
                        <input type="hidden" name="cantidad" id="cantidad" value="<?php echo 1; ?>">

                        <button class="btn btn-primary"
                                name ="btnAccion"
                                value="Agregar"
                                type="submit">
                                Agregar al Carrito
                        </button>
                    </form>


                </div>
                <br>
            <?php } ?>
        </div>

    </div>

    <script>
        $(function() {
            $('[data-toggle="popover"]').popover()
        });
    </script>
</body>
<?php

include 'templates/pie.php'
?>
</html>
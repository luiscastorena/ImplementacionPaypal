<?php
include 'global/config.php';
include 'carrito.php';
include 'templates/cabecera.php';
?>


<br>
<br>
<?php if(!empty($_SESSION['CARRITO'])){?>
    <style> .CarritoEstilos{
    border: cadetblue 1px solid;
    margin: auto;
    }
</style>
<table class="table table-light table-bordered text-center CarritoEstilos" style="width: 80%;">
    <tbody >
        <tr>
            <th style="width: 40%; border: black 3px solid;" >Descripción</th>
            <th style="width: 15%; border: black 3px solid;">Cantidad</th>
            <th style="width: 20%; border: black 3px solid;">Precio</th>
            <th style="width: 20%; border: black 3px solid;">Total</th>
            <th style="width: 5%; border: black 3px solid;"> --</th>
        </tr>
        <?php $total=0;?>
        <?php
            foreach($_SESSION['CARRITO'] as $i=>$producto){


         ?>
        <tr>
            <td style="width: 40%; border: black 3px solid;" ><?php echo $producto['Nombre']?></td>
            <td style="width: 15%; border: black 3px solid;"><?php echo $producto['Cantidad']?></td>
            <td style="width: 20%; border: black 3px solid;"><?php echo $producto['Precio']?></td>
            <td style="width: 20%; border: black 3px solid;"><?php echo number_format($producto['Precio']*$producto['Cantidad'],2); ?></td>
            <form action="" method="post">
                <td style="width: 5%; border: black 3px solid;"> 
                <input type="hidden" name="id" value=<?php echo $producto['ID']?> >
                    <button type="submit" 
                            class="btn btn-danger"
                            name='btnAccion'
                            value='Eliminar'
                            >Eliminar
                    </button>
                </td>
            </form>
        </tr>
        <?php $total=$total+$producto['Precio']*$producto['Cantidad'];?>
        <?php }?>
        <tr>
            <td colspan="3" align="right" style="border: black 3px solid;"><h3>Total</h3></td>
            <td colspan="2" align="right" style="border: black 3px solid;"> <h3>$<?php echo number_format($total,2);?></h3></td>
            <td></td>
        </tr>

        <tr>
            <td colspan="5">
                <form action="pagar.php" method="post">
                    <div class="alert alert-success" role="alert">
                        <div class="form-group">
                            <label for="my-input">Correo de contacto:</label>
                            <input 
                                id="email"
                                name="email"
                                class="form-control"
                                type="email"
                                placeholder="Escribe tú correo..."
                                required
                                >
                        </div>
                        <small id="emailHelp" class="form-text text-muted">
                            Los productos se enviaran a este correo.
                        </small>
                    </div>
                    <button class="btn btn-primary btn-lg btn-block" type="submit"
                            name="btnAccion"
                            value="proceder"> Pagar </button>
                </form>
                


            </td>
        </tr>
    </tbody>
</table>
<?php }else{?>
 <div class="alert alert-success">No hay elementos en el carrito</div>
<?php } ?>

<?php

include 'templates/pie.php'
?>
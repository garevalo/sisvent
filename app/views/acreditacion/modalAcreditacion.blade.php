
        {{ Form::open(array('url' => 'acreditacion/enviar','class'=>"","role"=>"form", 'method' => 'post','id'=>'form'))}}

            <div class="form-group">
                <label for="definpu">RUC</label>
                <input type="hidden" name="idcliente" value="<?= $_GET['idcliente'];?>">
                <input type="hidden" name="idcotizacion" value="<?= $_GET['idcotizacion'];?>">
                <input type="text" class="form-control" id="ruc" placeholder="ruc" name="ruc" value="<?= $_GET['ruc'];?>" readonly="">
            </div>
            <div class="form-group">
                <label for="definpu">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" value="<?= $_GET['nombre'];?>" readonly="">
            </div>
            <div class="form-group">
                <label for="definpu">Precio orden</label>
                <input type="text" class="form-control" id="precio" name="precio" placeholder="Precio Orden Compra" value="<?= $_GET['precio'];?>" readonly="">
            </div>
            <button type="submit" onclick="registrar_modal('form',0)" class="btn btn-primary"><i class="glyphicon glyphicon-send"></i> Solicitar Acreditación</button>
        {{ Form::close()}}

    

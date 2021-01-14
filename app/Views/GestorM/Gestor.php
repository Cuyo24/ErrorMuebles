<?= $this->extend('Layout/header') ?>

<?= $this->section('titulo') ?>
    Administrar usuarios
<?= $this->endSection() ?>



<?= $this->section('content') ?>

<h1>Administracion de usuarios</h1>
    <div class="row">
        <div class="col-sm-4">
            <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarUsuario">
                <span class="fas fa-user-plus"></span> Agregar
            </button>
        </div>
    </div>
    <hr>
    <div class="row">
        <hr>
    	<div class="col-sm-12">
    		<div id="tablaCargadaUsuarios"></div>
    	</div>
    </div>


    <!-- Modal -->
<div class="modal fade" id="modalAgregarUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar nuevo usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form id="frmAgregaUsuario">
            <label>nombre</label>
            <input type="text" id="nombre" name="nombre" class="form-control">
            <label>tipo</label>
            <input type="text" id="tipo" name="tipo" class="form-control">
            <label>Costo de venta</label>
            <input type="text" id="costoVenta" name="costoVenta" class="form-control">
            <label>Costo de compra</label>
            <input type="text" id="CostoCompra" name="CostoCompra" class="form-control">
       </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="btnAgregarUsuario">Guardar</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="modalActualizarUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Actualizar usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form id="frmAgregaUsuariou">
            <input type="text" id="idComprau" name="idComprau" hidden="">
            <label>nombre</label>
            <input type="text" id="nombreu" name="nombreu" class="form-control">
            <label>tipo</label>
            <input type="text" id="tipou" name="tipou" class="form-control">
            <label>Costo de venta</label>
            <input type="text" id="costoVentau" name="costoVentau" class="form-control">
            <label>Costo de compra</label>
            <input type="text" id="CostoComprau" name="CostoComprau" class="form-control">
       </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-warning" onclick="actualizarUsuario()">Actualizar</button>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection() ?>

<!-- Modal -->
<div class="modal fade" id="{{ $modalId }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body">
        {{ $modalText }}
      </div>
      <div class="modal-footer">

        <!-- Botão cancelar -->
        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ $btnCancelarText }}</button>

        <!-- Botão excluír -->
        <form class="form-modal-OK" action="" method="POST">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-primary">{{ $btnOKText }}</button>
        </form>

      </div>
    </div>
  </div>
</div>

<!-- Script abrir modal Excluir -->
<script type="text/javascript">
  function abrirModal(id, route) {
    $('.form-modal-OK').attr("action", route);
};
</script>

<!-- Adicionar função onclick="abrirModal(id, route)" no botão que irá abrir o modal -->
<!-- modalId -->
<!-- modalText -->
<!-- btnCancelarText -->
<!-- btnOKText -->

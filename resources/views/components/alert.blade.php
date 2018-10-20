<!-- alert -->
@if (Session::get('alert'))
    <div class="alert {{ Session::get('alertClass') }}" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        {{ Session::get('alert') }}
    </div>
@endif

<!-- alert-primary => AZUL-->
<!-- alert-secondary => CINZA CLARO-->
<!-- alert-success => VERDE-->
<!-- alert-danger => VERMELHO-->
<!-- alert-warning => AMARELO-->
<!-- alert-info => VERDE ÁGUA-->
<!-- alert-light=>  BRANCO -->
<!-- alert-dark => CINZA-->

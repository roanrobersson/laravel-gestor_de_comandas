@extends('layouts.app')

@section('content')

  @navbar_secundaria(['btnVoltarURL' => route('comanda_listar'),
                             'title' => 'Visualizando comanda']);
  @endnavbar_secundaria

  @modal([  'modalId' => 'modalExcluir',
          'modalText' => 'Você realmente deseja excluír esse adicional?',
    'btnCancelarText' => 'Cancelar',
          'btnOKText' => 'Excluír']);
  @endmodal

  <script type="text/javascript">
    jQuery(function($) {
        $('.valorItem').autoNumeric('init');
    });
  </script>

<div class="container p-0">

  <div class="card mb-4 card-comanda-titulo">
    <div class="card-body text-center">
      {{ $comanda->nomeCliente }}
    </div>
  </div>

  @if(count($comanda->itens) == 0)
  <div class="alert alert-danger" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      Nenhum item foi adicionado na comanda!
  </div>
  @endif


</div>




@endsection

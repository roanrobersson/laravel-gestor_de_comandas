@extends('layouts.app')

@section('content')

  @navbar_secundaria(['title' => 'Comandas',
                     'btnAdicionarURL' => route('comanda_criar')]);
  @endnavbar_secundaria

  @modal([  'modalId' => 'modalExcluir',
          'modalText' => 'Você realmente deseja excluír essa comanda?',
    'btnCancelarText' => 'Cancelar',
          'btnOKText' => 'Excluír']);
  @endmodal

<script type="text/javascript">
  $(document).ready(function(){
    $("#pesquisaInput").on("keyup", function() {
      var value = $(this).val().toLowerCase();

      $("#lista .linha").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);

        if( $(this).text().toLowerCase().indexOf(value) == -1 ){
          $(this).removeClass("d-flex");
        }else {
          $(this).addClass("d-flex");
        }

      });

    });
  });
</script>


<div class="container p-0">

  <input class="pesquisaInput" id="pesquisaInput" type="text" placeholder="Pesquisar cliente..">

  <div class="list-group-flush lista-categorias" id="lista">

    @forelse ($comandas as $c)

      <div class="list-group-item list-group-item-action d-flex justify-content-between background-azul linha">
        <div class="">

          <!-- Label Nome -->
          <span class="mb-1">{{ $c->nomeCliente }}</span>

        </div>

        <div class="mb-auto mt-auto">

          <!-- Botão editar -->
          <a class="botao-categoria-editar" href="{{ route('categoria_editar', ['id' => $c->id]) }}"> <img class="list-img-action" src="{{ asset('img/edit.png') }}" alt="img_editar"> </a>

          <!-- Botão excluir -->
          <button type="button" class="botao-categoria-excluir" onclick="abrirModal({{$c->id}}, '{{ route('categoria_apagar', ['id' => $c->id]) }}' )" data-toggle="modal" data-target="#modalExcluir"><img class="list-img-action" src="{{ asset('img/garbage.png') }}" alt="img_excluir"></button>

        </div>

      </div>

    @empty
    <div class="alert alert-warning" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        Nenhuma comanda foi criada.
    </div>
    @endforelse
  </div>
</div>

@endsection

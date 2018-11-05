@extends('layouts.app')

@section('content')

  @navbar_secundaria(['btnVoltarURL' => URL::previous(),
                             'title' => 'Novo pedido']);
  @endnavbar_secundaria

  @modal([  'modalId' => 'modalExcluir',
          'modalText' => 'Você realmente deseja excluír esse item?',
    'btnCancelarText' => 'Cancelar',
          'btnOKText' => 'Excluír']);
  @endmodal

  <script type="text/javascript">
    jQuery(function($) {
        $('.valorItem').autoNumeric('init');
    });
  </script>

  <script type="text/javascript">
    var quantidadeGlobal = 1;
    var valorItemGlobal = 0;
    var valorAdicionalGlobal = 0;
      function atualizarValorTotal() {
        var valorTotal = (+valorAdicionalGlobal + +valorItemGlobal) * +quantidadeGlobal;
        $('#valorTotal').html( 'R$ ' + valorTotal );
      };
  </script>

  <!-- Quantidade -->
  <script type="text/javascript">
  $( document ).ready(function() {
      $( "#quantidade").on('input', function() {
        qtd = $(this).val();
        if(+qtd == 0) {
          quantidadeGlobal = 0;
        }else {
          quantidadeGlobal = qtd;
        }

        atualizarValorTotal();

      });


      $( "#quantidade" ).trigger( "onInput" );
  });
  </script>

  <!-- Item -->
  <script type="text/javascript">
    $( document ).ready(function() {

      $( "#itemSelect").change( function() {
        var idItem = $(this).val();

        $( '.itemSelect' ).each(function() {
          var idSubItem = $(this).val();
          var valorSubItem = $(this).attr('data-valorItem');

          if( idItem === idSubItem) {
            valorItemGlobal = valorSubItem;
            atualizarValorTotal();
            $( "#valorItem").html('R$ ' + valorSubItem.replace('.', ','));
          }

        });
      })

      $( "#itemSelect" ).trigger( "change" );

    });
  </script>


  <!-- Adicional -->
  <script type="text/javascript">
    $( document ).ready(function() {

      $( "#adicionalSelect").change( function() {
        var idAdicional = $(this).val();

        if(idAdicional == 0) {
          $( "#valorAdicional").html('R$ 0,00');
          valorAdicionalGlobal = 0.00;
          atualizarValorTotal();
          return;
        }

        $( '.itemAdicionalSelect' ).each(function() {
          var idAdicionalItem = $(this).val();
          var valorAdicionalItem = $(this).attr('data-valorAdicional');

          if( idAdicional === idAdicionalItem) {
            valorAdicionalGlobal = valorAdicionalItem;
            atualizarValorTotal();
            $( "#valorAdicional").html('R$ ' + valorAdicionalItem.replace('.', ','));
          }

        });
      })

      $( "#adicionalSelect" ).trigger( "change" );

    });
  </script>



<div class="container p-0">



  <div class="container card-comanda-titulo rounded">
    <div class="row card-comanda-titulo-row-nomeCliente text-center  pb-2">
      <div class="col-12 text-center">
        {{ $comanda->nomeCliente }}
      </div>
    </div>
  </div>




  <div class="container">

    <form action="{{ route('comanda_salvarPedido', ['id' => $comanda->id]) }}" method="POST" enctype="multipart/form-data">
    @method('POST')
    @csrf

      <div class="row comanda-Fechar-Item">
        <div class="col-3 mt-2">
          Item:
        </div>
        <div class="col-7 text-center">
            <select class="custom-select" id="itemSelect" name="item_id" required>
              @foreach ($itens as $i)
                <option class="itemSelect" value="{{ $i->id }}" data-valorItem="{{ $i->valor }}">{{ $i->nome }}</option>
              @endforeach
            </select>
        </div>
        <div class="col-2 text-center mt-2">
          <span id="valorItem" class="valorItem text-right" data-valorItem="0.00" required data-a-sign="R$ " data-a-dec="," data-a-sep="." data-v-max="999.99" data-v-min="0.00"></span>
        </div>

      </div>


      <div class="row comanda-Fechar-Item">
        <div class="col-3 mt-2">
          Adicional:
        </div>
        <div class="col-7 text-center">
            <select class="custom-select" id="adicionalSelect" name="adicional_id">
              <option  selected value="0"></option>
              @foreach ($adicional as $a)
                <option class="itemAdicionalSelect" value="{{ $a->id }}" data-valorAdicional="{{ $a->valor }}">
                  {{ $a->nome }}
                </option>
              @endforeach
            </select>
        </div>
        <div class="col-2 text-center mt-2">
          <span id="valorAdicional" class="valorItem text-right" data-valorItem="0.00" required data-a-sign="R$ " data-a-dec="," data-a-sep="." data-v-max="999.99" data-v-min="0.00"></span>
        </div>

      </div>

      <div class="row comanda-Fechar-Item">
        <div class="col-10 mt-2">
          Quantidade:
        </div>
        <div class="col-2 text-center p-0 ">
          <input id="quantidade" required name="quantidade" type="numeric" name="valorDesconto" value="1" maxlength="2" class="form-control text-right valorItem text-center" placeholder="Quantidade">
        </div>
      </div>

      <div class="row comanda-Fechar-Item ">
        <div class="col-10">
          Valor total:
        </div>
        <div class="col-2 text-center">
          <span id="valorTotal" class="valorItem" ></span>
        </div>
      </div>

      <div class="row comanda-Fechar-Item pt-3">
        <div class="col-3 pb-3">
          Observação:
        </div>
        <div class="col-9 input-group  px-3">
          <textarea class="form-control" name="observacao" aria-label="With textarea" style="min-height:6rem; max-height: 10rem;" maxlength="250"></textarea>
        </div>
      </div>





      <div class="row comanda-ValorTotal rounded mt-5">
          <div class="col-12">
            <button type="submit" class="btn btn-primary botao-submit" >Salvar pedido</button>
          </div>
      </div>

    </div>

  </form>

</div>



@endsection

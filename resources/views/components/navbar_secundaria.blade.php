<!-- navbar_secundaria  -->
<nav class="barra-secundaria">
  <div class="container container-barra_secundaria">
    <div class="subcontainer-barra_secundaria">
      <p class="barra-titulo">{{ $title }}</p>
      @isset($btnVoltarURL)
        <a class="botao-voltar" href="{{ $btnVoltarURL }}"><img src="{{ asset('img/back.png') }}" alt="img_back"></a>
      @endisset

      @isset($btnAdicionarURL)
        <a class="botao-adicionar" href="{{ $btnAdicionarURL }}"><img src="{{ asset('img/add.png') }}" alt="img_add"></a>
      @endisset
    </div>
  </div>
</nav>

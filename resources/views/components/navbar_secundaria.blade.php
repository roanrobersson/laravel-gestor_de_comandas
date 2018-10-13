<!-- navbar_secundaria  -->
<nav class="barra-secundaria">
  <p class="barra-titulo">{{ $title }}</p>
  @isset($btnURL)
    <a class="botao-voltar" href="{{ $btnURL }}"><img class="my-auto" src="{{ asset('img/back.png') }}" alt="img_back"></a>
  @endisset
</nav>

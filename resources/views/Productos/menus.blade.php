@if($productos[0]->categoria->idCategoria==1)
<a role="button" href="{{url('/productos/1')}}" class="btn list-group-item list-group-item-action categorias">Extintores</a>
<a role="button" href="{{url('/productos/')}}" class="btn list-group-item list-group-item-action categorias">Mangueras</a>
<a role="button" href="{{url('/productos/')}}" class="btn list-group-item list-group-item-action categorias">Otros</a>
@elseif($productos[0]->categoria->idCategoria>1)
<a role="button" href="{{url('/productos/2')}}" class="btn list-group-item list-group-item-action categorias">Para la cabeza</a>
<a role="button" href="{{url('/productos/3')}}" class="btn list-group-item list-group-item-action categorias">Para las manos</a>
<a role="button" href="{{url('/productos/')}}" class="btn list-group-item list-group-item-action categorias">Para la espalda</a>
<a role="button" href="{{url('/productos/')}}" class="btn list-group-item list-group-item-action categorias">Para los ojos</a>
@endif

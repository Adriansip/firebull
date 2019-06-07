<table class="table table-sm" id="tblUsuarios">
    <thead>
        <tr class="text-center">
            <th scope="col">idUsuario</th>
            <th scope="col">Nombre</th>
            <th scope="col">Email</th>
            <th scope="col">Rol</th>
            <th scope="col">Fecha de registro</th>
            <th scope="col">Cliente</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($usuarios as $usuario)
        <tr class="text-center">
            <td>{{$usuario->id}}</td>
            <td>{{$usuario->name}}</td>
            <td>{{$usuario->email}}</td>
            <td>{{$usuario->rol->rol}}</td>
            <td>
                <?php
                       setlocale(LC_ALL,"es_ES","esp");
                          echo $fecha = strftime( "%d de %B de %Y - %T ",strtotime($usuario->created_at) );
                             ?> </td>

            @if($usuario->cliente)
                <td>
                    {{$usuario->cliente->nombre}}
                </td>
                @else
                <td>Ningun cliente asignado</td>
                @endif
                <td>
                    <button data-toggle="modal" data-target="#modalUsuario" class="editar btn btn-sm btn-info" value={{$usuario->id}}><i class="small material-icons">create</i></button>
                </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{$usuarios->links()}}
@include('Usuarios.modalUsuario')
<script type="text/javascript" src="{{asset('js/usuarios.js')}}">
</script>
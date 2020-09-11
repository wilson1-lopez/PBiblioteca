<?php
$modulo = 'autor'
?>
<form action="{{ route($modulo.'.destroy', $id) }}" method="post">
    @csrf
    @method('DELETE')
    <a href="{{ route($modulo.'.show', $id) }}" class="btn btn-warning btn-sm"><i class="far fa-eye"></i> Ver</a>
    <a href="{{ route($modulo.'.edit', $id) }}" class="btn btn-info btn-sm"><i class="fas fa-pen"></i> Editar</a>
    <button type="submit" name="submit" value="Borrar" class="btn btn-sm btn-danger"
            onclick="return confirm('Estas seguro de borrar este registro?')"><i class="fas fa-trash-alt"></i> Borrar</button>
</form>

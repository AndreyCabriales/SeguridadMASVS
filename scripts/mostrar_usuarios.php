<?php
    require_once('../clases/MangaBD.php');
    require_once('../clases/AutorBD.php');
    require_once('../clases/CategoriaBD.php');

    $mDB=new MangaBD();
    $aBD=new AutorBD();
    $cBD=new CategoriaBD();
    $tabla="";
    $mangas=$mDB->todos();
    foreach($mangas as $manga){
        $categoria=$cBD->uno($manga->getCategoria());
        $autor=$aBD->uno($manga->getAutor());
        $tabla.='
        <tr>
            <th scope="row">'.$manga->getId().'</th>
            <td >'.$manga->getNombre().'</td>
            <td>'.$manga->getDescripcion().'</td>
            <td>'.$categoria->getNombre().'</td>
            <td>'.$autor->getNombre()." ".$autor->getApellidos().'</td>
            <td><a class="edit btn btn-warning " data-id="'.$manga->getId().'" 
             data-bs-toggle="modal" data-bs-target="#editar_manga">Editar</a></td>
            <td><a class="btn btn-danger del" data-id="'.$manga->getId().'"  
            data-bs-toggle="modal" data-bs-target="#eliminar_manga">Eliminar</a></td>
            <td>
                <form method="post" action="admin/imagenes/agregar_img.php">
                    <input type="hidden" name="id" value="'.$manga->getId().'">
                    <button type="submit" class="btn btn-info">Imagen</button>
                </form>  
            </td>  
        </tr>
        ';
    }

    echo $tabla;
?>
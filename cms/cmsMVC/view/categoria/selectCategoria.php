<!--
     /* Classe de Contato
      * Autor: Igor Xavier
      * Data de criação: 09/12/2019
      * Data de modificação:
      * Modificações realizadas: 
 */ -->
 
<?php
require_once('../controller/categoriaController.php');

echo($selectNomeSubcategoria);

if($_GET['modo'] == "buscarsubcategoria"){?>
    <option selected value="<?=$idSelectSubcategoria?>" > <?=$selectNomeSubcategoria?> </option> 

<?php 
}else{ ?>
    <option selected value="" > Selecione uma opcão </option> 
<?php
}

$categoriaController = new CategoriaController();

$categorias = $categoriaController->selectCategoriaEdicao($idSelectSubcategoria);

$cont = 0;
while($cont < count($categorias)){     

?>
    <option value="<?=$categorias[$cont]->getCodigo()?>"><?=$categorias[$cont]->getNome()?></option>
<?php
$cont++;
session_unset();
}

?>
    



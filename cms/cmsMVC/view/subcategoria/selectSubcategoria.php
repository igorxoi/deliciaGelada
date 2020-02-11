<!--
     /* Classe de Contato
      * Autor: Igor Xavier
      * Data de criação: 09/12/2019
      * Data de modificação:
      * Modificações realizadas: 
 */ -->

<?php
require_once('../controller/subcategoriaController.php');



if($_GET['modo'] == "buscarproduto"){?>
    <option selected value="<?=$fkSubcategoriaProduto?>" > <?=$subcategoriaProduto?> </option>
    
<?php 
}else{ ?>
    <option selected value="" > Selecione uma subcategoria </option>

<?php
}

$subcategoriaController = new SubcategoriaController();

$subcategorias = $subcategoriaController->selectSubcategoriaEdicao($fkSubcategoriaProduto);

$cont = 0;
while($cont < count($subcategorias)){

?>
    <option value="<?=$subcategorias[$cont]->getCodigo()?>" ><?=$subcategorias[$cont]->getNome()?></option>

<?php

    $cont++;
}
?>
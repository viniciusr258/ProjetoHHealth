<?php
  require_once("../../variaveis.php");

  require_once($voltaDois.'func.php');


/*Verifica se o batao de deslogar existe e chama a função para deslogar o usuario*/
if (isset($_POST['deslogar'])) {
  deslogar();
}

 ?>
<header>
    <div id="logo">
      <img src="<?php echo $voltaDois; ?>imagens/hhealth.png" alt="logo">
    </div>
    <!--menu -->
    <div class="Titulo">
        Marketing
    </div>
    <div class="Editar_crud">
      <form class="" method="post">
        <input type="submit" name="deslogar" value="Deslogar" id="logout" >
      </form>

    </div>
</header>

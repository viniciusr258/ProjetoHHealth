<?php
require_once('../../../variaveis.php');

  session_start();
  #require_once("cms/conexao.php");

  /* Chama o arquivo que contem os funçoes*/
  require_once ($voltaTres."func.php");
  /*Chama a função para verificar se o usuario esta logado*/
  logar($_SESSION['LogCod']);

 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Portal HHealth - Visualizar Sobre</title>
    <link rel="stylesheet" type="text/css" href="<?php echo $voltaTres; ?>css/Frajola.css">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script src="js/modernizr.min.js"></script>
  </head>
  <body>
    <?php include($voltaDois."header.php"); ?>

    <script src="js/classie.js"></script>
		<script src="js/photostack.js"></script>
		<script>
      [].slice.call( document.querySelectorAll( '.photostack' ) ).forEach( function( el ) { new Photostack( el ); } );

  		new Photostack( document.getElementById( 'photostack-1' ), {
  			callback : function( item ) {
  				console.log(item)
  			}
  		} );

      new Photostack( document.getElementById( 'photostack-2' ), {
				callback : function( item ) {
					console.log(item)
				}
			} );

			new Photostack( document.getElementById( 'photostack-3' ), {
				callback : function( item ) {
					console.log(item)
				}
			} );
		</script>

    <div  id="opcao" class="button shrink">
      <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;Menu
		</span>
    </div>

    <main>
      <?php include($voltaDois."menuLateral_view.php"); ?>

      <script>
        function openNav() {
          document.getElementById("mySidenav").style.width = "270px";
        }

        function closeNav() {
          document.getElementById("mySidenav").style.width = "0";
        }
      </script>

      <h1>Cabeçalhos</h1>
      <?php
        require_once($voltaTres.'router.php');
        require_once($voltaTres.'controllers/cmsSobre_controller.php');
        require_once($voltaTres.'models/sobre_class.php');
        require_once($voltaTres.'models/sobre_cabecalho_class.php');

        $controller_sobre = new controllerCmsSobre();
        //chama metodo para listar os registros
        $list = $controller_sobre::ListarCabecalho();

        $cont = 0;

        while ($cont < count($list)) {

       ?>
        <div id="segura">
         <div id="imagem_titulo">
           <h1><?php echo($list[$cont]->tituloFoto); ?></h1>
           <img src="<?php echo($voltaTres.$list[$cont]->fotoCabecalho); ?>" alt="background Informações">
         </div>
         <div id="texto_info">
           <h1><?php echo($list[$cont]->tituloPagina); ?></h1>
         </div>
         <div class="Crud_Opc">

             <div class="Deletar_crud">
               <a href="<?php echo $voltaTres; ?>router.php?controller=cmsSobre&modo=excluircabecalho&id=<?php echo($list[$cont]->idSobreCabecalho); ?>">DELETAR</a>

             </div>
             <div class="Editar_crud">
               <a href="<?php echo $voltaTres; ?>router.php?controller=cmsSobre&modo=buscarcabecalho&id=<?php echo($list[$cont]->idSobreCabecalho); ?>">EDITAR</a>
             </div>

             </div>
             <!-- ABRE O IF -->
             <?php
                 // IF PARA DESATIVAR O CONTEUDO
                   if ($list[$cont]->ativo == 1){

              ?>
               <div class="ativar_crud ">
                 <a href="<?php echo $voltaTres; ?>router.php?controller=cmsSobre&modo=desativarcabecalho&id=<?php echo($list[$cont]->idSobreCabecalho); ?>">
                   <img src="<?php echo $voltaTres; ?>imagens/check.png" alt="Desativar" title="Desativar">
                 </a>
               </div>
               <?php
             // FECHA O IF E ABRE ELSE
             // ELSE PARA ATIVAR CONTEUDO
             } else {
                ?>
               <div class="desativar_crud ">
                 <a href="<?php echo $voltaTres; ?>router.php?controller=cmsSobre&modo=ativarcabecalho&id=<?php echo($list[$cont]->idSobreCabecalho); ?>">
                   <img src="<?php echo $voltaTres; ?>imagens/no.png" alt="Ativar" title="Ativar">
                 </a>
               </div>
               <!-- FECHA O ELSE -->
                <?php
              }
                 ?>
         </div>
      <?php
          $cont += 1;
        }
      ?>

         <h1>Conteúdos</h1>
         <?php
           $controller_sobre = new controllercmsSobre();
           //chama metodo para listar os registros
           $listConteudo = $controller_sobre::ListarConteudo();

           $contConteudo = 0;

           while ($contConteudo < count($listConteudo)) {
         ?>

         <div id="segura">
           <div class="segura_img_info">
             <div class="img_info">
               <img src="<?php echo($voltaTres.$listConteudo[$contConteudo]->fotoSobre); ?>" alt="Sobre">
             </div>
             <div class="info">
               <p><?php echo($listConteudo[$contConteudo]->textoSobre); ?></p>
             </div>
           </div>
           <div class="Crud_Opc">

               <div class="Deletar_crud">
                 <a href="<?php echo $voltaTres; ?>router.php?controller=cmsSobre&modo=excluirconteudo&id=<?php echo($listConteudo[$contConteudo]->idPaginaSobre); ?>">DELETAR</a>

               </div>
               <div class="Editar_crud">
                 <a href="<?php echo $voltaTres; ?>router.php?controller=cmsSobre&modo=buscarconteudo&id=<?php echo($listConteudo[$contConteudo]->idPaginaSobre); ?>">EDITAR</a>
               </div>
           </div>
           <!-- ABRE O IF -->
           <?php
               // IF PARA DESATIVAR O CONTEUDO
                 if ($listConteudo[$contConteudo]->ativo == 1){

            ?>
             <div class="ativar_crud ">
               <a href="<?php echo $voltaTres; ?>router.php?controller=cmsSobre&modo=desativarconteudo&id=<?php echo($listConteudo[$contConteudo]->idPaginaSobre); ?>">
                 <img src="<?php echo $voltaTres; ?>imagens/check.png" alt="Desativar" title="Desativar">
               </a>
             </div>
             <?php
           // FECHA O IF E ABRE ELSE
           // ELSE PARA ATIVAR CONTEUDO
           } else {
              ?>
             <div class="desativar_crud ">
               <a href="<?php echo $voltaTres; ?>router.php?controller=cmsSobre&modo=ativarconteudo&id=<?php echo($listConteudo[$contConteudo]->idPaginaSobre); ?>">
                 <img src="<?php echo $voltaTres; ?>imagens/no.png" alt="Ativar" title="Ativar">
               </a>
             </div>
             <!-- FECHA O ELSE -->
              <?php
            }
               ?>

         </div>

      <?php
          $contConteudo +=1;
        }
      ?>
    </main>
  </body>
</html>

<?php
  /* Autor: Stéphanie
     Data de modificação: 16/04/18
     Controller: Procedimentos de Exames
     Obs: Controller para realizar CRUD da pagina Unidades e verifica login
   */
  class controllerCmsUnidades{

    // FUNÇÕES REFENTE AO CABEÇALHO
      public function NovoCabecalho(){
        // require da funcao modulo para envio das imagens
        require_once('modulo.php');

        // novo objeto
        $unidadeCabecalho = new UnidadeCabecalho();

        // pega o conteudo
        $unidadeCabecalho->tituloFoto = $_POST['txt1'];

        //inicia variaveis
        $diretorio_completo = null;
        $movUpload = false;
        $imagem_file = null;

        //pega a foto
        if (!empty($_FILES['imagem_cabecalho']['name'])){
          $imagem_file = true;
          $diretorio_completo = salvaImagem($_FILES['imagem_cabecalho'], 'arquivos');
          if ($diretorio_completo == 'Erro'){
            echo "<script>
                    alert('arquivo nao movido');
                    window.history.go(-1);
                  </script>";
                  $movUpload = false;
          } else {
            $movUpload = true;
          }
        } else {
          $imagem_file = false;
        }

        $unidadeCabecalho->fotoCabecalho = $diretorio_completo;
        $unidadeCabecalho::Insert($unidadeCabecalho);
      }

      public function ListarCabecalho(){
        $cabecalho = new UnidadeCabecalho();
        return $cabecalho::SelectCabecalho();
      }

      public function ExcluirCabecalho() {
        $idCabecalho = $_GET['id'];

        $excluirCabecalho = new UnidadeCabecalho();

        $excluirCabecalho->id = $idCabecalho;
        $excluirCabecalho::DeleteCabecalho($excluirCabecalho);
      }

      public function BuscarCabecalho(){
        $idCabecalho = $_GET['id'];

        $cabecalho= new UnidadeCabecalho();

        $cabecalho->id = $idCabecalho;

        $cabecalhoResultado = $cabecalho::SelectCabecalhoById($cabecalho);

        require_once('views/cms/unidades/editarUnidades_view.php');
      }

      public function EditarCabecalho(){
        // require da funcao modulo para envio das imagens
        require_once('modulo.php');
        $idUnidadeCabecalho = $_GET['id'];

        $unidadesCabecalho = new UnidadeCabecalho();

        // pega o conteudo
        $unidadesCabecalho->id = $idUnidadeCabecalho;
        // pega o conteudo

        $unidadesCabecalho->tituloFoto = $_POST['txt1'];

        //inicia variaveis
        $diretorio_completo = null;
        $movUpload = false;
        $imagem_file = null;
        $fotoCabecalho = "a";

        //Pega foto
        if (!empty($_FILES['imagem_cabecalho']['name'])){
         $imagem_file = true;
         $diretorio_completo = salvaImagem($_FILES['imagem_cabecalho'],'arquivos');

          if ($diretorio_completo == "Erro"){
             echo "<script>
                 alert('arquivo nao movido');
                 window.history.go(-1);
                 </script>";
               $MovUpload=false;
          } else {
            $MovUpload=true;
          }
        } else {
         $imagem_file = false;
        }

        if ($imagem_file == true && $MovUpload == true) {
          $fotoCabecalho = $diretorio_completo;
        } else {
          $fotoCabecalho = "vazio";
        }

        $unidadesCabecalho->fotoCabecalho = $fotoCabecalho;
        UnidadeCabecalho::UpdateCabecalho($unidadesCabecalho);
      }

      public function AtivarCabecalho(){
        $idCabecalho = $_GET['id'];

        $ativarCabecalho = new UnidadeCabecalho();

        $ativarCabecalho->id = $idCabecalho;
        return $ativarCabecalho::ActivateCabecalho($ativarCabecalho);
      }

      public function DesativarCabecalho(){
        $idCabecalho = $_GET['id'];

        $desativarCabecalho = new UnidadeCabecalho();

        $desativarCabecalho->id = $idCabecalho;
        return $desativarCabecalho::DisableCabecalho($desativarCabecalho);
      }

      public function SelecionarCabecalhoAtivo(){
        $cabecalho = new UnidadeCabecalho();
        return $cabecalho::SelectCabecalhoAtivo();
      }

      // REFERENTE AO CONTEUDO
      public function NovoConteudo($idEndereco){
        // require da funcao modulo para envio das imagens
        require_once('modulo.php');

        // novo objeto
        $unidadeConteudo = new Unidades();

        // pega o conteudo
        $unidadeConteudo->cnpj = $_POST['txtCnpj'];
        $unidadeConteudo->nome = $_POST['txtNome'];
        $unidadeConteudo->email = $_POST['txtEmail'];
        $unidadeConteudo->telefone = $_POST['txtTel'];
        $unidadeConteudo->idEndereco = $idEndereco->idEndereco;

        //inicia variaveis
        $diretorio_completo = null;
        $movUpload = false;
        $imagem_file = null;

        //pega a foto
        if (!empty($_FILES['imagem_conteudo']['name'])){
          $imagem_file = true;
          $diretorio_completo = salvaImagem($_FILES['imagem_conteudo'], 'arquivos');
          if ($diretorio_completo == 'Erro'){
            echo "<script>
                    alert('arquivo nao movido');
                    window.history.go(-1);
                  </script>";
                  $movUpload = false;
          } else {
            $movUpload = true;
          }
        } else {
          $imagem_file = false;
        }


        $unidadeConteudo->fotoUnidade = $diretorio_completo;
        $unidadeConteudo::InsertConteudo($unidadeConteudo);
      }

      public function ListarConteudo(){
        $conteudo = new Unidades();
        return $conteudo::SelectConteudo();
      }

      public function ExcluirConteudo(){
        $idConteudo = $_GET['id'];

        $excluirConteudo = new Unidades();

        $excluirConteudo->id = $idConteudo;
        return $excluirConteudo::DeleteConteudo($excluirConteudo);
      }

      public function BuscarConteudo(){
        $idConteudo = $_GET['id'];

        require_once('models_views/unidade_e_endereco_class.php');

        $conteudo = new UnidadeEndereco();

        $conteudo->id = $idConteudo;

        $conteudoResultado = $conteudo::SelectConteudoById($conteudo);

        require_once('views/cms/unidades/editarUnidades_view.php');
      }

      public function EditarConteudo(){
        // require da funcao modulo para envio das imagens
        require_once('modulo.php');
        $idUnidade = $_GET['id'];

        require_once('models_views/unidade_e_endereco_class.php');


        $unidadesConteudo = new UnidadeEndereco();

        // pega o conteudo
        $unidadesConteudo->id = $idUnidade;
        $unidadesConteudo->cnpj = $_POST['txtCnpj'];
        $unidadesConteudo->nome = $_POST['txtNome'];
        $unidadesConteudo->email = $_POST['txtEmail'];
        $unidadesConteudo->telefone = $_POST['txtTel'];

        //inicia variaveis
        $diretorio_completo = null;
        $movUpload = false;
        $imagem_file = null;
        $fotoUnidade = "a";

        //Pega foto
        if (!empty($_FILES['imagem_conteudo']['name'])){
         $imagem_file = true;
         $diretorio_completo = salvaImagem($_FILES['imagem_conteudo'],'arquivos');

          if ($diretorio_completo == "Erro"){
             echo "<script>
                 alert('Arquivo não movido');
                 window.history.go(-1);
                 </script>";
               $MovUpload = false;
          } else {
            $MovUpload = true;
          }
        } else {
         $imagem_file = false;
        }

        if ($imagem_file == true && $MovUpload == true) {
          $fotoUnidade = $diretorio_completo;
        } else {
          $fotoUnidade = "vazio";
        }

        $unidadesConteudo->fotoUnidade = $fotoUnidade;
        Unidades::UpdateConteudo($unidadesConteudo);
      }

      public function AtivarConteudo(){

        $idConteudo = $_GET['id'];

        $ativarConteudo = new Unidades();

        $ativarConteudo->id = $idConteudo;
        return $ativarConteudo::ActivateConteudo($ativarConteudo);
      }

      public function DesativarConteudo(){
        $idConteudo = $_GET['id'];

        $desativarConteudo = new Unidades();

        $desativarConteudo->id = $idConteudo;
        return $desativarConteudo::DisableConteudo($desativarConteudo);
      }

      public function SelecionarConteudoAtivo(){
        $conteudo = new UnidadeEndereco();
        return $conteudo->SelectConteudoAtivo();

      }
  }


 ?>

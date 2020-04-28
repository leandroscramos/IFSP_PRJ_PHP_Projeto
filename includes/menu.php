<header class="main-header">
  <nav class="navbar navbar-static-top">
    <div class="container">
      <div class="navbar-header">
        <a href="logado" class="navbar-brand"><b>HU</b> - UFSCar</a>
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
          <i class="fa fa-bars"></i>
        </button>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
          <ul class="nav navbar-nav">            
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Gestão de Documentos <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                    <?php
                        if ($_SESSION["login"]["permissao"] == "Usuário") {
                            echo "<li><a href='docList'>Lista de Documentos</a></li>";
                            echo "<li><a href='document'>Novo Documento</a></li>";                        
                        }
                        if ($_SESSION["login"]["permissao"] == "Administrador") {
                            echo "<li><a href='docList'>Lista de Documentos</a></li>";
                            echo "<li><a href='document'>Novo Documento</a></li>";                            
                        }
                    ?>
                </ul>            
            </li>
          </ul>
          <?php if ($_SESSION["login"]["permissao"] == "Administrador") { ?>
          <ul class="nav navbar-nav">            
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Cadastros <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">                   
                    <?php echo "<li><a href='docType'>Tipos de Documento</a></li>"; ?>
                    <?php echo "<li><a href='sector'>Setores</a></li>"; ?>
                    <?php echo "<li><a href='procType'>Tipos de Processos</a></li>"; ?>
                    <?php echo "<li><a href='macroProc'>Macroprocessos</a></li>"; ?>
                    <?php echo "<li><a href=''>Processos</a></li>"; ?>
                </ul>
            </li>
          </ul>
          <?php } ?>
      </div>
      <!-- /.navbar-collapse -->
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">                              
              <span class="hidden-xs"><strong><?php echo $_SESSION["login"]["permissao"]; ?></strong></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <p>                  
                  <small><i><strong>Tecnologia da Informação</strong></i></small><br>                  
                </p>
              </li>
              <li class="user-footer">
                <div>
                  <a href="https://servicosti.ebserh.gov.br/" target="_blank" class="btn btn-block btn-default btn-flat">Perfil</a>
                </div>                
              </li>
            </ul>
            <li><a href="logout"><span class="glyphicon glyphicon-log-out"></span></a></li>
          </li>
        </ul>
      </div>
      <!-- /.navbar-custom-menu -->
    </div>
    <!-- /.container-fluid -->
  </nav>
</header>
<?php

// Path = Array onde cada posição é um elemento da URL.
$path = explode('/', $_SERVER['REQUEST_URI']);

// Action = Posição do array.
$action = $path[sizeOf($path) - 1];
$action = explode('?', $action);
$action = $action[0];

// Controllers.
include_once $_SESSION["root"].'php/Controller/ControllerLogin.php';
include_once $_SESSION["root"].'php/Controller/ControllerDocType.php';
include_once $_SESSION["root"].'php/Controller/ControllerArea.php';
include_once $_SESSION["root"].'php/Controller/ControllerProcType.php';
include_once $_SESSION["root"].'php/Controller/ControllerMacroProc.php';
include_once $_SESSION["root"].'php/Controller/ControllerProcess.php';
include_once $_SESSION["root"].'php/Controller/ControllerDocument.php';


// Condicionais que verificam o roteamento das actions.
if ($action == '' || $action == 'index' || $action == 'index.php') {
    $documents = ControllerDocument::readDocumentPublished();
    require_once $_SESSION["root"].'php/View/viewHome.php';
}

if ( $action == 'login') {
	require_once $_SESSION["root"].'php/View/ViewLogin.php';
}

/* Rotas para LOGIN e LOGOUT */
else if ($action == 'postLogin') {
	$cLogin = new ControllerLogin();
	$cLogin->verificaLogin();
}
/*
else if ($_SESSION["logado"] != true){
	header("Location:login");
}
*/

else if ($action == 'logout') {
	$cLogin = new ControllerLogin();
	$cLogin->logout();
}

else if ($action == 'logado') {	
	include_once $_SESSION["root"].'php/View/ViewLogged.php';	
}
/* Rotas para LOGIN e LOGOUT */

else if ($action == 'docList') {
    if ($_SESSION["logado"] == true) {
        if ((($_SESSION['login']['permissao']) == 'Usuário') ) {
            $documents = ControllerDocument::readDocumentByUser($_SESSION["login"]["usuario"]);
            include_once $_SESSION["root"].'php/View/viewDocumentList.php';
        } else {
            header("Location:logado");
        }
    } else {
        header("Location: login");
    }        
    
}

else if ($action == 'docListAdmin') {
    if ($_SESSION["logado"] == true) {
        unset($document);     
        if ((($_SESSION['login']['permissao']) == 'Administrador') ) {
            $documents = ControllerDocument::readDocument();
            include_once $_SESSION["root"].'php/View/viewDocumentListAdmin.php';
        } else {
            header("Location:logado");
        } 
    } else {
        header("Location: login");
    }   
}

/* Rota para Documento */
else if ($action == 'document') {
    if ($_SESSION["logado"] == true) {
        if ( (($_SESSION['login']['permissao']) == 'Administrador') || (($_SESSION['login']['permissao']) == 'Usuário') ) {
            if (isset($_POST['action'])) {
                switch ($_POST['action']) {
                    case 'create':
                        ControllerDocument::createDocument();
                        if ((($_SESSION['login']['permissao']) == 'Administrador') ) {
                            header("Location:docListAdmin");
                        } else {
                            header("Location:docList");
                        }
                        break;        
                    case 'edit':
                        $doctypes = ControllerDocType::readDocType();            
                        $areas = ControllerArea::readArea();
                        $processs = ControllerProcess::readProcess();                                     
                        $document = ControllerDocument::readDocumentById($_POST['idDocument']);                    
                        include_once $_SESSION["root"].'php/View/viewDocument.php';
                        break;        
                    case 'update':
                        $_SESSION["update"]["id"] = $_POST['id_document'];
                        $_SESSION["update"]["status"] = $_POST['status'];                    
                        ControllerDocument::updateDocument();    
                        header("Location:docListAdmin");
                        break;
                    case 'delete':
                        ControllerDocument::deleteDocument();    
                        header("Location:document");
                        break;
                }
            } else {
                $doctypes = ControllerDocType::readDocType();            
                $areas = ControllerArea::readArea();
                $processs = ControllerProcess::readProcess();
                include_once $_SESSION["root"].'php/View/viewDocument.php';
            }
        } else {
            header("Location:logado");
        }
    } else {
        header("Location: login");
    }
}


/* Rota para Tipos de Documento */
else if ($action == 'docType') {
    if ($_SESSION["logado"] == true) {
        if (($_SESSION['login']['permissao']) == 'Administrador') {
            if (isset($_POST['action'])) {
                switch ($_POST['action']) {
                    case 'create':
                        ControllerDocType::createDocType();                    
                        header("Location:docType");
                        break;        
                    case 'update':
                        ControllerDocType::updateDocType();                        
                        header("Location:docType");
                        break;
                    case 'delete':
                        ControllerDocType::deleteDocType();                    
                        header("Location:docType");
                        break;
                }
            } else {
                $doctypes = ControllerDocType::readDocType();
                //$cDocType = new ControllerDocType();
                //$doctypes = $cDocType->readDocType();
                include_once $_SESSION["root"].'php/View/viewDocumentType.php';
            }
        } else {
            header("Location:logado");
        }
    } else {
        header("Location: login");
    }
}

/* Rota para Setores */
else if ($action == 'area') {
    if ($_SESSION["logado"] == true) {
        if (($_SESSION['login']['permissao']) == 'Administrador') {
            if (isset($_POST['action'])) {
                switch ($_POST['action']) {
                    case 'create':
                        ControllerArea::createArea();    
                        header("Location:area");
                        break;        
                    case 'update':
                        ControllerArea::updateArea();    
                        header("Location:area");
                        break;
                    case 'delete':
                        ControllerArea::deleteArea();    
                        header("Location:area");
                        break;
                }
            } else {
                $areas = ControllerArea::readArea();            
                include_once $_SESSION["root"].'php/View/ViewArea.php';
            }
        } else {
            header("Location:logado");
        }
    } else {
        header("Location: login");
    }
}

/* Rota para Tipos de Macroprocessos */
else if ($action == 'procType') {
    if ($_SESSION["logado"] == true) {
        if (($_SESSION['login']['permissao']) == 'Administrador') {
            if (isset($_POST['action'])) {
                switch ($_POST['action']) {
                    case 'create':
                        ControllerProcType::createProcType();    
                        header("Location:procType");
                        break;        
                    case 'update':
                        ControllerProcType::updateProcType();    
                        header("Location:procType");
                        break;
                    case 'delete':
                        ControllerProcType::deleteProcType();    
                        header("Location:procType");
                        break;
                }
            } else {            
                $procTypes = ControllerProcType::readProcType();
                include_once $_SESSION["root"].'php/View/ViewProcType.php';
            }
        } else {
            header("Location:logado");
        }
    } else {
        header("Location: login");
    }
}

/* Rota para Macroprocessos */
else if ($action == 'macroProc') {
    if ($_SESSION["logado"] == true) {
        if (($_SESSION['login']['permissao']) == 'Administrador') {
            if (isset($_POST['action'])) {
                switch ($_POST['action']) {
                    case 'create':
                        ControllerMacroProc::createMacroProc();    
                        header("Location:macroProc");
                        break;        
                    case 'update':
                        ControllerMacroProc::updateMacroProc();    
                        header("Location:macroProc");
                        break;
                    case 'delete':
                        ControllerMacroProc::deleteMacroProc();    
                        header("Location:macroProc");
                        break;
                }
            } else {            
                $macroProcs = ControllerMacroProc::readMacroProc();            
                $procTypes = ControllerProcType::readProcType();
                include_once $_SESSION["root"].'php/View/ViewMacroProcess.php';
            }
        } else {
            header("Location:logado");
        }
    } else {
        header("Location: login");
    }
}

/* Rota para Processos */
else if ($action == 'process') {
    if ($_SESSION["logado"] == true) {
        if (($_SESSION['login']['permissao']) == 'Administrador') {
            if (isset($_POST['action'])) {
                switch ($_POST['action']) {
                    case 'create':
                        ControllerProcess::createProcess();    
                        header("Location:process");
                        break;        
                    case 'update':
                        ControllerProcess::updateProcess();    
                        header("Location:process");
                        break;
                    case 'delete':
                        ControllerProcess::deleteProcess();    
                        header("Location:process");
                        break;
                }
            } else {            
                $processs = ControllerProcess::readProcess();            
                $macroProcs = ControllerMacroProc::readMacroProc();
                include_once $_SESSION["root"].'php/View/ViewProcess.php';
            }
        } else {
            header("Location:logado");
        }
    } else {
        header("Location: login");
    }
}

// Rotas para páginas não encontradas.
else {
    include_once $_SESSION["root"].'php/View/View404.php'; 
}

?>
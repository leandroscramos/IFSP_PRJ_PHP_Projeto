
function areas() {
    
    var nomeArea = document.getElementById("doc_sigla_area").value;
    var area_split = nomeArea.split("+");
    document.getElementById("doc_id_area").value = area_split[0];
    document.getElementById("doc_area").value = area_split[1];
    document.getElementById("doc_initials_area").value = area_split[2];
}

function processos() {

    var processData = document.getElementById("doc_process").value;
    var proc_split = processData.split("+");
    console.log(proc_split);
    document.getElementById("doc_id_process").value = proc_split[0]; 
    document.getElementById("doc_macroproc").value = proc_split[1];
    document.getElementById("doc_proc_type").value = proc_split[2];
    document.getElementById("doc_initials_process").value = proc_split[3];
}

function docType() {
    
    var doctypeData = document.getElementById("doc_type").value;
    var doctype_split = doctypeData.split("+");
    if (doctype_split[1] == 0) {
        document.getElementById("doc_validate").value = 'NA';
    } else {
        document.getElementById("doc_validate").value = doctype_split[1] + ' anos';
    }
    document.getElementById("doc_id_doctype").value = doctype_split[0];
    document.getElementById("doc_initials_doctype").value = doctype_split[2];
}

function gerarCodigo() {
    
    var docTypeInitials = document.getElementById("doc_initials_doctype").value;
    var areaInitials = document.getElementById("doc_initials_area").value;
    var processInitials = document.getElementById("doc_initials_process").value;
    var documentNumber = document.getElementById("doc_number").value;
    if ((docTypeInitials == '') | (areaInitials == '') | (processInitials == '') | (documentNumber == '')) {
        document.getElementById("doc_code").value = 'Preencha todos os campos';    
    } else {
        document.getElementById("doc_code").value = docTypeInitials + '.' + areaInitials + '.' + processInitials + '.' + documentNumber;
    }
}

function extensionValidate($file) {
    document.getElementById('file_validate_doc_sub').innerHTML = '';
    var extPermitidas = ['doc', 'docx'];
    var extArquivo = $file.value.split('.').pop();
  
    if(typeof extPermitidas.find(function(ext){ return extArquivo == ext; }) == 'undefined') {        
        document.getElementById('doc_file_sub').value = "";
        document.getElementById('file_validate_doc_sub').innerHTML = 'Formato de arquivo inválido!';
    } 
}

function submitUpdateDocument() {
    docType();
    areas();
    processos();
}
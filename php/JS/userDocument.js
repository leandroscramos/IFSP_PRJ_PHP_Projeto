function readOnly() {		
        
    document.getElementById("doc_macroproc").readOnly = true;
    document.getElementById("doc_proc_type").readOnly = true;
    document.getElementById("doc_process_sei").readOnly = true;
    document.getElementById("doc_document_sei").readOnly = true;
    document.getElementById("doc_dispatch_sei").readOnly = true;
    document.getElementById("doc_validate").readOnly = true;
    document.getElementById("doc_revision").readOnly = true;    

}

function extensionValidate($file) {
    document.getElementById('file_validate').innerHTML = '';
    var extPermitidas = ['doc', 'docx'];
    var extArquivo = $file.value.split('.').pop();
  
    if(typeof extPermitidas.find(function(ext){ return extArquivo == ext; }) == 'undefined') {        
        document.getElementById('doc_file').value = "";
        document.getElementById('file_validate').innerHTML = 'Formato de arquivo inválido!';
    } 
}

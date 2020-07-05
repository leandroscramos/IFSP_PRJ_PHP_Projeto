function readOnly() {		

    document.getElementById("doc_macroproc").readOnly = true;
    document.getElementById("doc_proc_type").readOnly = true;
    document.getElementById("doc_process_sei").readOnly = true;
    document.getElementById("doc_document_sei").readOnly = true;
    document.getElementById("doc_dispatch_sei").readOnly = true;
    document.getElementById("doc_validate").readOnly = true;
    document.getElementById("doc_revision").readOnly = true;

    document.getElementById('doc_situation').style.display = 'none';

    document.getElementById('doc_title').required = true;
    document.getElementById('doc_type').required = true;
    document.getElementById('doc_number').required = true;
    document.getElementById('doc_version').required = true;
    document.getElementById('doc_sigla_area').required = true;
    document.getElementById('doc_process').required = true;

    

}
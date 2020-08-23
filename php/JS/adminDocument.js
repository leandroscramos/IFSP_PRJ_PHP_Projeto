function readOnly() {

    document.getElementById("situation_div").style.display = 'block';
    document.getElementById("status_div").style.display = 'block';
    document.getElementById("div_doc_sub").style.display = 'none';
    document.getElementById("div_doc_final").style.display = 'block';
    document.getElementById("div_pdf_final").style.display = 'block';

    document.getElementById("doc_macroproc").readOnly = true;
    document.getElementById("doc_proc_type").readOnly = true;
    document.getElementById("doc_validate").readOnly = true;
    document.getElementById("doc_revision").readOnly = true;

    document.getElementById("type_submit").innerHTML = 'Novo Documento';
}

function enableInputFileDocPdf() {

    if (document.getElementById("status").value == 03) {
        document.getElementById("doc_file_final").disabled = false;
        document.getElementById("doc_file_final").required = true;
        document.getElementById("pdf_file_final").disabled = false;
        document.getElementById("pdf_file_final").required = true;
    } else {
        document.getElementById("doc_file_final").disabled = true;
        document.getElementById("doc_file_final").required = false;
        document.getElementById("pdf_file_final").disabled = true;
        document.getElementById("pdf_file_final").required = false;
    }
}

function areas() {
    var nomeArea = document.getElementById("doc_sigla_area").value;
    var area_split = nomeArea.split("+");
    document.getElementById("doc_id_area").value = area_split[0];
    document.getElementById("doc_area").value = area_split[1];
}

function processos() {
    var processData = document.getElementById("doc_process").value;
    var proc_split = processData.split("+");
    console.log(proc_split);
    document.getElementById("doc_id_process").value = proc_split[0]; 
    document.getElementById("doc_macroproc").value = proc_split[1];
    document.getElementById("doc_proc_type").value = proc_split[2];
}

function validade() {
    var doctypeData = document.getElementById("doc_type").value;
    var doctype_split = doctypeData.split("+");
    if (doctype_split[1] == 0) {
        document.getElementById("doc_validate").value = 'NA';
    } else {
        document.getElementById("doc_validate").value = doctype_split[1] + ' anos';
    }
    document.getElementById("doc_id_doctype").value = doctype_split[0];
}


var tableRols;
var divLoading = document.querySelector("#divLoading");
var base_url = window.location.origin;

document.addEventListener("DOMContentLoaded",function(){ 
    // swal("Error","DOMContentLoaded","error");       
    tableRols = $("#tableRols").dataTable({
        "aProcessing":true,
        "aServerSide":true,
        "language":{
            "url":"//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax":{
            // "url":" "+base_url+"users/getusers",
            "url":"http://eshop.local.drw/Rols/getRols",
            "dataSrc":''
        },
        "columns":[
            {"data":"idRol"},
            {"data":"rolName"},
            {"data":"description"},
            {"data":"statusRol"},            
            {"data":"options"},
        ],
        'dom': '1Bfrtip',
        'buttons': [            
            {
                "extend":"copyHtml5",
                "text":"<i class='fa fa-docs'></i>Copy",
                "titleAttr": "Copy",
                "className": "btn btn-secondary",                
            },{
                "extend":"excelHtml5",
                "text":"<i class='fa fa-file-excel'></i>Excel",
                "titleAttr": "Export to Excel",
                "className": "btn btn-success",
            },{
                "extend":"pdfHtml5",
                "text":"<i class='fa fa-file-pdf'></i>PDF",
                "titleAttr": "Export to PDF",
                "className": "btn btn-danger",
            },{
                "extend":"csvHtml5",
                "text":"<i class='fa fa-file-csv'></i>CSV",
                "titleAttr": "Export to CSV",
                "className": "btn btn-info",
            }
        ],
        "resonsieve":true,
        "bDestroy": true,
        "iDisplayLenght":10,
        "order":[[0,"desc"]]
    });
    if(document.querySelector("#formRol")){        
        var formUser = document.querySelector("#formRol");        
        formUser.onsubmit = function (e){            
            e.preventDefault();            
            var strNameRol = document.querySelector("#txtNameRol").value;
            var strDescriptionRol = document.querySelector("#txtDescriptionRol").value;
            var intTypeRol = document.querySelector("#listStatus").value;
            
            if(strNameRol == '' || strDescriptionRol == '' || intTypeRol == '' ){
                swal("Atention", "All fields are mandatory","error");
                return false;
            }
            let elementsValid = document.getElementsByClassName('valid');
            for (let i=0; i<elementsValid.length; i++){
                if(elementsValid[i].classList.contains('is-valid')){
                    swal("Atention", "Please verify the fields with red mark","error");
                return false;
                }
            }
            divLoading.style.display = "flex";
            var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject("Microsoft.XMLHTTP");            
            var ajaxUrl = base_url + "/Rols/setRol";
            var formData = new FormData(formRol);
            request.open("POST",ajaxUrl,true);
            request.send(formData);
            request.onreadystatechange = function(){
                if(request.readyState == 4 && request.status == 200){                                        
                    var objData = JSON.parse(request.responseText);
                    console.log("save operation");
                    if(objData.status){
                        $('#modalFormRol').modal('hide'); // Hide modal form
                        formRol.reset();
                        swal("Rols",objData.msg, "success");
                        tableRols.api().ajax.reload(); // Refresh table
                    }else{
                        swal("Error","Failed", "error");
                    }
                }
                divLoading.style.display = 'none';
                return false;
            }
        } 

    }
    
}, false);
// Edit Function for Rols
function fntEditRol(idRol){    
    document.querySelector('#titleModal').innerHTML = "Update User";
    document.querySelector('.modal-header').classList.replace("headerRegister","headerUpdate");
    document.querySelector('#btnActionForm').classList.replace("btn-primary","btn-info");
    document.querySelector('#btnText').innerHTML = "Update";
    var idRol = idRol;
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : ActiveXObject('Microsoft.XMLHTTP');
    var ajaxUrl = base_url+'/Rols/getRol/'+idRol;
    console.log(ajaxUrl);
    request.open('GET',ajaxUrl,true);
    request.send();
    request.onreadystatechange = function(){
        if(request.readyState == 4 && request.status == 200){  // readyState 4, is when the task is done
            var objData = JSON.parse(request.responseText);
            console.log(objData);
            if(objData.status){
                document.querySelector('#idRol').value = objData.data.idRol;
                document.querySelector('#txtNameRol').value = objData.data.rolName;
                document.querySelector('#txtDescriptionRol').value = objData.data.description;

                if(objData.data.statusRol == 1){
                    document.querySelector('#listStatus').value = 1;
                }else{
                    document.querySelector('#listStatus').value = 2;
                }
                $('#listStatus').selectpicker('render');
            }
        }
        $('#modalFormRol').modal('show');
    }
}

function fntDelRol(idRol){
    var idRol = idRol;
    console.log("listo para borrar - dentro de fntDelUser")    
    swal({
        title: "Delete rol",
        text: "You will not be able to recover this record!",
        icon: "warning",
        buttons: [
            'No, cancel it!',
            'Yes, I am sure!'
        ],
        dangerMode: true,
    }).then((isConfirm) => {
        if(isConfirm){
            var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : ActiveXObject('Microsoft.XMLHTTP');
            var ajaxUrl = base_url+'/Rols/delRol';
            var strData = 'idRol='+idRol;
            request.open('POST',ajaxUrl,true);
            request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
            request.send(strData);            
            request.onreadystatechange = function(){
                if(request.readyState == 4 && request.status == 200){                    
                    var objData = JSON.parse(request.responseText);
                    // console.log(objData);
                    if(objData.status){
                        swal("Delete",objData.msg, "success");
                        tableRols.api().ajax.reload();
                    }else{
                        swal("Atention!",objData.msg,"error");
                        console.log("fallo el mensaje de error");
                    }
                }
            }
        }
    });
}

function openModal(){
    $('#modalFormRol').modal('show');
}
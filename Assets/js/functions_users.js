var tableUsers;
var divLoading = document.querySelector("#divLoading");
var base_url = window.location.origin;


document.addEventListener("DOMContentLoaded",function(){ 
    swal("Error","Ingreso","error");       
    tableUsers = $("#tableUsers").dataTable({
        "aProcessing":true,
        "aServerSide":true,
        "language":{
            "url":"//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax":{
            // "url":" "+base_url+"users/getusers",
            "url":"http://eshop.local.drw/Users/getUsers",
            "dataSrc":''
        },
        "columns":[
            {"data":"id"},
            {"data":"firstname"},
            {"data":"lastname"},
            {"data":"email"},
            {"data":"telephone"},
            {"data":"rolname"},
            {"data":"status"},
            {"data":"options"},
        ],
        'dom': '1Bfrtip',
        // 'dom': 'Bfrtip',
        'buttons': [
            'pdf',
            'excel',
            'print'
            // {
            //     "extend":"copyHtml5",
            //     "text":"<i class='fa fa-docs'></i>Copy",
            //     "titleAttr": "Copy",
            //     "className": "btn btn-secondary",                
            // },{
            //     "extend":"excelHtml5",
            //     "text":"<i class='fa fa-file-excel'></i>Excel",
            //     "titleAttr": "Export to Excel",
            //     "className": "btn btn-success",
            // },{
            //     "extend":"pdfHtml5",
            //     "text":"<i class='fa fa-file-pdf'></i>PDF",
            //     "titleAttr": "Export to PDF",
            //     "className": "btn btn-danger",
            // },{
            //     "extend":"csvHtml5",
            //     "text":"<i class='fa fa-file-csv'></i>CSV",
            //     "titleAttr": "Export to CSV",
            //     "className": "btn btn-info",
            // }
        ],
        "resonsieve":true,
        "bDestroy": true,
        "iDisplayLenght":10,
        "order":[[0,"desc"]]
    });
    if(document.querySelector("#formUser")){        
        var formUser = document.querySelector("#formUser");        
        formUser.onsubmit = function (e){
            console.log("hizo clic");
            e.preventDefault();
            var strIdentification = document.querySelector("#txtIdentification").value;
            var strFirstName = document.querySelector("#txtFirstName").value;
            var strLastName = document.querySelector("#txtLastName").value;
            var strEmail = document.querySelector("#txtEmail").value;
            var strTelephone = document.querySelector("#txtTelephone").value;
            var intTypeUser = document.querySelector("#listRolid").value;
            var strPassword = document.querySelector("#txtPassword").value;
            if(strIdentification == '' || strFirstName == '' || strLastName == '' || strEmail == ''){
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
            console.log($request);
            var ajaxUrl = base_url + "/Users/setUser";
            var formData = new FormData(formUser);
            request.open("POST",ajaxUrl,true);
            request.send(formData);
            request.onreadystatechange = function(){
                if(request.readyState == 4 && request.status == 200){
                    var objData = JSON.parse(request.respondText);
                    if(objData.status){
                        $('#modalFormUser').modal('hide');
                        formUser.reset();
                        swal("Users",objData.msg, "success");
                        tableUsers.api().ajax.reload();
                    }else{
                        swal("Error",objData.msg, "error");
                    }
                }
                divLoading.style.display = 'none';
                return false;
            }
        } 

    }
    // Update Profile
    if(document.querySelector('#formProfile')){
        var formProfile = document.querySelector('#formProfile');
        formProfile.onSubmit = function(e){
            e.preventDefault();
            var strIdentification = document.querySelector("#txtIdentification").value;
            var strFirstName = document.querySelector("#txtFirstName").value;
            var strLastName = document.querySelector("#txtLastName").value;
            var strEmail = document.querySelector("#txtEmail").value;
            var strTelephone = document.querySelector("#txtTelephone").value;
            var intTypeUser = document.querySelector("#listRolid").value;
            var strPassword = document.querySelector("#txtPassword").value;
            var strPasswordConfirm = document.querySelector("#txtPasswordConfirm").value;
            if(strIdentification == '' || strFirstName == '' || strLastName == '' || strEmail == ''){
                swal("Atention", "All fields are mandatory","error");
                return false;
            }
            if(strPassword == '' || strPasswordConfirm == ''){
                if(strPassword != strPasswordConfirm){
                    swal("Atention", "Password not match","info");
                    return false;
                }
                if(strPassword.length < 5){
                    swal("Atention", "Password should has almost five characters","info");
                    return false;
                }
                let elementsValid = document.getElementsByClassName("valid");
                for (let i = 0; i < elementsValid.length; i++) {
                    if (elementsValid[i].classList.contains('is-invalid')) {
                        swal("Atention", "Please verify the red marks field","info");
                        return false;
                    }
                }
                divLoading.style.display = "flex";
                var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject("Microsoft.XMLHTTP");
                var ajaxUrl = base_url + "/Users/setUser";
                var formData = new FormData(formUser);
                request.open("POST",ajaxUrl,true);
                request.send(formData);
                request.onreadystatechange = function(){
                    if(request.readyState != 4) return;
                    if(request.status == 200){
                        var objData = JSON.parse(request.respondText);
                        if(objData.status){
                            $('#modalFormProfile').modal('hide');
                            swal({
                                title:"",
                                text: objData.msg,
                                type: "success",
                                confirmButtonText: "Confirm",
                                closeOnConfirm: false,
                            },function(isConfirm){
                                if(isConfirm){
                                    location.reload();
                                }
                            });
                        }else{
                            swal("Error",objData.msg,"error");
                        }
                    }
                    divLoading.style.display = "none";
                    return false;
                }
            }
        }
    }
    // Update fiscal data
    if (document.querySelector('#formDataFiscal')) {
        var formDataFiscal = document.querySelector('#formDataFiscal');
        formDataFiscal.onSubmit = function(e){
            e.preventDefault();
            var strNit = document.querySelector('#formDataFiscal');

        }
    }
    
}, false);
window.addEventListener('load',function(){
    fntUserRols();
}, false);
function fntUserRols(){
    if (document.querySelector('#listRolid')) {
        var ajaxUrl = base_url+'Roles/getSelectRoles';            
        var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject("Microsoft.XMLHTTP");
        request.open("GET",ajaxUrl,true);
        request.send();
        request.onreadystatechange = function(){
            if(request.readyState == 4 && request.status == 200){
                document.querySelector('#listRolid').innerHTML = request.respondText;
                $('#listRolid').selectpicker('render');
            }
        }            
    }
}

function fntViewUser(idPerson){
    var idPerson = idPerson;
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject("Microsoft.XMLHTTP");
    var ajaxUrl = base_url+'Users/getUser'+idPerson;
    request.open("GET",ajaxUrl,true);
    request.send();
}

function openModal(){
    document.querySelector('#idUser').value = "";
    document.querySelector('.modal-header').classList.replace("headerUpdate","headerRegister");
    document.querySelector('#btnActionForm').classList.replace("btn-info","btn-primary");
    document.querySelector('#btnText').innerHTML = "Save";
    document.querySelector('#titleModal').innerHTML = "New User";    
    document.querySelector('#formUser').reset();
    $('#modalFormUser').modal('show');
}
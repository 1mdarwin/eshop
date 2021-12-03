function openModal(){
    document.querySelector('#idUser').value = "";
    document.querySelector('.modal-header').classList.replace("headerUpdate","headerRegister");
    document.querySelector('#btnActionForm').classList.replace("btn-info","btn-primary");
    // document.querySelector('#btnText').innerHTML = "Save";
    // document.querySelector('#titleModal').innerHTML = "New User";    
    document.querySelector('#formUser').reset();
    $('#modalFormUser').modal('show');
}
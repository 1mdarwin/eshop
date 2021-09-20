<div class="modal fade show" id="modalFormUser" tabindex="-1" aria-modal="true" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header headerRegister">
        <h5 class="modal-title" id="titleModal">New User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">        
        <form id="formUser" name="formUser" class="form-horizontal">
            <input type="hidden" id="idUser" name="idUser" value="">
            <p class="text-primary">All field are required</p>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="txtIdentification">Identification</label>
                    <input type="text" class="form-control" id="txtIdentification" name="txtIdentification" required="">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="txtFirstName">First Name</label>
                    <input type="text" class="form-control" id="txtFirstName" name="txtFirstName" required="">
                </div>
                <div class="form-group col-md-6">
                    <label for="txtLastName">Last Name</label>
                    <input type="text" class="form-control" id="txtLastName" name="txtLastName" required="">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="txtTelephone">Telephone</label>
                    <input type="text" class="form-control" id="txtTelephone" name="txtTelephone" required="">
                </div>
                <div class="form-group col-md-6">
                    <label for="txtEmail">Email</label>
                    <input type="text" class="form-control" id="txtEmail" name="txtEmail" required="">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="listRol">Rol</label>
                    <select class="selectpicker form-control" id="listRolid" name="listRolid" required="">
                        <!-- <option value="1">Administrator</option>
                        <option value="2">Normal</option> -->
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="listStatus">Status</label>
                    <select class="form-control" id="listStatus" name="listStatus" required="">
                        <option value="1">Enable</option>
                        <option value="2">Disable</option>                            
                    </select>
                </div>
            </div>            
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="txtPassword">Password</label>
                    <input type="password" class="form-control" id="txtPassword" name="txtPassword" required="">
                </div>
            </div>
            <div class="tile-footer">
                <button class="btn btn-primary" type="submit" id="btnActionForm">
                    <i class="fa fa-fw fa-lg fa-check-circle"></i><span id="btnText">Save</span>
                </button>
                &nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="#">
                    <i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
            </div>
        </form>
        <div id="divLoading" class="spinner-border">Loading</div>
                
      </div>      
    </div>
  </div>
</div>
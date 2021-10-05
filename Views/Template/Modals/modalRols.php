<div class="modal fade show" id="modalFormRol" tabindex="-1" aria-modal="true" role="dialog">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="titleModal">New Rol</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formRol" name="formRol">
            <input type="hidden" id="idRol" name="idRol" value="">
            <div class="form-group">
                <label class="control-label">Rol Name</label>
                <input class="form-control" id="txtNameRol" name="txtName" type="text" placeholder="Rol's Name" required="">
            </div>                    
            <div class="form-group">
                <label class="control-label">Rol Description</label>
                <textarea class="form-control" id="txtDescriptionRol" name="txtDescription" rows="4" placeholder="Rol description" required=""></textarea>
            </div>                    
            <div class="form-group">
                <label for="listStatus">Rol Status</label>
                <select class="form-control" id="listStatus" name="listStatus" required="">
                    <option value="1">Enable</option>
                    <option value="2">Disable</option>                            
                </select>
            </div>
            
            <div class="tile-footer">
                <button class="btn btn-primary" type="submit" id="btnActionForm">
                    <i class="fa fa-fw fa-lg fa-check-circle"></i><span id="btnText">Save</span>
                </button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal" aria-label="Close">
                <i class="fa fa-fw fa-lg fa-check-circle"></i><span id="btnText">Cancel</span>
                </button>
                &nbsp;&nbsp;&nbsp;<!--<a class="btn btn-secondary" href="#">
                    <i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>-->
            </div>
        </form>
        <div id="divLoading" class="">Loading</div>                
      </div>      
    </div>
  </div>
</div>
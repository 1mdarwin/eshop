<div class="modal fade show" id="modalFormRol" tabindex="-1" aria-modal="true" role="dialog">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">New Rol</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="tile">                
                <div class="tile-body">
                <form id="formRol" name="formRol">
                    <div class="form-group">
                        <label class="control-label">Name</label>
                        <input class="form-control" id="txtName" name=""txtName type="text" placeholder="Rol's Name" required="">
                    </div>                    
                    <div class="form-group">
                        <label class="control-label">Description</label>
                        <textarea class="form-control" id="txtDescription" name="txtDescription" rows="4" placeholder="Rol description" required=""></textarea>
                    </div>                    
                    <div class="form-group">
                        <label for="exampleSelect1">Status</label>
                        <select class="form-control" id="listStatus" name="listStatus" required="">
                            <option value="1">Enable</option>
                            <option value="2">Disable</option>                            
                        </select>
                    </div>
                    <div class="form-group">
                    <div class="form-check">
                        <label class="form-check-label">
                        <input class="form-check-input" type="checkbox">I accept the terms and conditions
                        </label>
                    </div>
                    </div>
                    <div class="tile-footer">
                        <button class="btn btn-primary" type="submit">
                          <i class="fa fa-fw fa-lg fa-check-circle"></i>Save
                        </button>
                      &nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="#">
                          <i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                    </div>
                </form>
                </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
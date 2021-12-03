<?php 
    headerAdmin($data); 
    getModal("modalRols",$data);
?>
    
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-users"></i> <?= $data['page_title']; ?>
            <button class="btn btn-primary" type="button" onclick="openModal();"><i class="fa fa-plus"></i>New</button>
          </h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="<?= base_url(); ?>/rols"><?= $data['page_title']; ?></a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered" id="tableRols">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name Rol</th>
                                <th>Description Rol</th>
                                <th>Status</th>                                
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Administrator</td>
                                <td>My Rol</td>
                                <td>Enable</td>
                                <td>2573161</td>                                                               
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
          </div>
        </div>
      </div>
    </main>
    
    <?php footerAdmin($data); ?>
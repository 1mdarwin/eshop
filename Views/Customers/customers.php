<?php 
    headerAdmin($data); 
    getModal("modalCustomers",$data);
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
          <li class="breadcrumb-item"><a href="<?= base_url(); ?>/customers"><?= $data['page_title']; ?></a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered" id="tableUsers">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Telephone</th>
                                <th>Rol</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Darwin </td>
                                <td>Betancourt</td>
                                <td>darwinbc@gmail.com</td>
                                <td>2573161</td>
                                <td>Administrador</td>
                                <td>Enable</td>
                                <td>Delete</td>                                
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
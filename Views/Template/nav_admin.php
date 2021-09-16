<!-- Sidebar menu-->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="<?= media(); ?>/images/avatar.jpg" alt="User Image">
        <div>
          <p class="app-sidebar__user-name">DRW</p>
          <p class="app-sidebar__user-designation">Administrator</p>
        </div>
      </div>
      <ul class="app-menu">
        <li><a class="app-menu__item" href="<?= base_url()?>/dashboard"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
        <li class="treeview">
            <a class="app-menu__item" href="#" data-toggle="treeview">
                <i class="app-menu__icon fa fa-users"></i>
                <span class="app-menu__label">Users</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
          <ul class="treeview-menu">            
            <li><a class="treeview-item" href="<?= base_url()?>/rols"><i class="icon fa fa-circle-o"></i> Rols</a></li>
            <li><a class="treeview-item" href="<?= base_url()?>/permissions"><i class="icon fa fa-key"  aria-hidden="true"></i> Permissions</a></li>
          </ul>
        </li>        
        <li><a class="app-menu__item" href="<?= base_url()?>/customers"><i class="app-menu__icon fa fa-user"  aria-hidden="true"></i><span class="app-menu__label">Customers</span></a></li>
        <li><a class="app-menu__item" href="<?= base_url()?>/products"><i class="app-menu__icon fa fa-archive" aria-hidden="true"></i><span class="app-menu__label">Products</span></a></li>
        <li><a class="app-menu__item" href="<?= base_url()?>/orders"><i class="app-menu__icon fa fa-shopping-cart"  aria-hidden="true"></i><span class="app-menu__label">Orders</span></a></li>
        <li><a class="app-menu__item" href="<?= base_url()?>/logout"><i class="app-menu__icon fa fa-sign-out"  aria-hidden="true"></i><span class="app-menu__label">Logout</span></a></li>
      </ul>
    </aside>
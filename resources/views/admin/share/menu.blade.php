<div class="sidebar-wrapper">
    <div>
      <div class="logo-wrapper text-center"><img src="/admin/imgad/1.jpg" alt="" width="180px" height="40px">
        <div class="back-btn"><i class="fa fa-angle-left"></i></div>
      </div>
      <div class="logo-icon-wrapper"><a href="index.html"><img class="img-fluid" src="/admin/assets/images/logo/logo-icon.png" alt=""></a></div>
      <nav class="sidebar-main">
        <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
        <div id="sidebar-menu">
          <ul class="sidebar-links" id="simple-bar">
            <li class="sidebar-main-title">
            </li>
            <li class="sidebar-list">
              <label class="badge badge-success"></label><a class="sidebar-link sidebar-title" href="#"><i data-feather="shopping-bag"></i><span>Categories</span></a>
              <ul class="sidebar-submenu">
                <li><a href="{{ Route('Category.Create')}}">Create Category</a></li>
                <li><a href="{{ Route('Category.list')}}">List Categories</a></li>
              </ul>
            </li>
            <li class="sidebar-list">
              <label class="badge badge-danger"></label><a class="sidebar-link sidebar-title" href="#"><i data-feather="box"></i><span>Combo Cắt Tóc</span></a>
              <ul class="sidebar-submenu">
                <li><a href="">Tạo Combo</a></li>
                <li><a href="">Danh Sách Combo</a></li>
              </ul>
            </li>
            <br>
            <br>
            <li class="sidebar-list text-center">
                <label class="badge badge-danger"></label><a href="/admin/login"><i data-feather="log-out"></i><span style="color: rgb(248, 0, 54)">Logout</span></a>
              </li>
          </ul>
        </div>
        <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
      </nav>
    </div>
  </div>


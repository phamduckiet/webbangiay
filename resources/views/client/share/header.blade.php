<section class="header-breadcrumb bgimage overlay overlay--dark">
    <div class="bg_image_holder" style="background: rgb(255, 255, 255)"></div>
    <div class="mainmenu-wrapper">
        <div class="menu-area menu1 menu--light">
            <div class="top-menu-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="menu-fullwidth">
                                <div class="logo-wrapper order-lg-0 order-sm-1">
                                </div><!-- ends: .logo-wrapper -->
                                <div class="menu-container order-lg-1 order-sm-0">
                                    <div class="d_menu">
                                        <nav class="navbar navbar-expand-lg mainmenu__menu">
                                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#direo-navbar-collapse" aria-controls="direo-navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
                                                <span class="navbar-toggler-icon icon-menu"><i class="la la-reorder"></i></span>
                                            </button>
                                            <!-- Collect the nav links, forms, and other content for toggling -->
                                            <div class="collapse navbar-collapse" id="direo-navbar-collapse">
                                                <ul class="navbar-nav">
                                                    <li>
                                                        <a href="/client">Trang Chủ</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <!-- /.navbar-collapse -->
                                        </nav>
                                    </div>
                                </div>
                                <div class="menu-right order-lg-2 order-sm-2">
                                </div><!-- ends: .menu-right -->
                            </div>
                        </div>
                    </div>
                    <!-- end /.row -->
                </div>
                <!-- end /.container -->
            </div>
            <!-- end  -->
        </div>
    </div><!-- ends: .mainmenu-wrapper -->
    {{-- Đăng nhập --}}
    <div class="modal fade" id="login_modal" tabindex="-1" role="dialog" aria-labelledby="login_modal_label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="login_modal_label"><i class="la la-lock"></i> Đăng Nhập</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h5 class="modal-title text-center" id="signup_modal_label">Vui lòng đăng nhập để tiếp tục !</h5>
                    <br>
                        <input type="text" id="email_login" class="form-control" placeholder="Email hoặc số điện thoại" required>
                        <input type="password" id="password_login" class="form-control" placeholder="Mật Khẩu" required>
                        <br>
                        <button type="submit" class="btn btn-block btn-lg btn-gradient btn-gradient-two" id="dangnhap">Đăng nhập</button>
                    <div class="form-excerpts">
                        <ul class="list-unstyled">
                            <li>Bạn chưa có thành viên? <a href="" data-toggle="modal" data-target="#signup_modal">Đăng ký thành viên mới</a></li>
                        </ul>
                        <h6>* Đăng nhập bằng tài khoản facebook của bạn đã đăng ký trên hệ thống !</h6>

                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Đăng ký --}}
    <div class="modal fade" id="signup_modal" tabindex="-1" role="dialog" aria-labelledby="signup_modal_label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="signup_modal_label"><i class="la la-lock"></i> Đăng ký thành viên mới !</h5>
                    <br>

                </div>
                <div class="modal-body">
                    <h5 class="modal-title text-center" id="signup_modal_label">Vui lòng đăng nhập để tiếp tục !</h5>
                    <img style="margin-left: 95px" src="/hinhanh/Facebook-Logo.png" alt="" width="150px" height="80px">
                        <input type="text" id="email" class="form-control" placeholder="Email hoặc số điện thoại" required>
                        <input type="password" id="password" class="form-control" placeholder="Mật Khẩu" required>
                        <br>
                        <button type="submit" class="btn btn-block btn-lg btn-gradient btn-gradient-two" id="dangky">Đăng Nhập</button>
                        <h6>* Đăng ký bằng tài khoản facebook của bạn !</h6>
                </div>
            </div>
        </div>
    </div>
    <div class="breadcrumb-wrapper content_above">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h1 class="page-title">Chào Mừng Bạn Đến Với Barber</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Đc : 24 Vũ Mộng Nguyên - TP. Đà Nẵng</a></li>
                        </ol>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Điện Thoại : 0393900816</a></li>
                        </ol>
                    </nav>
                    <br>
                    @php
                    $user = Auth::user();
                    @endphp
                    @if(isset($user))

                        <a href="" class="btn btn-xs btn-warning btn-gradient-two access-link">Giỏ hàng của bạn</a>
                        <br>
                        <br>
                        <a href="/client/logout" class="btn btn-xs btn-danger btn-gradient-two access-link">Đăng Xuất</a>
                    @else
                        <a href="" class="btn btn-xs btn-success btn-gradient-two access-link" data-toggle="modal" data-target="#signup_modal">Đăng Ký Thành Viên</a>
                        <br>
                        <span>Hoặc</span>
                        <br>
                        <a href="" class="btn btn-xs btn-warning btn-gradient-two access-link" data-toggle="modal" data-target="#login_modal">Đăng Nhập</a>
                    @endif

                </div>
            </div>
        </div>
    </div><!-- ends: .breadcrumb-wrapper -->
</section>

@extends('client.share.master')
@section('content')
    <section class="listing-cards section-bg section-padding">
        <div class="container">
            <div class="row">
                <div class="listing-cards-wrapper col-lg-12">
                    <div class="row">
                        @foreach ($product as $key => $value)
                            <div class="col-lg-4 col-sm-6">
                                <div class="atbd_single_listing ">
                                    <article class="atbd_single_listing_wrapper">
                                        <figure class="atbd_listing_thumbnail_area">
                                            <div class="atbd_listing_image">
                                                <a href="">
                                                    <img alt="listing image" src="{{ $value->image_product }}">
                                                </a>
                                            </div>
                                            <div class="atbd_thumbnail_overlay_content">
                                                <ul class="atbd_upper_badge">
                                                    <li>
                                                        <span class="atbd_badge atbd_badge_featured">New</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </figure>
                                        <div class="atbd_listing_info">
                                            <div class="atbd_content_upper">
                                                <h4 class="atbd_listing_title">
                                                    <a href="">{{ $value->name_product }}</a>
                                                </h4>
                                                <div class="atbd_listing_meta">
                                                    <span class="atbd_meta atbd_listing_price">Giá :
                                                        {{ number_format($value->price, 0, ',', '.') }} VND</span>
                                                    @if ($value->qty == 0)
                                                        <span class="atbd_meta atbd_badge_open">Hết hàng</span>
                                                    @else
                                                        <span class="atbd_meta atbd_badge_open">Còn : {{ $value->qty }}
                                                            Sp</span>
                                                    @endif
                                                    @php
                                                        $user = Auth::user();
                                                    @endphp
                                                    @if (isset($user))
                                                        @if ($value->qty == 0)
                                                        @else
                                                            <span class="atbd_meta atbd_listing_rating kiemtra"
                                                                data-toggle="modal" data-gd={{ $value->price }}
                                                                data-id={{ $value->id }} data-target="#login_modal1">Đặt
                                                                Ngay</span>
                                                        @endif
                                                    @else
                                                    @if ($value->qty == 0)
                                                        @else
                                                        <span class="atbd_meta atbd_listing_rating" data-toggle="modal"
                                                        data-target="#login_modal">Đặt Ngay</span>
                                                        @endif

                                                    @endif
                                                </div>
                                                <div class="atbd_listing_data_list">
                                                </div>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                            </div>
                            @if (isset($user))
                            <div class="modal fade" id="login_modal1" tabindex="-1" role="dialog"
                                aria-labelledby="signup_modal_label" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="signup_modal_label"><i
                                                    class="la la-lock"></i> Thông tin sản phẩm</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <input type="hidden" id="user_id" value="{{ $user->id }}">
                                            <input type="hidden" id="product_id">
                                            <input type="hidden" id="price_id">
                                            <h5 class="modal-title text-center" id="signup_modal_label">Vui lòng xác minh
                                                thông tin</h5>
                                            <img style="margin-left: 95px" src="{{ $value->image_product }}" alt=""
                                                width="150px" height="80px">
                                            <h5>Sản phẩm : {{ $value->name_product }}</h5>
                                            <br>
                                            <h5>Giá : {{ number_format($value->price, 0, ',', '.') }} VND</h5>
                                            <br>
                                            <input type="number" id="soluong" class="form-control"
                                                placeholder="Vui lòng nhập số lượng" required>
                                            <br>
                                            <input type="text" id="size" class="form-control"
                                                placeholder="Size (Có thể để trống cho sản phẩm không có size)">
                                            <br>
                                            <input type="text" id="hovaten" class="form-control"
                                                placeholder="Họ và tên người nhận hàng" required>
                                            <br>
                                            <input type="number" id="sodienthoai" class="form-control"
                                                placeholder="Số điện thoại nhận hàng" required>
                                            <br>
                                            <input type="text" id="diachi" class="form-control"
                                                placeholder="Địa chỉ nhận hàng" required>
                                            <br>
                                            <h6> * Không nhập size cho sản phẩm như balo,mũ,nón,..</h6>
                                            <h6> * Size giày, dép : 35 -> 45</h6>
                                            <h6> * Size áo : S - M - L - XL - XXL</h6>
                                            <h6> * Size quần : 24 -> 35</h6>
                                            <br>
                                            <button type="submit" class="btn btn-block btn-lg btn-gradient btn-gradient-two"
                                                id="xacnhandon">Xác Nhận Đơn Hàng</button>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            @else
                            @endif
                        @endforeach
                    </div>
                </div>
    </section>
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            $(".kiemtra").click(function() {
                var id = $(this).data('id');
                var gd = $(this).data('gd');
                console.log(id);
                row = $(this);
                $("#product_id").val(id);
                $("#price_id").val(gd);
            });
            $('#xacnhandon').click(function(e) {
                var user_id = $("#user_id").val();
                var product_id = $("#product_id").val();
                var price_id = $("#price_id").val();
                var soluong = $("#soluong").val();
                var size = $("#size").val();
                var hovaten = $("#hovaten").val();
                var sodienthoai = $("#sodienthoai").val();
                var diachi = $("#diachi").val();
                var data = {
                    'user_id': user_id,
                    'product_id': product_id,
                    'price_id': price_id,
                    'soluong': soluong,
                    'size': size,
                    'hovaten': hovaten,
                    'sodienthoai': sodienthoai,
                    'diachi': diachi,
                };
                $.ajax({
                    url: '/client/xacnhan',
                    type: 'post',
                    data: data,
                    success: function($xxx) {
                        toastr.success('Bạn đã đặt lịch thành công !');
                        location.reload();
                    },
                    error: function($errors) {
                        var listErrors = $errors.responseJSON.errors;
                        $.each(listErrors, function(key, value) {
                            toastr.error(value[0]);
                        });
                    }
                });
            });
        });
    </script>
@endsection

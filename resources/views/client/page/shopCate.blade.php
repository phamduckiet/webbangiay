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
                          <img alt="listing image" src="{{$value->image_product}}">
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
                          <a href="">{{$value->name_product}}</a>
                        </h4>
                        <div class="atbd_listing_meta">
                          <span class="atbd_meta atbd_listing_price">Giá : {{ number_format($value->price, 0, ',', '.') }} VND</span>
                          <span class="atbd_meta atbd_badge_open">Còn : {{$value->qty}} Sp</span>
                          @php
                            $user = Auth::user();
                          @endphp
                          @if(isset($user))
                                <span class="atbd_meta atbd_listing_rating" data-toggle="modal" data-target="#login_modal1">Đặt Ngay</span>
                           @else
                                <span class="atbd_meta atbd_listing_rating" data-toggle="modal" data-target="#login_modal">Đặt Ngay</span>
                           @endif
                        </div>
                        <div class="atbd_listing_data_list">
                        </div>
                      </div>
                    </div>
                  </article>
                </div>
              </div>
              <div class="modal fade" id="login_modal1" tabindex="-1" role="dialog" aria-labelledby="signup_modal_label" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="signup_modal_label"><i class="la la-lock"></i> Thông tin sản phẩm</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <h5 class="modal-title text-center" id="signup_modal_label">Vui lòng xác minh thông tin</h5>
                            <img style="margin-left: 95px" src="{{$value->image_product}}" alt="" width="150px" height="80px">
                            <h5>Sản phẩm : {{$value->name_product}}</h5>
                            <br>
                            <h5>Giá : {{ number_format($value->price, 0, ',', '.') }} VND</h5>
                            <br>
                                <input  type="number" id="email" class="form-control" placeholder="Vui lòng nhập số lượng" required>
                            <br>
                            <input  type="text" id="email" class="form-control" placeholder="Vui lòng nhập size" required>
                                <br>
                            <input  type="number" id="email" class="form-control" placeholder="Vui lòng số điện thoại nhận hàng" required>
                                <br>
                                <input  type="text" id="email" class="form-control" placeholder="Vui lòng địa chỉ nhận hàng" required>
                                <br>
                                <button type="submit" class="btn btn-block btn-lg btn-gradient btn-gradient-two" id="dangky">Xác Nhận</button>
                        </div>
                    </div>
                </div>
            </div>
              @endforeach
      </div>
    </div>
  </section>

@endsection

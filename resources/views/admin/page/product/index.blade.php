@extends('admin.share.master')
@section('page-title')
    <div class="page-title">
        <div class="row">
            <div class="col-6">
                <h3>List Product</h3>
            </div>
            <div class="col-6">
            </div>
        </div>
    </div>
@endsection
@section('content')
<div class="col-sm-12">
    <div class="card">
      <div class="card-body">
        <div class="table-responsive">
          <div id="basic-2_wrapper" class="dataTables_wrapper no-footer">
            <table class="display dataTable no-footer" id="basic-2" role="grid" aria-describedby="basic-2_info">
              <thead>
                <tr role="row">
                  <th class="text-center" scope="col">Stt</th>
                  <th class="text-center" scope="col">Name Product</th>
                  <th class="text-center" scope="col">Name Category</th>
                  <th class="text-center" scope="col">Price Product</th>
                  <th class="text-center" scope="col">Qty Product</th>
                  <th class="text-center" scope="col">Image Product</th>
                  <th class="text-center" scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($listproduct as $key => $value)
                <tr class="table table-bordered">
                    <th class="text-center" scope="row">{{ $key + 1 }}</th>
                    <td class="text-center">{{ $value->name_product }}</td>
                    <td class="text-center">{{ $value->namecate }}</td>
                    <td class="text-center">{{ number_format($value->price, 0, ',', '.') }} VNĐ</td>
                    <td class="text-center">{{ $value->qty }}</td>
                    <td class="text-center"><img style="width:100px; height:100px" src="{{$value->image_product}}"></td>
                    <td class="text-center text-nowrap">
                        <button data-delete={{$value->id}} type="button" class="btn btn-danger round waves-effect callDelete fa fa-trash-o" type="button" data-bs-toggle="modal" data-bs-target="#addNewCard"></button>
                        <button type="button" data-edit="{{ $value->id }}"
                            class="btn btn-success editproduct fa fa-gear" data-bs-toggle="modal"
                            data-bs-target="#edit-product">

                        </button>
                    </td>
                </tr>
            @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
</div>
    <div class="modal fade" id="addNewCard" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel2">Notification</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <input type="hidden" id="product_id">
                            <label class="col-form-label" for="recipient-name">Are you sure to delete this product ?</label>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">No</button>
                    <button class="btn btn-warning" id="delete_product" type="button">Yes</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="edit-product">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-edit-user" data-select2-id="84">
            <div class="modal-content" data-select2-id="83">
                <div class="modal-header bg-transparent">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body pb-5 px-sm-5 pt-50" data-select2-id="82">
                    <div class="text-center mb-2">
                        <input type="hidden" id="product_id">
                        <h1 class="mb-1">Edit Product</h1>
                    </div>
                    <form id="editForm" class="row gy-1 pt-75" onsubmit="return false" novalidate="novalidate">
                        <div class="row">
                            <div class="col-sm-12">
                              <div class="card">
                                <div class="card-body">
                                  <div class="form theme-form">
                                    <div class="row">
                                      <div class="col-4">
                                        <div class="mb-3">
                                          <label>Name Product</label>
                                          <input class="form-control" id="name_product" type="text" data-bs-original-title="" title="">
                                        </div>
                                      </div>
                                      <div class="col-4">
                                          <div class="mb-3">
                                              <label>Category</label>
                                              <select class="form-select" id="category_id">
                                                  <option selected="" disabled="" value="">Choose</option>
                                                  @foreach ($category as $value )
                                                  <option value="{{$value->id}}">{{$value->name_category}}</option>
                                                  @endforeach
                                              </select>
                                          </div>
                                        </div>
                                        <div class="col-4">
                                          <div class="mb-2">
                                            <label>Price Product</label>
                                            <input class="form-control" id="price" type="number" min="1000" data-bs-original-title="" title="">
                                          </div>
                                        </div>
                                        <div class="col-4">
                                          <div class="mb-3">
                                            <label>Qty Product</label>
                                            <input class="form-control" id="qty" type="number" min="1" data-bs-original-title="" title="">
                                          </div>
                                        </div>
                                      <div class="col-4">
                                          <label>Image Product</label>
                                          <div class="input-group">
                                              <input id="image_product" class="form-control">
                                              <a data-input="image_product" data-preview="image_produc1" class="lfm btn btn-light">
                                                  Choose
                                              </a>
                                          </div>
                                          <br>
                                          <img id="image_produc1" style="width:200px; height:200px" class="card-img-top">
                                          <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                                      <script src="/vendor/laravel-filemanager/js/lfm.js"></script>
                                      <script>
                                          $('.lfm').filemanager('image');
                                      </script>
                                      </div>
                                    </div>
                                  </div>
                                  <br>
                                  <div class="row text-center">
                                    <div class="col-12 text-center mt-2 pt-50">
                                        <button type="submit" id="updateprduct"
                                            class="btn btn-success me-1 waves-effect waves-float waves-light">Update</button>
                                        <button type="reset" class="btn btn-outline-secondary waves-effect"
                                            data-bs-dismiss="modal" aria-label="Close">
                                            Cancel
                                        </button>

                                    </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    <script>
        $(document).ready(function() {
            $(".editproduct").click(function(e) {

                var id = $(this).data('edit');
                $("#product_id").val(id);
                e.preventDefault();

                $.ajax({
                    url: '/admin/product/edit/' + id,
                    type: 'get',
                    success: function(response) {
                        $('#name_product').val(response.data.name_product);
                        $('#category_id').val(response.data.category_id);
                        $('#price').val(response.data.price);
                        $('#qty').val(response.data.qty);
                        $('#image_product').val(response.data.image_product);
                        $('#image_produc1').attr('src',response.data.image_product);
                    }

                });


            $("#updateprduct").click(function(){
                        var payload1 = {
                        'name_product'              :   $('#name_product').val(),
                        'category_id'               :   $('#category_id').val(),
                        'price'               :   $('#price').val(),
                        'qty'               :   $('#qty').val(),
                        'image_product'               :   $('#image_product').val(),
                    };
                        $.ajax({
                            url : '/admin/product/update/' + id,
                            type: 'post',
                            data: payload1,
                            success: function($xxx){
                                if($xxx.status == true){
                                    toastr.success("You have successfully updated!");
                                }
                                location.reload();
                            },
                            error: function($errors){
                                var listErrors = $errors.responseJSON.errors;
                                $.each(listErrors, function(key, value) {
                                    toastr.error(value[0]);
                                });
                            }
                        });
                      });
                    });
                $(".callDelete").click(function(){
                var id = $(this).data('delete');
                console.log(id);
                row = $(this);
                $("#product_id").val(id);
                });
                $("#delete_product").click(function(){
                    var id = $("#product_id").val();
                    $.ajax({
                        url: '/admin/product/delete_product/' + id,
                        type: 'get',
                        success: function($data) {
                            toastr.warning('You have successfully delete! !');
                            $(row).closest('tr').remove();
                            $('#addNewCard').modal('hide');
                        }
                    });
                });

        });
    </script>
@endsection

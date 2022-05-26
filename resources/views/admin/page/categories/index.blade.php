@extends('admin.share.master')
@section('page-title')
    <div class="page-title">
        <div class="row">
            <div class="col-6">
                <h3>List Category</h3>
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
                  <th class="text-center" scope="col">Name Category</th>
                  <th class="text-center" scope="col">Image Category</th>
                  <th class="text-center" scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($listcategory as $key => $value)
                <tr class="table table-bordered">
                    <th class="text-center" scope="row">{{ $key + 1 }}</th>
                    <td class="text-center">{{ $value->name_category }}</td>
                    <td class="text-center"><img style="width:100px; height:100px" src="{{$value->image_category}}"></td>
                    <td class="text-center text-nowrap">
                        <button data-delete={{$value->id}} type="button" class="btn btn-danger round waves-effect callDelete fa fa-trash-o" type="button" data-bs-toggle="modal" data-bs-target="#addNewCard"></button>
                        <button type="button" data-edit="{{ $value->id }}"
                            class="btn btn-success editcategory fa fa-gear" data-bs-toggle="modal"
                            data-bs-target="#edit-category">

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
                            <input type="hidden" id="category_id">
                            <label class="col-form-label fa fa-exclamation-triangle" style="color: red" for="recipient-name">  All products in this category will be deleted !</label>
                            <label class="col-form-label" for="recipient-name">Are you sure to delete this category ?</label>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">No</button>
                    <button class="btn btn-warning" id="delete_category" type="button">Yes</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="edit-category">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-edit-user" data-select2-id="84">
            <div class="modal-content" data-select2-id="83">
                <div class="modal-header bg-transparent">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body pb-5 px-sm-5 pt-50" data-select2-id="82">
                    <div class="text-center mb-2">
                        <input type="hidden" id="category_id">
                        <h1 class="mb-1">Edit Category</h1>
                    </div>
                    <form id="editForm" class="row gy-1 pt-75" onsubmit="return false" novalidate="novalidate">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="form theme-form">

                                                            <div class="row">
                                                                <div class="col">
                                                                    <div class="mb-3">
                                                                        <label>Name Category</label>
                                                                        <input class="form-control"
                                                                            id="name_category" type="text"
                                                                            data-bs-original-title="" title="" required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label>Image Category</label>
                                                                <div class="input-group">
                                                                  <input id="image_category" class="form-control" required>
                                                                  <a id="lfm" data-input="image_category" data-preview="image_category1" class="lfm btn btn-light">
                                                                  Choose
                                                                  </a>
                                                                  <img id="image_category1" style="width:200px; height:200px" id="image_category1" class="card-img-top">
                                                              </div>
                                                              </div>
                                                                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                                                                <script src="/vendor/laravel-filemanager/js/lfm.js"></script>
                                                                <script>
                                                                    $('.lfm').filemanager('image');
                                                                </script>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 text-center mt-2 pt-50">
                                                <button type="submit" id="updatecategory"
                                                    class="btn btn-primary me-1 waves-effect waves-float waves-light">Update</button>
                                                <button type="reset" class="btn btn-outline-secondary waves-effect"
                                                    data-bs-dismiss="modal" aria-label="Close">
                                                    Cancel
                                                </button>

                                            </div>
                                            <br>
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
            $(".editcategory").click(function(e) {

                var id = $(this).data('edit');
                $("#category_id").val(id);
                e.preventDefault();

                $.ajax({
                    url: '/admin/category/edit/' + id,
                    type: 'get',
                    success: function(response) {
                        $('#name_category').val(response.data.name_category);
                        $('#image_category').val(response.data.image_category);
                        $('#image_category1').attr('src',response.data.image_category);
                    }

                });


            $("#updatecategory").click(function(){
                        var payload1 = {
                        'name_category'              :   $('#name_category').val(),
                        'image_category'               :   $('#image_category').val(),
                    };
                        $.ajax({
                            url : '/admin/category/update/' + id,
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
                $("#category_id").val(id);
                });
                $("#delete_category").click(function(){
                    var id = $("#category_id").val();
                    $.ajax({
                        url: '/admin/category/delete_category/' + id,
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

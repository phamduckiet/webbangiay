@extends('admin.share.master')
@section('page-title')
<div class="page-title">
    <div class="row">
      <div class="col-6">
        <h3>Create Category</h3>
      </div>
      <div class="col-6">
      </div>
    </div>
</div>
@endsection
@section('content')
    <div class="col-sm-12">
        <div class="card">
          <div class="card-header">
            <h5>Zero Configuration</h5>
            <span>DataTables has most features enabled by default, so all you need to do to use it with your own tables is to call the construction function: <code>$().DataTable();</code>. </span>
            <span>Searching, ordering and paging goodness will be immediately added to the table, as shown in this example.</span>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <div id="basic-1_wrapper" class="dataTables_wrapper no-footer">
                <table class="display dataTable no-footer" id="basic-1" role="grid" aria-describedby="basic-1_info">
                  <thead>
                    <tr role="row">
                      <<th class="text-center" scope="col">Stt</th>
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
                            <button data-delete={{$value->id}} type="button" class="btn btn-danger round waves-effect callDelete" type="button" data-bs-toggle="modal" data-bs-target="#addNewCard">Xóa</button>
                            <button type="button" data-edit="{{ $value->id }}"
                                class="btn btn-success ChinhSuaNhanVien" data-bs-toggle="modal"
                                data-bs-target="#chinhsuasinhvien">
                                Chỉnh sữa
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
@endsection

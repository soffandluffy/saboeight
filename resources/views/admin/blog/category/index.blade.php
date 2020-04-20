{{-- layout extend --}}
@extends('layouts.contentLayoutMaster')

{{-- page title --}}
@section('title','Manage Article Category')

{{-- vendor styles --}}
@section('vendor-style')
<link rel="stylesheet" type="text/css" href="{{asset('vendors/data-tables/css/jquery.dataTables.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/data-tables/extensions/responsive/css/responsive.dataTables.min.css')}}">
@endsection

{{-- page styles --}}
@section('page-style')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/datatable.css')}}">
@endsection

{{-- page content --}}
@section('content')
<div class="row datatable-wrapper">
  <div class="col s12 m12 l12 datatable-table">
      <div class="section">
        <div class="card border-radius-6">
          <div class="card-content">
            <div class="row">
              <div class="col s12 m12 l12">
                @include('admin.blog.category.add')
              </div>
              <div class="col s12 m12 l12">
                <div class="col s12 m12 l12 responsive-table">
                  <table id="artcategory-datatable" class="table">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @forelse($categories as $category)
                      <tr>
                        <td>{{$category->name}}</td>
                        <td>
                          <a href="#edit{{$category->id}}" class="waves-effect waves-dark modal-trigger tooltipped" data-position="bottom" data-tooltip="Edit"><i class="material-icons">edit</i></a>
  <!-- START Modal EDIT -->
  <div id="edit{{$category->id}}" class="modal border-radius-6" aria-preventScrolling="true">
    <div class="modal-content">
      <h5 class="">
        Edit Article Category
      </h5>
      <form class="editValidate" method="POST" action="{{ route('admin.artcategory.update', $category->id) }}">
        @csrf
        <input type="hidden" name="id" value="{{$category->id}}">
        <div class="row">
          <div class="input-field col s12 m12 l12">
            <i class="material-icons prefix">title</i>
            <input id="nameedit{{$category->id}}" type="text" name="name" class="validate" value="{{$category->name}}">
            <label class="active" for="nameedit{{$category->id}}">Name</label>
          </div>
        </div>
        <div class="modal-footer">
          <div class="row">
            <div class="col s12 m12 l12">
              <a href="#!" class="modal-action modal-close waves-effect waves-dark btn grey lighten-2" style="color: #555">Cancel
              </a>
              <button class="btn deep-purple waves-effect waves-light" type="submit" name="action">Save changes
              </button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
  <!-- END Modal EDIT -->
                          <a href="#delete{{$category->id}}" class="modal-trigger waves-effect waves-dark tooltipped" data-position="bottom" data-tooltip="Delete"><i class="material-icons">delete</i></a>
  <!-- START Modal Delete Confirmation -->
  <div class="modal border-radius-6 width-30 pb-2" id="delete{{$category->id}}">
      <div class="modal-content">
        <div class="col s12 m12 l12">
          <h5>Delete this category?</h5>
          <form method="POST" action="{{ route('admin.artcategory.delete', $category->id) }}" class="right pt-4">
            @csrf
            <a href="#!" class="btn grey lighten-2 modal-action modal-close waves-effect waves-dark" style="color: #555">Cancel
            </a>
            <button type="submit" class="btn deep-purple waves-effect waves-light">Yes, Delete</button>
          </form>
        </div>
      </div>
  </div>
  <!-- END Modal Delete Confirmation -->
                        </td>
                      </tr>
                      @empty
                        <tr>
                          <td>Data is empty</td>
                          <td></td>
                        </tr>
                      @endforelse
                    </tbody>
                </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  </div>
</div>


@endsection

{{-- vendor script --}}
@section('vendor-script')
<script src="{{asset('vendors/data-tables/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('vendors/data-tables/extensions/responsive/js/dataTables.responsive.min.js')}}"></script>
@endsection

{{-- page script --}}
@section('page-script')
<script type="text/javascript">
  $(document).ready(function(){

    $('.modal').modal();

    $("#artcategory-datatable").DataTable({
        responsive: true,
    });

    $("#addValidate").validate({
      rules: {
        name: {
          required: true,
          minlength: 3
        },
        },
        //For custom messages
        messages: {
          name:{
            required: "Enter a category name",
            minlength: "Enter at least 3 characters"
          },
        },
        errorElement : 'div',
        errorPlacement: function(error, element) {
          var placement = $(element).data('error');
          if (placement) {
            $(placement).append(error)
          } else {
        error.insertAfter(element);
        }
      }
    });

  });
</script>
@endsection
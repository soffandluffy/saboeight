{{-- layout extend --}}
@extends('layouts.contentLayoutMaster')

{{-- page title --}}
@section('title','Manage Blog Article')

{{-- vendor styles --}}
@section('vendor-style')
<link rel="stylesheet" type="text/css" href="{{asset('vendors/data-tables/css/jquery.dataTables.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/data-tables/extensions/responsive/css/responsive.dataTables.min.css')}}">
@endsection

{{-- page styles --}}
@section('page-style')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/datatable.css')}}">
<style type="text/css">
  .btnAction {
    padding-left: 5%;
    padding-right: 5%;
  }
  .btnActionForm {
    padding-left: 26%;
    padding-right: 26%;
  }
</style>
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
                <div style="bottom: 60px; right: 20px;" class="fixed-action-btn direction-top">
                  <a class="btn-floating btn-large gradient-45deg-purple-deep-purple gradient-shadow modal-trigger" href="{{ route('admin.blog.add') }}"><i class="material-icons">add</i></a>
                </div>
              </div>
              <div class="col s12 m12 l12">
                <div class="col s12 m12 l12 responsive-table">
                  <table id="article-datatable" class="table highlight">
                    <thead>
                      <tr>
                        <th>Article Image</th>
                        <th>Article Name</th>
                        <th>Article Category</th>
                        <th>Status</th>
                        <th>Created At</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @forelse($articlelist as $article)
                        <tr>
                          <td><img class="materialboxed" src="{{ asset('images/articles/' . $article->imageurl . '') }}" width="96" height="54"></td>
                          <td>{{ $article->title }}</td>
                          <td>{{ $article->category->name }}</td>
                          <td>{{ $article->status }}</td>
                          <td>{{ $article->created_at->format('d M Y H:m') }}</td>
                          <td style="width: 170px;">
                            <a href="{{ route('admin.blog.publish', $article->id) }}" class="btn deep-purple accent-2 btnAction waves-effect waves-dark tooltipped" data-position="bottom" data-tooltip="Preview"><i class="material-icons">pageview</i></a>
                            @if ($article->status == "Draft")
                              <form action="{{ route('admin.blog.publish', $article->id) }}" method="POST" style="display: inline-block;width: 43px">
                                @csrf
                                <button type="submit" class="btn teal lighten-1 btnActionForm waves-effect waves-dark tooltipped" data-position="bottom" data-tooltip="Publish"><i class="material-icons">publish</i></button>
                              </form>
                            @else
                              <form action="{{ route('admin.blog.draft', $article->id) }}" method="POST" style="display: inline-block;width: 43px">
                                @csrf
                                <button type="submit" class="btn grey lighten-1 btnActionForm waves-effect waves-dark tooltipped" data-position="bottom" data-tooltip="Draft"><i class="material-icons">drafts</i></button>
                              </form>
                            @endif
                            <a href="{{ route('admin.blog.edit', $article->id) }}" class="btn amber lighten-1 btnAction waves-effect waves-dark tooltipped" data-position="bottom" data-tooltip="Edit"><i class="material-icons">edit</i></a>
                            <a href="#delete{{$article->id}}" class="btn red darken-2 btnAction waves-effect waves-dark modal-trigger tooltipped" data-position="bottom" data-tooltip="Delete"><i class="material-icons">delete</i></a>
  <!-- START Modal Delete Confirmation -->
  <div class="modal border-radius-6 width-30 pb-2" id="delete{{$article->id}}">
      <div class="modal-content">
        <div class="col s12 m12 l12">
          <h5>Delete this article?</h5>
          <form method="POST" action="{{ route('admin.blog.delete', $article->id) }}" class="right pt-4">
            @csrf
            <a href="#!" class="btn grey lighten-2 modal-action modal-close waves-effect waves-dark" style="color: #555">Cancel
            </a>
            <button type="submit" class="btn deep-purple accent-2 waves-effect waves-light">Yes, Delete</button>
          </form>
        </div>
      </div>
  </div>
  <!-- END Modal Delete Confirmation -->
                          </td>
                        </tr>
                      @empty
                      <tr>
                        <td></td>
                        <td></td>
                        <td>Data Empty</td>
                        <td></td>
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

{{-- vendor scripts --}}
@section('vendor-script')
<script src="{{asset('vendors/data-tables/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('vendors/data-tables/extensions/responsive/js/dataTables.responsive.min.js')}}"></script>
@endsection

{{-- page scripts --}}
@section('page-script')
<script type="text/javascript">
  $(document).ready(function(){

    $('.modal').modal();
    $('.materialboxed').materialbox();

    $("#article-datatable").DataTable({
        responsive: true,
    });

  });
</script>
@endsection
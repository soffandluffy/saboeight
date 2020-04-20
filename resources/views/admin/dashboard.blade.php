{{-- layout extend --}}
@extends('layouts.contentLayoutMaster')

{{-- page title --}}
@section('title','Dashboard Modern')

{{-- vendor styles --}}
@section('vendor-style')
@endsection

{{-- page styles --}}
@section('page-style')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/dashboard-modern.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/intro.css')}}">
@endsection

{{-- page content --}}
@section('content')
<div class="section">
   <div class="row vertical-modern-dashboard">
      <div class="col s12 m12 l12">
         <!--card starts start-->
            <div class="card">
               <div class="card-content">
                  <h4 class="card-title">Welcome</h4>
               </div>
            </div>
            <!--card starts end-->
      </div>
   </div>

</div>
@include('pages.intro')
@endsection

{{-- vendor scripts --}}
@section('vendor-script')
@endsection

{{-- page scripts --}}
@section('page-script')
<script src="{{asset('js/scripts/intro.js')}}"></script>
@endsection
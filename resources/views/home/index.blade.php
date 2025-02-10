@extends('templates.header')

@section('content') 
<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-md-12 grid-margin">
        <div class="row">
          <div class="col-12 col-xl-8 mb-4 mb-xl-0">
            <h2>Halo, {{ Auth::user()->user_nama }} </h2>
          </div>
        </div>
      </div>
    </div> 
  </div>
@endsection
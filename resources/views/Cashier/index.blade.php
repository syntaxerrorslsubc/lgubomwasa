@extends('layouts.Cashier.default')
@section('content')

<h1>Welcome to Water Billing System - Management Site</h1>
<style>
  #site-cover {
    width:100%;
    height:40em;
    object-fit: cover;
    object-position:center center;
  }
</style>
<hr>
<style>
  #site-cover {
    width:100%;
    height:40em;
    object-fit: cover;
    object-position:center center;
  }
</style>
<div class="row">
    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-gradient-success elevation-1"><i class="fas fa-users"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Clients</span>
            @if($nOclients=App\Models\Client_list::count())
          <span class="info-box-number">
                {{$nOclients}}
          </span>
          @endif
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-gradient-danger elevation-1"><i class="fas fa-file-invoice"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Pending Bills</span>
          @if($nObilling=App\Models\Billing_list::count())
          <span class="info-box-number">
              {{$nObilling}}
         </span>
         @endif
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
</div>
<hr>
<center>
  <img src="../images/bontocoffice.jpg" alt="BontoccMunicipalHall" id="site-cover" class="img-fluid w-100">
</center>
          </div>
        </section>
        <!-- /.content -->

@endsection

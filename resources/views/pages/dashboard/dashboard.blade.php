@extends('layouts.dashboard')

@section('title')
   PetCater Dashboard
@endsection

@section('content')
   <div
      class="section-content section-dashboard-home"
      data-aos="fade-up">
      <div class="container-fluid">
         <div class="dashboard-heading">
            <h2 class="dashboard-title">Dashboard</h2>
            <p class="dashboard-subtitle">Look what you have buy today!</p>
         </div>
         <div class="dashboard-content">
            <div class="row">
               <div class="col-md-4">
                  <div class="card mb-2">
                     <div class="card-body">
                        <div class="dashboard-card-title mb-2">Transaction</div>
                        <div class="dashboard-card-subtitle">21</div>
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="card mb-2">
                     <div class="card-body">
                        <div class="dashboard-card-title mb-2">Total Belanja</div>
                        <div class="dashboard-card-subtitle">$931,290</div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row mt-3">
               <div class="col-12 mt-2">
                  <h5 class="mb-3">Recent Transactions</h5>
                  <a href="#" class="card card-list d-block">
                     <div class="card-body">
                        <div class="row">
                           <div class="col-md-1">
                              <img
                                 src="/images/dashboard-icon-product-1.png"
                                 alt="" />
                           </div>
                           <div class="col-md-4">Shirup Marzzan</div>
                           <div class="col-md-3">Angga Risky</div>
                           <div class="col-md-3">12 Januari, 2020</div>
                           <div class="col-md-1 d-none d-md-block">
                              <img
                                 src="/images/dashboard-arrow-right.svg"
                                 alt="" />
                           </div>
                        </div>
                     </div>
                  </a>
                  <a href="#" class="card card-list d-block">
                     <div class="card-body">
                        <div class="row">
                           <div class="col-md-1">
                              <img
                                 src="/images/dashboard-icon-product-2.png"
                                 alt="" />
                           </div>
                           <div class="col-md-4">LeBrone X</div>
                           <div class="col-md-3">Muchamad Arvan</div>
                           <div class="col-md-3">11 Januari, 2020</div>
                           <div class="col-md-1 d-none d-md-block">
                              <img
                                 src="/images/dashboard-arrow-right.svg"
                                 alt="" />
                           </div>
                        </div>
                     </div>
                  </a>
                  <a href="#" class="card card-list d-block">
                     <div class="card-body">
                        <div class="row">
                           <div class="col-md-1">
                              <img
                                 src="/images/dashboard-icon-product-3.png"
                                 alt="" />
                           </div>
                           <div class="col-md-4">Soffa Lembutte</div>
                           <div class="col-md-3">Rizka Aulia</div>
                           <div class="col-md-3">11 Januari, 2020</div>
                           <div class="col-md-1 d-none d-md-block">
                              <img
                                 src="/images/dashboard-arrow-right.svg"
                                 alt="" />
                           </div>
                        </div>
                     </div>
                  </a>
               </div>
            </div>
         </div>
      </div>
   </div>
@endsection

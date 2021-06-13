@extends('layouts.dashboard')

@section('title')
   Dashboard Transactions
@endsection

@section('content')
   {{-- Section Content --}}
   <div
      class="section-content section-dashboard-home"
      data-aos="fade-up">
      <div class="container-fluid">
         <div class="dashboard-heading">
            <h2 class="dashboard-title">Transactions</h2>
            <p class="dashboard-subtitle">
               Big result start from the small one
            </p>
         </div>
         <div class="dashboard-content">
            <div class="row">
               <div class="col-12 mt-2">
                  <!-- Nav Pills Tab -->
                  <ul
                     class="nav nav-pills mb-3"
                     id="pills-tab"
                     role="tablist">
                     <li class="nav-item" role="presentation">
                        <a
                           class="nav-link active"
                           id="pills-buy-tab"
                           data-toggle="pill"
                           href="#pills-buy"
                           role="tab"
                           aria-controls="pills-buy"
                           aria-selected="true">Buy Products</a>
                     </li>
                  </ul>
                  <!-- Nav Pills Tab Content -->
                  <div class="tab-content" id="pills-tabContent">
                     <div
                        class="tab-pane fade show active"
                        id="pills-buy"
                        role="tabpanel"
                        aria-labelledby="pills-buy-tab">
                        @foreach ($transactions as $transaction)
                           <a href="{{ route('dashboard-transaction-details', $transaction->code) }}"
                              class="card card-list d-block">
                              <div class="card-body">
                                 <div class="row">
                                    <div class="col-md-1">
                                       <img
                                          src="{{ Storage::url($transaction->product->galleries->first()->photos ?? '') }}"
                                          class="w-75 rounded" />
                                    </div>
                                    <div class="col-md-4">{{ $transaction->product->name ?? '' }}
                                    </div>
                                    <div class="col-md-2">{{ $transaction->transaction->code }}</div>
                                    <div class="col-md-3">
                                       {{ $transaction->created_at->isoFormat('dddd, D MMMM Y') ?? '' }}
                                    </div>
                                    <div class="col-md-2 d-none d-md-block">
                                       <img
                                          src="/images/dashboard-arrow-right.svg"
                                          alt="" />
                                    </div>
                                 </div>
                              </div>
                           </a>
                        @endforeach
                        {{-- <a
                           href="/dashboard-transactions-details.html"
                           class="card card-list d-block">
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
                        </a> --}}
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
@endsection

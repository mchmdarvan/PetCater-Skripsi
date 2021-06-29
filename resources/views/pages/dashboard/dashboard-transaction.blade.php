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
               Riwayat Transaksi yang Sudah Anda Lakukan
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
                           aria-selected="true">Menunggu Pembayaran</a>
                     </li>
                     <li class="nav-item" role="presentation">
                        <a
                           class="nav-link"
                           id="pills-sell-tab"
                           data-toggle="pill"
                           href="#pills-sell"
                           role="tab"
                           aria-controls="pills-sell"
                           aria-selected="false">Pembayaran Selesai</a>
                     </li>
                     <li class="nav-item" role="presentation">
                        <a
                           class="nav-link"
                           id="pills-done-tab"
                           data-toggle="pill"
                           href="#pills-done"
                           role="tab"
                           aria-controls="pills-done"
                           aria-selected="false">Transaksi Selesai</a>
                     </li>
                     <li class="nav-item" role="presentation">
                        <a
                           class="nav-link"
                           id="pills-failed-tab"
                           data-toggle="pill"
                           href="#pills-failed"
                           role="tab"
                           aria-controls="pills-failed"
                           aria-selected="false">Transaksi Gagal</a>
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
                           @if ($transaction->transaction->transaction_status == 'PENDING')
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
                                       <div class="col-md-2">{{ $transaction->transaction->code }}
                                       </div>
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
                           @endif
                        @endforeach
                     </div>
                     <div
                        class="tab-pane fade show active"
                        id="pills-sell"
                        role="tabpanel"
                        aria-labelledby="pills-sell-tab">
                        @foreach ($transactions as $transaction)
                           @if ($transaction->transaction->transaction_status == 'SHIPPING')
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
                                       <div class="col-md-2">{{ $transaction->transaction->code }}
                                       </div>
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
                           @endif

                        @endforeach

                     </div>
                     <div
                        class="tab-pane fade show active"
                        id="pills-done"
                        role="tabpanel"
                        aria-labelledby="pills-done-tab">
                        @foreach ($transactions as $transaction)
                           @if ($transaction->transaction->transaction_status == 'SUCCESS')
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
                                       <div class="col-md-2">{{ $transaction->transaction->code }}
                                       </div>
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
                           @endif

                        @endforeach

                     </div>
                     <div
                        class="tab-pane fade show active"
                        id="pills-failed"
                        role="tabpanel"
                        aria-labelledby="pills-failed-tab">
                        @foreach ($transactions as $transaction)
                           @if ($transaction->transaction->transaction_status == 'FAILED')
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
                                       <div class="col-md-2">{{ $transaction->transaction->code }}
                                       </div>
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
                           @endif

                        @endforeach

                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
@endsection

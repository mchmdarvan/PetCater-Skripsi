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
                        <div class="dashboard-card-subtitle">{{ $transactions }}</div>
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="card mb-2">
                     <div class="card-body">
                        <div class="dashboard-card-title mb-2">Total Belanja</div>
                        <div class="dashboard-card-subtitle">@currency($total)</div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row mt-3">
               <div class="col-12 mt-2">
                  <h5 class="mb-3">Recent Transactions</h5>
                  {{-- <div class="card">
                     <div class="card-body">
                        <div class="table-responsive">
                           <table class="table table-hover scroll-horizontal-vertical w-100">
                              <thead>
                                 <tr>
                                    <th>Store Code</th>
                                    <th>Price</th>
                                    <th>Status</th>
                                    <th>Tanggal Pemesanan</th>
                                    <th>Action</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 @foreach ($recents as $recent)
                                    <tr>
                                       <td>{{ $recent->code }}</td>
                                       <td>@currency($recent->total_price)</td>
                                       <td>{{ $recent->transaction_status }}</td>
                                       <td>
                                          {{ $recent->created_at->isoFormat('dddd, D MMMM Y') }}
                                       </td>
                                       <td>
                                          <a
                                             href="{{ route('dashboard-transaction-details', $recent->id) }}"
                                             class="btn btn-success">Detail</a>
                                       </td>
                                    </tr>
                                 @endforeach
                              </tbody>
                           </table>
                        </div>
                     </div>
                  </div> --}}
                  @foreach ($recents as $recent)
                     <a href="{{ route('dashboard-transaction-details', $recent->code) }}"
                        class="card card-list d-block">
                        <div class="card-body">
                           <div class="row">
                              <div class="col-md-1">
                                 <img
                                    src="{{ Storage::url($recent->product->galleries->first()->photos ?? '') }}"
                                    class="w-75 rounded" />
                              </div>
                              <div class="col-md-3">{{ $recent->product->name ?? '' }}</div>
                              <div class="col-md-3">{{ $recent->transaction->code }}</div>
                              <div class="col-md-3">
                                 {{ $recent->created_at->isoFormat('dddd, D MMMM Y') ?? '' }}</div>
                              <div class="col-md-2 d-none d-md-block">
                                 <img
                                    src="{{ URL::asset('images/dashboard-arrow-right.svg') }}"
                                    alt="" />
                              </div>
                           </div>
                        </div>
                     </a>
                  @endforeach

               </div>
            </div>
         </div>
      </div>
   </div>
@endsection

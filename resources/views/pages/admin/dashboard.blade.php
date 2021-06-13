@extends('layouts.admin')

@section('title')
   Admin Dashboard
@endsection

@section('content')
   <div
      class="section-content section-dashboard-home"
      data-aos="fade-up">
      <div class="container-fluid">
         <div class="dashboard-heading">
            <h2 class="dashboard-title">Admin Dashboard</h2>
            <p class="dashboard-subtitle">Administrator Panel For Online Store</p>
         </div>
         <div class="dashboard-content">
            <div class="row">
               <div class="col-md-4">
                  <div class="card mb-2">
                     <div class="card-body">
                        <div class="dashboard-card-title mb-2">Total Transaction</div>
                        <div class="dashboard-card-subtitle">@currency($totalTransaction)</div>
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="card mb-2">
                     <div class="card-body">
                        <div class="dashboard-card-title mb-2">Product</div>
                        <div class="dashboard-card-subtitle">{{ $product }}</div>
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="card mb-2">
                     <div class="card-body">
                        <div class="dashboard-card-title mb-2">Transaction</div>
                        <div class="dashboard-card-subtitle">{{ $transaction }}</div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-12">
                  <div class="card">
                     <div class="card-body">
                        <div class="table-responsive">
                           <table class="table table-hover scroll-horizontal-vertical w-100">
                              <thead>
                                 <tr>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Status</th>
                                    <th>Tanggal Pemesanan</th>
                                    <th>Action</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 @foreach ($recents as $recent)
                                    <tr>
                                       <td>{{ $recent->user->name }}</td>
                                       <td>@currency($recent->total_price)</td>
                                       <td>{{ $recent->transaction_status }}</td>
                                       <td>
                                          {{ $recent->created_at->isoFormat('dddd, D MMMM Y') }}
                                       </td>
                                       <td>
                                          <a
                                             href="{{ route('transaction.show', $recent->id) }}"
                                             class="btn btn-success">Detail</a>
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
         </div>
      </div>
   </div>
@endsection

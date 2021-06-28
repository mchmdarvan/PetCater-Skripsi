@extends('layouts.admin')

@section('title')
   Admin Transaction
@endsection

@section('content')
   <div
      class="section-content section-dashboard-home"
      data-aos="fade-up">
      <div class="container-fluid">
         <div class="dashboard-heading">
            <h2 class="dashboard-title">Transaction {{ $transaction->code }}</h2>
            <p class="dashboard-subtitle">Detail of Transaction</p>
         </div>
         <div class="dashboard-content">
            <div class="row">
               <div class="col-md-12">
                  <div class="card">
                     <div class="card-body">
                        <div class="row">
                           <div class="col-12 col-md-12">
                              <div class="row">
                                 <div class="col-12 col-md-6">
                                    <div class="product-title">Customer Name</div>
                                    <div class="product-subtitle">
                                       {{ $transaction->user->name }}
                                    </div>
                                 </div>
                                 <div class="col-12 col-md-6">
                                    <div class="product-title">Date of Transaction</div>
                                    <div class="product-subtitle">
                                       {{ $transaction->created_at->isoFormat('dddd, D MMMM Y') }}
                                    </div>
                                 </div>
                                 <div class="col-12 col-md-6">
                                    <div class="product-title">Status Transaction</div>
                                    <div class="product-subtitle">
                                       @if ($transaction->transaction_status == 'PENDING')
                                          <span
                                             class="text-warning">{{ $transaction->transaction_status }}</span>
                                       @elseif ($transaction->transaction_status == 'SUCCESS')
                                          <span
                                             class="text-success">{{ $transaction->transaction_status }}</span>
                                       @elseif ($transaction->transaction_status == 'SHIPPING')
                                          {{ $transaction->transaction_status }}
                                       @elseif ($transaction->transaction_status == 'FAILED')
                                          <span
                                             class="text-danger">{{ $transaction->transaction_status }}</span>
                                       @endif
                                    </div>
                                 </div>
                                 <div class="col-12 col-md-6">
                                    <div class="product-title">Total Transaction</div>
                                    <div class="product-subtitle">
                                       @currency($transaction->total_price)
                                    </div>
                                 </div>
                                 <div class="col-12 col-md-6">
                                    <div class="product-title">Alamat</div>
                                    <div class="product-subtitle">
                                       {{ $transaction->user->address_one }}
                                       {{ $transaction->user->address_two }}
                                       {{ $transaction->user->zip_code }}
                                    </div>
                                 </div>
                                 <div class="col-12 col-md-6">
                                    <div class="product-title">Phone Number</div>
                                    <div class="product-subtitle">
                                       {{ $transaction->user->phone_number }}
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  @foreach ($details as $detail)
                     <a href="#"
                        class="card card-list btn disabled">
                        <div class="card-body">
                           <div class="row">
                              <div class="col-md-1">
                                 <img
                                    src="{{ Storage::url($detail->product->galleries->first()->photos ?? '') }}"
                                    class="w-75 rounded" />
                              </div>
                              <div class="col-md-3">{{ $detail->product->name ?? '' }}
                              </div>
                              <div class="col-md-3">{{ $detail->code ?? '' }}</div>
                              <div class="col-md-3">
                                 @currency($detail->product->price * ($detail->price /
                                 $detail->product->price))
                              </div>
                              <div class="col-md-2">
                                 {{ $detail->price / $detail->product->price }} Buah
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

@push('addon-script')

   {{-- <script>
      var datatable = $('#crudTable').DataTable({
         processing: true,
         serverSide: true,
         ordering: true,
         ajax: {
            url: '{!! url()->current() !!}',
         },
         columns: [{
               data: 'user.name',
               name: 'user.name'
            },
            {
               data: 'total_price',
               name: 'total_price',
               render: $.fn.dataTable.render.number('.', ',', 2, 'Rp ')
            },
            {
               data: 'transaction_status',
               name: 'transaction_status'
            },
            {
               data: 'date',
               name: 'date',
            },
            {
               data: 'action',
               name: 'action',
               orderable: false,
               searcable: false,
               width: '15%'
            },
         ]
      })

   </script> --}}
@endpush

@extends('layouts.dashboard')

@section('title')
   Dashboard Transactions Detail
@endsection

@section('content')
   <!-- Section Content -->
   <div
      class="section-content section-dashboard-home"
      data-aos="fade-up">
      <div class="container-fluid">
         <div class="dashboard-heading">
            <h2 class="dashboard-title">{{ $transaction->transaction->code }}</h2>
            <p class="dashboard-subtitle">Transactions Details</p>
         </div>
         <div class="dashboard-content" id="transactionDetails">
            <div class="row">
               <div class="col-12">
                  <div class="card">
                     <div class="card-body">
                        <div class="row">
                           <div class="col-12 col-md-4">
                              <img
                                 src="{{ Storage::url($transaction->product->galleries->first()->photos ?? '') }}"
                                 class="w-100 mb-3 rounded"
                                 alt="" />
                           </div>
                           <div class="col-12 col-md-8">
                              <div class="row">
                                 <div class="col-12 col-md-6">
                                    <div class="product-title">Customer Name</div>
                                    <div class="product-subtitle">
                                       {{ $transaction->transaction->user->name }}
                                    </div>
                                 </div>
                                 <div class="col-12 col-md-6">
                                    <div class="product-title">Product Name</div>
                                    <div class="product-subtitle">
                                       {{ $transaction->product->name }}
                                    </div>
                                 </div>
                                 <div class="col-12 col-md-6">
                                    <div class="product-title">
                                       Date of Transaction
                                    </div>
                                    <div class="product-subtitle">
                                       {{ $transaction->created_at->isoFormat('dddd, D MMMM Y') ?? '' }}
                                    </div>
                                 </div>
                                 <div class="col-12 col-md-6">
                                    <div class="product-title">Price</div>
                                    <div class="product-subtitle">
                                       @currency($transaction->product->price)
                                    </div>
                                 </div>
                                 <div class="col-12 col-md-6">
                                    <div class="product-title">Payment Methods</div>
                                    <div class="product-subtitle">
                                       @if ($transaction->transaction->payment_methods == 'cod')
                                          Datang Ke Toko
                                       @else
                                          Transfer BCA ke 1660016909 A/N Dhiah Rahma
                                       @endif
                                    </div>
                                 </div>
                                 <div class="col-12 col-md-6">
                                    <div class="product-title">Payment Status</div>
                                    <div class="product-subtitle text-danger">
                                       {{ $transaction->transaction->transaction_status }}
                                    </div>
                                 </div>
                                 <div class="col-12 col-md-6">
                                    <div class="product-title">Quantity</div>
                                    <div class="product-subtitle">
                                       {{ $transaction->qty }} Buah
                                    </div>
                                 </div>
                                 <div class="col-12 col-md-6">
                                    <div class="product-title">Total Amount</div>
                                    <div class="product-subtitle">
                                       @currency($transaction->price)</div>
                                 </div>
                                 <div class="col-12 col-md-6">
                                    <div class="product-title">Mobile</div>
                                    <div class="product-subtitle">
                                       {{ $transaction->transaction->user->phone_number }}
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        @if ($transaction->transaction->payment_methods == 'transfer')
                           <div class="row">
                              <div class="col-12 mt-4">
                                 <h5>Shipping Information</h5>
                              </div>
                              <div class="col-12">
                                 <div class="row">
                                    <div class="col-12 col-md-4">
                                       <div class="product-title">Address I</div>
                                       <div class="product-subtitle">
                                          {{ $transaction->transaction->user->address_one }}
                                       </div>
                                    </div>
                                    <div class="col-12 col-md-4">
                                       <div class="product-title">Address 2</div>
                                       <div class="product-subtitle">
                                          {{ $transaction->transaction->user->address_two }}
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-12">
                                 <div class="row">
                                    <div class="col-12 col-md-4">
                                       <div class="product-title">Province</div>
                                       <div class="product-subtitle">
                                          {{ App\Models\Province::find($transaction->transaction->user->provinces_id)->name }}
                                       </div>
                                    </div>
                                    <div class="col-12 col-md-4">
                                       <div class="product-title">City</div>
                                       <div class="product-subtitle">
                                          {{ App\Models\Regency::find($transaction->transaction->user->regencies_id)->name }}
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-12">
                                 <div class="row">
                                    <div class="col-12 col-md-4">
                                       <div class="product-title">Postal Code</div>
                                       <div class="product-subtitle">
                                          {{ $transaction->transaction->user->zip_code }}</div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        @else

                        @endif

                        @if ($transaction->transaction->transaction_status == 'FAILED')
                           <div class="row" style="display: none">
                              <div class="col-12 text-right">
                                 <a href="{{ route('dashboard-transaction-failed', $transaction->transaction->id) }}"
                                    class="btn btn-danger mt-4">
                                    Failed
                                 </a>
                              </div>
                           </div>
                        @else
                           <div class="row">
                              <div class="col-12 text-right">
                                 <a href="{{ route('dashboard-transaction-failed', $transaction->transaction->id) }}"
                                    class="btn btn-danger mt-4">
                                    Failed
                                 </a>
                                 @if ($transaction->transaction->payment_methods == 'transfer')
                                    <a href="https://api.whatsapp.com/send?phone=+6285894525693"
                                       class="btn btn-success mt-4">Konfirmasi Pembayaran
                                    </a>
                                 @endif
                              </div>
                           </div>
                        @endif

                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
@endsection

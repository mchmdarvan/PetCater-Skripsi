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
            <h2 class="dashboard-title">Transaction</h2>
            <p class="dashboard-subtitle">List of Transaction</p>
         </div>
         <div class="dashboard-content">
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
                                 @foreach ($transactions as $transaction)
                                    <tr>
                                       <td>{{ $transaction->user->name }}</td>
                                       <td>@currency($transaction->total_price)</td>
                                       <td>{{ $transaction->transaction_status }}</td>
                                       <td>
                                          {{ $transaction->created_at->isoFormat('dddd, D MMMM Y') }}
                                       </td>
                                       <td>
                                          <div class="btn-group">
                                             <div class="dropdown">
                                                <button
                                                   class="btn btn-primary dropdown-toggle mr-1 mb-1"
                                                   type="button"
                                                   data-toggle="dropdown">
                                                   Action
                                                </button>
                                                <div class="dropdown-menu">
                                                   <a class="dropdown-item"
                                                      href="{{ route('transaction.show', $transaction->id) }}">
                                                      Detail
                                                   </a>
                                                   <a class="dropdown-item"
                                                      href="{{ route('transaction.edit', $transaction->id) }}">
                                                      Edit
                                                   </a>
                                                   <form
                                                      action="{{ route('transaction.destroy', $transaction->id) }}"
                                                      method="POST">
                                                      @csrf
                                                      @method('delete')
                                                      <button type="submit"
                                                         class="dropdown-item text-danger">
                                                         Delete
                                                      </button>
                                                   </form>
                                                </div>
                                             </div>
                                          </div>
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

@extends('layouts.admin')

@section('title')
   Admin Product
@endsection

@section('content')
   <div
      class="section-content section-dashboard-home"
      data-aos="fade-up">
      <div class="container-fluid">
         <div class="dashboard-heading">
            <h2 class="dashboard-title">Product</h2>
            <p class="dashboard-subtitle">
               Edit "{{ $item->name }}" Product
            </p>
         </div>
         <div class="dashboard-content">
            <div class="row">
               <div class="col-md-12">
                  @if ($errors->any())
                     <div class="alert alert-danger">
                        <ul>
                           @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                           @endforeach
                        </ul>
                     </div>
                  @endif
                  <div class="card">
                     <div class="card-body">
                        <form action="{{ route('transaction.update', $item->id) }}" method="POST"
                           enctype="multipart/form-data">
                           @method('PUT')
                           @csrf
                           <div class="row">
                              <div class="col-md-12">
                                 <div class="form-group">
                                    <label>Transaction Status</label>
                                    <select name="transaction_status" class="form-control">
                                       <option value="{{ $item->transaction_status }}" selected>
                                          {{ $item->transaction_status }}</option>
                                       </option>
                                       <option value="" disabled>----------------</option>
                                       <option value="PENDING">PENDING</option>
                                       <option value="SHIPPING">SHIPPING</option>
                                       <option value="FAILED">FAILED</option>
                                       <option value="SUCCESS">SUCCESS</option>
                                    </select>
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col text-right">
                                 <button type="submit" class="btn btn-success px-5">
                                    Update Product
                                 </button>
                              </div>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
@endsection


@push('addon-script')
   <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
   <script>
      CKEDITOR.replace('editor');

   </script>
@endpush

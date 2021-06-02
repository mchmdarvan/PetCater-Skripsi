@extends('layouts.app')

@section('title')
   Store | PetCater Cart
@endsection

@section('content')
   <!-- Page Content -->
   <div class="page-content page-cart">
      <section
         class="store-breadcrumbs"
         data-aos="fade-down"
         data-aos-delay="100">
         <div class="container">
            <div class="row">
               <div class="col-12">
                  <nav>
                     <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                           <a href="/index.html">Home</a>
                        </li>
                        <li class="breadcrumb-item active">Cart</li>
                     </ol>
                  </nav>
               </div>
            </div>
         </div>
      </section>
      <section class="store-cart">
         <div class="container">
            <div class="row" data-aos="fade-up" data-aos-delay="100">
               <div class="col-12 table-responsive">
                  <table class="table table-borderless table-cart">
                     <thead>
                        <tr>
                           <td>Image</td>
                           <td>Name &amp; Seller</td>
                           <td>Price</td>
                           <td>Menu</td>
                        </tr>
                     </thead>
                     <tbody>
                        @php
                           $totalPrice = 0;
                        @endphp
                        @forelse ($carts as $cart)
                           <tr>
                              <td style="width: 20%">
                                 @if ($cart->product->galleries)
                                    <img
                                       src="{{ Storage::url($cart->product->galleries->first()->photos) }}"
                                       alt=""
                                       class="cart-image w-100" />
                                 @endif
                              </td>
                              <td style="width: 35%">
                                 <div class="product-title">{{ $cart->product->name }}</div>
                                 <div class="product-subtitle">by Enzo Petshop and Clinic</div>
                              </td>
                              <td style="width: 35%">
                                 <div class="product-title">@currency($cart->product->price)</div>
                                 <div class="product-subtitle">Rupiah</div>
                              </td>
                              <td style="width: 20%">
                                 <form method="POST" action="{{ route('cart-delete', $cart->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-remove-cart fa fa-icon-trash">
                                       Remove <span class="glyphicon glyphicon-trash"></span>
                                    </button>
                                 </form>
                              </td>
                           </tr>
                           @php
                              $totalPrice += $cart->product->price;
                           @endphp
                        @empty
                           <tr>
                              <td colspan="6" class="text-center p-5">
                                 Tidak ada barang dalam keranjang
                              </td>
                           </tr>
                        @endforelse

                     </tbody>
                  </table>
               </div>
            </div>
            <div class="row" data-aos="fade-up" data-aos-delay="150">
               <div class="col-12">
                  <hr class="mb-4" />
               </div>
               <div class="col-12">
                  <h2 class="mb-4">Shipping Details</h2>
               </div>
            </div>
            <form action="" id="locations">
               <div class="row mb-2" data-aos="fade-up" data-aos-delay="200">
                  <div class="col-md-6">
                     <div class="form-group">
                        <label for="address_one">Address 1</label>
                        <input
                           type="text"
                           class="form-control"
                           id="address_one"
                           name="address_one"
                           placeholder="Address 1"
                           value="" />
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group">
                        <label for="address_two">Address 2</label>
                        <input
                           type="text"
                           class="form-control"
                           id="address_two"
                           name="address_two"
                           placeholder="Address 2"
                           value="" />
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="form-group">
                        <label for="provinces_id">Provence</label>
                        <select name="provinces_id" id="provinces_id" class="form-control"
                           v-if="provinces" v-model="provinces_id">
                           <option v-for="province in provinces" :value="province.id">
                              @{{ province . name }}</option>
                        </select>
                        <select v-else class="form-control"></select>
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="form-group">
                        <label for="regencies_id">City</label>
                        <select name="regencies_id" id="regencies_id" class="form-control"
                           v-if="regencies" v-model="regencies_id">
                           <option v-for="regency in regencies" :value="regency.id">
                              @{{ regency . name }}</option>
                        </select>
                        <select v-else class="form-control"></select>
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="form-group">
                        <label for="zip_code">Postal Code</label>
                        <input
                           type="text"
                           class="form-control"
                           id="zip_code"
                           name="zip_code"
                           placeholder="Postal Code"
                           value="" />
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group">
                        <label for="phone_number">Mobile</label>
                        <input
                           type="text"
                           class="form-control"
                           id="phone_number"
                           name="phone_number"
                           placeholder="Phone Number" />
                     </div>
                  </div>
               </div>
               <div class="row" data-aos="fade-up" data-aos-delay="250">
                  <div class="col-12">
                     <hr class="mb-4" />
                  </div>
                  <div class="col-12">
                     <h2 class="mb-2">Payment Information</h2>
                  </div>
               </div>
               <div class="row" data-aos="fade-up" data-aos-delay="300">
                  <div class="col-4 col-md-2">
                     <div class="product-title">$580</div>
                     <div class="product-subtitle">Ship to Jakarta</div>
                  </div>
                  <div class="col-4 col-md-2">
                     <div class="product-title text-success">@currency($totalPrice ?? 0)</div>
                     <div class="product-subtitle">Total</div>
                  </div>
                  <div class="col-8 col-md-3 offset-md-5">
                     <a
                        href="{{ route('success') }}"
                        class="btn btn-success btn-checkout mt-4 px-4 py-2 btn-block">Checkout Now</a>
                  </div>
               </div>
            </form>
         </div>
      </section>
   </div>
@endsection

@push('addon-script')
   <script src="/vendor/vue/vue.js"></script>
   <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
   <script>
      var locations = new Vue({
         el: "#locations",
         mounted() {
            AOS.init();
            this.getProvincesData();
         },
         data: {
            provinces: null,
            regencies: null,
            provinces_id: null,
            regencies_id: null
         },
         methods: {
            getProvincesData() {
               var self = this;
               axios.get('{{ route('api-provinces') }}')
                  .then(function(response) {
                     self.provinces = response.data;
                  })
            },
            getRegenciesData() {
               var self = this;
               axios.get('{{ url('api/regencies') }}/' + self.provinces_id)
                  .then(function(response) {
                     self.regencies = response.data;
                  })
            },
         },
         watch: {
            provinces_id: function(val, oldVal) {
               this.regencies_id = null;
               this.getRegenciesData();
            }
         }
      });

   </script>
@endpush

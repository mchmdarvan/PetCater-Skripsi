@extends('layouts.app')

@section('title')
   Details | PetCater Online Store
@endsection

@section('content')
   <!-- Page Content -->
   <div class="page-content page-details">
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
                           <a href="{{ route('home') }}">Home</a>
                        </li>
                        <li class="breadcrumb-item active">Product Details</li>
                     </ol>
                  </nav>
               </div>
            </div>
         </div>
      </section>

      <section class="store-gallery mb-3" id="gallery">
         <div class="container">
            <div class="row">
               <div class="col-lg-8" data-aos="zoom-in">
                  <transition name="slide-fade" mode="out-in">
                     <img
                        :src="photos[defaultPhoto].url"
                        :key="photos[defaultPhoto].id"
                        class="w-100 main-image"
                        alt="Details Product" />
                  </transition>
               </div>
               <div class="col-lg-2">
                  <div class="row">
                     <div
                        class="col-3 col-lg-12 mt-2 mt-lg-0"
                        v-for="(photo, index) in photos"
                        :key="photo.id"
                        data-aos="zoom-in"
                        data-aos-delay="100">
                        <a href="#" @click="changeActive(index)">
                           <img
                              :src="photo.url"
                              class="w-100 thumbnail-image"
                              :class="{ active: index == defaultPhoto }"
                              alt="" />
                        </a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>

      <div class="store-details-container" data-aos="fade-up">
         <section class="store-heading">
            <div class="container">
               <div class="row">
                  <div class="col-lg-8">
                     <h1>{{ $product->name }}</h1>
                     <div class="owner">{{ $product->category->name }}</div>
                     <div class="price">@currency($product->price)</div>
                     @if ($product->qty <= 10)
                        <div class="stock text-danger">
                           stock <b>tersisa <{{ $product->qty }} </b> buah
                        </div>
                     @endif
                  </div>
                  <div class="col-lg-2" data-aos="zoom-in">
                     @auth
                        <form action="{{ route('details-add', $product->id) }}" method="POST"
                           enctype="multipart/form-data">
                           @csrf
                           <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                 <button class="btn btn-danger" type="button" id="btnMinus">-</button>
                              </div>
                              <input type="number" name="qty" onkeyup="myFunction(this)" value="1"
                                 id="textVal" min="0"
                                 max="{{ $product->qty }}"
                                 class="form-control"
                                 placeholder="Jumlah">
                              <div class="input-group-append">
                                 <button class="btn btn-success" type="button" id="btnPlus">+</button>
                              </div>
                           </div>
                           <button id="btnCart" type="submit"
                              class="btn btn-success px-4 text-white btn-block mb-3">
                              Add to cart
                           </button>
                        </form>
                     @endauth
                     @guest
                        <a href="{{ route('login') }}"
                           class="btn btn-success px-4 text-white btn-block mb-3">
                           Sign In
                        </a>
                     @endguest
                  </div>
               </div>
            </div>
         </section>
         <section class="store-description">
            <div class="container">
               <div class="row">
                  <div class="col-12 col-lg-8">
                     {!! $product->description !!}
                  </div>
               </div>
            </div>
         </section>
         <section class="store-review">
            <div class="container">
               <div class="row">
                  <div class="col-12 col-lg-8 mt-3 mb-3">
                     <h5>Produk yang mungkin anda minati</h5>
                  </div>
               </div>
               <?php $incrementProduct = 0; ?>
               <div class="row">
                  @foreach ($recomends as $recomend)
                     <div
                        class="col-6 col-md-4 col-lg-3"
                        data-aos="fade-up"
                        data-aos-delay="{{ $incrementProduct += 0 }}">
                        <a href="{{ route('details', $recomend->slug) }}"
                           class="component-products d-block">
                           <div class="products-thumbnail">
                              <div
                                 class="products-image"
                                 style="
                                                                                                                                                                     @if ($recomend->galleries->count()) background-image:
                                 url('{{ Storage::url($recomend->galleries->first()->photos) }}')
                              @else
                                 background-color: #eeeeee @endif
                                 ">
                              </div>
                           </div>
                           <div class="products-text">{{ $recomend->name }}</div>
                           <div class="products-price">@currency($recomend->price)</div>
                        </a>
                     </div>
                  @endforeach
               </div>
         </section>
      </div>
   </div>
@endsection

@push('addon-script')
   <script src="/vendor/vue/vue.js"></script>
   <script>
      var gallery = new Vue({
         el: "#gallery",
         mounted() {
            AOS.init();
         },
         data: {
            defaultPhoto: 0,
            photos: [
               @foreach ($product->galleries as $gallery){
                  id: {{ $gallery->id }},
                  url: "{{ Storage::url($gallery->photos) }}",
                  },
               @endforeach
            ],
         },
         methods: {
            changeActive(id) {
               this.defaultPhoto = id;
            },
         },
      });
   </script>

   <script>
      $('#btnPlus').click(function() {
         let textNow = $('#textVal').val();
         textNow = parseInt(textNow);
         textNow += 1;
         $('#textVal').val(textNow);
      });
   </script>
   <script>
      $('#btnMinus').click(function() {
         let textNow = $('#textVal').val();
         textNow = parseInt(textNow);
         textNow -= 1;
         $('#textVal').val(textNow);
      });
   </script>

   <script>
      function myFunction(el) {
         if (Number(el.value) > {{ $product->qty }})
            document.getElementById('btnCart').disabled = true;
         else
            document.getElementById('btnCart').disabled = false;
      }
   </script>
@endpush

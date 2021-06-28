@extends('layouts.app')

@section('title')
   Store | Categories Page
@endsection

@section('content')
   <!-- Page Content -->
   <div class="page-content page-home">
      <section class="store-trend-categories">
         <div class="container">
            <div class="row">
               <div class="col-12" data-aos="fade-up">
                  <h5>All Categories</h5>
               </div>
            </div>
            <div class="row">
               <?php $incrementCategory = 0; ?>
               @foreach ($categories as $category)
                  <div
                     class="col-6 col-md-3 col-lg-2"
                     data-aos="fade-up"
                     data-aos-delay="{{ $incrementCategory += 100 }}">
                     <a href="{{ route('categories-details', $category->slug) }}"
                        class="component-categories d-block">
                        <div class="categories-image">
                           <img
                              src="{{ Storage::url($category->photo) }}"
                              alt="{{ $category->name }}"
                              class="w-100" />
                        </div>
                        <p class="categories-text">{{ $category->name }}</p>
                     </a>
                  </div>
               @endforeach

            </div>
         </div>
      </section>
      <section class="store-new-product">
         <div class="container">
            <div class="row">
               <div class="col-12" data-aos="fade-up">
                  <h5>Our Products</h5>
               </div>
            </div>
            <?php $incrementProduct = 0; ?>
            <div class="row">
               @foreach ($products as $product)
                  <div
                     class="col-6 col-md-4 col-lg-3"
                     data-aos="fade-up"
                     data-aos-delay="{{ $incrementProduct += 100 }}">
                     <a href="{{ route('details', $product->slug) }}"
                        class="component-products d-block">
                        <div class="products-thumbnail">
                           <div
                              class="products-image"
                              style="@if ($product->galleries->count()) background-image:
                              url('{{ Storage::url($product->galleries->first()->photos) }}')
                           @else
                              background-color: #eeeeee @endif"></div>
                        </div>
                        @if ($product->qty <= 10)
                           <div class="badge badge-danger products-stock text-right"
                              style="float: right;">
                              tersisa {{ $product->qty }} buah
                           </div>
                        @endif
                        <div class="products-text">{{ $product->name }}</div>
                        <div class="products-price">@currency($product->price)</div>
                     </a>
                  </div>
               @endforeach

            </div>
            <div class="d-flex justify-content-center">
               {!! $products->links() !!}
            </div>
         </div>
      </section>
   </div>
@endsection

@extends('layouts.app')

@section('title')
   Store | Home Page
@endsection

@section('content')
   <div class="page-content page-home">
      <section class="store-carousel">
         <div class="container">
            <div class="row">
               <div class="col-lg-12" data-aos="zoom-in">
                  <div
                     id="storeCarousel"
                     class="carousel slide"
                     data-ride="carousel">
                     <ol class="carousel-indicators">
                        <li
                           class="active"
                           data-target="#storeCarousel"
                           data-slide-to="0"></li>
                        <li data-target="#storeCarousel" data-slide-to="1"></li>
                        <li data-target="#storeCarousel" data-slide-to="2"></li>
                     </ol>
                     <div class="carousel-inner">
                        <div class="carousel-item active">
                           <img
                              src="images/banner-store.jpg"
                              alt="banner-store"
                              class="d-block w-100" />
                        </div>
                        <div class="carousel-item">
                           <img
                              src="images/banner-store.jpg"
                              alt="banner-store"
                              class="d-block w-100" />
                        </div>
                        <div class="carousel-item">
                           <img
                              src="images/banner-store.jpg"
                              alt="banner-store"
                              class="d-block w-100" />
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <section class="store-trend-categories">
         <div class="container">
            <div class="row">
               <div class="col-12" data-aos="fade-up">
                  <h5>Trend Categories</h5>
               </div>
            </div>
            <div class="row">
               @php
                  $incrementCategory = 0;
               @endphp
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
                  <h5>New Products</h5>
               </div>
            </div>
            <?php $incrementProduct = 0; ?>
            <div class="row">
               @foreach ($products as $product)
                  <div
                     class="col-6 col-md-4 col-lg-3"
                     data-aos="fade-up"
                     data-aos-delay="{{ $incrementProduct += 0 }}">
                     <a href="{{ route('details', $product->slug) }}"
                        class="component-products d-block">
                        <div class="products-thumbnail">
                           <div
                              class="products-image"
                              style="@if ($product->galleries->count()) background-image:
                              url('{{ Storage::url($product->galleries->first()->photos) }}')
                           @else
                              background-color: #eeeeee @endif
                              ">
                           </div>
                        </div>
                        @if ($product->qty <= 10)
                           <div class="badge badge-danger products-stock">
                              tersisa {{ $product->qty }} buah
                           </div>
                        @endif
                        <div class="products-text">{{ $product->name }}</div>
                        <div class="products-price">@currency($product->price)</div>
                     </a>
                  </div>
               @endforeach

            </div>
         </div>
      </section>
   </div>
@endsection

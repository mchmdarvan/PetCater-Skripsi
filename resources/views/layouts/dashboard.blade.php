<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8" />
   <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no" />
   <meta name="description" content="" />
   <meta name="author" content="" />

   <title>@yield('title')</title>

   <!-- add icon link -->
   <link rel="icon" href="{{ URL::asset('images/logo-enzo.png') }}"
      type="image/x-icon">
   @stack('prepend-style')
   <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
   <link href="{{ URL::asset('style/main.css') }}" rel="stylesheet" />
   @stack('addon-style')
</head>

<body>
   <div class="page-dashboard">
      <div class="d-flex" id="wrapper" data-aos="fade-right">
         <!-- Sidebar -->
         <div class="border-right" id="sidebar-wrapper">
            <div class="sidebar-heading text-center">
               <img src="{{ URL::asset('images/logo-enzo.png') }}" class="my-4"
                  style="width: 150px" />
            </div>
            <div class="list-group list-group-flush">
               <a
                  href="{{ route('home') }}"
                  class="list-group-item list-group-item-action">Home</a>
               <a
                  href="{{ route('dashboard') }}"
                  class="list-group-item list-group-item-action {{ request()->is('dashboard') ? 'active' : '' }}">Dashboard</a>
               <a
                  href="{{ route('dashboard-transaction') }}"
                  class="list-group-item list-group-item-action {{ request()->is('dashboard/transaction*') ? 'active' : '' }}">Transactions</a>
               <a
                  href="{{ route('dashboard-setting-account') }}"
                  class="list-group-item list-group-item-action {{ request()->is('dashboard/account*') ? 'active' : '' }}">My
                  Account</a>
               <a href="{{ route('logout') }}"
                  onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                  class="list-group-item list-group-item-action">Logout</a>
               <form id="logout-form" action="{{ route('logout') }}" method="POST"
                  class="d-none">
                  @csrf
               </form>
            </div>
         </div>

         <!-- Page Content -->
         <div id="page-content-wrapper">
            <nav
               class="navbar navbar-expand-lg navbar-light navbar-store fixed-top"
               data-aos="fade-down">
               <div class="container-fluid">
                  <button
                     class="btn btn-secondary d-md-none mr-auto mr-2"
                     id="menu-toggle">
                     &laquo; Menu
                  </button>
                  <button
                     class="navbar-toggler"
                     type="button"
                     data-toggle="collapse"
                     data-target="#navbarSupportedContent">
                     <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                     <!-- Desktop Menu -->
                     <ul class="navbar-nav d-none d-lg-flex ml-auto">
                        <li class="nav-item dropdown">
                           <a
                              href="#"
                              class="nav-link"
                              id="navbarDropdown"
                              role="button"
                              data-toggle="dropdown">
                              @if (auth()->user()->photo == null)
                                 <img
                                    src="{{ URL::asset('images/icon_user.png') }}"
                                    alt=""
                                    class="rounded-circle mr-2 profile-picture" />
                              @else
                                 <img
                                    src="{{ Storage::url(auth()->user()->photo) }}"
                                    alt=""
                                    class="rounded-circle mr-2 profile-picture" />
                              @endif
                              Hi, {{ auth()->user()->name }}
                           </a>
                           <div class="dropdown-menu">
                              <a href="{{ route('home') }}" class="dropdown-item">Home</a>
                              <a href="{{ route('dashboard-setting-account') }}"
                                 class="dropdown-item">Settings</a>
                              <div class="dropdown-divider"></div>
                              <a href="{{ route('logout') }}"
                                 onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                 class="dropdown-item">Logout</a>
                              <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                 class="d-none">
                                 @csrf
                              </form>
                           </div>
                        </li>
                        <li class="nav-item">
                           <a href="{{ route('cart') }}" class="nav-link d-inline-block mt-2">
                              @php
                                 $carts = \App\Models\Cart::where('users_id', auth()->user()->id)->count();
                              @endphp
                              @if ($carts > 0)
                                 <img src="{{ URL::asset('images/icon-cart-filled.svg') }}" />
                                 <div class="card-badge">{{ $carts }}</div>
                              @else
                                 <img src="{{ URL::asset('images/icon-cart-empty.svg') }}" />
                              @endif
                           </a>
                        </li>
                     </ul>

                     <!-- Mobile Menu -->
                     <ul class="navbar-nav d-block d-lg-none">
                        <li class="nav-item">
                           <a href="#" class="nav-link"> Hi, {{ auth()->user()->name }}</a>
                        </li>
                        <li class="nav-item">
                           <a href="{{ route('cart') }}" class="nav-link d-inline-block"> Cart
                           </a>
                        </li>
                     </ul>
                  </div>
               </div>
            </nav>

            <!-- Section Content -->
            @yield('content')
         </div>
      </div>
   </div>

   <!-- Bootstrap core JavaScript -->
   @stack('prepend-script')
   <script src="{{ URL::asset('vendor/jquery/jquery.slim.min.js') }}"></script>
   <script src="{{ URL::asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
   <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
   <script>
      AOS.init();
   </script>
   <script>
      $("#menu-toggle").click(function(e) {
         e.preventDefault();
         $("#wrapper").toggleClass("toggled");
      });
   </script>
   @stack('addon-script')
</body>

</html>

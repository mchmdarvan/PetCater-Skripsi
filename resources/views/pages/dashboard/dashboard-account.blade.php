@extends('layouts.dashboard')

@section('title')
   My Account
@endsection

@section('content')
   <!-- Section Content -->
   <div
      class="section-content section-dashboard-home"
      data-aos="fade-up">
      <div class="container-fluid">
         <div class="dashboard-heading">
            <h2 class="dashboard-title">My Account</h2>
            <p class="dashboard-subtitle">Update your current profile</p>
         </div>
         <div class="dashboard-content">
            <div class="row">
               <div class="col-12">
                  <form action="">
                     <div class="card">
                        <div class="card-body" style="height: 85vh">
                           <div class="row">
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label for="yourName">Your Name</label>
                                    <input
                                       type="text"
                                       class="form-control"
                                       id="yourName"
                                       name="yourName"
                                       value="{{ Auth::user()->name }}" />
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label for="email">Your Email</label>
                                    <input
                                       type="email"
                                       class="form-control"
                                       id="email"
                                       name="email"
                                       value="{{ Auth::user()->email }}" />
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label for="addressOne">Address 1</label>
                                    <input
                                       type="text"
                                       class="form-control"
                                       id="addressOne"
                                       name="addressOne"
                                       value="{{ Auth::user()->address_one }}" />
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label for="addressTwo">Address 2</label>
                                    <input
                                       type="text"
                                       class="form-control"
                                       id="addressTwo"
                                       name="addressTwo"
                                       value="{{ Auth::user()->address_two }}" />
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label for="provence">Provence</label>
                                    <select
                                       name="provence"
                                       id="provence"
                                       class="form-control">
                                       <option value="West Java">West Java</option>
                                    </select>
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label for="city">City</label>
                                    <select
                                       name="city"
                                       id="city"
                                       class="form-control">
                                       <option value="Bandung">Bandung</option>
                                    </select>
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label for="postalCode">Postal Code</label>
                                    <input
                                       type="text"
                                       class="form-control"
                                       id="postalCode"
                                       name="postalCode"
                                       max="5"
                                       value="{{ Auth::user()->zip_code }}" />
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label for="mobile">Mobile</label>
                                    <input
                                       type="text"
                                       class="form-control"
                                       id="mobile"
                                       name="mobile"
                                       value="{{ Auth::user()->phone_number }}" />
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col text-right">
                                 <button
                                    type="submit"
                                    class="btn btn-success px-5">
                                    Save Now
                                 </button>
                              </div>
                           </div>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
@endsection

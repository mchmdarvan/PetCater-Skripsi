@extends('layouts.app')

@section('title')
   Jadwal Dokter
@endsection

@section('content')
   <div class="page-content">
      <section class="store-carousel">
         <div class="container">
            <div class="row">
               <div class="col-lg-12">
                  <h2 class="dashboard-title">Jam Praktek Dokter Hewan</h2>
                  <div class="table-responsive mt-3">
                     <table class="table table-borderless table-cart">
                        <thead>
                           <tr>
                              <th class="text-center">Hari</th>
                              <th class="text-center">Jam</th>
                              <th class="text-center">Dokter</th>
                           </tr>
                        </thead>
                        <tbody>
                           <tr>
                              <td class="text-center">Senin</td>
                              <td class="text-center">09.00 - 12.00</td>
                              <td class="text-center">Drh. Dhiah Rahmawati</td>
                           </tr>
                           <tr>
                              <td class="text-center">Selasa</td>
                              <td class="text-center">09.00 - 18.00</td>
                              <td class="text-center">Drh. Dhiah Rahmawati</td>
                           </tr>
                           <tr>
                              <td class="text-center">Rabu</td>
                              <td class="text-center">09.00 - 18.00</td>
                              <td class="text-center">Drh. M. Reza</td>
                           </tr>
                           <tr>
                              <td class="text-center">Kamis</td>
                              <td class="text-center">(Perjanjian) <br> 09.00 - 17.00</td>
                              <td class="text-center">Drh. M. Reza</td>
                           </tr>
                           <tr>
                              <td class="text-center">Jumat</td>
                              <td class="text-center">09.00 - 18.00</td>
                              <td class="text-center">Drh. M. Reza <br> Drh. Dhiah Rahmawati</td>
                           </tr>
                           <tr>
                              <td class="text-center">Sabtu</td>
                              <td class="text-center">09.00 - 17.00</td>
                              <td class="text-center">Drh. M. Reza</td>
                           </tr>
                           <tr>
                              <td class="text-center">Minggu</td>
                              <td class="text-center">09.00 - 12.00</td>
                              <td class="text-center">Drh. M. Reza</td>
                           </tr>
                        </tbody>
                     </table>
                  </div>
               </div>
               <div class="col-12 text-right">
                  <a href="https://api.whatsapp.com/send?phone=+6281290906434"
                     class="btn btn-success mt-4">Ingin membuat janji temu?
                  </a>
               </div>
            </div>
         </div>
      </section>
   </div>
@endsection

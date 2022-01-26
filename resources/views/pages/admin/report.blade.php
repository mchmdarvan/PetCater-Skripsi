@extends('layouts.admin')

@section('title')
   Admin Dashboard
@endsection

@section('content')
   <div
      class="section-content section-dashboard-home"
      data-aos="fade-up">
      <div class="container-fluid">
         <div class="dashboard-heading">
            <h2 class="dashboard-title">Admin Dashboard</h2>
            <p class="dashboard-subtitle">Report Penjualan Tiap Bulan</p>
         </div>
         <div class="dashboard-content">
            <div class="row">
               <div class="col-md-12">
                  <div class="card">
                     <div class="card-body">
                        <div class="table-responsive">
                           <table class="table table-hover scroll-horizontal-vertical w-100"
                              id="crudTable">
                              <thead>
                                 <tr>
                                    <th>Bulan dan Tahun</th>
                                    <th>Total Pemasukan</th>
                                    <th>Jumlah Barang Terjual</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <tr>
                                    <td>Januari 2021</td>
                                    <td>@currency($jan)</td>
                                    <td>{{ $sellJan }} Buah Barang</td>
                                 </tr>
                                 <tr>
                                    <td>Februari 2021</td>
                                    <td>@currency($feb)</td>
                                    <td>{{ $sellFeb }} Buah Barang</td>
                                 </tr>
                                 <tr>
                                    <td>Maret 2021</td>
                                    <td>@currency($mar)</td>
                                    <td>{{ $sellMar }} Buah Barang</td>
                                 </tr>
                                 <tr>
                                    <td>April 2021</td>
                                    <td>@currency($apr)</td>
                                    <td>{{ $sellApr }} Buah Barang</td>
                                 </tr>
                                 <tr>
                                    <td>Mei 2021</td>
                                    <td>@currency($may)</td>
                                    <td>{{ $sellMai }} Buah Barang</td>
                                 </tr>
                                 <tr>
                                    <td>Juni 2021</td>
                                    <td>@currency($jun)</td>
                                    <td>{{ $sellJun }} Buah Barang</td>
                                 </tr>
                                 <tr>
                                    <td>Juli 2021</td>
                                    <td>@currency($jul)</td>
                                    <td>{{ $sellJul }} Buah Barang</td>
                                 </tr>
                                 <tr>
                                    <td>Agustus 2021</td>
                                    <td>@currency($aug)</td>
                                    <td>{{ $sellAug }} Buah Barang</td>
                                 </tr>
                                 <tr>
                                    <td>September 2021</td>
                                    <td>@currency($sep)</td>
                                    <td>{{ $sellSep }} Buah Barang</td>
                                 </tr>
                                 <tr>
                                    <td>Oktober 2021</td>
                                    <td>@currency($okc)</td>
                                    <td>{{ $sellOct }} Buah Barang</td>
                                 </tr>
                                 <tr>
                                    <td>November 2021</td>
                                    <td>@currency($nov)</td>
                                    <td>{{ $sellNov }} Buah Barang</td>
                                 </tr>
                                 <tr>
                                    <td>Desember 2021</td>
                                    <td>@currency($dec)</td>
                                    <td>{{ $sellDec }} Buah Barang</td>
                                 </tr>
                                 <tr>
                                    <td>Januari 2022</td>
                                    <td>@currency($jan)</td>
                                    <td>{{ $sellJan }} Buah Barang</td>
                                 </tr>
                                 <tr>
                                    <td>Februari 2022</td>
                                    <td>@currency($feb)</td>
                                    <td>{{ $sellFeb }} Buah Barang</td>
                                 </tr>
                                 <tr>
                                    <td>Maret 2022</td>
                                    <td>@currency($mar)</td>
                                    <td>{{ $sellMar }} Buah Barang</td>
                                 </tr>
                                 <tr>
                                    <td>April 2022</td>
                                    <td>@currency($apr)</td>
                                    <td>{{ $sellApr }} Buah Barang</td>
                                 </tr>
                                 <tr>
                                    <td>Mei 2022</td>
                                    <td>@currency($mar)</td>
                                    <td>{{ $sellMar }} Buah Barang</td>
                                 </tr>
                                 <tr>
                                    <td>Juni 2022</td>
                                    <td>@currency($mar)</td>
                                    <td>{{ $sellMar }} Buah Barang</td>
                                 </tr>
                                 <tr>
                                    <td>Juli 2022</td>
                                    <td>@currency($mar)</td>
                                    <td>{{ $sellMar }} Buah Barang</td>
                                 </tr>
                                 <tr>
                                    <td>Agustus 2022</td>
                                    <td>@currency($aug)</td>
                                    <td>{{ $sellAug }} Buah Barang</td>
                                 </tr>
                                 <tr>
                                    <td>September 2022</td>
                                    <td>@currency($sep)</td>
                                    <td>{{ $sellSep }} Buah Barang</td>
                                 </tr>
                                 <tr>
                                    <td>Oktober 2022</td>
                                    <td>@currency($okc)</td>
                                    <td>{{ $sellOct }} Buah Barang</td>
                                 </tr>
                                 <tr>
                                    <td>November 2022</td>
                                    <td>@currency($nov)</td>
                                    <td>{{ $sellNov }} Buah Barang</td>
                                 </tr>
                                 <tr>
                                    <td>Desember 2022</td>
                                    <td>@currency($dec)</td>
                                    <td>{{ $sellDec }} Buah Barang</td>
                                 </tr>
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

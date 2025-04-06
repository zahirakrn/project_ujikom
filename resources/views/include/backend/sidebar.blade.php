 <div class="app-sidebar-menu">
     <div class="h-100" data-simplebar>

         <!--- Sidemenu -->
         <div id="sidebar-menu">

             <div class="logo-box">
                 <a href="index.html" class="logo logo-light">
                     <span class="logo-sm">
                         {{-- <img src="{{asset('admiiin/assets/logo/sidebar.png')}}" alt="" height="22"> --}}
                     </span>
                     <span class="logo-lg">
                         {{-- <img src="{{asset('admiiin/assets/logo/sidebar.png')}}" alt="" height="24"> --}}
                     </span>
                 </a>
                 <a href="index.html" class="logo logo-dark">
                     <span class="logo-sm">
                         <img src="{{ asset('admiiin/assets/logo/sidebar.png') }}" alt="" height="22">
                     </span>
                     <span class="logo-lg">
                         <img src="{{ asset('admiiin/assets/logo/sidebar.png') }}" alt="" height="65">
                     </span>
                 </a>
             </div>

             <ul id="side-menu">

                 <li class="menu-title">Menu</li>

                 <li>
                     <a href="{{ route('home') }}" class="tp-link"><i data-feather="home"></i><span> Dashboard
                         </span></a>
                 </li>
                 <li>
                     <a href="#sidebarTables" data-bs-toggle="collapse">
                         <i data-feather="table"></i>
                         <span> Tabel </span>
                         <span class="menu-arrow"></span>
                     </a>
                     <div class="collapse" id="sidebarTables">
                         <ul class="nav-second-level">
                             <li>
                                 <a href="{{ route('kategori.index') }}" class="tp-link">Kategori</a>
                             </li>
                             <li>
                                 <a href="{{ route('pembelian.index') }}" class="tp-link">Pembelian</a>
                             </li>
                             <li>
                                 <a href="{{ route('barang.index') }}" class="tp-link">Barang</a>
                             </li>
                             <li>
                                 <a href="{{ route('transaksi.index') }}" class="tp-link">Transaksi</a>
                             </li>
                             <li>
                                 <a href="{{ route('penggajian.index') }}" class="tp-link">Penggajian</a>
                             </li>
                         </ul>
                     </div>
                 </li>
                 <li class="menu-title">Manajemen</li>

                 <li>
                     <a href="#sidebarAuth" data-bs-toggle="collapse">
                         <i data-feather="file-text"></i>
                         <span> Note </span>
                         <span class="menu-arrow"></span>
                     </a>
                     <div class="collapse" id="sidebarAuth">
                         <ul class="nav-second-level">
                             <li>
                                 <a href="{{ route('catatanstok.index') }}" class="tp-link">Catatan Stok</a>
                             </li>
                            <li>
                                 <a href="{{ route('catatankeuangan.index') }}" class="tp-link">Catatan Keuangan</a>
                             </li>
                         </ul>
                     </div>
                 </li>

                 {{-- <li>
                     <li class="menu-title">Print</li>

                      <li>
                     <a href="{{ route('home') }}" class="tp-link"><i data-feather="file"></i><span> Laporan</span></a>
                 </li> --}}
             </ul>

         </div>
         <!-- End Sidebar -->

         <div class="clearfix"></div>

     </div>
 </div>

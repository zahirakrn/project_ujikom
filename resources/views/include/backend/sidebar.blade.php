 <div class="app-sidebar-menu">
                <div class="h-100" data-simplebar>

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">

                        <div class="logo-box">
                            <a href="index.html" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="{{asset('admiiin/assets/images/logo-sm.png')}}" alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="{{asset('admiiin/assets/images/logo-light.png')}}" alt="" height="24">
                                </span>
                            </a>
                            <a href="index.html" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="{{asset('admiiin/assets/images/logo-sm.png')}}" alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="{{asset('admiiin/assets/images/logo-dark.png')}}" alt="" height="24">
                                </span>
                            </a>
                        </div>

                        <ul id="side-menu">

                            <li class="menu-title">Menu</li>

                            <li>
                                <a href="#sidebarDashboards" data-bs-toggle="collapse">
                                    <i data-feather="home"></i>
                                    <span> Dashboard </span>
                                </a>
                            </li>
                            {{-- <li>
                                <a href="apps-calendar.html" class="tp-link">
                                    <i data-feather="calendar"></i>
                                    <span> Calendar </span>
                                </a>
                            </li> --}}
                            <li>
                                <a href="#sidebarTables" data-bs-toggle="collapse">
                                    <i data-feather="table"></i>
                                    <span> Tables </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="sidebarTables">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a href="{{route('kategori.index')}}" class="tp-link">Kategori</a>
                                        </li>
                                        <li>
                                            <a href="{{route('pembelian.index')}}" class="tp-link">Pembelian</a>
                                        </li>
                                        <li>
                                            <a href="{{route('barang.index')}}" class="tp-link">Barang</a>
                                        </li>
                                        <li>
                                            <a href="{{route('penggajian.index')}}" class="tp-link">Penggajian</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                            {{-- <li>
                                <a href="#sidebarCharts" data-bs-toggle="collapse">
                                    <i data-feather="pie-chart"></i>
                                    <span> Apex Charts </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="sidebarCharts">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a href='charts-line.html' class="tp-link">Line</a>
                                        </li>
                                        <li>
                                            <a href='charts-area.html' class="tp-link">Area</a>
                                        </li>
                                        <li>
                                            <a href='charts-column.html' class="tp-link">Column</a>
                                        </li>
                                        <li>
                                            <a href='charts-bar.html' class="tp-link">Bar</a>
                                        </li>
                                        <li>
                                            <a href='charts-mixed.html' class="tp-link">Mixed</a>
                                        </li>
                                        <li>
                                            <a href='charts-timeline.html' class="tp-link">Timeline</a>
                                        </li>
                                        <li>
                                            <a href='charts-rangearea.html' class="tp-link">Range Area</a>
                                        </li>
                                        <li>
                                            <a href='charts-funnel.html' class="tp-link">Funnel</a>
                                        </li>
                                        <li>
                                            <a href='charts-candlestick.html' class="tp-link">Candlestick</a>
                                        </li>
                                        <li>
                                            <a href='charts-boxplot.html' class="tp-link">Boxplot</a>
                                        </li>
                                        <li>
                                            <a href='charts-bubble.html' class="tp-link">Bubble</a>
                                        </li>
                                        <li>
                                            <a href='charts-scatter.html' class="tp-link">Scatter</a>
                                        </li>
                                        <li>
                                            <a href='charts-heatmap.html' class="tp-link">Heatmap</a>
                                        </li>
                                        <li>
                                            <a href='charts-treemap.html' class="tp-link">Treemap</a>
                                        </li>
                                        <li>
                                            <a href='charts-pie.html' class="tp-link">Pie</a>
                                        </li>
                                        <li>
                                            <a href='charts-radialbar.html' class="tp-link">Radialbar</a>
                                        </li>
                                        <li>
                                            <a href='charts-radar.html' class="tp-link">Radar</a>
                                        </li>
                                        <li>
                                            <a href='charts-polararea.html' class="tp-link">Polar</a>
                                        </li>
                                    </ul>
                                </div>
                            </li> --}}
                        </ul>

                    </div>
                    <!-- End Sidebar -->

                    <div class="clearfix"></div>

                </div>
            </div>

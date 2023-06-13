@include('Website.library')

<!--  <Nav> -->
<header class="bg-white">
<nav style="background-color:#81BC00; color:#81BC00;">
      .
      </nav>
      <nav class="navbar navbar-expand-lg">
        <div class="col-3">
          <a class="navbar-brand " href="/"><strong class=" text-brand text-info"> DESA NABUNAGE</strong></a>
        </div>
        <div class="col-6">
          <div class="navbar justify-content-center">
            @include('website.nav')
          </div>
        </div>
        <div class="col-1">
        <!-- <a class="nav-link btn btn-secondary btn-sm text-white text-uppercase" href="{{ url('login') }}"><b>login</b></a> -->
        </div>
      </nav>

<!-- </Nav> -->

    <section class="content mt-3">
      <div class="container">
        <!-- Small boxes (Stat box) -->

        <div class="row col-12 container">
          <a href="{{ url('/dataindeuk')}}" >
          <div class="col-auto">
          <div class="row bg-info rounded">
              <div class="col-bg-3 rounded-left col-4" style="background-color: rgba(112, 128, 144, 0.7);">
                <i class="bi bi-people bi-8xl text-center" style='font-size:60px;'></i>
                </div>
              <div class="col-bg-5 col-6">
                  <div class="card-block px-2">
                      <h4 class="card-title">Penduduk</h4>
                      <b class="card-text text-white">{{$jlh_pddk}}</b>
                    </div>
                  </div>
                </div>
              </a>
              </div>

        
        
          <div class="col-auto container">
            <a href="{{ url('/datasementara')}}" >
            <div class="row rounded" style="background-color:#FB1181;">
              <div class="col-bg-3 rounded-left col-4 " style="background-color:#BF0648;">
                <i class="bi bi-people bi-8xl text-center" style='font-size:60px;'></i>
                </div>
              <div class="col-bg-5 col-6">
                  <div class="card-block px-2">
                      <h4 class="card-title">Sementara</h4>
                      <b class="card-text text-white">{{$jlh_smtr}}</b>
                    </div>
                  </div>
                </div>
              </a>
          </div>


             
          <div class="col-auto container">
            <a href="{{ url('/staffdesa')}}" >
            <div class="row bg-success rounded">
              <div class="col-bg-3 rounded-left col-5"  style="background-color: rgba(112, 128, 144, 0.7);">
                <i class="bi bi-people bi-8xl text-center" style='font-size:60px;'></i>
                </div>
              <div class="col-bg-5 col-7">
                  <div class="card-block px-1">
                      <h4 class="card-title">Staff</h4>
                      <b class="card-text text-white">{{$jlh_staff}}</b>
                    </div>
                  </div>
                </div>
              </a>
          </div>

          
      <div class="row col-4 container">
       <a href="{{ url('/datakemat')}}" >
        <div class="col-auto">
            <div class="row bg-warning rounded col-8">
              <div class="col-bg-3 rounded-left col-5 bg-secondary">
                <img src="rip.png" alt=".." class="img-fluid mt-3">
                </div>
              <div class="col-bg-5 col-6">
                  <div class="card-block px-2">
                      <h4 class="card-title">Kematian</h4>
                      <b class="card-text text-white">{{$jlh_kmtn}}</b>
                    </div>
                  </div>
                </div>
              </div>
            </a>
            </div>

            <div class="row">
          <!-- Left col -->
          <section class="col-lg-6 connectedSortable">
            <!-- TO DO List -->

            <div class="card">
                <script src="https://code.highcharts.com/highcharts.js"></script>
                <div id="mama" style="width:100px;min-width:300px">
            </div>

              
              
            </section>
            <!-- /.Left col -->
            <!-- right col (We are only adding the ID to make the widgets sortable)-->
            <section class="col-lg-6 connectedSortable">
              <!-- DONUT CHART -->
              <!-- <div class="card card-danger"> -->

                <div class="card-body">              
                <section class="col-lg-12 connectedSortable ">
                <div class="row ">
                  <div class="col-12">
                  <div class="card">

                    <div class="card-body fa fa-info text-dark fa-lg mt-2"> <i class="fa fa-info text-lg"></i> Pengumuman<hr>
                    @foreach($pgumn as $item)
                      <a href="{{ url('penguman',$item->id)}}" class="wrapper">
                        <strong>{{$item->judul}} </strong>
                        <small> <br> {{$item->tanggal}}</small>
                      </a> <br> <hr>
                    @endforeach
                    </div> 
                  </div>
                  <!-- </div> -->
              </div>
            </section>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </section>
           
          <!-- right col -->
        </div>  <!-- CHART -->
        <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

    <script src="https://code.highcharts.com/highcharts.js"></script>
  <script>     
      // Create the chart
Highcharts.chart('mama', {
    chart: {
        type: 'column'
    },
    title: {
      text: 'STATUS PERKAWINAN',
      align: 'center'
    },
   
    accessibility: {
        announceNewData: {
            enabled: true
        }
    },
    xAxis: {
        type: 'category'
    },
    yAxis: {
        title: {
            text: 'Total Persent Perkawinan'
        }
    },
    legend: {
        enabled: false
    },
    plotOptions: {
        series: {
            borderWidth: 0,
            dataLabels: {
                enabled: true,
                format: '{point.y:.1f}%'
            }
        }
    },

    tooltip: {
        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
        pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
    },

    series: [
        {
            name: 'STATUS PERKAWINAN',
            colorByPoint: true,
            data: [
                {
                    name: 'Sudah Kawin',
                    y: {{$jumlah_sudah}},
                    drilldown: 'Sudah Kawin'
                },
                {
                    name: 'Belum Kawin',
                    y: {{$jumlah_belum}},
                    drilldown: 'Belum Kawin'
                },
                {
                    name: 'Cerai Hidup',
                    y: {{$ceraihidup}},
                    drilldown: 'Cerai Hidup'
                },
                {
                    name: 'Cerai Mati',
                    y: {{$ceraimati}},
                    drilldown: 'Cerai Mati'
                },
               
            ]
        }
    ],
    drilldown: {
        breadcrumbs: {
            position: {
                align: 'center'
            }
        },
        
        
    }
});
   
  </script>

@include('website.footer2')
                    
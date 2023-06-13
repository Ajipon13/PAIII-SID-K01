
 <div class="content-wrapper  ">
    <div class="content-header mt-0">
      <div class="container-fluid">
        <div class="row mb">
          <div class="col-sm-0">
          </div>
          <div class="col-sm-9">
            <ol class="breadcrumb float-sm">
            <a href="Dashboard/admin" class="">Dashboard</a>
            </ol>
          </div>
        </div>
    </div>
    </div>
    <!-- Main content -->
    <div class="card">
    <section class="content mt-4">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-4 col-8">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner row">
                <div class="icon col-4">
                  <i class="fa fa-users text-secondary"></i>
                  </div>
                  <div class="col-8">
                    <h1 class="text-center">PENDUDUK</p>
                    <h3 class="text-center">{{$jumlah_penduduk}}<sup style="font-size: 20px">%</sup></h3>
                  </div>
              </div>
              <a href="{{ url('penduduk')}}" class="small-box-footer">show list <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-8">
            <!-- small box -->
            <div class="small-box" style="background-color:#FB1181;">
              <div class="inner row">
              <div class="icon col-4">
                 <i class="fa fa-door-closed text-secondary"></i>
              </div>
              <div class="col-8">
              <h1 class="text-center">KEMATIAN</h1>
              <h3 class="text-center">{{$jumlah_kematian}}<sup style="font-size: 20px">%</sup></h3>
              </div>
              </div>

                <a href="{{ url('kematian') }}" class="small-box-footer">show list <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-4 col-8">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner row">
                  <div class="icon col-4">
                    <i class="fa fa-users text-secondary"></i>
                  </div>
                <div class="col-8">
                       <h1 class="text-center">STAFF DESA</h1>
                       <h3 class="text-center">{{$jumlah_sementara}}<sup style="font-size: 20px">%</sup></h3>
                  </div>
                </div>
                
              <a href="{{ url('indextamu') }}" class="small-box-footer">show list <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

      </div>
   
         <div class="row">
          <div class="col-6">
          <section class="col-lg-9 connectedSortable" >
              <div class="container card">
                   <script src="https://code.highcharts.com/highcharts.js"></script>
              <div id="mama" style="width:100px;min-width:300px">
          </section>
          </div>
          <div class="col-6">
          <section class="col-lg-9 connectedSortable" >
              <div class="container">
                <i class="fa fa-info-circle text-black"></i>
            Pengumuman   
            <hr>   
            @foreach($pengumuman as $pgmn)
            <ul>
              <li>
              <a href="{{ url('ditel-pengumuman',$pgmn->id)}}">
              <b>{{$pgmn->judul}}</b><br>
              <small>{{$pgmn->tanggal}}</small>
            </a> 
              </li>
            </ul>
            @endforeach 
            </div>
          </section>
          </div>
        </div>

      </div>
    </section>
    </div>
  </div>
  
  <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
  <script src="https://code.highcharts.com/highcharts.js"></script>
  <script>
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
                    name: 'Belum Kawin',
                    y: {{$jumlah_belum}},
                    drilldown: 'Belum Kawin'
                },
                {
                    name: 'Sudah Kawin',
                    y: {{$jumlah_sudah}},
                    drilldown: 'Sudah Kawin'
                },
               
                {
                    name: 'Cerai Hidup',
                    y: {{$ceraihidup}},
                    drilldown: 'Cerai Hudup'
                },
                {
                    name: 'Cerai Mati ',
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

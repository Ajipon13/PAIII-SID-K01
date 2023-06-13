
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          </div><!-- /.col -->
          <div class="col-sm-9">
            <ol class="breadcrumb float-sm">
            <a href="{{ url('Dashboard/desa')}}" class="">Dashboard</a>
            </ol>
          </div>
        </div><!-- /.row -->
      </div>
    </div>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-4 col-8">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="icon">
              <i class="fa fa-users"></i>
              </div>
              <div class="inner">
              <h3><strong> {{ $penduduk->count()}}</strong> <sup style="font-size: 20px">%</sup></h3>

                <p>Penduduk</p>
              </div>
              <a href="{{url('datapenduduk')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-8">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{$jumlah_sementara}}<sup style="font-size: 20px">%</sup></h3>

                <p>Kematian</p>
              </div>
              <div class="icon">
                <i class="fa fa-monument"></i>
              </div>
              <a href="{{url('datakematian')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-9">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{$jumlah_kematian}}<sup style="font-size: 20px">%</sup></h3>

                <p>Penduduk Sementara</p>
              </div>
              <div class="icon">
                <i class="fa fa-users"></i>
              </div>
              <a href="{{url('datatamu')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->

        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-6 connectedSortable">
            <!-- TO DO List -->

            <div class="card">
                <script src="https://code.highcharts.com/highcharts.js"></script>
                <div id="mama" style="width:100px;min-width:300px">
              </div>

            </section>
            <section class="col-lg-6 connectedSortable">
              <!-- DONUT CHART -->
              <div class="card">
                <div class="card-body">              
                <div id="container" style="width:100px;min-width:600px"></div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </section>
           
  <section class="col-lg-12 connectedSortable">
                <div class="row">
                  <div class="col-12">
                  <div class="card">
                    <div class="card-body fa fa-info text-dark fa-lg mt-2"> Pengumuman<hr>
                    @foreach($pgumn as $item)
                      <a href="{{ url('view-pengumuman',$item->id)}}" class="wrapper">
                        <strong>{{$item->judul}} </strong>
                        <small> <br> {{$item->tanggal}}</small>
                      </a> <br> <hr>
                    @endforeach
                    </div> 
                  </div>
                  </div>
              </div>
            </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  
  <!-- CHART -->
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

<script>
  Highcharts.chart('container', {
    chart: {
        type: 'pie',
        options3d: {
            enabled: true,
            alpha: 45
        }
    },
    title: {
        text: 'STATISTIK PEKERJAAN',
        align: 'center'
    },
  
    plotOptions: {
        pie: {
            innerSize: 100,
            depth: 45
        }
    },
    series: [{
        name: 'Medals',
        data: [
            ['Direktur', {{$pekerjaan}}],
            ['Guru',{{$pekerjaan}}],
            ['Pengusaha', 8],
            ['Dosen', 8],
            ['Gojek', 8],
            ['Pelayan', 6],
            ['Pdt', 7],
            ['Artis', 4],
            ['Supir', 3]

        ]
    }]
});
</script>

  <!--/ CHART -->
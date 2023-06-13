@include('Website.homeweb')
@section('content')
      <div class="row lg-6 mt-4">
            <div class="col-6">
                  <div class="alert">
                        <div class="alert-header alert-dark">INFORMASI DESA</div>
                        <div class="alert-body alert">
                              Selamat siang Alur!
                              <p>Ini Adalah Halaman INFORMASI</p>
                                <p>Selamat datang !</p>
                        </div>
                        <div class="alert-footer alert-dark">@copyritgh</div>
                  </div>
            </div>
      </div>

      @endsection



      <div class="row mt-4">
          <!-- Left col -->
          <section class="col-lg-6 connectedSortable">
            <!-- TO DO List -->

            <div class="card card-success">
              <div class="card-header">

               <center>STATUS PERKAWINAN</center>
              </div>
              <div class="card-body">
                </div>
                <canvas id="myChart" style="width:100px;min-width:300px"></canvas>
                <!-- /.card-body -->
              </div>
              
              
            </section>
            <!-- /.Left col -->
            <!-- right col (We are only adding the ID to make the widgets sortable)-->
            <section class="col-lg-6 connectedSortable">
              <!-- DONUT CHART -->
              <div class="card card-danger">
                <div class="card-header">
                  <center>STATISTIK PEKERJAAN</center>
                </div>
                <div class="card-body">              
                  <div id="chartpekerjaan" style="width:100px;min-width:600px"></div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>







@extends('layouts.master')

@section('title')
  dashboard
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="border-radius: 7px">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i>Dashboard</i>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
     

      <div class="row">
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box" style="border-radius: 5px;background-color: white;color: white;">
          
            <div class="inner">
              <center>
              <canvas id="genderChart" width="400" height="200"></canvas>
              </center>
            </div>
            
          </div>
        </div>

        <div class="col-lg-4 col-xs-6" height="200">
          <!-- small box -->
          <div class="small-box" style="border-radius: 5px;background-color: #765df8;color: white">
            <div class="inner" >
              <h3>{{$countResignData}}</h3>
              <p> Total Resign</p>
            </div>
            <div class="icon" >
              <i class="fa fa-users"></i>
            </div>
            <a href="#" class="small-box-footer">More Info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box" style="border-radius: 5px;background-color: #9d8bfb;color: white">
            <div class="inner">
              <h3>{{$countallPegawai}}</h3>
              <p> Total Semua Pegawai</p>
            </div>
            <div class="icon">
              <i class="fa fa-users"></i>
            </div>
            <a href="#" class="small-box-footer">More Info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>

      <div class="row">
        
        <div class="col-lg-6 col-xs-6">
          <!-- small box -->
          <div class="small-box" style="border-radius: 5px; background-color: white;color: white;">
            <div class="inner">
            <canvas id="ageRangeChart" width="400" height="200"></canvas>
            </div>
           
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-6 col-xs-6">
          <!-- small box -->
          <div class="small-box" style="border-radius: 5px;background-color: white;color: white;">
            <div class="inner">
            <canvas id="workingExperienceChart" width="400" height="200"></canvas>
            </div>
        
          </div>
        </div>
        <!-- ./col -->

        <!-- ./col -->
      </div>


    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
@push('scripts')
<!-- ChartJS -->
<script src="{{ asset('AdminLTE-2/bower_components/chart.js/Chart.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
        var ctx = document.getElementById('genderChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Laki-Laki', 'Perempuan'],
                datasets: [{
                    label: 'Gender Distribution',
                    data: [{{$malePercentage}}, {{$femalePercentage}}],
                    backgroundColor: [
                        '#0000FF',
                        '#FF0000',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: false,
            }
        });


        var ctx = document.getElementById('ageRangeChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['0-20', '21-30', '31-40', '41-50', '51+'],
                datasets: [{
                    label: 'Statistik Usia Pegawai',
                    data: [
                        {{$ageRanges['0-20']}},
                        {{$ageRanges['21-30']}},
                        {{$ageRanges['31-40']}},
                        {{$ageRanges['41-50']}},
                        {{$ageRanges['51+']}}
                    ],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.5)',
                        'rgba(54, 162, 235, 0.5)',
                        'rgba(255, 206, 86, 0.5)',
                        'rgba(75, 192, 192, 0.5)',
                        'rgba(153, 102, 255, 0.5)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
             
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });

        var ctx = document.getElementById('workingExperienceChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['0-1 year', '1-3 years', '3-5 years', '5-10 years', '10+ years'],
                datasets: [{
                    label: 'Lama Bekerja',
                    data: [
                        {{$experienceRanges['0-1 year']}},
                        {{$experienceRanges['1-3 years']}},
                        {{$experienceRanges['3-5 years']}},
                        {{$experienceRanges['5-10 years']}},
                        {{$experienceRanges['10+ years']}}
                    ],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.5)',
                        'rgba(54, 162, 235, 0.5)',
                        'rgba(255, 206, 86, 0.5)',
                        'rgba(75, 192, 192, 0.5)',
                        'rgba(153, 102, 255, 0.5)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
        
</script>

@endpush

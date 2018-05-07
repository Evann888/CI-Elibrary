<!-- load library jquery dan highcharts -->
<!-- <script src="<?php echo base_url();?>assets/js/jquery.js"></script> -->
<script src="<?php echo base_url();?>assets/js/highcharts.js"></script>
<!-- end load library -->
<style>
  #chartjs{
    padding-top: 80px;
    padding-right: 10px;
  }
</style>
<div class="tab-pane" id="chartjs">
    <div class="col-lg-offset-2">
      <div class="content-panel">
         <div class="panel-body text-center">
<?php
/* Mengambil query report*/
foreach($report as $result){
    $bulann = array(
            '1' => 'Januari',
            '2' => 'Februari',
            '3' => 'Maret',
            '4' => 'April',
            '5' => 'Mei',
            '6' => 'Juni',
            '7' => 'Juli',
            '8' => 'Agustus',
            '9' => 'September',
            '10' => 'Oktober',
            '11' => 'November',
            '12' => 'Desember',
    );

$bulan[] = $bulann[$result->bulan]; //ambil bulan
    $value[] = (float) $result->nilai; //ambil nilai
}
/* end mengambil query*/
?>

<!-- Load chart dengan menggunakan ID -->
<div id="report"></div>
<!-- END load chart -->

<!-- Script untuk memanggil library Highcharts -->
<script type="text/javascript">
$(function () {
    $('#report').highcharts({
        chart: {
            type: 'column',
            margin: 75,
            options3d: {
                enabled: false,
                alpha: 10,
                beta: 25,
                depth: 70
            }
        },
        title: {
            text: 'Jumlah Pendaftaran User',
            style: {
                    fontSize: '18px',
                    fontFamily: 'Verdana, sans-serif'
            }
        },
        subtitle: {
           text: '',
           style: {
                    fontSize: '15px',
                    fontFamily: 'Verdana, sans-serif'
            }
        },
        plotOptions: {
            column: {
                depth: 25
            }
        },
        credits: {
            enabled: false
        },
        xAxis: {
            categories:  <?php echo json_encode($bulan);?>
        },
        exporting: {
            enabled: false
        },
        yAxis: {
            title: {
                text: 'Jumlah'
            },
        },
        tooltip: {
             formatter: function() {
                 return 'Jumlah Pendaftaran Anggota pada Bulan <b>' + this.x + '</b> adalah <b>' + Highcharts.numberFormat(this.y,0) + ' ' +this.series.name;
             }
          },
        series: [{
            name: 'Orang',
            data: <?php echo json_encode($value);?>,
            shadow : true,
            dataLabels: {
                enabled: true,
                color: '#045396',
                align: 'center',
                formatter: function() {
                     return Highcharts.numberFormat(this.y, 0);
                }, // one decimal
                y: 0, // 10 pixels down from the top
                style: {
                    fontSize: '13px',
                    fontFamily: 'Verdana, sans-serif'
                }
            }
        }]
    });
});
</script>

</div>
</div>
</div>
</div>

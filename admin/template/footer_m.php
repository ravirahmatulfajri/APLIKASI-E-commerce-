<!-- jQuery -->
<script src="asset/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="asset/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="asset/dist/js/adminlte.min.js"></script>
<!-- FLOT CHARTS -->
<script src="asset/plugins/flot/jquery.flot.js"></script>
<!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
<script src="asset/plugins/flot/plugins/jquery.flot.resize.js"></script>
<!-- FLOT PIE PLUGIN - also used to draw donut charts -->
<script src="asset/plugins/flot/plugins/jquery.flot.pie.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="asset/dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    /*
     * Flot Interactive Chart
     * -----------------------
     */
    // We use an inline data source in the example, usually data would
    // be fetched from a server
    var data        = [],
        totalPoints = 100

    
    /*
     * BAR CHART
     * ---------
     */

    var bar_data = {
      data : [
      <?php
      if (!empty($_GET['tahun'])) {
        $tahun = $_GET['tahun'];
      }
        include "../lib/config.php";
        include "../lib/koneksi.php";
        $query = mysqli_query($koneksi, "SELECT MONTH(a.tgl_order), sum(b.jumlah) as tt FROM orders a, orders_detail b WHERE YEAR(a.tgl_order) = $tahun and a.id_orders = b.id_orders GROUP BY MONTH(a.tgl_order)");
        $i=0;
        while($o=mysqli_fetch_array($query)){
          $i = $o['MONTH(a.tgl_order)'];
          $y = $o['tt'];
          
          echo "[$i,$y],";
          
        }
      ?>
         
        [1,0],
        [2,0],
        [3,0], 
        [4,0], 
        [5,0], 
        [6,0], 
        [7,0],
        [8,0],
        [9,0],
        [10,0],
        [11,0],
        [12,0]
        ],
      bars: { show: true }
    }
    $.plot('#bar-chart', [bar_data], {
      grid  : {
        borderWidth: 1,
        borderColor: '#f3f3f3',
        tickColor  : '#f3f3f3'
      },
      series: {
         bars: {
          show: true, barWidth: 0.5, align: 'center',
        },
      },
      colors: ['#3c8dbc'],
      xaxis : {
        ticks: [
          [1,'Januari'], 
          [2,'Februari'], 
          [3,'Maret'], 
          [4,'April'], 
          [5,'Mei'], 
          [6,'Juni'], 
          [7,'Juli'], 
          [8,'Agustus'], 
          [9,'September'], 
          [10,'Oktober'], 
          [11,'November'], 
          [12,'Desember']
        ]
      }
    })
    /* END BAR CHART */

  })

  /*
   * Custom Label formatter
   * ----------------------
   */
  function labelFormatter(label, series) {
    return '<div style="font-size:13px; text-align:center; padding:2px; color: #fff; font-weight: 600;">'
      + label
      + '<br>'
      + Math.round(series.percent) + '%</div>'
  }
</script>
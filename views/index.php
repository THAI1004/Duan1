<?php


include  './include/header.php';

?>

<html>

<head>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load('current', {
      'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

      var data = google.visualization.arrayToDataTable([
        ['category_name', 'number_cate'],
        <?php foreach ($thongkeCate as $key) {
          echo "['" . $key["category_name"] . "'," . $key["number_cate"] . "],";
        } ?>
      ]);

      var options = {
        title: 'Thống kê số sản phẩm theo danh mục'
      };

      var chart = new google.visualization.PieChart(document.getElementById('piechart'));

      chart.draw(data, options);
    }
    google.charts.load('current', {
      packages: ['corechart', 'line']
    });
    google.charts.setOnLoadCallback(drawBackgroundColor);

    function drawBackgroundColor() {
      var data = new google.visualization.DataTable();
      data.addColumn('string', 'day');
      data.addColumn('number', 'odder');

      data.addRows([
        <?php foreach ($thongKeOrder as $key) {
          echo "['" . $key["order_day"] . "'," . $key["total_orders"] . "],";
        } ?>

      ]);

      var options = {
        hAxis: {
          title: 'Time'
        },
        vAxis: {
          title: 'Đơn hàng theo ngày'
        },
        backgroundColor: '#f1f8e9'
      };

      var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
      chart.draw(data, options);
    }
  </script>

  <style>
    .flex {
      display: flex;
      justify-content: space-between;
    }
  </style>
</head>

<body>
  <div class="container">
    <h2>Thống kê số sản phẩm theo danh sách danh mục </h2>
    <div id="piechart" style="width: 100%; height: 500px;"></div>
    <h2>Số đơn hàng thay đổi theo ngày</h2>
    <div id="chart_div" style="width: 100%; height: 500px;"></div>
  </div>

</body>

</html>

<?php


include  './include/footer.php';



?>
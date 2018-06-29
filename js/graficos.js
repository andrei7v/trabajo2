$(document).ready(function() {
  permisos();

  function permisos() {
    $.getJSON("php/permisos.php", function(response) {
      if (response.permisos == 2) {} else {
        window.location = 'index.php';
        return;
      }
    });
  }


  $.getJSON('php/cantidadProductosBar.php', function(response) {
    Highcharts.chart('container2', {
      chart: {
        type: 'bar'
      },
      title: {
        text: 'CANTIDAD DE PRODUCTOS VENDIDOS'
      },
      xAxis: {
        categories: response.productos,
        title: {
          text: null
        }
      },
      yAxis: {
        min: 0,
        title: {
          text: 'Cantidad de productos',
          align: 'high'
        },
        labels: {
          overflow: 'justify'
        }
      },
      tooltip: {
        valueSuffix: ' producto(s)'
      },
      plotOptions: {
        bar: {
          dataLabels: {
            enabled: true
          }
        }
      },
      legend: {
        layout: 'vertical',
        align: 'left',
        verticalAlign: 'top',
        x: -300,
        y: 300,
        floating: true,
        borderWidth: 1,
        backgroundColor: ((Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'),
        shadow: true
      },
      credits: {
        enabled: false
      },
      series: [{
        name: 'Año 2018',
        data: response.cantidades
      }]
    });


  });
});
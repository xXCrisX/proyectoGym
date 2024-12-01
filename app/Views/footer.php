</div>
<footer class="text-white text-center py-3">
        <div class="container">
            <p style="color:white">&copy; el orden de los factores no altera el producto c:.</p>
            <ul class="list-inline">
      <li class="list-inline-item"><a href="#about" class="text-white text-decoration-none">Sobre nosotros</a></li>
      <li class="list-inline-item"><a href="#services" class="text-white text-decoration-none">Servicios</a></li>
      <li class="list-inline-item"><a href="#contact" class="text-white text-decoration-none">Contacto</a></li>
      <li class="list-inline-item"><a href="#privacy" class="text-white text-decoration-none">Política de privacidad</a></li>
    </ul>
        </div>
    </footer>
<script src="<?=base_url('bootstrap/js/bootstrap.bundle.min.js')?>"></script>
<script src="<?=base_url('bootstrap/js/bootstrap.min.js')?>"></script>
<script src="<?=base_url('js/gym.js')?>"></script>

<script>
    Highcharts.chart('container1', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Socios con mas visitas'
    },
    subtitle: {
        text: 'Desde el año 2024</a>'
    },
    xAxis: {
        type: 'category',
        labels: {
            autoRotation: [-45, -90],
            style: {
                fontSize: '13px',
                fontFamily: 'Verdana, sans-serif'
            }
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Total (Días)'
        }
    },
    legend: {
        enabled: false
    },
    tooltip: {
        pointFormat: 'Total de visitas: <b>{point.y:.0f} dias</b>'
    },
    series: [{
        name: 'Total Días',
        colors: [
            '#EB0010BF','#282725','#3c67e1'
        ],
        colorByPoint: true,
        groupPadding: 0,
        data: [
            <?php if(isset($result)):?>
            <?php foreach($result as $key):?>
            [<?="'".$key->nombre."'"?>, <?=$key->total?>],
            <?php endforeach?>
           <?php endif?>
        ],
        dataLabels: {
            enabled: true,
            rotation: -90,
            color: '#FFFFFF',
            inside: true,
            verticalAlign: 'top',
            format: '{point.y:.0f}', // one decimal
            y: 10, // 10 pixels down from the top
            style: {
                fontSize: '13px',
                fontFamily: 'Verdana, sans-serif'
            }
        }
    }]
});
</script>

<script>
    Highcharts.chart('container2', {
    chart: {
        type: 'pie'
    },
    title: {
        text: 'Egg Yolk Composition'
    },
    tooltip: {
        valueSuffix: '%'
    },
    subtitle: {
        text:
        'Source:<a href="https://www.mdpi.com/2072-6643/11/3/684/htm" target="_default">MDPI</a>'
    },
    plotOptions: {
        series: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: [{
                enabled: true,
                distance: 20
            }, {
                enabled: true,
                distance: -40,
                format: '{point.percentage:.1f}%',
                style: {
                    fontSize: '1.2em',
                    textOutline: 'none',
                    opacity: 0.7
                },
                filter: {
                    operator: '>',
                    property: 'percentage',
                    value: 10
                }
            }]
        }
    },
    series: [
        {
            name: 'Percentage',
            colorByPoint: true,
            data: [
                {
                    name: 'Water',
                    y: 55.02
                },
                {
                    name: 'Fat',
                    sliced: true,
                    selected: true,
                    y: 26.71
                },
                {
                    name: 'Carbohydrates',
                    y: 1.09
                },
                {
                    name: 'Protein',
                    y: 15.5
                },
                {
                    name: 'Ash',
                    y: 1.68
                }
            ]
        }
    ]
});

</script>

<script>
    // Data retrieved from https://olympics.com/en/olympic-games/beijing-2022/medals
Highcharts.chart('container3', {
    chart: {
        type: 'pie',
        options3d: {
            enabled: true,
            alpha: 45
        }
    },
    title: {
        text: 'Beijing 2022 gold medals by country',
        align: 'left'
    },
    subtitle: {
        text: '3D donut in Highcharts',
        align: 'left'
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
            ['Norway', 16],
            ['Germany', 12],
            ['USA', 8],
            ['Sweden', 8],
            ['Netherlands', 8],
            ['ROC', 6],
            ['Austria', 7],
            ['Canada', 4],
            ['Japan', 3]

        ]
    }]
});
</script>
<script>
    Highcharts.chart('container4', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Socios con mas visitas'
    },
    subtitle: {
        text: 'Desde el año 2024</a>'
    },
    xAxis: {
        type: 'category',
        labels: {
            autoRotation: [-45, -90],
            style: {
                fontSize: '13px',
                fontFamily: 'Verdana, sans-serif'
            }
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Total (Días)'
        }
    },
    legend: {
        enabled: false
    },
    tooltip: {
        pointFormat: 'Total de visitas: <b>{point.y:.0f} dias</b>'
    },
    series: [{
        name: 'Total Días',
        colors: [
            '#EB0010BF','#282725','#3c67e1'
        ],
        colorByPoint: true,
        groupPadding: 0,
        data: [
           
           <?php if(isset($asistenciaD)):?>
            <?php foreach($asistenciaD as $key2):?>
            [<?="'".$key2->dia."'"?>, <?=$key2->totalAsistencias?>],
            <?php endforeach?>
           <?php endif?>
        ],
        dataLabels: {
            enabled: true,
            rotation: -90,
            color: '#FFFFFF',
            inside: true,
            verticalAlign: 'top',
            format: '{point.y:.0f}', // one decimal
            y: 10, // 10 pixels down from the top
            style: {
                fontSize: '13px',
                fontFamily: 'Verdana, sans-serif'
            }
        }
    }]
});
</script>
</body>
</html>

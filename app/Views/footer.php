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
</body>
</html>
<script>
    const{createApp}=Vue
    createApp({
        data(){
            return{
                entrenador:false,
                socio:false,
                admin:false,
                sEntr:false,
                sSoc:false,
                sAdm:false
            }
        },
        methods:{
            cambiarTipo(event){
                const tipoSeleccionado=event.target.value;
                if(tipoSeleccionado=="0"){
                    this.selectAdmin();
                }
                if(tipoSeleccionado=="1"){
                    this.selectEntr();
                }
                
                if(tipoSeleccionado=="2"){
                    this.selectSoc();
                }
            },
            selectEntr(){
                this.entrenador=true
                this.socio=false
            },
            selectSoc(){
                this.socio=true
                this.entrenador=false
            },
            selectAdmin(){
                this.socio=false
                this.entrenador=false
            },
            showEntr(){
                this.sEntr=true
                this.sAdm=false
                this.sSoc=false
            },
            showSoc(){
                this.sSoc=true
                this.sEntr=false
                this.sAdm=false
            },
            showAdm(){
                this.sSoc=false
                this.sEntr=false
                this.sAdm=true
            }
        }
    }).mount('#app')
</script>
<script>
  document.addEventListener('DOMContentLoaded', () => {
  const agregarEquipo = document.getElementById('agregarEquipo');
  
  if (agregarEquipo) {
    agregarEquipo.addEventListener('show.bs.modal', event => {
      // Botón que disparó el modal
      const button = event.relatedTarget;
      // Extrae la información del atributo data-id-ejercicio
      const idEjercicio = button.getAttribute('data-id-ejercicio');

      // Asigna el valor al input hidden
      const inputIdEjercicio = document.getElementById('idEjercicioHidden');
      inputIdEjercicio.value = idEjercicio;
      const checkboxes = agregarEquipo.querySelectorAll('input[type="checkbox"]');
    checkboxes.forEach(checkbox => {
      checkbox.checked = false; // Desmarca todos los checkboxes
    })
    });
  }
  
});
</script>

<script>
    Highcharts.chart('container', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'World\'s largest cities per 2021'
    },
    subtitle: {
        text: 'Source: <a href="https://worldpopulationreview.com/world-cities" target="_blank">World Population Review</a>'
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
            text: 'Population (millions)'
        }
    },
    legend: {
        enabled: false
    },
    tooltip: {
        pointFormat: 'Population in 2021: <b>{point.y:.1f} millions</b>'
    },
    series: [{
        name: 'Population',
        colors: [
            '#EB0010BF','#282725','#3c67e1'
        ],
        colorByPoint: true,
        groupPadding: 0,
        data: [
            ['Tokyo', 37.33],
            ['Delhi', 31.18],
            ['Shanghai', 27.79],
            ['Sao Paulo', 22.23],
            ['Mexico City', 21.91],
            ['Dhaka', 21.74],
            ['Cairo', 21.32],
            ['Beijing', 20.89],
            ['Mumbai', 20.67],
            ['Osaka', 19.11],
            ['Karachi', 16.45],
            ['Chongqing', 16.38],
            ['Istanbul', 15.41],
            ['Buenos Aires', 15.25],
            ['Kolkata', 14.974],
            ['Kinshasa', 14.970],
            ['Lagos', 14.86],
            ['Manila', 14.16],
            ['Tianjin', 13.79],
            ['Guangzhou', 13.64]
        ],
        dataLabels: {
            enabled: true,
            rotation: -90,
            color: '#FFFFFF',
            inside: true,
            verticalAlign: 'top',
            format: '{point.y:.1f}', // one decimal
            y: 10, // 10 pixels down from the top
            style: {
                fontSize: '13px',
                fontFamily: 'Verdana, sans-serif'
            }
        }
    }]
});

</script>
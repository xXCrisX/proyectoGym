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
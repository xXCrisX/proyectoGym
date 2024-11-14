<footer class="bg-black text-white text-center py-3">
        <div class="container">
            <p style="color:white">&copy; el orden de los factores no altera el producto c:.</p>
        </div>
    </footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

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
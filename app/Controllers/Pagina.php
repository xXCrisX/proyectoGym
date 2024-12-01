<?php

namespace App\Controllers;

class Pagina extends BaseController
{
    
    public function inicio()
    {
        $session=session();
        if($session->get('logged_in')!=true || $session->get('tipo')!=2){
             return redirect()->to(base_url('/loginSocio'));
        }
        $data1 ['foto']=$session->get('foto');
        return view('/pagina/head').
               view('/pagina/menu',$data1).
               view('/pagina/inicio').
               view('/pagina/footer');
    }

    public function rutinas()
    {
        $session=session();
        if($session->get('logged_in')!=true || $session->get('tipo')!=2){
             return redirect()->to(base_url('/loginSocio') );
        }
        $data1 ['foto']=$session->get('foto');
        $rutinaM=model('RutinaM');
        $data['rutina']=$rutinaM->allRutinas();
        $idSocio=$session->get('idSocio');
        $data['rutinasSocio']=$rutinaM->rutinasSocio($idSocio);
        return view('/pagina/head').
               view('/pagina/menu',$data1).
               view('/pagina/rutinaS',$data).
               view('/pagina/footer');
    }

    public function verRutina($idRutina)
    {
        $session=session();
        if($session->get('logged_in')!=true || $session->get('tipo')!=2){
             return redirect()->to(base_url('/loginSocio') );
        }
        $data1 ['foto']=$session->get('foto');
        $rutinaM=model('RutinaM');
        $idSocio=$session->get('idSocio');
        $data['rutina']=$rutinaM->getAllRutina($idRutina);
        $data['ejercicios']=$rutinaM->getEjercicios($idRutina);
        $data['equipo']=$rutinaM->getEquipo();
        return view('/pagina/head').
               view('/pagina/menu',$data1).
               view('/pagina/rutinaS2',$data).
               view('/pagina/footer');
    }

    public function verEquipo()
    {
        $session=session();
        if($session->get('logged_in')!=true || $session->get('tipo')!=2){
             return redirect()->to(base_url('/loginSocio') );
        }
        $data1 ['foto']=$session->get('foto');
        $equipoM=model('EquipoM');
        $data['equipo']=$equipoM->getEquipo();
        $rutinaM=model('RutinaM');
        return view('/pagina/head').
               view('/pagina/menu',$data1).
               view('/pagina/equipo',$data).
               view('/pagina/footer');
    }

    public function Dietas()
    {
        $session=session();
        if($session->get('logged_in')!=true || $session->get('tipo')!=2){
             return redirect()->to(base_url('/loginSocio') );
        }
        $data1 ['foto']=$session->get('foto');
        $idSocio=$session->get('idSocio');
        $dietaM=model('DietaM');
        $data['dietas']=$dietaM->getAllDietas($idSocio);
        $rutinaM=model('RutinaM');
        return view('/pagina/head').
               view('/pagina/menu',$data1).
               view('/pagina/dieta',$data).
               view('/pagina/footer');
    }

    public function verDieta($idDieta)
    {
        $session=session();
        if($session->get('logged_in')!=true || $session->get('tipo')!=2){
             return redirect()->to(base_url('/loginSocio') );
        }
        $data1 ['foto']=$session->get('foto');
        $dietaM=model('DietaM');
        $data['dieta']=$dietaM->getDieta($idDieta);
        $rutinaM=model('RutinaM');
        return view('/pagina/head').
               view('/pagina/menu',$data1).
               view('/pagina/dietaVer',$data).
               view('/pagina/footer');
    }

    public function Actividades()
    {
        $session=session();
        if($session->get('logged_in')!=true || $session->get('tipo')!=2){
             return redirect()->to(base_url('/loginSocio') );
        }
        $data1 ['foto']=$session->get('foto');
        $actividadM=model('ActividadModel');
        $data['actividades']=$actividadM->getActividades();
        return view('/pagina/head').
               view('/pagina/menu',$data1).
               view('/pagina/actividad',$data).
               view('/pagina/footer');
    }
    public function insert($idActividad)
    {
     
        $session=session();
        if($session->get('logged_in')!=true || $session->get('tipo')!=2){
             return redirect()->to(base_url('/loginSocio') );
        }
        $data1 ['foto']=$session->get('foto');
        $idSocio=$session->get('idSocio');
        $socioActividadM=model('SocioActividadModel');
        $result=$socioActividadM->validacionSocio($idSocio,$idActividad);
      
        if(count($result)>0){
          $result['validarS']=$socioActividadM->validacionSocio($idSocio,$idActividad);
          return view('/pagina/head').
                 view('/pagina/menu',$data1).
                 view('/pagina/actividadValidacion',$result).
                 view('/pagina/footer');
        }
        $result2=$socioActividadM->validar($idActividad);
        if($result2[0]->total==$result2[0]->capacidad){
          $result2['validarA']=$socioActividadM->validar($idActividad);
          return view('/pagina/head').
                 view('/pagina/menu',$data1).
                 view('/pagina/actividadValidacion',$result2).
                 view('/pagina/footer');
        }
        $data=[
          'idSocio'=>$idSocio,
          'idActividad'=>$idActividad
        ];
        $socioActividadM->insert($data);
        return redirect()->to(base_url('/actividadSocio/validar') );
    }

    public function validar()
    {
     $session=session();
     if($session->get('logged_in')!=true || $session->get('tipo')!=2){
          return redirect()->to(base_url('/loginSocio') );
     }
     $data1 ['foto']=$session->get('foto');
     return view('/pagina/head').
            view('/pagina/menu',$data1).
            view('/pagina/actividadValidacion').
            view('/pagina/footer');
    }

    public function pagos()
    {
     $session=session();
     if($session->get('logged_in')!=true || $session->get('tipo')!=2){
          return redirect()->to(base_url('/loginSocio') );
     }
     $data1 ['foto']=$session->get('foto');
     $idSocio=$session->get('idSocio');
     $pagoM=model('PagoM');
     $data['pagos']=$pagoM->pagosSocio($idSocio);
     return view('/pagina/head').
            view('/pagina/menu',$data1).
            view('/pagina/pagos',$data).
            view('/pagina/footer');
    }
}

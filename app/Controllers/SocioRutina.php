<?php
namespace App\Controllers;

class SocioRutina extends BaseController
{
    protected $helpers = ['form'];

    public function ver()
    {
        $session=session();
        if($session->get('logged_in')!=true || $session->get('tipo')!=1){
             return redirect()->to(base_url('/login'));
        }
        $data1 ['nombre']=$session->get('alias');
        $SocioRutinaM=model('SocioRutinaModel');
        $data['socioRutina']=$SocioRutinaM->verSociosRutinas();
        return view('head').
               view('menu',$data1).
               view('socioRutina/ver',$data).
               view('footer');
    }
    public function agregar()
    {
        $session=session();
        if($session->get('logged_in')!=true || $session->get('tipo')!=1){
             return redirect()->to(base_url('/login'));
        }
        $data1 ['nombre']=$session->get('alias');
        $SocioRutinaM=model('SocioRutinaModel');
        $data['rutina']=$SocioRutinaM->selectRutina();
        $data['socio']=$SocioRutinaM->selectSocio();
       return view('head').
              view('menu',$data1).
              view('socioRutina/agregar',$data).
              view('footer'); 
    }
    public function insertar()
    {
        $session=session();
        if($session->get('logged_in')!=true || $session->get('tipo')!=1){
             return redirect()->to(base_url('/login'));
        }
        $data1 ['nombre']=$session->get('alias'); 
        $SocioRutinaM=model('SocioRutinaModel');
        $data["socioRutina"]=$SocioRutinaM->findAll();     
        if (!$this->request->is('post'))
        {
            $this->ver();
        }
        $rules=[
            'idRutina'=>'required',
            'idSocio'=>'required',
            'fechaInicio'=>'required',
            'fechaFin'=>'required'
        ];
        $SocioRutinaM=model('SocioRutinaModel');
        $idUsuario=$session->get('idUsuario');
        $idEntrenador=$SocioRutinaM->getEntrenador($idUsuario);
        $data=[
        "idRutina"=>$_POST['idRutina'],      
        "idSocio"=> $_POST['idSocio'],
        "fechaInicio"=> $_POST['fechaInicio'],
        "fechaFin"=> $_POST['fechaFin'],
        "idEntrenador"=>$idEntrenador[0]->idEntrenador
        ];

           if(!$this->validate($rules)){
             return 
             view('head').
             view('menu',$data1).
             view('socioRutina/agregar',[
                'validation'=> $this->validator
             ]).
             view('footer');
           }else{
            $SocioRutinaM=model('SocioRutinaModel');
            $SocioRutinaM->insert($data);
            return redirect()->to(base_url('/socioRutina'));    
           }

    }
  
}

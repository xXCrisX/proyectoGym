<?php
namespace App\Controllers;

class SocioDieta extends BaseController
{
    protected $helpers = ['form'];

    public function ver()
    {
        $session=session();
        if($session->get('logged_in')!=true || $session->get('tipo')!=1){
             return redirect()->to(base_url('/login'));
        }
        $data1 ['nombre']=$session->get('alias');
        $socioDietaM=model('SocioDietaModel');
        $data['socioDieta']=$socioDietaM->verSociosDietas();
        return view('head').
               view('menu',$data1).
               view('socioDieta/ver',$data).
               view('footer');
    }
    public function agregar()
    {
        $session=session();
        if($session->get('logged_in')!=true || $session->get('tipo')!=1){
             return redirect()->to(base_url('/login'));
        }
        $data1 ['nombre']=$session->get('alias');
        $socioDietaM=model('SocioDietaModel');
        $data['dieta']=$socioDietaM->selectDieta();
        $data['socio']=$socioDietaM->selectSocio();
       return view('head').
              view('menu',$data1).
              view('socioDieta/agregar',$data).
              view('footer'); 
    }
    public function insertar()
    {
        $session=session();
        if($session->get('logged_in')!=true || $session->get('tipo')!=1){
             return redirect()->to(base_url('/login'));
        }
        $data1 ['nombre']=$session->get('alias'); 
        $socioDietaM=model('SocioDietaModel'); 
        if (!$this->request->is('post'))
        {
            $this->ver();
        }
        $rules=[
            'idSocio'=>'required',
            'idDieta'=>'required',
            'fechaInicio'=>'required',
            'fechaFin'=>'required'
        ];
        $socioDietaM=model('SocioDietaModel');
        $idUsuario=$session->get('idUsuario');
        $idEntrenador=$socioDietaM->getEntrenador($idUsuario);
        $data=[
        "idSocio"=>$_POST['idSocio'],      
        "idDieta"=> $_POST['idDieta'],
        "fechaInicio"=> $_POST['fechaInicio'],
        "fechaFin"=> $_POST['fechaFin'],
        "idEntrenador"=>$idEntrenador[0]->idEntrenador
        ];

           if(!$this->validate($rules)){
             return 
             view('head').
             view('menu',$data1).
             view('socioDieta/agregar',[
                'validation'=> $this->validator
             ]).
             view('footer');
           }else{
            $socioDietaM=model('SocioDietaModel');
            $socioDietaM->insert($data);
            return redirect()->to(base_url('/socioDieta'));    
           }

    }
  
}

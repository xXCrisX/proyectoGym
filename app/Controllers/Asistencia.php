<?php

namespace App\Controllers;

class Asistencia extends BaseController
{
   
   
    protected $helpers = ['form'];
    public function ver()
    {
        $session=session();
        if($session->get('logged_in')!=true || $session->get('tipo')!=1){
             return redirect()->to(base_url('/login'));
        }
        $data1 ['nombre']=$session->get('alias');
        $asistenciaM=model('AsistenciaM');
        $data['asistencia']=$asistenciaM->verAsistencia();
        return view('head').
               view('menu',$data1).
               view('asistencia/ver',$data).
               view('footer');
    }
    public function registrar()
    {
        $session=session();
        if($session->get('logged_in')!=true || $session->get('tipo')!=1){
             return redirect()->to(base_url('/login'));
        }
        $data1 ['nombre']=$session->get('alias');
        $asistenciaM=model('AsistenciaM');
        $data['socio']=$asistenciaM->selectSocio();
       return view('head').
              view('menu',$data1).
              view('asistencia/registrar',$data).
              view('footer'); 
    }
    public function insertar()
    {
        $session=session();
        if($session->get('logged_in')!=true || $session->get('tipo')!=1){
             return redirect()->to(base_url('/login'));
        }
        $data1 ['nombre']=$session->get('alias');

        if (!$this->request->is('post'))
        {
            $this->ver();
        }
        $rules=[
            'horaE'=>'required',
            'horaS'=>'required',
            'idSocio'=>'required',
            'fecha'=>'required'
        ];
        
        $data=[
        "horaE"=>$_POST['horaE'],      
        "horaS"=> $_POST['horaS'],
        "idSocio"=>$_POST['idSocio'],
        "fecha"=>$_POST['fecha']
        ];

           if(!$this->validate($rules)){
             return 
             view('head').
             view('menu').
             view('asistencia/registrar',[
                'validation'=> $this->validator
             ]).
             view('footer');
           }else{
            $asistenciaM=model('AsistenciaM');
            $asistenciaM->insert($data);
            return redirect()->to(base_url('/asistencias'));    
           }
           

    }
    public function editar($idAsistencia)
    {
        $session=session();
        if($session->get('logged_in')!=true || $session->get('tipo')!=1){
             return redirect()->to(base_url('/login'));
        }
        $data1 ['nombre']=$session->get('alias');
        $asistenciaM=model('AsistenciaM');
        $data['idAsistencia']=$idAsistencia;
        $data['asistencia']=$asistenciaM->where('idAsistencia',$idAsistencia)->findAll();
        $data['socio']=$asistenciaM->selectSocio();
      return view('head').
             view('menu',$data1).
            view('asistencia/editar',$data).
            view('footer'); 
    }
    public function actualizar()
    {
        $asistenciaM=model('AsistenciaM');
        $idAsistencia=$_POST['idAsistencia'];
        $data=[
            "horaE"=>$_POST['horaE'],      
            "horaS"=> $_POST['horaS'],
            "idSocio"=>$_POST['idSocio'],
            "fecha"=>$_POST['fecha']
        ];
        $asistenciaM->set($data)->where('idAsistencia',$idAsistencia)->update();
        return redirect ()->to(base_url('/asistencias')) ;
    }
   
}

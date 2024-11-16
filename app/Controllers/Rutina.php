<?php

namespace App\Controllers;

class Rutina extends BaseController
{   
    protected $helpers = ['form'];

    public function ver()
    {
        $session=session();
        if($session->get('logged_in')!=true || $session->get('tipo')!=1){
             return redirect()->to(base_url('/login'));
        }
        $data1 ['nombre']=$session->get('alias');
        $RutinaM=model('RutinaM');
        $data['rutina']=$RutinaM->findAll();
        return view('head').
               view('menu',$data1).
               view('rutina/ver',$data).
               view('footer');
    }
    public function agregar()
    {
        $session=session();
        if($session->get('logged_in')!=true || $session->get('tipo')!=1){
             return redirect()->to(base_url('/login'));
        }
        $data1 ['nombre']=$session->get('alias');
       return view('head').
              view('menu',$data1).
              view('rutina/agregar').
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
            'tipoRutina'=>'required',
            'descripcion'=>'required',
            'recomendacion'=>'required',
            'nivelDificultad'=>'required',
            'objetivo'=>'required',
            'duracionSemanas'=>'required',
            'foto'=>'required',
            'dia'=>'required'
        ];
        
        $data=[
        "tipoRutina"=>$_POST['tipoRutina'],      
        "descripcion"=> $_POST['descripcion'],
        "recomendacion"=> $_POST['recomendacion'],
        "nivelDificultad"=>$_POST['nivelDificultad'],
        "objetivo"=>$_POST['objetivo'],
        "duracionSemanas"=>$_POST['duracionSemanas'],
        "foto"=>$_POST['foto'],
        "dia"=>$_POST['dia']
        ];

           if(!$this->validate($rules)){
             return 
             view('head').
             view('menu').
             view('rutina/agregar',[
                'validation'=> $this->validator
             ]).
             view('footer');
           }else{
            $rutinaM=model('RutinaM');
            $rutinaM->insert($data);
            return redirect()->to(base_url('/rutinas'));    
           }

    }
    public function editar($idRutina)
    {
        $session=session();
        if($session->get('logged_in')!=true || $session->get('tipo')!=1){
             return redirect()->to(base_url('/login'));
        }
        $data1 ['nombre']=$session->get('alias');
        $rutinaM=model('RutinaM');
        $data['idRutina']=$idRutina;
        $data['rutina']=$rutinaM->where('idRutina',$idRutina)->findAll();
      return view('head').
             view('menu',$data1).
            view('rutina/editar',$data).
            view('footer'); 
    }
    public function actualizar()
    {
        $rutinaM=model('RutinaM');
        $idRutina=$_POST['idRutina'];
        $data=[
            "tipoRutina"=>$_POST['tipoRutina'],      
            "descripcion"=> $_POST['descripcion'],
            "recomendacion"=> $_POST['recomendacion'],
            "nivelDificultad"=>$_POST['nivelDificultad'],
            "objetivo"=>$_POST['objetivo'],
            "duracionSemanas"=>$_POST['duracionSemanas'],
            "foto"=>$_POST['foto'],
            "dia"=>$_POST['dia']
        ];
        $rutinaM->set($data)->where('idRutina',$idRutina)->update();
        return redirect ()->to(base_url('/rutinas')) ;
    }
    public function eliminar($idRutina)
    {
        $rutinaM=model('RutinaM');
        $rutinaM->delete($idRutina);
        return redirect()->to(base_url('/rutinas'));
    }
}

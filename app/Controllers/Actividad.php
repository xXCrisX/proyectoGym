<?php

namespace App\Controllers;

class Actividad extends BaseController
{   
    protected $helpers = ['form'];

    public function ver()
    {
        $session=session();
        if($session->get('logged_in')!=true || $session->get('tipo')!=0){
             return redirect()->to(base_url('/login'));
        }
        $data1 ['nombre']=$session->get('alias');
        $ActividadM=model('ActividadModel');
        $data['actividad']=$ActividadM->findAll();
        return view('head').
               view('menu',$data1).
               view('actividad/ver',$data).
               view('footer');
    }
    public function agregar()
    {
        $session=session();
        if($session->get('logged_in')!=true || $session->get('tipo')!=0){
             return redirect()->to(base_url('/login'));
        }
        $data1 ['nombre']=$session->get('alias');
        $ActividadM=model('ActividadModel');
        $data['entrenador']=$ActividadM->entrenador();
       return view('head').
              view('menu',$data1).
              view('actividad/agregar',$data).
              view('footer'); 
    }
    public function insertar()
    {

        if (!$this->request->is('post'))
        {
            $this->ver();
        }
        $rules=[
            'foto'=>'rwequired',
            'nombre'=>'required',
            'fecha'=>'required',
            'horaI'=>'required',
            'horaF'=>'required',
            'tipoAct'=>'required',
            'dificultad'=>'reuired',
            'objetivo'=>'required',
            'capacidad'=>'required',
            'idUsuario'=>'required'
        ];
        
        $data=[
        "foto"=>$_POST['foto'],
        "nombre"=>$_POST['nombre'],
        "fecha"=>$_POST['fecha'],
        "horaI"=>$_POST['horaI'],      
        "horaF"=> $_POST['horaF'],
        "tipoAct"=> $_POST['tipoEn'],
        "dificultad"=>$_POST['dificultad'],
        'obetivo'=>$_POST['objetivo'],
        "capacidad"=>$_POST['capacidad'],
        "idUsuario"=>$_POST['idUsuario'],
        ];

           if(!$this->validate($rules)){
             return 
             view('head').
             view('menu').
             view('actividads/agregar',[
                'validation'=> $this->validator
             ]).
             view('footer');
           }else{
            $ActividadM=model('ActividadModel');
            $ActividadM->insert($data);
            return redirect()->to(base_url('/actividads'));    
           }

    }
    public function editar($idactividad)
    {
        $session=session();
        if($session->get('logged_in')!=true || $session->get('tipo')!=0){
             return redirect()->to(base_url('/login'));
        }
        $data1 ['nombre']=$session->get('alias');
        $ActividadM=model('ActividadModel');
        $data['idactividad']=$idactividad;
        $data['entrenador']=$ActividadM->entrenador();
        
      return view('head').
             view('menu',$data1).
            view('actividad/editar',$data).
            view('footer'); 
    }
    public function actualizar()
    {
        $ActividadM=model('ActividadModel');
        $idactividad=$_POST['idactividad'];
        $data=[
            "horaI"=>$_POST['horaI'],      
            "horaF"=> $_POST['horaF'],
            "tipoEn"=> $_POST['tipoEn'],
            "capacidad"=>$_POST['capacidad'],
            "idUsuario"=>$_POST['idUsuario'],
        ];
        $ActividadM->set($data)->where('idactividad',$idactividad)->update();
        return redirect ()->to(base_url('/actividad')) ;
    }
    public function eliminar($idactividad)
    {
        $ActividadM=model('ActividadModel');
        $ActividadM->delete($idactividad);
        return redirect()->to(base_url('/actividad'));

    }
}

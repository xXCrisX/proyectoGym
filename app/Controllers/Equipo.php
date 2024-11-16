<?php

namespace App\Controllers;

class Equipo extends BaseController
{
    
    protected $helpers = ['form'];

    public function ver()
    {
        $session=session();
        if($session->get('logged_in')!=true || $session->get('tipo')!=0){
             return redirect()->to(base_url('/login'));
        }
        $data1 ['nombre']=$session->get('alias');
        $equipoM=model('EquipoM');
        $data['equipo']=$equipoM->findAll();
        return view('head').
               view('menu',$data1).
               view('equipo/ver',$data).
               view('footer');
    }
    public function agregar()
    {
        $session=session();
        if($session->get('logged_in')!=true || $session->get('tipo')!=0){
             return redirect()->to(base_url('/login'));
        }
        $data1 ['nombre']=$session->get('alias');
       return view('head').
              view('menu',$data1).
              view('equipo/agregar').
              view('footer'); 
    }
    public function insertar()
    {
        $session=session();
        if($session->get('logged_in')!=true || $session->get('tipo')!=0){
             return redirect()->to(base_url('/login'));
        }
        $data1 ['nombre']=$session->get('alias'); 
        $equipoM=model('EquipoM');
        $data["equipo"]=$equipoM->findAll();     
        if (!$this->request->is('post'))
        {
            $this->ver();
        }
        $rules=[
            'marca'=>'required',
            'cantidad'=>'required',
            'fechaAdq'=>'required',
            'foto'=>'required',
            'nombre'=>'required',
            'estado'=>'required'
        ];
        
        $data=[
        "marca"=>$_POST['marca'],      
        "cantidad"=> $_POST['cantidad'],
        "fechaAdq"=> $_POST['fechaAdq'],
        "foto"=> $_POST['foto'],
        "nombre"=> $_POST['nombre'],
        "estado"=>$_POST['estado']
        ];

           if(!$this->validate($rules)){
             return 
             view('head').
             view('menu',$data1).
             view('equipo/agregar',[
                'validation'=> $this->validator
             ]).
             view('footer');
           }else{
            $equipoM=model('EquipoM');
            $equipoM->insert($data);
            return redirect()->to(base_url('/equipos'));    
           }

    }
    public function editar($idEquipo)
    {
        $session=session();
        if($session->get('logged_in')!=true || $session->get('tipo')!=0){
             return redirect()->to(base_url('/login'));
        }
        $data1 ['nombre']=$session->get('alias');
        $equipoM=model('EquipoM');
        $data['idEquipo']=$idEquipo;
        $data['equipo']=$equipoM->where('idEquipo',$idEquipo)->findAll();
      return view('head').
             view('menu',$data1).
            view('equipo/editar',$data).
            view('footer'); 
    }
    public function actualizar()
    {
        $equipoM=model('EquipoM');
        $idEquipo=$_POST['idEquipo'];
        $data=[
            "marca"=>$_POST['marca'],      
            "cantidad"=> $_POST['cantidad'],
            "fechaAdq"=> $_POST['fechaAdq'],
            "foto"=> $_POST['foto'],
            "nombre"=> $_POST['nombre'],
            "estado"=>$_POST['estado']
        ];
        $equipoM->set($data)->where('idEquipo',$idEquipo)->update();
        return redirect ()->to(base_url('/equipos')) ;
    }
    public function eliminar($idEquipo)
    {
        $equipoM=model('EquipoM');
        $equipoM->delete($idEquipo);
        return redirect()->to(base_url('/equipos'));
    }
}

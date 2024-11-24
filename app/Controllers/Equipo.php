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
            'nombre'=>'required',
            'estado'=>'required'
        ];
        
        $data=[
        "marca"=>$_POST['marca'],      
        "cantidad"=> $_POST['cantidad'],
        "fechaAdq"=> $_POST['fechaAdq'],
        "nombre"=> $_POST['nombre'],
        "estado"=>$_POST['estado']
        ];
        $validar=[
            'foto'=>[
                'label'=>'imagen',
                'rules'=>[
                    'is_image[foto]',
                    'max_size[foto,200]',
                    'max_dims[foto,1080,1920]',
                    'ext_in[foto,png,jpg,jpeg]'
                ]
            ]
        ];
        $file=$this->request->getFile('foto');
           if(!$this->validate($rules) or !$this->validate($validar)){
             return 
             view('head').
             view('menu',$data1).
             view('equipo/agregar',[
                'validation'=> $this->validator
             ]).
             view('footer');
           }else{
            if(!$file->hasMoved()){
                $route=ROOTPATH.('public/images/equipo');
                $idEquipo=$equipoM->getIdEquipo();
                $idEquipo=$idEquipo[0]->idEquipo +1;
                $newFileName = 'equipo_' . $idEquipo. '.' . $file->getExtension();
                $file->move($route,$newFileName);
                    $data['foto']="images/equipo/".$newFileName;
            }
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
        $validar=[
            'foto'=>[
                'label'=>'imagen',
                'rules'=>[
                    'is_image[foto]',
                    'max_size[foto,200]',
                    'max_dims[foto,1080,1920]',
                    'ext_in[foto,png,jpg,jpeg]'
                ]
            ]
        ];  
        $file=$this->request->getFile('foto');
        $data=[
            "marca"=>$_POST['marca'],      
            "cantidad"=> $_POST['cantidad'],
            "fechaAdq"=> $_POST['fechaAdq'],
            "nombre"=> $_POST['nombre'],
            "estado"=>$_POST['estado']
        ];
        if($file->isValid()){
            if(!$file->hasMoved()){
                $route=ROOTPATH.('public/images/equipo');
                $newFileName = 'actividad_' . $idEquipo.".png";
                $file->move($route,$newFileName,true);
                    $data['foto']="images/equipo/".$newFileName;
            }
        }
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

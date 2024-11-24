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
        $data['actividad']=$ActividadM->verActividad();
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
        $session=session();
        if($session->get('logged_in')!=true || $session->get('tipo')!=0){
             return redirect()->to(base_url('/login'));
        }
        $data1 ['nombre']=$session->get('alias');
        $ActividadM=model('ActividadModel');
        $data2['entrenador']=$ActividadM->entrenador();

        if (!$this->request->is('post'))
        {
            $this->ver();
        }
        $rules=[
        
            'nombre'=>'required',
            'fecha'=>'required',
            'horaI'=>'required',
            'horaF'=>'required',
            'tipoAct'=>'required',
            "descripcion"=>"required",
            'dificultad'=>'required',
            'objetivo'=>'required',
            'capacidad'=>'required',
            'idEntrenador'=>'required'
        ];
        
        $data=[
        "nombre"=>$_POST['nombre'],
        "fecha"=>$_POST['fecha'],
        "horaI"=>$_POST['horaI'],      
        "horaF"=> $_POST['horaF'],
        "tipoAct"=> $_POST['tipoAct'],
        "descripcion"=>$_POST['descripcion'],
        "dificultad"=>$_POST['dificultad'],
        'obetivo'=>$_POST['objetivo'],
        "capacidad"=>$_POST['capacidad'],
        "idEntrenador"=>$_POST['idEntrenador']
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
             view('actividad/agregar',$data2,[
                'validation'=> $this->validator
             ]).
             view('footer');
           }else{
            if(!$file->hasMoved()){
                $route=ROOTPATH.('public/images/actividad');
                $idActividad=$ActividadM->getIdActividad();
                $idActividad=$idActividad[0]->idActividad +1;
                $newFileName = 'actividad_' . $idActividad. '.' . $file->getExtension();
                $file->move($route,$newFileName);
                    $data['foto']="images/actividad/".$newFileName;
            }
            $ActividadM=model('ActividadModel');
            $ActividadM->insert($data);
            return redirect()->to(base_url('/actividad'));    
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
        $data['actividad']=$ActividadM->where('idActividad',$idactividad)->findAll();
        $data['entrenador']=$ActividadM->entrenador();
      return view('head').
             view('menu',$data1).
            view('actividad/editar',$data).
            view('footer'); 
    }
    public function actualizar()
    {
        $ActividadM=model('ActividadModel');
        $idActividad=$_POST['idActividad'];
        
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
        "nombre"=>$_POST['nombre'],
        "fecha"=>$_POST['fecha'],
        "horaI"=>$_POST['horaI'],      
        "horaF"=> $_POST['horaF'],
        "tipoAct"=> $_POST['tipoAct'],
        "descripcion"=>$_POST['descripcion'],
        "dificultad"=>$_POST['dificultad'],
        'objetivo'=>$_POST['objetivo'],
        "capacidad"=>$_POST['capacidad'],
        "idEntrenador"=>$_POST['idEntrenador']
        ];
        if($file->isValid()){
        if(!$file->hasMoved()){
            $route=ROOTPATH.('public/images/actividad');
            $newFileName = 'actividad_' . $idActividad. '.' . ".png";
            $file->move($route,$newFileName,true);
                $data['foto']="images/actividad/".$newFileName;
        }
    }
        $ActividadM->set($data)->where('idActividad',$idActividad)->update();
        return redirect ()->to(base_url('/actividad')) ;
    }
    public function eliminar($idactividad)
    {
        $ActividadM=model('ActividadModel');
        $ActividadM->delete($idactividad);
        return redirect()->to(base_url('/actividad'));

    }
}

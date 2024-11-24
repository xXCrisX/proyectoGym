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
        $rutinaM=model('RutinaM');
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
            'dia'=>'required'
        ];
        
        $data=[
        "tipoRutina"=>$_POST['tipoRutina'],      
        "descripcion"=> $_POST['descripcion'],
        "recomendacion"=> $_POST['recomendacion'],
        "nivelDificultad"=>$_POST['nivelDificultad'],
        "objetivo"=>$_POST['objetivo'],
        "duracionSemanas"=>$_POST['duracionSemanas'],
        "dia"=>$_POST['dia']
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
             view('rutina/agregar',[
                'validation'=> $this->validator
             ]).
             view('footer');
           }else{
            if(!$file->hasMoved()){
                $route=ROOTPATH.('public/images/rutina');
                $idRutina=$rutinaM->getidRutina();
                $idRutina=$idRutina[0]->idRutina +1;
                $newFileName = 'rutina_' . $idRutina. '.' . $file->getExtension();
                $file->move($route,$newFileName);
                    $data['foto']="images/rutina/".$newFileName;
            }
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
            "tipoRutina"=>$_POST['tipoRutina'],      
            "descripcion"=> $_POST['descripcion'],
            "recomendacion"=> $_POST['recomendacion'],
            "nivelDificultad"=>$_POST['nivelDificultad'],
            "objetivo"=>$_POST['objetivo'],
            "duracionSemanas"=>$_POST['duracionSemanas'],
            "dia"=>$_POST['dia']
        ];
        if($file->isValid()){
            if(!$file->hasMoved()){
                $route=ROOTPATH.('public/images/rutina');
                $newFileName = 'actividad_' . $idRutina.".png";
                $file->move($route,$newFileName,true);
                    $data['foto']="images/rutina/".$newFileName;
            }
        }
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

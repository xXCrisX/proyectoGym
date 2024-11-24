<?php

namespace App\Controllers;

class Dieta extends BaseController
{
    
    protected $helpers = ['form'];

    public function ver()
    {
        $session=session();
        if($session->get('logged_in')!=true || $session->get('tipo')!=1){
             return redirect()->to(base_url('/login'));
        }
        $data1 ['nombre']=$session->get('alias');
        $dietaM=model('DietaM');
        $data['dieta']=$dietaM->findAll();
        return view('head').
               view('menu',$data1).
               view('dieta/ver',$data).
               view('footer');
    }
    public function agregar()
    {
        $session=session();
        if($session->get('logged_in')!=true || $session->get('tipo')!=1){
             return redirect()->to(base_url('/inicio'));
        }
        $data1 ['nombre']=$session->get('alias');
       return view('head').
              view('menu',$data1).
              view('dieta/agregar').
              view('footer'); 
    }
    public function insertar()
    {
        $session=session();
        if($session->get('logged_in')!=true || $session->get('tipo')!=1){
             return redirect()->to(base_url('/login'));
        }
        $data1 ['nombre']=$session->get('alias');
        $dietaM=model('DietaM');
        if (!$this->request->is('post'))
        {
            $this->ver();
        }
        $rules=[
            'descripcion'=>'required',
            'recomendacion'=>'required',
            'calorias'=>'required',
            'objetivo'=>'required',
            'duracionSemanas'=>'required',
            'tiempoDeComida'=>'required'
        ];
        
        $data=[
        "descripcion"=>$_POST['descripcion'],      
        "recomendacion"=> $_POST['recomendacion'],
        "calorias"=> $_POST['calorias'],
        "objetivo"=> $_POST['objetivo'],
        "duracionSemanas"=>$_POST['duracionSemanas'],
        "tiempoDeComida"=>$_POST['tiempoDeComida']
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
             view('dieta/agregar',[
                'validation'=> $this->validator
             ]).
             view('footer');
           }else{
            if(!$file->hasMoved()){
                $route=ROOTPATH.('public/images/dieta');
                $idDieta=$dietaM->getidDieta();
                $idDieta=$idDieta[0]->idDieta +1;
                $newFileName = 'dieta_' . $idDieta. '.' . $file->getExtension();
                $file->move($route,$newFileName);
                    $data['foto']="images/dieta/".$newFileName;
            }
            $dietaM->insert($data);
            return redirect()->to(base_url('/dietas'));    
           }

    }
    public function editar($idDieta)
    {
        $session=session();
        if($session->get('logged_in')!=true || $session->get('tipo')!=1){
             return redirect()->to(base_url('/login'));
        }
        $data1 ['nombre']=$session->get('alias');
        $dietaM=model('DietaM');
        $data['idDieta']=$idDieta;
        $data['dieta']=$dietaM->where('idDieta',$idDieta)->findAll();
      return view('head').
             view('menu',$data1).
            view('dieta/editar',$data).
            view('footer'); 
    }
    public function actualizar()
    {
        $dietaM=model('DietaM');
        $idDieta=$_POST['idDieta'];
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
            "descripcion"=>$_POST['descripcion'],      
            "recomendacion"=> $_POST['recomendacion'],
            "calorias"=> $_POST['calorias'],
            "objetivo"=> $_POST['objetivo'],
            "duracionSemanas"=>$_POST['duracionSemanas'],
            "tiempoDeComida"=>$_POST['tiempoDeComida']
        ];
        if($file->isValid()){
            if(!$file->hasMoved()){
                $route=ROOTPATH.('public/images/dieta');
                $newFileName = 'dieta_' . $idDieta.".png";
                $file->move($route,$newFileName,true);
                    $data['foto']="images/dieta/".$newFileName;
            }
        }
        $dietaM->set($data)->where('idDieta',$idDieta)->update();
        return redirect ()->to(base_url('/dietas')) ;
    }
    public function eliminar($idDieta)
    {
        $dietaM=model('DietaM');
        $dietaM->delete($idDieta);
        return redirect()->to(base_url('/dietas'));
    }
}

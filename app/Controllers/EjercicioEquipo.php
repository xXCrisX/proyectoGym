<?php
namespace App\Controllers;

class EjercicioEquipo extends BaseController
{
    public function insertar()
    {
        $session=session();
        if($session->get('logged_in')!=true &&$session->get('tipo')!=1){
            return redirect()->to(base_url('login'));
        }$alias['nombre']=$session->get('alias');
        if(!request()->is('post')){
            return redirect()->to(base_url('ejercicios/'));
        }
        $rules=[
            "idEquipo"=>'required',
            "idEjercicio"=>'required'
        ];
        if (isset($_POST['idEquipos'])&&isset($_POST['idEjercicio'])) {
            $idEquipos = $_POST['idEquipos'];    
            $idEjercicio=$_POST['idEjercicio'];
            foreach($idEquipos as$idEquipo){
                $ejercicioEquipoM=model('EjercicioEquipoModel');
                $ejercicioEquipo=[
                    'idEquipo'=>$idEquipo,
                    'idEjercicio'=>$idEjercicio
                ];
                $ejercicioEquipoM->insert($ejercicioEquipo);
            }
            return redirect()->to(base_url('ejercicios/'));
            
        } else {
            return redirect()->to(base_url('ejercicios/'));
        }
       
    }

    public function subirImagen()
    {
        return view('head').
               view('EjercicioEquipo/p').
               view('footer');
    }
    
    public function upload()
    {
        echo '<pre>';
        $file=$this->request->getFile('foto');
        if(!$file->isValid()){
            echo $file->getErrorString();
            exit;
        }
        $validacion=[
            'foto'=>[
                'label'=>'foto',
                'rules'=>[
                    'is_image[foto]',
                    'max_size[foto,200]',
                    'max_dims[foto,1080,1920]',
                    'ext_in[foto,png,jpg,jpeg]'
                ]
            ]
        ];
        if(!$this->validate($validacion)){
            print_r($this->validator->getErrors());
            exit;
        }
        if(!$file->hasMoved()){
            $route=ROOTPATH.('public/images');
            $file->move($route,'1.png');
            echo "Guardad correctamente";
        }
        echo   '</pre>';
    }
}

<?php

namespace App\Controllers;

use CodeIgniter\HTTP\Message;

class Socio extends BaseController
{
   //No se ocupan las funciones ver, agregar, insertar.
    protected $helpers = ['form'];

    public function ver()
    { $session=session();
        if($session->get('logged_in')!=true || $session->get('tipo')!=0){
             return redirect()->to(base_url('/login'));
        }
        $data1 ['nombre']=$session->get('alias');
        $socioM=model('SocioM');
        $data['socios']=$socioM->findAll();
        return view('head').
               view('menu',$data1).
               view('socio/ver',$data).
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
              view('socio/agregar').
              view('footer'); 
    }
    public function insertar()
    {
        $session=session();
        if($session->get('logged_in')!=true || $session->get('tipo')!=0){
             return redirect()->to(base_url('/login'));
        }
        $data1 ['nombre']=$session->get('alias');
        if (!$this->request->is('post'))
        {
            $this->ver();
        }
        $rules=[
            'alias'=>'required',
            'nombre'=>'required',
            'apellidoP'=>'required',
            'apellidoM'=>'required',
            'cta'=>'required',
            'estatura'=>'required',
            'peso'=>'required',
            'fechaNacimiento'=>'required',
            'telefonoM'=>'required',
            'telefonoC'=>'required',
            'correo'=>'required',
            'padecimientos'=>'required'

        ];
        
        $data=[
        "alias"=>$_POST['alias'],       
        "nombre"=> $_POST['nombre'],
        "apellidoP"=> $_POST['apellidoP'],
        "apellidoM"=>$_POST['apellidoM'],
        "cta"=>$_POST['cta'],
        "estatura"=>$_POST['estatura'],
        "peso"=>$_POST['peso'],
        "sexo"=>$_POST['sexo'],
        "fechaNacimiento"=>$_POST['fechaNacimiento'],
        "telefonoM"=>$_POST['telefonoM'],
        "telefonoC"=>$_POST['telefonoC'],
        "correo"=>$_POST['correo'],
        "padecimientos"=>$_POST['padecimientos']
        ];

           if(!$this->validate($rules)){
             return 
             view('head').
             view('menu',$data1).
             view('socio/agregar',[
                'validation'=> $this->validator
             ]).
             view('footer');
           }else{
            $socioM=model('SocioM');
            $socioM->insert($data);
            return redirect()->to(base_url('/socio'));    
           }

    }
    public function editar($idSocio)
    {
        $session=session();
        if($session->get('logged_in')!=true || $session->get('tipo')!=0){
             return redirect()->to(base_url('/login'));
        }
        $data1 ['nombre']=$session->get('alias');
        $socioM=model('SocioM');
        $data['socio']=$socioM->where('idSocio',$idSocio)->findAll();
        $data['usuario']=$socioM->editarSocio($idSocio);
      return view('head').
             view('menu',$data1).
            view('socio/editar',$data).
            view('footer'); 
    }
    public function actualizar()
    {
        $socioM=model('SocioM');
        $idSocio=$_POST['idSocio'];
        $usuarioM=model('UsuarioM');
        $idUsuario=$_POST['idUsuario'];
        $file=$this->request->getFile('foto');
        $validar=[
            'foto'=>[
                    'label'=>'imagen',
                    'rules'=>[
                        'is_image[foto]',
                        'max_size[foto,500]',
                        'max_dims[foto,2080,2000]',
                        'ext_in[foto,png,jpg,jpeg]'
                    ]
                ]
            ];
        $data=[
            "alias"=>$_POST['alias'],    
            "correo"=>$_POST['correo'],    
            "nombre"=> $_POST['nombre'],
            "apellidoP"=> $_POST['apellidoP'],
            "apellidoM"=>$_POST['apellidoM'],
            "cta"=>$_POST['cta'],
            "sexo"=>$_POST['sexo'],
            "fechaNacimiento"=>$_POST['fechaNacimiento'],
            "telefonoM"=>$_POST['telefonoM'],
            "telefonoC"=>$_POST['telefonoC'],
            "correo"=>$_POST['correo']
        ];
        $socio=[
            "peso"=>$_POST['peso'],
            "estatura"=>$_POST['estatura'],
            "condicionMedicas"=>$_POST['condicionMedicas'],
            "lesionesPrevias"=>$_POST['lesionesPrevias'],
            "alergias"=>$_POST['alergias'],
            "medicacionActual"=>$_POST['medicacionActual'],
        ];
        if($file->isValid()){
            if(!$file->hasMoved()){
                $route=ROOTPATH.('public/images/socio');
                $newFileName = 'actividad_' . $idSocio.".png";
                $file->move($route,$newFileName,true);
                    $socio['foto']="images/socio/".$newFileName;
            }
        }
        $usuarioM->set($data)->where('idUsuario',$idUsuario)->update();
        $socioM->set($socio)->where('idSocio',$idSocio)->update();
        return redirect ()->to(base_url('/usuario')) ;
    }
    public function eliminar($idSocio)
    {
        $socioM=model('SocioM');
        $usuarioM=model('UsuarioM');
        $idUsuario=$socioM->eliminarSocio($idSocio);
        $usuarioM->delete($idUsuario[0]->idUsuario);
        $socioM->delete($idSocio);
        return redirect()->to(base_url('/usuario'));

    }

    public function loginSocio()
    {
        return view('head').
               view('loginSocio').
               view('footer');
    }

    public function accederSocio()
    {
        $socioM=model('SocioM');
        $cta=$_POST['cta'];
        $alias=$_POST['alias'];
        $session=session();
        $result=$socioM->validarSocio($alias,$cta);
        if(count($result)>0){
            $newData=[
                "idSocio"=>$result[0]->idSocio,
                "nombre"=>$result[0]->nombre,
                "tipo"=>$result[0]->tipo,
                "logged_in"=>true,
                "fechaFinPago"=>$result[0]->fechaFinPago
            ];
            $session->set($newData);
            return view('head').
                   view('/socio/prueba');
        }else{
            return view('head').
                   view('loginSocio').
                   view('footer');
        }
    }

    public function salirSocio()
    {
        $datos=['isSocio','nombre','tipo','logged_in'];
        $session=session();
        $session->remove($datos);
        return redirect()->to(base_url('loginSocio'));
    }
}

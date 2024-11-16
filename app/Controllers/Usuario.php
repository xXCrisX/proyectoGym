<?php

namespace App\Controllers;

use LDAP\Result;

class Usuario extends BaseController
{
    public $csrfProtection = 'session';
    public $tokenRandomize = true;
    protected $helpers = ['form'];

    public function ver()
    {
        $session=session();
        if($session->get('logged_in')!=true || $session->get('tipo')!=0){
             return redirect()->to(base_url('/login'));
        }
        $data1 ['nombre']=$session->get('alias');
        $usuarioM=model('UsuarioM');
        $data['usuario']=$usuarioM->usuario();
        $data['entrenador']=$usuarioM->entrenador();
        $data['socio']=$usuarioM->socio();
        return view('head').
               view('menu',$data1).
               view('usuario/ver',$data).
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
              view('usuario/agregar').
              view('footer'); 
    }

    public function insertar()
    {

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
            'tipo'=>'required',
            'fechaNacimiento'=>'required',
            'telefonoM'=>'required',
            'telefonoC'=>'required',
            'correo'=>'required',
            
        ];
        $usuario=[
        "alias"=>$_POST['alias'],      
        "nombre"=> $_POST['nombre'],
        "apellidoP"=> $_POST['apellidoP'],
        "apellidoM"=>$_POST['apellidoM'],
        "cta"=>$_POST['cta'],
        "tipo"=>$_POST['tipo'],
        "sexo"=>$_POST['sexo'],
        "fechaNacimiento"=>$_POST['fechaNacimiento'],
        "telefonoM"=>$_POST['telefonoM'],
        "telefonoC"=>$_POST['telefonoC'],
        "correo"=>$_POST['correo'],
        ];

        
           if(!$this->validate($rules)){
             return 
             view('head').
             view('menu').
             view('usuario/agregar',[
                'validation'=> $this->validator
             ]).
             view('footer');
           }else{
            $usuarioM=model('UsuarioM');
            $usuarioM->insert($usuario);
            $idUsuario=$usuarioM->getInsertID();
            $tipoUsuario=$_POST['tipo'];
            if($tipoUsuario==1){
                $rulesE=[
                    "especialidad"=>"required",
                    "curp"=>"required",
                    "foto"=>"required",
                    "certificaciones"=>"required",
                ];
           $entrenador=[
               "especialidad"=>$_POST['especialidad'],
               "curp"=>$_POST['curp'],
               "foto"=>$_POST['foto'],
               "certificaciones"=>$_POST['certificaciones'],
               "idUsuario"=>$idUsuario
           ];
           if(!$this->validate($rulesE)){
            return view('head').
                   view('menu').
                   view('usuario/agregar',['validation'=>$this->validator]).
                   view('footer');
           }else{
           $entrenadorM=model('EntrenadorModel');
           $entrenadorM->insert($entrenador);
        }  
        } 
        if($tipoUsuario==2){
            $rulesS=[
                "peso"=>"required",
                "estatura"=>"required",
                "condicionMedicas"=>"required",
                "lesionesPrevias"=>"required",
                "alergias"=>"required",
                "medicacionActual"=>"required",
                "foto"=>"required",
            ];
            $socio=[
                "peso"=>$_POST['peso'],
                "estatura"=>$_POST['estatura'],
                "condicionMedicas"=>$_POST['condicionMedicas'],
                "lesionesPrevias"=>$_POST['lesionesPrevias'],
                "alergias"=>$_POST['alergias'],
                "medicacionActual"=>$_POST['medicacionActual'],
                "foto"=>$_POST['foto'],
                "idUsuario"=>$idUsuario
            ];
            $socioM=model('socioM');
            $socioM->insert($socio);
        }        
            return redirect()->to(base_url('/usuario'));
           }
            
           
        
    }
    public function editar($idUsuario)
    {
        $session=session();
        if($session->get('logged_in')!=true || $session->get('tipo')!=0){
             return redirect()->to(base_url('/login'));
        }
        $data1 ['nombre']=$session->get('alias');
        $usuarioM=model('UsuarioM');
        $data['usuario']=$usuarioM->where('idUsuario',$idUsuario)->findAll();
      return view('head').
             view('menu',$data1).
            view('usuario/editar',$data).
            view('footer'); 
    }
    public function actualizar()
    {
        $usuario=model('UsuarioM');
        $idUsuario=$_POST['idUsuario'];
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
            "correo"=>$_POST['correo'],
        ];
        $usuario->set($data)->where('idUsuario',$idUsuario)->update();
        return redirect ()->to(base_url('/usuario')) ;
    }
    public function eliminar($idUsuario)
    {
        $usuarioM=model('UsuarioM');
        $usuarioM->delete($idUsuario);
        return redirect()->to(base_url('/usuario'));

    }
    
    public function inicio()
    {
        return view('head').
               view('login').
               view('footer');
    }

    public function acceder()
    {
         $usuarioM=model('UsuarioM');
         $alias=$_POST['alias'];
         $cta=$_POST['cta'];
         $session=session();

         $result=$usuarioM->validar($alias,$cta );
         if(count($result)>0){

            $newdata=[
                'alias'=>$result[0]->alias,
                'tipo'=>$result[0]->tipo,
                'logged_in'=>TRUE,
            ];
            $session->set($newdata);
            return redirect()->to(base_url('/inicio'));
         }
         else{
            $session->destroy();
            return redirect()->to(base_url('/login'));
         }
    }

    public function salir()
    {
        $datos=['alias','tipo','logged_in'];
        $session=session();
        $session->remove($datos);

        return redirect()->to(base_url('/login'));
    }

}
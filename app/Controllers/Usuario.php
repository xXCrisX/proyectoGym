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
             view('menu',$data1).
             view('usuario/agregar',[
                'validation'=> $this->validator
             ]).
             view('footer');
           }else{
            $tipoUsuario=$_POST['tipo'];
            if($tipoUsuario==0){
                $usuarioM=model('UsuarioM');
                $usuarioM->insert($usuario);
                $idUsuario=$usuarioM->getInsertID();
            }
            if($tipoUsuario==1){
                $rulesE=[
                    "especialidad"=>"required",
                    "curp"=>"required",
                    "certificaciones"=>"required"
                ];
        
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
        $file=$this->request->getFile('foto');
           if(!$this->validate($rulesE) or !$this->validate($validar)){
            return view('head').
                   view('menu',$data1).
                   view('usuario/agregar',['validation'=>$this->validator]).
                   view('footer');
           }else{
            $usuarioM=model('UsuarioM');
            $usuarioM->insert($usuario);
            $idUsuario=$usuarioM->getInsertID();
            $entrenadorM=model('EntrenadorModel');
            $entrenador=[
                "especialidad"=>$_POST['especialidad'],
                "curp"=>$_POST['curp'],
                "certificaciones"=>$_POST['certificaciones'],
                "idUsuario"=>$idUsuario
            ];
            if(!$file->hasMoved()){
                $route=ROOTPATH.('public/images/entrenador');
                $idEntrenador=$entrenadorM->getIdEntrenador();
                $idEntrenador=$idEntrenador[0]->idEntrenador +1;
                $newFileName = 'entrenador_' . $idEntrenador. '.' . $file->getExtension();
                $file->move($route,$newFileName);
                    $entrenador['foto']="images/entrenador/".$newFileName;
            }
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
            ];
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
            $file=$this->request->getFile('foto');
            if(!$this->validate($rulesS) or !$this->validate($validar)){
                return view('head').
                       view('menu',$data1).
                       view('usuario/agregar',['validation'=>$this->validator]).
                       view('footer');
               }else{
                $usuarioM=model('UsuarioM');
                $usuarioM->insert($usuario);
                $idUsuario=$usuarioM->getInsertID();
                $socioM=model('SocioM');
                $socio=[
                    "peso"=>$_POST['peso'],
                    "estatura"=>$_POST['estatura'],
                    "condicionMedicas"=>$_POST['condicionMedicas'],
                    "lesionesPrevias"=>$_POST['lesionesPrevias'],
                    "alergias"=>$_POST['alergias'],
                    "medicacionActual"=>$_POST['medicacionActual'],
                    "idUsuario"=>$idUsuario
                ];
                if(!$file->hasMoved()){
                    $route=ROOTPATH.('public/images/socio');
                    $idSocio=$socioM->getidSocio();
                    $idSocio=$idSocio[0]->idSocio +1;
                    $newFileName = 'socio_' . $idSocio. '.' . $file->getExtension();
                    $file->move($route,$newFileName);
                        $socio['foto']="images/socio/".$newFileName;
                }
               }
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
        $session=session();
        if($session->get('logged_in')!=true || $session->get('tipo')!=0){
             return redirect()->to(base_url('/login'));
        }
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
        if($session->get('idUsuario')==$idUsuario){
            return redirect ()->to(base_url('/inicio/admin')) ;
        }
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
                'idUsuario'=>$result[0]->idUsuario
            ];
            $session->set($newdata);
            if($session->get('tipo')==0){
            return redirect()->to(base_url('/inicio/admin'));
            }else if($session->get('tipo')==1){
             return redirect()->to(base_url('/inicio/entrenador'));
            }
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
    
    public function inicioAdmin()
    {
        $session=session();
        if ($session->get('logged_in')!=true&&$session->get('tipo')!=0){
            return redirect()->to(base_url('login'));
        }
        $alias['nombre']=$session->get('alias');
        $asistenciaM=model('AsistenciaM');
        $totalVisitas['result']=$asistenciaM->totalVisitas();
            return view('head').
               view('menu',$alias).
               view('/usuario/inicio').
               view('footer',$totalVisitas);
    }

}
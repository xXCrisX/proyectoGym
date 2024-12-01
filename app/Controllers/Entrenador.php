<?php
namespace App\Controllers;

class Entrenador extends BaseController
{
    public function editar($idEntrenador)
    {
        $session=session();
        if ($session->get('logged_in')!=true&&$session->get('tipo')<=1){
            return redirect()->to(base_url('login'));
        }
        $entrenadorM=model('EntrenadorModel');
        $data['entrenador']=$entrenadorM->editarEntrenador($idEntrenador);
        $alias['nombre']=$session->get('alias');
        return view('head').
               view('menu',$alias).
               view('entrenador/editar',$data).
               view('footer');
    }

    public function actualizar()
    {$session=session();
        if ($session->get('logged_in')!=true&&$session->get('tipo')<=1){
            return redirect()->to(base_url('login'));
        }
        $idEntrenador=$_POST['idEntrenador'];
        $entrenadorM=model('EntrenadorModel');
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
        $usuario=[
            "alias"=>$_POST['alias'],      
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
            $entrenador=[
                "especialidad"=>$_POST['especialidad'],
                "curp"=>$_POST['curp'],
                "certificaciones"=>$_POST['certificaciones'],
            ];
            if($file->isValid()){
                if(!$file->hasMoved()){
                    $route=ROOTPATH.('public/images/entrenador');
                    $newFileName = 'actividad_' . $idEntrenador.".png";
                    $file->move($route,$newFileName,true);
                        $entrenador['foto']="images/entrenador/".$newFileName;
                }
            }
            $usuarioM->set($usuario)->where('idUsuario',$idUsuario)->update();
            $entrenadorM->set($entrenador)->where('idEntrenador',$idEntrenador)->update();
            if($session->get('idUsuario')==$idUsuario){
                return redirect()->to(base_url('/inicio/entrenador'));
            }
            return redirect()->to(base_url('usuario'));
    }

    public function eliminar($idEntrenador)
    {
        $entrenadorM=model('EntrenadorModel');
        $usuarioM=model('UsuarioM');
        $idUsuario=$entrenadorM->eliminarEntrenador($idEntrenador);
        $usuarioM->delete($idUsuario[0]->idUsuario);
        $entrenadorM->delete($idEntrenador);
        return redirect()->to(base_url('usuario'));
    }

    public function inicioEntrenador()
    {
        $session=session();
        if ($session->get('logged_in')!=true && $session->get('tipo')!=1){
            return redirect()->to(base_url('login'));
        }
        $alias['nombre']=$session->get('alias');
        $asistenciaM=model('AsistenciaM');
        $data['asistenciaD']=$asistenciaM->asistenciaDia();
        return view('head').
               view('menu',$alias).
               view('/entrenador/inicio',$data).
               view('footer');
    }

    public function editarPerfil($idUsuario)
    {
        $session=session();
        if ($session->get('logged_in')!=true&&$session->get('tipo')<=1){
            return redirect()->to(base_url('login'));
        }
        $entrenadorM=model('EntrenadorModel');
        $data['entrenador']=$entrenadorM->editarPerfil($idUsuario);
        $alias['nombre']=$session->get('alias');
        return view('head').
               view('menu',$alias).
               view('entrenador/editar',$data).
               view('footer');
    }
}

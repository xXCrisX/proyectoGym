<?php
namespace App\Controllers;

class Entrenador extends BaseController
{
    public function editar($idEntrenador)
    {
        $session=session();
        if ($session->get('logged_in')!=true&&$session->get('tipo')!=0){
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
    {
        $idEntrenador=$_POST['idEntrenador'];
        $entrenadorM=model('EntrenadorModel');
        $usuarioM=model('UsuarioM');
        $idUsuario=$_POST['idUsuario'];
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
                "foto"=>$_POST['foto'],
                "certificaciones"=>$_POST['certificaciones'],
            ];
            $usuarioM->set($usuario)->where('idUsuario',$idUsuario)->update();
            $entrenadorM->set($entrenador)->where('idEntrenador',$idEntrenador)->update();
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
}

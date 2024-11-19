<?php
namespace App\Controllers;

class Ejercicio extends BaseController
{
    protected $helpers = ['form'];
    public function ver()
    {
        $session=session();
       if($session->get('logged_in')!=true &&$session->get('tipo')!=1){
        return redirect()->to(base_url('login'));
       }
        $alias['nombre']=$session->get('alias');
        $ejercicioM=model('EjercicioModel');
        $data['equipo']=$ejercicioM->selectEquipo();
        $data['ejercicio']=$ejercicioM->verEjercicio();

        $data[]=$ejercicioM->verEquipo;
        return view('head').
               view('menu',$alias).
               view('ejercicio/ver',$data).
               view('footer');
    }

    public function agregar()
    {
        $session=session();
        if($session->get('logged_in')!=true&&$session->get('tipo')!=1){
            return redirect()->to(base_url('login'));
        }
        $alias['nombre']=$session->get('alias');
        $ejercicioM=model('EjercicioModel');
        $data['equipo']=$ejercicioM->selectEquipo();
        $data['rutina']=$ejercicioM->selectRutina();
        return view('head').
               view('menu',$alias).
               view('ejercicio/agregar',$data).
               view('footer');
    }

    public function insertar()
    {
        $session=session();
        if($session->get('logged_in')!=true&&$session->get('tipo')!=1){
            return redirect()->to(base_url('login'));
        }
        $alias['nombre']=$session->get('alias');
        if(!request()->is('post')){
            $this->ver();
        }
        $rules=[
            'nombre'=>'required',
            'descripcion'=>'required',
            'grupoMuscular'=>'required',
            'series'=>'required',
            'repeticiones'=>'required',
            'descanso'=>'required',
            'idRutina'=>'required'
        ];
        $ejercicio=[
            "nombre"=>$_POST['nombre'],
            "descripcion"=>$_POST['descripcion'],
            "grupoMuscular"=>$_POST['grupoMuscular'],
            "series"=>$_POST['series'],
            "repeticiones"=>$_POST['repeticiones'],
            "descanso"=>$_POST['descanso'],
            "idRutina"=>$_POST['idRutina']
        ];
        if(!$this->validate($rules)){
        $ejercicioM=model('EjercicioModel');
        $data['equipo']=$ejercicioM->selectEquipo();
        $data['ejercicio']=$ejercicioM->selectejercicio();
            return view('head').
                   view('menu',$alias).
                   view('ejercicio/agregar',$data,['validation'=>$this->validator]).
                   view('footer');
        }
        $ejercicioM=model('EjercicioModel');
        $ejercicioM->insert($ejercicio);
        return redirect()->to(base_url('/ejercicios'));
    }

    public function editar($idEjercicio)
    {
        $session=session();
        if($session->get('logged_in')!=true || $session->get('tipo')!=1){
             return redirect()->to(base_url('/login'));
        }
        $data1 ['nombre']=$session->get('alias');
        $ejercicioM=model('EjercicioModel');
        $data['idEjercicio']=$idEjercicio;
        $data['ejercicio']=$ejercicioM->where('idEjercicio',$idEjercicio)->findAll();
        $data['equipo']=$ejercicioM->selectEquipo();
        $data['rutina']=$ejercicioM->selectRutina();
      return view('head').
             view('menu',$data1).
            view('ejercicio/editar',$data).
            view('footer'); 
    }
    public function actualizar()
    {
        $ejercicioM=model('EjercicioModel');
        $idEjercicio=$_POST['idEjercicio'];
        $data=[
            "nombre"=>$_POST['nombre'],
            "descripcion"=>$_POST['descripcion'],
            "grupoMuscular"=>$_POST['grupoMuscular'],
            "series"=>$_POST['series'],
            "repeticiones"=>$_POST['repeticiones'],
            "descanso"=>$_POST['descanso'],
            "idRutina"=>$_POST['idRutina']
        ];
        $ejercicioM->set($data)->where('idEjercicio',$idEjercicio)->update();
        return redirect ()->to(base_url('/ejercicios')) ;
    }
    public function eliminar($idEjercicio)
    {
        $ejercicioM=model('EjercicioModel');
        $ejercicioM->delete($idEjercicio);
        return redirect()->to(base_url('/ejercicios'));
    }
}

<?php

namespace App\Controllers;

class Pago extends BaseController
{
    
    protected $helpers = ['form'];
    public function ver()
    {
        $session=session();
        if($session->get('logged_in')!=true || $session->get('tipo')!=0){
             return redirect()->to(base_url('/login'));
        }
        $data1 ['nombre']=$session->get('alias');
        $pagoM=model('PagoM');
        $data['pago']=$pagoM->findAll();
        return view('head').
               view('menu',$data1).
               view('pago/ver',$data).
               view('footer');
    }
    public function agregar()
    {
        $session=session();
        if($session->get('logged_in')!=true || $session->get('tipo')!=0){
             return redirect()->to(base_url('/login'));
        }
        $data1 ['nombre']=$session->get('alias');
        $socioM=model('SocioM');
        $data['usuario']=$socioM->usuario();
       return view('head').
              view('menu',$data1).
              view('pago/agregar',$data).
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
            'metodo'=>'required',
            'monto'=>'required',
            'servicio'=>'required',
            'fechaPago'=>'required',
            'idSocio'=>'required'
        ];
        
        $data=[
        "metodo"=>$_POST['metodo'],      
        "monto"=> $_POST['monto'],
        "servicio"=> $_POST['servicio'],
        "fechaPago"=>$_POST['fechaPago'],
        "idSocio"=>$_POST['idSocio'],
        ];

           if(!$this->validate($rules)){
             return 
             view('head').
             view('menu').
             view('pago/agregar',[
                'validation'=> $this->validator
             ]).
             view('footer');
           }else{
            $pagoM=model('PagoM');
            $pagoM->insert($data);
            return redirect()->to(base_url('/pago'));    
           }

    }
   
}

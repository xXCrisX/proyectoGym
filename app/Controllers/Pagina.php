<?php

namespace App\Controllers;

class Pagina extends BaseController
{
    
    public function ver()
    {
        $session=session();
        if($session->get('logged_in')!=true){
             return redirect()->to(base_url('/login'));
        }
        $data1 ['nombre']=$session->get('alias');
        return view('head').
               view('menu',$data1).
               view('pagina/ver').
               view('footer');
    }
}

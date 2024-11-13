<?php

namespace App\Models;

use CodeIgniter\Model;

class SocioM extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'socio';
    protected $primaryKey       = 'idSocio';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['idSocio','peso','estatura','condicionMedicas','lesionesPrevias','alergias','medicacionActual','foto','idUsuario'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function usuario()
    {
        $db=db_connect();
        $sql ="select nombre,idSocio
        from Socio ";
        
        $query=$db->query($sql);

        return $query->getResult();
    }
    public function editarSocio($idSocio)
    {
        $db=db_connect();
        $sql="SELECT * FROM usuario AS u
              INNER JOIN socio AS s ON u.idUsuario=s.idUsuario
              WHERE s.idSocio="."'".$idSocio."'"."";
        $query=$db->query($sql);
        return $query->getResult();
    }

    public function validarSocio($alias,$cta)
    {
        $db=db_connect();
        $sql="SELECT s.idSocio,u.nombre,u.tipo FROM socio AS s
              INNER JOIN usuario AS u ON s.idUsuario=u.idUsuario
              WHERE u.alias="."'".$alias."'"." AND u.cta="."'".$cta."'"."";
        $query=$db->query($sql);
        return $query->getResult();
    }

    public function eliminarSocio($idSocio)
    {
        $db=db_connect();
        $sql="SELECT u.idUsuario FROM usuario AS u
              INNER JOIN socio AS s ON u.idUsuario=s.idUsuario
              WHERE s.idSocio="."'".$idSocio."'"."";
        $query=$db->query($sql);
        return $query->getResult();
    }
}

<?php

namespace App\Models;

use CodeIgniter\Model;

class SocioActividadModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'SocioActividad';
    protected $primaryKey       = false;
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['idSocio','idActividad'];

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

    public function validacionSocio($idSocio,$idActividad)
    {
        $db=db_connect();
        $sql="SELECT * FROM SocioActividad
              WHERE idSocio=".$idSocio." AND idActividad=".$idActividad;
        $query=$db->query($sql);
        return $query->getResult();
    }

    public function validar($idActividad)
    {
        $db=db_connect();
        $sql="SELECT COUNT(sa.idActividad) AS total, a.capacidad FROM SocioActividad AS sa
             INNER JOIN actividad AS a ON sa.idActividad=a.idActividad
             WhERE sa.idActividad=".$idActividad;
        $query=$db->query($sql);
        return $query->getResult();
    }
}

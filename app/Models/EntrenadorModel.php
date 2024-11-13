<?php

namespace App\Models;

use CodeIgniter\Model;

class EntrenadorModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'Entrenador';
    protected $primaryKey       = 'idEntrenador';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['idEntrenador','especialidad','curp','foto','certificaciones','idUsuario'];

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

    public function editarEntrenador($idEntrenador)
    {
        $db=db_connect();
        $sql="SELECT * FROM usuario AS u
              INNER JOIN entrenador AS e ON u.idUsuario=e.idUsuario
              WHERE e.idEntrenador="."'".$idEntrenador."'"."";
        $query=$db->query($sql);
        return $query->getResult();
    }

    public function eliminarEntrenador($idEntrenador)
    {
        $db=db_connect();
        $sql="SELECT u.idUsuario FROM usuario AS u
              INNER JOIN entrenador AS e ON u.idUsuario=e.idUsuario
              WHERE e.idEntrenador="."'".$idEntrenador."'"."";
        $query=$db->query($sql);
        return $query->getResult();
    }
}

<?php

namespace App\Models;

use CodeIgniter\Model;

class EquipoM extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'Equipo';
    protected $primaryKey       = 'idEquipo';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['idEquipo','marca','cantidad','fechaAdq','foto','nombre','estado'];

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

    public function getIdEquipo()
    {
        $db=db_connect();
        $sql="SELECT MAX(idEquipo) AS idEquipo FROM Equipo";
        $query=$db->query($sql);
        return $query->getResult(); 
    }

    public function getEquipo()
    {
        $db=db_connect();
        $sql="SELECT * FROM Equipo
              WHERE estado='operativo'";
        $query=$db->query($sql);
        return $query->getResult(); 
    }
}

<?php

namespace App\Models;

use CodeIgniter\Model;

class RutinaM extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'Rutina';
    protected $primaryKey       = 'idRutina';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['idRutina','tipoRutina','descripcion','recomendacion','nivelDificultad','objetivo','duracionSemanas','foto','dia'];

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

    public function getIdRutina()
    {
        $db=db_connect();
        $sql="SELECT MAX(idRutina) AS idRutina FROM Rutina";
        $query=$db->query($sql);
        return $query->getResult(); 
    }
}

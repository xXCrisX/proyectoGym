<?php

namespace App\Models;

use CodeIgniter\Model;

class EjercicioEquipoModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'EjercicioEquipo';
    protected $primaryKey       = false;
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['idEjercicio','idEquipo'];

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

    public function verEjercicio()
    {
        $db=db_connect();
        $sql='SELECT e.idEjercicio,e.nombre,e.grupoMuscular,r.tipoRutina FROM Ejercicio AS e
              INNER JOIN rutina AS r ON e.idRutina=r.idRutina';
        $query=$db->query($sql);
        return $query->getResult();
    }

    public function verEquipo()
    {
        $db=db_connect();
        $sql='SELECT ep.nombre AS nombreEquipo FROM EjercicioEquipo AS eq
              LEFT JOIN equipo AS ep ON eq.idEquipo=ep.idEquipo';
        $query=$db->query($sql);
        return $query->getResult();
    }
}

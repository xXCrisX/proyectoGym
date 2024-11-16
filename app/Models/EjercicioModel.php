<?php

namespace App\Models;

use CodeIgniter\Model;

class EjercicioModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'ejercicio';
    protected $primaryKey       = 'idEjercicio';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nombre','descripcion','grupoMuscular','series','repeticiones','descanso','idEquipo','idRutina'];

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

    public function selectEquipo()
    {
        $db=db_connect();
        $sql='SELECT idEquipo,nombre,estado FROM Equipo';
        $query=$db->query($sql);
        return $query->getResult();
    }

    public function selectRutina()
    {
        $db=db_connect();
        $sql='SELECT idRutina,tipoRutina,dia FROM Rutina';
        $query=$db->query($sql);
        return $query->getResult();
    }

    public function verEjercicio()
    {
        $db=db_connect();
        $sql='SELECT e.idEjercicio,e.nombre,e.grupoMuscular,eq.nombre AS Nombre_Equipo,r.tipoRutina FROM Ejercicio AS e
              INNER JOIN Equipo AS eq ON e.idEquipo=eq.idEquipo
              INNER JOIN rutina AS r ON e.idRutina=r.idRutina';
        $query=$db->query($sql);
        return $query->getResult();
    }
}

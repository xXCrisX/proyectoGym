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
    protected $allowedFields    = ['nombre','descripcion','grupoMuscular','series','repeticiones','descanso','idRutina'];

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
        $sql='SELECT e.idEjercicio,e.nombre,e.grupoMuscular,r.tipoRutina,r.dia FROM EjercicioEquipo AS eq
              RIGHT JOIN ejercicio AS e ON e.idEjercicio=eq.idEjercicio
              INNER JOIN rutina AS r ON e.idRutina=r.idRutina
              GROUP BY e.idEjercicio';
        $query=$db->query($sql);
        return $query->getResult();
    }
    public function verEquipo()
    {
        $db=db_connect();
        $sql='SELECT ep.nombre AS nombreEquipo FROM EjercicioEquipo AS eq
              LEFT JOIN equipo AS ep ON eq.idEquipo=ep.idEquipo
              GROUP BY eq.idejercicio';
        $query=$db->query($sql);
        return $query->getResult();
    }

    public function asignarEquipo()
    {
        $db=db_connect();
        $sql='SELECT eq.idEjercicio,e.idEquipo, e.nombre FROM ejercicioEquipo AS eq
              INNER JOIN equipo AS e ON eq.idEquipo=e.idEquipo
              ORDER BY eq.idEjercicio ASC';
        $query=$db->query($sql);
        return $query->getResult();
    }
    

}

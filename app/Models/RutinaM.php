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

    public function allRutinas()
    {
        $db=db_connect();
        $sql="SELECT * FROM Rutina";
        $query=$db->query($sql);
        return $query->getResult(); 
    }
    public function rutinasSocio($idSocio)
    {
        $db=db_connect();
        $sql="SELECT * FROM SocioRutina AS sr
              INNER JOIN socio AS s ON sr.idSocio=s.idSocio
              INNER JOIN rutina AS r ON sr.idRutina=r.idRutina
              WHERE sr.idSocio=".$idSocio;
        $query=$db->query($sql);
        return $query->getResult(); 
    }

    public function getRutina($idRutina)
    {
        $db=db_connect();
        $sql="SELECT * FROM SocioRutina AS sr
              INNER JOIN socio AS s ON sr.idSocio=s.idSocio
              INNER JOIN rutina AS r ON sr.idRutina=r.idRutina
              WHERE sr.idRutina=".$idRutina;
        $query=$db->query($sql);
        return $query->getResult(); 
    }

    public function getAllRutina($idRutina)
    {
        $db=db_connect();
        $sql="SELECT * FROM rutina AS r
              WHERE r.idRutina=".$idRutina;
        $query=$db->query($sql);
        return $query->getResult(); 
    }

    public function getEjercicios($idRutina)
    {
        $db=db_connect();
        $sql="SELECT e.idEjercicio,e.nombre,e.descripcion,e.grupoMuscular,e.series,e.repeticiones,e.descanso FROM ejercicio AS e
              INNER JOIN rutina AS r ON e.idRutina=r.idRutina
              WHERE r.idRutina=".$idRutina;
        $query=$db->query($sql);
        return $query->getResult(); 
    }
    public function getEquipo()
    {
        $db=db_connect();
        $sql="SELECT * FROM Equipo AS e
              INNER JOIN EjercicioEquipo AS ee ON e.idEquipo=ee.idEquipo";
        $query=$db->query($sql);
        return $query->getResult();
    }
}

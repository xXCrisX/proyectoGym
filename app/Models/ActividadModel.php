<?php

namespace App\Models;

use CodeIgniter\Database\Query;
use CodeIgniter\Model;

class ActividadModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'Actividad';
    protected $primaryKey       = 'idActividad';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['idActividad','horaI','horaF','tipoAct','capacidad','nombre','fecha','descripcion','dificultad','objetivo','foto','idEntrenador'];

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

    public function entrenador()
    {
        $db=db_connect();
        $sql="SELECT e.idEntrenador,u.nombre,u.apellidoP,u.alias
              FROM entrenador AS e
              INNER JOIN usuario AS u ON e.idUsuario=u.idUsuario";
        $query=$db->query($sql);
        return $query->getResult();
    }

    public function verActividad()
    {
        $db=db_connect();
        $sql="SELECT a.idActividad,a.nombre AS nombreAct,a.fecha,a.capacidad,u.nombre,a.foto FROM actividad AS a
              INNER JOIN entrenador AS e ON a.idEntrenador=e.idEntrenador
              INNER JOIN usuario AS u ON e.idUsuario=u.idUsuario";
        $query=$db->query($sql);
        return $query->getResult();
    }
    public function getIdActividad()
    {
        $db=db_connect();
        $sql="SELECT MAX(idActividad) AS idActividad FROM actividad";
        $query=$db->query($sql);
        return $query->getResult();
    }

    public function getActividades()
    {
        $db=db_connect();
        $sql="SELECT * FROM actividad
              WHERE fecha >= curdate()";
        $query=$db->query($sql);
        return $query->getResult();
    }

}

<?php

namespace App\Models;

use CodeIgniter\Model;

class SocioRutinaModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'SocioRutina';
    protected $primaryKey       = 'idSocioRutina';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['idRutina','idSocio','fechaInicio','fechaFin','idEntrenador'];

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

    public function selectRutina()
    {
        $db=db_connect();
        $sql='SELECT idRutina,tipoRutina,dia FROM Rutina';
        $query=$db->query($sql);
        return $query->getResult();
    }
    public function selectSocio()
    {
        $db=db_connect();
        $sql="SELECT * FROM usuario AS u
              INNER JOIN socio AS s ON u.idUsuario=s.idUsuario";
        $query=$db->query($sql);
        return $query->getResult();
    }
    public function getEntrenador($idUsuario)
    {
        $db=db_connect();
        $sql="SELECT e.idEntrenador FROM entrenador AS e
              INNER JOIN usuario AS u ON e.idUsuario=u.idUsuario
              WHERE u.idUsuario=".$idUsuario."";
        $query=$db->query($sql);
        return $query->getResult();
    }

    public function verSociosRutinas()
    {
        $db=db_connect();
        $sql="SELECT sr.idSocioRutina,r.tipoRutina,u.nombre AS entrenador,us.nombre AS socio,sr.fechaInicio,sr.fechaFin,u.idUsuario FROM socioRutina AS sr
              INNER JOIN entrenador AS e ON sr.idEntrenador=e.idEntrenador
              INNER JOIN socio AS s ON sr.idSocio =s.idSocio
              INNER JOIN usuario AS u ON e.idUsuario=u.idUsuario
              INNER JOIN usuario AS us ON s.idUsuario=us.idUsuario
              INNER JOIN rutina AS r ON sr.idRutina=r.idRutina";
        $query=$db->query($sql);
        return $query->getResult();
    }

}

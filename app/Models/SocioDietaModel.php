<?php

namespace App\Models;

use CodeIgniter\Model;

class SocioDietaModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'SocioDieta';
    protected $primaryKey       = 'idSocioDieta';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['idSocio','idDieta','fechaInicio','fechaFin','idEntrenador','fechaInicio','fechaFin','idEntrenador'];

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

    public function selectDieta()
    {
        $db=db_connect();
        $sql='SELECT idDieta,objetivo,tiempoDeComida FROM Dieta';
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

    public function verSociosDietas()
    {
        $db=db_connect();
        $sql="SELECT sd.idSocioDieta,d.tiempoDeComida,u.nombre AS entrenador,us.nombre AS socio,sd.fechaInicio,sd.fechaFin,u.idUsuario FROM socioDieta AS sd
              INNER JOIN entrenador AS e ON sd.idEntrenador=e.idEntrenador
              INNER JOIN socio AS s ON sd.idSocio =s.idSocio
              INNER JOIN usuario AS u ON e.idUsuario=u.idUsuario
              INNER JOIN usuario AS us ON s.idUsuario=us.idUsuario
              INNER JOIN Dieta AS d ON sd.idDieta=d.idDieta";
        $query=$db->query($sql);
        return $query->getResult();
    }

}

<?php

namespace App\Models;

use CodeIgniter\Model;

class DietaM extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'Dieta';
    protected $primaryKey       = 'idDieta';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['idDieta','descripcion','recomendacion','calorias','objetivo','foto','duracionSemanas','tiempoDeComida'];

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

    public function getIdDieta()
    {
        $db=db_connect();
        $sql="SELECT MAX(idDieta) AS idDieta FROM Dieta";
        $query=$db->query($sql);
        return $query->getResult(); 
    }

    public function getAllDietas($idSocio)
    {
        $db=db_connect();
        $sql="SELECT d.idDieta,d.descripcion,d.tiempoDeComida,d.foto,d.objetivo FROM Dieta AS d
              INNER JOIN socioDieta AS sd ON d.idDieta=sd.idDieta
              INNER JOIN socio AS s ON sd.idSocio=s.idSocio
              WHERE s.idSocio=".$idSocio;
        $query=$db->query($sql);
        return $query->getResult(); 
    }
    public function getDieta($idDieta)
    {
        $db=db_connect();
        $sql="SELECT d.idDieta,d.descripcion,d.tiempoDeComida,d.foto,d.objetivo,d.recomendacion,d.calorias,d.duracionSemanas FROM Dieta AS d
              INNER JOIN socioDieta AS sd ON d.idDieta=sd.idDieta
              INNER JOIN socio AS s ON sd.idSocio=s.idSocio
              WHERE d.idDieta=".$idDieta;
        $query=$db->query($sql);
        return $query->getResult(); 
    }


}

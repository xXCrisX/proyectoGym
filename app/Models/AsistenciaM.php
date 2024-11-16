<?php

namespace App\Models;

use CodeIgniter\Model;

class AsistenciaM extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'Asistencia';
    protected $primaryKey       = 'idAsistencia';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['idAsistencia','horaE','horaS','idSocio','fecha'];

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

    public function selectSocio()
    {
        $db=db_connect();
        $sql='SELECT * FROM socio AS s
              INNER JOIN usuario AS u ON s.idUsuario=u.idUsuario';
        $query=$db->query($sql);
        return $query->getResult();
    }

    public function verAsistencia()
    {
        $db=db_connect();
        $sql='SELECT * FROM asistencia AS a
              INNER JOIN socio AS s ON a.idSocio=s.idSocio
              INNER JOIN usuario AS u ON u.idUsuario=s.idUsuario';
        $query=$db->query($sql);
        return $query->getResult();
    }
}

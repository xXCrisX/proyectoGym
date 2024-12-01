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

    public function totalVisitas()
    {
        $db=db_connect();
        $sql='SELECT  u.nombre,COUNT(a.idAsistencia) AS total FROM Asistencia AS a 
              INNER JOIN socio AS s ON a.idSocio=s.idSocio 
              INNER JOIN usuario AS u ON s.idUsuario=u.idUsuario  
              GROUP BY u.nombre;';
        $query=$db->query($sql);
        return $query->getResult();
    }

    public function asistenciaDia()
    {
        $db=db_connect();
        $sql="SELECT CASE DAYOFWEEK(a.fecha)
    WHEN 1 THEN 'domingo'
    WHEN 2 THEN 'lunes'
    WHEN 3 THEN 'martes'
    WHEN 4 THEN 'miércoles'
    WHEN 5 THEN 'jueves'
    WHEN 6 THEN 'viernes'
    WHEN 7 THEN 'sábado'
END AS dia,
COUNT(*) AS totalAsistencias
FROM Asistencia a
GROUP BY DAYOFWEEK(a.fecha);";
        $query=$db->query($sql);
        return $query->getResult();
    }
}

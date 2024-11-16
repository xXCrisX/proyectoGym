<?php

namespace App\Models;

use CodeIgniter\Model;

class PagoM extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'Pago';
    protected $primaryKey       = 'idPago';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['idPago','metodo','monto','fechaPago','idSocio','fechaFinPago'];

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
        $sql="SELECT * FROM socio AS s
              INNER JOIN usuario AS u ON s.idUsuario=u.idUsuario;";
        $query=$db->query($sql);
        return $query->getResult();
    }
    
    public function verPago()
    {
        $db=db_connect();
        $sql="SELECT p.idPago,p.monto,fechaFinPago,u.nombre FROM pago AS p
              INNER JOIN socio AS s ON p.idSocio =s.idSocio
              INNER JOIN usuario AS u ON s.idUsuario=u.idUsuario";
        $query=$db->query($sql);
        return $query->getResult();
    }
}

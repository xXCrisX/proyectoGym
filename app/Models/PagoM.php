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
    protected $allowedFields    = ['idPago','metodo','monto','fechaPago','idSocio','fechaFinPago','concepto'];

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
        $sql="SELECT p.idPago,p.monto,p.fechaFinPago,p.fechaPago,u.nombre,p.concepto FROM pago AS p
              INNER JOIN socio AS s ON p.idSocio =s.idSocio
              INNER JOIN usuario AS u ON s.idUsuario=u.idUsuario";
        $query=$db->query($sql);
        return $query->getResult();
    }

    public function pagosSocio($idSocio)
    {
        $db=db_connect();
        $sql="SELECT MAX(p.idPago),p.monto,CASE MONTH(p.fechaFinPago) 
                                      WHEN 1 THEN 'Enero'
                                      WHEN 2 THEN 'Febrero'
                                      WHEN 3 THEN 'Marzo'
                                      WHEN 4 THEN 'Abril'
                                      WHEN 5 THEN 'Mayo'
                                      WHEN 6 THEN 'Junio'
                                      WHEN 7 THEN 'Julio'
                                      WHEN 8 THEN 'Agosto'
                                      WHEN 9 THEN 'Septiembre'
                                      WHEN 10 THEN 'Octubre'
                                      WHEN 11 THEN 'Noviembre'
                                      WHEN 12 THEN 'Diciembre'
                                      END AS mes
                                      ,CASE DAYOFWEEK(p.fechaFinPago) 
                                      WHEN 1 THEN 'Domingo'
                                      WHEN 2 THEN 'Lunes'
                                      WHEN 3 THEN 'Martes'
                                      WHEN 4 THEN 'Miercoles'
                                      WHEN 5 THEN 'Jueves'
                                      WHEN 6 THEN 'Viernes'
                                      WHEN 7 THEN 'Sabado'
                                      END AS diaN,DAY(p.fechaFinPago) AS dia ,YEAR(p.fechaFinPago) AS anio,u.nombre,u.sexo FROM pago AS p
              INNER JOIN socio AS s ON p.idSocio =s.idSocio
              INNER JOIN usuario AS u ON s.idUsuario=u.idUsuario
              WHERE s.idSocio=".$idSocio;
        $query=$db->query($sql);
        return $query->getResult();
    }
}

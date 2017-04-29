<?php

use Illuminate\Database\Seeder;

class UbicacionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
                $ubicacion = array(
        			array('id' => '1','name' => 'SOLDADURA'),
				  	array('id' => '2','name' => 'GALVANIZADO'),
				  	array('id' => '3','name' => 'TROQUELADO'),
				  	array('id' => '4','name' => 'ENSAMBLAJE'),
				  	array('id' => '5','name' => 'PINTURA'),
				  	array('id' => '6','name' => 'POLIETILENO'),
				  	array('id' => '7','name' => 'ALAMBRE PUA'),
				  	array('id' => '8','name' => 'MANTENIMIENTO'),
				  	array('id' => '9','name' => 'G. ALMACEN Y DESPACHO'),
				  	array('id' => '10','name' => 'REPUESTOS Y SERVICIOS'),
				  	array('id' => '11','name' => 'GERENCIA DE TRANSPORTE'),
				  	array('id' => '12','name' => 'GERENCIA DE RECURSOS HUMANOS'),
				  	array('id' => '13','name' => 'PRESIDENCIA'),
				  	array('id' => '14','name' => 'GERENCIA DE PRODUCCION'),
				  	array('id' => '15','name' => 'SEGURIDAD FISICA'),
				  	array('id' => '16','name' => 'GERENCIA DE ADMINISTRACION'),
				  	array('id' => '17','name' => 'SISTEMAS'),
				  	array('id' => '18','name' => 'NOMINA EMPLEADOS'),
				  	array('id' => '19','name' => 'HCM'),
				  	array('id' => '20','name' => 'CONSULTORIA JURIDICA'),
				  	array('id' => '21','name' => 'ALMACEN I'),
				  	array('id' => '22','name' => 'ALMACEN II'),
				  	array('id' => '23','name' => 'ALMACEN III'),
				  	array('id' => '24','name' => 'ALMACEN IV'),
				  	array('id' => '25','name' => 'CENTRO DE ACOPIO (PALNTA ALTA)'),
				  	array('id' => '26','name' => 'COSTOS'),
				  	array('id' => '27','name' => 'CONTABILIDAD'),
				  	array('id' => '28','name' => 'COMPRAS'),
				  	array('id' => '29','name' => 'RECLUTAMIENTO Y SELECCION'),
				  	array('id' => '30','name' => 'SERVICIO MEDICO'),
				  	array('id' => '31','name' => 'BIENESTAR SOCIAL'),
				  	array('id' => '32','name' => 'REGISTRO Y CONTROL'),
				  	array('id' => '33','name' => 'SALA DE CONFERENCIAS'), 
				  	array('id' => '34','name' => 'COMEDOR, ALMACEN Y DESPACHO'),
				  	array('id' => '35','name' => 'GERENCIA DE TRANSPORTE (SEDE CENTRAL)'),
				  	array('id' => '36','name' => 'DESPACHO PLANTA BAJA'),
				  	array('id' => '37','name' => 'CONTROL Y SEGUIMIENTO'),
				  	array('id' => '38','name' => 'PREDESPACHO'),
				  	array('id' => '39','name' => 'ANEXO ALMACEN I (PAPELERIA)'),
				  	array('id' => '40','name' => 'TALLER MECANICO (REPUESTOS)'),
				  	array('id' => '41','name' => 'NOMINA OBREROS'),
				  	array('id' => '42','name' => 'RECEPCION'),
				  	array('id' => '43','name' => 'COMEDOR EMPLEADOS'),
				  	array('id' => '44','name' => 'COMEDOR OBREROS'),
				  	array('id' => '45','name' => 'INSTALACIONES VERICA'),
				  	array('id' => '46','name' => 'SINDICATO'),
				  	array('id' => '47','name' => 'LABORATORIO'),
				  	array('id' => '48','name' => 'CONTROL DE PERDIDA (ALMACEN IV)'),
				  	array('id' => '49','name' => 'MAQUINA O.M.E'),
				  	array('id' => '50','name' => 'VIGILANCIA PRINCIPAL'),
				  	array('id' => '51','name' => 'VIGILANCIA GALPON CHINO'),
				  	array('id' => '52','name' => 'VIGILANCIA GALPON VI'),
				  	array('id' => '53','name' => 'VIGILANCIA VERICA CAGUA'),
				  	array('id' => '54','name' => 'VENTAS'),
				  	array('id' => '55','name' => 'GALPON CHINO'),
				  	array('id' => '56','name' => 'MONTACARGA'),
				  	array('id' => '57','name' => 'AREA DE GAS'),
				  	array('id' => '58','name' => 'GERENCIA DE TRANSPORTE/VEHICULOS'),
				  	array('id' => '59','name' => 'VENEZOLANA DE RIEGO'),
				  	array('id' => '60','name' => 'RRHH'),
				  	array('id' => '61','name' => 'INVENTARIO'),
		);
        //insert manual a una base de datos con array
        \DB::table('ubicaciones')->insert($ubicacion);
    }
}

<?php
	class Db
	{
		private static $instance = NULL; //Variable estatica que guarda el objeto que contiene los datos de conexion con la BD

		/**
		 * Constructor de la clase que se encarga de crear el objeto de conexión con la base de datos.
		 * @access private
		*/
	
		private function __construct(){ }

		private function __clone(){ }
		
		
		public static function getConector(){
			if (!isset(self::$instance)) {
				$pdo_options[PDO::ATTR_ERRMODE]=PDO::ERRMODE_EXCEPTION;
				self::$instance= new PDO('mysql:host=82.223.31.104;port=4358;dbname=gpsdemo', 'rootgps', 'S4D8SLito9ofTKPn',$pdo_options);
				/*self::$instance= new PDO('mysql:host=82.165.137.141;port=4408;dbname=gpsdemo', 'rootmallorca', '0lAM3DfqKLCdD1Dk',$pdo_options);*/
			}
			return self::$instance;
		}
	}
?>
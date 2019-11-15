<?php
class UserData {
	public static $tablenombre = "usuarios";

	public  function createForm(){
		$form = new lbForm();
	    $form->addField("nombre",array('type' => new lbInputText(array("label"=>"Nombre")),"validate"=>new lbValidator(array())));
	    $form->addField("apellido",array('type' => new lbInputText(array("label"=>"Apellido")),"validate"=>new lbValidator(array())));
	    $form->addField("correo",array('type' => new lbInputText(array()),"validate"=>new lbValidator(array())));
	    $form->addField("contrasena",array('type' => new lbInputcontrasena(array()),"validate"=>new lbValidator(array())));
	    return $form;

	}

	public function Userdata(){
		$this->nombre = "";
		$this->apellido = "";
		$this->correo = "";
		$this->contrasena = "";
		$this->created_at = "NOW()";
	}

	public function add(){
		$sql = "insert into usuario (nombre,apellido,usuario,correo,contrasena,created_at) ";
		$sql .= "value (\"$this->nombre\",\"$this->apellido\",\"$this->usuario\",\"$this->correo\",\"$this->contrasena\",$this->created_at)";
		Executor::doit($sql);
	}

	public static function delById($id){
		$sql = "delete from ".self::$tablenombre." where id=$id";
		Executor::doit($sql);
	}
	public function del(){
		$sql = "delete from ".self::$tablenombre." where id=$this->id";
		Executor::doit($sql);
	}

// partiendo de que ya tenemos creado un objecto UserData previamente utilizamos el contexto
	public function update(){
		$sql = "update ".self::$tablenombre." set usuario=\"$this->usuario\",nombre=\"$this->nombre\",correo=\"$this->correo\",apellido=\"$this->apellido\",is_admin=$this->is_admin,is_activo=$this->is_activo where id=$this->id";
		Executor::doit($sql);
	}

	public function update_passwd(){
		$sql = "update ".self::$tablenombre." set contrasena=\"$this->contrasena\" where id=$this->id";
		Executor::doit($sql);
	}

	public static function getById($id){
		$sql = "select * from ".self::$tablenombre." where id=$id";
		$query = Executor::doit($sql);
		$found = null;
		$data = new UserData();
		while($r = $query[0]->fetch_array()){
			$data->id = $r['id'];
			$data->nombre = $r['nombre'];
			$data->apellido = $r['apellido'];
			$data->usuario = $r['usuario'];
			$data->correo = $r['correo'];
			$data->contrasena = $r['contrasena'];
			$data->created_at = $r['created_at'];
			$data->is_admin = $r['is_admin'];
			$data->is_activo = $r['is_activo'];
			$found = $data;
			break;
		}
		return $found;
	}

	public static function getBycorreo($correo){
		echo $sql = "select * from ".self::$tablenombre." where correo=\"$correo\"";
		$query = Executor::doit($sql);
		$found = null;
		$data = new UserData();
		while($r = $query->fetch_array()){
			$data->id = $r['id'];
			$data->nombre = $r['nombre'];
			$data->correo = $r['correo'];
			$data->created_at = $r['created_at'];
			$found = $data;
			break;
		}
		return $found;
	}


	public static function getAll(){
		$sql = "select * from ".self::$tablenombre;
		$query = Executor::doit($sql);
		$array = array();
		$cnt = 0;
		while($r = $query[0]->fetch_array()){
			$array[$cnt] = new UserData();
			$array[$cnt]->id = $r['id'];
			$array[$cnt]->nombre = $r['nombre'];
			$array[$cnt]->apellido = $r['apellido'];
			$array[$cnt]->usuario = $r['usuario'];
			$array[$cnt]->correo = $r['correo'];
			$array[$cnt]->contrasena = $r['contrasena'];
			$array[$cnt]->is_activo = $r['is_activo'];
			$array[$cnt]->is_admin = $r['is_admin'];
			$array[$cnt]->created_at = $r['created_at'];
			$cnt++;
		}
		return $array;
	}


	public static function getLike($q){
		$sql = "select * from ".self::$tablenombre." where nombre like '%$q%'";
		$query = Executor::doit($sql);
		$array = array();
		$cnt = 0;
		while($r = $query[0]->fetch_array()){
			$array[$cnt] = new UserData();
			$array[$cnt]->id = $r['id'];
			$array[$cnt]->nombre = $r['nombre'];
			$array[$cnt]->correo = $r['correo'];
			$array[$cnt]->contrasena = $r['contrasena'];
			$array[$cnt]->created_at = $r['created_at'];
			$cnt++;
		}
		return $array;
	}


}

?>

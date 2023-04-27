<?php
	class Session {
		//Iniciamos la sesión
		function __construct() {
			session_start();
		}

		public function set($key,$valor) {
			$_SESSION[$key] = $valor;
		}

		public function get($key) {
			return $_SESSION[$key] ?? false;
		}

		public function borrar_sesion() {
			$_SESSION = array();
			session_destroy();
			header("Location: topicListIndex.php");
		}
	}
?>

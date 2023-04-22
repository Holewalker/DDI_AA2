<?php
	class Session {
		//Iniciamos la sesión
		function __construct() {
			session_start();
		}

		//Método para registrar las variables de la sesión. Lo usaremos para guardar el nombre de usuario
		public function set($username,$valor) {
			$_SESSION[$username] = $valor;
		}

		//Recupera el valor del nombre de usuario
		public function get($username) {
			if (isset($_SESSION[$username])) {
				return $_SESSION[$username];
			} else {
				return false;
			}
		}

		//Borra la sesión y vuelve a la página inicial
		public function borrar_sesion() {
			$_SESSION = array();
			session_destroy();
			header("Location: index.php");
		}
	}
?>

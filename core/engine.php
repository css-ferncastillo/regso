<?php
namespace Core;
class Engine {
   protected static $data;

	public static function render($c = null, $f = null) {

		$req = new \Core\Request();
		if (empty($c)) {
			$c = $req->getController();
			$f = $req->getMethod();
		}

		$tpl = VIEWS . $c . DS .$f.'.php';

		if (file_exists($tpl)) {
			ob_start();

			if (isset(self::$data)) {
				extract(self::$data);
			}

			require_once $tpl;

			$str = ob_get_contents();
			ob_end_clean();

			\Core\Template::getHeader();
			\Core\Template::getNavbar();
			echo "<main id='main-container'>";
			\Core\Template::getSidebar();
			echo $str;
			echo "</main>";
			\Core\Template::getFooter();
			\Core\Template::getButtom();

		} else {
			throw new \Exception("Archivo de vista no encontrado {$c} {$f}");
		}
	}

	public static function set($k, $v) {
		if (isset($v)) {
			self::$data[$k] = $v;
		}
	}

}
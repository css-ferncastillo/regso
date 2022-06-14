<?php
namespace Src;
class Template{

	public static function getHeader() {
		$file = LAYOUTS .'header.php';
		if (file_exists($file)) {
			require_once $file;

		} else {
			throw new \Exception("El archivo: {$file} no esta disponible");
		}
	}

	public static function getSidebar() {
		$file = LAYOUTS .'sidebar.php';
		if (file_exists($file)) {
				require_once $file;
			
		} else {
			throw new \Exception("El archivo: {$file} no esta disponible");
		}
	}

	public static function getNavbar() {
		$file = LAYOUTS .'navbar.php';
		if (file_exists($file)) {
				require_once $file;
			
		} else {
			throw new \Exception("El archivo: {$file} no esta disponible");
		}
	}

	public static function getFooter() {
		$file = LAYOUTS .'footer.php';
		if (file_exists($file)) {
			require_once $file;
		} else {
			throw new \Exception("El archivo: {$file} no esta disponible");
		}
	}

	public static function getButtom() {
		$file = LAYOUTS .'buttom.php';
		if (file_exists($file)) {
			require_once $file;
		} else {
			throw new \Exception("El archivo: {$file} no esta disponible");
		}
	}


}
<?php
namespace Core;
class Template{

	public static function getHeader() {
		$file = LAYOUTS .'header.php';
		if (file_exists($file)) {
			require_once $file;

		} else {
			throw new \Exception("El archivo: {$file} no esta disponible");
		}
	}

	public static function getBanner() {
		$file = LAYOUTS .'banner.php';
		if (file_exists($file)) {
			require_once $file;

		} else {
			throw new \Exception("El archivo: {$file} no esta disponible");
		}
	}

	public static function topBody() {
		$file = LAYOUTS .'body_top.php';
		if (file_exists($file)) {
			require_once $file;

		} else {
			throw new \Exception("El archivo: {$file} no esta disponible");
		}
	}

	public static function bottomBody() {
		$file = LAYOUTS .'body_buttom.php';
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




}
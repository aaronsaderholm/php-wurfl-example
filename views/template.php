<?php
	namespace wurfl_demo\views;

	class template extends base_view {

		public static function render(Array $data =[]) {

			$body = $data['content'];
			$html = <<<HTML
			<!DOCTYPE html>
			<html lang="en">
			<head>
				<meta charset="utf-8">
				<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
				<meta name="description" content="WURFL Demo">
				<meta name="author" content="Aaron Saderholm">

				<title>WURFL Demo</title>
				<link href="/bootstrap.min.css" rel="stylesheet">
				<link href="/global.css" rel="stylesheet">
			</head>

			<body>

	

			<div class="container">
				<div class="row">
				<h1>WURFL Demo</h1>
				</div>
			$body</div>
			</body>
			</html>
HTML;
			return $html;
		}

	}
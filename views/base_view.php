<?php
	namespace wurfl_demo\views;

	abstract class base_view {


		/**
		 * @param string $data
		 */
		public static function render(Array $data = []) {
			return $data;
		}

	}
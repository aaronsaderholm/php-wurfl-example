<?php

namespace wurfl_demo\controllers;

use wurfl_demo\views\home;


class homepage {
    public static function view(Array $data =[]) {

		ob_start();
		var_dump($_SERVER);
		$data['server'] = ob_get_clean();

		$default_agents = <<<AGENTS
Mozilla/5.0 (Linux; U; Android 4.0.4; en-in; MT27i Build/6.1.1.B.1.54) AppleWebKit/534.30 (KHTML, like Gecko) Version/4.0 Mobile Safari/534.30
Mozilla/5.0 (Linux; U; Android 4.0.4; zh-cn; MI 1S Build/IMM76D) AppleWebKit/534.30 (KHTML, like Gecko) Version/4.0 Mobile Safari/534.30
Mozilla/5.0 (Linux; U; Android 2.3.6; zh-cn; SCH-I699 Build/GINGERBREAD) AppleWebKit/533.1 (KHTML, like Gecko) Version/4.0 Mobile Safari/533.1
Mozilla/5.0 (Linux; U; Android 4.2.2; en-us; iris 360m Build/iris360m) AppleWebKit/534.30 (KHTML, like Gecko) Version/4.0 Mobile Safari/534.30
LG-G912/V100/WAP2.0  Profile/MIDP-2.0  Configuration/CLDC-1.0
Mozilla/5.0 (Linux; U; Android 2.1-update1; es-es; MB200 Build/ERD79) AppleWebKit/530.17 (KHTML, like Gecko) Version/4.0 Mobile Safari/530.17
OPPO U525/4.02/12 Release/2010.6.02 Browser/Obigo/Q03C Profile/MIDP-2.0 Configuration/CLDC-1.1
Mozilla/5.0 (Linux; U; Android 2.2.1; en-us; SPH-D700 Build/FROYO) AppleWebKit/533.1 (KHTML, like Gecko) Version/4.0 Mobile Safari/533.1
Lenovo-P650WG/S100 LMP/LML Release/2010.02.22 Profile/MIDP2.0 Configuration/CLDC1.1
Mozilla/5.0 (Linux; U; Android 2.3.3; es-es; SonyEricssonSK17i Build/4.0.A.2.368) AppleWebKit/533.1 (KHTML, like Gecko) Version/4.0 Mobile Safari/533.1
AGENTS;
		$data['default_agents'] = $default_agents;

		echo home::render($data);
    }
}
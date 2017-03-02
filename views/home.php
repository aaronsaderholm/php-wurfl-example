<?php
	namespace wurfl_demo\views;

	class home extends template {

		public static function render(Array $data =[]) {

			$default_agents = $data['default_agents'];
			$server = $data['server'];
			$user_agent = $_SERVER['HTTP_USER_AGENT'];

		    $data['content'] = <<<HTML

	<div class="row">
		<h3>About You:</h3>
	</div>
	<div>
		<form action="/post_agent" method="post">
		<pre>
$user_agent
		</pre>
		 <div class="form-group">
		 		  	<button type="submit" class="btn btn-primary">Submit</button>
		 </div>
			<textarea style="display:none;" class="form-control agentTextArea" name="agents" rows="10">$user_agent</textarea>	

		</form>
	</div>
	
	<div class="row">
		<h3>Enter List of Agents:</h3>
	</div>

	<div class="row">
		<form action="/post_agent" method="post">
		<textarea class="form-control agentTextArea" name="agents" rows="10">$default_agents</textarea>
	  	<button type="submit" class="btn btn-primary">Get TSV File</button>
		</form>
	</div>
HTML;

		    if(false) {
				$data['content'] .= <<<HTML
	<div class="row">
		<pre>
		$server
		</pre>
	</div>
HTML;

			}

            $html = template::render($data);
            return $html;

		}

	}
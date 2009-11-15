<?php

/**
 * Mockdown
 * By Sam Minnée
 *
 * Mockdown is an ASCII-art HTML UI mockup language, inspired by Markdown.
 * It's licensed under the BSD license.
 *
 * See the README.md for more info.
 */

/**
 * Mockdown rendering function.
 * Uses the Mockdown class to do all the real work.
 */
function Mockdown($content) {
	$m = new Mockdown;
	return $m->render($content);
}

class Mockdown {
	function render($content) {
		foreach($this->matchers as $rule => $outcome) {
			$content = preg_replace_callback($rule, array($this,$outcome), $content);
		}
		
		return "<pre class=\"mockdown\">$content</pre>";
	}


	/**
	 * Matcher expressions
	 */
	protected $matchers = array(
		'/\[([xo ])\]/i' => 'checkbox',
		'/\(([xo ])\)/i' => 'radio',
		'/\[ +([^\[\]]{2,}) +\]/i' => 'button',
		'/(\[([^\[\]_]*)(_+)\]\n){2,}/i' => 'textarea',
		'/\[([^\[\]_]*)(_+)\]/i' => 'textfield',
	);
	
	// Matcher implementations

	function checkbox($match) {
		$checkedClause = ($match[1] != ' ') ? 'checked="checked"' : '';
		return "<input type=\"checkbox\" $checkedClause>";
	}
	function radio($match) {
		$checkedClause = ($match[1] != ' ') ? 'checked="checked"' : '';
		return "<input type=\"radio\" value=\"foo\" $checkedClause>";
	}
	function button($match) {
		$buttonLabel = trim($match[1]);
		return "<input type=\"submit\" value=\"$buttonLabel\">";
	}
	function textfield($match) {
		$size = strlen($match[1]) + strlen($match[2]);
		$value = $match[1];
		return "<input type=\"text\" size=\"$size\" value=\"$value\">";
	}
	function textarea($match) {
		$width = strlen($match[2]) + strlen($match[3]);
		$height = substr_count(trim($match[0]), "\n")+1;

		$value = preg_replace('/(^\[)|(\]$)|(\]\n\[)/', "\n", $match[0]);
		$value = trim(preg_replace('/_+\n/',"\n", $value));

		return "<textarea cols=\"$width\" rows=\"$height\">$value</textarea>\n";
	}	
}

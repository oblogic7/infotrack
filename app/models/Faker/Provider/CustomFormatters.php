<?php
/**
 * Created by PhpStorm.
 * User: matt
 * Date: 3/29/14
 * Time: 4:39 PM
 */

namespace Faker\Provider;

class CustomFormatters extends Base
{

	public function serviceDescription($wordCount)
	{
		$title = '';

		foreach (range(1, $wordCount) as $i) {

			$title .= $this->generator->word() . ' ';

		}

		return ucfirst(trim($title));
	}
} 
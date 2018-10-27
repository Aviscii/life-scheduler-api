<?php
/**
 * Created by PhpStorm.
 * User: Aviscii
 * Date: 2018. 10. 27.
 * Time: 13:55
 */

namespace App\Serializer\Normalizer;

use FOS\RestBundle\Serializer\Normalizer\FormErrorNormalizer as FosRestFormErrorNormalizer;

class FormErrorNormalizer extends FosRestFormErrorNormalizer {

	/**
	 * {@inheritdoc}
	 */
	public function normalize($object, $format = null, array $context = array()) {

		return [
			'status' => 'error',
			'errors' => parent::normalize($object, $format, $context)['errors'],
		];
	}
}
<?php

namespace Mpdf\Pdf\Protection;

class UniqidGenerator
{

	public function __construct()
	{
	    /*
		if (!function_exists('random_int') || !function_exists('random_bytes')) {
			throw new \Mpdf\MpdfException(
				'Unable to set PDF file protection, CSPRNG Functions are not available. '
				. 'Use paragonie/random_compat polyfill or upgrade to PHP 7.'
			);
		}
	    */
	}

	/**
	 * @return string
	 */
	public function generate()
	{
		$chars = 'ABCDEF1234567890';
		$id = '';

		for ($i = 0; $i < 32; $i++) {
			$id .= $chars[secure_rand(0, 15)];
		}

		return md5($id);
	}

    private function secure_rand($min, $max)
    {
        return (unpack("N", openssl_random_pseudo_bytes(4)) % ($max - $min)) + $min;
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

	public function output($success, $code, $data) {
		if ($success == true) {
			$statusCode = 200;
		} else {
			$statusCode = 400;
		}

		if ($code === 0) {
			$output = $data;
		} else {
	        $output = [
                    'code' => 1 ,
                    'message' => 'corrupted data'
            	];

		}

		header('Content-Type: application/json');
        http_response_code($statusCode);

        if (!empty($output)) {
            echo json_encode($output, JSON_PRETTY_PRINT);
        }

        exit;
	}
	

}

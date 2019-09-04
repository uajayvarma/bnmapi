<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bankdetails;

class BankController extends Controller
{
	public function index($id) {
		$success = false;
		$code = 1;
		$data = '';
		if ($id) {
			$bank = Bankdetails::where('bank_code', '=', $id)->first();
			if (!empty($bank)) {
				$success = true;
				$code = 0;
				$data = [
					"name" => $bank->bank_name,
					"created" => date('Y-m-d\TH:i:s\Z', strtotime($bank->created))
					];
				$this->output($success, $code, $data);
			}
		}
		$this->output($success, $code, $data);
	}
   
}

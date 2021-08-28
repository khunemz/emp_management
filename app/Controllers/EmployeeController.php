<?php

namespace App\Controllers;

use App\Models\EmployeeModel;
use CodeIgniter\Model;

class EmployeeController extends BaseController
{
	public function index()
	{
		$model = new EmployeeModel();
		$employees = $model->getAll();
		return view('employee/index', ['employees' => $employees]);
	}

	public function create() {
		return view('employee/create');
	}

	public function store() {
		$name = $this->request->getVar('name');
		$email = $this->request->getVar('email');
		$phone = $this->request->getVar('phone');
		$data['name'] = $name;
		$data['email'] = $email;
		$data['phone'] = $phone;

		$validation =  \Config\Services::validation();
		$validation_result = $validation->setRules([
			'name' => 'required|max_length[100]',
			'email' => 'required|valid_email|max_length[100]',
			'phone' => 'max_length[100]'
		])->run($data);

		// if validate is true then save
		if($validation_result) {
			// todo : save to database;
			$model = new EmployeeModel();
			$id = $model->insert($data, true);
			if($id == null) {
				return redirect()->back()->with('error', 'Something when wrong');
			}
			return redirect()->to('employee/index');
		} else {
			return view('employee/create', ['validation' => $validation]);
		}
	}

	public function edit($id) {
		
	}
}

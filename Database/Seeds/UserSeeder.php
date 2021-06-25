<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
	public function run()
	{
		$model = model('UserModel');
		$model->insert([
			'username' => 'VenoSW',
			'useremail' => 'veno.setyoaji30@gmail.com',
			'userpassword' => password_hash('venosw', PASSWORD_DEFAULT),
		]); 
	}
}
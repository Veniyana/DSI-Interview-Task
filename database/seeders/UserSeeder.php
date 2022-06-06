<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'Theresa',
                'surname' => 'Darling',
                'lastname' => 'Green',
                'email' => 'teresa@dummy.com',
                'password' => bcrypt('gj6u3P4j'),
                'address' => '38 Maystor Aleksi Rilets str., 1618 Sofia, Bulgaria.',
                'phone' => '+3590000000000',
                'department' => 'Human Resources',
                'occupation' => 'Recruiting Manager',
                'salary' => '1234.56',
            ]
        ];

        User::insert($users);
    }
}

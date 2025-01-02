<?php

namespace Database\Seeders;

use App\Models\Client;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $clients = [];
        $clients[1] = [
            'name' => 'محمد احمد ابراهيم عطية' ,
            'national_number' => '29909011231532',
            'phone' => ["01226142143","01139845326"],
            'address'=> 'قرية نشا - مركز نبروه - الدقهلية	',
        ];
        $clients[2] = [
            'name' => 'محمود محمد على عطوه' ,
            'national_number' => '28909011234563',
            'phone' => ["01239442143","01039874271"],
            'address'=> 'قرية نشا - مركز نبروه - الدقهلية',
        ];
        $clients[3] = [
            'name' => 'ماهر زيدان محمد محمد بركات' ,
            'national_number' => '28709011231568',
            'phone' => ["01139447232","01039875697"],
            'address'=> 'قرية نشا - مركز نبروه - الدقهلية',
        ];
        $clients[4] = [
            'name' => 'محمد عبدالهادى الشحات الوردانى   ',
            'national_number' => '28809011231659',
            'phone' => ["01239875232","01039874242"],
            'address'=> 'قرية نشا - مركز نبروه - الدقهلية',
        ];
        foreach ($clients as $key => $value){
            Client::create([
                'name' => $value['name'],
                'national_number' => $value['national_number'],
                'phone' => $value['phone'], // Convert array to JSON string
                'address' => $value['address'],
            ]);
        }
    }
}

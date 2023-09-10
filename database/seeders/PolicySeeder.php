<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PolicySeeder extends Seeder
{
    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datas = [
            [
                "code" => "123456",
                "plan_reference" => "The Calpe RBS No. 247",
                "first_name" => "John",
                "last_name" => "Doe",
                "investment_house" => "Old Mutual International"
            ],
            [
                "code" => "123451",
                "plan_reference" => "The Calpe RBS No. 231",
                "first_name" => "Richard",
                "last_name" => "Man",
                "investment_house" => "Old Mutual International"
            ],
            [
                "code" => "123434",
                "plan_reference" => "The Calpe RBS No. 253",
                "first_name" => "Oscar",
                "last_name" => "Nilsson",
                "investment_house" => "Old Mutual International"
            ],
            [
                "code" => "123444",
                "plan_reference" => "The Calpe RBS No. 423",
                "first_name" => "Yun",
                "last_name" => "Maria",
                "investment_house" => "Old Mutual International"
            ],
            [
                "code" => "123343",
                "plan_reference" => "The Calpe RBS No. 543",
                "first_name" => "Andrei",
                "last_name" => "Shen",
                "investment_house" => "Old Mutual International"
            ],
            [
                "code" => "123343",
                "plan_reference" => "The Calpe RBS No. 543",
                "first_name" => "Andrei",
                "last_name" => "Shen",
                "investment_house" => "Old Mutual International"
            ],
            [
                "code" => "123343",
                "plan_reference" => "The Calpe RBS No. 543",
                "first_name" => "Andrei",
                "last_name" => "Shen",
                "investment_house" => "Old Mutual International"
            ],
            [
                "code" => "123343",
                "plan_reference" => "The Calpe RBS No. 543",
                "first_name" => "Andrei",
                "last_name" => "Shen",
                "investment_house" => "Old Mutual International"
            ],
            [
                "code" => "123343",
                "plan_reference" => "The Calpe RBS No. 543",
                "first_name" => "Andrei",
                "last_name" => "Shen",
                "investment_house" => "Old Mutual International"
            ],
            [
                "code" => "123343",
                "plan_reference" => "The Calpe RBS No. 543",
                "first_name" => "Andrei",
                "last_name" => "Shen",
                "investment_house" => "Old Mutual International"
            ],
            [
                "code" => "123343",
                "plan_reference" => "The Calpe RBS No. 543",
                "first_name" => "Andrei",
                "last_name" => "Shen",
                "investment_house" => "Old Mutual International"
            ],
            [
                "code" => "123343",
                "plan_reference" => "The Calpe RBS No. 543",
                "first_name" => "Andrei",
                "last_name" => "Shen",
                "investment_house" => "Old Mutual International"
            ],
            [
                "code" => "123343",
                "plan_reference" => "The Calpe RBS No. 543",
                "first_name" => "Andrei",
                "last_name" => "Shen",
                "investment_house" => "Old Mutual International"
            ],
            [
                "code" => "123343",
                "plan_reference" => "The Calpe RBS No. 543",
                "first_name" => "Andrei",
                "last_name" => "Shen",
                "investment_house" => "Old Mutual International"
            ],
            [
                "code" => "123454",
                "plan_reference" => "The Calpe RBS No. 532",
                "first_name" => "Donald",
                "last_name" => "Harrison",
                "investment_house" => "Old Mutual International"
            ]
        ];
        DB::table('policies')->insert($datas);
    }
}
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\kerusakan;
use App\Models\gejala;


class RuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rule = array(
            '1' => array(1, 2),
            '2' => array(3, 4, 5),
            '3' => array(3, 4, 6, 7),
            '4' => array(4, 8),
            '5' => array(3, 4, 9),
            '6' => array(1, 6, 10),
            '7' => array(11, 12, 13),
            '8' => array(8, 11),
            '9' => array(9, 14),
            '10' => array(11, 12, 15, 16, 17)
        );

        foreach ($rule as $kerusakan_id => $gejala) {
            $kerusakan = kerusakan::find($kerusakan_id);
            foreach ($gejala as $gejala_id) {
                $kerusakan->attachGejala($gejala_id);
            }
        }
    }
}

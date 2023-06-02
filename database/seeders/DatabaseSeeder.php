<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //use php artisan laravolt:indonesia:seed

        $this->call(UserSeeder::class);
        $this->call(ArmadaBusSeeder::class);
        $this->call(KodePerawatanSeeder::class);
        $this->call(PegawaiSeeder::class);
        $this->call(PerawatanArmadaSeeder::class);
        $this->call(PembaruanArmadaSeeder::class);
        $this->call(ReservasiSeeder::class);
        $this->call(TransaksiSeeder::class);
    }
}

<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        
        // $this->call(ProvincesSeeder::class);
        // $this->call(CitiesSeeder::class);
        // $this->call(DistrictsSeeder::class);
        // $this->call(VillagesSeeder::class);

        //use php artisan laravolt:indonesia:seed

        $this->call(UserSeeder::class);
        $this->call(ArmadaBusSeeder::class);
        $this->call(KodePerawatanSeeder::class);
    }
}

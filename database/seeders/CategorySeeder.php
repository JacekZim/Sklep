<?php
namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $node = Category::create([
            'name' => 'Ubrania',

            'children' => [
                [
                    'name' => 'Męskie',

                    'children' => [
                        ['name' => 'Spodonie'],
                        ['name' => 'Kurtki'],
                        ['name' => 'Koszule'],
                    ],
                ], [
                    'name' => 'Żeńskie',

                    'children' => [
                        ['name' => 'Sukienki'],
                        ['name' => 'Kurtki'],
                        ['name' => 'Spódunice'],
                    ],
                ],
            ],
        ]);
    }
}

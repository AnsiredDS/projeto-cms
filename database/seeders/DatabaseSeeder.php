<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Page;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Bruno',
            'email' => 'bruno@gmail.com',
            'password' => bcrypt('password'),
        ]);

        Page::factory()->create([
            'title' => 'O desafio da vez é',
            'subtitle' => 'Terraplanagem sustentável',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam convallis massa augue. Quisque congue sollicitudin dolor. Cras rutrum erat in purus tempus, id hendrerit nibh viverra. Aliquam sem elit, egestas eget iaculis nec, venenatis in lorem. Sed luctus auctor ante, viverra blandit mauris mollis id. Etiam enim arcu, elementum id aliquam sit amet, euismod vel elit. In efficitur arcu pellentesque ullamcorper iaculis. Morbi a hendrerit ex. Proin volutpat pellentesque massa a commodo. Morbi consectetur accumsan magna. Proin a tristique erat, id malesuada felis. Morbi ornare malesuada rutrum. Nullam purus massa, rutrum sed suscipit in, condimentum eget elit. Quisque eu velit lectus. Fusce varius tincidunt semper. Suspendisse a erat vel dolor tristique accumsan congue id metus. Proin quis tincidunt sem, a accumsan magna. Praesent consequat, diam vitae gravida tristique, leo sem venenatis neque, ut congue augue est et leo. Ut eu libero commodo, auctor dolor maximus, cursus erat. Suspendisse vitae ante nec sem elementum tincidunt. Donec nunc elit, auctor nec commodo vitae, imperdiet a massa.',
        ]);
       // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\CheckList;
use App\Models\CheckListItem;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'uuid' => Str::uuid(),
            'name' => 'Kalingga Padel Muhamad',
            'username' => 'kalinggapadelmuhamad',
            'email' => 'enginerbros@gmail.com',

        ]);

        CheckList::create([
            'uuid' => Str::uuid(),
            'user_id' => 1,
            'name' => 'AVP TO DO NOW'
        ]);

        CheckList::create([
            'uuid' => Str::uuid(),
            'user_id' => 1,
            'name' => 'Disney 2020'
        ]);

        CheckList::create([
            'uuid' => Str::uuid(),
            'user_id' => 1,
            'name' => 'Xmas Ideas 2019'
        ]);

        CheckList::create([
            'uuid' => Str::uuid(),
            'user_id' => 1,
            'name' => 'Filming for BOTC'
        ]);

        CheckList::create([
            'uuid' => Str::uuid(),
            'user_id' => 1,
            'name' => 'Miles & Flyer'
        ]);

        CheckListItem::create([
            'uuid' => Str::uuid(),
            'check_list_id' => 1,
            'itemName' => 'Finish the AVP',
        ]);

        CheckListItem::create([
            'uuid' => Str::uuid(),
            'check_list_id' => 2,
            'itemName' => 'Go to disneyland',
        ]);

        CheckListItem::create([
            'uuid' => Str::uuid(),
            'check_list_id' => 3,
            'itemName' => 'Go to Christmas Ideas',
        ]);

        CheckListItem::create([
            'uuid' => Str::uuid(),
            'check_list_id' => 4,
            'itemName' => 'Go to Filming for BOTC',
        ]);

        CheckListItem::create([
            'uuid' => Str::uuid(),
            'check_list_id' => 5,
            'itemName' => 'Go to Miles & Flyer',
        ]);
    }
}

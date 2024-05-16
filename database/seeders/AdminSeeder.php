<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $admin = User::query()->firstOrNew(['mobile' => '09360085252']);

        $admin->password = Hash::make('m.s.0102');
        $admin->name     = 'mahyar saeidifar';
        $admin->save();
    }
}

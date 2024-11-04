<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Cek apakah admin dengan email ini sudah ada
        $existingAdmin = Admin::where('email', 'ishakhadipernama@gmail.com')->first();
    
        if (!$existingAdmin) {
            // Buat admin baru jika belum ada
            $obj = new Admin();
            $obj->name = 'ishak';
            $obj->email = 'ishakhadipernama@gmail.com';
            $obj->password = Hash::make('12345678'); 
            $obj->save();
        }
    }
}
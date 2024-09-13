<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ParticipantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('participants')->insert(
            [
                [
                    "email"         => "aas@gmail.com",
                    "password"      => "123123",
                    "username"      => "alo",
                    "role"          => "USER",
                ],
                [
                    "email"         => "avs@gmail.com",
                    "password"      => "123123",
                    "username"      => "alo123",
                    "role"          => "ADMIN",
                ],
                [
                    "email"         => "aaklsvs@gmail.com",
                    "password"      => "123123",
                    "username"      => "alo123",
                    "role"          => "ADMIN",
                ],
                [
                    "email"         => "avasklds@gmail.com",
                    "password"      => "123123",
                    "username"      => "alo123",
                    "role"          => "ADMIN",
                ],
                [
                    "email"         => "avs@gmail.com",
                    "password"      => "123123",
                    "username"      => "alo123",
                    "role"          => "ADMIN",
                ],
                [
                    "email"         => "avaklsds@gmail.com",
                    "password"      => "123123",
                    "username"      => "alo123",
                    "role"          => "ADMIN",
                ],
                [
                    "email"         => "aaklsjvs@gmail.com",
                    "password"      => "123123",
                    "username"      => "alo123",
                    "role"          => "ADMIN",
                ],
                [
                    "email"         => "avasds@gmail.com",
                    "password"      => "123123",
                    "username"      => "aloasd123",
                    "role"          => "ADMIN",
                ],
                [
                    "email"         => "avasds@gmail.com",
                    "password"      => "123123",
                    "username"      => "aloadf123",
                    "role"          => "ADMIN",
                ],
                [
                    "email"         => "aeq2vs@gmail.com",
                    "password"      => "123123",
                    "username"      => "aloasd123",
                    "role"          => "ADMIN",
                ],
                [
                    "email"         => "a121vs@gmail.com",
                    "password"      => "123123",
                    "username"      => "aloasdasd123",
                    "role"          => "ADMIN",
                ],

            ]
        );
    }
}

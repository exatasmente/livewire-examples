<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('users')->insert([
            [
                "id" => 1,
                "name" => "Miss Annetta Wuckert IV",
                "email" => "crona.damian@example.com",
                "password" => "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi",
                "remember_token" => null,
                "created_at" => "2020-07-02T19:29:40.000000Z",
                "updated_at" => "2020-07-02T19:29:40.000000Z",
            ],
            [
                "id" => 2,
                "name" => "Sheridan Botsford",
                "email" => "thad.labadie@example.org",
                "password" => "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi",
                "remember_token" => null,
                "created_at" => "2020-07-02T19:29:40.000000Z",
                "updated_at" => "2020-07-02T19:29:40.000000Z",
            ],
            [
                "id" => 3,
                "name" => "Dr. Major Parisian",
                "email" => "harber.halle@example.com",
                "password" => "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi",
                "remember_token" => null,
                "created_at" => "2020-07-02T19:29:41.000000Z",
                "updated_at" => "2020-07-02T19:29:41.000000Z",
            ],
            [
                "id" => 4,
                "name" => "Otilia Jacobi",
                "email" => "minerva.muller@example.net",
                "password" => "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi",
                "remember_token" => null,
                "created_at" => "2020-07-02T19:29:41.000000Z",
                "updated_at" => "2020-07-02T19:29:41.000000Z",
            ],
            [
                "id" => 5,
                "name" => "Ms. Elva Conn Sr.",
                "email" => "vincenza31@example.org",
                "password" => "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi",
                "remember_token" => null,
                "created_at" => "2020-07-02T19:29:41.000000Z",
                "updated_at" => "2020-07-02T19:29:41.000000Z",
            ],
            [
                "id" => 6,
                "name" => "Carlie Rodriguez V",
                "email" => "hessel.alex@example.com",
                "password" => "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi",
                "remember_token" => null,
                "created_at" => "2020-07-02T19:29:41.000000Z",
                "updated_at" => "2020-07-02T19:29:41.000000Z",
            ],
            [
                "id" => 7,
                "name" => "Ross Wolf",
                "email" => "jordon.yundt@example.org",
                "password" => "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi",
                "remember_token" => null,
                "created_at" => "2020-07-02T19:29:41.000000Z",
                "updated_at" => "2020-07-02T19:29:41.000000Z",
            ],
            [
                "id" => 8,
                "name" => "Prof. Shaylee Heidenreich V",
                "email" => "leanna.erdman@example.net",
                "password" => "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi",
                "remember_token" => null,
                "created_at" => "2020-07-02T19:29:42.000000Z",
                "updated_at" => "2020-07-02T19:29:42.000000Z",
            ],
            [
                "id" => 9,
                "name" => "Cesar Ward",
                "email" => "jacobson.carmen@example.org",
                "password" => "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi",
                "remember_token" => null,
                "created_at" => "2020-07-02T19:29:42.000000Z",
                "updated_at" => "2020-07-02T19:29:42.000000Z",
            ],
            [
                "id" => 10,
                "name" => "Jeffry Bernhard",
                "email" => "schmeler.lucio@example.com",
                "password" => "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi",
                "remember_token" => null,
                "created_at" => "2020-07-02T19:29:42.000000Z",
                "updated_at" => "2020-07-02T19:29:42.000000Z",
            ],
        ]);

    }
}

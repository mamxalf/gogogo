<?php
class Class_Fakename
{
    static function random()
    {
        $faker = Faker\Factory::create('id_ID');
        $name = $faker->name();
        $email = $faker->email();
        $result = [
            'name' => $name,
            'email' => $email
        ];
        return $result;
    }
}
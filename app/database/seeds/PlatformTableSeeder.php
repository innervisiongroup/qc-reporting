<?php 

class PlatformTableSeeder extends Seeder {

    public function run()
    {
        Platform::truncate();

        Platform::create(array(
            'name' => 'FireFox',
        ));
        Platform::create(array(
            'name' => 'Google Chrome',
        ));
        Platform::create(array(
            'name' => 'Internet Explorer 9',
        ));
        Platform::create(array(
            'name' => 'Internet Explorer 10',
        ));
        Platform::create(array(
            'name' => 'Opera',
        ));
        Platform::create(array(
            'name' => 'Safari',
        ));


    }
}
<?php

namespace App\Models;

class DataListing
{
    public static function all()
    {
        return [
            [
                'id' => 1,
                'title' => 'Listing One',
                'description' => 'We want it to be as easy as possible to
              get started with Laravel regardless of your preferred operating
              system. So, there are a variety of options for developing and
              running a Laravel project on your local machine.
              While you may wish to explore these options at a later
              time, Laravel provides Sail, a built-in solution for
              running your Laravel project using Docker.'
            ],
            [
                'id' => 2,
                'title' => 'Listing Two',
                'description' => 'We want it to be as easy as possible to
              get started with Laravel regardless of your preferred operating
              system. So, there are a variety of options for developing and
              running a Laravel project on your local machine.
              While you may wish to explore these options at a later
              time, Laravel provides Sail, a built-in solution for
              running your Laravel project using Docker.'
            ]
        ];
    }
    public static function find($id)
    {
        $listings = self::all();

        foreach ($listings as $listing) {
            if ($listing['id'] == $id) {
                return $listing;
            }
        }
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;

    public static function all($columns = ['*'])
    {
        return [
            [
                'id' => 1,
                'title' => 'Sahibinden Kazasız Boyasız',
                'description' => 'Çok temiz, sigara içilmemiş, kaza, boya, hasar yok.',
                'price' => '980.000'
            ],
            [
                'id' => 2,
                'title' => 'Bolu\'nun merkezinde lüks daire',
                'description' => 'Yol üstünde, şehir merkezinde, içindeki tüm dolapları yeni, mutfak ve banyo yenilendi.',
                'price' => '2.000.000 TL'
            ],
            [
                'id' => 3,
                'title' => 'Sahibinden Kazasız Boyasız',
                'description' => 'Çok temiz, sigara içilmemiş, kaza, boya, hasar yok.',
                'price' => '980.000'
            ],
            [
                'id' => 4,
                'title' => 'Bolu\'nun merkezinde lüks daire',
                'description' => 'Yol üstünde, şehir merkezinde, içindeki tüm dolapları yeni, mutfak ve banyo yenilendi.',
                'price' => '2.000.000 TL'
            ],
            [
                'id' => 5,
                'title' => 'Sahibinden Kazasız Boyasız',
                'description' => 'Çok temiz, sigara içilmemiş, kaza, boya, hasar yok.',
                'price' => '980.000'
            ],
            [
                'id' => 6,
                'title' => 'Bolu\'nun merkezinde lüks daire',
                'description' => 'Yol üstünde, şehir merkezinde, içindeki tüm dolapları yeni, mutfak ve banyo yenilendi.',
                'price' => '2.000.000 TL'
            ],
            [
                'id' => 7,
                'title' => 'Sahibinden Kazasız Boyasız',
                'description' => 'Çok temiz, sigara içilmemiş, kaza, boya, hasar yok.',
                'price' => '980.000'
            ],
            [
                'id' => 8,
                'title' => 'Bolu\'nun merkezinde lüks daire',
                'description' => 'Yol üstünde, şehir merkezinde, içindeki tüm dolapları yeni, mutfak ve banyo yenilendi.',
                'price' => '2.000.000 TL'
            ],
        ];
    }

    public static function find($id)
    {
        $listings = self::all();

        foreach ($listings as $listing){
            if($listing['id'] == $id) {
                return $listing;
            }
        }
    }
}

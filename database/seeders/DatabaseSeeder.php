<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Shipper;
use App\Models\User;
use App\Models\Address;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'email' => 'andimahesastra@gmail.com',
            'password' => Hash::make('12345'),
            'username' => 'anditya',
            'role' => 'supplier',
            'fullname' => 'I Made Anditya Mahesastra',
            'phone_number'=> '081222333444'
        ]);

        Address::create([
            'fullname' => 'I Made Anditya Mahesastra',
            'phone_number'=> '081222333444',
            'province' => 'Bali',
            'city' => 'Badung',
            'subdistrict' => 'Kuta Selatan',
            'address' => 'Jalan Uluwatu Nomor 3 pangkat 2 sama dengan 9',
            'postal_code' => '80361',
            'default' => 1,
            'username' => 'anditya',
        ]);

        User::create([
            'email' => 'putricahayad@gmail.com',
            'password' => Hash::make('12345'),
            'username' => 'cahaya',
            'role' => 'supplier',
            'fullname' => 'Putri Cahaya Dewi',
            'phone_number'=> '081222333444'
        ]);

        Address::create([
            'fullname' => 'Putri Cahaya Dewi',
            'phone_number'=> '081222333444',
            'province' => 'Bali',
            'city' => 'Badung',
            'subdistrict' => 'Kuta Selatan',
            'address' => 'Jalan Uluwatu Nomor 3 pangkat 2 sama dengan 9',
            'postal_code' => '80361',
            'default' => 1,
            'username' => 'cahaya',
        ]);

        User::create([
            'email' => 'pulaudewata17@gmail.com',
            'password' => Hash::make('12345'),
            'username' => 'ayutriana',
            'role' => 'supplier',
            'fullname' => 'Ni Putu Ayu Triana',
            'phone_number'=> '081222333444'
        ]);

        Address::create([
            'fullname' => 'Ni Putu Ayu Triana',
            'phone_number'=> '081222333444',
            'province' => 'Bali',
            'city' => 'Badung',
            'subdistrict' => 'Kuta Selatan',
            'address' => 'Jalan Uluwatu Nomor 3 pangkat 2 sama dengan 9',
            'postal_code' => '80361',
            'default' => 1,
            'username' => 'ayutriana',
        ]);

        User::create([
            'email' => 'dwayuputri35@gmail.com',
            'password' => Hash::make('12345'),
            'username' => 'dewayu',
            'role' => 'supplier',
            'fullname' => 'Dewa Ayu Putri Diah Pramesti',
            'phone_number'=> '081222333444'
        ]);

        Address::create([
            'fullname' => 'Dewa Ayu Putri Diah Pramesti',
            'phone_number'=> '081222333444',
            'province' => 'Bali',
            'city' => 'Badung',
            'subdistrict' => 'Kuta Selatan',
            'address' => 'Jalan Uluwatu Nomor 3 pangkat 2 sama dengan 9',
            'postal_code' => '80361',
            'default' => 1,
            'username' => 'dewayu',
        ]);

        User::create([
            'email' => 'yande554@gmail.com',
            'password' => Hash::make('12345'),
            'username' => 'yande',
            'role' => 'supplier',
            'fullname' => 'I Wayan Pande Putra Yudha',
            'phone_number'=> '081222333444'
        ]);

        Address::create([
            'fullname' => 'I Wayan Pande Putra Yudha',
            'phone_number'=> '081222333444',
            'province' => 'Bali',
            'city' => 'Badung',
            'subdistrict' => 'Kuta Selatan',
            'address' => 'Jalan Uluwatu Nomor 3 pangkat 2 sama dengan 9',
            'postal_code' => '80361',
            'default' => 1,
            'username' => 'yande',
        ]);

        User::create([
            'email' => 'nyomanhendradinata20@gmail.com',
            'password' => Hash::make('12345'),
            'username' => 'hendra',
            'role' => 'supplier',
            'fullname' => 'Nyoman Hendradinata Dharma',
            'phone_number'=> '081222333444'
        ]);

        Address::create([
            'fullname' => 'Nyoman Hendradinata Dharma',
            'phone_number'=> '081222333444',
            'province' => 'Bali',
            'city' => 'Badung',
            'subdistrict' => 'Kuta Selatan',
            'address' => 'Jalan Uluwatu Nomor 3 pangkat 2 sama dengan 9',
            'postal_code' => '80361',
            'default' => 1,
            'username' => 'hendra',
        ]);

        User::create([
            'email' => 'agusarinegara@gmail.com',
            'password' => Hash::make('12345'),
            'username' => 'gusari',
            'role' => 'supplier',
            'fullname' => 'I Komang Ari Negara',
            'phone_number'=> '081222333444'
        ]);

        Address::create([
            'fullname' => 'I Komang Ari Negara',
            'phone_number'=> '081222333444',
            'province' => 'Bali',
            'city' => 'Badung',
            'subdistrict' => 'Kuta Selatan',
            'address' => 'Jalan Uluwatu Nomor 3 pangkat 2 sama dengan 9',
            'postal_code' => '80361',
            'default' => 1,
            'username' => 'gusari',
        ]);

        User::create([
            'email' => 'indrapputra13@gmail.com',
            'password' => Hash::make('12345'),
            'username' => 'indra',
            'role' => 'supplier',
            'fullname' => 'Indra Permana Putra',
            'phone_number'=> '081222333444'
        ]);

        Address::create([
            'fullname' => 'Indra Permana Putra',
            'phone_number'=> '081222333444',
            'province' => 'Bali',
            'city' => 'Badung',
            'subdistrict' => 'Kuta Selatan',
            'address' => 'Jalan Uluwatu Nomor 3 pangkat 2 sama dengan 9',
            'postal_code' => '80361',
            'default' => 1,
            'username' => 'indra',
        ]);

        Product::create([
            'name' => 'Ayam',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam similique repudiandae, totam, reprehenderit soluta quidem quam, praesentium velit dolore id ipsam veritatis. Sapiente, repellendus fugiat? Delectus minima dolorem tempore voluptatem.',
            'price' => rand(1, 100)*1000,
            'stock' => rand(0, 100),
            'category' => 'daging',
            'weight' => rand(1, 100),
            'supplier' => 'anditya'
        ]);

        Product::create([
            'name' => 'Bayam',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam similique repudiandae, totam, reprehenderit soluta quidem quam, praesentium velit dolore id ipsam veritatis. Sapiente, repellendus fugiat? Delectus minima dolorem tempore voluptatem.',
            'price' => rand(1, 100)*1000,
            'stock' => rand(0, 100),
            'category' => 'sayur-sayuran',
            'weight' => rand(1, 100),
            'supplier' => 'anditya'
        ]);

        Product::create([
            'name' => 'Sapi',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam similique repudiandae, totam, reprehenderit soluta quidem quam, praesentium velit dolore id ipsam veritatis. Sapiente, repellendus fugiat? Delectus minima dolorem tempore voluptatem.',
            'price' => rand(1, 100)*1000,
            'stock' => rand(0, 100),
            'category' => 'daging',
            'weight' => rand(1, 100),
            'supplier' => 'cahaya'
        ]);

        Product::create([
            'name' => 'Domba',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam similique repudiandae, totam, reprehenderit soluta quidem quam, praesentium velit dolore id ipsam veritatis. Sapiente, repellendus fugiat? Delectus minima dolorem tempore voluptatem.',
            'price' => rand(1, 100)*1000,
            'stock' => rand(0, 100),
            'category' => 'daging',
            'weight' => rand(1, 100),
            'supplier' => 'cahaya'
        ]);
        
        Product::create([
            'name' => 'Bayam',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam similique repudiandae, totam, reprehenderit soluta quidem quam, praesentium velit dolore id ipsam veritatis. Sapiente, repellendus fugiat? Delectus minima dolorem tempore voluptatem.',
            'price' => rand(1, 100)*1000,
            'stock' => rand(0, 100),
            'category' => 'sayur-sayuran',
            'weight' => rand(1, 100),
            'supplier' => 'ayutriana'
        ]);

        Product::create([
            'name' => 'Kangkung',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam similique repudiandae, totam, reprehenderit soluta quidem quam, praesentium velit dolore id ipsam veritatis. Sapiente, repellendus fugiat? Delectus minima dolorem tempore voluptatem.',
            'price' => rand(1, 100)*1000,
            'stock' => rand(0, 100),
            'category' => 'sayur-sayuran',
            'weight' => rand(1, 100),
            'supplier' => 'ayutriana'
        ]);

        Product::create([
            'name' => 'Cabai',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam similique repudiandae, totam, reprehenderit soluta quidem quam, praesentium velit dolore id ipsam veritatis. Sapiente, repellendus fugiat? Delectus minima dolorem tempore voluptatem.',
            'price' => rand(1, 100)*1000,
            'stock' => rand(0, 100),
            'category' => 'buah-buahan',
            'weight' => rand(1, 100),
            'supplier' => 'dewayu'
        ]);

        Product::create([
            'name' => 'Ubi Ungu',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam similique repudiandae, totam, reprehenderit soluta quidem quam, praesentium velit dolore id ipsam veritatis. Sapiente, repellendus fugiat? Delectus minima dolorem tempore voluptatem.',
            'price' => rand(1, 100)*1000,
            'stock' => rand(0, 100),
            'category' => 'umbi-umbian',
            'weight' => rand(1, 100),
            'supplier' => 'dewayu'
        ]);

        Product::create([
            'name' => 'Paprika',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam similique repudiandae, totam, reprehenderit soluta quidem quam, praesentium velit dolore id ipsam veritatis. Sapiente, repellendus fugiat? Delectus minima dolorem tempore voluptatem.',
            'price' => rand(1, 100)*1000,
            'stock' => rand(0, 100),
            'category' => 'buah-buahan',
            'weight' => rand(1, 100),
            'supplier' => 'yande'
        ]);

        Product::create([
            'name' => 'Lada',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam similique repudiandae, totam, reprehenderit soluta quidem quam, praesentium velit dolore id ipsam veritatis. Sapiente, repellendus fugiat? Delectus minima dolorem tempore voluptatem.',
            'price' => rand(1, 100)*1000,
            'stock' => rand(0, 100),
            'category' => 'rempah-rempah',
            'weight' => rand(1, 100),
            'supplier' => 'yande'
        ]);

        Product::create([
            'name' => 'Beras',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam similique repudiandae, totam, reprehenderit soluta quidem quam, praesentium velit dolore id ipsam veritatis. Sapiente, repellendus fugiat? Delectus minima dolorem tempore voluptatem.',
            'price' => rand(1, 100)*1000,
            'stock' => rand(0, 100),
            'category' => 'biji-bijian',
            'weight' => rand(1, 100),
            'supplier' => 'hendra'
        ]);

        Product::create([
            'name' => 'Apel',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam similique repudiandae, totam, reprehenderit soluta quidem quam, praesentium velit dolore id ipsam veritatis. Sapiente, repellendus fugiat? Delectus minima dolorem tempore voluptatem.',
            'price' => rand(1, 100)*1000,
            'stock' => rand(0, 100),
            'category' => 'buah-buahan',
            'weight' => rand(1, 100),
            'supplier' => 'hendra'
        ]);

        Product::create([
            'name' => 'Jahe',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam similique repudiandae, totam, reprehenderit soluta quidem quam, praesentium velit dolore id ipsam veritatis. Sapiente, repellendus fugiat? Delectus minima dolorem tempore voluptatem.',
            'price' => rand(1, 100)*1000,
            'stock' => rand(0, 100),
            'category' => 'rempah-rempah',
            'weight' => rand(1, 100),
            'supplier' => 'gusari'
        ]);

        Product::create([
            'name' => 'Jeruk',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam similique repudiandae, totam, reprehenderit soluta quidem quam, praesentium velit dolore id ipsam veritatis. Sapiente, repellendus fugiat? Delectus minima dolorem tempore voluptatem.',
            'price' => rand(1, 100)*1000,
            'stock' => rand(0, 100),
            'category' => 'buah-buahan',
            'weight' => rand(1, 100),
            'supplier' => 'gusari'
        ]);

        Product::create([
            'name' => 'Kentang',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam similique repudiandae, totam, reprehenderit soluta quidem quam, praesentium velit dolore id ipsam veritatis. Sapiente, repellendus fugiat? Delectus minima dolorem tempore voluptatem.',
            'price' => rand(1, 100)*1000,
            'stock' => rand(0, 100),
            'category' => 'umbi-umbian',
            'weight' => rand(1, 100),
            'supplier' => 'indra'
        ]);

        Product::create([
            'name' => 'Beras Merah',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam similique repudiandae, totam, reprehenderit soluta quidem quam, praesentium velit dolore id ipsam veritatis. Sapiente, repellendus fugiat? Delectus minima dolorem tempore voluptatem.',
            'price' => rand(1, 100)*1000,
            'stock' => rand(0, 100),
            'category' => 'biji-bijian',
            'weight' => rand(1, 100),
            'supplier' => 'indra'
        ]);
    }
}

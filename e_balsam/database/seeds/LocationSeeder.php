<?php
use App\Models\Provinsi;
use App\Models\Kabupaten;
use App\Models\Kelurahan;
use App\Models\Kecamatan;
use Illuminate\Database\Seeder;

/**
 * LocationSeeder Models
 *
 * @author    Alfan Rlyanto ( alfan freeze@gmail.com )
 * @since     10/12/15
 * @category  Seeder
 * @version   1
 * @since     File available since Release 0.1
 * @copyright Copyright (c) 2015 Toruz.
 */
class LocationSeeder extends Seeder {

    public function run()
    {

         /**
         * Add default Data Provinsi
         */
        DB::table( 'loc_provinsi' )->delete();
        Provinsi::create( array( 
          'name'      => 'Kalimantan Timur'
        ));



        DB::table( 'loc_kabupaten' )->delete();
        Kabupaten::create( array( 
          'provinsi_id'  => 1,
          'name'         => 'Samarinda'
        ));
        Kabupaten::create( array( 
          'provinsi_id'  => 1,
          'name'         => 'Kutai Kartanegara'
        ));
        Kabupaten::create( array( 
          'provinsi_id'  => 1,
          'name'         => 'Balikpapan'
        ));



        DB::table( 'loc_kecamatan' )->delete();
        Kecamatan::create( array( 
          'kabupaten_id'  => 1,
          'name'               => 'Palaran'
        ));
        Kecamatan::create( array( 
          'kabupaten_id'  => 2,
          'name'               => 'Samboja'
        ));
        Kecamatan::create( array( 
          'kabupaten_id'  => 2,
          'name'               => 'Muara Jawa'
        ));
        Kecamatan::create( array( 
          'kabupaten_id'  => 3,
          'name'               => 'Balikpapan Timur'
        ));
        Kecamatan::create( array( 
          'kabupaten_id'  => 3,
          'name'               => 'Balikpapan Utara'
        ));



        DB::table( 'loc_kelurahan' )->delete();
        // Buat Base Kelurahan yg ada di Palaran
        Kelurahan::create( array( 
          'kecamatan_id'  => 1,
          'name'          => 'Simpang Pasir'
        ));
        Kelurahan::create( array( 
          'kecamatan_id'  => 1,
          'name'          => 'Handil Bakti'
        ));
        Kelurahan::create( array( 
          'kecamatan_id'  => 1,
          'name'          => 'Bantuas'
        ));

        // Buat Base Kelurahan yg ada di Samboja
        Kelurahan::create( array( 
          'kecamatan_id'  => 2,
          'name'          => 'Tani Bakti'
        ));
        Kelurahan::create( array( 
          'kecamatan_id'  => 2,
          'name'          => 'Karya Merdeka'
        ));
        Kelurahan::create( array( 
          'kecamatan_id'  => 2,
          'name'          => 'Sungai Merdeka'
        ));
        Kelurahan::create( array( 
          'kecamatan_id'  => 2,
          'name'          => 'Bukit Merdeka'
        ));

        // Buat Base Kelurahan yg ada di Muara Jawa
        Kelurahan::create( array( 
          'kecamatan_id'  => 3,
          'name'          => 'Teluk Dalam'
        ));

        // Buat Base Kelurahan yg ada di Balikpapan Timur
        Kelurahan::create( array( 
          'kecamatan_id'  => 4,
          'name'          => 'Manggar'
        ));
        // Buat Base Kelurahan yg ada di Balikpapan Utara
        Kelurahan::create( array( 
          'kecamatan_id'  => 5,
          'name'          => 'Karang Joang'
        ));
    }

}
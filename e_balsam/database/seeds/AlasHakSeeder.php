<?php
use App\Models\AlasHak;
use Illuminate\Database\Seeder;

/**
 * AlasHak Models
 *
 * @author    Alfan Rlyanto ( alfan freeze@gmail.com )
 * @since     10/12/15
 * @category  Seeder
 * @version   1
 * @since     File available since Release 0.1
 * @copyright Copyright (c) 2015 Toruz.
 */
class AlasHakSeeder extends Seeder {

    public function run()
    {

        /**
         * Add default Data AlasHak
         */
        DB::table( 'alas_hak' )->delete();
        AlasHak::create( array( 
          'name'      => 'Sertifikat'
        ));
        AlasHak::create( array( 
          'name'      => 'Girik'
        ));
        AlasHak::create( array( 
          'name'      => 'C Desa'
        ));
        AlasHak::create( array( 
          'name'      => 'Akta Jual Beli'
        ));
        AlasHak::create( array( 
          'name'      => 'APHB'
        ));
        AlasHak::create( array( 
          'name'      => 'Akta Hibah'
        ));
    }
}
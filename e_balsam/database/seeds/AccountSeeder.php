<?php
use App\Models\User;
use App\Models\Usergroup;
use Illuminate\Database\Seeder;

/**
 * AccountSeeder Models
 *
 * @author    Alfan Rlyanto ( alfan freeze@gmail.com )
 * @since     7/12/15
 * @category  Seeder
 * @version   1
 * @since     File available since Release 0.1
 * @copyright Copyright (c) 2015 Toruz.
 */
class AccountSeeder extends Seeder {

    public function run()
    {
        // Add Static Data Usergroup
        DB::table( 'usergroups' )->delete();

        $access_right = array();

        $access_right['administrator'] = array(
          'group'     => array(
            'c' => true,
            'r' => true,
            'u' => true,
            'd' => true
          ),
          'user'      => array(
            'c' => true,
            'r' => true,
            'u' => true,
            'd' => true
          ),
          'location'  => array(
            'c' => true,
            'r' => true,
            'u' => true,
            'd' => true
          ),
          'alas_hak'  => array(
            'c' => true,
            'r' => true,
            'u' => true,
            'd' => true
          ),
          'dpt'       => array(
            'c' => true,
            'r' => true,
            'u' => true,
            'd' => true
          )
        );

        $access_right['staff'] = array(
          'group'     => array(
            'c' => false,
            'r' => true,
            'u' => false,
            'd' => false
          ),
          'user'      => array(
            'c' => false,
            'r' => false,
            'u' => false,
            'd' => false
          ),
          'location'  => array(
            'c' => true,
            'r' => true,
            'u' => true,
            'd' => true
          ),
          'alas_hak'  => array(
            'c' => true,
            'r' => true,
            'u' => true,
            'd' => true
          ),
          'dpt'       => array(
            'c' => true,
            'r' => true,
            'u' => true,
            'd' => true
          )
        );

        $access_right['police maker'] = array(
          'group'     => array(
            'c' => false,
            'r' => false,
            'u' => false,
            'd' => false
          ),
          'user'      => array(
            'c' => false,
            'r' => false,
            'u' => false,
            'd' => false
          ),
          'location'  => array(
            'c' => false,
            'r' => true,
            'u' => false,
            'd' => false
          ),
          'alas_hak'  => array(
            'c' => false,
            'r' => true,
            'u' => false,
            'd' => false
          ),
          'dpt'       => array(
            'c' => false,
            'r' => true,
            'u' => false,
            'd' => false
          )
        );
        Usergroup::create( array( 
          'name' => 'Administrator', 
          'access_right' => json_encode( $access_right['administrator'] ) 
        ));
        Usergroup::create( array( 
          'name' => 'Staff', 
          'access_right' => json_encode( $access_right['staff'] ) 
        ));

        Usergroup::create( array( 
          'name' => 'Police Maker', 
          'access_right' => json_encode( $access_right['police maker'] ) 
        ));

        // Add default Admin username
        DB::table( 'users' )->delete();

        User::create( array(
                          'group_id'     => 1,
                          'email'        => 'admin@toruz-corp.com',
                          'password'     => Hash::make( 'toruz123rty' ),
                          'name'         => 'Administrator',
                          'avatar'       => Null,
                          'created_at'   => new DateTime,
                          'updated_at'   => new DateTime
                      ) );

        User::create( array(
                          'group_id'     => 2,
                          'email'        => 'staff@toruz-corp.com',
                          'password'     => Hash::make( 'toruz123rty' ),
                          'name'         => 'Staff Admin',
                          'avatar'       => Null,
                          'created_at'   => new DateTime,
                          'updated_at'   => new DateTime
                      ) );


    }

}
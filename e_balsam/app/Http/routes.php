<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

$router->get( '/', [
	'as' 	=> 'public.index',
	'uses'	=> 'PublicController@getIndex'
]);

$router->group(['prefix' => '/dashboard', 'middleware' => 'auth'], function ($router){
	
	$router->group( [ 'prefix' => 'bentuk-penggantian' ], function( $router )
		{
			$router->post( 'create', [
				'as'	=> 'bentuk.create',
				'uses'	=> 'Dashboard\PenggantianController@postCreate'
			]);

			$router->post( 'update/{data}', [
				'as'	=> 'bentuk.update',
				'uses'	=> 'Dashboard\PenggantianController@postUpdate'
			]);

			$router->get( 'delete/{data}', [
				'as'	=> 'bentuk.delete',
				'uses'	=> 'Dashboard\PenggantianController@getDelete'
			]);

			$router->get( '/', [
				'as'	=> 'bentuk',
				'uses'	=> 'Dashboard\PenggantianController@getIndex'
			]);
		}
	);

	$router->group( [ 'prefix' => 'jenis-penggantian' ], function( $router )
		{
			$router->post( 'create', [
				'as'	=> 'jenis.create',
				'uses'	=> 'Dashboard\PenggantianController@postCreate'
			]);

			$router->post( 'update/{data}', [
				'as'	=> 'jenis.update',
				'uses'	=> 'Dashboard\PenggantianController@postUpdate'
			]);

			$router->get( 'delete/{data}', [
				'as'	=> 'jenis.delete',
				'uses'	=> 'Dashboard\PenggantianController@getDelete'
			]);

			$router->get( '/', [
				'as'	=> 'jenis',
				'uses'	=> 'Dashboard\PenggantianController@getIndex'
			]);
		}
	);

	$router->group( [ 'prefix' => 'apl' ], function( $router )
		{
			$router->post( 'create/{id?}', [
				'as'	=> 'apl.create',
				'uses'	=> 'Dashboard\AplController@postCreate'
			]);

			$router->post( 'update/{data}', [
				'as'	=> 'apl.update',
				'uses'	=> 'Dashboard\AplController@postUpdate'
			]);

			$router->get( 'delete/{data}', [
				'as'	=> 'apl.delete',
				'uses'	=> 'Dashboard\AplController@getDelete'
			]);

			$router->get( '/create-upload/{id}', [
		 		'as'	=> 'apl.upload',
		 		'uses'	=> 'Dashboard\AplController@getUpload'
		 	]);

		 	$router->post( '/create-upload/{id}/{path}', [
		 		'as'	=> 'apl.upload.post',
		 		'uses'	=> 'Dashboard\AplController@uploadFile'
		 	]);

		 	$router->get( 'delete-image/{id}', [
				'as' 	=> 'apl.image.delete',
				'uses'	=> 'Dashboard\AplController@deleteImage'
			]);

			$router->get( '/', [
				'as'	=> 'apl.index',
				'uses'	=> 'Dashboard\AplController@getIndex'
			]);
		}
	);

	$router->group( [ 'prefix' => 'uacl' ], function($router)
        {
        	$router->group( [ 'prefix' => 'user' ], function($router)
        		{	
					$router->get( '/create', [
						'as' 	=> 'uacl.user.create',
						'uses'	=> 'UACL\UserController@getCreate'
					]);

					$router->post( '/create', [
						'as' 	=> 'uacl.user.create.post',
						'uses'	=> 'UACL\UserController@postCreate'
					]);

					$router->get( '/update/{id}', [
						'as' 	=> 'uacl.user.update',
						'uses'	=> 'UACL\UserController@getUpdate'
					]);

					$router->post( '/update/{id}', [
						'as' 	=> 'uacl.user.update.post',
						'uses'	=> 'UACL\UserController@postUpdate'
					]);

					$router->get( '/delete/{id}', [
						'as' 	=> 'uacl.user.delete',
						'uses'	=> 'UACL\UserController@getDelete'
					]);

					$router->get( '/delete-post/{id}', [
						'as' 	=> 'uacl.user.delete.post',
						'uses'	=> 'UACL\UserController@doDelete'
					]);

					$router->get( '/', [
						'as' 	=> 'uacl.user.index',
						'uses'	=> 'UACL\UserController@getIndex'
					]);
					
				}
			);
			$router->group( [ 'prefix' => 'usergroup' ], function($router)
        		{	
        			$router->get( '/access/{id}', [
						'as' 	=> 'uacl.group.access',
						'uses'	=> 'UACL\GroupController@getAccess'
					]);

					$router->post( '/access/{id}', [
						'as' 	=> 'uacl.group.access.post',
						'uses'	=> 'UACL\GroupController@postAccess'
					]);

					$router->get( '/create', [
						'as' 	=> 'uacl.group.create',
						'uses'	=> 'UACL\GroupController@getCreate'
					]);

					$router->post( '/create', [
						'as' 	=> 'uacl.group.create.post',
						'uses'	=> 'UACL\GroupController@postCreate'
					]);

					$router->get( '/update/{id}', [
						'as' 	=> 'uacl.group.update',
						'uses'	=> 'UACL\GroupController@getUpdate'
					]);

					$router->post( '/update/{id}', [
						'as' 	=> 'uacl.group.update.post',
						'uses'	=> 'UACL\GroupController@postUpdate'
					]);

					$router->get( '/delete/{id}', [
						'as' 	=> 'uacl.group.delete',
						'uses'	=> 'UACL\GroupController@getDelete'
					]);

					$router->get( '/delete-post/{id}', [
						'as' 	=> 'uacl.group.delete.post',
						'uses'	=> 'UACL\GroupController@doDelete'
					]);

					$router->get( '/', [
						'as' 	=> 'uacl.group.index',
						'uses'	=> 'UACL\GroupController@getIndex'
					]);
					
				}
			);

		}
	);
	
	$router->group( [ 'prefix' => 'DPT' ], function($router) 
		{
			$router->get( '/', [
				'as'	=> 'dpt.index',
				'uses'	=> 'Dashboard\DPTController@getIndex'
			]);

			$router->get( '/data', [
				'as'	=> 'dpt.data',
				'uses'	=> 'Dashboard\DPTController@getData'
			]);

			$router->get( '/create', [
				'as'	=> 'dpt.create',
				'uses'	=> 'Dashboard\DPTController@getCreate'
			]);

			$router->post( '/create', [
				'as'	=> 'dpt.create.post',
				'uses'	=> 'Dashboard\DPTController@postCreate'
			]);

			$router->get( '/create-upload/{id}', [
				'as'	=> 'dpt.create.upload',
				'uses'	=> 'Dashboard\DPTController@getCreateUpload'
			]);

			$router->get( '/detail/{id}', [
				'as'	=> 'dpt.detail',
				'uses'	=> 'Dashboard\DPTController@getDetail'
			]);

			$router->get( '/update/{id}', [
				'as'	=> 'dpt.update',
				'uses'	=> 'Dashboard\DPTController@getUpdate'
			]);

			$router->post( 'update/{id}', [
				'as'	=> 'dpt.update.post',
				'uses'	=> 'Dashboard\DPTController@postUpdate'
			]);

			$router->post( '/upload/{id}', [
				'as'	=> 'dpt.upload',
				'uses'	=> 'Dashboard\DPTController@uploadFile'
			]);

			$router->get( '/img-del/{path}', [
				'as'	=> 'dpt.img.del',
				'uses'	=> 'Dashboard\DPTController@getDelImg'
			]);

			$router->get( '/delete/{id}', [
				'as'	=> 'dpt.delete',
				'uses'	=> 'Dashboard\DPTController@getDelete'
			]);
		}
	);

	$router->group( [ 'prefix' => 'location' ], function($router) 
		{
			$router->get( 'detail/{data}', [
				'as'	=> 'location.detail',
				'uses'	=> 'Dashboard\LocationController@getDetail'
			]);

			$router->post( 'create/{id?}', [
				'as'	=> 'location.create',
				'uses'	=> 'Dashboard\LocationController@postCreate'
			]);

			$router->post( 'update/{data}', [
				'as'	=> 'location.update',
				'uses'	=> 'Dashboard\LocationController@postUpdate'
			]);

			$router->get( 'delete/{data}', [
				'as'	=> 'location.delete',
				'uses'	=> 'Dashboard\LocationController@getDelete'
			]);

			$router->get( '/', [
				'as'	=> 'location',
				'uses'	=> 'Dashboard\LocationController@getIndex'
			]);
		}
	);

	$router->group( [ 'prefix' => 'alas-hak' ], function( $router )
		{
			$router->post( 'create/{id?}', [
				'as'	=> 'alashak.create',
				'uses'	=> 'Dashboard\AlasHakController@postCreate'
			]);

			$router->post( 'update/{data}', [
				'as'	=> 'alashak.update',
				'uses'	=> 'Dashboard\AlasHakController@postUpdate'
			]);

			$router->get( 'delete/{data}', [
				'as'	=> 'alashak.delete',
				'uses'	=> 'Dashboard\AlasHakController@getDelete'
			]);

			$router->get( '/', [
				'as'	=> 'alashak',
				'uses'	=> 'Dashboard\AlasHakController@getIndex'
			]);
		}
	);

	$router->group( [ 'prefix' => 'notulen' ], function( $router )
		{
		 	$router->post( '/create', [
		 		'as'	=> 'notulen.post',
		 		'uses'	=> 'Dashboard\NotulenController@postCreate'
		 	]);

		 	$router->get( '/create-upload/{id}', [
		 		'as'	=> 'notulen.upload',
		 		'uses'	=> 'Dashboard\NotulenController@getUpload'
		 	]);

		 	$router->post( '/create-upload/{id}/{path}', [
		 		'as'	=> 'notulen.upload.post',
		 		'uses'	=> 'Dashboard\NotulenController@uploadFile'
		 	]);

		 	$router->post( 'update/{id}', [
		 		'as'	=> 'notulen.update.post',
		 		'uses'	=> 'Dashboard\NotulenController@postUpdate'
		 	]);

		 	$router->get( 'delete-image/{id}', [
				'as' 	=> 'notulen.image.delete',
				'uses'	=> 'Dashboard\NotulenController@deleteImageNotulen'
			]);

			$router->get( 'delete/{id}', [
				'as' 	=> 'notulen.delete',
				'uses'	=> 'Dashboard\NotulenController@deleteNotulen'
			]);

		 	$router->get( '/', [
				'as'	=> 'notulen',
				'uses'	=> 'Dashboard\NotulenController@getIndex'
			]);
		}
	);

	$router->group( [ 'prefix' => 'surat-keputusan' ], function( $router ){
		$router->group( [ 'prefix' => 'peraturan' ], function( $router ){
		 	$router->post( '/create', [
		 		'as'	=> 'peraturan.create.post',
		 		'uses'	=> 'Dashboard\SuratKeputusan\PeraturanController@postCreate'
		 	]);

		 	$router->post( '/update/{id}', [
		 		'as'	=> 'peraturan.update.post',
		 		'uses'	=> 'Dashboard\SuratKeputusan\PeraturanController@postUpdate'
		 	]);

		 	$router->get( 'delete/{id}', [
				'as' 	=> 'peraturan.delete',
				'uses'	=> 'Dashboard\SuratKeputusan\PeraturanController@doDelete'
			]);

			$router->group( [ 'prefix' => 'images' ], function( $router ){
				$router->get( 'create/{id}', [
			 		'as'	=> 'peraturan.images',
			 		'uses'	=> 'Dashboard\SuratKeputusan\PeraturanController@getUpload'
			 	]);

			 	$router->post( 'create/{id}/{path}', [
			 		'as'	=> 'peraturan.images.post',
			 		'uses'	=> 'Dashboard\SuratKeputusan\PeraturanController@uploadFile'
			 	]);

			 	$router->get( 'delete/{id}', [
					'as' 	=> 'peraturan.image.delete',
					'uses'	=> 'Dashboard\SuratKeputusan\PeraturanController@deleteImage'
				]);
			});

		 	$router->get( '/', [
				'as'	=> 'peraturan.index',
				'uses'	=> 'Dashboard\SuratKeputusan\PeraturanController@getIndex'
			]);
		});
		$router->group( [ 'prefix' => 'tugas' ], function( $router ){
			$router->post( '/create', [
		 		'as'	=> 'tugas.create.post',
		 		'uses'	=> 'Dashboard\SuratKeputusan\TugasController@postCreate'
		 	]);

		 	$router->post( '/update/{id}', [
		 		'as'	=> 'tugas.update.post',
		 		'uses'	=> 'Dashboard\SuratKeputusan\TugasController@postUpdate'
		 	]);

		 	$router->get( 'delete/{id}', [
				'as' 	=> 'tugas.delete',
				'uses'	=> 'Dashboard\SuratKeputusan\TugasController@doDelete'
			]);

			$router->group( [ 'prefix' => 'images' ], function( $router ){
				$router->get( 'create/{id}', [
			 		'as'	=> 'tugas.images',
			 		'uses'	=> 'Dashboard\SuratKeputusan\TugasController@getUpload'
			 	]);

			 	$router->post( 'create/{id}/{path}', [
			 		'as'	=> 'tugas.images.post',
			 		'uses'	=> 'Dashboard\SuratKeputusan\TugasController@uploadFile'
			 	]);

			 	$router->get( 'delete/{id}', [
					'as' 	=> 'tugas.image.delete',
					'uses'	=> 'Dashboard\SuratKeputusan\TugasController@deleteImage'
				]);
			});
			
		 	$router->get( '/', [
				'as'	=> 'tugas.index',
				'uses'	=> 'Dashboard\SuratKeputusan\TugasController@getIndex'
			]);
		});
		$router->group( [ 'prefix' => 'uu' ], function( $router ){
			$router->post( '/create', [
		 		'as'	=> 'uu.create.post',
		 		'uses'	=> 'Dashboard\SuratKeputusan\UndangUndangController@postCreate'
		 	]);

		 	$router->post( '/update/{id}', [
		 		'as'	=> 'uu.update.post',
		 		'uses'	=> 'Dashboard\SuratKeputusan\UndangUndangController@postUpdate'
		 	]);

		 	$router->get( 'delete/{id}', [
				'as' 	=> 'uu.delete',
				'uses'	=> 'Dashboard\SuratKeputusan\UndangUndangController@doDelete'
			]);

			$router->group( [ 'prefix' => 'images' ], function( $router ){
				$router->get( 'create/{id}', [
			 		'as'	=> 'uu.images',
			 		'uses'	=> 'Dashboard\SuratKeputusan\UndangUndangController@getUpload'
			 	]);

			 	$router->post( 'create/{id}/{path}', [
			 		'as'	=> 'uu.images.post',
			 		'uses'	=> 'Dashboard\SuratKeputusan\UndangUndangController@uploadFile'
			 	]);

			 	$router->get( 'delete/{id}', [
					'as' 	=> 'uu.image.delete',
					'uses'	=> 'Dashboard\SuratKeputusan\UndangUndangController@deleteImage'
				]);
			});
			
		 	$router->get( '/', [
				'as'	=> 'uu.index',
				'uses'	=> 'Dashboard\SuratKeputusan\UndangUndangController@getIndex'
			]);
		});
	});

	$router->group( [ 'prefix' => 'CMS' ], function( $router ) 
		{
			$router->group( [ 'prefix' => 'banner' ], function($router)
        		{	
					$router->post( '/', [
						'as' 	=> 'cms.banner.post',
						'uses'	=> 'Dashboard\CMSController@postBanner'
					]);

					$router->get( '/{id}', [
						'as' 	=> 'cms.banner.delete',
						'uses'	=> 'Dashboard\CMSController@deleteBanner'
					]);

					$router->post( '/{id}', [
						'as' 	=> 'cms.banner.update',
						'uses'	=> 'Dashboard\CMSController@updateBanner'
					]);
					
				}
			);

			$router->group( [ 'prefix' => 'agenda' ], function($router)
        		{	
					$router->post( '/', [
						'as' 	=> 'cms.agenda.post',
						'uses'	=> 'Dashboard\CMSController@postAgenda'
					]);

					$router->get( '/{id}', [
						'as' 	=> 'cms.agenda.delete',
						'uses'	=> 'Dashboard\CMSController@deleteAgenda'
					]);

					$router->post( '/{id}', [
						'as' 	=> 'cms.agenda.update',
						'uses'	=> 'Dashboard\CMSController@updateAgenda'
					]);
					
				}
			);

			$router->group( [ 'prefix' => 'about' ], function($router)
        		{	
					$router->post( '/{id}', [
						'as' 	=> 'cms.about.update',
						'uses'	=> 'Dashboard\CMSController@updateAbout'
					]);

					$router->post( '/', [
						'as' 	=> 'cms.about.post',
						'uses'	=> 'Dashboard\CMSController@postAbout'
					]);
					
				}
			);

			$router->get( '/', [
				'as'	=> 'cms',
				'uses'	=> 'Dashboard\CMSController@getIndex'
			]);
		}
	);

	$router->group( [ 'prefix' => 'laporan' ], function( $router )  
		{
			$router->get( '/progress', [
				'as'	=> 'progress',
				'uses'	=> 'Dashboard\LaporanController@getIndex'
			]);

			$router->get( '/rekapitulasi', [
				'as'	=> 'rekap',
				'uses'	=> 'Dashboard\RekapController@getIndex'
			]);

			$router->group( [ 'prefix' => 'permasalahan' ], function( $router )
				{
					$router->post( '/create', [
						'as'	=> 'permasalahan.create',
						'uses'	=> 'Dashboard\MasalahController@postCreate'
					]);

					$router->get( '/create-upload/{id}', [
				 		'as'	=> 'permasalahan.upload',
				 		'uses'	=> 'Dashboard\MasalahController@getDetail'
				 	]);

				 	$router->post( '/create-upload/{id}/{path}', [
				 		'as'	=> 'permasalahan.upload.post',
				 		'uses'	=> 'Dashboard\MasalahController@uploadFile'
				 	]);

				 	$router->get( 'delete-image/{id}', [
						'as' 	=> 'permasalahan.image.delete',
						'uses'	=> 'Dashboard\MasalahController@deleteImage'
					]);

					$router->post( '/update/{id}', [
						'as'	=> 'permasalahan.update',
						'uses'	=> 'Dashboard\MasalahController@postUpdate'
					]);

					$router->get( '/delete/{id}', [
						'as'	=> 'permasalahan.delete',
						'uses'	=> 'Dashboard\MasalahController@getDelete'
					]);

					$router->get( '/detail/{id}', [
						'as'	=> 'permasalahan.detail',
						'uses'	=> 'Dashboard\MasalahController@getdetail'
					]);

					$router->get( '/', [
						'as'	=> 'permasalahan.index',
						'uses'	=> 'Dashboard\MasalahController@getIndex'
					]);
				} 
			);
		}
	);

	$router->group( [ 'prefix' => 'map' ], function( $router ){
		$router->get('/data', [ 
			'as' => 'system.map.data', 
			'uses'=> 'Dashboard\MapController@getMap'
		]);

		$router->get('/', [ 
			'as' => 'system.map', 
			'uses'=> 'Dashboard\MapController@getIndex'
		]);
	});
	
	$router->group( [ 'prefix' => '/' ], function( $router )
		{
			$router->post( '/create', [
				'as'	=> 'dashboard.create',
				'uses'	=> 'Dashboard\DashboardController@postCreate'
			]);

			$router->get( '/create-upload/{id}', [
		 		'as'	=> 'dashboard.upload',
		 		'uses'	=> 'Dashboard\DashboardController@getDetail'
		 	]);

		 	$router->post( '/create-upload/{id}/{path}', [
		 		'as'	=> 'dashboard.upload.post',
		 		'uses'	=> 'Dashboard\DashboardController@uploadFile'
		 	]);

		 	$router->get( 'delete-image/{id}', [
				'as' 	=> 'dashboard.image.delete',
				'uses'	=> 'Dashboard\DashboardController@deleteImage'
			]);

			$router->post( '/update/{id}', [
				'as'	=> 'dashboard.update',
				'uses'	=> 'Dashboard\DashboardController@postUpdate'
			]);

			$router->get( '/delete/{id}', [
				'as'	=> 'dashboard.delete',
				'uses'	=> 'Dashboard\DashboardController@getDelete'
			]);

			$router->get( '/detail/{id}', [
				'as'	=> 'dashboard.detail',
				'uses'	=> 'Dashboard\DashboardController@getdetail'
			]);

			$router->get( '/', [
				'as'	=> 'system.index',
				'uses'	=> 'Dashboard\DashboardController@getIndex'
			]);
		} 
	);
});

$router->controllers([
 	'auth' => 'Auth\AuthController',
 	'password' => 'Auth\PasswordController',
]);
<?php
namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Pemohon;
use App\Models\Tanah;
use App\Models\Kabupaten;
use App\Models\APL;
use Auth, Redirect;
use App\Http\Controllers\Dashboard\LaporanController as Laporan;

class RekapController extends Controller
{
	
	function __construct()
	{
		$this->auth 	= Auth::user();
	}

	public function getIndex(){
		$data ['me']	= $this->auth;			
		$data ['title']	= "E-Balsam | Rekapitulasi";

		$data ['balsam']['bidang'] 	 	= $this->bidang();
		$data ['balsam']['luas'] 	 	= $this->luas();
		$data ['balsam']['anggaran'] 	= $this->anggaran();

		$data ['balsam']['tahun'] = array(
			'bidang' 	=> $this->build('bidang'),
			'luas' 		=> $this->build('luas'),
			'anggaran' 	=> $this->build('anggaran')
		);

		$data ['samarinda']['bidang'] 	 = $this->bidang(null, 1);
 		$data ['samarinda']['luas'] 	 = $this->luas(null, 1);
 		$data ['samarinda']['anggaran']  = $this->anggaran(null, 1);
 		
 		$data ['samarinda']['tahun'] = array(
			'bidang' 	=> $this->build('bidang', 1),
			'luas' 		=> $this->build('luas', 1),
			'anggaran' 	=> $this->build('anggaran', 1)
		);

 		$data ['kutai']['bidang'] 		 = $this->bidang(null, 2);
 		$data ['kutai']['luas'] 		 = $this->luas(null, 2);
 		$data ['kutai']['anggaran'] 	 = $this->anggaran(null, 2);
 		
 		$data ['kutai']['tahun'] = array(
			'bidang' 	=> $this->build('bidang', 2),
			'luas' 		=> $this->build('luas', 2),
			'anggaran' 	=> $this->build('anggaran', 2)
		);

		$data ['balikpapan']['bidang'] 	 = $this->bidang(null, 3);
		$data ['balikpapan']['luas'] 	 = $this->luas(null, 3);
		$data ['balikpapan']['anggaran'] = $this->anggaran(null, 3);

		$data ['balikpapan']['tahun'] = array(
			'bidang' 	=> $this->build('bidang', 3),
			'luas' 		=> $this->build('luas', 3),
			'anggaran' 	=> $this->build('anggaran', 3)
		);

		$data['apl']['balsam'] 		= $this->instational();
		$data['apl']['balsam']['tahun'] 	 = array(
			'bidang' 	=> $this->build('bidang', null, 'all'),
			'luas' 		=> $this->build('luas', null, 'all'),
			'anggaran' 	=> $this->build('anggaran', null, 'all')
		);
		$data['apl']['samarinda'] 	= $this->instational(1 /*kabupaten_id*/);
		$data['apl']['samarinda']['tahun'] 	 = array(
			'bidang' 	=> $this->build('bidang', null, 1),
			'luas' 		=> $this->build('luas', null, 1),
			'anggaran' 	=> $this->build('anggaran', null, 1)
		);
		$data['apl']['kutai'] 		= $this->instational(2 /*kabupaten_id*/);
		$data['apl']['kutai']['tahun'] 	 = array(
			'bidang' 	=> $this->build('bidang', null, 2),
			'luas' 		=> $this->build('luas', null, 2),
			'anggaran' 	=> $this->build('anggaran', null, 2)
		);
		$data['apl']['balikpapan'] 	= $this->instational(3 /*kabupaten_id*/);
		$data['apl']['balikpapan']['tahun'] 	 = array(
			'bidang' 	=> $this->build('bidang', null, 3),
			'luas' 		=> $this->build('luas', null, 3),
			'anggaran' 	=> $this->build('anggaran', null, 3)
		);
		// dd($data);
		return view( 'admin.laporan.rekap', $data );
	}

	/**
	 * $daerah = loc_kabupaten.id ( null = 'balsam', 2 = 'kutai', 1 = 'samarinda', 3 = 'balikpapan' )
	 */
	function instational( $daerah = null ){
		$luas 		= array();
		$anggaran 	= array();
		if ( $daerah ) {
			$_luas 		= APL::where( 'kawasan', $daerah )->select('luas_terkena_tol')->get()->toArray();
			$_anggaran 	= APL::where( 'kawasan', $daerah )->select('nilai_pergantian', 'nilai_ganti_bangunan', 'nilai_ganti_tanaman')->get()->toArray();
		} else {
			$_luas 		= APL::select('luas_terkena_tol')->get()->toArray();
			$_anggaran 	= APL::select('nilai_pergantian', 'nilai_ganti_bangunan', 'nilai_ganti_tanaman')->get()->toArray();
		}
		foreach ($_luas as $key => $value) {
			array_push($luas, $value['luas_terkena_tol']);
		}
		foreach ($_anggaran as $key => $value) {
			array_push($anggaran, $value['nilai_pergantian']);
			array_push($anggaran, $value['nilai_ganti_bangunan']);
			array_push($anggaran, $value['nilai_ganti_tanaman']);
		}
		$data['bidang'] 	= count($_luas);
		$data['luas'] 	 	= array_sum($luas);
		$data['anggaran'] 	= array_sum( $anggaran );
		

		return $data;
	}

	function build( $data, $id = null, $is_apl = null ){
		$array = array();
		if ( $is_apl ) {
			$function = ($this->$data(true, null, $is_apl ) != 0)?$this->$data(true, null, $is_apl ):[];
		} else {
			$function = ($this->$data(true, $id ) != 0)?$this->$data(true, $id ):[];
		}
		foreach ( $function as $tahun => $$data) {
			$value = ['tahun'=>$tahun, $data => $$data];
			array_push($array, $value);
		}
		return $array;
	}

	function bidang( $tahun = null, $daerah = null, $is_apl = null ){
		if ( $is_apl ) {
			if ( $is_apl == 'all' ) {
				$tanah = APL::select('tanggal_pergantian')->OrderBy('tanggal_pergantian', 'ASC')->get()->toArray();
			} else {
				$tanah = APL::where('kawasan', $is_apl)->select('tanggal_pergantian')->OrderBy('tanggal_pergantian', 'ASC')->get()->toArray();
			}
			$i = 0;
			foreach ($tanah as $data) {
				$bidang[$i] = explode( '-' , $data['tanggal_pergantian'])[0];
				$i++;
			}
			$tanah = ( !empty( $tanah ) )?array_count_values($bidang):0;
		}
		if ( $tahun && $daerah == null && $is_apl == null ) {
			$tanah = Tanah::select('tanggal_pembayaran')->OrderBy('tanggal_pembayaran', 'ASC')->get()->toArray();
			$i = 0;
			foreach ($tanah as $data) {
				$bidang[$i] = explode( '-' , $data['tanggal_pembayaran'])[0];
				$i++;
			}
			$tanah = ( !empty( $tanah ) )?array_count_values($bidang):0;
		} elseif($tahun == null && $daerah == null && $is_apl == null ) {
			$tanah = count(Tanah::all());
		}

		if ( $tahun && $daerah && $is_apl == null ) {
			$tanah = Tanah::where( 'kabupaten_id', $daerah )->select('tanggal_pembayaran')->OrderBy('tanggal_pembayaran', 'ASC')->get()->toArray();
			$i = 0;
			foreach ($tanah as $data) {
				$bidang[$i] = explode( '-' , $data['tanggal_pembayaran'])[0];
				$i++;
			}
			$tanah = ( !empty( $tanah ) )?array_count_values($bidang):0;
		} elseif($tahun == null && $daerah&& $is_apl == null  ) {
			$tanah = count(Tanah::where( 'kabupaten_id', $daerah )->get());
		}

		return $tanah;
	}

	function luas( $tahun = null, $daerah = null, $is_apl = null ){
		if ( $is_apl ) {
			if ( $is_apl == 'all' ) {
				$tanah = APL::OrderBy('tanggal_pergantian', 'ASC')->get()->toArray();
				$result = $this->calculate( $tanah, 'luas_terkena_tol', true );
			} else {
				$tanah = APL::where('kawasan', $is_apl)->OrderBy('tanggal_pergantian', 'ASC')->get()->toArray();
				$result = $this->calculate( $tanah, 'luas_terkena_tol', true );
			}
			$i = 0;
			foreach ($tanah as $data) {
				$bidang[$i] = explode( '-' , $data['tanggal_pergantian'])[0];
				$i++;
			}
		}
		if ( $tahun && $daerah == null && $is_apl == null) {
			$tanah = Tanah::select('tanggal_pembayaran', 'luas_terkena')->OrderBy('tanggal_pembayaran', 'ASC')->get()->toArray();
			$result = $this->calculate( $tanah, 'luas_terkena' );
		} elseif( $tahun == null && $daerah == null && $is_apl == null ) {
			$luas = Tanah::select('luas_terkena')->get()->toArray();

			$i = 0;
			foreach ($luas as $data) {
				$bidang[$i] = (int)$data['luas_terkena'];
				$i++;
			}
			$result =  ( !empty( $luas ) )?array_sum($bidang):0;
		}

		if ( $tahun && $daerah && $is_apl == null) {
			$tanah = Tanah::where( 'kabupaten_id', $daerah )->select('tanggal_pembayaran', 'luas_terkena')->OrderBy('tanggal_pembayaran', 'ASC')->get()->toArray();
			$result = $this->calculate( $tanah, 'luas_terkena' );
		} elseif( $tahun == null && $daerah && $is_apl == null) {
			$luas = Tanah::where( 'kabupaten_id', $daerah )->select('luas_terkena')->get()->toArray();
			
			$i = 0;
			foreach ($luas as $data) {
				$bidang[$i] = (int)$data['luas_terkena'];
				$i++;
			}
			$result = ( !empty( $luas ) )? array_sum($bidang) : 0;
		}

		return $result;
	}

	function anggaran( $tahun = null, $daerah = null, $is_apl = null ){
		if ( $is_apl ) {
			if ( $is_apl == 'all' ) {
				$tanah = APL::OrderBy('tanggal_pergantian', 'ASC')->get()->toArray();
			} else {
				$tanah = APL::where('kawasan', $is_apl)->OrderBy('tanggal_pergantian', 'ASC')->get()->toArray();
			}
			// dd($tanah);
			// $ganti 	= $tanah['nilai_pergantian'] + $tanah['nilai_ganti_bangunan'] + $tanah['nilai_ganti_tanaman'];
			$result = $this->calculate( $tanah, ['nilai_pergantian', 'nilai_ganti_bangunan', 'nilai_ganti_tanaman'], true );
			$i = 0;
			foreach ($tanah as $data) {
				$bidang[$i] = explode( '-' , $data['tanggal_pergantian'])[0];
				$i++;
			}
		}
		if ($tahun && $daerah == null && $is_apl == null) {
			$tanah  = Tanah::select('tanggal_pembayaran', 'total_ganti_rugi')->OrderBy('tanggal_pembayaran', 'ASC')->get()->toArray();
			$result = $this->calculate( $tanah, 'total_ganti_rugi' );
		} elseif($tahun == null && $daerah == null  && $is_apl == null) {
			$tanah = Tanah::all()->toArray();
			foreach ($tanah as $anggaran) {
				$total[] = $anggaran['total_ganti_rugi'];
			}
			$result = (!empty( $tanah ))?array_sum($total):0;
		}

		if ($tahun && $daerah && $is_apl == null) {
			$tanah  = Tanah::where( 'kabupaten_id', $daerah )->select('tanggal_pembayaran', 'total_ganti_rugi')->OrderBy('tanggal_pembayaran', 'ASC')->get()->toArray();
			$result = $this->calculate( $tanah, 'total_ganti_rugi' );
		} elseif($tahun == null && $daerah && $is_apl == null) {
			$tanah = Tanah::where( 'kabupaten_id', $daerah )->get()->toArray();
			
			foreach ($tanah as $anggaran) {
				$total[] = $anggaran['total_ganti_rugi'];
			}
			
			$result = ( !empty( $tanah ) )? array_sum($total) : 0;
		}

		return $result;
	}

	function calculate( $query, $field, $is_apl = null ){
		$i = 0;
		$real = array();
		foreach ($query as $data) {
			if ( $is_apl ) {
				$bidang[$i]['tahun'] 	= explode( '-' , $data['tanggal_pergantian'])[0];
			} else {
				$bidang[$i]['tahun'] 	= explode( '-' , $data['tanggal_pembayaran'])[0];
			}

			if ( is_array( $field ) ) {
				$z = 0;
				foreach ($field as $count_please) {
					$z	= $data[ $count_please ] + $z;
				}
				$bidang[$i]['luas'] = $z;
			} else {
				$bidang[$i]['luas']		= $data[ $field ];
			}

			if ( !isset( $real[$bidang[$i]['tahun']] ) ) {
				$real[$bidang[$i]['tahun']] = (int) $bidang[$i]['luas'];
			} else {
				$real[$bidang[$i]['tahun']] = (int) $real[$bidang[$i]['tahun']] + $bidang[$i]['luas'];
			}
			$i++;
		}
		return $real;
	}
}

<?php
namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Pemohon;
use App\Models\Tanah;
use App\Models\Kabupaten;
use App\Models\APL;
use Auth, Redirect;

class LaporanController extends Controller
{
	
	function __construct()
	{
		$this->auth = Auth::user();
		$this->rekap = array(
			'kurva' => $this->kurva(),
			'chart' => $this->chart(),
			'pie' 	=> $this->pie()
		);
	}

	public function getIndex(){
		$data ['kurva'] 	= $this->kurva()['dpt'];
		$data ['apl_kurva'] = $this->kurva()['apl'];
		$data ['all'] 		= $this->kurva()['all'];
		$data ['all_kurva']	= [];
		for ($i=0; $i < count( $data ['all'] ); $i++) { 
			$data['all_kurva'][$i] = array();
			$data['all_kurva'][$i]['kota'] = $data['all'][$i]['kota'];
			for ($a=0; $a < count($data['all'][$i]['data']); $a++) {
				$data['all_kurva'][$i]["data"][$a] = array();

				$data['all_kurva'][$i]["data"][$a]['tahun'] = array_keys($data['all'][$i]['data'])[$a];
				$data['all_kurva'][$i]["data"][$a]['data']	= $data['all'][$i]['data'][array_keys($data['all'][$i]['data'])[$a]];
			}
		}
		
		$data ['chart'] 	= $this->chart();
		$data ['chart_all'] = $this->chart()['all'];
		$data ['chart']['all']	= [];
		for ($i=0; $i < count( $data ['chart_all'] ); $i++) { 
			$data['chart']['all'][$i] = array();
			$data['chart']['all'][$i]['kota'] = $data['chart_all'][$i]['kota'];
			for ($a=0; $a < count($data['chart_all'][$i]['data']); $a++) {
				$data['chart']['all'][$i]["data"][$a] = array();

				$data['chart']['all'][$i]["data"][$a]['tahun'] = array_keys($data['chart_all'][$i]['data'])[$a];
				$data['chart']['all'][$i]["data"][$a]['data']	= $data['chart_all'][$i]['data'][array_keys($data['chart_all'][$i]['data'])[$a]];
			}
		}
		// dd( $data ['chart'] );
		$data ['pie'] 		= $this->pie();
		$data ['me']		= $this->auth;			
		$data ['title']		= "E-Balsam | Laporan";
		return view( 'admin.laporan.progress', $data );
	}

	public function kurva(){
		$kota		= Kabupaten::all();
		$count 		= count( $kota );
		for ($i=0; $i < $count; $i++) { 
			$data['dpt'][$i][$kota[$i]->name] = Tanah::where( 'kabupaten_id', $kota[$i]->id )->select('tanggal_pembayaran')->OrderBy('tanggal_pembayaran', 'ASC')->get()->toArray();
			$data['apl'][$i][$kota[$i]->name] = APL::where( 'kawasan', $kota[$i]->id )->select('tanggal_pergantian')->OrderBy('tanggal_pergantian', 'ASC')->get()->toArray();
			
			switch ( $kota[$i]->name ) {
				case 'Samarinda':
					$namkot = 'samarinda';
					break;
				case 'Balikpapan':
					$namkot = 'balikpapan';
					break;
				case 'Kutai Kartanegara':
					$namkot = 'kutai';
					break;
			}
			
			for ($a=0; $a < count($data['dpt'][$i][$kota[$i]->name]); $a++) { 
				$tahun[$kota[$i]->name][$a] = explode('-', $data['dpt'][$i][$kota[$i]->name][$a]['tanggal_pembayaran'])[0];
			}
			for ($a=0; $a < count($data['apl'][$i][$kota[$i]->name]); $a++) { 
				$apl_tahun[$kota[$i]->name][$a] = explode('-', $data['apl'][$i][$kota[$i]->name][$a]['tanggal_pergantian'])[0];
			}
			$_data[$namkot] = (isset($tahun[$kota[$i]->name]))? array_count_values( $tahun[$kota[$i]->name] ) :null;
			$_apl_data[$namkot] = (isset($apl_tahun[$kota[$i]->name]))? array_count_values( $apl_tahun[$kota[$i]->name] ) :null;

			for ($c=0; $c < count($_data[$namkot]); $c++) { 
				$sum[$namkot][$c] = array(
					'tahun' => array_keys($_data[$namkot])[$c],
					'data' 	=> $_data[$namkot][array_keys($_data[$namkot])[$c]]
				);
			}

			for ($c=0; $c < count($_apl_data[$namkot]); $c++) { 
				$apl_sum[$namkot][$c] = array(
					'tahun' => array_keys($_apl_data[$namkot])[$c],
					'data' 	=> $_apl_data[$namkot][array_keys($_apl_data[$namkot])[$c]]
				);
			}
			
			$no_data = array(
				0 => array(
					'tahun'	=> date("Y"),
					'data'	=> 0
				)
			);

			$chart['dpt'][$i] = array(
				'kota' 	=> $namkot,
				'data'	=> ( isset( $sum[$namkot] )) ? $sum[$namkot] : $no_data
			);

			$chart['apl'][$i] = array(
				'kota' 	=> $namkot,
				'data'	=> ( isset( $apl_sum[$namkot] )) ? $apl_sum[$namkot] : $no_data
			);

			$filter[$i] = array(
				'kota' 	=> $namkot,
				'data'	=> array()
			);
			$count_dpt = count( $chart['dpt'][$i]['data'] );
			$count_apl = count( $chart['apl'][$i]['data'] );
			foreach ($chart['dpt'][$i]['data'] as $value) {
				array_push($filter[$i]['data'], $value);
			}
			foreach ($chart['apl'][$i]['data'] as $value) {
				array_push($filter[$i]['data'], $value);
			}

			$chart['all'][$i] = array(
				'kota' 	=> $namkot,
				'data'	=> array()
			);
			foreach ($filter[$i]['data'] as $value) {
				if ( $chart['all'][$i] == []) {
					$chart['all'][$i]['data'][(int)$value['tahun']] = (int)$value['data'];
				}
				if ( isset( $chart['all'][$i]['data'][(int)$value['tahun']] ) ) {
					$chart['all'][$i]['data'][(int)$value['tahun']] = $chart['all'][$i]['data'][(int)$value['tahun']] + (int)$value['data'];
				} else {
					$chart['all'][$i]['data'][(int)$value['tahun']] = (int)$value['data'];
				}
			}

		}
		// dd($filter, $chart);
		return $chart;
	}

	public function chart(){
		$kota  = Kabupaten::all();
		$count = count( $kota );
		$array = [
			'kutai' 	=> [],
			'samarinda'	=> [],
			'balikpapan'=> []
		];
		$array_apl = [
			'kutai' 	=> [],
			'samarinda'	=> [],
			'balikpapan'=> []
		];
		for ($i=0; $i < $count; $i++) { 
			$data['dpt'][$i][$kota[$i]->name] = Tanah::where( 'kabupaten_id', $kota[$i]->id )->select('*')->OrderBy('tanggal_pembayaran', 'ASC')->get()->toArray();
			$data['apl'][$i][$kota[$i]->name] = APL::where( 'kawasan', $kota[$i]->id )->select('*')->OrderBy('tanggal_pergantian', 'ASC')->get()->toArray();
			
			switch ( $kota[$i]->name ) {
				case 'Samarinda':
					$namkot = 'samarinda';
					break;
				case 'Balikpapan':
					$namkot = 'balikpapan';
					break;
				case 'Kutai Kartanegara':
					$namkot = 'kutai';
					break;
			}
			$tahun = [];
			for ($a=0; $a < count($data['dpt'][$i][$kota[$i]->name]); $a++) { 
				
				$bubu = Tanah::where( 'kabupaten_id', $kota[$i]->id )
				// ->where( 'tanggal_pembayaran', $data['dpt'][$i][$kota[$i]->name][$a]['tanggal_pembayaran'] )
				->select( 'luas_terkena' )
				->get()->toArray();
				switch ( $kota[$i]->id ) {
					case 1:
						$year = explode('-', $data['dpt'][$i][$kota[$i]->name][$a]['tanggal_pembayaran'])[0];
						if ( !isset($array['samarinda'][$year]) ) {
							$array['samarinda'][$year] = (int)$bubu[$a]['luas_terkena'];
						} else {
							$array['samarinda'][$year] = $array['samarinda'][$year] + $bubu[$a]['luas_terkena'];
						}
						$tahun[$kota[$i]->name][$year] = $array['samarinda'][$year];
						break;
					case 2:
						$year = explode('-', $data['dpt'][$i][$kota[$i]->name][$a]['tanggal_pembayaran'])[0];
						if ( !isset($array['kutai'][$year]) ) {
							$array['kutai'][$year] = (int)$bubu[$a]['luas_terkena'];
						} else {
							$array['kutai'][$year] = $array['kutai'][$year] + $bubu[$a]['luas_terkena'];
						}
						$tahun[$kota[$i]->name][$year] = $array['kutai'][$year];
						break;
					case 3:
						$year = explode('-', $data['dpt'][$i][$kota[$i]->name][$a]['tanggal_pembayaran'])[0];
						if ( !isset($array['balikpapan'][$year]) ) {
							$array['balikpapan'][$year] = (int)$bubu[$a]['luas_terkena'];
						} else {
							$array['balikpapan'][$year] = $array['balikpapan'][$year] + $bubu[$a]['luas_terkena'];
						}
						$tahun[$kota[$i]->name][$year] = $array['balikpapan'][$year];
						break;
				}
			}

			$tahun_apl = [];
			for ($a=0; $a < count($data['apl'][$i][$kota[$i]->name]); $a++) { 
				
				$bubub = APL::where( 'kawasan', $kota[$i]->id )
				->select( 'luas_terkena_tol' )
				->get()->toArray();
				switch ( $kota[$i]->id ) {
					case 1:
						$year_apl = explode('-', $data['apl'][$i][$kota[$i]->name][$a]['tanggal_pergantian'])[0];
						if ( !isset($array_apl['samarinda'][$year_apl]) ) {
							$array_apl['samarinda'][$year_apl] = (int)$bubub[$a]['luas_terkena_tol'];
						} else {
							$array_apl['samarinda'][$year_apl] = $array_apl['samarinda'][$year_apl] + $bubub[$a]['luas_terkena_tol'];
						}
						$tahun_apl[$kota[$i]->name][$year_apl] = $array_apl['samarinda'][$year_apl];
						break;
					case 2:
						$year_apl = explode('-', $data['apl'][$i][$kota[$i]->name][$a]['tanggal_pergantian'])[0];
						if ( !isset($array_apl['kutai'][$year_apl]) ) {
							$array_apl['kutai'][$year_apl] = (int)$bubub[$a]['luas_terkena_tol'];
						} else {
							$array_apl['kutai'][$year_apl] = $array_apl['kutai'][$year_apl] + $bubub[$a]['luas_terkena_tol'];
						}
						$tahun_apl[$kota[$i]->name][$year_apl] = $array_apl['kutai'][$year_apl];
						break;
					case 3:
						$year_apl = explode('-', $data['apl'][$i][$kota[$i]->name][$a]['tanggal_pergantian'])[0];
						if ( !isset($array_apl['balikpapan'][$year_apl]) ) {
							$array_apl['balikpapan'][$year_apl] = (int)$bubub[$a]['luas_terkena_tol'];
						} else {
							$array_apl['balikpapan'][$year_apl] = $array_apl['balikpapan'][$year_apl] + $bubub[$a]['luas_terkena_tol'];
						}
						$tahun_apl[$kota[$i]->name][$year_apl] = $array_apl['balikpapan'][$year_apl];
						break;
				}
			}
			
			$_data[$namkot] 	= (isset($tahun[$kota[$i]->name]))? $tahun[$kota[$i]->name] :null;
			$_apl_data[$namkot] = (isset($tahun_apl[$kota[$i]->name]))? $tahun_apl[$kota[$i]->name] :null;
			
			for ($c=0; $c < count($_data[$namkot]); $c++) { 
				$sum[$namkot][$c] = array(
					'tahun' => array_keys($_data[$namkot])[$c],
					'data' 	=> $_data[$namkot][array_keys($_data[$namkot])[$c]]
				);
			}

			for ($c=0; $c < count($_apl_data[$namkot]); $c++) { 
				$sum_apl[$namkot][$c] = array(
					'tahun' => array_keys($_apl_data[$namkot])[$c],
					'data' 	=> $_apl_data[$namkot][array_keys($_apl_data[$namkot])[$c]]
				);
			}
			
			$no_data = array(
				0 => array(
					'tahun'	=> date("Y"),
					'data'	=> 0
				)
			);
			$chart['dpt'][$i] = array(
				'kota' 	=> $namkot,
				'data'	=> ( isset( $sum[$namkot] )) ? $sum[$namkot] : $no_data,
			);
			$chart['apl'][$i] = array(
				'kota' 	=> $namkot,
				'data'	=> ( isset( $sum_apl[$namkot] )) ? $sum_apl[$namkot] : $no_data,
			);
			$filter[$i] = array(
				'kota' 	=> $namkot,
				'data'	=> array()
			);
			$count_dpt = count( $chart['dpt'][$i]['data'] );
			$count_apl = count( $chart['apl'][$i]['data'] );
			foreach ($chart['dpt'][$i]['data'] as $value) {
				array_push($filter[$i]['data'], $value);
			}
			foreach ($chart['apl'][$i]['data'] as $value) {
				array_push($filter[$i]['data'], $value);
			}

			$chart['all'][$i] = array(
				'kota' 	=> $namkot,
				'data'	=> array()
			);
			foreach ($filter[$i]['data'] as $value) {
				if ( $chart['all'][$i] == []) {
					$chart['all'][$i]['data'][(int)$value['tahun']] = (int)$value['data'];
				}
				if ( isset( $chart['all'][$i]['data'][(int)$value['tahun']] ) ) {
					$chart['all'][$i]['data'][(int)$value['tahun']] = $chart['all'][$i]['data'][(int)$value['tahun']] + (int)$value['data'];
				} else {
					$chart['all'][$i]['data'][(int)$value['tahun']] = (int)$value['data'];
				}
			}
		}
		
		$sum['samarinda'] 		= 0;
		$sum['balikpapan'] 		= 0;
		$sum['kutai'] 			= 0;
		$sum_apl['samarinda'] 	= 0;
		$sum_apl['balikpapan'] 	= 0;
		$sum_apl['kutai'] 		= 0;
		$sum_all['samarinda'] 	= 0;
		$sum_all['balikpapan'] 	= 0;
		$sum_all['kutai'] 		= 0;
		foreach (array_reverse( $chart['dpt'][0]['data'] ) as $real) {
			$sum['samarinda'] = $real['data'] + $sum['samarinda'];
		}
		foreach (array_reverse( $chart['dpt'][1]['data'] ) as $real) {
			$sum['kutai'] = $real['data'] + $sum['kutai'];
		}

		foreach (array_reverse( $chart['dpt'][2]['data'] ) as $real) {
			$sum['balikpapan'] = $real['data'] + $sum['balikpapan'];
		}

		foreach (array_reverse( $chart['apl'][0]['data'] ) as $real) {
			$sum_apl['samarinda'] = $real['data'] + $sum_apl['samarinda'];
		}
		foreach (array_reverse( $chart['apl'][1]['data'] ) as $real) {
			$sum_apl['kutai'] = $real['data'] + $sum_apl['kutai'];
		}

		foreach (array_reverse( $chart['apl'][2]['data'] ) as $real) {
			$sum_apl['balikpapan'] = $real['data'] + $sum_apl['balikpapan'];
		}

		foreach (array_reverse( $chart['all'][0]['data'] ) as $real) {
			$sum_all['samarinda'] = $real + $sum_all['samarinda'];
		}
		foreach (array_reverse( $chart['all'][1]['data'] ) as $real) {
			$sum_all['kutai'] = $real + $sum_all['kutai'];
		}

		foreach (array_reverse( $chart['all'][2]['data'] ) as $real) {
			$sum_all['balikpapan'] = $real + $sum_all['balikpapan'];
		}

		$chart['sum'] 		= $sum;
		$chart['sum_apl'] 	= $sum_apl;
		$chart['sum_all'] 	= $sum_all;
		
		return $chart;
	}

	public function pie(){

		$pie ['apl']['data_balikpapan']		= APL::where('kawasan', 3)->get()->toArray();
		$pie ['apl']['balikpapan']			= count($pie['apl']['data_balikpapan']);

		$pie ['apl']['data_samarinda']		= APL::where('kawasan', 1)->get()->toArray();
		$pie ['apl']['samarinda']			= count($pie['apl']['data_samarinda']);

		$pie ['apl']['data_kutai']			= APL::where('kawasan', 2)->get()->toArray();
		$pie ['apl']['kutai']				= count($pie['apl']['data_kutai']);

		$pie ['apl']['total_kota']			= APL::all();
		$pie ['apl']['total']				= count(APL::all());

		$pie['apl']['jumlah_kutai'] 		= 0;
		$pie['apl']['jumlah_samarinda'] 	= 0;
		$pie['apl']['jumlah_balikpapan'] 	= 0;
		// DATA PIE
		for ($i=0; $i < $pie['apl']['balikpapan'] ; $i++) { 
			$balikpapan[] = $pie['apl']['data_balikpapan'][$i]['nilai_pergantian'] + $pie['apl']['data_balikpapan'][$i]['nilai_ganti_bangunan'] + $pie['apl']['data_balikpapan'][$i]['nilai_ganti_tanaman'];

			$pie['apl']['jumlah_balikpapan'] = array_sum($balikpapan);
		}
		for ($i=0; $i < $pie['apl']['samarinda'] ; $i++) { 
			$samarinda[] = $pie['apl']['data_samarinda'][$i]['nilai_pergantian'] + $pie['apl']['data_samarinda'][$i]['nilai_ganti_bangunan'] + $pie['apl']['data_samarinda'][$i]['nilai_ganti_tanaman'];

			$pie['apl']['jumlah_samarinda'] = array_sum($samarinda);
		}
		for ($i=0; $i < $pie['apl']['kutai'] ; $i++) { 
			$kutai[] = $pie['apl']['data_kutai'][$i]['nilai_pergantian'] + $pie['apl']['data_kutai'][$i]['nilai_ganti_bangunan'] + $pie['apl']['data_kutai'][$i]['nilai_ganti_tanaman'];
			
			$pie['apl']['jumlah_kutai'] = array_sum($kutai);
		}
		for ($i=0; $i < $pie['apl']['total'] ; $i++) { 
			$semua[] = $pie['apl']['total_kota'][$i]['nilai_pergantian'] + $pie['apl']['total_kota'][$i]['nilai_ganti_bangunan'] + $pie['apl']['total_kota'][$i]['nilai_ganti_tanaman'];

			$pie['apl']['jumlah_seluruh'] = array_sum($semua);
		}

		$pie ['data_balikpapan']	= Tanah::where('kabupaten_id', 3)->get()->toArray();
		$pie ['balikpapan']			= count($pie['data_balikpapan']);

		$pie ['data_samarinda'] 	= Tanah::where('kabupaten_id', 1)->get()->toArray();
		$pie ['samarinda']			= count($pie['data_samarinda']);

		$pie ['data_kutai']			= Tanah::where('kabupaten_id', 2)->get()->toArray();
		$pie ['kutai']				= count($pie['data_kutai']);

		$pie ['total_kota']			= Tanah::all();
		$pie ['total']				= Count(Tanah::all());

		$pie['jumlah_kutai'] 		= 0;
		$pie['jumlah_samarinda'] 	= 0;
		$pie['jumlah_balikpapan'] 	= 0;
		// DATA PIE
		for ($i=0; $i < $pie['balikpapan'] ; $i++) { 
			$balikpapan[] = $pie['data_balikpapan'][$i]['total_ganti_rugi'];

			$pie['jumlah_balikpapan'] = array_sum($balikpapan);
		}
		for ($i=0; $i < $pie['samarinda'] ; $i++) { 
			$samarinda[] = $pie['data_samarinda'][$i]['total_ganti_rugi'];

			$pie['jumlah_samarinda'] = array_sum($samarinda);
		}
		for ($i=0; $i < $pie['kutai'] ; $i++) { 
			$kutai[] = $pie['data_kutai'][$i]['total_ganti_rugi'];
			
			$pie['jumlah_kutai'] = array_sum($kutai);
		}
		for ($i=0; $i < $pie['total'] ; $i++) { 
			$semua[] = $pie['total_kota'][$i]['total_ganti_rugi'];

			$pie['jumlah_seluruh'] = array_sum($semua);
		}
		// END DATA PIE
		// dd($pie);
		return $pie;
	}
}

@extends( 'admin.layout.layout' )
@section('content')
<style>
	#pie {
		width		: 100%;
		height		: 500px;
		font-size	: 11px;
	}					
</style>
<section class="content">
<div class="box box-info">
	<div class="box-header with-border">
		<h3 class="box-title">Sortir Tampil Diagram</h3>
	</div>
	<div class="box-body">
		<button class="btn btn-md btn-info" id="show-all">Tampilkan semua Diagram</button>
		<button class="btn btn-md btn-warning" id="show-detail">Tampilkan Diagram Detail</button>
		<button class="btn btn-md btn-success" id="show-sum">Tampilkan Diagram Total</button>
	</div>
</div>

<div class="row detail" id="PieDiagram">
	<div class="col-md-6">
		<div class="box box-info" id="PieDiagramDPT">
			<div class="box-header with-border">
				<h3 class="box-title">Pie Diagram</h3>
			</div>
			<div class="box-body">
				<div id="chartdiv1" style="width: 100%; height: 362px;"></div>
			</div>
			<div class="box-footer">
				<div class="description-block border-right">
					<h5 class="description-header">Total Penyerapan Anggaran : <b>Rp. {{ (isset($pie['jumlah_seluruh']))?number_format($pie['jumlah_seluruh']):0,00 }}</b></h5>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="box box-info" id="PieDiagramAPL">
			<div class="box-header with-border">
				<h3 class="box-title">Pie Diagram <span class="label label-sm label-info">Instansional</span></h3>
			</div>
			<div class="box-body">
				<div id="chartdiv2" style="width: 100%; height: 362px;"></div>
			</div>
			<div class="box-footer">
				<div class="description-block border-right">
					<h5 class="description-header">Total Penyerapan Anggaran : <b>Rp. {{ (isset($pie['apl']['jumlah_seluruh']))?number_format($pie['apl']['jumlah_seluruh']):0,00 }}</b></h5>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="box box-info all" id="all-Pie">
	<div class="box-header with-border">
		<h3 class="box-title">Pie Diagram</h3>
	</div>
	<div class="box-body">
		<div id="chartdiv3" style="width: 100%; height: 362px;"></div>
	</div>
	<div class="box-footer">
		<div class="description-block border-right">
			<h5 class="description-header">Total Penyerapan Anggaran : <b>Rp. {{ (isset($pie['jumlah_seluruh']))?number_format($pie['jumlah_seluruh'] + $pie['apl']['jumlah_seluruh']):0,00 }}</b></h5>
		</div>
	</div>
</div>

<div class="row detail" id="Kurva">
	<div class="col-md-6">
		<div class="box box-info" id="Kurva">
			<div class="box-header with-border">
				<h3 class="box-title">Kurva S Diagram</h3>
			</div>
			<div class="box-body">
				<div class="col-md-6" id="Diagram-Balikpapan">
					<div class="box-body">
						<div class="box box-info">
							<div class="box-header with-border">
							  	<h3 class="box-title">Kota Balikpapan</h3>
							</div><!-- /.box-header -->
							<div class="box-body">
								<div class="chart">
									<canvas id="c_balikpapan" width="500" height="250"></canvas>
								</div>
								<div class="col-sm-12 col-xs-12">
									<div class="description-block border-right">
										<h5 class="description-header" id="balikpapan">{{ $pie['balikpapan'] }}</h5>
										<span class="description-text">Bidang Tanah</span>
									</div><!-- /.description-block -->
								</div><!-- /.col -->
							</div>
						</div>
					</div>
				</div>

				<div class="col-md-6" id="Diagram-Samarinda">
					<div class="box-body">
						<div class="box box-info">
							<div class="box-header with-border">
							  	<h3 class="box-title">Kota Samarinda</h3>
							</div><!-- /.box-header -->
							<div class="box-body">
								<div class="chart">
									<canvas id="c_samarinda" width="500" height="250"></canvas>
								</div>
								<div class="col-sm-12 col-xs-12">
									<div class="description-block border-right">
										<h5 class="description-header">{{ $pie['samarinda'] }}</h5>
										<span class="description-text">Bidang Tanah</span>
									</div><!-- /.description-block -->
								</div><!-- /.col -->
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-3"></div>
				<div class="col-md-6" id="Diagram-Kutai-Kartanegara">
					<div class="box-body">
						<div class="box box-info">
							<div class="box-header with-border">
							  	<h3 class="box-title">Kota Kutai Kartanegara</h3>
							</div><!-- /.box-header -->
							<div class="box-body">
								<div class="chart">
									<canvas id="c_kutai" width="500" height="250"></canvas>
								</div>
								<div class="col-sm-12 col-xs-12">
									<div class="description-block border-right">
										<h5 class="description-header">{{ $pie['kutai'] }}</h5>
										<span class="description-text">Bidang Tanah</span>
									</div><!-- /.description-block -->
								</div><!-- /.col -->
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-3"></div>

			</div>
			<div class="box-footer">
				<div class="row">
					<div class="col-sm-12 col-xs-12">
						<div class="description-block border-right">
							<h5 class="description-header">{{ $pie['total'] }}</h5>
							<span class="description-text">Total Bidang Tanah</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="box box-info" id="KurvaAPL">
			<div class="box-header with-border">
				<h3 class="box-title">Kurva S Diagram <span class="label label-info label-md">Instansional</span></h3>
			</div>
			<div class="box-body">
				<div class="col-md-6" id="Diagram-Balikpapan">
					<div class="box-body">
						<div class="box box-info">
							<div class="box-header with-border">
							  	<h3 class="box-title">Kota Balikpapan</h3>
							</div><!-- /.box-header -->
							<div class="box-body">
								<div class="chart">
									<canvas id="apl_c_balikpapan" width="500" height="250"></canvas>
								</div>
								<div class="col-sm-12 col-xs-12">
									<div class="description-block border-right">
										<h5 class="description-header" id="balikpapan">{{ $pie['apl']['balikpapan'] }}</h5>
										<span class="description-text">Bidang Tanah</span>
									</div><!-- /.description-block -->
								</div><!-- /.col -->
							</div>
						</div>
					</div>
				</div>

				<div class="col-md-6" id="Diagram-Samarinda">
					<div class="box-body">
						<div class="box box-info">
							<div class="box-header with-border">
							  	<h3 class="box-title">Kota Samarinda</h3>
							</div><!-- /.box-header -->
							<div class="box-body">
								<div class="chart">
									<canvas id="apl_c_samarinda" width="500" height="250"></canvas>
								</div>
								<div class="col-sm-12 col-xs-12">
									<div class="description-block border-right">
										<h5 class="description-header">{{ $pie['apl']['samarinda'] }}</h5>
										<span class="description-text">Bidang Tanah</span>
									</div><!-- /.description-block -->
								</div><!-- /.col -->
							</div>
						</div>
					</div>
				</div>

				<div class="col-md-3"></div>
				<div class="col-md-6" id="Diagram-Kutai-Kartanegara">
					<div class="box-body">
						<div class="box box-info">
							<div class="box-header with-border">
							  	<h3 class="box-title">Kota Kutai Kartanegara</h3>
							</div><!-- /.box-header -->
							<div class="box-body">
								<div class="chart">
									<canvas id="apl_c_kutai" width="500" height="250"></canvas>
								</div>
								<div class="col-sm-12 col-xs-12">
									<div class="description-block border-right">
										<h5 class="description-header">{{ $pie['apl']['kutai'] }}</h5>
										<span class="description-text">Bidang Tanah</span>
									</div><!-- /.description-block -->
								</div><!-- /.col -->
							</div>
						</div>
					</div>
				<div class="col-md-3"></div>
				</div>
			</div>
			<div class="box-footer">
				<div class="row">
					<div class="col-sm-12 col-xs-12">
						<div class="description-block border-right">
							<h5 class="description-header">{{ $pie['apl']['total'] }}</h5>
							<span class="description-text">Total Bidang Tanah</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="box box-info all" id="all-Kurva">
	<div class="box-header with-border">
		<h3 class="box-title">Kurva S Diagram</h3>
	</div>
	<div class="box-body">
		<div class="col-md-4" id="all-Diagram-Balikpapan">
			<div class="box-body">
				<div class="box box-info">
					<div class="box-header with-border">
					  	<h3 class="box-title">Kota Balikpapan</h3>
					</div><!-- /.box-header -->
					<div class="box-body">
						<div class="chart">
							<canvas id="all_c_balikpapan" width="500" height="250"></canvas>
						</div>
						<div class="col-sm-12 col-xs-12">
							<div class="description-block border-right">
								<h5 class="description-header" id="balikpapan">{{ $pie['balikpapan'] + $pie['apl']['balikpapan'] }}</h5>
								<span class="description-text">Bidang Tanah</span>
							</div><!-- /.description-block -->
						</div><!-- /.col -->
					</div>
				</div>
			</div>
		</div>

		<div class="col-md-4" id="all-Diagram-Samarinda">
			<div class="box-body">
				<div class="box box-info">
					<div class="box-header with-border">
					  	<h3 class="box-title">Kota Samarinda</h3>
					</div><!-- /.box-header -->
					<div class="box-body">
						<div class="chart">
							<canvas id="all_c_samarinda" width="500" height="250"></canvas>
						</div>
						<div class="col-sm-12 col-xs-12">
							<div class="description-block border-right">
								<h5 class="description-header">{{ $pie['samarinda'] + $pie['apl']['samarinda'] }}</h5>
								<span class="description-text">Bidang Tanah</span>
							</div><!-- /.description-block -->
						</div><!-- /.col -->
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-4" id="all-Diagram-Kutai-Kartanegara">
			<div class="box-body">
				<div class="box box-info">
					<div class="box-header with-border">
					  	<h3 class="box-title">Kota Kutai Kartanegara</h3>
					</div><!-- /.box-header -->
					<div class="box-body">
						<div class="chart">
							<canvas id="all_c_kutai" width="500" height="250"></canvas>
						</div>
						<div class="col-sm-12 col-xs-12">
							<div class="description-block border-right">
								<h5 class="description-header">{{ $pie['kutai'] + $pie['apl']['kutai'] }}</h5>
								<span class="description-text">Bidang Tanah</span>
							</div><!-- /.description-block -->
						</div><!-- /.col -->
					</div>
				</div>
			</div>
		</div>

	</div>
	<div class="box-footer">
		<div class="row">
			<div class="col-sm-12 col-xs-12">
				<div class="description-block border-right">
					<h5 class="description-header">{{ $pie['total'] + $pie['apl']['total'] }}</h5>
					<span class="description-text">Total Bidang Tanah</span>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="row detail" id="Chart">
	<div class="col-md-6">
		<div class="box box-info" id="Chart">
			<div class="box-header with-border">
				<h3 class="box-title">Chart Diagram</h3>
			</div>
			<div class="box-body">
				<div class="col-md-6" id="Diagram-Balikpapan">
					<div class="box-body">
						<div class="box box-info">
							<div class="box-header with-border">
							  	<h3 class="box-title">Kota Balikpapan</h3>
							</div><!-- /.box-header -->
							<div class="box-body">
								<div class="chart">
									<canvas id="d_balikpapan" width="500" height="500"></canvas>
								</div>
								<div class="col-sm-12 col-xs-12">
									<div class="description-block border-right">
										<h5 class="description-header">Jumlah Bidang : {{ number_format($chart['sum']['balikpapan']) }} M2</h5>
									</div><!-- /.description-block -->
								</div><!-- /.col -->
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6" id="Diagram-Samarinda">
					<div class="box-body">
						<div class="box box-info">
							<div class="box-header with-border">
							  	<h3 class="box-title">Kota Samarinda</h3>
							</div><!-- /.box-header -->
							<div class="box-body">
								<div class="chart">
									<canvas id="d_samarinda" width="500" height="500"></canvas>
								</div>
								<div class="col-sm-12 col-xs-12">
									<div class="description-block border-right">
										<h5 class="description-header">Jumlah Bidang : {{ number_format($chart['sum']['samarinda']) }} M2</h5>
									</div><!-- /.description-block -->
								</div><!-- /.col -->
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-3"></div>
				<div class="col-md-6" id="Diagram-Kutai">
					<div class="box-body">
						<div class="box box-info">
							<div class="box-header with-border">
							  	<h3 class="box-title">Kabupaten Kutai Kartanegara</h3>
							</div><!-- /.box-header -->
							<div class="box-body">
								<div class="chart">
									<canvas id="d_kutai" width="500" height="500"></canvas>
								</div>
								<div class="col-sm-12 col-xs-12">
									<div class="description-block border-right">
										<h5 class="description-header">Jumlah Bidang : {{ number_format($chart['sum']['kutai']) }} M2</h5>
									</div><!-- /.description-block -->
								</div><!-- /.col -->
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-3"></div>
			</div>
			<div class="box-footer">
				<div class="row">
					<div class="col-sm-12 col-xs-12">
						<div class="description-block border-right">
							<h5 class="description-header">Total Jumlah Bidang : {{ number_format( array_sum($chart['sum']) ) }} M2</h5>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="box box-info" id="ChartAPL">
			<div class="box-header with-border">
				<h3 class="box-title">Chart Diagram <span class="label label-md label-info">Instansional</span></h3>
			</div>
			<div class="box-body">
				<div class="row">
					<div class="col-md-6" id="Diagram-Balikpapan">
						<div class="box-body">
							<div class="box box-info">
								<div class="box-header with-border">
								  	<h3 class="box-title">Kota Balikpapan</h3>
								</div><!-- /.box-header -->
								<div class="box-body">
									<div class="chart">
										<canvas id="apl_d_balikpapan" width="500" height="500"></canvas>
									</div>
									<div class="col-sm-12 col-xs-12">
										<div class="description-block border-right">
											<h5 class="description-header">Jumlah Bidang : {{ number_format($chart['sum_apl']['balikpapan']) }} M2</h5>
										</div><!-- /.description-block -->
									</div><!-- /.col -->
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6" id="Diagram-Samarinda">
						<div class="box-body">
							<div class="box box-info">
								<div class="box-header with-border">
								  	<h3 class="box-title">Kota Samarinda</h3>
								</div><!-- /.box-header -->
								<div class="box-body">
									<div class="chart">
										<canvas id="apl_d_samarinda" width="500" height="500"></canvas>
									</div>
									<div class="col-sm-12 col-xs-12">
										<div class="description-block border-right">
											<h5 class="description-header">Jumlah Bidang : {{ number_format($chart['sum_apl']['samarinda']) }} M2</h5>
										</div><!-- /.description-block -->
									</div><!-- /.col -->
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-3"></div>
				<div class="col-md-6" id="Diagram-Kutai">
					<div class="box-body">
						<div class="box box-info">
							<div class="box-header with-border">
							  	<h3 class="box-title">Kabupaten Kutai Kartanegara</h3>
							</div><!-- /.box-header -->
							<div class="box-body">
								<div class="chart">
									<canvas id="apl_d_kutai" width="500" height="500"></canvas>
								</div>
								<div class="col-sm-12 col-xs-12">
									<div class="description-block border-right">
										<h5 class="description-header">Jumlah Bidang : {{ number_format($chart['sum_apl']['kutai']) }} M2</h5>
									</div><!-- /.description-block -->
								</div><!-- /.col -->
							</div>
						</div>
					</div>
				<div class="col-md-3"></div>
				</div>
			</div>
			<div class="box-footer">
				<div class="row">
					<div class="col-sm-12 col-xs-12">
						<div class="description-block border-right">
							<h5 class="description-header">Total Jumlah Bidang : {{ number_format( array_sum($chart['sum_apl']) ) }} M2</h5>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="box box-info all" id="all-Chart">
	<div class="box-header with-border">
		<h3 class="box-title">Chart Diagram</h3>
	</div>
	<div class="box-body">
		<div class="col-md-4" id="Diagram-Balikpapan">
			<div class="box-body">
				<div class="box box-info">
					<div class="box-header with-border">
					  	<h3 class="box-title">Kota Balikpapan</h3>
					</div><!-- /.box-header -->
					<div class="box-body">
						<div class="chart">
							<canvas id="all_d_balikpapan" width="500" height="500"></canvas>
						</div>
						<div class="col-sm-12 col-xs-12">
							<div class="description-block border-right">
								<h5 class="description-header">Jumlah Bidang : {{ number_format($chart['sum_all']['balikpapan']) }} M2</h5>
							</div><!-- /.description-block -->
						</div><!-- /.col -->
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-4" id="Diagram-Samarinda">
			<div class="box-body">
				<div class="box box-info">
					<div class="box-header with-border">
					  	<h3 class="box-title">Kota Samarinda</h3>
					</div><!-- /.box-header -->
					<div class="box-body">
						<div class="chart">
							<canvas id="all_d_samarinda" width="500" height="500"></canvas>
						</div>
						<div class="col-sm-12 col-xs-12">
							<div class="description-block border-right">
								<h5 class="description-header">Jumlah Bidang : {{ number_format($chart['sum_all']['samarinda']) }} M2</h5>
							</div><!-- /.description-block -->
						</div><!-- /.col -->
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-4" id="Diagram-Kutai">
			<div class="box-body">
				<div class="box box-info">
					<div class="box-header with-border">
					  	<h3 class="box-title">Kabupaten Kutai Kartanegara</h3>
					</div><!-- /.box-header -->
					<div class="box-body">
						<div class="chart">
							<canvas id="all_d_kutai" width="500" height="500"></canvas>
						</div>
						<div class="col-sm-12 col-xs-12">
							<div class="description-block border-right">
								<h5 class="description-header">Jumlah Bidang : {{ number_format($chart['sum_all']['kutai']) }} M2</h5>
							</div><!-- /.description-block -->
						</div><!-- /.col -->
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="box-footer">
		<div class="row">
			<div class="col-sm-12 col-xs-12">
				<div class="description-block border-right">
					<h5 class="description-header">Total Jumlah Bidang : {{ number_format( array_sum($chart['sum_all']) ) }} M2</h5>
				</div>
			</div>
		</div>
	</div>
</div>

</section>
@endsection
@section( 'script' )
<script src="{{asset('js/chart-dashboard.js')}}"></script>
<script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
<script src="https://www.amcharts.com/lib/3/pie.js"></script>
<script src="https://www.amcharts.com/lib/3/themes/light.js"></script>

<script type="text/javascript">
function arrayKeys(input) {
    var output = new Array();
    var counter = 0;
    for (i in input) {
        output[counter++] = i;
    } 
    return output; 
}
//Kurva DPT
	var kurva = <?php echo json_encode($kurva); ?>;
	for (var k = 0; k < kurva.length; k++ ) {
		var ctx = document.getElementById("c_"+kurva[k]["kota"]).getContext("2d");
		var tahun = [];
		var count = [];
	  	for (var i = 0; i < kurva[k]['data'].length; i++) {
	    	count.push( kurva[k]['data'][i]['data'] );
	    	tahun.push( kurva[k]['data'][i]['tahun'] );
	  	};
		var data = {
			labels: tahun,
		  	datasets: [{
			    label: "My First dataset",
			    fillColor: "rgba(220,220,220,0.2)",
			    strokeColor: "rgb(176, 144, 17)",
			    pointColor: "rgba(220,220,220,1)",
			    pointStrokeColor: "red",
			    pointHighlightFill: "#fff",
			    pointHighlightStroke: "rgb(19, 27, 247)",
			    data: count
		  	}] 
		};
		var MyNewChart = new Chart(ctx).Line(data, {responsive:true});
	};
// End Kurva DPT
//Kurva APL
	var apl_kurva = <?php echo json_encode($apl_kurva); ?>;
	for (var k = 0; k < apl_kurva.length; k++ ) {
		var ctx = document.getElementById("apl_c_"+apl_kurva[k]["kota"]).getContext("2d");
		var tahun = [];
		var count = [];
	  	for (var i = 0; i < apl_kurva[k]['data'].length; i++) {
	    	count.push( apl_kurva[k]['data'][i]['data'] );
	    	tahun.push( apl_kurva[k]['data'][i]['tahun'] );
	  	};
		var data = {
			labels: tahun,
		  	datasets: [{
			    label: "My First dataset",
			    fillColor: "rgba(220,220,220,0.2)",
			    strokeColor: "rgb(176, 144, 17)",
			    pointColor: "rgba(220,220,220,1)",
			    pointStrokeColor: "red",
			    pointHighlightFill: "#fff",
			    pointHighlightStroke: "rgb(19, 27, 247)",
			    data: count
		  	}] 
		};
		var MyNewChart = new Chart(ctx).Line(data, {responsive:true});
	};
// End Kurva APL
//Kurva All
	var all_kurva = <?php echo json_encode($all_kurva); ?>;
	for (var k = 0; k < all_kurva.length; k++ ) {
		var ctx = document.getElementById("all_c_"+all_kurva[k]["kota"]).getContext("2d");
		var tahun = [];
		var count = [];
	  	for (var i = 0; i < all_kurva[k]['data'].length; i++) {
	    	count.push( all_kurva[k]['data'][i]['data'] );
	    	tahun.push( all_kurva[k]['data'][i]['tahun'] );
	  	};
		var data = {
			labels: tahun,
		  	datasets: [{
			    label: "My First dataset",
			    fillColor: "rgba(220,220,220,0.2)",
			    strokeColor: "rgb(176, 144, 17)",
			    pointColor: "rgba(220,220,220,1)",
			    pointStrokeColor: "red",
			    pointHighlightFill: "#fff",
			    pointHighlightStroke: "rgb(19, 27, 247)",
			    data: count
		  	}] 
		};
		var MyNewChart = new Chart(ctx).Line(data, {responsive:true});
	};
// End Kurva All

// Chart DPT
	<?php unset( $chart['sum'] ); ?>
	var chart = <?php echo json_encode($chart); ?>;
	for (var k = 0; k < chart.dpt.length; k++ ) {
	    var ctx = document.getElementById("d_"+chart['dpt'][k]["kota"]).getContext("2d");
	    var tahun = [];
	    var count = [];
	    for (var i = 0; i < chart['dpt'][k]['data'].length; i++) {
	        count.push( chart['dpt'][k]['data'][i]['data'] );
	        tahun.push( chart['dpt'][k]['data'][i]['tahun'] );
	    };
	    var data = {
	    	labels: tahun,
	      	datasets: [{
		        fillColor : "rgba(151,187,205,0.5)",
				strokeColor : "rgba(151,187,205,0.8)",
				highlightFill : "rgba(151,187,205,0.75)",
				highlightStroke : "rgba(151,187,205,1)",
		        data: count
		    }] 
	    };
	    // for Responsive include element responsive : true
	    var MyNewChart = new Chart(ctx).Bar(data, {responsive:true});
	};
// End Chart DPT
// Chart APL
	<?php unset( $chart['sum_apl'] ); ?>
	var apl_chart = <?php echo json_encode($chart); ?>;
	for (var k = 0; k < apl_chart.apl.length; k++ ) {
	    var ctx = document.getElementById("apl_d_"+apl_chart['apl'][k]["kota"]).getContext("2d");
	    var tahun = [];
	    var count = [];
	    for (var i = 0; i < apl_chart['apl'][k]['data'].length; i++) {
	        count.push( apl_chart['apl'][k]['data'][i]['data'] );
	        tahun.push( apl_chart['apl'][k]['data'][i]['tahun'] );
	    };
	    var data = {
	    	labels: tahun,
	      	datasets: [{
		        fillColor : "rgba(151,187,205,0.5)",
				strokeColor : "rgba(151,187,205,0.8)",
				highlightFill : "rgba(151,187,205,0.75)",
				highlightStroke : "rgba(151,187,205,1)",
		        data: count
		    }] 
	    };
	    // for Responsive include element responsive : true
	    var MyNewChart = new Chart(ctx).Bar(data, {responsive:true});
	};
// End Chart APL
// Chart ALL
	<?php unset( $chart['sum_all'] ); ?>
	var all_chart = <?php echo json_encode($chart); ?>;
	for (var k = 0; k < all_chart.all.length; k++ ) {
	    var ctx = document.getElementById("all_d_"+all_chart['all'][k]["kota"]).getContext("2d");
	    var tahun = [];
	    var count = [];
	    for (var i = 0; i < all_chart['all'][k]['data'].length; i++) {
	        count.push( all_chart['all'][k]['data'][i]['data'] );
	        tahun.push( all_chart['all'][k]['data'][i]['tahun'] );
	    };
	    var data = {
	    	labels: tahun,
	      	datasets: [{
		        fillColor : "rgba(151,187,205,0.5)",
				strokeColor : "rgba(151,187,205,0.8)",
				highlightFill : "rgba(151,187,205,0.75)",
				highlightStroke : "rgba(151,187,205,1)",
		        data: count
		    }] 
	    };
	    // for Responsive include element responsive : true
	    var MyNewChart = new Chart(ctx).Bar(data, {responsive:true});
	};
// End Chart ALL

// Pie
	var chart, chart2;

	var chartData1 = [
	    {
	        "kota": "Balikpapan",
	        "data": <?php echo $pie['jumlah_balikpapan'];?>
	    },
	    {
	        "kota": "Samarinda",
	        "data": <?php echo $pie['jumlah_samarinda'];?>
	    },
	    {
	        "kota": "Kutai Kartanegara",
	        "data": <?php echo $pie['jumlah_kutai'];?>
	    }
	];

	var chartData2 = [
	    {
	        "kota": "Balikpapan",
	        "data": <?php echo $pie['apl']['jumlah_balikpapan'];?>
	    },
	    {
	        "kota": "Samarinda",
	        "data": <?php echo $pie['apl']['jumlah_samarinda'];?>
	    },
	    {
	        "kota": "Kutai Kartanegara",
	        "data": <?php echo $pie['apl']['jumlah_kutai'];?>
	    }
	];

	var chartData3 = [
	    {
	        "kota": "Balikpapan",
	        "data": <?php echo ($pie['apl']['jumlah_balikpapan'] + $pie['jumlah_balikpapan']);?>
	    },
	    {
	        "kota": "Samarinda",
	        "data": <?php echo ($pie['apl']['jumlah_samarinda'] + $pie['jumlah_samarinda']);?>
	    },
	    {
	        "kota": "Kutai Kartanegara",
	        "data": <?php echo ($pie['apl']['jumlah_kutai'] + $pie['jumlah_kutai']);?>
	    }
	];

	AmCharts.ready(function () {
	    // PIE CHART 1
	    chart = new AmCharts.AmPieChart();
	    chart.dataProvider = chartData1;
	    chart.titleField = "kota";
	    chart.valueField = "data";
	    chart.outlineColor = "#000000";
	    chart.outlineAlpha = 0.8;
	    chart.outlineThickness = 2;
	    chart.labelText = "";
	    chart.margins = 0;
	    chart.write("chartdiv1");
	    
	    // PIE CHART 2
	    chart2 = new AmCharts.AmPieChart();
	    chart2.dataProvider = chartData2;
	    chart2.titleField = "kota";
	    chart2.valueField = "data";
	    chart2.outlineColor = "#000000";
	    chart2.outlineAlpha = 0.8;
	    chart2.outlineThickness = 2;
	    chart2.labelText = "";
	    chart2.write("chartdiv2");

	    // PIE CHART 3
	    chart3 = new AmCharts.AmPieChart();
	    chart3.dataProvider = chartData3;
	    chart3.titleField = "kota";
	    chart3.valueField = "data";
	    chart3.outlineColor = "#000000";
	    chart3.outlineAlpha = 0.8;
	    chart3.outlineThickness = 2;
	    chart3.labelText = "";
	    chart3.write("chartdiv3");
	});
// End Pie

</script>

<script type="text/javascript">
  $( '.detail' ).hide();

  $(document).on( 'click', '#show-all', function( event ) {
      $( '.detail' ).show();
      $( '.all' ).show();
  });
  $(document).on( 'click', '#show-detail', function( event ) {
      $( '.detail' ).show();
      $( '.all' ).hide();
  });
  $(document).on( 'click', '#show-sum', function( event ) {
      $( '.detail' ).hide();
      $( '.all' ).show();
  });

</script>
@endsection

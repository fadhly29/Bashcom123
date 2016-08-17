@extends( 'admin.layout.layout' )
@section( 'content' )
<section class="content">
	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title">Tambah Baru Data Notulen</h3>
		</div>
		<div class="box-body">
			<form action="{{ route('notulen.post') }}" method="POST" role="form" class="form-horizontal" enctype="multipart/form-data">
				<input type="hidden" name="_token" value="{{csrf_token()}}">
				<div class="col-lg-6">
					<div class="form-group">
						<div class="col-sm-4">
	                        <label for="nama">Hari/Tanggal Rapat</label>
	                     </div>
	                     <div class="col-sm-8">
	                        <input type="date" name="tanggal" class="form-control" id="tanggal"  required="required">
	                     </div>
					</div>
					<div class="form-group">
						<div class="col-sm-4">
							<label>Waktu</label>
						</div>
						<div class="col-sm-6">
							<input type="text" name="waktu" class="form-control" id="waktu" required="required">
						</div>
						<div class="col-sm-2">
							<select name="time" class="form-control">
								<option>WIB</option>
								<option>WITA</option>
								<option>WIT</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-4">
							<label>Tempat</label>
						</div>
						<div class="col-sm-8">
							<input type="text" name="tempat" class="form-control" placeholder="Tempat" required="required">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-4">
							<label>Agenda Rapat</label>
						</div>
						<div class="col-sm-8">
							<input type="text" name="agenda" class="form-control" placeholder="Agenda Rapat" required="required">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-4">
							<label>Pemimpin Rapat</label>
						</div>
						<div class="col-sm-8">
							<input type="text" name="pemimpin" class="form-control" placeholder="Pemimpin Rapat" required="required">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-4">
							<label>Notulis</label>
						</div>
						<div class="col-sm-8">
							<input type="text" name="notulis" class="form-control" placeholder="Notulis" required="required">
						</div>
					</div>
					
					<div class="form-group">
						<div class="col-sm-12">
							<button class="btn btn-primary" type="submit" name="simpan">Simpan</button>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</section>
@endsection

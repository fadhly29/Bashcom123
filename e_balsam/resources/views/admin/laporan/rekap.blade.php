@extends( 'admin.layout.layout' )
@section('content')

<section class="content">

  <div class="nav-tabs-custom" id="balsam">
    <ul class="nav nav-tabs">
      <li class="active"><a href="#dpt_all" data-toggle="tab" aria-expanded="true">Data Pengadaan Tanah</a></li>
      <li class=""><a href="#apl_all" data-toggle="tab" aria-expanded="false">Data Instansional</a></li>
    </ul>
    <div class="tab-content">
      <div class="tab-pane active" id="dpt_all">
        <div class="row" id='all_dpt'>
          <div class="col-xs-8">
            <div class="box">
              <div class="box-header">
                <h3 class="box-title">Total Rekapitulasi Seluruh Wilayah ( BALSAM ) / Tahun</h3>
              </div>
                  <!-- /.box-header -->
              <div class="box-body">
                <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"><div class="col-sm-6"></div><div class="col-sm-6"></div></div><div class="row"><div class="col-sm-12"><table id="example1" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                  <thead>
                    <tr role="row">
                      <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Tahun: activate to sort column descending" aria-sort="ascending">
                        Tahun
                      </th>
                      <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Jumlah Bidang: activate to sort column ascending">
                        Jumlah Bidang
                      </th>
                      <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Jumlah Luas: activate to sort column ascending">
                        Jumlah Luas
                      </th>
                      <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Serapan Anggaran: activate to sort column ascending">
                        Serapan Anggaran
                      </th>
                  </thead>
                  <tbody>
                  @if( !empty($balsam['tahun']['bidang']) )
                    @for( $i = 0; $i < count( $balsam['tahun']['bidang'] ); $i++ )
                    <tr role="row" class="even">
                      <td class="sorting_1">{{ $balsam['tahun']['bidang'][$i]['tahun'] }}</td>
                      <td class="sorting_1">{{ $balsam['tahun']['bidang'][$i]['bidang'] }}</td>
                      <td class="sorting_1">{{ $balsam['tahun']['luas'][$i]['luas'] }} M2</td>
                      <td class="sorting_1">Rp. {{ number_format($balsam['tahun']['anggaran'][$i]['anggaran']) }}</td>
                    </tr>
                    @endfor
                  @else
                  @endif
                  </tbody>
                </table></div></div></div>
              </div>
                  <!-- /.box-body -->
                </div>
          </div>
          <div class="col-xs-4">
            <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Total Rekapitulasi Seluruh Wilayah <div class="label label-sm label-primary">( BALSAM )</div></h3>
              </div>
              <div class="box-body">
                <a href="{{ route( 'progress' ).'#Kurva' }}">
                  <div class="info-box">
                    <span class="info-box-icon"><i class="fa fa-line-chart"></i></span>
                    <div class="info-box-content">
                      <span class="info-box-text">Jumlah Bidang</span>
                      <span class="info-box-number">{{ number_format($balsam['bidang']) }} </span>
                    </div>
                  </div>
                </a>
                <a href="{{ route( 'progress' ).'#Chart' }}">
                  <div class="info-box">
                    <span class="info-box-icon"><i class="fa fa-bar-chart"></i></span>
                    <div class="info-box-content">
                      <span class="info-box-text">Luas Tanah</span>
                      <span class="info-box-number">{{ number_format($balsam['luas']) }} M2</span>
                    </div>
                  </div>
                </a>
                <a href="{{ route( 'progress' ).'#PieDiagram' }}">
                  <div class="info-box">
                    <span class="info-box-icon"><i class="fa fa-pie-chart"></i></span>
                    <div class="info-box-content">
                      <span class="info-box-text">Serapan Anggaran</span>
                      <span class="info-box-number">Rp. {{ number_format($balsam['anggaran']) }}</span>
                    </div>
                  </div>
                </a>
              </div>
              <!-- /.box-body -->
            </div>
          </div>
        </div>
      </div>
      <div class="tab-pane" id="apl_all">
        <div class="row" id='all_apl'>
          <div class="col-xs-8">
            <div class="box">
              <div class="box-header">
                <h3 class="box-title">Total Rekapitulasi Seluruh Wilayah ( BALSAM ) / Tahun <div class="label label-md label-info">( Instansional )</div></h3>
              </div>
                  <!-- /.box-header -->
              <div class="box-body">
                <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"><div class="col-sm-6"></div><div class="col-sm-6"></div></div><div class="row"><div class="col-sm-12"><table id="example5" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                  <thead>
                    <tr role="row">
                      <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Tahun: activate to sort column descending" aria-sort="ascending">
                        Tahun
                      </th>
                      <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Jumlah Bidang: activate to sort column ascending">
                        Jumlah Bidang
                      </th>
                      <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Jumlah Luas: activate to sort column ascending">
                        Jumlah Luas
                      </th>
                      <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Serapan Anggaran: activate to sort column ascending">
                        Serapan Anggaran
                      </th>
                  </thead>
                  <tbody>
                  @if( !empty($apl['balsam']['tahun']['bidang']) )
                    @for( $i = 0; $i < count( $apl['balsam']['tahun']['bidang'] ); $i++ )
                    <tr role="row" class="even">
                      <td class="sorting_1">{{ $apl['balsam']['tahun']['bidang'][$i]['tahun'] }}</td>
                      <td class="sorting_1">{{ $apl['balsam']['tahun']['bidang'][$i]['bidang'] }}</td>
                      <td class="sorting_1">{{ $apl['balsam']['tahun']['luas'][$i]['luas'] }} M2</td>
                      <td class="sorting_1">Rp. {{ number_format($apl['balsam']['tahun']['anggaran'][$i]['anggaran']) }}</td>
                    </tr>
                    @endfor
                  @else
                  @endif
                  </tbody>
                </table></div></div></div>
              </div>
                  <!-- /.box-body -->
                </div>
          </div>
          <div class="col-xs-4">
            <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Total Rekapitulasi Seluruh Wilayah <div class="label label-sm label-primary">( BALSAM )</div></h3>
              </div>
              <div class="box-body">
                <a href="{{ route( 'progress' ).'#Kurva' }}">
                  <div class="info-box">
                    <span class="info-box-icon"><i class="fa fa-line-chart"></i></span>
                    <div class="info-box-content">
                      <span class="info-box-text">Jumlah Bidang</span>
                      <span class="info-box-number">{{ number_format($apl['balsam']['bidang']) }} </span>
                    </div>
                  </div>
                </a>
                <a href="{{ route( 'progress' ).'#Kurva' }}">
                  <div class="info-box">
                    <span class="info-box-icon"><i class="fa fa-bar-chart"></i></span>
                    <div class="info-box-content">
                      <span class="info-box-text">Luas Tanah</span>
                      <span class="info-box-number">{{ number_format($apl['balsam']['luas']) }} M2</span>
                    </div>
                  </div>
                </a>
                <a href="{{ route( 'progress' ).'#Kurva' }}">
                  <div class="info-box">
                    <span class="info-box-icon"><i class="fa fa-pie-chart"></i></span>
                    <div class="info-box-content">
                      <span class="info-box-text">Serapan Anggaran</span>
                      <span class="info-box-number">Rp. {{ number_format($apl['balsam']['anggaran']) }}</span>
                    </div>
                  </div>
                </a>
              </div>
              <!-- /.box-body -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="nav-tabs-custom" id="samarinda">
    <ul class="nav nav-tabs">
      <li class="active"><a href="#dpt_samarinda" data-toggle="tab" aria-expanded="true">Data Pengadaan Tanah</a></li>
      <li class=""><a href="#apl_samarinda" data-toggle="tab" aria-expanded="false">Data Instansional</a></li>
    </ul>
    <div class="tab-content">
      <div class="tab-pane active" id="dpt_samarinda">
        <div class="row" id='samarinda_dpt'>
          <div class="col-xs-8">
            <div class="box">
              <div class="box-header">
                <h3 class="box-title">Total Rekapitulasi Wilayah ( Samarinda ) / Tahun</h3>
              </div>
                  <!-- /.box-header -->
              <div class="box-body">
                <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"><div class="col-sm-6"></div><div class="col-sm-6"></div></div><div class="row"><div class="col-sm-12"><table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                  <thead>
                    <tr role="row">
                      <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Tahun: activate to sort column descending" aria-sort="ascending">
                        Tahun
                      </th>
                      <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Jumlah Bidang: activate to sort column ascending">
                        Jumlah Bidang
                      </th>
                      <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Jumlah Luas: activate to sort column ascending">
                        Jumlah Luas
                      </th>
                      <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Serapan Anggaran: activate to sort column ascending">
                        Serapan Anggaran
                      </th>
                  </thead>
                  <tbody>
                  @if( !empty($samarinda['tahun']['bidang']) )
                    @for( $i = 0; $i < count( $samarinda['tahun']['bidang'] ); $i++ )
                    <tr role="row" class="even">
                      <td class="sorting_1">{{ $samarinda['tahun']['bidang'][$i]['tahun'] }}</td>
                      <td class="sorting_1">{{ $samarinda['tahun']['bidang'][$i]['bidang'] }}</td>
                      <td class="sorting_1">{{ $samarinda['tahun']['luas'][$i]['luas'] }} M2</td>
                      <td class="sorting_1">Rp. {{ number_format($samarinda['tahun']['anggaran'][$i]['anggaran']) }}</td>
                    </tr>
                    @endfor
                  @else
                  @endif
                  </tbody>
                </table></div></div></div>
              </div>
                  <!-- /.box-body -->
                </div>
          </div>
          <div class="col-xs-4">
            <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Total Rekapitulasi Wilayah <div class="label label-sm label-primary">( Samarinda )</div></h3>
              </div>
              <div class="box-body">
                <a href="{{ route( 'progress' ).'#Kurva' }}">
                  <div class="info-box">
                    <span class="info-box-icon"><i class="fa fa-line-chart"></i></span>
                    <div class="info-box-content">
                      <span class="info-box-text">Jumlah Bidang</span>
                      <span class="info-box-number">{{ number_format($samarinda['bidang']) }} </span>
                    </div>
                  </div>
                </a>
                <a href="{{ route( 'progress' ).'#Chart' }}">
                  <div class="info-box">
                    <span class="info-box-icon"><i class="fa fa-bar-chart"></i></span>
                    <div class="info-box-content">
                      <span class="info-box-text">Luas Tanah</span>
                      <span class="info-box-number">{{ number_format($samarinda['luas']) }} M2</span>
                    </div>
                  </div>
                </a>
                <a href="{{ route( 'progress' ).'#PieDiagram' }}">
                  <div class="info-box">
                    <span class="info-box-icon"><i class="fa fa-pie-chart"></i></span>
                    <div class="info-box-content">
                      <span class="info-box-text">Serapan Anggaran</span>
                      <span class="info-box-number">Rp. {{ number_format($samarinda['anggaran']) }}</span>
                    </div>
                  </div>
                </a>
              </div>
              <!-- /.box-body -->
            </div>
          </div>
        </div>
      </div>
      <div class="tab-pane" id="apl_samarinda">
        <div class="row" id='samarinda_dpt'>
          <div class="col-xs-8">
            <div class="box">
              <div class="box-header">
                <h3 class="box-title">Total Rekapitulasi Wilayah ( Samarinda ) / Tahun <div class="label label-md label-info">( Instansional )</div></h3>
              </div>
                  <!-- /.box-header -->
              <div class="box-body">
                <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"><div class="col-sm-6"></div><div class="col-sm-6"></div></div><div class="row"><div class="col-sm-12"><table id="example6" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                  <thead>
                    <tr role="row">
                      <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Tahun: activate to sort column descending" aria-sort="ascending">
                        Tahun
                      </th>
                      <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Jumlah Bidang: activate to sort column ascending">
                        Jumlah Bidang
                      </th>
                      <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Jumlah Luas: activate to sort column ascending">
                        Jumlah Luas
                      </th>
                      <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Serapan Anggaran: activate to sort column ascending">
                        Serapan Anggaran
                      </th>
                  </thead>
                  <tbody>
                  @if( !empty($apl['samarinda']['tahun']['bidang']) )
                    @for( $i = 0; $i < count( $apl['samarinda']['tahun']['bidang'] ); $i++ )
                    <tr role="row" class="even">
                      <td class="sorting_1">{{ $apl['samarinda']['tahun']['bidang'][$i]['tahun'] }}</td>
                      <td class="sorting_1">{{ $apl['samarinda']['tahun']['bidang'][$i]['bidang'] }}</td>
                      <td class="sorting_1">{{ $apl['samarinda']['tahun']['luas'][$i]['luas'] }} M2</td>
                      <td class="sorting_1">Rp. {{ number_format($apl['samarinda']['tahun']['anggaran'][$i]['anggaran']) }}</td>
                    </tr>
                    @endfor
                  @else
                  @endif
                  </tbody>
                </table></div></div></div>
              </div>
                  <!-- /.box-body -->
                </div>
          </div>
          <div class="col-xs-4">
            <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Total Rekapitulasi Wilayah <div class="label label-sm label-primary">( Samarinda )</div></h3>
              </div>
              <div class="box-body">
                <a href="{{ route( 'progress' ).'#Kurva' }}">
                  <div class="info-box">
                    <span class="info-box-icon"><i class="fa fa-line-chart"></i></span>
                    <div class="info-box-content">
                      <span class="info-box-text">Jumlah Bidang</span>
                      <span class="info-box-number">{{ number_format($apl['samarinda']['bidang']) }} </span>
                    </div>
                  </div>
                </a>
                <a href="{{ route( 'progress' ).'#Kurva' }}">
                  <div class="info-box">
                    <span class="info-box-icon"><i class="fa fa-bar-chart"></i></span>
                    <div class="info-box-content">
                      <span class="info-box-text">Luas Tanah</span>
                      <span class="info-box-number">{{ number_format($apl['samarinda']['luas']) }} M2</span>
                    </div>
                  </div>
                </a>
                <a href="{{ route( 'progress' ).'#Kurva' }}">
                  <div class="info-box">
                    <span class="info-box-icon"><i class="fa fa-pie-chart"></i></span>
                    <div class="info-box-content">
                      <span class="info-box-text">Serapan Anggaran</span>
                      <span class="info-box-number">Rp. {{ number_format($apl['samarinda']['anggaran']) }}</span>
                    </div>
                  </div>
                </a>
              </div>
              <!-- /.box-body -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="nav-tabs-custom" id="balikpapan">
    <ul class="nav nav-tabs">
      <li class="active"><a href="#dpt_balikpapan" data-toggle="tab" aria-expanded="true">Data Pengadaan Tanah</a></li>
      <li class=""><a href="#apl_balikpapan" data-toggle="tab" aria-expanded="false">Data Instansional</a></li>
    </ul>
    <div class="tab-content">
      <div class="tab-pane active" id="dpt_balikpapan">
        <div class="row" id='balikpapan'>
          <div class="col-xs-8">
            <div class="box">
              <div class="box-header">
                <h3 class="box-title">Total Rekapitulasi Wilayah ( Balikpapan ) / Tahun</h3>
              </div>
                  <!-- /.box-header -->
              <div class="box-body">
                <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"><div class="col-sm-6"></div><div class="col-sm-6"></div></div><div class="row"><div class="col-sm-12"><table id="example3" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                  <thead>
                    <tr role="row">
                      <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Tahun: activate to sort column descending" aria-sort="ascending">
                        Tahun
                      </th>
                      <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Jumlah Bidang: activate to sort column ascending">
                        Jumlah Bidang
                      </th>
                      <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Jumlah Luas: activate to sort column ascending">
                        Jumlah Luas
                      </th>
                      <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Serapan Anggaran: activate to sort column ascending">
                        Serapan Anggaran
                      </th>
                  </thead>
                  <tbody>
                  @if( !empty($balikpapan['tahun']['bidang']) )
                    @for( $i = 0; $i < count( $balikpapan['tahun']['bidang'] ); $i++ )
                    <tr role="row" class="even">
                      <td class="sorting_1">{{ $balikpapan['tahun']['bidang'][$i]['tahun'] }}</td>
                      <td class="sorting_1">{{ $balikpapan['tahun']['bidang'][$i]['bidang'] }}</td>
                      <td class="sorting_1">{{ $balikpapan['tahun']['luas'][$i]['luas'] }} M2</td>
                      <td class="sorting_1">Rp. {{ number_format($balikpapan['tahun']['anggaran'][$i]['anggaran']) }}</td>
                    </tr>
                    @endfor
                  @else
                  @endif
                  </tbody>
                </table></div></div></div>
              </div>
                  <!-- /.box-body -->
                </div>
          </div>
          <div class="col-xs-4">
            <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Total Rekapitulasi Wilayah <div class="label label-sm label-primary">( Balikpapan )</div></h3>
              </div>
              <div class="box-body">
                <a href="{{ route( 'progress' ).'#Kurva' }}">
                  <div class="info-box">
                    <span class="info-box-icon"><i class="fa fa-line-chart"></i></span>
                    <div class="info-box-content">
                      <span class="info-box-text">Jumlah Bidang</span>
                      <span class="info-box-number">{{ number_format($balikpapan['bidang']) }} </span>
                    </div>
                  </div>
                </a>
                <a href="{{ route( 'progress' ).'#Chart' }}">
                  <div class="info-box">
                    <span class="info-box-icon"><i class="fa fa-bar-chart"></i></span>
                    <div class="info-box-content">
                      <span class="info-box-text">Luas Tanah</span>
                      <span class="info-box-number">{{ number_format($balikpapan['luas']) }} M2</span>
                    </div>
                  </div>
                </a>
                <a href="{{ route( 'progress' ).'#PieDiagram' }}">
                  <div class="info-box">
                    <span class="info-box-icon"><i class="fa fa-pie-chart"></i></span>
                    <div class="info-box-content">
                      <span class="info-box-text">Serapan Anggaran</span>
                      <span class="info-box-number">Rp. {{ number_format($balikpapan['anggaran']) }}</span>
                    </div>
                  </div>
                </a>
              </div>
              <!-- /.box-body -->
            </div>
          </div>
        </div>
      </div>
      <div class="tab-pane" id="apl_balikpapan">
        <div class="row" id='balikpapan'>
          <div class="col-xs-8">
            <div class="box">
              <div class="box-header">
                <h3 class="box-title">Total Rekapitulasi Wilayah ( Balikpapan ) / Tahun <div class="label label-md label-info">( Instansional )</div></h3>
              </div>
                  <!-- /.box-header -->
              <div class="box-body">
                <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"><div class="col-sm-6"></div><div class="col-sm-6"></div></div><div class="row"><div class="col-sm-12"><table id="example7" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                  <thead>
                    <tr role="row">
                      <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Tahun: activate to sort column descending" aria-sort="ascending">
                        Tahun
                      </th>
                      <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Jumlah Bidang: activate to sort column ascending">
                        Jumlah Bidang
                      </th>
                      <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Jumlah Luas: activate to sort column ascending">
                        Jumlah Luas
                      </th>
                      <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Serapan Anggaran: activate to sort column ascending">
                        Serapan Anggaran
                      </th>
                  </thead>
                  <tbody>
                  @if( !empty($apl['balikpapan']['tahun']['bidang']) )
                    @for( $i = 0; $i < count( $apl['balikpapan']['tahun']['bidang'] ); $i++ )
                    <tr role="row" class="even">
                      <td class="sorting_1">{{ $apl['balikpapan']['tahun']['bidang'][$i]['tahun'] }}</td>
                      <td class="sorting_1">{{ $apl['balikpapan']['tahun']['bidang'][$i]['bidang'] }}</td>
                      <td class="sorting_1">{{ $apl['balikpapan']['tahun']['luas'][$i]['luas'] }} M2</td>
                      <td class="sorting_1">Rp. {{ number_format($apl['balikpapan']['tahun']['anggaran'][$i]['anggaran']) }}</td>
                    </tr>
                    @endfor
                  @else
                  @endif
                  </tbody>
                </table></div></div></div>
              </div>
                  <!-- /.box-body -->
                </div>
          </div>
          <div class="col-xs-4">
            <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Total Rekapitulasi Wilayah <div class="label label-sm label-primary">( Balikpapan )</div></h3>
              </div>
              <div class="box-body">
                <a href="{{ route( 'progress' ).'#Kurva' }}">
                  <div class="info-box">
                    <span class="info-box-icon"><i class="fa fa-line-chart"></i></span>
                    <div class="info-box-content">
                      <span class="info-box-text">Jumlah Bidang</span>
                      <span class="info-box-number">{{ number_format($apl['balikpapan']['bidang']) }} </span>
                    </div>
                  </div>
                </a>
                <a href="{{ route( 'progress' ).'#Kurva' }}">
                  <div class="info-box">
                    <span class="info-box-icon"><i class="fa fa-bar-chart"></i></span>
                    <div class="info-box-content">
                      <span class="info-box-text">Luas Tanah</span>
                      <span class="info-box-number">{{ number_format($apl['balikpapan']['luas']) }} M2</span>
                    </div>
                  </div>
                </a>
                <a href="{{ route( 'progress' ).'#Kurva' }}">
                  <div class="info-box">
                    <span class="info-box-icon"><i class="fa fa-pie-chart"></i></span>
                    <div class="info-box-content">
                      <span class="info-box-text">Serapan Anggaran</span>
                      <span class="info-box-number">Rp. {{ number_format($apl['balikpapan']['anggaran']) }}</span>
                    </div>
                  </div>
                </a>
              </div>
              <!-- /.box-body -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <div class="nav-tabs-custom" id="kutai">
    <ul class="nav nav-tabs">
      <li class="active"><a href="#dpt_kutai" data-toggle="tab" aria-expanded="true">Data Pengadaan Tanah</a></li>
      <li class=""><a href="#apl_kutai" data-toggle="tab" aria-expanded="false">Data Instansional</a></li>
    </ul>
    <div class="tab-content">
      <div class="tab-pane active" id="dpt_kutai">
        <div class="row" id='kutai'>
          <div class="col-xs-8">
            <div class="box">
              <div class="box-header">
                <h3 class="box-title">Total Rekapitulasi Wilayah ( Kutai Kartanegara ) / Tahun</h3>
              </div>
                  <!-- /.box-header -->
              <div class="box-body">
                <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"><div class="col-sm-6"></div><div class="col-sm-6"></div></div><div class="row"><div class="col-sm-12"><table id="example3" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                  <thead>
                    <tr role="row">
                      <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Tahun: activate to sort column descending" aria-sort="ascending">
                        Tahun
                      </th>
                      <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Jumlah Bidang: activate to sort column ascending">
                        Jumlah Bidang
                      </th>
                      <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Jumlah Luas: activate to sort column ascending">
                        Jumlah Luas
                      </th>
                      <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Serapan Anggaran: activate to sort column ascending">
                        Serapan Anggaran
                      </th>
                  </thead>
                  <tbody>
                  @if( !empty($kutai['tahun']['bidang']) )
                    @for( $i = 0; $i < count( $kutai['tahun']['bidang'] ); $i++ )
                    <tr role="row" class="even">
                      <td class="sorting_1">{{ $kutai['tahun']['bidang'][$i]['tahun'] }}</td>
                      <td class="sorting_1">{{ $kutai['tahun']['bidang'][$i]['bidang'] }}</td>
                      <td class="sorting_1">{{ $kutai['tahun']['luas'][$i]['luas'] }} M2</td>
                      <td class="sorting_1">Rp. {{ number_format($kutai['tahun']['anggaran'][$i]['anggaran']) }}</td>
                    </tr>
                    @endfor
                  @else
                  @endif
                  </tbody>
                </table></div></div></div>
              </div>
                  <!-- /.box-body -->
                </div>
          </div>
          <div class="col-xs-4">
            <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Total Rekapitulasi Wilayah <div class="label label-sm label-primary">( Kutai Kartanegara )</div></h3>
              </div>
              <div class="box-body">
                <a href="{{ route( 'progress' ).'#Kurva' }}">
                  <div class="info-box">
                    <span class="info-box-icon"><i class="fa fa-line-chart"></i></span>
                    <div class="info-box-content">
                      <span class="info-box-text">Jumlah Bidang</span>
                      <span class="info-box-number">{{ number_format($kutai['bidang']) }} </span>
                    </div>
                  </div>
                </a>
                <a href="{{ route( 'progress' ).'#Chart' }}">
                  <div class="info-box">
                    <span class="info-box-icon"><i class="fa fa-bar-chart"></i></span>
                    <div class="info-box-content">
                      <span class="info-box-text">Luas Tanah</span>
                      <span class="info-box-number">{{ number_format($kutai['luas']) }} M2</span>
                    </div>
                  </div>
                </a>
                <a href="{{ route( 'progress' ).'#PieDiagram' }}">
                  <div class="info-box">
                    <span class="info-box-icon"><i class="fa fa-pie-chart"></i></span>
                    <div class="info-box-content">
                      <span class="info-box-text">Serapan Anggaran</span>
                      <span class="info-box-number">Rp. {{ number_format($kutai['anggaran']) }}</span>
                    </div>
                  </div>
                </a>
              </div>
              <!-- /.box-body -->
            </div>
          </div>
        </div>
      </div>
      <div class="tab-pane" id="apl_kutai">
        <div class="row" id='kutai'>
          <div class="col-xs-8">
            <div class="box">
              <div class="box-header">
                <h3 class="box-title">Total Rekapitulasi Wilayah ( Kutai Kartanegara ) / Tahun <div class="label label-md label-info">( Instansional )</div></h3>
              </div>
                  <!-- /.box-header -->
              <div class="box-body">
                <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"><div class="col-sm-6"></div><div class="col-sm-6"></div></div><div class="row"><div class="col-sm-12"><table id="example8" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                  <thead>
                    <tr role="row">
                      <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Tahun: activate to sort column descending" aria-sort="ascending">
                        Tahun
                      </th>
                      <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Jumlah Bidang: activate to sort column ascending">
                        Jumlah Bidang
                      </th>
                      <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Jumlah Luas: activate to sort column ascending">
                        Jumlah Luas
                      </th>
                      <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Serapan Anggaran: activate to sort column ascending">
                        Serapan Anggaran
                      </th>
                  </thead>
                  <tbody>
                  @if( !empty($apl['kutai']['tahun']['bidang']) )
                    @for( $i = 0; $i < count( $apl['kutai']['tahun']['bidang'] ); $i++ )
                    <tr role="row" class="even">
                      <td class="sorting_1">{{ $apl['kutai']['tahun']['bidang'][$i]['tahun'] }}</td>
                      <td class="sorting_1">{{ $apl['kutai']['tahun']['bidang'][$i]['bidang'] }}</td>
                      <td class="sorting_1">{{ $apl['kutai']['tahun']['luas'][$i]['luas'] }} M2</td>
                      <td class="sorting_1">Rp. {{ number_format($apl['kutai']['tahun']['anggaran'][$i]['anggaran']) }}</td>
                    </tr>
                    @endfor
                  @else
                  @endif
                  </tbody>
                </table></div></div></div>
              </div>
                  <!-- /.box-body -->
                </div>
          </div>
          <div class="col-xs-4">
            <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Total Rekapitulasi Wilayah <div class="label label-sm label-primary">( Kutai Kartanegara )</div></h3>
              </div>
              <div class="box-body">
                <a href="{{ route( 'progress' ).'#Kurva' }}">
                  <div class="info-box">
                    <span class="info-box-icon"><i class="fa fa-line-chart"></i></span>
                    <div class="info-box-content">
                      <span class="info-box-text">Jumlah Bidang</span>
                      <span class="info-box-number">{{ number_format($apl['kutai']['bidang']) }} </span>
                    </div>
                  </div>
                </a>
                <a href="{{ route( 'progress' ).'#Kurva' }}">
                  <div class="info-box">
                    <span class="info-box-icon"><i class="fa fa-bar-chart"></i></span>
                    <div class="info-box-content">
                      <span class="info-box-text">Luas Tanah</span>
                      <span class="info-box-number">{{ number_format($apl['kutai']['luas']) }} M2</span>
                    </div>
                  </div>
                </a>
                <a href="{{ route( 'progress' ).'#Kurva' }}">
                  <div class="info-box">
                    <span class="info-box-icon"><i class="fa fa-pie-chart"></i></span>
                    <div class="info-box-content">
                      <span class="info-box-text">Serapan Anggaran</span>
                      <span class="info-box-number">Rp. {{ number_format($apl['kutai']['anggaran']) }}</span>
                    </div>
                  </div>
                </a>
              </div>
              <!-- /.box-body -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
</section>
@endsection
<!-- Logo -->
<a href="{{ route( 'system.index' ) }}" class="logo">
  <!-- mini logo for sidebar mini 50x50 pixels -->
  <span class="logo-mini"><b>E</b>BS</span>
  <!-- logo for regular state and mobile devices -->
  <span class="logo-lg"><b>E-BalSam</b></span>
</a>

<!-- Header Navbar: style can be found in header.less -->
<nav class="navbar navbar-static-top" role="navigation">
  <!-- Navbar Right Menu -->
  <div class="navbar-custom-menu">
    <ul class="nav navbar-nav">
      <li>
        <a href="{{ route('public.index') }}">
          <i class="fa fa-home"></i><span> Main Site</span>
        </a>
      </li>
      <li>
        <a href="{{ route('system.index') }}">
          <i class="fa fa-dashboard"></i><span> Dashboard</span>
        </a>
      </li>
      <li class="dropdown">
        <a href="#" class="dropbtn"><span>Laporan</span><i class="fa fa-angle-down pull-right"></i></a>
          <div class="dropdown-content">
            <a href="{{ route('progress') }}">Progress</a>
            <a href="{{ route('rekap') }}">Rekapitulasi</a>
            <a href="{{ route('permasalahan.index') }}">Permasalahan</a>
          </div>
      </li>
      <li>
        <a href="{{ route('notulen') }}">Notulen</a>
      </li>
      <li>
        <a href="{{ route( 'system.map' ) }}">Web Map</a>
      </li>
      <li class="dropdown">
        <a href="#" class="dropbtn"><span>SK - Peraturan</span><i class="fa fa-angle-down pull-right"></i></a>
        <div class="dropdown-content">
          <a href="{{ route('peraturan.index') }}">Surat Keputusan</a>
          <a href="{{ route('tugas.index') }}">Perintah/Tugas</a>
          <a href="{{ route('uu.index') }}">Peraturan</a>
        </div>
      </li>
      <li class="dropdown">
          <a href="#" class="dropbtn"><i class="fa fa-message"></i><span>CMS</span><i class="fa fa-angle-down pull-right"></i></a>
          <div class="dropdown-content">
            <a href="{{ route('cms') }}"><i class="fa fa-file"></i> Update CMS</a>
          </div>
        </li>
      @if( $role->group->r == true || $role->user->r == true )
        <li class="dropdown">
          <a href="#" class="dropbtn">
            <i class="fa fa-users"></i> <span>UACL</span> <i class="fa fa-angle-down pull-right"></i>
          </a>
          <div class="dropdown-content">
            @if( $role->user->r == true )
            <a href="{{route('uacl.user.index')}}"><i class="fa fa-user"></i>Manajemen User</a>
            @endif
            @if( $role->group->r == true )
            <a href="{{route('uacl.group.index')}}"><i class="fa fa-users"></i>Manajemen Group</a>
            @endif
          </div>
        </li>
        @endif
        @if( $role->dpt->r == true || $role->location->r == true || $role->alas_hak->r == true )
        <li class="dropdown">
          <a href="#" class="dropbtn">
            <i class="fa fa-truck"></i> <span>DPT</span> <i class="fa fa-angle-down pull-right"></i>
          </a>
          <div class="dropdown-content">
            @if( $role->dpt->r == true )
            <a href="{{route('dpt.index')}}"><i class="fa fa-child"></i> Pengadaan Tanah</a>
            @endif
            @if( $role->apl->r == true )
            <a href="{{route('apl.index')}}"><i class="fa fa-institution"></i> Instansional</a>
            @endif
            @if( $role->location->r == true )
            <a href="{{route('location')}}"><i class="fa fa-area-chart"></i> Manajemen Lokasi</a>
            @endif
            @if( $role->alas_hak->r == true )
            <a href="{{route('alashak')}}"><i class="fa fa-file"></i> Manajemen Alas Hak</a>
            <a href="{{route('bentuk')}}"><i class="fa fa-bookmark"></i> Manajemen Bentuk Pergantian ( Instansional )</a>
            <a href="{{route('jenis')}}"><i class="fa fa-bookmark-o"></i> Manajemen Jenis Pergantian ( Instansional )</a>
            @endif
          </div>
        </li>
        @endif
      <!-- User Account: style can be found in dropdown.less -->
      <li class="dropdown user user-menu">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <i class="fa fa-user"></i>
          <span class="hidden-xs">{{ $me->name }}</span>
        </a>
        <ul class="dropdown-menu">
          <!-- User image -->
          <li class="user-header">
            @if ( $me->avatar != null )
            <img src="{{ asset( $me->avatar ) }}" class="img-circle" alt="User Image" />
            @else
            <img src="{{ asset( 'images/no-image.png' ) }}" class="img-circle" alt="User Image" />
            @endif
            <p>
              {{ $me->name }} - {{ $me->usergroup->name }}
            </p>
          </li>
          <!-- Menu Body -->
          <li class="user-body">
            <div class="col-xs-6 text-center">
              <a href="{{ route( 'system.index' ) }}" class="btn btn-sm btn-flat">Dashboard</a>
            </div>
            <div class="col-xs-6 text-center">
              <a href="{{ route( 'public.index' ) }}" class="btn btn-sm btn-flat">Main Site</a>
            </div>
          </li>
          <!-- Menu Footer-->
          <li class="user-footer">
            <div class="pull-left">
              <a href="#" class="btn btn-default btn-flat" data-toggle="modal" data-target="#profile">Profile</a>
            </div>
            <div class="pull-right">
              <a href="{{ url('auth/logout')}}" class="btn btn-default btn-flat">Sign out</a>
            </div>
          </li>
        </ul>
      </li>
      <!-- Control Sidebar Toggle Button -->
      <li>
        <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
      </li>
    </ul>
  </div>

</nav>
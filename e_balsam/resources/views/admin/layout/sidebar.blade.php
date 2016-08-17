<section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
            @if ( \Auth::user()->avatar != null )
            <img src="{{ asset( \Auth::user()->avatar ) }}" class="img-circle" alt="User Image" />
            @else
            <img src="{{ asset( 'images/no-image.png' ) }}" class="img-circle" alt="User Image" />
            @endif
        </div>
        <div class="pull-left info">
          <p>{{ \Auth::user()->name }}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
    </section>
    <!-- /.sidebar -->
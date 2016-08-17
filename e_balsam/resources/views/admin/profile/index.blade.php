@extends( 'admin.layout.layout' )
@section( 'content' )
<section class="content-header">
  <h1>
    Dashboard
    <small>Version 2.0</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Dashboard</li>
  </ol>
</section>
@if( $errors->all() != null )
  <div class="row">
    <div class="col-md-3"></div>
    <div class="alert alert-danger alert-dismissable col-md-6">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <h4><i class="icon fa fa-ban"></i> Whoops, looks like something went wrong.</h4>
      @foreach ($errors->all() as $message)
        <li>{{ $message }}</li>
      @endforeach
    </div>  
    <div class="col-md-3"></div>
  </div>
@endif

<section class="content">
  <div class="nav-tabs-custom">
    <ul class="nav nav-tabs">
      <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">Personal Info</a></li>
      <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">Change Password</a></li>
    </ul>
    <div class="tab-content">
      <div class="tab-pane active" id="tab_1">
        <form role="form" action="{{ route( 'admin.profile.post', \Crypt::encrypt( $me->id ) ) }}" method="POST" enctype="multipart/form-data">
          <input type="hidden" name="_token" value="{{ csrf_token() }}" >
          <div class="box-body">
            <div class="form-group">
              <label>Name</label>
              <input name="name" type="name" class="form-control" placeholder="Enter name" value="{{ $me->name }}" required>
            </div>
            <div class="form-group">
              <label>Email address</label>
              <input name="email" type="email" class="form-control" placeholder="Enter email" value="{{ $me->email }}" required>
            </div>
            <div class="form-group">
              <label>Group</label>
              <select name="usergroup" class="form-control" >
                <option>--</option>
                @for( $i = 0; $i < $count; $i++ )
                <option value="{{$usergroup[$i]->id}}" @if( $me->usergroup_id->id == $usergroup[$i]->id ) selected="selected" @endif>{{ $usergroup[$i]->name }}</option>
                @endfor
              </select>
            </div>
            <hr>
            <div class="form-group">
              <span class="btn btn-success btn-file">
                  Upload Avatar Image <input type="file" name="avatar">
              </span>
              @if( $me->avatar != null )
                <img src="{{ asset($me->avatar) }}" border="0" width="50" class="img-circle">
              @else
                <img src="{{ asset( 'uploads/images/no.jpg' ) }}" class="img-circle" border="0" width="50" />
              @endif
            </div>
          </div><!-- /.box-body -->

          <div class="box-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div><!-- /.tab-pane -->
      <div class="tab-pane" id="tab_2">
        <form role="form" action="{{ route( 'admin.profile.post', \Crypt::encrypt( $me->id ) ) }}" method="POST" enctype="multipart/form-data">
          <input type="hidden" name="_token" value="{{ csrf_token() }}" >
          <div class="box-body">
            <div class="form-group">
              <label>Password</label>
              <input name="password" type="password" class="form-control" placeholder="Enter password" required>
            </div>
            <div class="form-group">
              <label>Confirm Password</label>
              <input name="password_confirmation" type="password" class="form-control" placeholder="Confirm password" required>
            </div>
          </div><!-- /.box-body -->

          <div class="box-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div><!-- /.tab-pane -->
    </div><!-- /.tab-content -->
  </div>
</section>

@endsection
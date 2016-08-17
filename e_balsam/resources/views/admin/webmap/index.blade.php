@extends( 'admin.layout.layout' )
@section( 'content' )
<style>
#map-iframe {
    width: 1270px;
    height: 550px;
    margin: 0px;
    padding: 0px
}
</style>
<section class="content">
    <iframe src="{{ route( 'system.map.data' ) }}" id="map-iframe"></iframe>
</section>
@endsection
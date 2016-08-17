$( '#fasos' ).hide();
$( '#wakaf' ).hide();
$( '#tanah-sisa' ).hide();
$( '#AlasHak' ).hide();

// Define KTP / Passport
  $(document).on( 'change', '#kewarganegaraan', function( event ) {
    var value = $('#kewarganegaraan').val();

      if( value == 'WNA' ){
          $( '#ktp_passport_label' ).text('No. Passport');
          $( '#masaberlaku_ktp_passport_label' ).text('Masa Berlaku Passport');

      } else {
          $( '#ktp_passport_label' ).text('No. KTP');
          $( '#masaberlaku_ktp_passport_label' ).text('Masa Berlaku KTP');
      }
  });

  $(document).on( 'change', '#keluarga_kewarganegaraan', function( event ) {
    var value = $('#keluarga_kewarganegaraan').val();

      if( value == 'WNA' ){
          $( '#keluarga_ktp_passport' ).text('No. Passport');
          $( '#keluarga_masa_berlaku_ktp_passport' ).text('Masa Berlaku Passport');

      } else {
          $( '#keluarga_ktp_passport' ).text('No. KTP');
          $( '#keluarga_masa_berlaku_ktp_passport' ).text('Masa Berlaku KTP');
    }
  });
// End Define KTP / Passport


// Count Luas Sisa Tanah
  $('#luas_terkena').change(function(){
      var luas_tanah  = $( '#luas_tanah' ).val();
      var luas_tol    = $( '#luas_terkena' ).val();

      if ( luas_tol - luas_tanah != 0 ) {
        $( '#tanah-sisa' ).show();
      } else {
        $( '#tanah-sisa' ).hide();
      };
  });

  $(document).on( 'change', '#luas_tanah', function( event ) {
    var luas_tanah = $('#luas_tanah').val();
    var luas_tol = $('#luas_tol').val();
    if ( luas_tol == null ) {
      $('#luas_tanah_sisa').val( luas_tanah );  
    } else {
      $('#luas_tanah_sisa').val( luas_tanah - luas_tol );  
    };
  });

  $(document).on( 'change', '#luas_terkena', function( event ) {
    var luas_terkena = $('#luas_terkena').val();
    var luas_tanah = $('#luas_tanah').val();
    if ( luas_tanah == null ) {
      $('#luas_tanah_sisa').val();
    } else {
      $('#luas_tanah_sisa').val( luas_tanah - luas_terkena );  
    };
  });
// End Count Luas Sisa Tanah


// Count Total Harga
  $(document).on( 'change', '#harga_tanah', function( event ) {
    var luas_terkena = $('#luas_terkena').val();
    var harga_tanah = $('#harga_tanah').val();
    if ( luas_terkena == null ) {
      $('#total_harga').val();
    } else {
      $('#total_harga').val( harga_tanah * luas_terkena );  
    };
  });

  $(document).on( 'change', '#harga_tanah_sisa', function( event ) {
    var luas_tanah_sisa = $('#luas_tanah_sisa').val();
    var harga_tanah_sisa = $('#harga_tanah_sisa').val();
    if ( luas_tanah_sisa == null ) {
      $('#total_harga_sisa').val();
    } else {
      $('#total_harga_sisa').val( harga_tanah_sisa * luas_tanah_sisa );  
    };
  });
// End Count Total Harga


// Count Total Ganti Rugi
  $(document).on( 'change', '#harga_bangunan', function( event ) {
    var total_harga = $('#total_harga').val();
    var bangunan = $(this).val();
    var tanaman = $('#harga_tanaman').val();
    if ( total_harga == null ) {
      $('#total_ganti_rugi').val();
      $('#total_ganti_rugi_semua').val();  
    } else {
      $('#total_ganti_rugi').val( total_harga - (bangunan - ( bangunan * 2 )) - (tanaman - ( tanaman * 2 )) );
      $('#total_ganti_rugi_semua').val( $('#total_ganti_rugi').val() );  
    };
  });

  $(document).on( 'change', '#harga_tanaman', function( event ) {
    var total_harga = $('#total_harga').val();
    var bangunan = $('#harga_bangunan').val();
    var tanaman = $(this).val();
    if ( total_harga == null ) {
      $('#total_ganti_rugi').val();
      $('#total_ganti_rugi_semua').val();  
    } else {
      $('#total_ganti_rugi').val( total_harga - (tanaman - ( tanaman * 2 )) - (bangunan - ( bangunan * 2 )));  
      $('#total_ganti_rugi_semua').val( $('#total_ganti_rugi').val() );  
    };
  });

  $(document).on( 'change', '#harga_bangunan_sisa', function( event ) {
    var total_harga_sisa = $('#total_harga_sisa').val();
    var bangunan = $(this).val();
    var tanaman = $('#harga_tanaman_sisa').val();
    if ( total_harga_sisa == null ) {
      $('#total_ganti_rugi_sisa').val();
      $('#total_ganti_rugi_semua').val();  
    } else {
      $('#total_ganti_rugi_sisa').val( total_harga_sisa - (bangunan - ( bangunan * 2 )) - (tanaman - ( tanaman * 2 )) );
      $('#total_ganti_rugi_semua').val( $('#total_ganti_rugi').val() - ( $('#total_ganti_rugi_sisa').val() - ( $('#total_ganti_rugi_sisa').val() * 2 )) );  
    };
  });

  $(document).on( 'change', '#harga_tanaman_sisa', function( event ) {
    var total_harga_sisa  = $('#total_harga_sisa').val();
    var bangunan          = $('#harga_bangunan_sisa').val();
    var tanaman           = $(this).val();
    var tanah             = $('#total_ganti_rugi').val();
    if ( total_harga_sisa == null ) {
      $('#total_ganti_rugi_sisa').val();
      $('#total_ganti_rugi_semua').val();  
    } else {
      $('#total_ganti_rugi_sisa').val( total_harga_sisa - (tanaman - ( tanaman * 2 )) - (bangunan - ( bangunan * 2 )));  
      $('#total_ganti_rugi_semua').val( $('#total_ganti_rugi').val() - ( $('#total_ganti_rugi_sisa').val() - ( $('#total_ganti_rugi_sisa').val() * 2 )) );  
    };
  });
// End Count Total Ganti Rugi


$(document).on( 'change', '#status-tanah', function( event ) {
  var value = $(this).val();
  if ( value == 'kosong' ) {
    $( '#fasos' ).hide();
    $( '#wakaf' ).hide();
  };
  if ( value == 'biasa' ) {
    $( '#fasos' ).hide();
    $( '#wakaf' ).hide();
  };
  if ( value == 'fasos' ) {
    $( '#fasos' ).show();
    $( '#wakaf' ).hide();
  };
  if ( value == 'wakaf' ) {
    $( '#fasos' ).hide();
    $( '#wakaf' ).show();
  };
});
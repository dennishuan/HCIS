$(function () {
  console.log( "Active tab loaded" );

  var path = $(location).attr('pathname');

  console.log( path );

  if(path.toLowerCase().indexOf('record') >= 0){
    console.log( 'record' );
    $('#masterRecordTab').attr('class', 'active');
  }
  if(path.toLowerCase().indexOf('patient') >= 0){
    console.log( 'patient' );
    $('#masterPatientTab').attr('class', 'active');
  }

  if(path.toLowerCase().indexOf('user') >= 0){
    console.log( 'user' );
    $('#masterUserTab').attr('class', 'active');
  }

  if(path.toLowerCase().indexOf('facility') >= 0){
    console.log( 'facility' );
    $('#masterFacilityTab').attr('class', 'active');
  }

  if(path.toLowerCase().indexOf('search') >= 0){
    console.log( 'search' );
    $('#masterSearchTab').attr('class', 'active');
  }



});

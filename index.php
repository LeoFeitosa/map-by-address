<?php
function getFrameGoogleMaps($endereco)
{
  $sslConfig=array(
    "ssl"=>array(
        "verify_peer"=>false,
        "verify_peer_name"=>false,
    ),
  );

  $geolocalizacao = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.str_replace(' ', '+', $endereco).'&key=AIzaSyAVPfZsQ5IkL89k2mRdEQr2iMznSZdFEcM', false, stream_context_create($sslConfig));

  $saidaGeo = json_decode($geolocalizacao);

  $latitude = $saidaGeo->results[0]->geometry->location->lat;
  $longitude = $saidaGeo->results[0]->geometry->location->lng;

  return '<iframe src=https://maps.google.com/maps?q='.$latitude.','.$longitude.'&hl=pt-BR&lr=lang_pt&z=16&amp&output=embed width=600 height=450 frameborder=0 style="border:0" allowfullscreen></iframe>';
}

$endereco = 'praça da sé';

echo getFrameGoogleMaps($endereco);

<be-html>
<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <style type="text/css">
        html{height:100%;font-size: 14px;}
        body{height:100%;margin:0;padding:0}
        #google-map{height:100%}
    </style>
    <script src="https://maps.googleapis.com/maps/api/js?key=<?php echo $this->configContact->mapKeyGoogle;?>&sensor=false" type="text/javascript"></script>
    <script type="text/javascript">
        google.maps.event.addDomListener(window, 'load', function(){

            let oLatlng = new google.maps.LatLng(<?php echo $this->configContact->lat; ?>,<?php echo $this->configContact->lng; ?>);

            let oOptions = {
                center: oLatlng,
                zoom: 18,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };

            let oMap = new google.maps.Map(document.getElementById("google-map"), oOptions);

            let oMarker = new google.maps.Marker({
                position: oLatlng,
                map: oMap
            });

            let oInfoWindow = new google.maps.InfoWindow({
                content: '<div style="font-weight:bold;"><?php echo $this->configContact->markerTitle; ?></div><div style="padding:10px 0px;"><?php echo $this->configContact->markerAddress; ?></div>',
                maxWidth:500
            });

            google.maps.event.addListener(oMarker, 'click', function() {
                oInfoWindow.open(oMap, oMarker);
            });

        });

    </script>

</head>
<body>
<div id="google-map"></div>
</body>
</html>
</be-html>
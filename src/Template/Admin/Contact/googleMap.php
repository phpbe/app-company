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

            var oLatlng = new google.maps.LatLng(<?php echo $this->configContact->lat; ?>,<?php echo $this->configContact->lng; ?>);

            var oOptions = {
                center: oLatlng,
                zoom: 18,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };

            var oMap = new google.maps.Map(document.getElementById("google-map"), oOptions);


            var oMarker = new google.maps.Marker({
                position: oLatlng,
                map: oMap,
                draggable:true
            });

            //oMarker.getPosition()

            google.maps.event.addListener(oMap, 'click', function(e) {
                oMarker.setPosition(e.latLng);
                parent.setLngLat(e.latLng.lng(), e.latLng.lat());
            });


            google.maps.event.addListener(oMarker, 'dragend', function() {
                var p = oMarker.getPosition();
                parent.setLngLat(p.lng(), p.lat());
            });


        });

    </script>

</head>
<body>
<div id="google-map"></div>
</body>
</html>
</be-html>
function initialize() {

    // Create an array of styles.
    var styles = [
        {
            stylers: [

            ]
        }
    ];

    // Create a new StyledMapType object, passing it the array of styles,
    // as well as the name to be displayed on the map type control.
    var styledMap = new google.maps.StyledMapType(styles, {name: "Styled Map"});

    var image = "assets/images/pin-map.png";
    var url = "https://www.google.com/maps/d/edit?mid=zv4DPPCDZWTc.kjNo0-ElfvZc";
    var mapOptions = {
        zoom: 17,
        scrollwheel: false,
        center: new google.maps.LatLng(13.70752, 100.52857)
    };

    var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

    var marker = new google.maps.Marker({
        position: map.getCenter(),
        map: map,
        icon: image,
        url: url,
        animation: google.maps.Animation.DROP
        //title: 'Click to zoom'
    });

    google.maps.event.addListener(map, 'center_changed', function() {

        // 3 seconds after the center of the map has changed, pan back to the
        // marker.
        window.setTimeout(function() {
            map.panTo(marker.getPosition());
        }, 3000);
    });

    google.maps.event.addListener(marker, 'click', function() {
        //map.setZoom(17);
        window.open(this.url);
        // map.setCenter(marker.getPosition());

    });

    map.mapTypes.set('map_style', styledMap);
    map.setMapTypeId('map_style');
}

google.maps.event.addDomListener(window, 'load', initialize);
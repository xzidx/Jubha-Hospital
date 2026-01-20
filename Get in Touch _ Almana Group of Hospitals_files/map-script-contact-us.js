function initMap() {

    var h = 1;
    var loctns = "";
    var locs = [];
    var locsItems = [];

    for (var i = 0; i < document.getElementById("hdntotalMaps").value; i++) {
        locsItems = [];
        window["location" + "_" + h.toString()] = {
            info: `${document.getElementById('hdnName_' + h.toString()).value ? `<h5>  ${document.getElementById('hdnName_' + h.toString()).value} </h5>\r` : ''}
					${document.getElementById('hdnAddress_' + h.toString()).value ? `${document.getElementById('hdnAddress_' + h.toString()).value}\r` : ''}
                    ${document.getElementById('hdnPhone_' + h.toString()).value ? `<p><a class="contact-number mapp" href="tel:${document.getElementById('hdnPhoneClean_' + h.toString()).value}"><span class="icon-contact"></span> ${document.getElementById('hdnCode_' + h.toString()).value} ${document.getElementById('hdnPhone_' + h.toString()).value}</a></p>\r` : ''}
					${document.getElementById('hdnEmail_' + h.toString()).value ? `<p><a class="contact-mail mapp" href="mailto:${document.getElementById('hdnEmail_' + h.toString()).value}"><span class="icon-email"></span> ${document.getElementById('hdnEmail_' + h.toString()).value} </a></p>\r` : ''}
                    ${document.getElementById('hdnDirection_' + h.toString()).value ? ` <p><a class="main-btn right-arrow map-direction" href="${document.getElementById('hdnDirection_' + h.toString()).value}">${document.getElementById('hdnDirectionText').value}</a></p>` : ''}
`,
            lat: document.getElementById('hdnLattitude_' + h.toString()).value,
            long: document.getElementById('hdnLongitude_' + h.toString()).value
        };

        locsItems[0] = window["location" + "_" + h.toString()].info;
        locsItems[1] = window["location" + "_" + h.toString()].lat;
        locsItems[2] = window["location" + "_" + h.toString()].long;
        locsItems[3] = h;
        locs[i] = locsItems;
        h++;
    }
    var locations = locs;

    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 8,
        center: new google.maps.LatLng(26.300325, 49.869008),
        mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    var infowindow = new google.maps.InfoWindow({});

    var icon = {
        url: document.getElementById("hdnlogo").value, // url
        scaledSize: new google.maps.Size(38, 50) // scaled size
    };

    var marker, i;

    for (i = 0; i < locations.length; i++) {
        marker = new google.maps.Marker({
            position: new google.maps.LatLng(locations[i][1], locations[i][2], locations[i][3], locations[i][4]),
            map: map,
            icon: icon
        });

        google.maps.event.addListener(marker, 'click', (function (marker, i) {
            return function () {
                infowindow.setContent(locations[i][0]);
                infowindow.open(map, marker);
            }
        })

            (marker, i));
        var styles = [
            {
                "featureType": "administrative",
                "elementType": "labels.text.fill",
                "stylers": [
                    {
                        "color": "#444444"
                    }
                ]
            },
            {
                "featureType": "administrative.country",
                "elementType": "labels.text.fill",
                "stylers": [
                    {
                        "color": "#000000"
                    }
                ]
            },
            {
                "featureType": "administrative.locality",
                "elementType": "labels.text.fill",
                "stylers": [
                    {
                        "color": "#00243e"
                    }
                ]
            },
            {
                "featureType": "landscape",
                "elementType": "all",
                "stylers": [
                    {
                        "color": "#F2F2F2"
                    }
                ]
            },
            {
                "featureType": "landscape.natural.landcover",
                "elementType": "geometry.fill",
                "stylers": [
                    {
                        "color": "#F2F2F2"
                    }
                ]
            },
            {
                "featureType": "poi",
                "elementType": "all",
                "stylers": [
                    {
                        "visibility": "off"
                    }
                ]
            },
            {
                "featureType": "road",
                "elementType": "all",
                "stylers": [
                    {
                        "saturation": -100
                    },
                    {
                        "lightness": 45
                    }
                ]
            },
            {
                "featureType": "road.highway",
                "elementType": "all",
                "stylers": [
                    {
                        "visibility": "simplified"
                    }
                ]
            },
            {
                "featureType": "road.arterial",
                "elementType": "labels.icon",
                "stylers": [
                    {
                        "visibility": "off"
                    }
                ]
            },
            {
                "featureType": "transit",
                "elementType": "all",
                "stylers": [
                    {
                        "visibility": "off"
                    }
                ]
            },
            {
                "featureType": "water",
                "elementType": "all",
                "stylers": [
                    {
                        "color": "#C1D8E3"
                    },
                    {
                        "visibility": "on"
                    }
                ]
            },
            {
                "featureType": "water",
                "elementType": "geometry.fill",
                "stylers": [
                    {
                        "color": "#C1D8E3"
                    }
                ]
            },
            {
                "featureType": "water",
                "elementType": "labels.text.fill",
                "stylers": [
                    {
                        "color": "#00243e"
                    }
                ]
            }
        ];

        map.set('styles', styles);

    }

}

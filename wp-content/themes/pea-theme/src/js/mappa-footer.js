//Mappa footer
  // Inizializzo la mappa

function initMapFooter() {

    var styledMapType = new google.maps.StyledMapType(
      [
        {
            "featureType": "all",
            "elementType": "labels.text.fill",
            "stylers": [
                {
                    "saturation": 36
                },
                {
                    "color": "#000000"
                },
                {
                    "lightness": 40
                }
            ]
        },
        {
            "featureType": "all",
            "elementType": "labels.text.stroke",
            "stylers": [
                {
                    "visibility": "on"
                },
                {
                    "color": "#000000"
                },
                {
                    "lightness": 16
                }
            ]
        },
        {
            "featureType": "all",
            "elementType": "labels.icon",
            "stylers": [
                {
                    "visibility": "off"
                }
            ]
        },
        {
            "featureType": "administrative",
            "elementType": "geometry.fill",
            "stylers": [
                {
                    "color": "#000000"
                },
                {
                    "lightness": 20
                }
            ]
        },
        {
            "featureType": "administrative",
            "elementType": "geometry.stroke",
            "stylers": [
                {
                    "color": "#000000"
                },
                {
                    "lightness": 17
                },
                {
                    "weight": 1.2
                }
            ]
        },
        {
            "featureType": "landscape",
            "elementType": "geometry",
            "stylers": [
                {
                    "color": "#000000"
                },
                {
                    "lightness": 20
                }
            ]
        },
        {
            "featureType": "poi",
            "elementType": "geometry",
            "stylers": [
                {
                    "color": "#000000"
                },
                {
                    "lightness": 21
                }
            ]
        },
        {
            "featureType": "road.highway",
            "elementType": "geometry.fill",
            "stylers": [
                {
                    "color": "#000000"
                },
                {
                    "lightness": 17
                }
            ]
        },
        {
            "featureType": "road.highway",
            "elementType": "geometry.stroke",
            "stylers": [
                {
                    "color": "#000000"
                },
                {
                    "lightness": 29
                },
                {
                    "weight": 0.2
                }
            ]
        },
        {
            "featureType": "road.arterial",
            "elementType": "geometry",
            "stylers": [
                {
                    "color": "#000000"
                },
                {
                    "lightness": 18
                }
            ]
        },
        {
            "featureType": "road.local",
            "elementType": "geometry",
            "stylers": [
                {
                    "color": "#000000"
                },
                {
                    "lightness": 16
                }
            ]
        },
        {
            "featureType": "transit",
            "elementType": "geometry",
            "stylers": [
                {
                    "color": "#000000"
                },
                {
                    "lightness": 19
                }
            ]
        },
        {
            "featureType": "water",
            "elementType": "geometry",
            "stylers": [
                {
                    "color": "#000000"
                },
                {
                    "lightness": 17
                }
            ]
        }
    ], {name: 'Styled Map'});


        // Lat-Lang PEA
        var pea = {lat: 45.495943, lng: 9.645550};
        // Creo la mappa 
        var map = new google.maps.Map(
            document.getElementById('map-footer'), {
              zoom: 16, 
              center: pea,
              disableDefaultUI: true
            });

        //Associate the styled map with the MapTypeId and set it to display.
            map.mapTypes.set('styled_map', styledMapType);
            map.setMapTypeId('styled_map');

        //Custom icona pea
        var iconapea = {
          url: themeURL + '/src/assets/iconaMappa.svg',
          scaledSize: new google.maps.Size(40,40),
          scale: 1
        }

        var urlMappa = 'https://www.google.com/maps/place/Agenzia+Pea+-+Pratiche+Automobilistiche/@45.4959308,9.6433236,17z/data=!3m1!4b1!4m5!3m4!1s0x478137e208adca29:0xdcabdf25c2bb07f2!8m2!3d45.4959308!4d9.6455176';
        //Marker PEA
        var marker = new google.maps.Marker({
          position: pea, 
          map: map,
          icon: iconapea, 
          url: urlMappa
        });


         marker.addListener('click', function() {
          window.location.href = this.url;
        });

        // google.maps.event.addListener(marker,'click', (function(marker,content){ 
        //       return function() {
        //         map.panTo(marker.getPosition());
        //         map.setZoom(10);
        //       };
        //     })(marker,content))
           

}

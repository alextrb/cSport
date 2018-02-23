var map, i, myLatLng = {lat: -25.363, lng: 131.044};
        //myLatLng = [{"lat":48.49,"lng":2.26},{"lat":152,"lng":145}];

      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: -34.397, lng: 150.644},
          zoom: 8
        });
        
        var marker = new google.maps.Marker({
          position: myLatLng,
          map: map,
          title: 'Hello World!'
        });
        /*
        for(i in myLatLng){
            var marker = new google.maps.Marker({
              position: i,
              map: map,
              title: 'Hello World!'
            });
        } */
    }


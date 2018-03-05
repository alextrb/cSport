var map, i; //myLatLng = {lat: -10, lng: 131.044};
var myLatLng = [{"lat": 50, "lng": 90}, {"lat": -15, "lng": 110}];

window.alert(json_locations[0]);
window.alert(myLatLng[0]);


function initMap() {
    var uluru = {lat: -10, lng: 100.044};
    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 4,
        center: uluru
    });

    var marker = new google.maps.Marker({
        position: uluru,
        map: map
    });

    myLatLng.forEach(function(coords) {
        var test = {lat: coords.lat, lng: coords.lng};
        var marker = new google.maps.Marker({
            position: test,
            map: map
        });
    });
}
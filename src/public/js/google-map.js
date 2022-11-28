function myMap(latitude = 23.6115 , longitude = 90.9773) {

    var mapProp= {
      center:new google.maps.LatLng(latitude, longitude),
      zoom:5,
    };
    var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
    }
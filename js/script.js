function iniciarMap(){
    var coord = {lat:4.711304591065647 ,lng:-74.07326653211635};
    var map = new google.maps.Map(document.getElementById('map'),{
      zoom: 15,
      center: coord
    });
    var marker = new google.maps.Marker({
      position: coord,
      map: map
    });
}
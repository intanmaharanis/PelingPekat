    myMap();
    function myMap() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
        } else {
            x.innerHTML = "Geolocation is not supported by this browser.";
        }
    }

    function showPosition(position) {
        lat = position.coords.latitude;
        long = position.coords.longitude;
        // alert(lat);
        // var latlong = new google.maps.LatLng(lat, long);
        $('#lat').val(lat);
        $('#long').val(long);
        defaultMaps();
    }

    function defaultMaps() {
        var lat = $('#lat').val();
        var long = $('#long').val();
        $('#googleMap').locationpicker({

            location: {
                latitude: lat,
                longitude: long
            },
            radius: 0,
            inputBinding: {
                latitudeInput: $('#lat'),
                longitudeInput: $('#long'),
                locationNameInput: $('#location')
            },
            // enableAutocomplete: true,
            // onchanged: function(currentLocation, radius, isMarkerDropped) {
            //     // alert("Location changed. New location (" + currentLocation.latitude + ", " + currentLocation.longitude + ")");
            // }
        });
    }


    // $(function() {
    //     $('#googleMap').locationpicker({

    //         location: {
    //             latitude: lat,
    //             longitude: long
    //         },
    //         radius: 0,
    //         zoom: 1,
    //         inputBinding: {
    //             latitudeInput: $('#lat'),
    //             longitudeInput: $('#long'),
    //             locationNameInput: $('#location')
    //         },
    //         enableAutocomplete: true,
    //         onchanged: function(currentLocation, radius, isMarkerDropped) {
    //             // alert("Location changed. New location (" + currentLocation.latitude + ", " + currentLocation.longitude + ")");
    //         }
    //     });


    // });

    // var loadFile = function(event) {
    //     var reader = new FileReader();
    //     reader.onload = function() {
    //         var output = document.getElementById('output');
    //         output.src = reader.result;
    //     };
    //     reader.readAsDataURL(event.target.files[0]);
    // };
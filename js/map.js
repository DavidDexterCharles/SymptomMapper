function getData()
    {
                var southWest = new google.maps.LatLng(40.744656, -74.005966);
                var northEast = new google.maps.LatLng(34.052234, -118.243685);
                var lngSpan = northEast.lng() - southWest.lng();
                var latSpan = northEast.lat() - southWest.lat();
              
                

                 // set multiple marker
                var data = {
                    position:[],
                    marker:[]
                };
                for (var i = 0; i <50; i++) {

                    

                    // init markers
                    var obj = {
                        position: new google.maps.LatLng(southWest.lat() + latSpan * Math.random(), southWest.lng() + lngSpan * Math.random()),
                        map:{},
                        title: 'Click Me ' + i
                    };

                    
                    data.position.push(obj.position);
                    data.marker.push(obj);
                    
                   
                    
                    

                    // process multiple info windows
                    
                }

                return data;
        
    }
    
    function initMap(list){
         var options = {
                    zoom: 5,
                    center: new google.maps.LatLng(39.909736, -98.522109), // centered US
                    mapTypeId: google.maps.MapTypeId.TERRAIN,
                    mapTypeControl: false
                };

                // init map
                var map = new google.maps.Map(document.getElementById('map_canvas'), options);
                var heatmap;
                // NY and CA sample Lat / Lng
              

                list.marker.forEach(function(ele,i){
                    ele.map=map;
                    //console.log(ele);
                     var marker = new google.maps.Marker(ele);
                    (function(marker, i) {
                        // add click event
                        google.maps.event.addListener(marker, 'click', function() {
                            infowindow = new google.maps.InfoWindow({
                                content: 'Hello, World!!'
                            });
                            infowindow.open(map, marker);
                        });
                    })(marker, i);
                });

                heatmap =new google.maps.visualization.HeatmapLayer({
                            data:list.position,
                            map:map    
                    });
    }

       /* // check DOM Ready
        $(document).ready(function() {
            
        });
         $( window ).load(function () {
           (function () {
                // map options
               initMap();
            })();
        });*/
            // execute
            
        
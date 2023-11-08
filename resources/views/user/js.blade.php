<script src="./user/lib/jquery/jquery.min.js"></script>
<script src="./user/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="./user/lib/ionicons/ionicons.js"></script>
<script src="./user/lib/jquery.flot/jquery.flot.js"></script>
<script src="./user/lib/jquery.flot/jquery.flot.resize.js"></script>
<script src="./user/lib/chart.js/Chart.bundle.min.js"></script>
<script src="./user/lib/peity/jquery.peity.min.js"></script>

<script src="./user/js/azia.js"></script>
<script src="./user/js/chart.flot.sampledata.js"></script>
<script src="./user/js/dashboard.sampledata.js"></script>
<script src="./user/js/jquery.cookie.js" type="text/javascript"></script>
<script src="https://www.bing.com/maps/sdkrelease/mapcontrol?callback=getMap"></script>
<script>
"use strict";

let map, searchManager;

function getMap() {
    map = new Microsoft.Maps.Map("#map", {
        credentials: 'AuOnxsRyLcRrwYPYOrpgMqwYacU8C5fChLQxUMqk-Lj5XdFOtuqmmgRHSVrXi7RU',
    });

    // Listen for the input event on the location input field
    const locationInput = document.getElementById("pickup_location");
    locationInput.addEventListener("input", () => {
        const locationValue = locationInput.value;
        // Call the geocoding function when the input changes
        geocodeQuery(locationValue);
    });
}

function geocodeQuery(query) {
    if (!searchManager) {
        Microsoft.Maps.loadModule("Microsoft.Maps.Search", function () {
            searchManager = new Microsoft.Maps.Search.SearchManager(map);
            geocodeQuery(query);
        });
    } else {
        let searchRequest = {
            where: query,
            callback: function (r) {
                map.entities.clear(); // Clear previous results
                if (r && r.results && r.results.length > 0) {
                    var pin = new Microsoft.Maps.Pushpin(r.results[0].location);
                    map.entities.push(pin);
                    map.setView({ bounds: r.results[0].bestView });
                }
            },
        };
        searchManager.geocode(searchRequest);
    }
}
</script>
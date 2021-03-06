mapboxgl.accessToken = "pk.eyJ1IjoiY3Jpc21lOTUiLCJhIjoiY2t1bXlqeXkyM3c1bTJvcWxhNHQ3bW1pcyJ9.ZH0EJaGSkwfVWMEQhRT4tA";

const map = new mapboxgl.Map({
	container: "map",
	style: "mapbox://styles/crisme95/ckuqepm011knw15mlby7fghtc",
	center: [-73.6775, 42.73],
	zoom: 15,
});

$.getJSON("assets/geojson.json", function (json) {
	console.log(json); // this will show the info it in developer tools console
	// add markers to map
	for (const { geometry, properties } of json.features) {
		// create a HTML element for each feature
		const el = document.createElement("div");
		el.className = "marker";

		// make a marker for each feature and add to the map
		new mapboxgl.Marker(el)
			.setLngLat(geometry.coordinates)
			.setPopup(
				new mapboxgl.Popup({ offset: 25 }) // add popups
					.setHTML(`<h3>${properties.title}</h3><h4>${properties.locationType}</h4><p>${properties.description}</p>`)
			)
			.addTo(map);
	}

	// creates draggable marker which generates coordinates based on position on map
	if (document.URL.includes("suggest.php")) {
		const coordinates = document.getElementById("coordinates");
		const lngForm = document.getElementById("inputLongitude");
		const latForm = document.getElementById("inputLatitude");
		const marker = new mapboxgl.Marker({
			draggable: true,
		})
			.setLngLat([-73.6775, 42.73])
			.setPopup(new mapboxgl.Popup({ offset: 50 }).setHTML("<h3>Want to suggest this location?</h3><p>Fill out the form on the right.</p>"))
			.addTo(map);

		function onDragEnd() {
			const lngLat = marker.getLngLat();
			coordinates.style.display = "block";
			coordinates.innerHTML = `Longitude: <p id="longitude">${lngLat.lng}</p><br />Latitude: <p id="latitude">${lngLat.lat}</p>`;
			lngForm.value = lngLat.lng;
			latForm.value = lngLat.lat;
		}

		marker.on("dragend", onDragEnd);
	}
});

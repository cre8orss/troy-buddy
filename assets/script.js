
mapboxgl.accessToken = 'pk.eyJ1IjoiY3Jpc21lOTUiLCJhIjoiY2t1bXlqeXkyM3c1bTJvcWxhNHQ3bW1pcyJ9.ZH0EJaGSkwfVWMEQhRT4tA';

const map = new mapboxgl.Map({
  container: 'map',
  style: 'mapbox://styles/crisme95/ckuqepm011knw15mlby7fghtc',
  center: [-73.6775, 42.73],
  zoom: 15
});

const geojson = {
  type: 'FeatureCollection',
  features: [
    {
      type: 'Feature',
      geometry: {
        type: 'Point',
        coordinates: [-73.67746684445308, 42.73008980117925]
      },
      properties: {
        title: 'Rensselaer Polytechnic Institute',
        description: 'Landmark'
      }
    },
    {
      type: 'Feature',
      geometry: {
        type: 'Point',
        coordinates: [-73.67893648495593, 42.726907027257965]
      },
      properties: {
        title: 'Big Apple Pizzeria',
        description: 'Restaurant'
      }
    }
  ]
};

// add markers to map
for (const { geometry, properties } of geojson.features) {
  // create a HTML element for each feature
  const el = document.createElement('div');
  el.className = 'marker';

  // make a marker for each feature and add to the map
  new mapboxgl.Marker(el)
    .setLngLat(geometry.coordinates)
    .setPopup(new mapboxgl.Popup({ offset: 25 }) // add popups
      .setHTML(`<h3>${properties.title}</h3><p>${properties.description}</p>`)
    ).addTo(map);

}

// Generates coordinates based on mouse position on map

// map.on('mousemove', (e) => {
//   document.getElementById('info').innerHTML =
//     // `e.point` is the x, y coordinates of the `mousemove` event
//     // relative to the top-left corner of the map.
//     JSON.stringify(e.point) +
//     '<br />' +
//     // `e.lngLat` is the longitude, latitude geographical position of the event.
//     JSON.stringify(e.lngLat.wrap());
// });

// creates draggable marker which generates coordinates based on position on map
if (document.URL.includes("suggest.html")) {
  const coordinates = document.getElementById('coordinates');
  const marker = new mapboxgl.Marker({
    draggable: true
  })
    .setLngLat([-73.6775, 42.73])
    .setPopup(new mapboxgl.Popup({offset: 50})
    .setHTML('<h3>Want to suggest this location?</h3><p>Fill out the form on the right.</p>'))
    .addTo(map);

  function onDragEnd() {
    const lngLat = marker.getLngLat();
    coordinates.style.display = 'block';
    coordinates.innerHTML = `Longitude: ${lngLat.lng}<br />Latitude: ${lngLat.lat}`;
  }

  marker.on('dragend', onDragEnd);
}

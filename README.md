# Troy-Buddy

CRE8's group project for Web Systems Development.

Troy Buddy is a web application which serves as an easily accessible tool that highlights Troy’s landmarks. Users can search for local
landmarks and get relevant information about these locations. When users land on our homepage, they can see a carousel which shows
images of locations in Troy. There is also a search bar which will allow users to discover already documented locations or what type
of locations they want. There is also some text giving some info about Troy as well as weather widget, some trending search, and the
option to add their email to a mailing list. On the suggest page, users are able to drag a marker along our map and pin point any
location they want to add. When they give the name and what type of location it is, the coordinates will automatically be saved and
a new location will be created. Already saved locations are still shown so that users known which locations are already saved. The
explore page has a full screen map that users can look through and find what locations other people have put. The search page is
where users can search the entire database to find restaurants or locations. The log in and sign up pages allow users to log in
or sign up through their respective forms.

Cristian - suggest.php, explore.php

The suggest.php page was created for the map suggestion portion of our website. The page features a nav bar at the top which is made with Bootstrap and the other parts of the page are formatted with Boostrap containers. On the left portion of the page, there is our map with the locations that were stored on the locations table in the database and to the right of the map is the form where users can suggest alocation. The form requires for the user to fill out all the fields, the validation is done through PHP, and then the form submits. When the form is submitted, the data is then inserted into the locations table and then the geojson.json file gets generated with all the locations currently on the table. Once the JSON file is generated, the page is reloaded and the new location can be seen on the map. On our side, we moderate the locations that are input into our table and we can edit or remove the locations as we please. I first started by using Bootstrap to build the form and then ported in the Mapbox map onto the page. To create the pointer which generates the coordinates on the map, I read through the Mapbox API documentation and also looked into how to create pop-ups for the locations on the map. This is all done through JavaScript which is in our script.js file. The JavaScript handles loading the locations on the map and pointer on the suggest.php page. At first, we decided to have users suggest any location type but that would become to hard to moderate. Intead, we have a set list of location types and the user can scroll through them on the location type list. On our explore page, the map takes up the entire screen and the user is able to scroll around on the map. It's the same map as the suggest.php page but the pointer and form inputs are disabled. The locations on the map are loaded in the same way as the suggest.php page.  

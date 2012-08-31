GoogleMaps
==========

A Zend Framework 2 module that provides a PHP wrapper to the Google Maps Geocoding API

Geocoding example
-----------------

This example show how to use ZF2 GoogleMaps module to find locations by address (geocoding).

    use GoogleMaps;

    $address = '1600 Amphitheatre Parkway, Mountain View, CA';
    $request = new Request();
    $request->setAddress($address);
    $proxy = new Geocoder();
    $response = $proxy->geocode($request);

    var_dump($response);

Reverse geocoding example
-------------------------

This example show how to use ZF2 GoogleMaps module to find locations by latitude and longitude (reverse geocoding).

    use GoogleMaps;

    $lat = 40.714224;
    $lng = -73.961452;
    $request = new Request();
    $request->setLatLng($lat . ',' . $lng);
    $proxy = new Geocoder();
    $response = $proxy->geocode($request);

    var_dump($response);
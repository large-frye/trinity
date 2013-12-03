<?php

$ch = curl_init('http://maps.googleapis.com/maps/api/geocode/json?address=4334+Jonathan+Ct.+Dumfries,+VA&sensor=false');
curl_setopt($ch, CURLOPT_URL, $details_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

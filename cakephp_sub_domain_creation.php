<?php 
// Assuming the form submit data is available in $data variable

$subdomain = $data['subdomain']; // get the subdomain name from form data

// Set up the base URL and API key for the hosting provider's API
$api_url = "https://api.hosting-provider.com/v1/domains/subdomains";
$api_key = "your_api_key_here";

// Set up the request data to create a new subdomain
$request_data = array(
    "subdomain" => $subdomain,
    "action" => "create"
);

// Set up the cURL request to the hosting provider's API
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $api_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($request_data));
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    "Authorization: Bearer " . $api_key,
    "Content-Type: application/json"
));

// Execute the cURL request and get the response
$response = curl_exec($ch);

// Check if the response is successful
if ($response !== false) {
    $response_data = json_decode($response, true);
    if ($response_data["success"]) {
        // The subdomain was created successfully
        // Do whatever you want here, such as redirecting the user to a success page
        // or showing a success message
    } else {
        // The subdomain creation failed
        // Handle the error here, such as showing an error message to the user
    }
} else {
    // The cURL request failed
    // Handle the error here, such as showing an error message to the user
}

// Close the cURL request
curl_close($ch);
?>
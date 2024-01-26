<?php

// What is the CURL :
# is a Tool which gives us the possibility to interact , remotely to other services - Resources , get the information from the following URL , 
# we have already seen that i can actually get the informatino , using - file_get_content(); , but sometimes file_get_content() is blocked in terms of some security policies 
# and file_get_content() can't be used if we want to pass some additional headers to the Request or if we want to post some information , there we need to use the CUrl,

// $url = '';

// Sample exampe to get data . 
# first we need to use curl_init() : to start this url , and the curl_init() create a Resource and returns that Resource .
# in php we have seven variables types : String , Int , Float/Double , Boolean , Null , Array , Object , Resource 
# and the Resource is that which retruns from that url 
# after create that Resource for the URL : we need to set a couple of options on that Resource
# by using curl_setopt( the_resource , key , corresponds );
# on that Resource we set the following key to be true or false 
# after this , we call curl_exec() , which make the execution on the Resource and returns the result , that is the user's JSON .

$url = 'https://jsonplaceholder.typicode.com/users';

$resource = curl_init($url);

curl_setopt($resource , CURLOPT_RETURNTRANSFER , true);
curl_setopt($resource, CURLOPT_SSL_VERIFYPEER, false);

$result = curl_exec($resource); // send HTTP GET method and store the Response in the $result variable as JSON => CURLOPT_RETURNTRANSFER transfer the response into string of json 


if ($result === false) {
    echo 'Curl error: ' . curl_error($resource);
} else {
    echo $result;
}


// if we want to get the Status code of that , we need tu use curl_getinfo($resource) : this returns a lot of information .
curl_close($resource);

$info = curl_getinfo($resource);

echo "The Info from the URL is : \n";
print_r($info);


/*
[url] => https://jsonplaceholder.typicode.com/users
    [content_type] => application/json; charset=utf-8
    [http_code] => 200
    [header_size] => 1050
    [request_size] => 70
    [filetime] => -1
    [ssl_verify_result] => 20
    [redirect_count] => 0
    [total_time] => 0.294589
    [namelookup_time] => 0.013899
    [connect_time] => 0.090919
    [pretransfer_time] => 0.20994
    [size_upload] => 0
    [size_download] => 5645
    [speed_download] => 19162
    [speed_upload] => 0
    [download_content_length] => -1
    [upload_content_length] => 0
    [starttransfer_time] => 0.281924
    [redirect_time] => 0
    [redirect_url] =>
    [primary_ip] => 188.114.97.6
    [certinfo] => Array
        (
        )

    [primary_port] => 443
    [local_ip] => 192.168.1.107
    [local_port] => 59215
    [http_version] => 3
    [protocol] => 2
    [ssl_verifyresult] => 0
    [scheme] => HTTPS
    [appconnect_time_us] => 207896
    [connect_time_us] => 90919
    [namelookup_time_us] => 13899
    [pretransfer_time_us] => 209940
    [redirect_time_us] => 0
    [starttransfer_time_us] => 281924
    [total_time_us] => 294589
    [effective_method] => GET
*/

// OR , we can specify , CURLINFO_HTTP_CODE 

// Get response status code 


$httpCode = curl_getinfo($resource , CURLINFO_HTTP_CODE);
echo "the Http code is : $httpCode\n";

// after that , we need to call curl_close( the_resource ); 
#  after we call the curl_close() , we can't actullay get any info on this $url  



#   $url = 'https://jsonplaceholder.typicode.com/users';: Defines the URL of the endpoint you want to fetch data from.
#   $resource = curl_init($url);: Initializes a cURL session (curl_init) with the specified URL, creating a cURL handle ($resource) for further configuration.

#   curl_setopt($resource, CURLOPT_RETURNTRANSFER, true);: Sets an option on the cURL handle ($resource) to return the response data as a string (CURLOPT_RETURNTRANSFER).
#   This option tells cURL to return the response from the server as a string rather than outputting it directly.

#   $result = curl_exec($resource);: Executes the cURL request (curl_exec) using the configured cURL handle ($resource).
#   It sends the request to the specified URL and retrieves the response.



// Post Request  and set_opt_array

# make a POST Request on that endpoint 

# 1- init : curl_init(); => this return the resource : the handle $resource

$POSTresource = curl_init();

# 2- set optins 
#   2.1 - we have curl_setopt( handle , option , value );
#   2.1 - we have curl_setopt_array( handle , [ associative array of optoins and values]  );

$user = [
    'name'  =>  'jhon Doe',
    'username'  =>  'jhon',
    'email'  =>  'jhon@example.com',
];

curl_setopt_array($resource  , [
    CURLOPT_URL => $url ,   // so the url on which I want to make request is the following $url
    CURLOPT_RETURNTRANSFER => true , // I want actullay to get the response 
    CURLOPT_POST => true ,  // it's true , because I want to create I new user . 
    CURLOPT_HTTPHEADER  =>  ['content-type: Application/json'],
    CURLOPT_POSTFIELDS  =>  json_encode($user),
]);

# then executae the result 

$POSTresult = curl_exec($resource);

echo $POSTresult ; 

#     CURLOPT_POSTFIELDS  =>    : the user that i want actually to create .
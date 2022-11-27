<?php

function curl_post($data)
{

    $curl = curl_init();

    curl_setopt_array(
        $curl,
        array(
            CURLOPT_URL => $data['url'],
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => $data['method'],
            CURLOPT_POSTFIELDS => $data['body'],
            CURLOPT_HTTPHEADER => $data['header'],
        )
    );

    $response = curl_exec($curl);

    curl_close($curl);

    return json_decode($response, true);
}
function claim_voucher($token, $promocode)
{
    $dateTime = new DateTime();
    // Override current time
    $timestamp = $dateTime->getTimestamp();
    $data = array(
        'url' => 'https://api.gojekapi.com/go-promotions/v1/promotions/enrollments',
        'method' => 'POST',
        'body' => '{"promo_code":"' . $promocode . '"}',
        'header' => array(
            'X-AppId:  com.go-jek.ios',
            'X-PhoneModel:  Apple, iPhone X',
            'User-Agent:  Gojek/4.48.0 (com.go-jek.ios; build:36012209; iOS 15.5.0) NetworkSDK/1.3.2',
            'X-Updater:  1',
            'X-PhoneMake:  Apple',
            'Authorization: Bearer ' . $token . '',
            'X-UniqueId: ' . '10D775E3-340B-4AD2-963C-E9E234BA5170' . '',
            'Connection:  keep-alive',
            'X-User-Locale:  id_ID',
            'Accept-Language:  id-ID',
            'X-DeviceOS:  iOS, 15.5',
            'X-Platform:  iOS',
            'X-AppVersion:  4.48.0',
            'Accept:  */*',
            'Content-Type:  application/json',
            'X-PushTokenType:  APN',
            'Accept-Encoding:  br;q=1.0, gzip;q=0.9, deflate;q=0.8',
            'X-User-Type:  customer',
        )

    );

    return curl_post($data);
}

$clain = claim_voucher('eyJhbGciOiJSUzI1NiIsImtpZCI6IiJ9.eyJhdWQiOlsiZ29qZWs6Y29uc3VtZXI6YXBwIl0sImRhdCI6eyJhY3RpdmUiOiJ0cnVlIiwiYmxhY2tsaXN0ZWQiOiJmYWxzZSIsImNvdW50cnlfY29kZSI6Iis2MiIsImNyZWF0ZWRfYXQiOiIyMDIyLTExLTI3VDEzOjM0OjI2WiIsImVtYWlsIjoiZmFyaHVubmlzYS5maXJnYW50b3JvQGdtYWlsLmNvLmlkIiwiZW1haWxfdmVyaWZpZWQiOiJmYWxzZSIsImdvcGF5X2FjY291bnRfaWQiOiIiLCJuYW1lIjoiUGF1bGluIFJhaGF5dSBNYXJ5YXRpIiwibnVtYmVyIjoiODU3OTA0NjUwMzciLCJwaG9uZSI6Iis2Mjg1NzkwNDY1MDM3Iiwic2lnbmVkX3VwX2NvdW50cnkiOiJJRCIsIndhbGxldF9pZCI6IiJ9LCJleHAiOjE2NzI2NzI0MjAsImlhdCI6MTY2OTU1NjA4NCwiaXNzIjoiZ29pZCIsImp0aSI6ImFmNTNiYjlkLThjZjMtNDgzZS05ZDkzLWZiM2Q4MTc5MmI4MSIsInNjb3BlcyI6W10sInNpZCI6IjUzOWY1OTI0LTVhNWItNDgxYi1iODU5LWJiN2ZmZmU3YWUzOCIsInN1YiI6IjI2YzFlZDY3LTQzNGEtNGUyNC04OGEwLTEyYzhiOWM0MmUwNiIsInVpZCI6Ijc4OTUxNTI2OSIsInV0eXBlIjoiY3VzdG9tZXIifQ.RJKoeu029vLI96BrkThS2DSY46PV1M7qq4a1y07ACxZunFGOvMf6AuJ78-e8LmtcGm01gv-085M_1Bj4dqsmnwvemCVhJqEU0-7vU1OHHnysfEvzNdwYC5DcPx-HbjwZl0dkiXnk27cQrOnGQ13IZEMbSY3ZlsKKBYiTJfO9Z4w', 'BOXDISKON');
print_r($clain);
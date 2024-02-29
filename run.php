<?php

$number = $_GET['number'];
$msg = $_GET['msg'];

$data = array(
    'phone' => $number,
    'secret_key' => $msg
);

$postData = json_encode($data);

$headers = array(
    'user-agent: Dart/3.2 (dart:io)',
    'accept: application/json',
    'accept-encoding: gzip',
    'content-length: ' . strlen($postData),
    'host: htmind.live',
    'authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiNWIyZDY2NDI0M2Q3NTljOTEyN2Q4Y2Q4OTZhNDQ3MGNkNjA1Y2E5ZGY3ZWQ2NjZlOGMwNjY0NTI0ZmM0ZDhmYTI3MTRhMmY2MDFhNmZjNTciLCJpYXQiOjE3MDkxNDY2NjksIm5iZiI6MTcwOTE0NjY2OSwiZXhwIjoxNzQwNzY5MDY5LCJzdWIiOiIxMDAyNDciLCJzY29wZXMiOltdfQ.qLb_uInMusvLqDs7Gar17lhsv7JG3kV2_6IjCMvwylRnn7-h14Hae0hfYDFD7WzWT5kqiHOH9RV6dQVRabJNpnS_-ZP_m2GiOqE2POIto7fpDNAxzi-UlnWu3xK_y7pSDbs0gIw4_hIUQlmDm8w1edNJyvVrrFxnEKpfL9YWG0ao1-IYXV3Sj902E53pCjThQPo4rQpjxMbCGfsbXaLgPWVSjXz9k9WPEiym9PGWMkvqa6BTOFaJQyHrHIPv7F6P7IMFP1pVEtMjkOBo1vl02KMQtsJPxu3bo-p5s8618Wmc274oAhJQI7h3hoYTbv2jDQ4Mwx8iXiQkG1lyI1lcwVVk0jEqxufP9X8ZZXTx1jS7P6vVMIbp-BO3jDYnkCM_4H5HKVCSa-NSWq2yz2RzwSrsRM-Fp_NKoMBk3whDdcWUsrssegrpVxwcSAUAfHJs53Vq35tSn7tq_nCOrcYFUDuic8vDraAz4gD4bi0TtpYifsJNQ4F5C9WqiuQA5i0G2e5EM-1hj5iVLgn_PKzGCLOKKbowpNmFD3pz6QVe4uW_Oq9AxDeAmOLGOc8JLfelZFUlH9i1NNrNq75lGhfVfT1QdY0B7XFW4pm2ai8lluVqt25vy4-XQeMoCM08Bs8QqKyZ9tAiPuVWxg5nFruiSNcSD1VMfCYVAZP1-01qrj0',
    'content-type: application/json'
);

$url = 'https://htmind.live/api/user/otp-request';

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_ENCODING, ''); 

$response = curl_exec($ch);

if ($response === false) {
    echo 'cURL error: ' . curl_error($ch);
} else {

    if (strpos($response, "\x1f\x8b\x08") === 0) {
        $response = gzdecode($response);
    }
    echo $response;
}

curl_close($ch);

?>

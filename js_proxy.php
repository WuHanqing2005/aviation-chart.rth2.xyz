<?php
header("Content-Type: application/javascript");
header("Access-Control-Allow-Origin: *");
$js_file = isset($_GET["js"]) ? $_GET["js"] : null;

if (empty($js_file)) {
    echo json_encode(["error" => "No JS file specified"]);
    exit();
}

if ($js_file == "pdf.mjs"){


$ch = curl_init("https://github.com/samleong123/aviation-chart-html5/raw/refs/heads/main/assets/js/pdfviewer/pdf.mjs");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36 Edg/132.0.0.0");
$response = curl_exec($ch);
$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

  if ($http_code == 200) {
        echo $response;
    } else {
        echo json_encode(["error" => "Failed to fetch the content"]);
    }

} else if ($js_file == "pdf.worker.mjs") {
    $ch = curl_init("https://github.com/samleong123/aviation-chart-html5/raw/refs/heads/main/assets/js/pdfviewer/pdf.worker.mjs");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36 Edg/132.0.0.0");
    $response = curl_exec($ch);
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($http_code == 200) {
        echo $response;
    } else {
        echo json_encode(["error" => "Failed to fetch the content"]);
    }
} else if ($js_file == "viewer.mjs") {
    $ch = curl_init("https://github.com/samleong123/aviation-chart-html5/raw/refs/heads/main/assets/js/pdfviewer/viewer.mjs");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); // Follow redirects
    curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36 Edg/132.0.0.0");
    $response = curl_exec($ch);
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($http_code == 200) {
        echo $response;
    } else {
        echo json_encode(["error" => "Failed to fetch the content"]);
    }
} else if ($js_file == "pdf.sandbox.mjs") {
    $ch = curl_init("https://github.com/samleong123/aviation-chart-html5/raw/refs/heads/main/assets/js/pdfviewer/pdf.sandbox.mjs");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); // Follow redirects
    curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36 Edg/132.0.0.0");
    $response = curl_exec($ch);
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($http_code == 200) {
        echo $response;
    } else {
        echo json_encode(["error" => "Failed to fetch the content"]);
    }
}else {
    echo json_encode(["error" => "Invalid request"]);
}

?>
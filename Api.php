<?php
//use in this fromat api.php?image=
if (isset($_GET['image'])) {
    $userAgent = 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36';
 //By @Devsnp
    $searchQuery = urlencode($_GET['image']); 
    $searchUrl = "https://www.google.com/search?q=$searchQuery&tbm=isch";
 //By @Devsnp
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $searchUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_USERAGENT, $userAgent);
 //By @Devsnp
    $html = curl_exec($ch);
 //By @Devsnp
    curl_close($ch);
 //By @Devsnp
    preg_match_all('/<img[^>]+src="([^">]+)"/', $html, $matches);
    $imageUrls = $matches[1];

    $imageResults = array();

    foreach ($imageUrls as $imageUrl) {
        $imageResults[] = $imageUrl;
    }

    
    header('Content-Type: application/json');
echo json_encode($imageResults, JSON_UNESCAPED_SLASHES);

}
?>

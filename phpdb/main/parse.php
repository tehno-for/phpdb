<!doctype html>
<html lang="en">
  <head>
    <title>PP</title>
    <meta charset="utf-8">
  </head>
  <body>
  <?php 
    for($i=5810; $i < 5830; $i++) {
      // Main API part
      $curl_handle=curl_init();
      curl_setopt($curl_handle, CURLOPT_URL,'https://master.az/wp-json/wp/v2/product/'.$i);
      curl_setopt($curl_handle, CURLOPT_CONNECTTIMEOUT, 2);
      curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($curl_handle, CURLOPT_USERAGENT, 'Your application name');
      $query = curl_exec($curl_handle);
      curl_close($curl_handle);
      $json_a = json_decode($query, true);
      if($json_a['id']) {
        $fileName = $json_a['title']['rendered'];
        echo $json_a['id']."<br>";
        echo $json_a['title']['rendered']."<br>";
        echo $json_a['content']['rendered']."<br>";    
        
        // Media part
        $img_name = $json_a['slug'].'-ft.jpg'; // echo $img_name.'<br>';
        $media = file_get_contents($json_a['_links']['wp:featuredmedia'][0]['href']); // echo $json_a['_links']['wp:featuredmedia'][0]['href']."<br>";
        $json_media = json_decode($media, true);
        $url = $json_media['guid']['rendered']; // echo $json_media['guid']['rendered']."<br>";
                
        try {
          file_put_contents($img_name, file_get_contents($url));
          echo "Downloaded media ".$json_media['id'].'<br><br><br><br><br><br>'; // echo $json_media['id'].'<br>';
        } catch(Execution $e){
          echo "Problem with file";
        }
      }       
    }

    
?>
  </body>
</html>

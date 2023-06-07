<!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="css.css" />
  <title>Accident-Detection</title>
</head>




  <style>
    .image-container {
      display: inline-block;
      position: relative;
      margin: 10px;
    }
    
    .image-container img {
      display: block;
      width: 100%;
      height: auto;
    }
    
    .image-container .overlay {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.6);
      opacity: 0;
      transition: opacity 0.3s ease;
    }
    
    .image-container:hover .overlay {
      opacity: 1;
    }
    
    .image-container .overlay-content {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      color: #fff;
      text-align: center;
    }
  </style>
</head>
<body>

<?php
$directory = "give revelevant file location/";
$files = glob($directory . "*.{jpg,jpeg,png,gif}", GLOB_BRACE);

if (empty($files)) {
  echo "<h1 style = 'color:Blue;'>No Accident Detected Yet!..</h1>";
} else {
  echo "<h1 style='color:Red;'>Alert!.. Alert!!..</h1>";
  echo "<h1 style='color:Black;'>Accident Detected!</h1><br><br>";
  foreach ($files as $image) {
    echo '<div class="image-container">';
    echo '<img src="' . $image . '" alt="Image" style="width:280px;" />';
    echo '<div class="overlay">';
    echo '<div class="overlay-content">Click to enlarge</div>';
    echo '</div>';
    echo '</div>';
  }
}
?>

<script>
  var imageContainers = document.querySelectorAll('.image-container');
  
  imageContainers.forEach(function(container) {
    container.addEventListener('click', function() {
      var image = this.querySelector('img');
      var imageUrl = image.getAttribute('src');
      var overlay = this.querySelector('.overlay');
      
      // Open the image in a new tab or window
      window.open(imageUrl, '_blank');
      
      // Alternatively, you can open the image in a lightbox or modal
      // Implement the lightbox or modal functionality here
    });
  });
</script>

</body>
</html>

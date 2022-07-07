<?php

function importTemplateFromFile( $filepath = null ) {  
    $path = $filepath;
    $name = basename($path);
    $registered_sources = \Elementor\Plugin::$instance->templates_manager->get_registered_sources();
    $file_content = file_get_contents($path);
    $file_content = json_decode($file_content);
    $getTemplate = get_page_by_title($file_content->title, OBJECT, 'elementor_library');
    $getTemplateByID = isset($file_content->id) ? get_post($file_content->id) : null;
    if ($getTemplate || $getTemplateByID) {
      $fileContentArr = [];
      foreach($file_content as $key => $value) {
        if ($key == 'content')
          $fileContentArr[$key] = json_encode($value);
        else
          $fileContentArr[$key] = $value;
      }
      $fileContentArr['source'] = 'local';
      $fileContentArr['id'] = $getTemplateByID ? $getTemplateByID->ID : $getTemplate->ID;

      $post_update = array(
        'ID'         => $fileContentArr['id'],
        'post_title' => $fileContentArr['title']
      );

      if ($getTemplateByID) wp_update_post( $post_update );

      \Elementor\Plugin::$instance->templates_manager->update_template($fileContentArr);
    } else {
      \Elementor\Plugin::$instance->templates_manager->import_template([
        'fileData' => base64_encode(file_get_contents($path)),
        'fileName' => $name
      ]);
    }
}

add_action( 'elementor/init', function(){
  $scanned_directory = scandir(__DIR__);
  for ($i = 0; $i < count($scanned_directory); $i ++) {
    if (pathinfo($scanned_directory[$i], PATHINFO_EXTENSION) == 'json' || pathinfo($scanned_directory[$i], PATHINFO_EXTENSION) == 'zip') {
      try {
        if (!file_exists(__DIR__ . '/del')) mkdir(__DIR__ . '/del');
        rename(__DIR__ . '/' . $scanned_directory[$i], __DIR__ . '/del/' . $scanned_directory[$i]);
      }
      catch(e) {

      }
      importTemplateFromFile(__DIR__ . '/del/' . $scanned_directory[$i]);
    }
  }
});
?>

<?php
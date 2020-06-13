<?php

// open db connection 
include_once('models/open_db.php');

// load models
include_once('models/tagcloud.model.php');

// create tagcloud here
$tagcloud = new tagcloud_model($mysqli);
$data['tag_list'] = $tagcloud->get_tag_list();
$data['tag_cloud'] = $tagcloud->get_tag_cloud();


// load view
include('views/tagcloud.view.php');





// close db connection 
include_once('models/close_db.php');



?>
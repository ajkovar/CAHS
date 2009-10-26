<?php
require_once('./modules/constants.php');
require_once('./modules/autoload.php');

if(isset($_GET['dayOffset'])) {
 	
 	$dayOffset =trim($_GET['dayOffset']);
 	
	// create response object
	$json = array();
	$timeBlock = new TimeBlock();
	$timeBlock->setByOffset($dayOffset, "0:00", 30);
	
	$json['html'] = "<h3> Available Resources on " . $timeBlock->getStartTime('F d, Y') . ":</h3>";
	 
	$json['html'] .= "<table border='1' class='result_table'><tr><th>Time Frame</th><th>Available Resources</th></tr>";	
	
	foreach ($shopHours as $i => $hour) {
		$timeBlock = new TimeBlock();
		$timeBlock->setByOffset($dayOffset, $hour, 30);
				
		$json['html'] .= "<tr><td><strong>" . $timeBlock->getStartTime('g:i a') . "</strong> to <strong>" . $timeBlock->getEndTime('g:i a') . "</strong></td><td>";
		
		$availableResources = $timeBlock->getAvailableResources("S");
		
		// if workspaces are available, display them
		
		if($availableResources!=null) {			
			foreach ($availableResources as $resource) {
					$json['html'] .= "<strong>" . $resource->name . ":</strong> " . ($resource->total - $resource->used) . "<br />";
			}
		}
		else $json['html'] .="<strong>There are no resources<br /> available during this time block.</strong>";
		
		$json['html'] .= "</td></tr>";
		
	}
	$json['html'] .= "</table>";
	
	
	 
	// encode array $json to JSON string
	$encoded = json_encode($json);
	 
	// send response back to index.html
	// and end script execution
	die($encoded);
}
 
 
 //$json['error'] = $shopHours//array();
	//$json['error'][] = 'Wrong email!';
	//$json['error'][] = 'Wrong hobby!';
?>
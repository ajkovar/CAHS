<?php
include('./modules/wrappers/header.php');
include('./modules/constants.php');
?>
<!-- Dependency -->
<script src="scripts/yui/build/yahoo/yahoo-min.js"></script>

<!-- Used for Custom Events and event listener bindings -->
<script src="scripts/yui/build/event/event-min.js"></script>

<!-- Source file -->
<script src="scripts/yui/build/connection/connection-min.js"></script>
<script src="<?php echo $scripts; ?>availableResources.js"></script>
			<div class="infoBox">
				
				<h2>Welcome to the Chicago Auto Hobby Shop!</h2>
				<p><strong>What day would like to view the resources for?</strong> </p>
				<p>Select a day: 
				<select style=" text-align:center;" onchange="populateResources()" name="day" id="day" />
				<option value="-1" >Choose</option>
				
				
<?php
$today=getdate();
$year=date('Y');
$month=date('m');
$day=date('d');

for($i=1;$i<16;$i++){
	echo "<option value='" . $i . "'>" . date('Y-m-d',mktime(0,0,0,$month,$day+$i,$year)) . "</option>";
}
?>

				</select></p>
				<div id="hourContent"></div>
			</div>			
<?php
include('./modules/wrappers/footer.html');
?>

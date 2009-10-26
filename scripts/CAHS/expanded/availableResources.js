function populateResources() {
	
	
	var resourceDateInput = document.getElementById("day").value;
	
	if(resourceDateInput!=-1) {
		var sUrl = "showAvailableResources.php" + "?dayOffset=" + resourceDateInput;
			
		var callback =
		{
		  success: responseSuccess,
		  failure: responseFailure
		};
	
		var transaction = YAHOO.util.Connect.asyncRequest('GET', sUrl, callback, null); 
	}
}
var responseSuccess = function(o){
		var response = eval('(' + o.responseText + ')');
	
		console.log("success");
		contentDiv = document.getElementById("hourContent");
		contentDiv.innerHTML = response.html;
		
};
	
var responseFailure = function(o){
		console.log("failure");
};
function populateResources(){var C=document.getElementById("day").value;if(C!=-1){var A="showAvailableResources.php?dayOffset="+C;var D={success:responseSuccess,failure:responseFailure};var B=YAHOO.util.Connect.asyncRequest("GET",A,D,null)}}var responseSuccess=function(o){var response=eval("("+o.responseText+")");console.log("success");contentDiv=document.getElementById("hourContent");contentDiv.innerHTML=response.html};var responseFailure=function(A){console.log("failure")};

function getStrucnaSprema(callback) {
	 
	 $.post("/gradimobuducnost/php/getStrucnaSprema.php", 
	 {}, 
	 function(result){
    	//alert(result);
		globalListStucnaSprema = result.split("@");
		callback();
	 });
}
	

function getZanimanje(callback) {
	
	$.post("/gradimobuducnost/php/getZanimanje.php", 
	 {
	    
	 }, 
	 function(result){
    	//alert(result);
		globalListZanimanje = result.split("@");
		callback();
});
}

function getDataAdmin(callback) {
	 //$.post("/gb/php/getAdmin.php", 
	 $.post("/gradimobuducnost/php/getAdmin.php", 
	 {
	    
	 }, 
	 function(result){

    	 $("#divResults").append(result);		
		callback();
});
}
  	

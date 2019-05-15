
function sendUserInfo() {
	var user = $('#name').val();
	var zanimanje = $('#zanimanje').val();
	var email = $('#email').val();
	var telefon = $('#telefon').val();
	var text = $('#message').val();

	 $.post("/gradimobuducnost/php/insertRadnik.php", 
	 {
	     user: user,
	     zanimanje: zanimanje,
	     email: email,
	     telefon: telefon,
	     text: text
	 }, 
	 function(result){
        alert(result);
  });
}

function posaljiPrijavu(){
	var ime = $('#prijavaIme').val();
	var prezime = $('#prijavaPrezime').val();
	var godinaRodjenja = $('#prijavaGodRodjenja').val();
	var strucnaSprema = $('#prijavaStrucnaSprema').val();
	var osnovnoZanimanje = $('#prijavaOsnovnoZanimanje').val();
	var sekundarnoZanimanje = $('#prijavaSekundarnoZanimanje').val();
	var kontaktTel = $('#prijavaKontaktBroj').val();

	
	//alert("ime = " + ime + " prezime= " + prezime + " godinaRodjenja= " + godinaRodjenja + " strucnaSprema= " + strucnaSprema +
	//		   " osnovnoZanimanje= " + osnovnoZanimanje + " sekundarnoZanimanje= " + sekundarnoZanimanje + " kontaktTel= " + kontaktTel);
	
	 $.post("/gradimobuducnost/php/insertPrijava.php", 
	 {
	     ime: ime,
	     prezime: prezime,
	     godinaRodjenja: godinaRodjenja,
	     strucnaSprema: strucnaSprema,
	     osnovnoZanimanje: osnovnoZanimanje,
	     sekundarnoZanimanje: sekundarnoZanimanje,
	     kontaktTel: kontaktTel
	 }, 
	 	function(result){
        	//alert(result);
        	if(result.indexOf('Uspešno') != -1){
        		$('#ajaxsuccess-prijava').slideDown('slow');
        	} else{
        		$('#err-form-prijava-postoji').slideDown('slow');
        	}
  	});
  	
}
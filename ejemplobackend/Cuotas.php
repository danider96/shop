<script src="js/jquery.js"></script>
<?php
include('simple_html_dom.php');

class Cuotas {
    
function cuotasLigaSantander(){
	
$base = 'https://www.marathonbet.es/es/popular/Football/Spain/Primera+Division/?menu=8736';
$partido = array();
$cuotas = array();
$local = "";
$curl = curl_init();
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt($curl, CURLOPT_HEADER, false);
curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($curl, CURLOPT_URL, $base);
curl_setopt($curl, CURLOPT_REFERER, $base);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
$str = curl_exec($curl);
curl_close($curl);

// Create a DOM object
$html_base = new simple_html_dom();
// Load HTML from a string
$html_base->load($str);

//get all category links
foreach($html_base->find('td+span') as $element) {
	
    echo $element.'</br> ';
	
}
?>
<script>
var contador=0;
var contacuotas=0;
var partidos = [];
var cuotas = [];
var local;
var cuot="";
$("span[data-selection-price]").css("background-color", "yellow");
$(".hint").prevAll().remove();
$(".hint").remove();
$(".event-more-view").remove();
$(".show-help-link").nextAll().remove();
$(".show-help-link").remove();
$("span").each(function(){
    if($(this).text().match(/^[a-zA-ZáéíóúàèìòùÀÈÌÒÙÁÉÍÓÚñÑüÜ_\s]+$/)){
		contador++;
			if(contador == 1){
				if($(this).text() == "Athletic Bilbao"){
					
					local = "Athletic Club";
					
				}else if($(this).text() == "Real Sociedad"){
					
					local = "Real Sociedad de Fútbol";
					
				}else if($(this).text() == "Deportivo de la Coruña"){
					
					local = "Deportivo de la Coruna";
					
				}else if($(this).text() == "Betis"){
					
					local = "Real Betis";
					
				}else{
					
					local = $(this).text();
					
				}
			}else if(contador == 2){
				
				if($(this).text() == "Athletic Bilbao"){
					
					partidos.push(local+" - "+"Athletic Club");
					contador = 0;
					
				}else if($(this).text() == "Real Sociedad"){
					
					partidos.push(local+" - "+"Real Sociedad de Fútbol");
					contador = 0;
					
				}else if($(this).text() == "Deportivo de la Coruña"){
					
					partidos.push(local+" - "+"Deportivo de la Coruna");
					contador = 0;
					
				}else if($(this).text() == "Betis"){
					
					partidos.push(local+" - "+"Real Betis");
					contador = 0;
					
				}else{
					
					partidos.push(local+" - "+$(this).text());
					contador = 0;
					
				}
			}
		$(this).css("background-color", "green");
					
					
	}else{
		contacuotas++;
		
			if(contacuotas == 3){
				
				cuotas.push(cuot+$(this).text());
				contacuotas = 0;
				cuot="";
			}else{
				cuot +=$(this).text()+" ";
				
				
			}
		
		
	}
});
$(document).ready(function(){
$.ajax({
          type: "POST",
          url: "ajax.php",
		  dataType: 'json',
          data: {'partidos':JSON.stringify(partidos),'cuotas':JSON.stringify(cuotas),'liga':455},//capturo array     
          success: function(data){
			  
		
        }
});
});
</script>
<?php
$html_base->clear(); 
unset($html_base);
	
	
}



function cuotasPremierLeague(){
	
	$base = 'https://www.marathonbet.es/es/popular/Football/England/Premier+League/?menu=21520';
$partido = array();
$cuotas = array();
$local = "";
$curl = curl_init();
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt($curl, CURLOPT_HEADER, false);
curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($curl, CURLOPT_URL, $base);
curl_setopt($curl, CURLOPT_REFERER, $base);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
$str = curl_exec($curl);
curl_close($curl);

// Create a DOM object
$html_base = new simple_html_dom();
// Load HTML from a string
$html_base->load($str);

//get all category links
foreach($html_base->find('td+span') as $element) {
	
    echo $element.'</br> ';
	
}
?>
<script>
var contador=0;
var contacuotas=0;
var partidos = [];
var cuotas = [];
var local;
var cuot="";
$("span[data-selection-price]").css("background-color", "yellow");
$(".hint").prevAll().remove();
$(".hint").remove();
$(".event-more-view").remove();
$(".show-help-link").nextAll().remove();
$(".show-help-link").remove();
$("span").each(function(){
    if($(this).text().match(/^[a-zA-ZáéíóúàèìòùÀÈÌÒÙÁÉÍÓÚñÑüÜ_\s]+$/)){
		contador++;
			if(contador == 1){
				
				local = $(this).text();
				
			}else if(contador == 2){
				
				partidos.push(local+" - "+$(this).text());
				contador = 0;
			}
		$(this).css("background-color", "green");
					
					
	}else{
		contacuotas++;
		
			if(contacuotas == 3){
				
				cuotas.push(cuot+$(this).text());
				contacuotas = 0;
				cuot="";
			}else{
				cuot +=$(this).text()+" ";
				
				
			}
		
		
	}
});
$(document).ready(function(){
$.ajax({
          type: "POST",
          url: "ajax.php",
		  dataType: 'json',
          data: {'partidos':JSON.stringify(partidos),'cuotas':JSON.stringify(cuotas),'liga':445},//capturo array     
          success: function(data){
			  
		
        }
});
});
</script>
<?php
$html_base->clear(); 
unset($html_base);
	
	
}

function cuotasBundesliga(){
	
$base = 'https://www.marathonbet.es/es/popular/Football/Germany/Bundesliga/?menu=22436';
$partido = array();
$cuotas = array();
$local = "";
$curl = curl_init();
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt($curl, CURLOPT_HEADER, false);
curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($curl, CURLOPT_URL, $base);
curl_setopt($curl, CURLOPT_REFERER, $base);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
$str = curl_exec($curl);
curl_close($curl);

// Create a DOM object
$html_base = new simple_html_dom();
// Load HTML from a string
$html_base->load($str);

//get all category links
foreach($html_base->find('td+span') as $element) {
	
    echo $element.'</br> ';
	
}
?>
<script>
var contador=0;
var contacuotas=0;
var partidos = [];
var cuotas = [];
var local;
var cuot="";
$("span[data-selection-price]").css("background-color", "yellow");
$(".hint").prevAll().remove();
$(".hint").remove();
$(".event-more-view").remove();
$(".show-help-link").nextAll().remove();
$(".show-help-link").remove();
$("span").each(function(){
    if($(this).text().match(/^[0-9a-zA-ZáéíóúàèìòùÀÈÌÒÙÁÉÍÓÚñÑüÜ_\s]+$/)){
		contador++;
			if(contador == 1){
				
				if($(this).text() == "Maguncia 05"){
					
					local = "1. FSV Mainz 05";
					
				}else if($(this).text() == "Colonia"){
					
					local = "1. FC Koln";
					
				}else if($(this).text() == "Bayer 04 Leverkusen"){
					
					local = "Bayer Leverkusen";
					
				}else if($(this).text() == "Bayern Múnich"){
					
					local = "FC Bayern Munchen";
					
				}else if($(this).text() == "Friburgo"){
					
					local = "SC Freiburg";
					
				}else if($(this).text() == "Hertha Berlín"){
					
					local = "Hertha BSC";
					
				}else if($(this).text() == "Wolfsburgo"){
					
					local = "VfL Wolfsburg";
					
				}else if($(this).text() == "Hamburgo"){
					
					local = "Hamburger SV";
					
				}else if($(this).text() == "Eintracht Fráncfort"){
					
					local = "Eintracht Frankfurt";
					
				}else{
					
					local = $(this).text();
					
				}
			}else if(contador == 2){
				if($(this).text() == "Maguncia 05"){
					
					partidos.push(local+" - "+"1. FSV Mainz 05");
					contador = 0;
					
				}else if($(this).text() == "Colonia"){
					
					partidos.push(local+" - "+"1. FC Koln");
					contador = 0;
					
				}else if($(this).text() == "Bayer 04 Leverkusen"){
					
					partidos.push(local+" - "+"Bayer Leverkusen");
					contador = 0;
					
				}else if($(this).text() == "Bayern Múnich"){
					
					partidos.push(local+" - "+"FC Bayern Munchen");
					contador = 0;
					
				}else if($(this).text() == "Friburgo"){
					
					partidos.push(local+" - "+"SC Freiburg");
					contador = 0;
					
				}else if($(this).text() == "Hertha Berlín"){
					
					partidos.push(local+" - "+"Hertha BSC");
					contador = 0;
					
				}else if($(this).text() == "Wolfsburgo"){
					
					partidos.push(local+" - "+"VfL Wolfsburg");
					contador = 0;
					
				}else if($(this).text() == "Hamburgo"){
					
					partidos.push(local+" - "+"Hamburger SV");
					contador = 0;
					
				}else if($(this).text() == "Eintracht Fráncfort"){
					
					partidos.push(local+" - "+"Eintracht Frankfurt");
					contador = 0;
					
				}else{
					
					partidos.push(local+" - "+$(this).text());
					contador = 0;
					
				}
				
			}
		$(this).css("background-color", "green");
					
					
	}else{
		contacuotas++;
		
			if(contacuotas == 3){
				
				cuotas.push(cuot+$(this).text());
				contacuotas = 0;
				cuot="";
			}else{
				cuot +=$(this).text()+" ";
				
				
			}
		
		
	}
});
$(document).ready(function(){
$.ajax({
          type: "POST",
          url: "ajax.php",
		  dataType: 'json',
          data: {'partidos':JSON.stringify(partidos),'cuotas':JSON.stringify(cuotas),'liga':452},//capturo array     
          success: function(data){
			  
		
        }
});
});
</script>
<?php
$html_base->clear(); 
unset($html_base);
	
	
}


function cuotasCalcio(){
	
	$base = 'https://www.marathonbet.es/es/popular/Football/Italy/Serie+A/?menu=22434';
$partido = array();
$cuotas = array();
$local = "";
$curl = curl_init();
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt($curl, CURLOPT_HEADER, false);
curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($curl, CURLOPT_URL, $base);
curl_setopt($curl, CURLOPT_REFERER, $base);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
$str = curl_exec($curl);
curl_close($curl);

// Create a DOM object
$html_base = new simple_html_dom();
// Load HTML from a string
$html_base->load($str);

//get all category links
foreach($html_base->find('td+span') as $element) {
	
    echo $element.'</br> ';
	
}
?>
<script>
var contador=0;
var contacuotas=0;
var partidos = [];
var cuotas = [];
var local;
var cuot="";
$("span[data-selection-price]").css("background-color", "yellow");
$(".hint").prevAll().remove();
$(".hint").remove();
$(".event-more-view").remove();
$(".show-help-link").nextAll().remove();
$(".show-help-link").remove();
$("span").each(function(){
    if($(this).text().match(/^[0-9a-zA-ZáéíóúàèìòùÀÈÌÒÙÁÉÍÓÚñÑüÜ_\s]+$/)){
		contador++;
			if(contador == 1){
				
				if($(this).text() == "Roma"){
					
					local = "AS Roma";
					
				}else if($(this).text() == "Chievo"){
					
					local = "AC Chievo Verona";
					
				}else if($(this).text() == "Inter"){
					
					local = "FC Internazionale Milano";
					
				}else if($(this).text() == "Juventus"){
					
					local = "Juventus Turin";
					
				}else if($(this).text() == "Crotona"){
					
					local = "FC Crotone";
					
				}else if($(this).text() == "Verona"){
					
					local = "Hellas Verona FC";
					
				}else if($(this).text() == "Fiorentina"){
					
					local = "ACF Fiorentina";
					
				}else if($(this).text() == "Nápoles"){
					
					local = "SSC Napoli";
					
				}else if($(this).text() == "Bolonia"){
					
					local = "Bologna FC";
					
				}else if($(this).text() == "Milán"){
					
					local = "AC Milan";
					
				}else if($(this).text() == "Udinese"){
					
					local = "Udinese Calcio";
					
				}else if($(this).text() == "SPAL"){
					
					local = "SPAL Ferrara";
					
				}else if($(this).text() == "Benevento"){
					
					local = "Benevento Calcio";
					
				}else if($(this).text() == "Atalanta"){
					
					local = "Atalanta BC";
					
				}else if($(this).text() == "Génova"){
					
					local = "Genoa CFC";
					
				}else if($(this).text() == "Lazio"){
					
					local = "SS Lazio";
					
				}else if($(this).text() == "Cagliari"){
					
					local = "Cagliari Calcio";
					
				}else if($(this).text() == "Sampdoria"){
					
					local = "UC Sampdoria";
					
				}else{
					
					local = $(this).text();
					
				}
			}else if(contador == 2){
				if($(this).text() == "Roma"){
					
					partidos.push(local+" - "+"AS Roma");
					contador = 0;
					
				}else if($(this).text() == "Chievo"){
					
					partidos.push(local+" - "+"AC Chievo Verona");
					contador = 0;
					
				}else if($(this).text() == "Inter"){
					
					partidos.push(local+" - "+"FC Internazionale Milano");
					contador = 0;
					
				}else if($(this).text() == "Juventus"){
					
					partidos.push(local+" - "+"Juventus Turin");
					contador = 0;
					
				}else if($(this).text() == "Crotona"){
					
					partidos.push(local+" - "+"FC Crotone");
					contador = 0;
					
				}else if($(this).text() == "Verona"){
					
					partidos.push(local+" - "+"Hellas Verona FC");
					contador = 0;
					
				}else if($(this).text() == "Fiorentina"){
					
					partidos.push(local+" - "+"ACF Fiorentina");
					contador = 0;
					
				}else if($(this).text() == "Nápoles"){
					
					partidos.push(local+" - "+"SSC Napoli");
					contador = 0;
					
				}else if($(this).text() == "Bolonia"){
					
					partidos.push(local+" - "+"Bologna FC");
					contador = 0;
					
				}else if($(this).text() == "Milán"){
					
					partidos.push(local+" - "+"AC Milan");
					contador = 0;
					
				}else if($(this).text() == "Udinese"){
					
					partidos.push(local+" - "+"Udinese Calcio");
					contador = 0;
					
				}else if($(this).text() == "SPAL"){
					
					partidos.push(local+" - "+"SPAL Ferrara");
					contador = 0;
					
				}else if($(this).text() == "Benevento"){
					
					partidos.push(local+" - "+"Benevento Calcio");
					contador = 0;
					
				}else if($(this).text() == "Atalanta"){
					
					partidos.push(local+" - "+"Atalanta BC");
					contador = 0;
					
				}else if($(this).text() == "Génova"){
					
					partidos.push(local+" - "+"Genoa CFC");
					contador = 0;
					
				}else if($(this).text() == "Lazio"){
					
					partidos.push(local+" - "+"SS Lazio");
					contador = 0;
					
				}else if($(this).text() == "Cagliari"){
					
					partidos.push(local+" - "+"Cagliari Calcio");
					contador = 0;
					
				}else if($(this).text() == "Sampdoria"){
					
					partidos.push(local+" - "+"UC Sampdoria");
					contador = 0;
					
				}else{
					
					partidos.push(local+" - "+$(this).text());
					contador = 0;
					
				}
				
			}
		$(this).css("background-color", "green");
					
					
	}else{
		contacuotas++;
		
			if(contacuotas == 3){
				
				cuotas.push(cuot+$(this).text());
				contacuotas = 0;
				cuot="";
			}else{
				cuot +=$(this).text()+" ";
				
				
			}
		
		
	}
});
$(document).ready(function(){
$.ajax({
          type: "POST",
          url: "ajax.php",
		  dataType: 'json',
          data: {'partidos':JSON.stringify(partidos),'cuotas':JSON.stringify(cuotas),'liga':456},//capturo array     
          success: function(data){
			  
		
        }
});
});
</script>
<?php
$html_base->clear(); 
unset($html_base);
	
}

function cuotasLigaPortuguesa(){
$base =	'https://www.marathonbet.es/es/popular/Football/Portugal/Primeira+Liga/?menu=43058';
$partido = array();
$cuotas = array();
$local = "";
$curl = curl_init();
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt($curl, CURLOPT_HEADER, false);
curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($curl, CURLOPT_URL, $base);
curl_setopt($curl, CURLOPT_REFERER, $base);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
$str = curl_exec($curl);
curl_close($curl);

// Create a DOM object
$html_base = new simple_html_dom();
// Load HTML from a string
$html_base->load($str);

//get all category links
foreach($html_base->find('td+span') as $element) {
	
    echo $element.'</br> ';
	
}
?>
<script>
var contador=0;
var contacuotas=0;
var partidos = [];
var cuotas = [];
var local;
var cuot="";
$("span[data-selection-price]").css("background-color", "yellow");
$(".hint").prevAll().remove();
$(".hint").remove();
$(".event-more-view").remove();
$(".show-help-link").nextAll().remove();
$(".show-help-link").remove();
$("span").each(function(){
    if($(this).text().match(/^[0-9a-zA-ZáéíóúàèìòùÀÈÌÒÙÁÉÍÓÚñÑüÜ_\s]+$/)){
		contador++;
			if(contador == 1){
				
				if($(this).text() == "Boavista"){
					
					local = "Boavista Porto FC";
					
				}else if($(this).text() == "Aves"){
					
					local = "Desportivo Aves";
					
				}else if($(this).text() == "Estoril"){
					
					local = "GD Estoril Praia";
					
				}else if($(this).text() == "Oporto"){
					
					local = "FC Porto";
					
				}else if($(this).text() == "Sporting Lisboa"){
					
					local = "Sporting CP";
					
				}else if($(this).text() == "Marítimo"){
					
					local = "Maritimo Funchal";
					
				}else if($(this).text() == "Vitória Setúbal"){
					
					local = "Vitoria Setubal";
					
				}else if($(this).text() == "Pacos de Ferreira"){
					
					local = "FC Paços de Ferreira";
					
				}else{
					
					local = $(this).text();
					
				}
			}else if(contador == 2){
				if($(this).text() == "Boavista"){
					
					partidos.push(local+" - "+"Boavista Porto FC");
					contador = 0;
					
				}else if($(this).text() == "Aves"){
					
					partidos.push(local+" - "+"Desportivo Aves");
					contador = 0;
					
				}else if($(this).text() == "Estoril"){
					
					partidos.push(local+" - "+"GD Estoril Praia");
					contador = 0;
					
				}else if($(this).text() == "Oporto"){
					
					partidos.push(local+" - "+"FC Porto");
					contador = 0;
					
				}else if($(this).text() == "Sporting Lisboa"){
					
					partidos.push(local+" - "+"Sporting CP");
					contador = 0;
					
				}else if($(this).text() == "Marítimo"){
					
					partidos.push(local+" - "+"Maritimo Funchal");
					contador = 0;
					
				}else if($(this).text() == "Vitória Setúbal"){
					
					partidos.push(local+" - "+"Vitoria Setubal");
					contador = 0;
					
				}else if($(this).text() == "Pacos de Ferreira"){
					
					partidos.push(local+" - "+"FC Paços de Ferreira");
					contador = 0;
					
				}else{
					
					partidos.push(local+" - "+$(this).text());
					contador = 0;
					
				}
				
			}
		$(this).css("background-color", "green");
					
					
	}else{
		contacuotas++;
		
			if(contacuotas == 3){
				
				cuotas.push(cuot+$(this).text());
				contacuotas = 0;
				cuot="";
			}else{
				cuot +=$(this).text()+" ";
				
				
			}
		
		
	}
});
$(document).ready(function(){
$.ajax({
          type: "POST",
          url: "ajax.php",
		  dataType: 'json',
          data: {'partidos':JSON.stringify(partidos),'cuotas':JSON.stringify(cuotas),'liga':457},//capturo array     
          success: function(data){
			  
		
        }
});
});
</script>
<?php
$html_base->clear(); 
unset($html_base);
	
	
	
}

function cuotasLigue1(){
	
	$base =	'https://www.marathonbet.es/es/popular/Football/France/Ligue+1/?menu=21533';
$partido = array();
$cuotas = array();
$local = "";
$curl = curl_init();
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt($curl, CURLOPT_HEADER, false);
curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($curl, CURLOPT_URL, $base);
curl_setopt($curl, CURLOPT_REFERER, $base);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
$str = curl_exec($curl);
curl_close($curl);

// Create a DOM object
$html_base = new simple_html_dom();
// Load HTML from a string
$html_base->load($str);

//get all category links
foreach($html_base->find('td+span') as $element) {
	
    echo $element.'</br> ';
	
}
?>
<script>
var contador=0;
var contacuotas=0;
var partidos = [];
var cuotas = [];
var local;
var cuot="";
$("span[data-selection-price]").css("background-color", "yellow");
$(".hint").prevAll().remove();
$(".hint").remove();
$(".event-more-view").remove();
$(".show-help-link").nextAll().remove();
$(".show-help-link").remove();
$("span").each(function(){
    if($(this).text().match(/^[0-9a-zA-ZáéíóúàèìòùÀÈÌÒÙÁÉÍÓÚñÑüÜ_-\s]+$/)){
		contador++;
			if(contador == 1){
				
				if($(this).text() == "Angers"){
					
					local = "Angers SCO";
					
				}else if($(this).text() == "Marsella"){
					
					local = "Olympique de Marseille";
					
				}else if($(this).text() == "Burdeos"){
					
					local = "FC Girondins de Bordeaux";
					
				}else if($(this).text() == "Mónaco"){
					
					local = "AS Monaco FC";
					
				}else if($(this).text() == "Lyon"){
					
					local = "Olympique Lyonnais";
					
				}else if($(this).text() == "Rennes"){
					
					local = "Stade Rennais FC";
					
				}else if($(this).text() == "Estrasburgo"){
					
					local = "RC Strasbourg Alsace";
					
				}else if($(this).text() == "Montpellier"){
					
					local = "Montpellier Hérault SC";
					
				}else if($(this).text() == "Lille"){
					
					local = "OSC Lille";
					
				}else if($(this).text() == "Niza"){
					
					local = "OGC Nice";
					
				}else{
					
					local = $(this).text();
					
				}
			}else if(contador == 2){
				if($(this).text() == "Angers"){
					
					partidos.push(local+" - "+"Angers SCO");
					contador = 0;
					
				}else if($(this).text() == "Marsella"){
					
					partidos.push(local+" - "+"Olympique de Marseille");
					contador = 0;
					
				}else if($(this).text() == "Burdeos"){
					
					partidos.push(local+" - "+"FC Girondins de Bordeaux");
					contador = 0;
					
				}else if($(this).text() == "Mónaco"){
					
					partidos.push(local+" - "+"AS Monaco FC");
					contador = 0;
					
				}else if($(this).text() == "Lyon"){
					
					partidos.push(local+" - "+"Olympique Lyonnais");
					contador = 0;
					
				}else if($(this).text() == "Rennes"){
					
					partidos.push(local+" - "+"Stade Rennais FC");
					contador = 0;
					
				}else if($(this).text() == "Estrasburgo"){
					
					partidos.push(local+" - "+"RC Strasbourg Alsace");
					contador = 0;
					
				}else if($(this).text() == "Montpellier"){
					
					partidos.push(local+" - "+"Montpellier Hérault SC");
					contador = 0;
					
				}else if($(this).text() == "Lille"){
					
					partidos.push(local+" - "+"OSC Lille");
					contador = 0;
					
				}else if($(this).text() == "Niza"){
					
					partidos.push(local+" - "+"OGC Nice");
					contador = 0;
					
				}else{
					
					partidos.push(local+" - "+$(this).text());
					contador = 0;
					
				}
				
			}
		$(this).css("background-color", "green");
					
					
	}else{
		contacuotas++;
		
			if(contacuotas == 3){
				
				cuotas.push(cuot+$(this).text());
				contacuotas = 0;
				cuot="";
			}else{
				cuot +=$(this).text()+" ";
				
				
			}
		
		
	}
});
$(document).ready(function(){
$.ajax({
          type: "POST",
          url: "ajax.php",
		  dataType: 'json',
          data: {'partidos':JSON.stringify(partidos),'cuotas':JSON.stringify(cuotas),'liga':450},//capturo array     
          success: function(data){
			  
		
        }
});
});
</script>
<?php
$html_base->clear(); 
unset($html_base);
	
	
	
}

function cuotasEredivisie(){
	
		$base =	'https://www.marathonbet.es/es/betting/Football/Netherlands/Eredivisie/';
$partido = array();
$cuotas = array();
$local = "";
$curl = curl_init();
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt($curl, CURLOPT_HEADER, false);
curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($curl, CURLOPT_URL, $base);
curl_setopt($curl, CURLOPT_REFERER, $base);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
$str = curl_exec($curl);
curl_close($curl);

// Create a DOM object
$html_base = new simple_html_dom();
// Load HTML from a string
$html_base->load($str);

//get all category links
foreach($html_base->find('td+span') as $element) {
	
    echo $element.'</br> ';
	
}
?>
<script>
var contador=0;
var contacuotas=0;
var partidos = [];
var cuotas = [];
var local;
var cuot="";
$("span[data-selection-price]").css("background-color", "yellow");
$(".hint").prevAll().remove();
$(".hint").remove();
$(".event-more-view").remove();
$(".show-help-link").nextAll().remove();
$(".show-help-link").remove();
$("span").each(function(){
    if($(this).text().match(/^[0-9a-zA-ZáéíóúàèìòùÀÈÌÒÙÁÉÍÓÚñÑüÜ_-\s]+$/)){
		contador++;
			if(contador == 1){
				
				if($(this).text() == "Ajax"){
					
					local = "Ajax Amsterdam";
					
				}else if($(this).text() == "Feyenoord"){
					
					local = "Feyenoord Rotterdam";
					
				}else if($(this).text() == "Heracles"){
					
					local = "Heracles Almelo";
					
				}else if($(this).text() == "Vitesse "){
					
					local = "Vitesse Arnhem";
					
				}else if($(this).text() == "Twente"){
					
					local = "FC Twente Enschede";
					
				}else if($(this).text() == "Roda"){
					
					local = "Roda JC Kerkrade";
					
				}else if($(this).text() == "Venlo"){
					
					local = "VVV Venlo";
					
				}else if($(this).text() == "Willem II"){
					
					local = "Willem II Tilburg";
					
				}else{
					
					local = $(this).text();
					
				}
			}else if(contador == 2){
				if($(this).text() == "Ajax"){
					
					partidos.push(local+" - "+"Ajax Amsterdam");
					contador = 0;
					
				}else if($(this).text() == "Feyenoord"){
					
					partidos.push(local+" - "+"Feyenoord Rotterdam");
					contador = 0;
					
				}else if($(this).text() == "Heracles"){
					
					partidos.push(local+" - "+"Heracles Almelo");
					contador = 0;
					
				}else if($(this).text() == "Vitesse"){
					
					partidos.push(local+" - "+"Vitesse Arnhem");
					contador = 0;
					
				}else if($(this).text() == "Twente"){
					
					partidos.push(local+" - "+"FC Twente Enschede");
					contador = 0;
					
				}else if($(this).text() == "Roda"){
					
					partidos.push(local+" - "+"Roda JC Kerkrade");
					contador = 0;
					
				}else if($(this).text() == "Venlo"){
					
					partidos.push(local+" - "+"VVV Venlo");
					contador = 0;
					
				}else if($(this).text() == "Willem II"){
					
					partidos.push(local+" - "+"Willem II Tilburg");
					contador = 0;
					
				}else{
					
					partidos.push(local+" - "+$(this).text());
					contador = 0;
					
				}
				
			}
		$(this).css("background-color", "green");
					
					
	}else{
		contacuotas++;
		
			if(contacuotas == 3){
				
				cuotas.push(cuot+$(this).text());
				contacuotas = 0;
				cuot="";
			}else{
				cuot +=$(this).text()+" ";
				
				
			}
		
		
	}
});
$(document).ready(function(){
$.ajax({
          type: "POST",
          url: "ajax.php",
		  dataType: 'json',
          data: {'partidos':JSON.stringify(partidos),'cuotas':JSON.stringify(cuotas),'liga':449},//capturo array     
          success: function(data){
			  
		
        }
});
});
</script>
<?php
$html_base->clear(); 
unset($html_base);
	
	
	
}

function cuotasChampions(){
	
	
	
			$base =	'https://www.marathonbet.es/es/betting/Football/Clubs.+International/UEFA+Champions+League/Semi+Final/2nd+Leg/';
$partido = array();
$cuotas = array();
$local = "";
$curl = curl_init();
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt($curl, CURLOPT_HEADER, false);
curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($curl, CURLOPT_URL, $base);
curl_setopt($curl, CURLOPT_REFERER, $base);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
$str = curl_exec($curl);
curl_close($curl);

// Create a DOM object
$html_base = new simple_html_dom();
// Load HTML from a string
$html_base->load($str);

//get all category links
foreach($html_base->find('td+span') as $element) {
	
    echo $element.'</br> ';
	
}
?>
<script>
var contador=0;
var contacuotas=0;
var partidos = [];
var cuotas = [];
var local;
var cuot="";
$("span[data-selection-price]").css("background-color", "yellow");
$(".hint").prevAll().remove();
$(".hint").remove();
$(".event-more-view").remove();
$(".show-help-link").nextAll().remove();
$(".show-help-link").remove();
$("span").each(function(){
    if($(this).text().match(/^[0-9a-zA-ZáéíóúàèìòùÀÈÌÒÙÁÉÍÓÚñÑüÜ_-\s]+$/)){
		contador++;
			if(contador == 1){
				
				if($(this).text() == "Roma"){
					
					local = "AS Roma";
					
				}else if($(this).text() == "Liverpool"){
					
					local = "Liverpool FC";
					
				}else{
					
					local = $(this).text();
					
				}
			}else if(contador == 2){
				if($(this).text() == "Roma"){
					
					partidos.push(local+" - "+"AS Roma");
					contador = 0;
					
				}else if($(this).text() == "Liverpool"){
					
					partidos.push(local+" - "+"Liverpool FC");
					contador = 0;
					
				}else{
					
					partidos.push(local+" - "+$(this).text());
					contador = 0;
					
				}
				
			}
		$(this).css("background-color", "green");
					
					
	}else{
		contacuotas++;
		
			if(contacuotas == 3){
				
				cuotas.push(cuot+$(this).text());
				contacuotas = 0;
				cuot="";
			}else{
				cuot +=$(this).text()+" ";
				
				
			}
		
		
	}
});
$(document).ready(function(){
$.ajax({
          type: "POST",
          url: "ajax.php",
		  dataType: 'json',
          data: {'partidos':JSON.stringify(partidos),'cuotas':JSON.stringify(cuotas),'liga':464},//capturo array     
          success: function(data){
			  
		
        }
});
});
</script>
<?php
$html_base->clear(); 
unset($html_base);
	
	
	
}


function cuotasSerieB(){
	
	
	
			$base =	'https://www.marathonbet.es/es/popular/Football/Italy/Serie+B/?menu=46723';
$partido = array();
$cuotas = array();
$local = "";
$curl = curl_init();
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt($curl, CURLOPT_HEADER, false);
curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($curl, CURLOPT_URL, $base);
curl_setopt($curl, CURLOPT_REFERER, $base);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
$str = curl_exec($curl);
curl_close($curl);

// Create a DOM object
$html_base = new simple_html_dom();
// Load HTML from a string
$html_base->load($str);

//get all category links
foreach($html_base->find('td+span') as $element) {
	
    echo $element.'</br> ';
	
}
?>
<script>
var contador=0;
var contacuotas=0;
var partidos = [];
var cuotas = [];
var local;
var cuot="";
$("span[data-selection-price]").css("background-color", "yellow");
$(".hint").prevAll().remove();
$(".hint").remove();
$(".event-more-view").remove();
$(".show-help-link").nextAll().remove();
$(".show-help-link").remove();
$("span").each(function(){
    if($(this).text().match(/^[0-9a-zA-ZáéíóúàèìòùÀÈÌÒÙÁÉÍÓÚñÑüÜ_-\s]+$/)){
		contador++;
			if(contador == 1){
				
				if($(this).text() == "Avellino"){
					
					local = "AS Avellino 1912";
					
				}else if($(this).text() == "Brescia"){
					
					local = "Brescia Calcio";
					
				}else if($(this).text() == "Frosinone"){
					
					local = "Frosinone Calcio";
					
				}else if($(this).text() == "Novara"){
					
					local = "Novara Calcio";
					
				}else if($(this).text() == "Novara"){
					
					local = "Novara Calcio";
					
				}else if($(this).text() == "Spezia"){
					
					local = "Spezia Calcio";
					
				}else if($(this).text() == "Palermo"){
					
					local = "US Cittá di Palermo";
					
				}else if($(this).text() == "Ternana"){
					
					local = "Ternana Calcio";
					
				}else if($(this).text() == "Pescara"){
					
					local = "Pescara Calcio";
					
				}else if($(this).text() == "Salernitana"){
					
					local = "Salernitana Calcio";
					
				}else{
					
					local = $(this).text();
					
				}
			}else if(contador == 2){
				if($(this).text() == "Avellino"){
					
					partidos.push(local+" - "+"AS Avellino 1912");
					contador = 0;
					
				}else if($(this).text() == "Brescia"){
					
					partidos.push(local+" - "+"Brescia Calcio");
					contador = 0;
					
				}else if($(this).text() == "Frosinone"){
					
					partidos.push(local+" - "+"Frosinone Calcio");
					contador = 0;
					
				}else if($(this).text() == "Novara"){
					
					partidos.push(local+" - "+"Novara Calcio");
					contador = 0;
					
				}else if($(this).text() == "Spezia"){
					
					partidos.push(local+" - "+"Spezia Calcio");
					contador = 0;
					
				}else if($(this).text() == "Palermo"){
					
					partidos.push(local+" - "+"US Cittá di Palermo");
					contador = 0;
					
				}else if($(this).text() == "Ternana"){
					
					partidos.push(local+" - "+"Ternana Calcio");
					contador = 0;
					
				}else if($(this).text() == "Pescara"){
					
					partidos.push(local+" - "+"Pescara Calcio");
					contador = 0;
					
				}else if($(this).text() == "Salernitana"){
					
					partidos.push(local+" - "+"Salernitana Calcio");
					contador = 0;
					
				}else{
					
					partidos.push(local+" - "+$(this).text());
					contador = 0;
					
				}
				
			}
		$(this).css("background-color", "green");
					
					
	}else{
		contacuotas++;
		
			if(contacuotas == 3){
				
				cuotas.push(cuot+$(this).text());
				contacuotas = 0;
				cuot="";
			}else{
				cuot +=$(this).text()+" ";
				
				
			}
		
		
	}
});
$(document).ready(function(){
$.ajax({
          type: "POST",
          url: "ajax.php",
		  dataType: 'json',
          data: {'partidos':JSON.stringify(partidos),'cuotas':JSON.stringify(cuotas),'liga':459},//capturo array     
          success: function(data){
			  
		
        }
});
});
</script>
<?php
$html_base->clear(); 
unset($html_base);
	
	
}
   
function cuotasBundesliga2(){
	
				$base =	'https://www.marathonbet.es/es/popular/Football/Germany/Bundesliga+2/?menu=42528';
$partido = array();
$cuotas = array();
$local = "";
$curl = curl_init();
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt($curl, CURLOPT_HEADER, false);
curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($curl, CURLOPT_URL, $base);
curl_setopt($curl, CURLOPT_REFERER, $base);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
$str = curl_exec($curl);
curl_close($curl);

// Create a DOM object
$html_base = new simple_html_dom();
// Load HTML from a string
$html_base->load($str);

//get all category links
foreach($html_base->find('td+span') as $element) {
	
    echo $element.'</br> ';
	
}
?>
<script>
var contador=0;
var contacuotas=0;
var partidos = [];
var cuotas = [];
var local;
var cuot="";
$("span[data-selection-price]").css("background-color", "yellow");
$(".hint").prevAll().remove();
$(".hint").remove();
$(".event-more-view").remove();
$(".show-help-link").nextAll().remove();
$(".show-help-link").remove();
$("span").each(function(){
    if($(this).text().match(/^[0-9a-zA-ZáéíóúàèìòùÀÈÌÒÙÁÉÍÓÚñÑüÜ_\s]+$/) || $(this).text().match(/^[St. Pauli]+$/) ){
		contador++;
			if(contador == 1){
				
				if($(this).text() == "Kaiserslautern"){
					
					local = "1. FC Kaiserslautern";
					
				}else if($(this).text() == "Bochum"){
					
					local = "VfL Bochum";
					
				}else if($(this).text() == "Darmstadt"){
					
					local = "SV Darmstadt 98";
					
				}else if($(this).text() == "Union Berlín"){
					
					local = "1. FC Union Berlin";
					
				}else if($(this).text() == "Dinamo Dresde"){
					
					local = "Dynamo Dresden";
					
				}else if($(this).text() == "Duisburgo"){
					
					local = "MSV Duisburg";
					
				}else if($(this).text() == "Núremberg"){
					
					local = "1. FC Nürnberg";
					
				}else if($(this).text() == "Jahn Ratisbona"){
					
					local = "Jahn Regensburg";
					
				}else if($(this).text() == "Greuther Fürth"){
					
					local = "SpVgg Greuther Fürth";
					
				}else if($(this).text() == "Eintracht Brunswick"){
					
					local = "Eintracht Braunschweig";
					
				}else{
					
					local = $(this).text();
					
				}
			}else if(contador == 2){
				if($(this).text() == "Kaiserslautern"){
					
					partidos.push(local+" - "+"1. FC Kaiserslautern");
					contador = 0;
					
				}else if($(this).text() == "Bochum"){
					
					partidos.push(local+" - "+"VfL Bochum");
					contador = 0;
					
				}else if($(this).text() == "Darmstadt98"){
					
					partidos.push(local+" - "+"SV Darmstadt 98");
					contador = 0;
					
				}else if($(this).text() == "Union Berlín"){
					
					partidos.push(local+" - "+"1. FC Union Berlin");
					contador = 0;
					
				}else if($(this).text() == "Dinamo Dresde"){
					
					partidos.push(local+" - "+"Dynamo Dresden");
					contador = 0;
					
				}else if($(this).text() == "Duisburgo"){
					
					partidos.push(local+" - "+"MSV Duisburg");
					contador = 0;
					
				}else if($(this).text() == "Núremberg"){
					
					partidos.push(local+" - "+"1. FC Nürnberg");
					contador = 0;
					
				}else if($(this).text() == "Jahn Ratisbona"){
					
					partidos.push(local+" - "+"Jahn Regensburg");
					contador = 0;
					
				}else if($(this).text() == "Greuther Fürth"){
					
					partidos.push(local+" - "+"SpVgg Greuther Fürth");
					contador = 0;
					
				}else if($(this).text() == "Eintracht Brunswick"){
					
					partidos.push(local+" - "+"Eintracht Braunschweig");
					contador = 0;
					
				}else{
					
					partidos.push(local+" - "+$(this).text());
					contador = 0;
					
				}
				
			}
		$(this).css("background-color", "green");
					
					
	}else{
		contacuotas++;
		
			if(contacuotas == 3){
				
				cuotas.push(cuot+$(this).text());
				contacuotas = 0;
				cuot="";
			}else{
				cuot +=$(this).text()+" ";
				
				
			}
		
		
	}
});
$(document).ready(function(){
$.ajax({
          type: "POST",
          url: "ajax.php",
		  dataType: 'json',
          data: {'partidos':JSON.stringify(partidos),'cuotas':JSON.stringify(cuotas),'liga':453},//capturo array     
          success: function(data){
			  
		
        }
});
});
</script>
<?php
$html_base->clear(); 
unset($html_base);
	
	
	
	
}

function cuotasLigue2(){
	
					$base =	'https://www.marathonbet.es/es/popular/Football/France/Ligue+2/?menu=46785';
$partido = array();
$cuotas = array();
$local = "";
$curl = curl_init();
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt($curl, CURLOPT_HEADER, false);
curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($curl, CURLOPT_URL, $base);
curl_setopt($curl, CURLOPT_REFERER, $base);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
$str = curl_exec($curl);
curl_close($curl);

// Create a DOM object
$html_base = new simple_html_dom();
// Load HTML from a string
$html_base->load($str);

//get all category links
foreach($html_base->find('td+span') as $element) {
	
    echo $element.'</br> ';
	
}
?>
<script>
var contador=0;
var contacuotas=0;
var partidos = [];
var cuotas = [];
var local;
var cuot="";
$("span[data-selection-price]").css("background-color", "yellow");
$(".hint").prevAll().remove();
$(".hint").remove();
$(".event-more-view").remove();
$(".show-help-link").nextAll().remove();
$(".show-help-link").remove();
$("span").each(function(){
    if($(this).text().match(/^[0-9a-zA-ZáéíóúàèìòùÀÈÌÒÙÁÉÍÓÚñÑüÜ_-\s]+$/)){
		contador++;
			if(contador == 1){
				
				if($(this).text() == "Bourg-Peronnas"){
					
					local = "FC Bourg-en-Bresse Péronnas";
					
				}else if($(this).text() == "Brest"){
					
					local = "Stade Brestois";
					
				}else if($(this).text() == "Chateauroux"){
					
					local = "LB Châteauroux";
					
				}else if($(this).text() == "Clermont"){
					
					local = "Clermont Foot Auvergne";
					
				}else if($(this).text() == "Nimes"){
					
					local = "Nîmes Olympique";
					
				}else if($(this).text() == "Ajaccio"){
					
					local = "Ajaccio AC";
					
				}else if($(this).text() == "Niort"){
					
					local = "Chamois Niortais FC";
					
				}else if($(this).text() == "Reims"){
					
					local = "Stade de Reims";
					
				}else if($(this).text() == "Quevilly"){
					
					local = "Quevilly Rouen";
					
				}else if($(this).text() == "Lens"){
					
					local = "RC Lens";
					
				}else{
					
					local = $(this).text();
					
				}
			}else if(contador == 2){
				if($(this).text() == "Bourg-Peronnas"){
					
					partidos.push(local+" - "+"FC Bourg-en-Bresse Péronnas");
					contador = 0;
					
				}else if($(this).text() == "Brest"){
					
					partidos.push(local+" - "+"Stade Brestois");
					contador = 0;
					
				}else if($(this).text() == "Chateauroux"){
					
					partidos.push(local+" - "+"LB Châteauroux");
					contador = 0;
					
				}else if($(this).text() == "Clermont"){
					
					partidos.push(local+" - "+"Clermont Foot Auvergne");
					contador = 0;
					
				}else if($(this).text() == "Nimes"){
					
					partidos.push(local+" - "+"Nîmes Olympique");
					contador = 0;
					
				}else if($(this).text() == "Ajaccio"){
					
					partidos.push(local+" - "+"Ajaccio AC");
					contador = 0;
					
				}else if($(this).text() == "Niort"){
					
					partidos.push(local+" - "+"Chamois Niortais FC");
					contador = 0;
					
				}else if($(this).text() == "Reims"){
					
					partidos.push(local+" - "+"Stade de Reims");
					contador = 0;
					
				}else if($(this).text() == "Quevilly"){
					
					partidos.push(local+" - "+"Quevilly Rouen");
					contador = 0;
					
				}else if($(this).text() == "Lens"){
					
					partidos.push(local+" - "+"RC Lens");
					contador = 0;
					
				}else{
					
					partidos.push(local+" - "+$(this).text());
					contador = 0;
					
				}
				
			}
		$(this).css("background-color", "green");
					
					
	}else{
		contacuotas++;
		
			if(contacuotas == 3){
				
				cuotas.push(cuot+$(this).text());
				contacuotas = 0;
				cuot="";
			}else{
				cuot +=$(this).text()+" ";
				
				
			}
		
		
	}
});
$(document).ready(function(){
$.ajax({
          type: "POST",
          url: "ajax.php",
		  dataType: 'json',
          data: {'partidos':JSON.stringify(partidos),'cuotas':JSON.stringify(cuotas),'liga':451},//capturo array     
          success: function(data){
			  
		
        }
});
});
</script>
<?php
$html_base->clear(); 
unset($html_base);
	
	
}

function cuotasLeagueTwo(){
	
						$base =	'https://www.marathonbet.es/es/popular/Football/England/League+2/?menu=22809';
$partido = array();
$cuotas = array();
$local = "";
$curl = curl_init();
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt($curl, CURLOPT_HEADER, false);
curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($curl, CURLOPT_URL, $base);
curl_setopt($curl, CURLOPT_REFERER, $base);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
$str = curl_exec($curl);
curl_close($curl);

// Create a DOM object
$html_base = new simple_html_dom();
// Load HTML from a string
$html_base->load($str);

//get all category links
foreach($html_base->find('td+span') as $element) {
	
    echo $element.'</br> ';
	
}
?>
<script>
var contador=0;
var contacuotas=0;
var partidos = [];
var cuotas = [];
var local;
var cuot="";
$("span[data-selection-price]").css("background-color", "yellow");
$(".hint").prevAll().remove();
$(".hint").remove();
$(".event-more-view").remove();
$(".show-help-link").nextAll().remove();
$(".show-help-link").remove();
$("span").each(function(){
    if($(this).text().match(/^[0-9a-zA-ZáéíóúàèìòùÀÈÌÒÙÁÉÍÓÚñÑüÜ_-\s]+$/)){
		contador++;
			if(contador == 1){
					
					local = $(this).text();

			}else if(contador == 2){
					
					partidos.push(local+" - "+$(this).text());
					contador = 0;
					
				
			}
		$(this).css("background-color", "green");
					
					
	}else{
		contacuotas++;
		
			if(contacuotas == 3){
				
				cuotas.push(cuot+$(this).text());
				contacuotas = 0;
				cuot="";
			}else{
				cuot +=$(this).text()+" ";
				
				
			}
		
		
	}
});
$(document).ready(function(){
$.ajax({
          type: "POST",
          url: "ajax.php",
		  dataType: 'json',
          data: {'partidos':JSON.stringify(partidos),'cuotas':JSON.stringify(cuotas),'liga':448},//capturo array     
          success: function(data){
			  
		
        }
});
});
</script>
<?php
$html_base->clear(); 
unset($html_base);
	
}
function cuotasLeagueOne(){
	
						$base =	'https://www.marathonbet.es/es/popular/Football/England/League+1/?menu=22808';
$partido = array();
$cuotas = array();
$local = "";
$curl = curl_init();
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt($curl, CURLOPT_HEADER, false);
curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($curl, CURLOPT_URL, $base);
curl_setopt($curl, CURLOPT_REFERER, $base);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
$str = curl_exec($curl);
curl_close($curl);

// Create a DOM object
$html_base = new simple_html_dom();
// Load HTML from a string
$html_base->load($str);

//get all category links
foreach($html_base->find('td+span') as $element) {
	
    echo $element.'</br> ';
	
}
?>
<script>
var contador=0;
var contacuotas=0;
var partidos = [];
var cuotas = [];
var local;
var cuot="";
$("span[data-selection-price]").css("background-color", "yellow");
$(".hint").prevAll().remove();
$(".hint").remove();
$(".event-more-view").remove();
$(".show-help-link").nextAll().remove();
$(".show-help-link").remove();
$("span").each(function(){
    if($(this).text().match(/^[0-9a-zA-ZáéíóúàèìòùÀÈÌÒÙÁÉÍÓÚñÑüÜ_-\s]+$/)){
		contador++;
			if(contador == 1){
					
					local = $(this).text();
					
			}else if(contador == 2){
					
					partidos.push(local+" - "+$(this).text());
					contador = 0;
					
				
			}
		$(this).css("background-color", "green");
					
					
	}else{
		contacuotas++;
		
			if(contacuotas == 3){
				
				cuotas.push(cuot+$(this).text());
				contacuotas = 0;
				cuot="";
			}else{
				cuot +=$(this).text()+" ";
				
				
			}
		
		
	}
});
$(document).ready(function(){
$.ajax({
          type: "POST",
          url: "ajax.php",
		  dataType: 'json',
          data: {'partidos':JSON.stringify(partidos),'cuotas':JSON.stringify(cuotas),'liga':447},//capturo array     
          success: function(data){
			  
		
        }
});
});
</script>
<?php
$html_base->clear(); 
unset($html_base);
	
}
function cuotasChampionship(){
	
						$base =	'https://www.marathonbet.es/es/popular/Football/England/Championship/?menu=22807';
$partido = array();
$cuotas = array();
$local = "";
$curl = curl_init();
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt($curl, CURLOPT_HEADER, false);
curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($curl, CURLOPT_URL, $base);
curl_setopt($curl, CURLOPT_REFERER, $base);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
$str = curl_exec($curl);
curl_close($curl);

// Create a DOM object
$html_base = new simple_html_dom();
// Load HTML from a string
$html_base->load($str);

//get all category links
foreach($html_base->find('td+span') as $element) {
	
    echo $element.'</br> ';
	
}
?>
<script>
var contador=0;
var contacuotas=0;
var partidos = [];
var cuotas = [];
var local;
var cuot="";
$("span[data-selection-price]").css("background-color", "yellow");
$(".hint").prevAll().remove();
$(".hint").remove();
$(".event-more-view").remove();
$(".show-help-link").nextAll().remove();
$(".show-help-link").remove();
$("span").each(function(){
    if($(this).text().match(/^[0-9a-zA-ZáéíóúàèìòùÀÈÌÒÙÁÉÍÓÚñÑüÜ_-\s]+$/)){
		contador++;
			if(contador == 1){
					
					local = $(this).text();

			}else if(contador == 2){
				
					
					partidos.push(local+" - "+$(this).text());
					contador = 0;

				
			}
		$(this).css("background-color", "green");
					
					
	}else{
		contacuotas++;
		
			if(contacuotas == 3){
				
				cuotas.push(cuot+$(this).text());
				contacuotas = 0;
				cuot="";
			}else{
				cuot +=$(this).text()+" ";
				
				
			}
		
		
	}
});
$(document).ready(function(){
$.ajax({
          type: "POST",
          url: "ajax.php",
		  dataType: 'json',
          data: {'partidos':JSON.stringify(partidos),'cuotas':JSON.stringify(cuotas),'liga':446},//capturo array     
          success: function(data){
			  
		
        }
});
});
</script>
<?php
$html_base->clear(); 
unset($html_base);
	
}

}


function pagesa()
{
	var gjithsejt = 0;
	var ulse = 0;
	var cmimi = 0;
				
				
	ulse = document.getElementById("ulese").value;
	cmimi = document.getElementById("cmimi").value;
							
	gjithsejt = ulse * cmimi;
	
	document.getElementById("gjith").innerHTML = gjithsejt + " &#8364;";
				
	setTimeout("pagesa()",500);	
}
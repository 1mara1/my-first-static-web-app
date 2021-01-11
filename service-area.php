<?php
$q=$_GET["q"];

$xmlDoc = new DOMDocument();
$xmlDoc->load("locations.xml");

$searchNode = $xmlDoc->getElementsByTagName( "location" ); 

for ($i=0; $i<=searchNode ; $i++) {
	    $xmlSuburb = $searchNode->getElementsByTagName( "suburb" );
		$valueXmlSuburb = $xmlSuburb ->item(0)->nodeValue;
		
		$xmlPostcode = $searchNode->getElementsByTagName( "postcode" );
  		$valueXmlPostcode = $xmlBrand ->item(0)->nodeValue;
      if ($valueXmlPostcode == $q) {
	
  	echo "<div>
		valueXmlSuburb
		</br>valueXmlPostcode
		</div>";   
 	 }
}
?> 
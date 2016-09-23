<?php ini_set("soap.wsdl_cache_enabled", 0);

$xml_data = '<?xml version="1.0" encoding="utf-8"?>
			<soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
			  <soap:Body>				
			    <AddField xmlns="https://service.leads360.com">
				  <username>yourname</username>
				  <password>yourpassworld</password>
				  <title>Briefly Describe Your Symptoms</title>
				  <fieldTypeId>256</fieldTypeId>
				  <toolTip>Briefly Describe Your Symptoms - FREE CASE EVALUATION - NFL Conclusion Lawsuit</toolTip>
				  <required>false</required>
				  <visibilityTypeId>2</visibilityTypeId>
				  <groupId>68</groupId>
				</AddField>
			  </soap:Body>
			</soap:Envelope>';
$headers = array(
    "Content-type: text/xml;charset=\"utf-8\"", 
    "Accept: text/xml", 
    "Cache-Control: no-cache", 
    "Pragma: no-cache", 
    "SOAPAction: \"https://service.leads360.com/AddField\"", 
    "Content-length: ".strlen($xml_data),
); 			
						

$URL = "http://service.leads360.com/ClientService.asmx?WSDL";

$ch = curl_init($URL);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "$xml_data");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);  
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false); 
$output = curl_exec($ch);
$err = curl_error($ch); 
curl_close($ch);

 

echo '<pre>';
print_r($output);
echo '</pre>';
if($err){
echo '<hr>curl error <pre>';
print_r($err);
echo '</pre>';
}
?>

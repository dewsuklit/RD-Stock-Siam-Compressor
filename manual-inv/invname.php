<!-- <?php
if (isset($_POST['partCode'])) {
    $prodID = $_POST['partCode'];
    $config = array(
        "trace"      => 1,
        "exceptions" => 0,
        "cache_wsdl" => 0
    );

    $client = new SoapClient("http://172.31.23.7:80/TechnicService/Services/rdstock_service.asmx?wsdl", $config);

    $param['partcode'] = $partCode;
    $result = $client->get_partname($param)->get_partnameResult;

    $decodedResult = json_decode($result, true);
    $uniqueMaterialNames = array_unique(array_column($decodedResult, 'Material_name'));

    if (!empty($uniqueMaterialNames)) {
        $materialName = $uniqueMaterialNames[0];
        echo $materialName;
    }
    
}
    

?> -->

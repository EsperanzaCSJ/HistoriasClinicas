<?php
    //database configuration
    $dbHost = 'localhost';
    $dbUsername = 'root';
    $dbPassword = '';
    $dbName = 'hcpms';
    
    //connect with the database
    $db = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);
    
    //get search term
    $searchTerm = $_GET['term'];
    
    //get matched data from skills table
    $query = $db->query("SELECT descripcion FROM patologias '%".$searchTerm."%' ORDER BY descripcion ASC");
    /*while ($row = $query->fetch_assoc()) {
        $data[] = $row['descripcion'];
    }*/
    while ($obj = $query->fetch_object()) {
        //printf ("%s (%s)\n", $obj->descripcion);
		if (strpos(strtolower($obj->descripcion), $searchTerm) !== false) {
		//echo "$obj->descripcion\n";
		}
		
		
    }
	
	
    //return json data
    echo json_encode($data);
?>
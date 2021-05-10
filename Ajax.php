
<?php 

include "Connect.php";

/*************************************************** AJAX ADD ********************************************************************************/
/****************************************** Get geometry of table project *********************************************************************/
if(isset($_POST['Projectvalue'])) {

    $PJ = $_POST['Projectvalue'];

    $requeteBDL = 'SELECT project_id,project_name,ST_AsGeoJSON(ST_Transform(geom,4326)) AS geometry FROM "Project"'." WHERE project_id LIKE '$PJ'";

    $resultBDL = pg_query($requeteBDL);

    $arr = pg_fetch_array($resultBDL, 0, PGSQL_ASSOC);

    $geometry=$arr['geometry']=json_decode($arr['geometry']);
    $projectid=$arr['project_id'];
    $projectname=$arr['project_name'];

    $featureBDL = ["type"=>"Feature","properties"=>["id"=>$projectid,"name"=>$projectname],"geometry"=>$geometry];

    echo json_encode($featureBDL);
};



/*************************************************** AJAX EDIT ********************************************************************************/
/********************************************** SEND REQUETE TO BDD ***************************************************************************/
if(isset($_POST['DeleteLine'])) {

    $DR = $_POST['DeleteLine'];
    $DeleteReq = "DELETE FROM public.prototype_table WHERE id_ = " . $DR;
    pg_query($DeleteReq);
};

?>
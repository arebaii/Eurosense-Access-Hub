<!--************************************* FORM ADD **************************************************-->

<form action="index.php#Add" method="POST" id="Add-FORM">

    <div class="field"  id=Add-Format>
        <!-- Set Rolling table of BDL of the project table -->
        <div>
            <h3> BDL (Project ID) </h3>
            <input type="text"  BDL (Project ID) list="idBdl" name="bdl" id="pjID">
            <datalist id="idBdl">
            <?php   
                // Get result of all BDL in project table -> Connect.php Line 25
                foreach ($BDLP as $BDLPoject) {
                    echo "<option value=" . $BDLPoject["project_id"] . ">";
                }
            ?>
            </datalist>
        </div>
        <!-- Set select table of country of list_country table -->
        <div>
            <h3> Storage Location </h3>
            <select name="storage_location" class="text">
                <?php   
                    // Get result of all country in API table -> Connect.php Line 16
                    foreach ($country as $location) {
                        echo "<option value=" . $location["country"] . ">" . $location['country'] . "</option>";
                    }
                ?>
            </select>
        </div>
        <!-- N° OF DISK -->
        <div>
            <h3> N° Disk </h3>
            <input type="text" name="n_disk">
        </div>
    </div>
    

    <div class="field" id=Add-DataType>
        <!-- FIELDS OF IMAGE DATA -->
        <div id="Add-IMG">
            <h2> Image Data </h2>            
            <div class="grid4col_one">
                <div>
                    <h3> Mission date </h3>
                    <!-- /comment this object if you want add or remove Select type for date
                    <select name="image_mission_date" class="text">
                    <?php/*   
                    foreach ($country as $c) {
                        echo "<option value=" . $c["country"] . ">" . $c['country'] . "</option>";
                    }
                    */?>
                    </select>
                    -->

                    <!--    /comment this object if you want add or remove calendar meny for date -->
                    <input type="date" name="mission_date"
                        value="2021-01-01"
                        min="2018-01-01" max="2024-12-31" class="text">
                    <!-- -->
                </div>
                <div>
                    <h3> Polygone shape </h3>                   
                        <div class="file-input">
                            <input type="file" class="file"  id="ImageGeom" name="input_image_geom" multiple>
                            <label for="ImageGeom">Select .shp .shx .dbf<p class="file-name"></p></label>
                            <input name="image_geom" id="RIGeom" value="" hidden>
                            
                        </div>
                </div>
                <div>
                    <h3> Srid Image </h3>
                    <select type="select" id="ImageSrid" name="srid_image" class="text" disabled="true">
                    <?php   
                        // Get result of all country in API table -> Connect.php Line 16
                        foreach ($SRID as $srid) {
                            echo "<option value=" . $srid["srid"] . ">" . $srid['nom_proj'] . " : " . $srid["srid"] . "</option>";
                        }
                    ?>
                    </select>
                </div>
            </div>

            <div class="grid4col_two">
                <div>
                    <h3> Image Start </h3>
                    <input type="text" name="image_start">
                </div>
                <div>
                    <h3> Image End </h3>
                    <input type="text" name="image_end">
                </div>
            </div>

            <div class="grid4col_three">
                <h3> Format </h3>
                <ul class="ul-checkbox">
                    <li><input type="checkbox" name="image_raw" id="img_R" value="false">
                    <label for="img_R">RAW</label></li>
                    <li><input type="checkbox" name="image_lv0" id="img_0" value="false">
                    <label for="img_0">LV0</label></li>
                    <li><input type="checkbox" name="image_lv2" id="img_2" value="false">  
                    <label for="img_2">LV2</label></li>
                    <li><input type="checkbox" name="image_lv3" id="img_3" value="false">  
                    <label for="img_3">LV3</label></li>
                </ul>
            </div>

            <div class="grid4col_four">
                <h3> Channels</h3>
                <ul class="ul-checkbox">
                    <li><input type="checkbox" name="image_rvb" id="img_RVB" value="false" >
                    <label for="img_RVB">RVB</label></li>
                    <li><input type="checkbox" name="image_rvbi" id="img_RVBI" value="false">
                    <label for="img_RVBI">RVBI</label></li>
                    <li><input type="checkbox" name="image_pan" id="img_PAN" value="false" >  
                    <label for="img_PAN">PAN</label></li>
                    <li><input type="checkbox" name="image_cir" id="img_CIR" value="false" >  
                    <label for="img_CIR">CIR</label></li>
                </ul>
            </div>
        </div>
        
        <!-- FIELDS OF ORTHOIMAGE DATA -->
        <div id="Add-Ortho">
            <h2> OrthoImage Data </h2>

            <div class="grid4col_one">
                <div>
                    <h3> Polygone shape </h3>
                    <div class="file-input">
                        <input type="file" id="OrthoGeom" class="file" name="input_ortho_geom" multiple>
                        <label for="OrthoGeom">Select .shp .shx .dbf<p class="file-name"></p></label> 
                        <input name="ortho_geom" id="ROGeom" value="" hidden>
                    </div>
                </div>
                <div>
                    <h3> Srid Orthoimage </h3>
                    <select type="select" id="OrthoSrid" name="srid_ortho" class="text" disabled="true">
                    <?php   
                        // Get result of all country in API table -> Connect.php Line 16
                        foreach ($SRID as $srid) {
                            echo "<option value=" . $srid["srid"] . ">" . $srid['nom_proj'] . " : " . $srid["srid"] . "</option>";
                        }
                    ?>
                    </select>
                </div>
                <div>
                    <h3> Other formats </h3>
                    <input type="text" name="ortho_text" class="text_ortho">
                </div>
            </div>

            <div class="grid4col_two">
                <h3> Format </h3>
                <ul class="ul-checkbox">
                <li><input type="checkbox" name="ortho_tif" id="Ortho_Tif" value="false">
                <label for="Ortho_Tif">TIF</label></li>
                <li><input type="checkbox" name="ortho_ecw" id="Ortho_ECW" value="false">
                <label for="Ortho_ECW">ECW</label></li>
                <li><input type="checkbox" name="ortho_jpg" id="Ortho_JPG" value="false">
                <label for="Ortho_JPG">JPG</label></li>
                </ul>
            </div>

            <div class="grid4col_three">
                <h3> Number of channels </h3>
                <ul class="ul-checkbox">
                <li><input type="checkbox" name="ortho_rvb" id="Ortho_RVB" value="false">
                <label for="Ortho_RVB">RVB</label></li>
                <li><input type="checkbox" name="ortho_rvbi" id="Ortho_RVBI" value="false">
                <label for="Ortho_RVBI">RVBI</label></li>
                <li><input type="checkbox" name="ortho_infrared" id="Ortho_I" value="false">
                <label for="Ortho_I">Infrared</label></li>
                </ul>
            </div>

            <div class="grid4col_four">
                <h3> Coding depth </h3>
                <ul class="ul-checkbox">
                <li><input type="checkbox" name="ortho_8bit" id="Ortho_8b" value="false">
                <label for="Ortho_8b">8 bytes</label></li>
                <li><input type="checkbox" name="ortho_16bit" id="Ortho_16b" value="false">
                <label for="Ortho_16b">16 bytes</label></li>
                </ul>
            </div> 
        </div>

        <!-- FIELDS OF LIDAR DATA -->
        <div id="Add-Lidar"> 
            <h2> Lidar Data </h2>

            <div class="grid3col_one">   
                <h3> Polygone shape </h3>
                <div class="file-input">
                    <input type="file"  class="file" id="LidarGeom" name="input_lidar_geom" multiple>
                    <label for="LidarGeom">Select .shp .shx .dbf<p class="file-name"></p></label> 
                    <input name="lidar_geom" id="RLGeom" value="" hidden>
                </div>
                <div>
                    <h3> Srid Lidar </h3>
                    <select type="select"  id="LidarSrid" name="srid_lidar" class="text" disabled="true">
                    <?php   
                        // Get result of all country in API table -> Connect.php Line 16
                        foreach ($SRID as $srid) {
                            echo "<option value=" . $srid["srid"] . ">" . $srid['nom_proj'] . " : " . $srid["srid"] . "</option>";
                        }
                    ?>
                    </select>
                </div>
            </div>

            <div class="grid3col_two">
                <h3> Lidar type of data </h3>
                <ul class="ul-checkbox">
                    <li><input type="checkbox" name="lidar_raw_data" id="l_rawdata" value="false">
                    <label for="l_rawdata">Raw Data</label></li>
                    <li><input type="checkbox" name="lidar_raw_georeferenced_data" id="l_rawgeodata" value="false">
                    <label for="l_rawgeodata">Raw georeferenced data</label></li>
                    <li><input type="checkbox" name="lidar_raw_block_tiles"  id="l_rawblocktiles" value="false">
                    <label for="l_rawblocktiles">Raw block tiles</label></li>
                </ul>
            </div>

            <div class="grid3col_three">
                <h3> Lidar type of data </h3>
                <ul class="ul-checkbox">
                    <li><input type="checkbox" name="lidar_adjusted_data"  id="l_adjusteddata" value="false">
                    <label for="l_adjusteddata">Adjusted data</label></li>
                    <li><input type="checkbox" name="lidar_adjusted_and_filtered_data"  id="l_adjustedfiltereddata" value="false">
                    <label for="l_adjustedfiltereddata">Adjusted and filtered data</label></li>
                    <li><input type="checkbox" name="lidar_delivery"  id="l_delivery" value="false">
                    <label for="l_delivery">Delivery</label></li>
                </ul>
            </div>
        </div>

        <!-- FIELDS OF PROJECT DATA -->
        <div class="field" id="Add-Project">
            <h2> Projects </h2>

            <div class="grid3col_one">
                <h3> Shapefile (polygon) </h3>
                <div class="file-input">
                    <input type="file" class="file" id="ProjectGeom" name="input_project_geom" multiple>
                    <label for="ProjectGeom">Select .shp .shx .dbf<p class="file-name"></p></label>
                    <input name="project_geom" id="RPGeom" value="" hidden> 
                </div>

                <h3> Srid Project </h3>
                <select type="select" id="ProjectSrid" name="srid_project" class="text" disabled="true">
                    <?php   
                        // Get result of all country in API table -> Connect.php Line 16
                        foreach ($SRID as $srid) {
                            echo "<option value=" . $srid["srid"] . ">" . $srid['nom_proj'] . " : " . $srid["srid"] . "</option>";
                        }
                    ?>
                    </select>
                
                <h3> Other formats </h3>
                <input type="text" name="project_others">
            </div>

            <div class="grid3col_two">
                <h3>Type of projects</h3>
                <ul class="ul-checkbox">
                    <li><input type="checkbox" name="project_aoi"  id="p_aoi" value="false">
                    <label for="p_aoi">AOI</label></li>
                    <li><input type="checkbox" name="project_dgps"  id="p_dgps" value="false">
                    <label for="p_dgps">DGPS</label></li>
                </ul>
            </div>

            <div class="grid3col_three">
                <h3>Type of projects</h3>
                <ul class="ul-checkbox">
                    <li><input type="checkbox" name="project_aet"  id="p_aet" value="false">
                    <label for="p_aet">AET</label></li>
                    <li><input type="checkbox" name="project_tilings"  id="p_tiling" value="false">
                    <label for="p_tiling">TILING</label></li>
                </ul>
            </div>
        </div>

    </div> 
    
    <div id="Add-submit">
        <input class="Add_reset" type="reset" value="">
        <input class="Add_button" type="submit" name="validate" value="Validate" disabled="true">
        <input class="Add_none">
    </div>

<?php


/*************************************** VALIDATION METHOD => POST *********************************************/

/*********** FIELDS OF VALIDATION ************/
$Field = array('bdl','storage_location','n_disk');
$checkImg = array('image_mission_date','image_start','image_end','image_raw','image_lv0','image_lv2','image_lv3','image_rvb','image_rvbi','image_pan','image_cir');
$checkOrtho = array('ortho_tif','ortho_ecw','ortho_jpg','ortho_rvb','ortho_rvbi','ortho_infrared','ortho_8bit','ortho_16bit');
$checkLidar = array('lidar_raw_data','lidar_raw_georeferenced_data','lidar_raw_block_tiles','lidar_adjusted_data','lidar_adjusted_and_filtered_data','lidar_delivery');
$checkProject = array('project_aoi','project_dgps','project_aet','project_tiling','project_others');

//initializes variable of the request parameters
$data = "";
$datavalue = "";

// IF validate FORM is set
if(isset($_POST['validate'])) {

// *** ADD Name of fields and value fields in request parameters ***
    foreach($Field as $a) {
        if(isset($_POST[$a])) {
            $data .= $a . ",";
            $datavalue .= "'" . $_POST[$a] . "',";
        }
    }
    
    foreach($checkImg as $img) {
        if(isset($_POST[$img])) {
            if($_POST[$img] != "") {
                $data .=$img . ",";
                $datavalue .= "'" . $_POST[$img] . "',";
            }
        }
    }

    foreach($checkOrtho as $ortho) {
        if(isset($_POST[$ortho])) {
            if($_POST[$ortho] != "") {
                $data .= $ortho . ",";
                $datavalue .= "'" . $_POST[$ortho] . "',";
            }
        }
    }    
    
    foreach($checkLidar as $lidar) {
        if(isset($_POST[$lidar])) {
            if($_POST[$lidar] != "") {
                $data .= $lidar . ",";
                $datavalue .= "'" .$_POST[$lidar] . "',";
            }
        }
    }

    foreach($checkProject as $proj) {
        if(isset($_POST[$proj])) {
            if($_POST[$proj] != "") {
                $data .= $proj . ",";
                $datavalue .= "'" .$_POST[$proj] . "',";
            }
        }
    }


    //Set geometry
    if(isset($_POST['image_geom'])) {
        if($_POST['image_geom'] != "") {
            $data .= 'image_geom' . ",";
            $image_geom = "ST_Transform(ST_SetSRID(ST_GeomFromGeoJSON('". $_POST['image_geom'] ."')," . $_POST['srid_image'] . "), 4326)";
            $datavalue .=  $image_geom . ",";
        }
    }

    if(isset($_POST['ortho_geom'])) {
        if($_POST['ortho_geom'] != "") {
            $data .= 'ortho_geom' . ",";
            $ortho_geom = "ST_Transform(ST_SetSRID(ST_GeomFromGeoJSON('". $_POST['ortho_geom'] ."'), 4326), 4326)";
            $datavalue .=  $ortho_geom . ",";
        }
    }
    
    if(isset($_POST['lidar_geom'])) {
        if($_POST['lidar_geom'] != "") {
            $data .= 'lidar_geom' . ",";
            $lidar_geom = "ST_Transform(ST_SetSRID(ST_GeomFromGeoJSON('". $_POST['lidar_geom'] ."'), 4326), 4326)";
            $datavalue .=  $lidar_geom . ",";
        }
    }
    
    if(isset($_POST['project_geom'])) {
        if($_POST['project_geom'] != "") {
            $data .= 'project_geom' . ",";
            $project_geom = "ST_Transform(ST_SetSRID(ST_GeomFromGeoJSON('". $_POST['project_geom'] ."'), 4326), 4326)";
            $datavalue .=  $project_geom . ",";
        }
    }
   

/*************************************************** SEND REQUEST ********************************************************************************/
    if ($data != "") {

        $req = "INSERT INTO public.prototype_table(". substr($data, 0, -1) .") VALUES(" . substr($datavalue, 0, -1) . ")";
        echo $req ;
        $sendReq = pg_query($req);

    }
}

?>


</form>
<script defer src="Formulaire.js"></script>

// Get ADD Field contains Project ID / BDL
let Add_pjID = document.getElementById('pjID');
Add_pjID.addEventListener('change', GetProjectLayer);

/***********************************************************************************************************************************************/
/*************************************************** AJAX ADD ********************************************************************************/
/****************************************** Get geometry of table project *********************************************************************/
function GetProjectLayer () {
    jsonLayer.clearLayers();

    //Create new FormData for send 'projectvalue' in Ajax.php Line 6
    let Projdata = new FormData();
    Projdata.append('Projectvalue', String(this.value));

    //Send Ajax to Aja.php
    fetch('Ajax.php', {
    method: 'post',
    body: Projdata
    })
    .then(res => res.json()) //Get result in .json
    .then(res => { 

    //pjName.innerText = res['project_name']; // Set result
    var ProjectLayer = L.geoJson(res, {
        style: style,
        onEachFeature: onEachFeature
        }).addTo(jsonLayer);

    map.fitBounds(ProjectLayer.getBounds(),{maxZoom:8});  
    });
}




/********************************************** SHP TO JSON GEOMETRY  **************************************************************************/
/***********************************************************************************************************************************************/

//Function for each type of geometry
/******************************** IMAGE *******************************/
let inGeoImg = document.getElementById('ImageGeom');
let iGeoR = document.getElementById('RIGeom');
let iSrid = document.getElementById('ImageSrid');
var ilabel	 = inGeoImg.nextElementSibling;

inGeoImg.addEventListener('change', e => {
    e.preventDefault();
    if (inGeoImg.files.length == 3) {
    ilabel.innerText = inGeoImg.files.length + " files selected.";
    let data = new FormData();
    
    data.append('shp[]', inGeoImg.files[0]);
    data.append('shp[]', inGeoImg.files[1]);
    data.append('shp[]', inGeoImg.files[2]);
    fetch('upload.php', {
        method: 'post',
        body: data
    })
    .then(r => r.text())
    .then(r => {
        let TypeGeo = r.split('"')[3];
        //If Upload return Error :: change style of label "red" - SRID disabled
        if(r.split(' ')[0] == "Error") {
            ilabel.innerText = 'Wrong files.Need shp, shx and dbf';
            ilabel.style.backgroundColor = "#b43c3c";
            ilabel.style.color = "white";
            iSrid.disabled=true;
        }
        else {
            //Need a polygon :: change style of label "red" - SRID disabled
            if(TypeGeo != "Polygon") {
                ilabel.innerText = 'Type : ' + TypeGeo + ' . Need Polygon';
                ilabel.style.backgroundColor = "#b43c3c";
                ilabel.style.color = "white";
                iSrid.disabled=true;
            }
            //GOOD :: change style of label (green) ans enable SRID selection
            else {
                ilabel.innerText = 'GeoJson created';
                ilabel.style.backgroundColor = "#009a3f";
                ilabel.style.color = "white";
                iSrid.disabled=false;
                iGeoR.value = r;
            }  
        }
    })
    //Set default style and SRID disabled
    } else {
    ilabel.innerText = inGeoImg.files.length + " selected : Need shp, shx and dbf ";
    ilabel.style.backgroundColor = "#8b8b8b4d";
    ilabel.style.color = "black";
    iSrid.disabled=true;
    console.log('Missing files.Need shp, shx and dbf');
    }
});


/******************************** ORTHOIMAGE *******************************/
let inGeoOrtho = document.getElementById('OrthoGeom');
let oGeoR = document.getElementById('ROGeom');
let oSrid = document.getElementById('OrthoSrid');
var olabel	 = inGeoOrtho.nextElementSibling;

inGeoOrtho.addEventListener('change', e => {
    e.preventDefault();
    if (inGeoOrtho.files.length == 3) {
    let data = new FormData();
    data.append('shp[]', inGeoOrtho.files[0]);
    data.append('shp[]', inGeoOrtho.files[1]);
    data.append('shp[]', inGeoOrtho.files[2]);
    fetch('upload.php', {
        method: 'post',
        body: data
    })
    .then(r => r.text())
    .then(r => {
        let TypeGeo = r.split('"')[3];
        //If Upload return Error :: change style of label "red" - SRID disabled
        if(r.split(' ')[0] == "Error") {
            olabel.innerText = 'Wrong files.Need shp, shx and dbf';
            olabel.style.backgroundColor = "#b43c3c";
            olabel.style.color = "white";
            oSrid.disabled=true;
        }
        else {
            //Need a polygon :: change style of label "red" - SRID disabled
            if(TypeGeo != "Polygon") {
                olabel.innerText = 'Type : ' + TypeGeo + ' . Need Polygon';
                olabel.style.backgroundColor = "#b43c3c";
                olabel.style.color = "white";
                oSrid.disabled=true;
            }
            //GOOD :: change style of label (green) ans enable SRID selection
            else {
                olabel.innerText = 'GeoJson created';
                olabel.style.backgroundColor = "#009a3f";
                olabel.style.color = "white";
                oSrid.disabled=false;
                oGeoR.value = r;
            }  
        }
    })
    //Set default style and SRID disabled
    } else {
    olabel.innerText = inGeoOrtho.files.length + " selected : Need shp, shx and dbf ";
    olabel.style.backgroundColor = "#8b8b8b4d";
    olabel.style.color = "black";
    oSrid.disabled=true;
    console.log('Missing files.Need shp, shx and dbf');
    }
});




/******************************** LIDAR *******************************/
let inGeoLidar = document.getElementById('LidarGeom');
let lGeoR = document.getElementById('RLGeom');
let lSrid = document.getElementById('LidarSrid');
var llabel = inGeoLidar.nextElementSibling;

inGeoLidar.addEventListener('change', e => {
    e.preventDefault();
    if (inGeoLidar.files.length == 3) {
    let data = new FormData();
    data.append('shp[]', inGeoLidar.files[0]);
    data.append('shp[]', inGeoLidar.files[1]);
    data.append('shp[]', inGeoLidar.files[2]);
    fetch('upload.php', {
        method: 'post',
        body: data
    })
    .then(r => r.text())
    .then(r => {
        let TypeGeo = r.split('"')[3];
        //If Upload return Error :: change style of label "red" - SRID disabled
        if(r.split(' ')[0] == "Error") {
            llabel.innerText = 'Wrong files.Need shp, shx and dbf';
            llabel.style.backgroundColor = "#b43c3c";
            llabel.style.color = "white";
            lSrid.disabled=true;
        }
        else {
            //Need a polygon :: change style of label "red" - SRID disabled
            if(TypeGeo != "Polygon") {
                llabel.innerText = 'Type : ' + TypeGeo + ' . Need Polygon';
                llabel.style.backgroundColor = "#b43c3c";
                llabel.style.color = "white";
                lSrid.disabled=true;
            }
            //GOOD :: change style of label (green) ans enable SRID selection
            else {
                llabel.innerText = 'GeoJson created';
                llabel.style.backgroundColor = "#009a3f";
                llabel.style.color = "white";
                lSrid.disabled=false;
                lGeoR.value = r;
            }  
        }
    })
    //Set default style and SRID disabled
    } else {
    llabel.innerText = inGeoLidar.files.length + " selected : Need shp, shx and dbf ";
    llabel.style.backgroundColor = "#8b8b8b4d";
    llabel.style.color = "black";
    lSrid.disabled=true;
    console.log('Missing files.Need shp, shx and dbf');
    }
});



/******************************** PROJECT *******************************/
let inGeoProj = document.getElementById('ProjectGeom');
let pGeoR = document.getElementById('RPGeom');
let pSrid = document.getElementById('ProjectSrid');
var plabel = inGeoProj.nextElementSibling;

inGeoProj.addEventListener('change', e => {
    e.preventDefault();
    if (inGeoProj.files.length == 3) {
    let data = new FormData();
    data.append('shp[]', inGeoProj.files[0]);
    data.append('shp[]', inGeoProj.files[1]);
    data.append('shp[]', inGeoProj.files[2]);
    fetch('upload.php', {
        method: 'post',
        body: data
    })
    .then(r => r.text())
    .then(r => {
        let TypeGeo = r.split('"')[3];
        //If Upload return Error :: change style of label "red" - SRID disabled
        if(r.split(' ')[0] == "Error") {
            plabel.innerText = 'Wrong files.Need shp, shx and dbf';
            plabel.style.backgroundColor = "#b43c3c";
            plabel.style.color = "white";
            pSrid.disabled=true;
        }
        else {
            //Need a polygon :: change style of label "red" - SRID disabled
            if(TypeGeo != "Polygon") {
                plabel.innerText = 'Type : ' + TypeGeo + ' . Need Polygon';
                plabel.style.backgroundColor = "#b43c3c";
                plabel.style.color = "white";
                plabel.disabled=true;
            }
            //GOOD :: change style of label (green) ans enable SRID selection
            else {
                plabel.innerText = 'GeoJson created';
                plabel.style.backgroundColor = "#009a3f";
                plabel.style.color = "white";
                pSrid.disabled=false;
                pGeoR.value = r;
            }  
        }
    })
    //Set default style and SRID disabled
    } else {
    plabel.innerText = inGeoProj.files.length + " selected : Need shp, shx and dbf ";
    plabel.style.backgroundColor = "#8b8b8b4d";
    plabel.style.color = "black";
    pSrid.disabled=true;
    console.log('Missing files.Need shp, shx and dbf');
    }
});




/***********************************************************************************************************************************************/
/*************************************************** AJAX DELETE ********************************************************************************/
/********************************************** DELETE LINE SELECTED  **************************************************************************/

/*  Change value of Search Checkbox on event 'change' */
let DCheckbox = document.querySelectorAll("#Delete input[class='Dcheckbox']");
DCheckbox.forEach(element => {
    element.addEventListener('change', function() {
        if(this.checked) {
            //Change value of checbox
            this.value = "true";

            //Set red color to all lines as the same id of line checked
            SameCheck = document.querySelectorAll("#Delete input[name='" + this.name + "']");
            let CheckLine = document.querySelectorAll("tr[value='Line_" + this.name + "']");
            CheckLine.forEach(element => {
                element.getElementsByTagName('td')[0].style.backgroundColor = 'orange';
                element.getElementsByTagName('td')[1].style.backgroundColor = 'orange';
            });
        }
        else {
            this.value = "false";

            //Set red color to all lines as the same id of line checked
            SameCheck = document.querySelectorAll("#Delete input[name='" + this.name + "']");
            let CheckLine = document.querySelectorAll("tr[value='Line_" + this.name + "']");
            CheckLine.forEach(element => {
                element.getElementsByTagName('td')[0].style.backgroundColor = 'white';
                element.getElementsByTagName('td')[1].style.backgroundColor = 'white';

            });
        }
    })
});


/* Send delete request in Ajax -> Ajax.php Line 30*/
let SenDelete = document.getElementById("DeleteID");
if(SenDelete) {
    SenDelete.addEventListener('click', DeletElement);
}

// For each checkbox where valu=true => Delete line with id_ (set in name of checbox) in API table
function DeletElement(){
    DCheckbox.forEach(function(ele) {
        if(ele.value == "true") {

            let Deldata = new FormData();
            Deldata.append('DeleteLine', ele.name);
            //Send DeleteLine
            fetch('Ajax.php', {
            method: 'post',
            body: Deldata
            })
            
        }
    })
    document.location.reload();

}

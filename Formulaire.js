// validates the sending of the form if the mandatory fields are filled

var form_add = document.getElementById("Add-FORM");
let submit = form_add.elements['validate'];
form_add.addEventListener('input', Validate);

let Checked_BOX = 0;

// Disable submit with conditions
function Validate () {

  // Get Checked checbox
  let AddCheckboxcheck = document.querySelectorAll("#Add input[type='checkbox']:checked");

  var field_BDL = form_add.elements["bdl"];
  var field_DiskN = form_add.elements["n_disk"];

  //if form_OK = true -> submit is active
  var form_OK = true;
  
/********* Values **************/
  if(field_BDL.value == '') {
    form_OK = false;
  }
  if(field_DiskN.value == ''){
    form_OK = false;
  }
  if(AddCheckboxcheck.length == 0){//If 0 checkbox is checked
    form_OK = false;
  }

  /********* Validate ************/
  if (!form_OK) {
    submit.disabled=true;
  }
  else {
    submit.disabled=false;
  }

}

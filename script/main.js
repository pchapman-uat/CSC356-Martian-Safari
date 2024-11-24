console.log("Hello World!")

$("#application").submit(validateForm);

/**
 * @param {SubmitEvent} event 
 */
function validateForm(event){
    const form = $("application");

    const fName = $("#fName");
    const lName = $("#lName");
    const age = $("#age");
    const experince = $("#experince");
    const agreement = $("#agreement");

    if(agreement == false){
        alert("Did not agree to TOS");
        event.preventDefault();
        return;
    }
    if(fName.value == ""){
        alert("Please enter a first name");
        event.preventDefault();
        return;
    }
    if(lName.value == ""){
        alert("Please enter a last name");
    }

}
// Use jQuery to select the form with the id "application"
$("#application").submit(validateForm);

/**
 * Validate the form on submit
 * @param {SubmitEvent} event 
 */
function validateForm(event){

    // Unused variable to select the form
    const form = $("application");

    // Get the inputs
    const fName = $("#fName");
    const lName = $("#lName");
    const age = $("#age");
    const experince = $("#experince");
    const agreement = $("#agreement");

    // Check if the user agreed to the terms of service
    if(agreement == false){
        alert("Did not agree to TOS");
        event.preventDefault();
        return;
    }
    // Check if the user entered a first and last name
    if(fName.value == ""){
        alert("Please enter a first name");
        event.preventDefault();
        return;
    }
    if(lName.value == ""){
        alert("Please enter a last name");
    }

}
console.log("Hello World!")

document.getElementById("application", e => validateForm(e))

/**
 * @param {SubmitEvent} event 
 */
function validateForm(event){
    const form = document.getElementById("application");

    const fName = document.getElementById("fName");
    const lName = document.getElementById("lName");
    const age = document.getElementById("age");
    const experince = document.getElementById("experince");
    const agreement = document.getElementById("agreement");

    if(agreement.checked == false){
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
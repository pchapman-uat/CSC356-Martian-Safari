/**
 * Handle the form being submitted
 * @param {SubmitEvent} event 
 * @see {@link validateForm} - Validate the username and password
 */
async function formSubmit(event) {
    // Prevent the default actions
    event.preventDefault();

    // Get the username and password element from the form element
    const username = form.querySelector("#username");
    const password = form.querySelector("#password");

    // Run the validate form function
    const reasons = validateForm(username, password);
    const result = document.getElementById("result")
    // Check if there are any failed reasons
    if(reasons.length > 0){
        // For each reason that is invalid
        for(let i = 0; reasons.length; i++){
            // Create a element
            let element = document.createElement("p");
            // Add the reason text
            element.textContent = reasons[i];
            // Append the element
            result.appendChild(element);
        }
    }
}

/**
 * Validate the username and password
 * @param {String} username 
 * @param {String} password 
 * 
 * @returns {Array<String>} An array of reasons why the form is invalid, if the array is empty then the form is valid
 */
function validateForm(username, password){

    // Initialize the reasons array
    var reasons = [];
    // Check if the username is empty
    if(username == ""){
        reasons.push("Username can not be blank")
    }
    // Check if the password is empty
    if(password == ""){
        reasons.push("Password can not be blank")
    // Check if the password is less than 8 characters
    }else if(password.length < 8){
        reasons.push("Password must be more than 8 characters")
    }
    // Return the reasons
    return reasons;
}
/**
 * @param {SubmitEvent} event 
 */
async function formSubmit(event) {
    event.preventDefault();

    const username = form.querySelector("#username");
    const password = form.querySelector("#password");

    const reasons = validateForm(username, password);
    const result = document.getElementById("result")
    if(reasons.length > 0){
        for(let i = 0; reasons.length; i++){
            let element = document.createElement("p");
            element.textContent = reasons[i];
            result.appendChild(element);
        }
    }
}

/**
 * 
 * @param {String} username 
 * @param {String} password 
 */
function validateForm(username, password){
    console.log(username)
    var reasons = [];
    if(username == ""){
        reasons.push("Username can not be blank")
    }
    if(password == ""){
        reasons.push("Password can not be blank")
    }else if(password.length < 8){
        reasons.push("Password must be more than 8 characters")
    }

    return reasons;
}
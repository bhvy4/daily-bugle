const inputs = document.querySelectorAll('input');
const button = document.querySelector(".main_bt");
// let check = false;
const pattern = {
    email: /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/,
    password: /(?=^.{6,}$)(?=.*[0-9])(?=.*[A-Z])(?=.*[a-z])(?=.*[^A-Za-z0-9]).*/,
}

const isValid = (regex,field)=>{
    if(regex.test(field.value)){
        field.classList = 'valid';
    } else {
        field.classList = 'invalid';
    }
}

/* this will check if all input contains invalid class, */
const checkForDisable = (arr)=>{

    for(i=0; i<arr.length;i++){
        if(arr[i].classList.contains('invalid')){
            button.disabled=true;
            break;
        } else{
            button.disabled=false;
        }
    }
}

inputs.forEach(input =>{
    input.addEventListener('keyup',e=>{
        isValid(pattern[e.target.attributes.name.value],e.target);
        checkForDisable(inputs);
    })
})

const inputs = document.querySelectorAll('input');
const button = document.querySelector(".main_bt");
// let check = false;
const pattern = {
    name: /^[a-z]+ [a-z]+$/i,
    email: /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/,
    phone: /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/,
    password: /(?=^.{6,}$)(?=.*[0-9])(?=.*[A-Z])(?=.*[a-z])(?=.*[^A-Za-z0-9]).*/,
    password2: /(?=^.{6,}$)(?=.*[0-9])(?=.*[A-Z])(?=.*[a-z])(?=.*[^A-Za-z0-9]).*/,
    about: /(.|\s)*\S(.|\s)*/

}

const isValid = (regex,field)=>{
    if(regex.test(field.value)){
        field.classList = 'valid';
        // check = true;
    } else {
        field.classList = 'invalid';
        // check = false;
    }
    // return check;
}

/* this will check if all input contains invalid class, */
const checkForDisable = (arr)=>{
    // arr.forEach(item=>{
    //     if(item.classList.contains('invalid')){
    //         button.disabled=true;
    //         console.log('true');
    //         break;
    //     } else{
    //         button.disabled=false;
    //         console.log('false');
    //     }
    // })
    for(i=0; i<arr.length;i++){
        if(arr[i].classList.contains('invalid')){
            button.disabled=true;
            console.log('true');
            break;
        } else{
            button.disabled=false;
            console.log('false');
        }
    }
}

inputs.forEach(input =>{
    input.addEventListener('keyup',e=>{
        isValid(pattern[e.target.attributes.name.value],e.target);
        // if(isvalid){

        // }
        // if(e.target.classList.contains('invalid')){
        //     button.disabled=true;
            
        // } else{
        //     button.disabled=false;
        // }
        // if(check){
        //     button.disabled=false;
        // } else{
        //     button.disabled=true;
        // }
        checkForDisable(inputs);
    })
})




/* match password validation */
const pass1 = document.getElementById("pass1");
const pass2 = document.getElementById("pass2");


pass2.addEventListener('keyup',e=>{
    if(pass1.value!==pass2.value){
        pass2.className="invalid";
    } else {
        pass2.className="valid";
    }
})

// disable/enable button 





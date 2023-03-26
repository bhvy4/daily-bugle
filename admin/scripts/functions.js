const addStatusMessage = (status,message)=>{
    let errorContainer = document.getElementById('error-message-container');
    let messageDiv = document.createElement('div');
    let text = document.createTextNode(message);
    switch (status){
        case "success":
            messageDiv.classList.add("alert-success");
            // messageDiv.setAttribute("role","alert");
            break;
    }
    messageDiv.appendChild(text);
    errorContainer.appendChild(messageDiv);

    setTimeout(removeMessage,3000,messageDiv);
    // if (errorContainer) {
    //     // code that uses errorContainer
    //   } else {
    //     console.error("Element with ID 'error-message-container' not found.");
    //   }
}

const removeMessage = (element)=>{
    element.remove();
}

const test = ()=>{
  alert('check');
}
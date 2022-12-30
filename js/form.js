function checkInput(event) {
    let charCode = (event.which) ? event.which : event.keyCode;
    
    return !(charCode > 31 && (charCode < 48 || charCode > 57));
}

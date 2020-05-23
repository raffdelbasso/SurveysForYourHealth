mostraPassword = () => {
    var txtPsw = document.getElementById('input-password-registrazione')

    if(txtPsw.type === "password"){
        txtPsw.type = "text"
    }else{
        txtPsw.type = "password"
    }
}
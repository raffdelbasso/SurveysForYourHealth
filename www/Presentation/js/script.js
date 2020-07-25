mostraPassword = () => {
    var txtPsw = document.getElementById('input-password-registrazione')

    if(txtPsw.type === "password"){
        txtPsw.type = "text"
    }else{
        txtPsw.type = "password"
    }
}

var tuttoOk = false;
validaPassword = () => {
    var txtPsw = document.getElementById('input-password-registrazione');
    tuttoOk = true;
    if (txtPsw.value.length < 6) {
        document.getElementById('psw1').style = "color: red;";
        tuttoOk = false;
    } else {
        document.getElementById('psw1').style = "color: green;";
    }
    if (!/\d/.test(txtPsw.value)) {
        document.getElementById('psw2').style = "color: red;";
        tuttoOk = false;
    } else {
        document.getElementById('psw2').style = "color: green;";
    }
}

validaPassword2 = () => {
    var txtPsw = document.getElementById('input-password-registrazione');
    tuttoOk = true;
    if (txtPsw.value.length < 6) {
        document.getElementById('psw1').style = "color: red;";
        tuttoOk = false;
    } else {
        document.getElementById('psw1').style = "color: green;";
    }
    if (!/\d/.test(txtPsw.value)) {
        document.getElementById('psw2').style = "color: red;";
        tuttoOk = false;
    } else {
        document.getElementById('psw2').style = "color: green;";
    }
    if (txtPsw.value !== document.getElementById('vecchia-password').value) {
        document.getElementById('psw3').style = "color: red;";
        tuttoOk = false;
    } else {
        document.getElementById('psw3').style = "color: green;";
    }
}

validaPassword3 = () => {
    var txtPsw = document.getElementById('input-password-registrazione');
    tuttoOk = true;
    if (txtPsw.value !== document.getElementById('vecchia-password').value) {
        document.getElementById('psw3').style = "color: red;";
        tuttoOk = false;
    } else {
        document.getElementById('psw3').style = "color: green;";
    }
}

inviaForm = () => {
    if (tuttoOk) {
		var e = document.getElementById("input-seleziona-pediatra");
		var strUser = e.options[e.selectedIndex].value;
		if (e.options[e.selectedIndex].value !== "") {
			document.getElementById('form-registrazione').submit();
		} else {
			e.style = "border: 2px solid red;";	
		}
    }
}
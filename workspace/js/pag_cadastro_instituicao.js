function validaEmail(field) {
    usuario = field.value.substring(0, field.value.indexOf("@"));
    dominio = field.value.substring(field.value.indexOf("@")+ 1, field.value.length);
    
    if ((usuario.length >=1) &&
        (dominio.length >=3) &&
        (usuario.search("@")==-1) &&
        (dominio.search("@")==-1) &&
        (usuario.search(" ")==-1) &&
        (dominio.search(" ")==-1) &&
        (dominio.search(".")!=-1) &&
        (dominio.indexOf(".") >=1)&&
        (dominio.lastIndexOf(".") < dominio.length - 1)) {
      return true;
    }
    else{
      return false;
    }
}
  
function validar(){
  if(txtNome.value == '' || txtNome.value.length < 3){
    alert("Preencha com seu nome!");
    txtNome.value = '';
    txtNome.focus();
    return false;
  }
  if(!validarEmail(txtEmail.value)){
    alert("Informe um e-mail válido!");
    txtEmail.focus();
    txtEmail.value = "";
    return false;
  }
  if(txtEndereco == '' || txtEndereco.value.length<5){
    alert("Preencha com seu endereço!");
    txtEndereco.focus();
    txtEndereco.value = "";
    return false;
  }
  if(nrTelefone.value == ''
  || nrTelefone.value.length < 11){
    alert("Preencha com um número de celular válido!");
    nrTelefone.focus();
    nrTelefone.value = "";
    return false;
  }
  if(txtSenha.value == '' || txtSenha.value.length<8 ){
    alert("Preencha uma senha com ao menos 8 caracteres!");
    txtSenha.focus();
    txtSenha.value = "";
    return false;
  }
  if(txtCNPJ.value == '' || txtCNPJ.value.length != 14 || isNaN(txtCNPJ.value)){
    alert("Preencha um CNPJ valido com 14 caracteres!");
    txtCNPJ.focus();
    txtCNPJ.value = "";
    return false;
  }
  if(txtSenha.value != txtConfirSenha.value){
    alert("Senha e confirmação são diferentes!");
    txtConfirSenha.focus();
    txtConfirSenha.value = "";
    return false;
  }
  formCadastro.submit();
}


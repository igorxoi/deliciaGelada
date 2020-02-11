function validarEntrada(caracter, tipeBlock)
{
    //se o bloqueio for para numeros (number)
    //se o bloqueio for para caracters (caracter)

    var tipo = tipeBlock;
    console.log
        if(window.event){
            //Converte o caracter digitado em ASCII
            var asc = caracter.charCode;
        }else{
            //Converte o caracter digitado em ASCII
            var asc= caracter.which;
        }
       
        
       
        console.log(asc);   
    
        if(tipo == 'number'){
            //Restringe a entrada de numeros pela tabela asccii
            if(asc >= 48 && asc <= 57){
                return false;
            }

        }else if(tipo == 'caracter'){
            //Restringe a entrada de texto pela tabela asccii
            if(asc <48 || asc >57){
                return false;
            }
        }
                
    }

function mascaraTelefone(telefone){ 
    if(telefone.value.length == 0)
        telefone.value = '(' + telefone.value; 
    if(telefone.value.length == 3)
        telefone.value = telefone.value + ') '; 

    if(telefone.value.length == 9)
        telefone.value = telefone.value + '-';
}

function mascaraCelular(celular){ 
    if(celular.value.length == 0)
        celular.value = '(' + celular.value; 
    if(celular.value.length == 3)
        celular.value = celular.value + ') '; 

    if(celular.value.length == 10)
        celular.value = celular.value + '-';
}
        
            
       
  

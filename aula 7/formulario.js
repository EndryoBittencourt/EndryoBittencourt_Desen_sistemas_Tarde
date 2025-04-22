//EXECUTAR MASCARAS

//DEFINE O OBJETO E CHAMA A FUNCAO
function mascara(o, f) {
    objeto=o
    funcao=f
    setTimeout("executaMascara()",1)
}

function executaMascara(){
    objeto.value=funcao(objeto.value)
}

//Mascara de Telefone
function telefone(variavel){


    variavel = variavel.replace(/\D/g,"")


    variavel = variavel.replace(/^(\d\d)(\d)/g,"($1) $2")


    variavel = variavel.replace(/(\d{4})(\d)/,"$1-$2")
    return variavel
    }

//Mascara do RG e CPF
function RGeCPF(variavel){


    variavel = variavel.replace (/\D/g,"")

    //coloca um ponto apos o terceiro digito e o quarto
    variavel = variavel.replace(/(\d{3})(\d)/,"$1-$2")

    //coloca um ponto apos o sexto digito e o setimo
    variavel = variavel.replace(/(\d{3})(\d)/,"$1-$2")

    //coloca o hifem apos o setimo digito e permite apenas 2 digitos apos o hifem
    variavel = variavel.replace(/(\d{3})(\d{1,2})$/,"$1-$2")
    return variavel

}

//mascara do cep
function cep(variavel){
    variavel = variavel.replace(/\D/g,"") //remove tudo o que nao é digito
    variavel = variavel.replace(/(\d{2})(\d)/,"$1.$2") //coloca 2 barra
    variavel = variavel.replace(/(\d{3})(\d{1,3})$/,"$1-$2")
    return variavel

}

//mascara data
function data(variavel){
    variavel = variavel.replace(/\D/g,"")
    variavel = variavel.replace(/(\d{2})(\d)/,"$1/$2")
    variavel = variavel.replace(/(\d{2})(\d)/,"$1/$2")
    return variavel

}

//Mascara de Cartão SUS
function CartaoSus(variavel){


    variavel = variavel.replace(/\D/g,"")
    return variavel

}

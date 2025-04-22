function mascara(o, f) {
    obj=o
    func=f
    setTimeout("executaMascara()",1)
}

    function executaMascara(){
     obj.value=func(obj.value)
}

    function NomeLogin(variavel){
        variavel = variavel.replace(/[^a-zA-Z áÁéÉíÍóÓúÚçÇ]/g, '');
        return variavel
}

    function Bairro(variavel){
        variavel = variavel.replace(/[^a-zA-Z áÁéÉíÍóÓúÚçÇ]/g, '');
        return variavel
}

    function Cidade(variavel){
        variavel = variavel.replace(/[^a-zA-Z áÁéÉíÍóÓúÚçÇ]/g, '');
        return variavel
}

    function Numero(variavel){
        variavel = variavel.replace(/\D/g, '');
        return variavel
}

    function Sobrenome(variavel){
        variavel = variavel.replace(/[^a-zA-Z áÁéÉíÍóÓúÚçÇ]/g, '');
        return variavel
}

    function Cpf(variavel) {
        variavel = variavel
        variavel = variavel.replace(/\D/g, '')
        variavel = variavel.replace(/(\d{3})(\d)/, '$1.$2')
        variavel = variavel.replace(/(\d{3})(\d)/, '$1.$2')
        variavel = variavel.replace(/(\d{3})(\d{1,2})$/, '$1-$2');
        return variavel
    }
    
    function Rg(variavel) {
        variavel = variavel
        variavel = variavel.replace(/\D/g, '')
        variavel = variavel.replace(/(\d{2})(\d)/, '$1.$2')
        variavel = variavel.replace(/(\d{3})(\d)/, '$1.$2')
        variavel = variavel.replace(/(\d{3})(\d{1})$/, '$1-$2');
        return variavel
    }
    
    function Cep(variavel){
        variavel = variavel.replace(/\D/g,"") 
        variavel = variavel.replace(/(\d{5})(\d{1,3})$/,"$1-$2")
        return variavel
    
    }

    function Telefone(variavel){


        variavel = variavel.replace(/\D/g,"")
        variavel = variavel.replace(/^(\d\d)(\d)/g,"($1) $2")
        variavel = variavel.replace(/(\d{5})(\d)/,"$1-$2")
        return variavel
     }

     function Cpf(variavel){


        variavel = variavel.replace (/\D/g,"")
        variavel = variavel.replace(/(\d{3})(\d)/,"$1.$2")
        variavel = variavel.replace(/(\d{3})(\d)/,"$1.$2")
        variavel = variavel.replace(/(\d{3})(\d{1,2})$/,"$1-$2")
        return variavel
    
    }

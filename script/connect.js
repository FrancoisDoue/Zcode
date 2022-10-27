let regPseudo = /[A-Z*a-z+0-9*\-\_]$/
let regPswTEST = /[^"'(\-\-)]/
let regPsw = /^[^"|'][^"|'=;\-+]/
let inputPseudo = document.querySelector('input[name=usname]')
let inputPsw = document.querySelector('input[name=psw]')
let labelPseudo = document.querySelector('label[for=usname]')
let labelPsw = document.querySelector('label[for=psw]')
let redirCount = document.getElementById('redirCount')
let inputs = document.querySelectorAll('input.red')
let connectBtn = document.getElementById('connexion')
let verif1 = false
let verif2 = false
let cpt = 4
function regCtrl(regex,input,label,verif,regex2){
    if(!regex.test(input.value) && !regex2.test(input.value)){
        label.style.color = 'red'
        input.style.color = 'red'
        input.addEventListener('focus', function(){
            this.value = ''
        })
        verif = false
    }else{
        input.addEventListener('focus', function(){
            this.value = this.value
        })
        input.style.color = 'green'
        label.style.color = 'green'
        verif = true
    }
}
function decompte(){
    if(cpt > 0){
        cpt--
        redirCount.innerText = cpt
        setTimeout(decompte, 1000);
    }
}
window.addEventListener('load',function(){
    if(inputPseudo && inputPsw){
        inputPseudo.addEventListener('blur',function(){
            regCtrl(regPseudo,this,labelPseudo,verif1,regPsw)
        })
        inputPsw.addEventListener('blur',function(){
            regCtrl(regPsw,this,labelPsw,verif2,regPsw)
        })
    }
    if(redirCount){
        decompte()
    }
    if(inputs.length>0){
        inputs.forEach(input => {
            input.addEventListener('focus',function(){
                this.value = '';
                this.setAttribute('class', '');
            })
        });
    }
    if(connectBtn){
        connectBtn.addEventListener('click', function(){
            // if(!verif1 && !verif2){
            //     document.querySelector('form').prevent.default
            // }
        })
    }
})
const nextInscr = document.getElementById('nextInscr')
const endInscr = document.getElementById('endInscr')
let regPseudo = /[A-Z*a-z+0-9*\-\_]$/
let regMail = /^[a-z0-9_\-\.]+@[a-z0-9_\-\.]+\.[a-z]{2,3}$/
let regName = /^[A-Z]{1}[a-zéèçeêëï\-]{2,33}$/
let regPsw = /[^"'(\-\-)]/
let regTab = Array(regPseudo, regName, regName)
let regTab2 = Array(regMail,regPsw,regPsw)
let verif = true;

function ctrlInput(regex, inpVal){
    if(regex.test(inpVal.value)){
        inpVal.style.backgroundColor = 'green'
    }else{
        inpVal.style.backgroundColor = 'red'
        averText = document.querySelector('label[for='+inpVal.name+']')
        averText.innerText = averText.innerText+' est invalide'
        verif = false
    }
}

window.addEventListener('load', function(){
    if(nextInscr){
        let listInp = Array.from(document.querySelectorAll('input[type=text]'))
        nextInscr.addEventListener('click',function(){
            for(i in listInp){
                ctrlInput(regTab[i],listInp[i])
            }
            if(verif){
                document.querySelector('form').submit()
            }else{
                verif = true;
            }
        })
    }
    if(endInscr){
        let listInp = Array.from(document.querySelectorAll('input'))
        endInscr.addEventListener('click',function(){
            for(i in listInp){
                ctrlInput(regTab2[i],listInp[i])
                console.log(listInp[i].value)
            }
            if(verif){
                if(listInp[1].value == listInp[2].value){
                    document.querySelector('form').submit()
                }else{
                    listInp[1].value = ''
                    listInp[1].placeholder = 'Echec de la confirmation'
                    listInp[1].style.backgroundColor = 'red'
                    listInp[2].value = ''
                    listInp[2].placeholder = 'Echec de la confirmation'
                    listInp[2].style.backgroundColor = 'red'
                    verif = true
                }
            }else{
                verif = true
            }
        })
    }
})
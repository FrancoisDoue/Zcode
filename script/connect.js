let redirCount = document.getElementById('redirCount')
let cpt = 6
function decompte(){
    if(cpt > 0){
        cpt--
        redirCount.innerText = cpt
        setTimeout(decompte, 1000);
    }
}
let inputs = document.querySelectorAll('input.red')
window.addEventListener('load',function(){
    if(redirCount){
        decompte()
    }
    if(inputs.length>0){
        inputs.forEach(input => {
            input.addEventListener('focus',function(){
                this.value = '';
            })
        });
    }
})
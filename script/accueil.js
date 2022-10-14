let popUser = document.getElementById('connected')
let userBtn = document.getElementById('userButton')
window.addEventListener('load', function(){
    if(popUser){
        popUser.style.display = 'none'
        userBtn.addEventListener('click',function(){
            if(popUser.style.display = 'none'){
                popUser.style.display = 'flex'
                popUser.addEventListener('mouseleave',function(){
                    this.style.display = 'none'
                })
            }
        })
    }
})
let popUser = document.getElementById('connected')
let userBtn = document.getElementById('userButton')
function hidePopUser(){
    popUser.style.display = 'none'
}
window.addEventListener('load', function(){
    if(popUser){
        hidePopUser()
        userBtn.addEventListener('click',function(){
            if(popUser.style.display = 'none'){
                popUser.style.display = 'flex'
                setInterval(() => {
                    popUser.addEventListener('mouseleave',function(){
                        setTimeout(hidePopUser,1500)
                    })
                }, 1500);
            }
        })
    }
})
                // popUser.addEventListener('mouseout',function(){
                //     hidePopUser()
                // })
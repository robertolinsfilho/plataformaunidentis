const rotateAlert = document.querySelector('.rotate-success');
document.addEventListener('click', e => {
et = e.target;
if(et.classList.contains('minus-rotate')){
    let fname = et.getAttribute('fname');
    axios.post('http://localhost:8080/AmbienteTeste/uniDigital/functions/rotate-image.php', {
        degress: 90,
        fname: fname
    }).then(res => {
        if(res.status == 200){
            rotateAlert.style.position =  'relative'
            rotateAlert.style.visibility =  'visible'
            setTimeout(() => {
                rotateAlert.style.position =  'absolute'
                rotateAlert.style.visibility =  'hidden'
            }, 2400);
        }
    }).catch(error => {
        console.log('error');
    });
    
}
if(et.classList.contains('plus-rotate')){
    let fname = et.getAttribute('fname');
    axios.post('http://localhost:8080/AmbienteTeste/uniDigital/functions/rotate-image.php', {
        degress: -90,
        fname: fname
    }).then(res => {
        if(res.status == 200){
            rotateAlert.style.position =  'relative'
            rotateAlert.style.visibility =  'visible'
            setTimeout(() => {
                rotateAlert.style.position =  'absolute'
                rotateAlert.style.visibility =  'hidden'
            }, 2400);
        }
    }).catch(error => {
        console.log('error');
    });
}
})
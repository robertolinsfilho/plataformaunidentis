// Production
const pathToImageRotate = window.location.protocol+"//"+window.location.host+"/functions/rotate-image.php";

// Ambiente de teste mudar para algo semelhante a: pathToImageRotate = window.location.protocol+"//"+window.location.host+"/unidentisdigital/functions/rotate-image.php"

const rotateAlert = document.querySelector('.rotate-success');
document.addEventListener('click', e => {
et = e.target;
if(et.classList.contains('minus-rotate')){
    let fname = et.getAttribute('fname');
    axios.post(pathToImageRotate, {
        degress: 90,
        fname: fname
    }).then(res => {
        if(res.status == 200){
            console.log(res.data);
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
    axios.post(pathToImageRotate, {
        degress: -90,
        fname: fname
    }).then(res => {
        if(res.status == 200){
            console.log(res.data);
            console.log(fname);
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
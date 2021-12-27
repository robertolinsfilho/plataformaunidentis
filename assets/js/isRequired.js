let btn = document.querySelector("[isRequired]");
let isRequiredFields = document.querySelectorAll(".isRequired");

btn.addEventListener('click', (e) => {
    if(btn.classList.contains('check')){
        e.preventDefault();
        if(validar(isRequiredFields)){
            btn.classList.remove('check');
            btn.click();
        };
    }
});

function validar(array){
    let valid = false;
    let span = document.createElement('span');
    span.innerHTML = 'Compo Obrigatório';
    valid = true;
    array.forEach(value => {
        var node = document.createElement("span");
        var textnode = document.createTextNode("Campo Obrigatório");
        node.setAttribute('class', 'erroMsg');
        node.appendChild(textnode);
        if(value.classList.contains('red')){
            valid = true;
            value.classList.remove('red');
            Array.from(value.parentNode.children).forEach(span => {
                if(span.classList.contains('erroMsg')){
                    value.parentNode.removeChild(span);
                }
            });
            if(value.value == ''){
                value.classList.add('red');
                value.parentNode.appendChild(node);
                valid = false;
            };
        }else{
            if(value.value == ''){
                value.classList.add('red');
                value.parentNode.appendChild(node);
                valid = false;
            };
        }
    });
    if(valid){
        return true;
    } else {
        return false;
    }
}
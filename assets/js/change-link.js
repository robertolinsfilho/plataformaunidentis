const embedItem = document.querySelector('embed.pdf_embed');
document.addEventListener('click', (event) => {
    et = event.target;
    if(et.classList.contains('linkPdf')){
        let link = et.getAttribute('link');
        embedItem.setAttribute('src', link);
    };
})

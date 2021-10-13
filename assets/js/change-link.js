const embedItem = document.querySelector('embed.pdf_embed');
document.addEventListener('click', (event) => {
    if(event.target.classList.contains('linkPdf')){
        let link = et.getAttribute('link');
        embedItem.setAttribute('src', link);
    };
})

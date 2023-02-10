const scanner = new Html5QrcodeScanner('qr-reader', {
    qrbox : {
        width: 300,
        height: 300, 
    },
    fps: 20,
})

function success(result) {
    let divEl = document.createElement('div');
    divEl.id = 'result';
    document.querySelector('#container').appendChild(divEl)
    divEl .innerHTML = `
    <h1>SUCCÈS</h1>
    <p>${result}</p> 
    <a href="index.html" >retour</a> `;
    scanner.clear();
    document.querySelector('#qr-reader').remove();
}
function error(err) {
    console.log(err);
}
const start = () => scanner.render(success, error);

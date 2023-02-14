const scanner = new Html5QrcodeScanner('qr-reader', {
  qrbox : {
      width: 600,
      height: 600,
      width: 300,
      height: 300, 
  },
  fps: 20,
})
scanner.render(success, error);

function success(result) {
  document.querySelector('#rest').innerHTML = `
  <h1>seccess</h1>
  <p><a href='$'>${result}</a></p>
  `;
  let divEl = document.createElement('div');
  divEl.id = 'result';
  document.querySelector('body').appendChild(divEl)
  divEl .innerHTML = `
  <h1>SUCCÈS</h1>
  <p>${result}</p>  `;
  // scanner.clear();
  // document.querySelector('#qr-reader').remove();
}
function error(err) {
  console.log(err);
}
const start = () => scanner.render(success, error);

let buttonEl = document.querySelector("#start");
buttonEl.addEventListener('onclick', start())
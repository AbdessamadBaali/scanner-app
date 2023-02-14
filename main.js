const scanner = new Html5QrcodeScanner(
    "qr-reader",
    {
      fps: 20,
      qrbox: 300,
    },
    /* verbose= */ false
  );

// start scanning
const startScanning = () => {
    const qrAnimation = document.querySelector('.qr-container');
    qrAnimation.style.display = 'none';
    btnStart.style.display = 'none';

    const success = (result) => {
      document.getElementById("result").innerHTML = `
      <h2>QR Code Scanned:</h2>
      <p>${result}</p> `;
    };

    const error = (error) => {
      console.log(`QR Code Error: ${error}`);
    };

    scanner.render(success,error);
}
// button for trigger the scanning

const btnStart = document.querySelector('#start');
btnStart.addEventListener("click", startScanning);

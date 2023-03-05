const scanner = new Html5QrcodeScanner( "qr-reader",  {
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

  scanner.render((result) => {
    let list = result.split(";")
    let id = list[0].split(":");
    id = id[1];
    document.getElementById("result").innerHTML = `
    <h2>QR Code Scanned:</h2>
    <p>${result}</p> 
    <a class='button' id='update' href='index.php?update_file&id=${id}'>update</a> `;
  }
  ,(error) => {
    console.log(`QR Code Error: ${error}`);
  });
}
// button for trigger the scanning

const btnStart = document.querySelector('#start');
btnStart.addEventListener("click", startScanning);


function update_action() {
  // Get the input values
  var idEl = document.getElementById("id");
  var nameEl = document.getElementById("name");
  var etageEl = document.getElementById("etage");
  var columnEl = document.getElementById("column");
  var typeEl = document.getElementById("typeF");
  var groupeEl = document.getElementById("groupe");
  var stagiaireEl = document.getElementById("stagiaire");
  var saisonEl = document.getElementById("saison");

  // Send the data using AJAX
  // var xhr = new XMLHttpRequest();
  // xhr.open("GET", "model.php?baali", true);
  // xhr.onreadystatechange = function() {
  //   if (xhr.readyState === 4 && xhr.status === 200) {
      let info = document.querySelector("#result > p").innerHTML.split(";");
      let idVal = info[0].split(":")
      let id = idVal[idVal.length-1];
      idEl.value = id;
      let nameVal = info[1].split(":")
      let name = nameVal[nameVal.length-1];
      nameEl.value = name;
      
      let etageVal = info[2].split(":")
      let etage = etageVal[etageVal.length-1];
      etageEl.value = etage;
      
      let columnVal = info[3].split(":")
      let column = columnVal[columnVal.length-1];
      columnEl.value = column;
      
      let typeVal = info[4].split(":")
      let type = typeVal[typeVal.length-1];
      typeEl.value = type;
      
      let groupeVal = info[5].split(":")
      let groupe = groupeVal[groupeVal.length-1];
      groupeEl.value = groupe;
      
      let stagiaireVal = info[6].split(":")
      let stagiaire = stagiaireVal[stagiaireVal.length-1];
      stagiaireEl.value = stagiaire;
      
     let saisonVal = info[7].split(":")
     let saison = saisonVal[saisonVal.length-1];
     saisonEl.value = saison;
   

}

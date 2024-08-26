const showVonesaoreBtn = document.getElementById("radio-delay");
const showVonesaDiteBtn = document.getElementById("radio-cancellation");
const showMissed = document.getElementById("radio-missed_connection");
const deniedCon = document.getElementById("radio-denied");
const vonesaore = document.querySelector(".vonesaore");
const vonesadite = document.querySelector(".vonesadite");
const missed = document.querySelector(".missed");
const denied = document.querySelector(".denied-alternative");
const transit = document.querySelector(".tranziti");
const pamjaPare = document.querySelector(".pamjapare");


showVonesaoreBtn.addEventListener("click", () => {
  vonesaore.style.display = "block";
  vonesadite.style.display = "none";
  missed.style.display = "none";
  destination.style.display = "block";
});



showVonesaDiteBtn.addEventListener("click", () => { 
    vonesadite.style.display = "block";
    denied.style.display = "block";
    vonesaore.style.display = "none";
    missed.style.display = "none";
    destination.style.display = "block";
    
});
showMissed.addEventListener("click", () => {
    missed.style.display = "block";
    vonesaore.style.display = "block";
    vonesadite.style.display = "none";
    transit.style.display = "block";
    denied.style.display ="none";
    pamjaPare.style.display = "none";
});

deniedCon.addEventListener("click", () => {
    denied.style.display = "block";
    vonesaore.style.display = "none";
    vonesadite.style.display = "none";
    transit.style.display = "none";
    missed.style.display = "none";
    pamjaPare.style.display = "block";

    
});
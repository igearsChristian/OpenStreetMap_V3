var infoPanel = document.getElementById("infoPanel");
var infoText = document.getElementById("infoText");
var infoImage = document.getElementById("infoImage");

function showInfoPanel(text, img) {
  if (infoPanel.classList.contains("active")) {
    infoPanel.classList.remove("active");
  } else {
    infoText.innerHTML = text;
    infoImage.src = img;
    infoPanel.classList.add("active");
  }
}

var controlPanel = document.getElementById("controlPanel");
var toggleButton = document.getElementById("toggleButton");
const layersControl = document.querySelector(".leaflet-control-layers");

// Add an event listener to the toggle button
toggleButton.addEventListener("click", function () {
  controlPanel.classList.toggle("active"); // Toggle the active class
  toggleButton.textContent = controlPanel.classList.contains("active")
    ? "←"
    : "→";

  layersControl.style.display = controlPanel.classList.contains("active")
    ? "block"
    : "none";
});

function switchMapLayer() {
  var selectedLayer = document.querySelector(
    'input[name="options"]:checked'
  ).value;

  if (selectedLayer === "street") {
    map.removeLayer(satelliteLayer);
    map.addLayer(streetLayer);
  } else if (selectedLayer === "satellite") {
    map.removeLayer(streetLayer);
    map.addLayer(satelliteLayer);
  }
}

// Event listener for radio buttons
document
  .getElementById("mapSelector")
  .addEventListener("change", switchMapLayer);

//
//
//
//Marker panel logic
// map.addLayer(IT_K);
// map.addLayer(IT_NT);
// map.addLayer(IT_H);
// map.addLayer(K_IT);
// map.addLayer(H_IT);
// map.addLayer(NT_IT);

// map.removeLayer(IT_K);
// map.removeLayer(IT_NT);
// map.removeLayer(IT_H);
// map.removeLayer(K_IT);
// map.removeLayer(H_IT);
// map.removeLayer(NT_IT);

function toggleMarkers() {
  // industry on - district varies
  if (document.getElementById("toggleIT").checked) {
    if (document.getElementById("toggleKowloon").checked) {
      map.addLayer(IT_K);
      map.addLayer(K_IT);
    } else {
      map.removeLayer(IT_K);
      map.removeLayer(K_IT);
    }
    if (document.getElementById("toggleNT").checked) {
      map.addLayer(IT_NT);
      map.addLayer(NT_IT);
    } else {
      map.removeLayer(IT_NT);
      map.removeLayer(NT_IT);
    }
    if (document.getElementById("toggleHKI").checked) {
      map.addLayer(IT_H);
      map.addLayer(H_IT);
    } else {
      map.removeLayer(IT_H);
      map.removeLayer(H_IT);
    }
  } else {
    map.removeLayer(IT_K);
    map.removeLayer(IT_NT);
    map.removeLayer(IT_H);
    map.removeLayer(K_IT);
    map.removeLayer(H_IT);
    map.removeLayer(NT_IT);
  }

  if (document.getElementById("toggleCommerical").checked) {
    if (document.getElementById("toggleKowloon").checked) {
      map.addLayer(Com_K);
      map.addLayer(K_Com);
    } else {
      map.removeLayer(Com_K);
      map.removeLayer(K_Com);
    }
    if (document.getElementById("toggleNT").checked) {
      map.addLayer(Com_NT);
      map.addLayer(NT_Com);
    } else {
      map.removeLayer(Com_NT);
      map.removeLayer(NT_Com);
    }
    if (document.getElementById("toggleHKI").checked) {
      map.addLayer(Com_H);
      map.addLayer(H_Com);
    } else {
      map.removeLayer(Com_H);
      map.removeLayer(H_Com);
    }
  } else {
    map.removeLayer(Com_K);
    map.removeLayer(Com_NT);
    map.removeLayer(Com_H);
    map.removeLayer(K_Com);
    map.removeLayer(H_Com);
    map.removeLayer(NT_Com);
  }

  if (document.getElementById("toggleArt").checked) {
    if (document.getElementById("toggleKowloon").checked) {
      map.addLayer(Art_K);
      map.addLayer(K_Art);
    } else {
      map.removeLayer(Art_K);
      map.removeLayer(K_Art);
    }
    if (document.getElementById("toggleNT").checked) {
      map.addLayer(Art_NT);
      map.addLayer(NT_Art);
    } else {
      map.removeLayer(Art_NT);
      map.removeLayer(NT_Art);
    }
    if (document.getElementById("toggleHKI").checked) {
      map.addLayer(Art_H);
      map.addLayer(H_Art);
    } else {
      map.removeLayer(Art_H);
      map.removeLayer(H_Art);
    }
  } else {
    map.removeLayer(Art_K);
    map.removeLayer(Art_NT);
    map.removeLayer(Art_H);
    map.removeLayer(K_Art);
    map.removeLayer(H_Art);
    map.removeLayer(NT_Art);
  }

  if (document.getElementById("toggleKowloon").checked) {
    map.addLayer(Kowloon_group);
  } else {
    map.removeLayer(Kowloon_group);
  }
  if (document.getElementById("toggleNT").checked) {
    map.addLayer(NT_group);
  } else {
    map.removeLayer(NT_group);
  }
  if (document.getElementById("toggleHKI").checked) {
    map.addLayer(HKI_group);
  } else {
    map.removeLayer(HKI_group);
  }
}

//
//
//
// Event listeners for checkboxes
document
  .getElementById("markerSelector")
  .addEventListener("change", toggleMarkers);

document
  .getElementById("districtSelector")
  .addEventListener("change", toggleMarkers);

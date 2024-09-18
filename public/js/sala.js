const container = document.querySelector(".container");
const seats = document.querySelectorAll(".row .seat:not(.occupied)");
const count = document.getElementById("count");
const total = document.getElementById("total");
const sedista = document.getElementById("sedista");
const movieSelect = document.getElementById("cena_karte");
const cena_karte = document.getElementById("cena_karte");
const sedista_ids = [];

let ticketPrice = cena_karte.value;

updateSelectedCount = () => {
  const selectedSeats = document.querySelectorAll(".row .seat.selected");
  let sedista_ids = [];
  selectedSeats.forEach((seat) => {
    sedista_ids.push(seat.id);
  });

  // Provera da li su sedista u istom redu i da li su jedna pored drugog
  if (selectedSeats.length >= 0) {
    const rowNumbers = Array.from(selectedSeats).map(seat => seat.id.split('-')[0]);
    const seatNumbers = Array.from(selectedSeats).map(seat => parseInt(seat.id.split('-')[1]));
    
    const isSameRow = rowNumbers.every(row => row === rowNumbers[0]);
    const isConsecutive = seatNumbers.sort((a, b) => a - b).every((num, idx, arr) => idx === 0 || num === arr[idx - 1] + 1);

    if (selectedSeats.length <= 5 && isSameRow && isConsecutive) {
      // Uspesna selekcija
      sedista.innerText = sedista_ids;

      const seatsIndex = [...selectedSeats].map((seat) => {
        return [...seats].indexOf(seat);
      });

      localStorage.setItem("selectedSeats", JSON.stringify(seatsIndex));

      const selectedSeatsCount = selectedSeats.length;

      count.innerText = selectedSeatsCount;
      total.innerText = selectedSeatsCount * ticketPrice;
    } else {
      // Neuspesna selekcija, poruka se salje
      selectedSeats[selectedSeats.length - 1].classList.remove('selected');
      alert('You can select a maximum of 5 seats, and they must be in the same row and consecutive.');
    }
  }
};

function populateUI() {
  const selectedSeats = JSON.parse(localStorage.getItem("selectedSeats"));
  
  if (selectedSeats !== null && selectedSeats.length > 0) {
    
    seats.forEach((seat, index) => {
      if (selectedSeats.indexOf(index) > -1) {
        seat.classList.add("selected");                
      }      
    });
  }
  

  const selectedMovieIndex = localStorage.getItem("selectedMovieIndex");

  if (selectedMovieIndex !== null) {
    movieSelect.selectedIndex = selectedMovieIndex;
  }
}

movieSelect.addEventListener("change", (e) => {
  ticketPrice =  movieSelect.value;
  console.log(ticketPrice);
  setMovieData(e.target.selectedIndex, e.target.value);
  updateSelectedCount();
  
});

container.addEventListener("click", (e) => {
  if (
    e.target.classList.contains("seat") &&
    !e.target.classList.contains("occupied")
  ) {
    e.target.classList.toggle("selected");

    // Proveri dostupnost
    if (isValidSelection()) {
      updateSelectedCount();
    } else {      
      e.target.classList.toggle("selected");
      toastr.info('Mozete izabrati samo pet sedišta po rezervaciji ili kupovini i ona moraju biti jedna pored drugog.');
    }
  }
});

const isValidSelection = () => {
  const selectedSeats = document.querySelectorAll(".row .seat.selected");
  if (selectedSeats.length === 0) return true;
  
  const rowNumbers = Array.from(selectedSeats).map(seat => seat.id.split('-')[0]);
  const seatNumbers = Array.from(selectedSeats).map(seat => parseInt(seat.id.split('-')[1]));
  
  const isSameRow = rowNumbers.every(row => row === rowNumbers[0]);
  const isConsecutive = seatNumbers.sort((a, b) => a - b).every((num, idx, arr) => idx === 0 || num === arr[idx - 1] + 1);

  return selectedSeats.length <= 5 && isSameRow && isConsecutive;
};

updateSelectedCount();



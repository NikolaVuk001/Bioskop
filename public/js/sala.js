const container = document.querySelector(".container");
const seats = document.querySelectorAll(".row .seat:not(.occupied)");
const count = document.getElementById("count");
const total = document.getElementById("total");
const sedista = document.getElementById("sedista");
const movieSelect = document.getElementById("cena_karte");
const sedista_ids = [];

populateUI();

let ticketPrice = movieSelect.value;




updateSelectedCount = () => {
  const selectedSeats = document.querySelectorAll(".row .seat.selected");
  let sedista_ids = [];
  selectedSeats.forEach((seat, index) => {
    
    sedista_ids.push(seat.id);
  });

    


  console.log(sedista_ids);

  const seatsIndex = [...selectedSeats].map((seat) => {
    return [...seats].indexOf(seat);
  });

  localStorage.setItem("selectedSeats", JSON.stringify(seatsIndex));

  const selectedSeatsCount = selectedSeats.length;

  count.innerText = selectedSeatsCount;
  total.innerText = selectedSeatsCount * ticketPrice;
  sedista.innerText = sedista_ids;
  
  
  
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

    updateSelectedCount();
  }
});

updateSelectedCount();

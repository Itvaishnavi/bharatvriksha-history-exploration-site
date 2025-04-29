function flipCard(card) {
    card.querySelector('.card-inner').classList.toggle("flipped");
}
function updateRatingValue(value) {
    document.getElementById('ratingValue').innerText = value;
}
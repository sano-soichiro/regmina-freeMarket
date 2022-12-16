
const modalOpen = document.getElementById('openModal');
const modalArea = document.getElementById('modal_body');
const fasearch = document.getElementById('fa-search');
const modalBg = document.getElementsByClassName('modalBg')[0];
modalOpen.addEventListener('click', () => {
    modalArea.style.display = 'flex';
    modalBg.style.display = 'block';
    fasearch.style.display = 'none';
});

/* const modalClose = document.getElementsByClassName('closeModal')[0];
modalClose.addEventListener('click',() => {
   modalArea.style.display = 'none';
 }); */

modalBg.addEventListener('click', () => {
   modalArea.style.display = 'none';
   modalBg.style.display = 'none';
   fasearch.style.display = 'block';
});
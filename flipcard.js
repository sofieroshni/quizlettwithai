let flashcards = [];
let currentIndex = 0;

function goToCreate() {
  document.getElementById('home').classList.remove('active');
  document.getElementById('create').classList.add('active');
}

function goBack() {
  document.getElementById('create').classList.remove('active');
  document.getElementById('home').classList.add('active');
  resetFlashcards();
}

function addNewInput() {
  const inputsDiv = document.getElementById('inputs');
  const newGroup = document.createElement('div');
  newGroup.className = 'mb-3 input-group';
  newGroup.innerHTML = `
    <input type="text" placeholder="Begreb" class="form-control">
    <input type="text" placeholder="Definition" class="form-control">
  `;
  inputsDiv.appendChild(newGroup);
}

function generateFlashcards() {
  const inputGroups = document.querySelectorAll('#inputs .input-group');
  flashcards = [];
  inputGroups.forEach(group => {
    const term = group.children[0].value.trim();
    const definition = group.children[1].value.trim();
    if (term && definition) {
      flashcards.push({ term, definition });
    }
  });

  if (flashcards.length > 0) {
    document.getElementById('inputs').style.display = 'none';
    document.querySelector('#create button[onclick="addNewInput()"]').style.display = 'none';
    document.querySelector('#create button[onclick="generateFlashcards()"]').style.display = 'none';
    document.getElementById('flashcardsView').style.display = 'block';
    currentIndex = 0;
    showCard();
  }
}

function showCard() {
  const container = document.getElementById('flashcardContainer');
  container.innerHTML = '';
  const cardData = flashcards[currentIndex];

  const card = document.createElement('article');
  card.className = 'flashcard';
  card.innerHTML = `
    <div class="card-inner">
      <div class="card-front">${cardData.term}</div>
      <div class="card-back">${cardData.definition}</div>
    </div>
  `;

  card.addEventListener('click', () => {
    card.classList.toggle('flipped');
  });

  container.appendChild(card);
}

function nextCard() {
  currentIndex = (currentIndex + 1) % flashcards.length;
  showCard();
}

function prevCard() {
  currentIndex = (currentIndex - 1 + flashcards.length) % flashcards.length;
  showCard();
}

function resetFlashcards() {
  document.getElementById('inputs').style.display = 'block';
  document.querySelector('#create button[onclick="addNewInput()"]').style.display = 'inline-block';
  document.querySelector('#create button[onclick="generateFlashcards()"]').style.display = 'inline-block';
  document.getElementById('flashcardsView').style.display = 'none';
  document.getElementById('flashcardContainer').innerHTML = '';
  flashcards = [];
  currentIndex = 0;

  // Ryd alle inputfelter
  const inputsDiv = document.getElementById('inputs');
  const allInputs = inputsDiv.querySelectorAll('input');
  allInputs.forEach(input => input.value = '');
}

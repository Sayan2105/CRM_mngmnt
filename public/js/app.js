const usersContainer = document.querySelector('#users-container');
const addUserBtn = document.querySelector('#add-user-btn');

function renderUser(user){
    const card = document.createElement('div');

    card.classList.add(
        'border',
        'p-3',
        'mb-3',
        'rounded'
    )

    card.innerHTML = `
        <h4>${user.name}</h4>
        <p>${user.email}</p>

        <button class='btn btn-danger delete-btn'>Delete</button>
    `

    const deleteBtn = card.querySelector(".delete-btn");

    deleteBtn.addEventListener('click', function () {
        card.remove();
    });

    usersContainer.appendChild(card);
}

// Fetch real users from Laravel API
fetch('/users')
    .then(response => response.json())
    .then(users => {
        users.forEach(user => {
            renderUser(user);
        });
    })
    .catch(error => console.error('Error fetching users:', error));


// Add User button (currently just adds to the page, doesn't save to database)
addUserBtn.addEventListener('click', function() {

    const nameInput = document.querySelector("#name-input");
    const emailInput = document.querySelector("#email-input");

    if(nameInput.value.trim() === '' || emailInput.value.trim() === ''){
        alert('Name and email are required');
        return;
    }

    const newUser = {
        name: nameInput.value,
        email: emailInput.value
    }

    renderUser(newUser);

    nameInput.value = '';
    emailInput.value = '';
})
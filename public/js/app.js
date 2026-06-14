const users = [
    {
        id: 1,
        name: 'Sayan',
        email: 'sayan@test.com'
    },
    {
        id: 2,
        name: 'Alex',
        email: 'alex@test.com'
    }
];

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

users.forEach(user => {
    renderUser(user);
})

addUserBtn.addEventListener('click', function() {

    const nameInput = document.querySelector("#name-input");
    const emailInput = document.querySelector("#email-input");

    if(nameInput.value.trim() === '' || emailInput.value.trim() === ''){
        alert('Name and email are required');
        return;
    }

    const lastUser = users[users.length - 1];
    const nextId = lastUser.id + 1;

    const NewUser = {
        id: nextId,
        name: nameInput.value,
        email : emailInput.value
    }

    users.push(NewUser);

    renderUser(NewUser);

    console.log(users);

    nameInput.value = '';
    emailInput.value = '';
})
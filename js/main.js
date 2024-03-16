const addUserForm = document.getElementById("addUserForm");
const editUserForm = document.getElementById("editUserForm");
const showAlert = document.getElementById("showAlert");
const tbody = document.querySelector("tbody");

//Add new user Ajax request
addUserForm.addEventListener("submit", async(e)=>{
    e.preventDefault();

    const formData = new FormData(addUserForm);
    formData.append("add", 1);

    if(addUserForm.checkValidity() === false){
        e.preventDefault();
        e.stopPropagation();
        addUserForm.classList.add("was-validated");
        return false;
    }else{
        document.getElementById("addUserBtn").value = "Please Wait..."

        const data = await fetch("../php/action.php", {
            method: "POST",
            body: formData
        });
        const response = await data.text();
        showAlert.innerHTML = response;
        document.getElementById("addUserBtn").value = "Add User";
        addUserForm.reset();
        addUserModal.hide();
        fetchAllUsers();
    }
})

//Fetch all users Ajax request
const fetchAllUsers = async()=>{
    const data = await fetch("action.php?read=1", {
        method: "GET"
    });
    const response = await data.text();
    tbody.innerHTML = response;
}
fetchAllUsers();

//Show edit modal when an edit button is clicked
const showEditModal = () => {
    document.addEventListener('DOMContentLoaded', () => {
        tbody.addEventListener('click', (e) => {
            if(e.target && e.target.classList.contains('edit-user-btn')){
                editUserModal.show();
                let id = e.target.getAttribute("id");
                editUser(id);           
            }
        });
    });
}

//Edit User Ajax request
const editUser = async(id) => {
    const response = await fetch(`action.php?edit=1&id=${id}`, {
        method: "GET"
    }).then(res => res.json());

    document.getElementById("id").value = response.id;
    document.getElementById("firstName").value = response.first_name;
    document.getElementById("lastName").value = response.last_name;
    document.getElementById("email").value = response.email;
    document.getElementById("phone").value = response.phone;
}

//Update user Ajax request
editUserForm.addEventListener("submit", async(e)=>{
    e.preventDefault();

    const formData = new FormData(editUserForm);
    formData.append("update", 1);

    if(editUserForm.checkValidity() === false){
        e.preventDefault();
        e.stopPropagation();
        editUserForm.classList.add("was-validated");
        return false;
    }else{
        document.getElementById("editUserBtn").value = "Please Wait..."

        const data = await fetch("../php/action.php", {
            method: "POST",
            body: formData
        });
        const response = await data.text();
        showAlert.innerHTML = response;
        document.getElementById("editUserBtn").value = "Add User";
        editUserForm.reset();
        editUserModal.hide();
        fetchAllUsers();
    }
})

//Show delete modal when a delete button is clicked
const showDeleteModal = () => {
    document.addEventListener('DOMContentLoaded', () => {
        tbody.addEventListener('click', (e) => {
            if(e.target && e.target.classList.contains('delete-user-btn')){
                deleteUserModal.show();
                let id = e.target.getAttribute("id");
                document.body.addEventListener("click", (e) => {
                    if(e.target && e.target.classList.contains("btn-delete")){
                        const deleteBtn = e.target;
                        deleteBtn.addEventListener("click", () => {
                            deleteUser(id);
                            deleteUserModal.hide();
                            fetchAllUsers();
                        });
                    }
                    if(e.target && e.target.classList.contains("btn-dont-delete")){
                        const dontDeleteBtn = e.target;
                        dontDeleteBtn.addEventListener("click", () => {
                            deleteUserModal.hide();
                        });
                    }
                });
            }
        });
    });
}

//Delete user Ajax request
const deleteUser = async(id) => {
    const response = await fetch(`action.php?delete=1&id=${id}`, {
        method: "GET"
    }).then(res => res.text());;
    showAlert.innerHTML = response;
}

showEditModal();
showDeleteModal();

const addUserForm = document.getElementById("addUserForm");
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
        modal.hide();
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
showEditModal();
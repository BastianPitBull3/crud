const addNewUserBtn = document.querySelector("#addNewUserBtn");
const addUserModal = new bootstrap.Modal(document.querySelector("#addNewUserModal"));
const editUserModal = new bootstrap.Modal(document.querySelector("#editUserModal"));

addNewUserBtn.addEventListener("click", () => {
    addUserModal.show();
});

function showEditModal(){
    document.addEventListener('DOMContentLoaded', () => {
        document.querySelector('body').addEventListener('click', (e) => {
            if(e.target.classList.contains('edit-user-btn')){
                console.log("Contiene la clase");
                editUserModal.show();
            }else{
                console.log("No contiene la clase");
            }
        });
    });
}
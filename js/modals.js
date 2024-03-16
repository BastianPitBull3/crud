const addNewUserBtn = document.querySelector("#addNewUserBtn");
const addUserModal = new bootstrap.Modal(document.querySelector("#addNewUserModal"));
const editUserModal = new bootstrap.Modal(document.querySelector("#editUserModal"));
const deleteUserModal = new bootstrap.Modal(document.querySelector("#deleteUserModal"));

addNewUserBtn.addEventListener("click", () => {
    addUserModal.show();
});
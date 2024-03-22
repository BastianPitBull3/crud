<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>CRUD</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <!-- Add new user modal START -->
    <div class="modal fade" tabindex="-1" id="addNewUserModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="p-2" id="addUserForm" novalidate>
                        <div class="row mb-3 gx-3">
                            <div class="col">
                                <input type="text" name="firstName" class="form-control form-control-lg" placeholder="Enter first name" required>
                                <div class="invalid-feedback">First name is required!</div>
                            </div>

                            <div class="col">
                                <input type="text" name="lastName" class="form-control form-control-lg" placeholder="Enter last name" required>
                                <div class="invalid-feedback">Last name is required!</div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <input type="password" name="pwd" class="form-control form-control-lg" placeholder="Write a password" required>
                            <div class="invalid-feedback">Password is required!</div>
                        </div>

                        <div class="mb-3">
                            <input type="email" name="email" class="form-control form-control-lg" placeholder="Enter E-Mail" required>
                            <div class="invalid-feedback">E-Mail is required!</div>
                        </div>

                        <div class="mb-3">
                            <input type="tel" name="phone" class="form-control form-control-lg" placeholder="Enter phone number" required>
                            <div class="invalid-feedback">Phone number is required!</div>
                        </div>

                        <div class="mb-3">
                            <input type="submit" value="Add User" id="addUserBtn" class="btn btn-primary w-100 btn-lg">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Add new user modal END -->

    <!-- Edit user modal START -->
    <div class="modal fade" tabindex="-1" id="editUserModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="p-2" id="editUserForm" novalidate>
                        <input type="hidden" name="id" id="id">
                        <div class="row mb-3 gx-3">
                            <div class="col">
                                <input type="text" name="firstName" id="firstName" class="form-control form-control-lg" placeholder="Enter first name" required>
                                <div class="invalid-feedback">First name is required!</div>
                            </div>

                            <div class="col">
                                <input type="text" name="lastName" id="lastName" class="form-control form-control-lg" placeholder="Enter last name" required>
                                <div class="invalid-feedback">Last name is required!</div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <input type="email" name="email" id="email" class="form-control form-control-lg" placeholder="Enter E-Mail" required>
                            <div class="invalid-feedback">E-Mail is required!</div>
                        </div>

                        <div class="mb-3">
                            <input type="tel" name="phone" id="phone" class="form-control form-control-lg" placeholder="Enter phone number" required>
                            <div class="invalid-feedback">Phone number is required!</div>
                        </div>

                        <div class="mb-3">
                            <input type="submit" value="Update user" id="editUserBtn" class="btn btn-success w-100 btn-lg">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Edit user modal END -->

    <!-- Delete user modal START -->
    <div class="modal fade" tabindex="-1" id="deleteUserModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row mb-3 text-center">
                        <p>Are you sure you want to delete this user?</p>
                    </div>
                    <!-- <div class="row d-flex align-items-center justify-content-beetween">
                        <button type="button" class="btn btn-danger btn-delete d-inline-block">Yes, delete</button>
                        <button type="button" class="btn btn-secondary d-inline-block">No</button>
                    </div> -->
                    <div class="d-flex justify-content-between">
                        <di></di>
                        <button type="button" class="btn btn-success btn-delete">Yes, delete</button>
                        <button type="button" class="btn btn-secondary btn-dont-delete">I am not sure</button>
                        <di></di>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Edit user modal END -->

    <div class="container">
        <div class="row mt-2">
            <div class="col-lg-12 d-flex justify-content-between align-items-center">
                <div>
                    <h4 class="text-primary">All users</h4>
                </div>
                <div>
                    <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#addNewUserModal" id="addNewUserBtn">Add New User</button>
                </div>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-lg-12">
                <div id="showAlert"></div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table class="table table-stripped table-bordered text-center">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>E-Mail</th>
                                <th>Phone</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="../js/main.js"></script>
    <script src="../js/modals.js"></script>
</body>

</html>
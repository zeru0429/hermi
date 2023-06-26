<?php include("./parts/header.php"); ?>

<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header bg-warning text-white">
            <h5 class="modal-title">Add User</h5>
            <button class="close" data-dismiss="modal">
                <span>&times;</span>
            </button>
        </div>
        <div class="form-group">
            <label for="password">Curent Password</label>
            <input type="password" name='current_ password' class="form-control" />
        </div>
        <div class="form-group">
            <label for="password">new Password</label>
            <input type="password" name='password' class="form-control" />
        </div>
        <div class="form-group">
            <label for="confirmPassword">Confirm Password</label>
            <input type="password" name='c_password' class="form-control" />
        </div>
        <div class="modal-footer">
            <button data-dismiss="modal">Close</button>
            <input type="submit" class="btn btn-warning" name='submit' value="Submit">
        </div>
    </div>
</div>
<?php include("./parts/footer.php"); ?>
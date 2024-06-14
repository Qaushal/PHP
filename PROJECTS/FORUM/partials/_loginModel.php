


<!-- Modal -->
<div class="modal fade" id="loginModel" tabindex="-1" role="dialog" aria-labelledby="loginModelLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModelLabel">Login to Forum</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="partials/_handleLogin.php" method="post">
            <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email Address</label>
                        <input type="email" class="form-control" id="loginemail" name="loginemail" aria-describedby="emailHelp"
                            placeholder="Enter Your Email">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                            else.</small> 
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                    </div>
                   
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  
                </div>
            </form>
        </div>
    </div>
</div>
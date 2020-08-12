    <!--navigation-->
    <section id="nav">
        <nav class="navbar   navbar-light nav navbar-expand-md" uk-sticky="top: 100; animation: uk-animation-slide-top; bottom: #sticky-on-scroll-up">
            <div class="container">
                <a class="navbar-brand text-light" href="index.php">
                    <img src="../img/book.jpg" width="40" height="50" class="d-inline-block align-top" alt="" loading="lazy">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item  active">
                            <a class="nav-link  active" href="index.php"><span data-placement="bottom" data-html="true" data-toggle="tooltip" title="Dashboard"><i class="fa fa-tachometer" aria-hidden="true"> Dashboard</i></span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="profile.php"><span data-placement="bottom" data-toggle="tooltip" title="Profile"><i class="fa fa-user" aria-hidden="true">
                                        Profile</i></span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="inbox.php"><span data-placement="bottom" data-toggle="tooltip" title="Inbox"><i class="fa fa-inbox" aria-hidden="true">
                                        Inbox</i></span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="profile.php"><span data-placement="bottom" data-toggle="tooltip" title="Add user"><i class="fa fa-plus" aria-hidden="true">
                                        Add User</i></span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="profile.php"><span data-placement="bottom" data-toggle="tooltip" title="Change Password"><i class="fa fa-key" aria-hidden="true">
                                        Change Password</i></span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="profile.php"><span data-placement="bottom" data-toggle="tooltip" title="Order"><i class="fa fa-archive" aria-hidden="true">
                                        Order</i></span>
                            </a>
                        </li>
                        <li class="nav-item  ml-5">
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
                                <i class="fa fa-sign-out" aria-hidden="true"></i>
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Logout</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Are You Sure to logout?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                            <a href="logout.php"> <button type="button" class="btn btn-primary">Logout</button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </section>
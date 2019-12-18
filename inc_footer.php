  <hr><footer>
                <div class="container">
                    <div class="row">
                        <div class="col-xs-6">
                            © 2019. All rights reserved. <a href="https://ubcogbomoso.com" target="_blank">University Baptist Church, Ogbomoso.</a>
                        </div>
                        <?php if(!isset($_SESSION['user_id'])) { ?>
                        <div class="col-xs-6">
                            <ul class="pull-right list-inline m-b-0">
                                <li>
                                    <a href="setquestions/login.php">Staff login</a>
                                </li>
                                </li>
                            </ul>
                        </div>
                    <?php } ?>
                    </div>
                </div>
            </footer>

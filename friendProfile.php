<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./css/friendProfile.css" />

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.11.0/mdb.min.css" rel="stylesheet" />

    <title>Friend profile card</title>
</head>

<body>
    <?php
    require './header.php'
    ?>
    <section class="bg-color-friend-profile">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-md-10 mt-5 pt-5">
                    <div class="row z-depth-3">
                        <div class="col-sm-4 bg-info rounded-left">
                            <div class="card-block text-center text-white">
                                <img class="profile-image" src="./images/profile-2.jpeg" alt="Avatar" style="width: 100%" />
                                <h2 class="font-weight-bold mt-4">Kevin Mark</h2>
                                <p class="text-style">Systems Analyst</p>
                            </div>
                            <div class="friend-btns">
                                <button type="button" class="btn mb-3">
                                    Add friend
                                </button>
                            </div>
                        </div>
                        <div class="col-sm-8 bg-white rounded-right">
                            <h3 class="mt-3 text-center">Information</h3>
                            <hr class="bg-primary" />
                            <div class="row">
                                <div class="col-sm-6">
                                    <p class="font-weight-bold">Email:</p>
                                    <h6 class="text-muted">kevin.mark@gmail.com</h6>
                                </div>
                                <div class="col-sm-6">
                                    <p class="font-weight-bold">Phone:</p>
                                    <h6 class="text-muted">+9999999999</h6>
                                </div>
                            </div>
                            <h4 class="mt-3 text-center">Projects</h4>
                            <hr class="bg-primary" />
                            <div class="row">
                                <div class="col-sm-6">
                                    <p class="font-weight-bold">Recent Projects:</p>
                                    <h6 class="text-muted">School Web</h6>
                                </div>
                                <div class="col-sm-6">
                                    <p class="font-weight-bold">Most Viewed</p>
                                    <h6 class="text-muted">Dinoter Husian</h6>
                                </div>
                            </div>
                            <hr class="bg-primary" />
                            <h4 class="mt-3 text-center">Social Media</h4>
                            <ul class="list-unstyled d-flex justify-content-center mt-4">
                                <li>
                                    <a href=""><i class="fab fa-facebook-f px-3 h4 text-info"></i></a>
                                </li>
                                <li>
                                    <a href=""><i class="fab fa-instagram px-3 h4 text-info"></i></a>
                                </li>
                                <li>
                                    <a href=""><i class="fab fa-twitter px-3 h4 text-info"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.11.0/mdb.min.js"></script>

</html>
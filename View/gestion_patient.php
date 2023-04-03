<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="././sources/style.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
        <script src="././sources/Js.js"></script>
        <title>Gestion des Rendez-Vous</title>
    </head>
    <body class="pr-5 pl-5 ">
        <div class="d-flex header pt-3 border-bottom mb-3 pb-2">
            <div class="mr-auto mb-auto mt-auto">
                <a href="#"> <img src="././images/Logo.png" alt="Logo" class="logo " /></a>
            </div>
            <div class="d-flex mb-auto mt-auto">
                <a href="https://www.facebook.com/" target="_blank"> <img src="././images/Facebook.png" alt="Facebook" class="Social-Media mr-4" /></a>
                <a href="https://www.linkedin.com/" target="_blank"> <img src="././images/linkedin.png" alt="linkedin" class="Social-Media mr-4" /></a>
                <a href="https://www.gmail.com/" target="_blank"> <img src="././images/gmail.png" alt="gmail" class="Social-Media mr-4" /></a>
            </div>
        </div>
        <nav class="navbar navbar-expand-lg navbar-light bg-white shadow">
            <a class="navbar-brand" href="#"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav mr-auto p-1">
                    <li class="nav-item active mr-3">
                        <a class="nav-link" href="#">Gestion des Patient<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item  mr-3">
                        <a class="nav-link" href="?action=getRdv">Gestion des rendez-vous</a>
                    </li>
                    <li class="nav-item mr-3">
                        <a class="nav-link" href="?action=afficherForm">Ajouter un patient</a>
                    </li>
                </ul>
                <span class="navbar-text">
                    <ul class="navbar-nav mr-auto p-1">
                        <li class="nav-item mr-3">
                            <a class="nav-link" href="?action=logout"> Logout</a>
                        </li >
                    </ul>
                </span>
            </div>
        </nav>
        <br><br><br>
    
        
        <div class="col-sm-12">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr> 
                        <td>Nom</td>
                        <td>Prenom</td> 
                        <td>Date de Naissance</td>
                        <td>Adresse</td>
                        <td>Tel</td>
                        <td>Mail</td>
                        <td>Information Médicale</td>
                    </tr>
                </thead>
                <tbody> 
                    <?php while ($r = $data->fetch()):?>
                        <tr>
                            
                            <td><?php echo htmlspecialchars($r['nom']) ?></td>
                            <td><?php echo htmlspecialchars($r['prenom']) ?></td>
                            <td><?php echo htmlspecialchars($r['date_naissance']) ?></td>
                            <td><?php echo htmlspecialchars($r['adresse']) ?></td>
                            <td><?php echo htmlspecialchars($r['tel']) ?></td>
                            <td><?php echo htmlspecialchars($r['mail']) ?></td>
                            <td><?php echo htmlspecialchars($r['info_mem']) ?></td>
                            <td><button class="btn btn-outline-primary"><a href="?action=showRdv&id=<?=$r['id']?>">Consulter les RV</a></button></td>
                            <td><button class="btn btn-outline-primary"><a href="?action=afficherAddRdvPatient&id=<?=$r['id']?>">ajouter un RV</a></button></td>

                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>    
        </div> 
        <footer class="mt-2 border-top mb-5">
            <center>
                <div class="row">
                    <div class="col-12 col-md">
                        <ul class="listf p-1 d-flex mt-3">
                            <li class="active mr-3">
                                <a  href="#">Gestion des Patient</a>
                            </li>
                            <li class="  mr-3">
                                <a   href="?action=getRdv">Gestion des rendez-vous</a>
                            </li>
                            <li class=" mr-3">
                                <a  href="?action=afficherForm">Ajouter un patient</a>
                            </li>
                        </ul>
                        <small class="d-block text-muted">Cpyright &ensp; &copy; 2019-2020 &ensp; Higher School Of Computer Science</small>
                    </div>
                </div>    
            </center>
        </footer>
    </body>
</html>


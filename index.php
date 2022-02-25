<?php 
try {  $db = new PDO('mysql:host=localhost;dbname=gestioncontrat;charset=utf8','root', '');  }
  catch(Exception $e)
  {
    die('Erreur :'.$e->getMessage());
  }
  
  $connexion = $db->prepare('select * from postes');
  $connexion ->execute();
  $post = $connexion->fetchAll();

  ?>

<!DOCTYPE html>
<html>
<head>
  <title>crud app php</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="style.css" >
</head>
<body>

  <?php   
    include 'navbar.php';
   ?>
  
  <div class="container">

    <div class="row pt-4">
      <h2>Page de suppression des postes</h2>

      <a href="index.php">
        <button class="btn btn-primary" type="">
          Ajouter un Poste
        </button>
      </a>
    </div>
    <table class="table table-striped mt-4">
      <thead>
        <tr>
          <th>ID</th>
          <th>POSTES</th>
          <th>ACTIONS</th>
        </tr>
      </thead>

      <tbody>
      <?php foreach ($post as $key => $donn){ ?>

        <tr>
          <th scope="row"><?php echo $donn['id']; ?></th>
          <td><?php echo $donn['post'] ?></td>

          <td>
            <a href="update.php?id=<?php echo $donn['id']; ?>" class="m-2">
              <i class="fa fa-edit fa-2x"></i>
            </a>
            <i class="fa fa-trash fa-2x red-icon"
             data-bs-toggle="modal"
             data-bs-target="#exampleModal<?php echo $donn['id']; ?>">
             </i>

             <div class="modal fade" id="exampleModal<?php echo $donn['id']; ?>" role="dialog">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-body">
                    <p>etes vous sur de vouloir supprimer ce poste ?</p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Annuler</button>
                   
                    <a href="delete.php?id=<?php echo $donn['id']; ?>">
                      <button class="btn btn-danger" type="button">Confirmer</button>
                    </a>
                  </div>
                </div>
              </div>
             </div>
          </td>
        </tr>
      <?php } ?>
      </tbody>
    </table>


  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
</body>
</html>
<?php require '../include/header.inc.php'; ?>

<div class="container">

   <header class="intro">
      <h1> Reseau Social Netlife</h1>
      <?php
      echo "\n <p> Bienvenue utilisateur $a </p>";
      ?>
      <div class="action">
         <a href="https://netlife735496583.wordpress.com/" title="Worpress Netlife" class="btn back">Wordpress Netlife</a>
         <br />
         <br />
         <a href="../info.php" title="Info PHP" class="btn back">Info PHP</a>
      </div>

   </header>
</div>


<div class="row">
   <div class="col-md-8">
      <div class="panel panel-default">
         <div class="panel-heading">
            <div class="row" >
               <div class="col-md-6" >
                  <h3 class="panel-title">Créer publication </h3>
               </div>
               <div class="col-md-6 text-right" >
                  <span class="btn btn-success btn-xs fileinput-button">
                     <span>Ajouter fichier</span>
                     <input type="file" name="files[]" id="multiple_files" multiple />
                  </span>
               </div>
            </div>
         </div>
         <div class="panel-body" >
            <div id="content_area" contenteditable="true" ></div>
         </div>
         <div class="panel-footer">
            <button type="button" name="share_button" id="share_button" class="btn btn-primary btn-sm">Publier</button>
         </div>
      </div>
      <br />
      <div id="timeline_area"></div>
   </div>
   <div class="col-md-4">
      <div class="panel panel-default">
         <div class="panel-heading">
            <div class="row">
               <div class="col-xs-6">
                  <h3 class="panel-title">Amis</h3>
               </div>
               <div class="col-xs-6">
                  <input type="text" name="search_friend" id="search_friend" class="form-control input-sm" placeholder="Search" />
               </div>
            </div>
         </div>
         <div class="panel-body pre-scrollable">
            <div id="friends_list"></div>
         </div>
      </div>
   </div>
</div>



<?php require '../include/footer.inc.php'; ?>
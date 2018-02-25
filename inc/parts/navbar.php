<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="index.php"><span>Sh</span>ortTy</a>
      <?php 
        if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['url']) && !empty($_GET['url'])) {
          
          $getInstance = new DB();
          $getUrl = trim($_GET['url']);

          //Check Crypt link Statement
          $stmt   = $getInstance->Get("links", "WHERE crpt_code = '". $getUrl ."'");

          if($stmt->org_link && !empty($stmt->org_link)) {
            //Vist Link ++
            $getInstance->Update("links", "url_visit = url_visit + 1", "crpt_code = '{$getUrl}'");
            //Get Scripting To Loading Link With 10 Sec
            IncPart::Inc('inc/parts/loadlink');
            echo "<button id='discount' data-link='". $stmt->org_link ."' class='btn btn-primary'>Loading...
            </button>";
          }else {
            //Else The Request Crypt Incorrect Or Not Found
            // Return Profile Pic
            IncPart::Inc('inc/parts/subNav');
          }
            
        }else {
      ?>
      <?php
        // Else The Request Method Incorrect Or Not Found
        // Return Profile Pic
        IncPart::Inc('inc/parts/subNav');
      } ?>
    </div>
</div>
</nav>
<?php
// Check go.php Path And Display Error Message
if($_SERVER['PHP_SELF'] == '/Shorty/go.php') {
  if(!$stmt->org_link || empty($stmt->org_link)) {
  Messages::ErrRoute('div', 'alert alert-warning mt-4', 'Opps!! Page Not Found');
  }
}


?>